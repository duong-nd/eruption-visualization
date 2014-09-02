<?php

// Check login
require_once "php/include/login_check.php";

// Get root url
require_once "php/include/get_root.php";

// If direct access
if (!isset($_POST['submit_file_form_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get comments
$comments=$_POST['com'];

// Check if file is there
if (!isset($_FILES['submit_file_inputfile'])) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=3003;
	$insert_field_name[$cnt]="cr_tmp_obs";
	$_SESSION['errors'][0]['message']="File could not be submitted";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'server_error.php');
	exit();
}

// Check error on upload
if ($_FILES['submit_file_inputfile']['error']!=UPLOAD_ERR_OK) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=3004;
	$_SESSION['errors'][0]['message']="An error occurred when trying to submit file";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'server_error.php');
	exit();
}

// Get loader's cc_id
$cc_id_load=$_SESSION['login']['cc_id'];

// Directory
$file_dir="/home/wovodat/incoming/others";

// Create destination file name: (cc_id)_(YYYYMMDDhhmmiss)_(original_file_name)

// Get original file name
$ori_file_name=$_FILES['submit_file_inputfile']['name'];
// Get current date time
$current_time=date("YmdHis", (time()-date("Z")));
// Get current date time in ISO format
$current_time_iso=substr($current_time, 0, 4)."-".substr($current_time, 4, 2)."-".substr($current_time, 6, 2)." ".substr($current_time, 8, 2).":".substr($current_time, 10, 2).":".substr($current_time, 12, 2);
// Destination file name
$file_name=$cc_id_load."_".$current_time."_".$ori_file_name;

// Include file functions
require_once "php/funcs/file_funcs.php";

// Upload file
if (!file_upload("submit_file_inputfile", $file_dir, $file_name, $error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=3001;
	$_SESSION['errors'][0]['message']=$error." [submit_file_check.php -> file_upload(file_name=".$file_name.")]";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'server_error.php');
	exit();
}

// File is uploaded to server
$ul_file_name=$file_dir."/".$file_name;
$ul_file_size=filesize($ul_file_name);

// Record file upload in DB
if (!file_record($ori_file_name, "O", $comments, $current_time, $cc_id_load, $record_error)) {
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1151;
	$_SESSION['errors'][0]['message']=$record_error." [submit_file_check.php -> file_record($file_name, O)]";
	$_SESSION['l_errors']=1;
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Inform user
$_SESSION['upload']['message']="File ".$ori_file_name." will be studied later. We will contact you by email once it is done. Thank you for your contribution to WOVOdat.";
header('Location: '.$url_root.'upload_success.php');
exit();

?>
