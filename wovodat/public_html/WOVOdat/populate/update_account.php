<?php

/**********************************

This script is launched by manage_account.php. It checks the values entered in the form and if they are correct, it changes the user password to the new one.
User is then redirected to update_success.php.

**********************************/

// Database functions are needed for updating
require_once("php/funcs/db_funcs.php");

// Start session
session_start();

// Get root url
require_once "php/include/get_root.php";

// If button confirm was not pressed, go to home page (avoid errors)
if (!isset($_POST['confirm'])) {
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get posted fields
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$conf_new_password=$_POST['conf_new_password'];

// Check new password + confirmation of new password
if ($new_password!=$conf_new_password) {
	// The two passwords are different
	header('Location: '.$url_root.'manage_account.php?attempt=1');
	exit();
}

// Check old password
// Get uname
$uname=$_SESSION['login']['cr_uname'];
// Get password from database
$select_table="cr";
$select_field_name=array();
$select_field_value=array();
$select_field_name[0]="cr_pwd";
$select_field_name[1]="cr_id";
$select_where_field_name=array();
$select_where_field_value=array();
$select_where_field_name[0]="cr_uname";
$select_where_field_value[0]=$uname;
$errors="";
if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1109;
			$_SESSION['errors'][0]['message']=$errors." to db_select()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4028;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}
// If many rows were sent back
if(count($select_field_value)!=1) {
	// Only 1 result should be found
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1110;
	$_SESSION['errors'][0]['message']="Multiple rows in the cr table correspond to this cr_uname: '".$uname."'";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Verify password
$cr_pwd=$select_field_value[0][0];
if (crypt($old_password, $cr_pwd)!=$cr_pwd) {
	// Wrong password
	header('Location: '.$url_root.'manage_account.php?attempt=1');
	exit();
}
// Get cr_id
$cr_id=$select_field_value[0][1];

// Update cr (C3. Registry) table
$update_table_name="cr";
$update_field_name=array();
$update_field_value=array();
$update_field_name[0]="cr_pwd";
$update_field_value[0]=crypt($new_password);
$update_where_field_name=array();
$update_where_field_value=array();
$update_where_field_name[0]="cr_id";
$update_where_field_value[0]=$cr_id;
$errors="";
if (!db_update($update_table_name, $update_field_name, $update_field_value, $update_where_field_name, $update_where_field_value, FALSE, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1111;
			$_SESSION['errors'][0]['message']=$errors." to db_update()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4029;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Inform user that data were successfully updated
header('Location: '.$url_root.'update_success.php');
exit();

?>