<?php

/**********************************

This script checks the values entered in the form at manage_contact_info.php. If everything is correct, it updates the information in the 'cc' table.
If email address was updated, a confirmation email is sent to that address and user is redirected to update_wait_conf.php.
Else, the user is directly sent to update_success.php.

****Note: For you want to change email from web form, activate below email function.
**********************************/

// Database functions are needed
require_once("php/funcs/db_funcs.php");

// Start session
session_start();

// Get root url
require_once "php/include/get_root.php";

// If "OK" button was not pressed, go to home page (avoid errors)
if (!isset($_POST['manage_contact_info_ok'])) {
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get posted fields
$id=trim($_POST['id']);
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$obs=trim($_POST['obs']);
$add1=trim($_POST['add1']);
$add2=trim($_POST['add2']);
$city=trim($_POST['city']);
$state=trim($_POST['state']);
$country=trim($_POST['country']);
$post=trim($_POST['post']);
$url=trim($_POST['url']);
$email=trim($_POST['email']);
$phone=trim($_POST['phone']);
$phone2=trim($_POST['phone2']);
$fax=trim($_POST['fax']);
$com=trim($_POST['com']);

// Store fields
$_SESSION['mng_ccinfo']=array();
$_SESSION['mng_ccinfo']['id']=$_POST['id'];
$_SESSION['mng_ccinfo']['fname']=$_POST['fname'];
$_SESSION['mng_ccinfo']['lname']=$_POST['lname'];
$_SESSION['mng_ccinfo']['obs']=$_POST['obs'];
$_SESSION['mng_ccinfo']['add1']=$_POST['add1'];
$_SESSION['mng_ccinfo']['add2']=$_POST['add2'];
$_SESSION['mng_ccinfo']['city']=$_POST['city'];
$_SESSION['mng_ccinfo']['state']=$_POST['state'];
$_SESSION['mng_ccinfo']['country']=$_POST['country'];
$_SESSION['mng_ccinfo']['post']=$_POST['post'];
$_SESSION['mng_ccinfo']['url']=$_POST['url'];
$_SESSION['mng_ccinfo']['email']=$_POST['email'];
$_SESSION['mng_ccinfo']['phone']=$_POST['phone'];
$_SESSION['mng_ccinfo']['phone2']=$_POST['phone2'];
$_SESSION['mng_ccinfo']['fax']=$_POST['fax'];
$_SESSION['mng_ccinfo']['com']=$_POST['com'];

// Check errors
$_SESSION['mng_ccinfo']['email_error']=FALSE;
$_SESSION['mng_ccinfo']['com_error']=FALSE;
$error_found=FALSE;

// Check email: non empty
if ($email=="") {
	$_SESSION['mng_ccinfo']['email_error']=TRUE;
	$error_found=TRUE;
}

// Check length of comment: less than 255
if (strlen($_POST['com'])>255) {
	$_SESSION['mng_ccinfo']['com_error']=TRUE;
	$error_found=TRUE;
}

// If an error was found, redirect to previous page
if ($error_found) {
	header('Location: '.$url_root.'manage_contact_info.php');
	exit();
}

// Get old information
$select_table="cc";
$select_field_name=array();
$select_field_value=array();
$select_field_name[0]="cc_fname";
$select_field_name[1]="cc_lname";
$select_field_name[2]="cc_obs";
$select_field_name[3]="cc_add1";
$select_field_name[4]="cc_add2";
$select_field_name[5]="cc_city";
$select_field_name[6]="cc_state";
$select_field_name[7]="cc_country";
$select_field_name[8]="cc_post";
$select_field_name[9]="cc_url";
$select_field_name[10]="cc_email";
$select_field_name[11]="cc_phone";
$select_field_name[12]="cc_phone2";
$select_field_name[13]="cc_fax";
$select_field_name[14]="cc_com";
$select_where_field_name=array();
$select_where_field_value=array();
$select_where_field_name[0]="cc_id";
$select_where_field_value[0]=$id;
$errors="";
if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1138;
			$_SESSION['errors'][0]['message']=$errors." to db_select()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4045;
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
	$_SESSION['errors'][0]['code']=1139;
	$_SESSION['errors'][0]['message']="Multiple rows in the cc table correspond to this cc_id: '".$id."'";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}
// Get results
$cc_fname=$select_field_value[0][0];
$cc_lname=$select_field_value[0][1];
$cc_obs=$select_field_value[0][2];
$cc_add1=$select_field_value[0][3];
$cc_add2=$select_field_value[0][4];
$cc_city=$select_field_value[0][5];
$cc_state=$select_field_value[0][6];
$cc_country=$select_field_value[0][7];
$cc_post=$select_field_value[0][8];
$cc_url=$select_field_value[0][9];
$cc_email=$select_field_value[0][10];
$cc_phone=$select_field_value[0][11];
$cc_phone2=$select_field_value[0][12];
$cc_fax=$select_field_value[0][13];
$cc_com=$select_field_value[0][14];

// Update cc (C2. Contact) table (if the values are different)
$update_table_name="cc";
$update_field_name=array();
$update_field_value=array();
$cnt=0;
if ($cc_fname!=$fname) {
	$update_field_name[$cnt]="cc_fname";
	$update_field_value[$cnt]=$fname;
	$cnt++;
}
if ($cc_lname!=$lname) {
	$update_field_name[$cnt]="cc_lname";
	$update_field_value[$cnt]=$lname;
	$cnt++;
}
if ($cc_obs!=$obs) {
	$update_field_name[$cnt]="cc_obs";
	$update_field_value[$cnt]=$obs;
	$cnt++;
}
if ($cc_add1!=$add1) {
	$update_field_name[$cnt]="cc_add1";
	$update_field_value[$cnt]=$add1;
	$cnt++;
}
if ($cc_add2!=$add2) {
	$update_field_name[$cnt]="cc_add2";
	$update_field_value[$cnt]=$add2;
	$cnt++;
}
if ($cc_city!=$city) {
	$update_field_name[$cnt]="cc_city";
	$update_field_value[$cnt]=$city;
	$cnt++;
}
if ($cc_state!=$state) {
	$update_field_name[$cnt]="cc_state";
	$update_field_value[$cnt]=$state;
	$cnt++;
}
if ($cc_country!=$country) {
	$update_field_name[$cnt]="cc_country";
	$update_field_value[$cnt]=$country;
	$cnt++;
}
if ($cc_post!=$post) {
	$update_field_name[$cnt]="cc_post";
	$update_field_value[$cnt]=$post;
	$cnt++;
}
if ($cc_url!=$url) {
	$update_field_name[$cnt]="cc_url";
	$update_field_value[$cnt]=$url;
	$cnt++;
}
if ($cc_phone!=$phone) {
	$update_field_name[$cnt]="cc_phone";
	$update_field_value[$cnt]=$phone;
	$cnt++;
}
if ($cc_phone2!=$phone2) {
	$update_field_name[$cnt]="cc_phone2";
	$update_field_value[$cnt]=$phone2;
	$cnt++;
}
if ($cc_fax!=$fax) {
	$update_field_name[$cnt]="cc_fax";
	$update_field_value[$cnt]=$fax;
	$cnt++;
}
if ($cc_com!=$com) {
	$update_field_name[$cnt]="cc_com";
	$update_field_value[$cnt]=$com;
	$cnt++;
}
$update_where_field_name=array();
$update_where_field_value=array();
$update_where_field_name[0]="cc_id";
$update_where_field_value[0]=$id;
$errors="";
// If there is any field to update
if ($cnt!=0) {
	if (!db_update($update_table_name, $update_field_name, $update_field_value, $update_where_field_name, $update_where_field_value, FALSE, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1108;
				$_SESSION['errors'][0]['message']=$errors." to db_update()";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4027;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
}

// Store email in temporary registry table
if ($cc_email!=$email) {
	// Get current time
	$current_time=date("Y-m-d H:i:s");
	
	// Insert values into cr_tmp (C14. Temporary registry) table
	$insert_table_name="cr_tmp";
	$insert_field_name=array();
	$insert_field_value=array();
	$insert_field_name[0]="cr_tmp_time";
	$insert_field_value[0]=$current_time;
	$insert_field_name[1]="cr_tmp_email";
	$insert_field_value[1]=$email;
	$insert_field_name[2]="cr_tmp_uname";
	$insert_field_value[2]=$id;
	$cr_tmp_id=0;
	$errors="";
	if (!db_insert($insert_table_name, $insert_field_name, $insert_field_value, FALSE, $cr_tmp_id, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1140;
				$_SESSION['errors'][0]['message']=$errors." to db_insert()";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4046;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
	
	
	/* 
	The purpose of this email function is to notify the user who changed an email from "Change my contact info function" under Myaccount menu. So that the user gets notificaiton from the email. On the other hand, this email wont be sent out if the user makes changes other info except email.
	You need to change website link in the email content whe you activate this email function.
	
	// Send email for verifying validity of new email address

	// PEAR Mail package
	require_once "Mail-1.2.0/Mail.php";

	// Form user name
	$user_name="";
	if ($fname!="") {
		$user_name.=$fname;
		if ($lname!="") {
			$user_name.=" ".$lname;
		}
	}
	else {
		if ($lname!="") {
			$user_name.=$lname;
		}
		else {
			// No first name and no last name
			$user_name.=$obs;
		}
	}

	// New mail object
	$mail=Mail::factory("mail");
	
	$from="noreply@wovodat.org";
	$to=$user_name." <".$email.">";
	$subject="WOVOdat change email confirmation";
	$headers=array("From"=>$from, "Subject"=>$subject);
	$body="Hello ".$user_name.",\n\n".
	"You recently asked to change your email address for WOVOdat. To complete the update, please follow the link below:\n".
	"http://www.wovodat.org/populate/update_confirm.php?id=".$cr_tmp_id."&code=".urlencode(crypt($current_time))."&email=".urlencode($email)."\n".
	"(If clicking on the link does not work, try to copy and paste it into your browser.)\n\n".
	"If you did not wish to change your email address, please disregard this message.\n".
	"Please contact wovodat@ntu.edu.sg with any questions.\n\n".
	"Thanks,\n".
	"The WOVOdat team";

	// Send email
	$mail->send($to, $headers, $body);

	// If error
	if (PEAR::isError($mail)) {
		// Could not send email - Redirect to update_error.php
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1134;
		$_SESSION['errors'][0]['message']="Email update could not be completed. Please try again later.";
		$_SESSION['l_errors']=1;
		header('Location: '.$url_root.'update_error.php');
		exit();
	}

	// Inform user that they will receive an email for confirming registration soon
	$_SESSION['mng_ccinfo']['email_sent']=TRUE;
	header('Location: '.$url_root.'update_wait_conf.php');
	exit();
	
	*/
}

// Unset session variables used
unset($_SESSION['mng_ccinfo']);

// Inform user that data were successfully updated
header('Location: '.$url_root.'update_success.php');
exit();

?>