<?php

/**********************************

This script is called for uploading data contained in a WOVOML file.

**********************************/

// Set unlimited capacity and time for processing
ini_set("memory_limit","-1");
set_time_limit(0);

// File and WOVOML functions
require_once "php/funcs/file_funcs.php";
require_once "php/funcs/wovoml_funcs.php";

// Boolean upload to database
if ($file_type=="wovoml_no_ul") {
	$upload_to_db=FALSE;
}
else {
	$upload_to_db=TRUE;
}

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

// Upload data to the database
$errors=array();
$l_errors=0;
if (!wovoml_upload($undo_file, $cc_id_load, $current_time_iso, $list_cb_id, $upload_to_db, $errors, $l_errors)) {
	// An error occured during data upload
	unset($_SESSION['upload']);
	
	// Security check
	if ($l_errors==0) {
		// Report error
		$error_code=1069;
		$error_message="wovoml_upload returned FALSE but there is no error message [wovoml.php -> wovoml_upload(ul_file_name=$ul_file_name) / $file_type]";
		if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1506;
			$_SESSION['errors'][0]['message']=$local_error." [wovoml.php -> report_error(file_name=$file_name, error_message=$error_message)]";
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
		$_SESSION['errors'][0]['message']=$local_error." [wovoml.php -> report_error(file_name=$file_name, error_message=$error_message)]";
		$_SESSION['l_errors']=1;
		
		// Redirect to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
}

// Upload successful!

// Record in upload history table
if ($file_type=="wovoml_no_ul") {
	// Remove file
	unlink($ul_file_name);
}
else {
	// Record in upload history table
	if (!file_record($ori_file_name, "P", $file_type, $current_time_iso, $cc_id_load, $record_error)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']=$record_error." [wovoml.php -> file_record(ori_file_name=$ori_file_name, P)]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Move file to "processed" directory
	$move_ul_file_name=$incoming_dir."/processed/original/".$file_name;
	if (!rename($ul_file_name, $move_ul_file_name)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']="wovoml.php -> rename(ul_file_name=".$ul_file_name.", move_ul_file_name=".$move_ul_file_name.")]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Move undo file to "processed" directory as well
	$move_undo_file_name=$incoming_dir."/processed/undo/".$undo_file_name;
	if (!rename($undo_file, $move_undo_file_name)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']="wovoml.php -> rename(undo_file=".$undo_file.", move_undo_file_name=".$move_undo_file_name.")]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
}

?>
