<?php

/**********************************

This script checks the values entered in the form from the forgot_password.php page.
If any error is found, the user is redirected back to the form page.
Else, a new random password is created and sent to them by email. The 'cr' table is updated as well.
Eventually the user is redirected to forgot_password_confirm.php.

**********************************/

require_once("php/funcs/db_funcs.php");

// Start session
session_start();

// Get root url
require_once "php/include/get_root.php";

// If button cancel was pressed, go back to welcome page
if (isset($_POST['cancel'])) {
	// Erase session data
	if (isset($_SESSION['forgot_pw'])) {
		unset($_SESSION['forgot_pw']);
	}
	header('Location: '.$url_root.'index.php');
	exit();
}

// Direct access
if (!isset($_POST['ok'])) {
	// Redirect to welcome page
	header('Location: '.$url_root.'index.php');
	exit();
}

// Get posted fields
$uname=trim($_POST['uname']);

// Store fields
$_SESSION['forgot_pw']=array();
$_SESSION['forgot_pw']['uname']=$_POST['uname'];

// Check errors
$_SESSION['forgot_pw']['uname_error']=FALSE;
if ($uname=="") {
	$_SESSION['forgot_pw']['uname_error']=TRUE;
	// Redirect to previous page
	header('Location: '.$url_root.'forgot_password.php');
	exit();
}

// Get cc_id
$select_table="cr";
$select_field_name=array();
$select_field_value=array();
$select_field_name[0]="cr_id";
$select_field_name[1]="cc_id";
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
			$_SESSION['errors'][0]['code']=1146;
			$_SESSION['errors'][0]['message']=$errors." to db_select()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4050;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}
$l_select_field_value=count($select_field_value);
switch ($l_select_field_value) {
	case 0:
		// User not found
		$_SESSION['forgot_pw']['uname_error']=TRUE;
		// Redirect to previous page
		header('Location: '.$url_root.'forgot_password.php');
		exit();
	case 1:
		// Ok
		break;
	default:
		// Only 1 result should be found
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1147;
		$_SESSION['errors'][0]['message']="Multiple rows in the cr table correspond to this cr_uname: '".$uname."'";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
}
$cr_id=$select_field_value[0][0];
$cc_id=$select_field_value[0][1];

// Get first name, last name, observatory name and email address
$select_table="cc";
$select_field_name=array();
$select_field_value=array();
$select_field_name[0]="cc_fname";
$select_field_name[1]="cc_lname";
$select_field_name[2]="cc_obs";
$select_field_name[3]="cc_email";
$select_where_field_name=array();
$select_where_field_value=array();
$select_where_field_name[0]="cc_id";
$select_where_field_value[0]=$cc_id;
$errors="";
if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1148;
			$_SESSION['errors'][0]['message']=$errors." to db_select()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4051;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}
$l_select_field_value=count($select_field_value);
if ($l_select_field_value>1) {
	// Only 1 result should be found
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1149;
	$_SESSION['errors'][0]['message']="Multiple rows in the cc table correspond to this cc_id: '".$cc_id."'";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}
$cc_fname=$select_field_value[0][0];
$cc_lname=$select_field_value[0][1];
$cc_obs=$select_field_value[0][2];
$cc_email=$select_field_value[0][3];

// Create new random password
// Length: from 6 to 12 characters
$length=mt_rand(6,12);
// Maximum number of underscores
$n_underscores=2;
$new_password="";
// Loop on length of password
for ($i=0; $i<$length; $i++) {
	// Random number for choice of character: number, uppercase letter, lowercase letter or underscore
	$c=mt_rand(1,7);
	switch ($c) {
		case ($c<=2):
			// Add a number
			$new_password.=mt_rand(0,9);   
		break;
		case ($c<=4):
			// Add an uppercase letter
			$new_password.=chr(mt_rand(65,90));   
		break;
		case ($c<=6):
			// Add a lowercase letter
			$new_password.=chr(mt_rand(97,122));   
		break;
		case 7:
			// Add an underscore (if possible)
			if ($n_underscores>0 && $i>0 && $i<($length-1) && $p[$i-1]!="_") {
				$new_password.="_";
				$n_underscores--;   
			}
			else {
				$i--;
				continue;
			}
		break;       
	}
}

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
			$_SESSION['errors'][0]['code']=1150;
			$_SESSION['errors'][0]['message']=$errors." to db_update()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4052;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}


// Unset session variables used
unset($_SESSION['forgot_pw']);

// Inform user that they will receive an email with their new password soon
header('Location: '.$url_root.'forgot_password_confirm.php?username='.$uname.'&password='.$new_password);
exit();

?>
