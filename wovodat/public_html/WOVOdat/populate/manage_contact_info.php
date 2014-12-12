<?php

/**********************************

This page is the entry point to the system for users to update their contact information.
It displays a form with the current values of the user's contact information.
The user is free to change these values and when the form is submitted, update_contact_info.php is launched.

**********************************/

// Check login
require_once("php/include/login_check.php");

// Get root url
require_once "php/include/get_root.php";

// 1st access
if (!isset($_SESSION['mng_ccinfo'])) {
	// If direct access
	if (!isset($_POST['manage_contact_info_ok'])) {
		// Default user: themselves
		$selected_user=$_SESSION['login']['cc_id'];
	}
	else {
		// Get user for which contact info has to be changed
		$selected_user=$_POST['select_user_ccinfo'];
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");

	// Get info for this user
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
	$select_where_field_value[0]=$selected_user;
	$errors="";
	if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1106;
				$_SESSION['errors'][0]['message']=$errors." to db_select()";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4026;
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
		$_SESSION['errors'][0]['code']=1107;
		$_SESSION['errors'][0]['message']="Multiple rows in the cc table correspond to this cc_id: '".$selected_user."'";
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
}

// 2nd access
else {
	// Get stored information
	$selected_user=$_SESSION['mng_ccinfo']['id'];
	$cc_fname=$_SESSION['mng_ccinfo']['fname'];
	$cc_lname=$_SESSION['mng_ccinfo']['lname'];
	$cc_obs=$_SESSION['mng_ccinfo']['obs'];
	$cc_add1=$_SESSION['mng_ccinfo']['add1'];
	$cc_add2=$_SESSION['mng_ccinfo']['add2'];
	$cc_city=$_SESSION['mng_ccinfo']['city'];
	$cc_state=$_SESSION['mng_ccinfo']['state'];
	$cc_country=$_SESSION['mng_ccinfo']['country'];
	$cc_post=$_SESSION['mng_ccinfo']['post'];
	$cc_url=$_SESSION['mng_ccinfo']['url'];
	$cc_email=$_SESSION['mng_ccinfo']['email'];
	$cc_phone=$_SESSION['mng_ccinfo']['phone'];
	$cc_phone2=$_SESSION['mng_ccinfo']['phone2'];
	$cc_fax=$_SESSION['mng_ccinfo']['fax'];
	$cc_com=$_SESSION['mng_ccinfo']['com'];
	$email_error=$_SESSION['mng_ccinfo']['email_error'];
	$com_error=$_SESSION['mng_ccinfo']['com_error'];
	$error=$email_error || $com_error;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">	
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>
	<div id="wrapborder">
	<div id="wrap">
		<div id="headershadow">
			<?php include 'php/include/header_beta.php'; ?>
		</div>

		<!-- Content -->
		<div id="content">	
			<div id="contentl">
		<!-- Top of the page -->
		
		<!-- Page content -->
		<h1>Manage contact information</h1>
		<p class="redtext"><?php if ($error) {print "Update unsuccessful! Please correct the fields in red:";} ?></p>
		<!-- Form -->
		<form method="post" action="update_contact_info.php" name="update_cc">
			<table class="formtable">
				<input type="hidden" name="id" value="<?php print $selected_user; ?>" />
				<tr>
					<th>First name:</th>
					<td>
						<input type="text" maxlength="30" name="fname" value="<?php print $cc_fname; ?>" />
					</td>
				</tr>
				<tr>
					<th>Last name:</th>
					<td>
						<input type="text" maxlength="30" name="lname" value="<?php print $cc_lname; ?>" />
					</td>
				</tr>
				<tr>
					<th>Observatory:</th>
					<td>
						<input type="text" maxlength="150" name="obs" value="<?php print $cc_obs; ?>" />
					</td>
				</tr>
				<tr>
					<th>Address1:</th>
					<td>
						<input type="text" maxlength="60" name="add1" value="<?php print $cc_add1; ?>" />
					</td>
				</tr>
				<tr>
					<th>Address2:</th>
					<td>
						<input type="text" maxlength="60" name="add2" value="<?php print $cc_add2; ?>" />
					</td>
				</tr>
				<tr>
					<th>City:</th>
					<td>
						<input type="text" maxlength="50" name="city" value="<?php print $cc_city; ?>" />
					</td>
				</tr>
				<tr>
					<th>State, Province or Prefecture:</th>
					<td>
						<input type="text" maxlength="30" name="state" value="<?php print $cc_state; ?>" />
					</td>
				</tr>
				<tr>
					<th>Country:</th>
					<td>
						<input type="text" maxlength="50" name="country" value="<?php print $cc_country; ?>" />
					</td>
				</tr>
				<tr>
					<th>Postal code:</th>
					<td>
						<input type="text" maxlength="30" name="post" value="<?php print $cc_post; ?>" />
					</td>
				</tr>
				<tr>
					<th>Web address:</th>
					<td>
						<input type="text" maxlength="255" name="url" value="<?php print $cc_url; ?>" />
					</td>
				</tr>
				<tr>
					<th<?php if ($email_error) {print " class=\"redtext\"";} ?>>E-mail address (an email will be sent to confirm validity):</th>
					<td>
						<input type="text" maxlength="255" name="email" value="<?php print $cc_email; ?>" />
					</td>
				</tr>
				<tr>
					<th>Phone:</th>
					<td>
						<input type="text" maxlength="50" name="phone" value="<?php print $cc_phone; ?>" />
					</td>
				</tr>
				<tr>
					<th>Phone 2:</th>
					<td>
						<input type="text" maxlength="50" name="phone2" value="<?php print $cc_phone2; ?>" />
					</td>
				</tr>
				<tr>
					<th>Fax:</th>
					<td>
						<input type="text" maxlength="60" name="fax" value="<?php print $cc_fax; ?>" />
					</td>
				</tr>
				<tr>
					<th<?php if ($com_error) {print " class=\"redtext\"";} ?>>Comments (max length: 255 characters):</th>
					<td>
						<textarea name="com" cols="40" rows="5" onkeydown="limitText(this, 255)"><?php print $cc_com; ?></textarea>
					</td>
				</tr>
			</table>
			<input type="submit" name="manage_contact_info_ok" value="OK" />
		</form>

			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>
