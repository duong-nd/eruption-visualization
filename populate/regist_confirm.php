<?php

/**********************************

This script is called when a user wants to confirm registration by clicking (or copying and pasting) the link sent to them by email (cf. regist_check.php).
The script checks the 3 values given in the URL:
- "id" corresponds to cr_tmp_id in the 'cr_tmp' table in the database where all information given by the user during registration were stored (name, email, password, etc.).
- "code" is an encoded secret code to prevent any impersonation
- "email" is another value to prevent impersonation
If any error is found, the user is redirected to regist_error.php.
Else, their information is copied in the 'cc' and the 'cr' tables while they are redirected to the regist_success.php page.

**********************************/

// Start session
session_start();

// Include necessary functions
require_once("php/funcs/db_funcs.php");

// Get root url
require_once "php/include/get_root.php";
/*
// 1st checking of parameters in URL
if (!isset($_GET['id']) || !isset($_GET['code']) || !isset($_GET['email'])) {
	// One parameter was forgotten - redirect to error page
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1133;
	$_SESSION['errors'][0]['message']="Missing parameter in URL";
	$_SESSION['l_errors']=1;
	header('Location: '.$url_root.'regist_error.php');
	exit();
}*/

// Get parameters in URL
$id=$_GET['id'];
//$code=urldecode($_GET['code']);
$email=urldecode($_GET['email']);


// Get information from C14
$select_table="cr_tmp";
$select_field_name=array();
$select_field_value=array();
$select_field_name[0]="cr_tmp_time";
$select_field_name[1]="cr_tmp_email";
$select_field_name[2]="cr_tmp_fname";
$select_field_name[3]="cr_tmp_lname";
$select_field_name[4]="cr_tmp_obs";
$select_field_name[5]="cr_tmp_add1";
$select_field_name[6]="cr_tmp_add2";
$select_field_name[7]="cr_tmp_city";
$select_field_name[8]="cr_tmp_state";
$select_field_name[9]="cr_tmp_country";
$select_field_name[10]="cr_tmp_post";
$select_field_name[11]="cr_tmp_url";
$select_field_name[12]="cr_tmp_phone";
$select_field_name[13]="cr_tmp_phone2";
$select_field_name[14]="cr_tmp_fax";
$select_field_name[15]="cr_tmp_com";
$select_field_name[16]="cr_tmp_uname";
$select_field_name[17]="cr_tmp_pwd";
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
			$_SESSION['errors'][0]['code']=1126;
			$_SESSION['errors'][0]['message']=$errors." to db_select()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'regist_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4039;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}
$l_select_field_value=count($select_field_value);
if ($l_select_field_value!=1) {
	// No result found: user already confirmed registration
	// Redirect user to registration success page
	header('Location: '.$url_root.'regist_success.php');
	exit();
}
$cr_tmp_time=$select_field_value[0][0];
$cr_tmp_email=$select_field_value[0][1];
$cr_tmp_fname=$select_field_value[0][2];
$cr_tmp_lname=$select_field_value[0][3];
$cr_tmp_obs=$select_field_value[0][4];
$cr_tmp_add1=$select_field_value[0][5];
$cr_tmp_add2=$select_field_value[0][6];
$cr_tmp_city=$select_field_value[0][7];
$cr_tmp_state=$select_field_value[0][8];
$cr_tmp_country=$select_field_value[0][9];
$cr_tmp_post=$select_field_value[0][10];
$cr_tmp_url=$select_field_value[0][11];
$cr_tmp_phone=$select_field_value[0][12];
$cr_tmp_phone2=$select_field_value[0][13];
$cr_tmp_fax=$select_field_value[0][14];
$cr_tmp_com=$select_field_value[0][15];
$cr_tmp_uname=$select_field_value[0][16];
$cr_tmp_pwd=$select_field_value[0][17];
/*
// 2nd checking of parameters in URL
// Check code (time)
if (crypt($cr_tmp_time, $code)!=$code) {
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1000;
	$_SESSION['errors'][0]['message']="An error occurred during confirmation. Please contact us.";
	$_SESSION['l_errors']=1;
	// Redirect user to registration error page
	header('Location: '.$url_root.'regist_error.php');
	exit();
}

// Check email
if ($cr_tmp_email!=$email) {
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1000;
	$_SESSION['errors'][0]['message']="An error occurred during confirmation. Please contact us.";
	$_SESSION['l_errors']=1;
	// Redirect user to registration error page
	header('Location: '.$url_root.'regist_error.php');
	exit();
}
*/
// Check if user was already registered
$count_table_name="cr";
$count_field_name=array();
$count_field_name[0]="cr_uname";
$count_field_value=array();
$count_field_value[0]=$cr_tmp_uname;
$num=0;
$errors="";
if (!db_count($count_table_name, $count_field_name, $count_field_value, $num, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1127;
			$_SESSION['errors'][0]['message']=$errors." to db_count()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'regist_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4040;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

/*
if ($num!=0) {
	// User already registered
	// Redirect user to registration success page
	header('Location: '.$url_root.'regist_success.php');
	exit();
}
*/
// Store information in C2, C3 and C4

// Get current time
$current_time=date("Y-m-d H:i:s");

// Insert values into cc (C2. Contact) table
$insert_table_name="cc";
$insert_field_name=array();
$insert_field_value=array();
$insert_field_name[0]="cc_loaddate";
$insert_field_value[0]=$current_time;
$insert_field_name[1]="cc_email";
$insert_field_value[1]=$cr_tmp_email;
$cnt=2;
if ($cr_tmp_fname!="") {
	$insert_field_name[$cnt]="cc_fname";
	$insert_field_value[$cnt]=$cr_tmp_fname;
	$cnt++;
}
if ($cr_tmp_lname!="") {
	$insert_field_name[$cnt]="cc_lname";
	$insert_field_value[$cnt]=$cr_tmp_lname;
	$cnt++;
}
if ($cr_tmp_obs!="") {
	$insert_field_name[$cnt]="cc_obs";
	$insert_field_value[$cnt]=$cr_tmp_obs;
	$cnt++;
}
if ($cr_tmp_add1!="") {
	$insert_field_name[$cnt]="cc_add1";
	$insert_field_value[$cnt]=$cr_tmp_add1;
	$cnt++;
}
if ($cr_tmp_add2!="") {
	$insert_field_name[$cnt]="cc_add2";
	$insert_field_value[$cnt]=$cr_tmp_add2;
	$cnt++;
}
if ($cr_tmp_city!="") {
	$insert_field_name[$cnt]="cc_city";
	$insert_field_value[$cnt]=$cr_tmp_city;
	$cnt++;
}
if ($cr_tmp_state!="") {
	$insert_field_name[$cnt]="cc_state";
	$insert_field_value[$cnt]=$cr_tmp_state;
	$cnt++;
}
if ($cr_tmp_country!="") {
	$insert_field_name[$cnt]="cc_country";
	$insert_field_value[$cnt]=$cr_tmp_country;
	$cnt++;
}
if ($cr_tmp_post!="") {
	$insert_field_name[$cnt]="cc_post";
	$insert_field_value[$cnt]=$cr_tmp_post;
	$cnt++;
}
if ($cr_tmp_url!="") {
	$insert_field_name[$cnt]="cc_url";
	$insert_field_value[$cnt]=$cr_tmp_url;
	$cnt++;
}
if ($cr_tmp_phone!="") {
	$insert_field_name[$cnt]="cc_phone";
	$insert_field_value[$cnt]=$cr_tmp_phone;
	$cnt++;
}
if ($cr_tmp_phone2!="") {
	$insert_field_name[$cnt]="cc_phone2";
	$insert_field_value[$cnt]=$cr_tmp_phone2;
	$cnt++;
}
if ($cr_tmp_fax!="") {
	$insert_field_name[$cnt]="cc_fax";
	$insert_field_value[$cnt]=$cr_tmp_fax;
	$cnt++;
}
if ($cr_tmp_com!="") {
	$insert_field_name[$cnt]="cc_com";
	$insert_field_value[$cnt]=$cr_tmp_com;
	$cnt++;
}
$cc_id=0;
$errors="";
if (!db_insert($insert_table_name, $insert_field_name, $insert_field_value, FALSE, $cc_id, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1128;
			$_SESSION['errors'][0]['message']=$errors." to db_insert()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'regist_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4041;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Update cc (C2. Contact): set cc_id as cc_code
$update_table_name="cc";
$update_field_name=array();
$update_field_value=array();
$update_field_name[0]="cc_code";
$update_field_value[0]=$cc_id;
$update_where_field_name=array();
$update_where_field_value=array();
$update_where_field_name[0]="cc_id";
$update_where_field_value[0]=$cc_id;
$update_errors="";
if (!db_update($update_table_name, $update_field_name, $update_field_value, $update_where_field_name, $update_where_field_value, FALSE, $update_errors)) {
	// Database error
	switch ($update_errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1143;
			$_SESSION['errors'][0]['message']=$update_errors." to db_update()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4048;
			$_SESSION['errors'][0]['message']=$update_errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Insert values into cr (C3. Registry) table
$insert_table_name="cr";
$insert_field_name=array();
$insert_field_name[0]="cc_id";
$insert_field_name[1]="cr_uname";
$insert_field_name[2]="cr_pwd";
$insert_field_name[3]="cr_regdate";
$insert_field_name[4]="cr_update";
$insert_field_value=array();
$insert_field_value[0]=$cc_id;
$insert_field_value[1]=$cr_tmp_uname;
$insert_field_value[2]=$cr_tmp_pwd;
$insert_field_value[3]=$current_time;
$insert_field_value[4]=$current_time;
$cr_id=0;
$errors="";
if (!db_insert($insert_table_name, $insert_field_name, $insert_field_value, FALSE, $cr_id, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1129;
			$_SESSION['errors'][0]['message']=$errors." to db_insert()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'regist_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4042;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Insert values into cp (C4. Permissions) table
$insert_table_name="cp";
$insert_field_name=array();
$insert_field_name[0]="cr_id";
$insert_field_name[1]="cp_access";
$insert_field_value=array();
$insert_field_value[0]=$cr_id;
$insert_field_value[1]="0";
$cp_id=0;
$errors="";
if (!db_insert($insert_table_name, $insert_field_name, $insert_field_value, FALSE, $cp_id, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1130;
			$_SESSION['errors'][0]['message']=$errors." to db_insert()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'regist_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4043;
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
			$_SESSION['errors'][0]['code']=1131;
			$_SESSION['errors'][0]['message']=$errors." to db_delete()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'regist_error.php');
			exit();
		case "Error in the logical operators given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1132;
			$_SESSION['errors'][0]['message']=$errors." to db_delete()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'regist_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4044;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}

// Inform user that they were successfully registered
header('Location: '.$url_root.'regist_success.php');
exit();

?>
