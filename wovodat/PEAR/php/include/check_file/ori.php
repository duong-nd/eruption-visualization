<?php

// Get observatory ID
$obs_id=$_POST['obs_id'];

// Check data type
if ($datatype=="Other") {
	// Include file functions
	require_once "php/funcs/file_funcs.php";
	
	// Record file upload in DB
	if (!file_record($ori_file_name, "O", "cc_id = $obs_id", $current_time, $cc_id_load, $record_error)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']=$record_error." [ori.php -> file_record($file_name, O)]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Move to "others"
	$move_ul_file_name=$incoming_dir."/others/".$file_name;
	if (!rename($ul_file_name, $move_ul_file_name)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']="ori.php -> rename(ul_file_name=".$ul_file_name.", move_ul_file_name=".$move_ul_file_name.")]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Inform user
	$_SESSION['upload']['message']="File ".$ori_file_name." will be studied later. We will contact you by email once it is done. Thank you for your understanding.";
	header('Location: '.$url_root.'upload_success.php');
	exit();
}

// If user is not a developer
if ($_SESSION['permissions']['access']!=0) {
	// Check size of file
	if ($ul_file_size > 500000) {
		// Include file functions
		require_once "php/funcs/file_funcs.php";
		
		// Record file upload in DB
		if (!file_record($ori_file_name, "TBP", $file_type, $current_time, $cc_id_load, $record_error)) {
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1151;
			$_SESSION['errors'][0]['message']=$record_error." [ori.php -> file_record($file_name, TBP, $file_type)]";
			$_SESSION['l_errors']=1;
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		
		// File is larger than 500 kb - move to "to_be_processed"
		$move_ul_file_name=$incoming_dir."/to_be_processed/".$file_name;
		if (!rename($ul_file_name, $move_ul_file_name)) {
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1151;
			$_SESSION['errors'][0]['message']="ori.php -> rename(ul_file_name=".$ul_file_name.", move_ul_file_name=".$move_ul_file_name.")]";
			$_SESSION['l_errors']=1;
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		
		// Inform user
		$_SESSION['upload']['message']="File ".$ori_file_name." is too large to be processed immediately, thus we will process it later. We will contact you by email once it is done. Thank you for your understanding.";
		header('Location: '.$url_root.'upload_success.php');
		exit();
	}
}

// Set unlimited capacity and time for processing
ini_set("memory_limit","-1");
set_time_limit(0);

require "php/funcs/ori_funcs.php";

$wovoml_file=$file_dir."/wovoml/".$file_name_no_ext.".xml";
if (!ori_to_wovoml($ul_file_name, $obs_id, $datatype, $cc_id_load, $current_time_iso, $wovoml_file, $error)) {
	// An error occured during data upload
	
	// Security check
	if ($error=="") {
		// Report error
		$error_code=1069;
		$error_message="ori_to_wovoml returned FALSE but there is no error message [ori.php -> ori_to_wovoml(ul_file_name=$ul_file_name) / $file_type]";
		if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1506;
			$_SESSION['errors'][0]['message']=$local_error." [ori.php -> report_error(file_name=$file_name, error_message=$error_message)]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
	}
	
	// Check error code
	$error_code=substr($error, 0, 1);
	$error_message=substr($error, 3);
	
	// If there was any system/server/database error, we redirect their respective error page
	if ($error_code==1) {
		// Report error
		$error_code=1543;
	}
	elseif ($error_code==2 || $error_code==3) {
		// Report error
		$error_code=2543;
	}
	elseif ($error_code==4) {
		// Report error
		$error_code=4543;
	}
	else {
		// Report error
		$error_code=4;
		$error_message="The file you tried to translate could not be recognized by our system. Our administrator was warned about this issue and will look at your file to understand the problem. We will update you later once the problem is resolved. Thank you.";
	}
	
	if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, "($file_type) ".$error_message, $current_time_iso, $cc_id_load, $local_error)) {
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1506;
		$_SESSION['errors'][0]['message']=$local_error." [ori.php -> report_error(file_name=$file_name, error_message=$error_message)]";
		$_SESSION['l_errors']=1;
		
		// Redirect to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
}

// Get observatory and datatype selected
// switch ($obs_id) {
	// case 159:
		// // GNS New Zealand
		// $selCountry="NZ";
		// break;
	// default:
		// // No default country
		// // Error
// }

/* CHIN MEI'S SCRIPT INTERFACE
// Array of WOVOML files
$wovoml_file=NULL;

require "{$selCountry}/transformData.php";
try {
	$wovoml_file=doCSVtoXML($ul_file_name, $selMonDataType);
}
catch (Exception $x) {
	// Send errors
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1995;
	$_SESSION['errors'][0]['message']="An error occurred during translation from CSV to WOVOML";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// // Check number of wovoml files sent back
// $l_wovoml_files=count($wovoml_files);
// if ($l_wovoml_files==0) {
	// // System error
	// $_SESSION['errors']=array();
	// $_SESSION['errors'][0]=array();
	// $_SESSION['errors'][0]['code']=1136;
	// $_SESSION['errors'][0]['message']="No file was sent back after translation";
	// $_SESSION['l_errors']=1;
	
	// // Redirect to server error page
	// header('Location: '.$url_root.'system_error.php');
	// exit();
// }
*/

/// WOVOML functions
require_once "php/funcs/wovoml_funcs.php";

// Boolean upload to database
if ($file_type=="ori_no_ul") {
	$upload_to_db=FALSE;
}
else {
	$upload_to_db=TRUE;
}

// Boolean if loader is developer
if ($_SESSION['permissions']['access']==0) {
	$developer=TRUE;
}
else {
	$developer=FALSE;
}

// Get user for whom loader is allowed to upload data
$user_upload=$_SESSION['permissions']['user_upload'];

// Directory for undo files
$undo_file_dir=$file_dir."/undo";
// If directory doesn't exist
if (!file_exists($undo_file_dir)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1995;
	$_SESSION['errors'][0]['message']="Undo directory file doesn't exist";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}
// Prepare "undo file"
$undo_file_name=$file_name_no_ext."_undo.xml";
$undo_file=$undo_file_dir."/".$undo_file_name;

// Check data
$errors=array();
$l_errors=0;
if (!wovoml_check($ul_file_name, $current_time_iso, $developer, $user_upload, TRUE, $warnings, $errors, $l_errors)) {
	// An error occured during data upload
	unset($_SESSION['upload']);
	
	// Security check
	if ($l_errors==0) {
		// Report error
		$error_code=1069;
		$error_message="wovoml_upload returned FALSE but there is no error message [ori.php -> wovoml_upload(ul_file_name=$ul_file_name) / $file_type]";
		if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1506;
			$_SESSION['errors'][0]['message']=$local_error." [ori.php -> report_error(file_name=$file_name, error_message=$error_message)]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
	}
	
	// Save errors
	$_SESSION['errors']=$errors;
	$_SESSION['l_errors']=$l_errors;
	
	// Report error
	$error_code=$errors[0]['code'];
	$error_message="($file_type) ".$errors[0]['message'];
	if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1506;
		$_SESSION['errors'][0]['message']=$local_error." [ori.php -> report_error(file_name=$file_name, error_message=$error_message)]";
		$_SESSION['l_errors']=1;
		
		// Redirect to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
}

// Checking successful!

?>
