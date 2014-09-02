<?php

/**********************************

This script is run after user confirmed data upload (on upload_file_confirm.php).
It inserts/updates data in the database and redirects to upload_success.php if everything was ok.

**********************************/

// Set unlimited capacity and time for processing
ini_set("memory_limit","-1");
set_time_limit(0);

/******************************************************************************************************
* Function for reporting an error
* Returns FALSE if an error occurred.
* Input:	- $ori_file_name: the original file name
* 			- $file_name: the uploaded file name
* 			- $url_file_name: the full URL of the uploaded file_name
* 			- $error_code: the error code
* 			- $error_message: the error message
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing on 'cc_id' in 'cc' table in the database)
* Output:	- $error: an error message
******************************************************************************************************/
function report_error($ori_file_name, $file_name, $url_file_name, $error_code, $error_message, $current_time, $cc_id_load, &$error) {
	// Include file functions
	require_once "php/funcs/file_funcs.php";
	
	// Record file upload in DB
	if (!file_record($ori_file_name, "PE", $error_message, $current_time, $cc_id_load, $record_error)) {
		$error=$record_error." [report_error -> file_record($file_name, PE, $error_message)]";
		return FALSE;
	}
	
	// Move file to "process_error" folder
	$move_url_file_name="/home/wovodat/incoming/process_error/".$file_name;
	if (!rename($url_file_name, $move_url_file_name)) {
		$error="report_error -> rename(url_file_name=$url_file_name, move_url_file_name=$move_url_file_name)]";
		return FALSE;
	}
	
	// Store error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=$error_code;
	$_SESSION['errors'][0]['message']=$error_message;
	$_SESSION['l_errors']=1;
	
	// Depending on error code, different redirection
	if ($error_code>=1000 && $error_code<2000) {
		// It's a system error
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	elseif ($error_code>=2000 && $error_code<4000) {
		// It's a server error
		header('Location: '.$url_root.'server_error.php');
		exit();
	}
	elseif ($error_code>=4000) {
		// It's a database error
		header('Location: '.$url_root.'db_error.php');
		exit();
	}
	else {
		// It's a user error
		header('Location: '.$url_root.'upload_error.php');
		exit();
	}
}

// Check login
require_once "php/include/login_check.php";

// Get root url
require_once "php/include/get_root.php";

// If direct access
if (!isset($_POST['confirm_file_upload'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home_populate.php');
	exit();
}

// If session expired
if (!isset($_SESSION['upload'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home_populate.php');
	exit();
}

// Delete display files
foreach ($_SESSION['upload']['display']['files'] as $file) {
	unlink($file);
}
rmdir($_SESSION['upload']['display']['folder']);

// Get session variables
$file_type=$_SESSION['upload']['file_type'];
$incoming_dir=$_SESSION['upload']['incoming_dir'];
$file_dir=$_SESSION['upload']['file_dir'];
$ul_file_name=$_SESSION['upload']['ul_file_name'];
$ori_file_name=$_SESSION['upload']['ori_file_name'];
$file_name=$_SESSION['upload']['file_name'];
$file_name_no_ext=$_SESSION['upload']['file_name_no_ext'];
$cc_id_load=$_SESSION['login']['cc_id'];
$current_time_iso=$_SESSION['upload']['current_time_iso'];
$list_cb_id=$_SESSION['upload']['list_cb_id'];

// Processing depending on file type
switch ($file_type) {
	case "ori":
		// Observatory file
	case "ori_no_ul":
		// Observatory file, no upload to DB
		
		// Include PHP script for processing
		include "php/include/upload_file/ori.php";
		
		break;
	case "wovoml":
		// Initialization WOVOML file
	case "wovoml_no_ul":
		// Initialization WOVOML file, no upload to DB
	case "wovoml_no_pub":
		// WOVOML file, no checking of publish dates
		
		// Include PHP script for processing
		include "php/include/upload_file/wovoml.php";
		
		break;
	default:
		// Report error
		$error_code=1996;
		$error_message="Type of file to be uploaded was not recognized / file_name=$file_name, file_type=$file_type";
		if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1506;
			$_SESSION['errors'][0]['message']=$local_error." [upload_file_upload.php -> report_error(file_name=$file_name, error_message=$error_message)]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
}

// Redirect to upload success page
$_SESSION['upload']['message']="File ".$ori_file_name." was processed successfully.";
header('Location: '.$url_root.'upload_success.php');

?>