<?php

/**********************************

This script updates the permissions from one user to another by inserting or updating the related row in 'jj_concon' table.

**********************************/

// Database functions are needed for updating
require_once("php/funcs/db_funcs.php");

// Start session
session_start();

// Get root url
require_once "php/include/get_root.php";

// Direct access
if (!isset($_POST['manage_permissions_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get jj_concon_id
$jj_concon_id=$_SESSION['mng_perm']['jj_concon_id'];

// If there was no existing permission in the database
if ($jj_concon_id==0) {
	// Get posted information
	$granting_user_id=$_POST['granting_user_id'];
	$granted_user_id=$_POST['granted_user_id'];
	if (isset($_POST['upload'])) {
		$upload=1;
	}
	else {
		$upload="0";           
	}
	if (isset($_POST['update'])) {
		$update=1;
	}
	else {
		$update="0";           
	}
	if (isset($_POST['view'])) {
		$view=1;
	}
	else {
		$view="0";           ;
	}
	if (isset($_POST['admin'])) {
		$admin=1;
	}
	else {
		$admin="0";           
	}
	
	// Get current time
	$current_time=date("Y-m-d H:i:s");
	
	// Get loader ID
	$cc_id_load=$_SESSION['login']['cc_id'];
	
	// Insert values into jj_concon (C13. Contact to contact permissions) table
	$insert_table_name="jj_concon";
	$insert_field_name=array();
	$insert_field_value=array();
	$insert_field_name[0]="cc_id";
	$insert_field_value[0]=$granting_user_id;
	$insert_field_name[1]="cc_id_granted";
	$insert_field_value[1]=$granted_user_id;
	$insert_field_name[2]="jj_concon_view";
	$insert_field_value[2]=$view;
	$insert_field_name[3]="jj_concon_upload";
	$insert_field_value[3]=$upload;
	$insert_field_name[4]="jj_concon_update";
	$insert_field_value[4]=$update;
	$insert_field_name[5]="jj_concon_admin";
	$insert_field_value[5]=$admin;
	$insert_field_name[6]="jj_concon_loaddate";
	$insert_field_value[6]=$current_time;
	$insert_field_name[7]="cc_id_load";
	$insert_field_value[7]=$cc_id_load;
	$insert_id=0;
	$errors="";
	if (!db_insert($insert_table_name, $insert_field_name, $insert_field_value, FALSE, $insert_id, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1123;
				$_SESSION['errors'][0]['message']=$errors." to db_insert()";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4036;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
}
else {
	// Get posted information
	if (isset($_POST['upload'])) {
		$upload=1;
	}
	else {
		$upload=0;
	}
	if (isset($_POST['update'])) {
		$update=1;
	}
	else {
		$update=0;
	}
	if (isset($_POST['view'])) {
		$view=1;
	}
	else {
		$view=0;
	}
	if (isset($_POST['admin'])) {
		$admin=1;
	}
	else {
		$admin=0;
	}
	
	// Update permissions
	$update_table_name="jj_concon";
	$update_field_name=array();
	$update_field_value=array();
	$update_field_name[0]="jj_concon_view";
	$update_field_value[0]=$view;
	$update_field_name[1]="jj_concon_upload";
	$update_field_value[1]=$upload;
	$update_field_name[2]="jj_concon_update";
	$update_field_value[2]=$update;
	$update_field_name[3]="jj_concon_admin";
	$update_field_value[3]=$admin;
	$update_where_field_name=array();
	$update_where_field_value=array();
	$update_where_field_name[0]="jj_concon_id";
	$update_where_field_value[0]=$jj_concon_id;
	$errors="";
	if (!db_update($update_table_name, $update_field_name, $update_field_value, $update_where_field_name, $update_where_field_value, FALSE, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1124;
				$_SESSION['errors'][0]['message']=$errors." to db_update()";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4037;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
}

// Forget all session data
unset($_SESSION['mng_perm']);

// Inform user that data were successfully updated
header('Location: '.$url_root.'update_success.php');
exit();

?>