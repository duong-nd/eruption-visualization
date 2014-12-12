<?php

/**********************************

This script is launched when a user clicks the link provided in an email sent to them by the system when they tried to update their email address.
If everything is correct, this is a confirmation that the email address was correct and the database ('cc' table) can eventually be updated.

**********************************/

// Start session
session_start();

// Include necessary functions
require_once("php/funcs/db_funcs.php");

// Get root url
require_once "php/include/get_root.php";

// 1st checking of parameters in URL
if (!isset($_GET['id']) || !isset($_GET['code']) || !isset($_GET['email'])) {
	// One parameter was forgotten - redirect to error page
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1133;
	$_SESSION['errors'][0]['message']="Missing parameter in URL";
	$_SESSION['l_errors']=1;
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Get parameters in URL
$id=$_GET['id'];
$code=urldecode($_GET['code']);
$email=urldecode($_GET['email']);

// Get information from C14
$select_table="cr_tmp";
$select_field_name=array();
$select_field_value=array();
$select_field_name[0]="cr_tmp_time";
$select_field_name[1]="cr_tmp_email";
$select_field_name[2]="cr_tmp_uname";
$select_where_field_name=array();
$select_where_field_value=array();
$select_where_field_name[0]="cr_tmp_id";
$select_where_field_value[0]=$id;
$errors="";
if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1142;
			$_SESSION['errors'][0]['message']=$errors." to db_select()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4047;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}
$l_select_field_value=count($select_field_value);
if ($l_select_field_value!=1) {
	// No result found: user already confirmed update
	// Redirect user to registration success page
	header('Location: '.$url_root.'update_success.php');
	exit();
}
$cr_tmp_time=$select_field_value[0][0];
$cr_tmp_email=$select_field_value[0][1];
$cc_id=$select_field_value[0][2];

// 2nd checking of parameters in URL
// Check code (time)
if (crypt($cr_tmp_time, $code)!=$code) {
	// Redirect user to registration error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Check email
if ($cr_tmp_email!=$email) {
	// Redirect user to registration error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Update cc (C2. Contact) table
$update_table_name="cc";
$update_field_name=array();
$update_field_value=array();
$update_field_name[0]="cc_email";
$update_field_value[0]=$email;
$update_where_field_name=array();
$update_where_field_value=array();
$update_where_field_name[0]="cc_id";
$update_where_field_value[0]=$cc_id;
$errors="";
if (!db_update($update_table_name, $update_field_name, $update_field_value, $update_where_field_name, $update_where_field_value, FALSE, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1143;
			$_SESSION['errors'][0]['message']=$errors." to db_update()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4048;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Delete row in C14 - Temporary registry table
$delete_table_name="cr_tmp";
$delete_field_name=array();
$delete_field_name[0]="cr_tmp_id";
$delete_field_value=array();
$delete_field_value[0]=$id;
$delete_logical=array();
$errors="";
if (!db_delete($delete_table_name, $delete_field_name, $delete_field_value, $delete_logical, FALSE, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1144;
			$_SESSION['errors'][0]['message']=$errors." to db_delete()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		case "Error in the logical operators given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1145;
			$_SESSION['errors'][0]['message']=$errors." to db_delete()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4049;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Inform user that they were successfully registered
header('Location: '.$url_root.'update_success.php');
exit();

?>