<?php

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

// Check direct access
if (!isset($_POST['specify_reference_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get ID of object chosen by user
$_SESSION['upload']['answer']=$_POST['specify_reference_radio'];

// Get origin (for returning there)
$origin=$_POST['origin'];

// Resume upload
require_once "php/funcs/".$origin.".php";

// Get session variables
$file_name=$_SESSION['upload']['file_name'];
$ori_file_name=$_SESSION['upload']['ori_file_name'];
$ul_file_name=$_SESSION['upload']['ul_file_name'];
$current_time_iso=$_SESSION['upload']['current_time_iso'];
$xml_array=$_SESSION['upload']['xml_array'];
$cc_id_load=$_SESSION['upload']['cc_id_load'];
$developer=$_SESSION['upload']['developer'];
$user_upload=$_SESSION['upload']['user_upload'];
$check_pubdate=$_SESSION['upload']['check_pubdate'];
$auto_array=$_SESSION['upload']['auto_array'];
$gen_cc_id=$_SESSION['upload']['gen_cc_id'];
$gen_cc_code=$_SESSION['upload']['gen_cc_code'];
$gen_vd_id=$_SESSION['upload']['gen_vd_id'];
$gen_vd_code=$_SESSION['upload']['gen_vd_code'];
$gen_pub_date=$_SESSION['upload']['gen_pub_date'];

$errors=array();
$l_errors=0;

// Restart with v0_check_data
if (!v0_check_data($auto_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time_iso, $check_pubdate, $developer, $user_upload, $xml_array, $errors, $l_errors)) {
	// An error occured during data upload
	unset($_SESSION['upload']);
	
	// Security check
	if ($l_errors==0) {
		// Report error
		$error_code=1069;
		$error_message="v0_check_data returned FALSE but there is no error message [specify_reference_check.php -> v0_check_data(ul_file_name=$ul_file_name) / $file_type]";
		if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1059;
			$_SESSION['errors'][0]['message']=$local_error." [specify_reference_check.php -> report_error(file_name=$file_name, error_message=$error_message)]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
	}
	
	// Store errors
	$_SESSION['errors']=$errors;
	$_SESSION['l_errors']=$l_errors;
	
	// Report error
	$error_code=$errors[0]['code'];
	$error_message=$errors[0]['message'];
	if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1506;
		$_SESSION['errors'][0]['message']=$local_error." [specify_reference_check.php -> report_error(file_name=$file_name, error_message=$error_message)]";
		$_SESSION['l_errors']=1;
		
		// Redirect to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
}

// Checking successful!

// Redirect to upload confirm page
header('Location: '.$url_root.'upload_file_confirm.php');
exit();

?>