<?php

/**********************************

This script is called for checking a WOVOML file.

**********************************/

// Extension = .xml
if ($ori_file_ext!="xml") {
	// Report error
	$error_code=4;
	$error_message="The extension of file you tried to upload does not match the selected file type ($file_type)";
	if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1506;
		$_SESSION['errors'][0]['message']=$local_error." [upload_file_check -> report_error(";
		$_SESSION['l_errors']=1;
		
		// Redirect to server error page
		header('Location: '.$url_root.'server_error.php');
		exit();
	}
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
			$_SESSION['errors'][0]['message']=$record_error." [wovoml.php -> file_record($file_name, TBP, $file_type)]";
			$_SESSION['l_errors']=1;
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		
		// File is larger than 500 kb - move to "to_be_processed"
		$move_ul_file_name=$incoming_dir."/to_be_processed/".$file_name;
		if (!rename($ul_file_name, $move_ul_file_name)) {
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1151;
			$_SESSION['errors'][0]['message']="wovoml.php -> rename(ul_file_name=".$ul_file_name.", move_ul_file_name=".$move_ul_file_name.")]";
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

// WOVOML functions
require_once "php/funcs/wovoml_funcs.php";

// Boolean check publish dates
if ($file_type=="wovoml_no_pub") {
	$check_pubdate=FALSE;
}
else {
	$check_pubdate=TRUE;
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

// Global variables
$_SESSION['upload']['data_list']=array();
$data_list=&$_SESSION['upload']['data_list'];
$checked_data=array();
$xml_id_cnt=0;
$gen_owners=array();
$gen_pubdates=array();
$gen_vd_ids=array();
$gen_eruptions=array();
$gen_phases=array();
$gen_networks=array();
$gen_stations=array();
$gen_stations2=array();
$gen_stations3=array();
$gen_instruments=array();
$gen_data=array();
$gen_data2=array();

// Check data
$_SESSION['upload']['warnings']=array();
$warnings=&$_SESSION['upload']['warnings'];
$errors=array();
$l_errors=0;
if (!wovoml_check($ul_file_name, $current_time_iso, $developer, $user_upload, $check_pubdate, $warnings, $errors, $l_errors)) {
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
	$error_message=$errors[0]['message'];
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

// Checking successful!

?>