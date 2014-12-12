<?php

// Get observatory ID
$obs_id=$_POST['obs_id'];

// Check data type
if ($datatype=="Other") {
	// Include file functions
	require_once "php/funcs/file_funcs.php";
	
	// Record file upload in DB
	if (!file_record($ori_file_name, "O", "cc_id = $obs_id (to be translated)", $current_time, $cc_id_load, $record_error)) {
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
	$_SESSION['translate']['message']="File ".$ori_file_name." will be studied later. We will contact you by email once it is done. Thank you for your understanding.";
	header('Location: '.$url_root.'translate_success.php');
	exit();
}


// Check size of file
if ($ul_file_size > 500000) {
	// Include file functions
	require_once "php/funcs/file_funcs.php";
	
	// Record file upload in DB
	if (!file_record($ori_file_name, "TBT", $file_type, $current_time, $cc_id_load, $record_error)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']=$record_error." [ori.php -> file_record($file_name, TBT, $file_type)]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// File is larger than 500 kb - move to "to_be_translated"
	$move_ul_file_name=$incoming_dir."/to_be_translated/".$file_name;
	if (!rename($ul_file_name, $move_ul_file_name)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']="ori.php -> rename(ul_file_name=".$ul_file_name.", move_ul_file_name=".$move_ul_file_name.")]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Inform user
	$_SESSION['translate']['message']="File ".$ori_file_name." is too large to be processed immediately, thus we will process it later. We will contact you by email once it is done. Thank you for your understanding.";
	header('Location: '.$url_root.'translate_success.php');
	exit();
}

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

?>