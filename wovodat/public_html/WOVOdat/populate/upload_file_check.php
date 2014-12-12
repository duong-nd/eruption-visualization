<?php

/**********************************

This script prepares the file to be uploaded to the database.
It checks the values in the selected file and redirects to upload_file_confirm.php if no error was found.

**********************************/

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

// Allow bigger memory limit
ini_set("memory_limit","1024M");

// Allow longer execution time
set_time_limit(40);

// Get root url
require_once "php/include/get_root.php";

// Security: cannot upload 2 files at the same time
if (isset($_SESSION['upload'])) {
	// Redirect to page: upload start
	header('Location: '.$url_root.'upload_file_continue.php');
	exit();
}

// If direct access
if (!isset($_POST['upload_file_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Check if file is there
if (!isset($_FILES['upload_file_inputfile'])) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=3003;
	$_SESSION['errors'][0]['message']="File could not be uploaded";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'server_error.php');
	exit();
}

// Check empty file
if (empty($_FILES['upload_file_inputfile']['name'])) {
	// Redirect to upload page
	header('Location: '.$url_root.'home_populate.php');
	exit();
}

// Check error on upload
if ($_FILES['upload_file_inputfile']['error']!=UPLOAD_ERR_OK) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=3004;
	$_SESSION['errors'][0]['message']="An error occurred when trying to upload file";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'server_error.php');
	exit();
}

// Get file type
$file_type=$_POST['file_type'];

// Get datatype selected
if (isset($_POST['select_datatype'])) {
	$datatype=$_POST['select_datatype'];
}

// Get cb_ids
$n_list_cb_id=0;
$list_cb_id="";
if (isset($_POST['n_list'])) {
	$n_list_cb_id=$_POST['n_list'];
	$first=TRUE;
	for ($i=1; $i<=$n_list_cb_id; $i++) {
		if ($_POST['pub_'.$i]=="no") {
			continue;
		}
		if ($first) {
			$list_cb_id=$_POST['pub_'.$i];
			$first=FALSE;
		}
		else {
			$list_cb_id.=",".$_POST['pub_'.$i];
		}
	}
}

// Store in session
$_SESSION['upload']=array();
$_SESSION['upload']['file_type']=$file_type;
$_SESSION['upload']['list_cb_id']=$list_cb_id;

// Get loader's cc_id
$cc_id_load=$_SESSION['login']['cc_id'];

// Directory for uploaded files
$incoming_dir="/home/wovodat/incoming";
$file_dir=$incoming_dir."/temp";

// Create destination file name: (cc_id)_(YYYYMMDDhhmmiss)_(original_file_name)

// Get original file name
$ori_file_name=$_FILES['upload_file_inputfile']['name'];
$dot_pos=strrpos($ori_file_name, ".");
$ori_file_ext=substr($ori_file_name, $dot_pos+1);
$ori_file_name_no_ext=substr($ori_file_name, 0, $dot_pos);
// Get current date time
$current_time=date("YmdHis", (time()-date("Z")));
// Get current date time in ISO format
$current_time_iso=substr($current_time, 0, 4)."-".substr($current_time, 4, 2)."-".substr($current_time, 6, 2)." ".substr($current_time, 8, 2).":".substr($current_time, 10, 2).":".substr($current_time, 12, 2);
// Destination file name
$file_name=$cc_id_load."_".$current_time."_".$ori_file_name;
$dot_pos=strrpos($file_name, ".");
$file_ext=substr($file_name, $dot_pos+1);
$file_name_no_ext=substr($file_name, 0, $dot_pos);

// Include file functions
require_once "php/funcs/file_funcs.php";

// Upload file
if (!file_upload("upload_file_inputfile", $file_dir, $file_name, $error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=3001;
	$_SESSION['errors'][0]['message']=$error." [upload_file_check.php -> file_upload(file_name=".$file_name.")]";
	$_SESSION['l_errors']=1;
	
	// Redirect to server error page
	header('Location: '.$url_root.'server_error.php');
	exit();
}

// File is uploaded to server
$ul_file_name=$file_dir."/".$file_name;
$ul_file_size=filesize($ul_file_name);

// Store current time and destination file name
$_SESSION['upload']['file_type']=$file_type;
$_SESSION['upload']['current_time']=$current_time;
$_SESSION['upload']['current_time_iso']=$current_time_iso;
$_SESSION['upload']['incoming_dir']=$incoming_dir;
$_SESSION['upload']['file_dir']=$file_dir;
$_SESSION['upload']['ori_file_name']=$ori_file_name;
$_SESSION['upload']['file_name']=$file_name;
$_SESSION['upload']['file_name_no_ext']=$file_name_no_ext;
$_SESSION['upload']['ul_file_name']=$ul_file_name;

// Processing depending on file type
switch ($file_type) {
	case "ini_csv_cc":
		// Initialization CSV file for contacts
	case "ini_csv_cc_no_ul":
		// Initialization CSV file for contacts, no upload to DB
		
		// Include PHP script for processing
		include "php/include/upload_file/ini_csv_cc.php";
		
		// Redirect to upload success page
		$_SESSION['upload']['message']="File ".$ori_file_name." was processed successfully.";
		header('Location: '.$url_root.'upload_success.php');
		exit();
		
		break;
	case "ori":
		// Observatory file
	case "ori_no_ul":
		// Observatory file, no upload to DB
		
		// Include PHP script for processing
		include "php/include/check_file/ori.php";
		
		// Redirect to upload confirm page
		header('Location: '.$url_root.'upload_file_confirm.php');
		exit();
		
		break;
	case "ini":
		// Initialization WOVOML file
	case "ini_no_ul":
		// Initialization WOVOML file, no upload to DB
		
		// Include PHP script for processing
		include "php/include/upload_file/ini.php";
		
		// Redirect to upload success page
		$_SESSION['upload']['message']="File ".$ori_file_name." was processed successfully.";
		header('Location: '.$url_root.'upload_success.php');
		exit();
		
		break;
	case "wovoml":
		// Initialization WOVOML file
	case "wovoml_no_ul":
		// Initialization WOVOML file, no upload to DB
	case "wovoml_no_pub":
		// WOVOML file, no checking of publish dates
		
		// Include PHP script for processing
		include "php/include/check_file/wovoml.php";
		
		// Redirect to upload confirm page
		header('Location: '.$url_root.'upload_file_confirm.php');
		exit();
		
		break;
	default:
		// Report error
		$error_code=1996;
		$error_message="Type of file to be uploaded was not recognized / file_name=$file_name, file_type=$file_type";
		if (!report_error($ori_file_name, $file_name, $ul_file_name, $error_code, $error_message, $current_time_iso, $cc_id_load, $local_error)) {
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1506;
			$_SESSION['errors'][0]['message']=$local_error." [upload_file_check.php -> report_error(file_name=$file_name, error_message=$error_message)]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
}

?>