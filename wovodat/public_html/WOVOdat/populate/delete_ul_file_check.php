<?php

/**********************************

This script removes the selected file from the server and database.
When operation is successful, the administrator is redirected back to delete_ul_file_list.php.

**********************************/

// Check login
require_once("php/include/login_check.php");

// Get root url
require_once "php/include/get_root.php";

// Check direct access
if (!isset($_POST['delete_ul_file_check_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get posted information
$cu_id=$_POST['cu_id'];
$cu_file=$_POST['cu_file'];
$cu_type=$_POST['cu_type'];
$cu_loaddate=$_POST['cu_loaddate'];
$cc_id_load=$_POST['cc_id_load'];

// Get user ID
$user_id=$_SESSION['login']['cc_id'];

// Get datetime of upload
$year=substr($cu_loaddate, 0, 4);
$month=substr($cu_loaddate, 5, 2);
$day=substr($cu_loaddate, 8, 2);
$hour=substr($cu_loaddate, 11, 2);
$min=substr($cu_loaddate, 14, 2);
$sec=substr($cu_loaddate, 17, 2);
$upload_time=$year.$month.$day.$hour.$min.$sec;

// Get file directory
$incoming_dir="/home/wovodat/incoming/";
if ($cu_type=="PE") {
	$file_dir=$incoming_dir."process_error/";
}
else {
	$file_dir=$incoming_dir."translate_error/";
}

// File name
$file_name=$file_dir.$cc_id_load."_".$upload_time."_".$cu_file;

// Check if file exists
if (file_exists($file_name)) {
	// Delete file
	if (!unlink($file_name)) {
		// Server error
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=2999;
		$_SESSION['errors'][0]['message']="An error occurred when trying to delete ".$file_name;
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'server_error.php');
		exit();
	}
}
else {
	// Message that there is no file associated
	$_SESSION['delete_ul_file_check']['message']="No such file on server";
	// Redirect to delete_ul_file_list
	header('Location: '.$url_root.'delete_ul_file_list.php');
	exit();
}

// Database functions
require_once "php/funcs/db_funcs.php";

// Delete record in database
$delete_table_name="cu";
$delete_field_name=array();
$delete_field_name[0]="cu_id";
$delete_field_value=array();
$delete_field_value[0]=$cu_id;
$delete_logical=array();
$delete_error="";
if (!db_delete($delete_table_name, $delete_field_name, $delete_field_value, $delete_logical, FALSE, $delete_error)) {
	// Database error
	switch ($delete_error) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1131;
			$_SESSION['errors'][0]['message']=$delete_error." to db_delete() / delete_ul_file_check.php -> db_delete(table=$delete_table_name, cu_id=$cu_id)";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		case "Error in the logical operators given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1132;
			$_SESSION['errors'][0]['message']=$delete_error." to db_delete() / delete_ul_file_check.php -> db_delete(table=$delete_table_name, cu_id=$cu_id)";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4044;
			$_SESSION['errors'][0]['message']=$delete_error." / delete_ul_file_check.php -> db_delete(table=$delete_table_name, cu_id=$cu_id)";
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Message that operation was successful
$_SESSION['delete_ul_file_check']['message']="File and record were deleted successfully";
// Redirect to delete_ul_file_list page
header('Location: '.$url_root.'delete_ul_file_list.php');
exit();

?>