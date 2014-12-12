<?php

// Check size of file
if ($ul_file_size > 500000) {
	// Include file functions
	require_once "php/funcs/file_funcs.php";
	
	// Record file upload in DB
	if (!file_record($ori_file_name, "TBT", $file_type, $current_time, $cc_id_load, $record_error)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']=$record_error." [ini_csv_cc.php -> file_record($file_name, TBT, $file_type)]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// File is larger than 500 kb - move to "to_be_translated"
	$move_ul_file_name=$incoming_dir."/to_be_translated/".$file_name;
	if (!rename($ul_file_name, $move_ul_file_name)) {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1151;
		$_SESSION['errors'][0]['message']="ini_csv_cc.php -> rename(ul_file_name=".$ul_file_name.", move_ul_file_name=".$move_ul_file_name.")]";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Inform user
	$_SESSION['translate']['message']="File ".$ori_file_name." is too large to be translated immediately, thus we will process it later. We will contact you by email once it is done. Thank you for your understanding.";
	header('Location: '.$url_root.'translate_success.php');
	exit();
}

// Functions for initialization files
require_once "php/funcs/ini_csv_funcs.php";

// Translate data to WOVOML
$wovoml_file=$file_dir."/wovoml/".$file_name_no_ext.".xml";
$error="";
if (!ini_csv_to_wovoml($ul_file_name, $cc_id_load, $wovoml_file, $error)) {
	// Report error
	$error_code=1234;
	$error_message=$error." [ini_csv_cc.php -> ini_csv_to_wovoml(ul_file_name=$ul_file_name) / $file_type]";
	if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1506;
		$_SESSION['errors'][0]['message']=$local_error." [ini_csv_cc.php -> report_error(file_name=$file_name, error_message=$error_message)]";
		$_SESSION['l_errors']=1;
		
		// Redirect to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
}

?>