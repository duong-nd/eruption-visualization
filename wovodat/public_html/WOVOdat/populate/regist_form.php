<?php

// Start session
session_start();

// Regenerate session ID
session_regenerate_id(true);

// If session already started
if (isset($_SESSION['HTTP_USER_AGENT'])) {
	if ($_SESSION['HTTP_USER_AGENT']!=md5($_SERVER['HTTP_USER_AGENT'])) {
		// Destroy session variables
		session_destroy();
	}
}

// Else
$_SESSION['HTTP_USER_AGENT']=md5($_SERVER['HTTP_USER_AGENT']);

// If 1st access
if (!isset($_SESSION['register'])) {
	// Blank fields
	$uname="";
	$password="";
	$conf_password="";
	$email="";
	$fname="";
	$lname="";
	$obs="";
	$add1="";
	$add2="";
	$city="";
	$state="";
	$country="";
	$post="";
	$url="";
	$phone="";
	$phone2="";
	$fax="";
	$com="";
	
	// No error
	$uname_error=FALSE;
	$password_error=FALSE;
	$email_error=FALSE;
	$regist_error=FALSE;
	$com_error=FALSE;
	$error=FALSE;
}

// 2nd time access
else {
	// Get fields
	$uname=$_SESSION['register']['uname'];
	$password=$_SESSION['register']['password'];
	$conf_password=$_SESSION['register']['conf_password'];
	$email=$_SESSION['register']['email'];
	$fname=$_SESSION['register']['fname'];
	$lname=$_SESSION['register']['lname'];
	$obs=$_SESSION['register']['obs'];
	$add1=$_SESSION['register']['add1'];
	$add2=$_SESSION['register']['add2'];
	$city=$_SESSION['register']['city'];
	$state=$_SESSION['register']['state'];
	$country=$_SESSION['register']['country'];
	$post=$_SESSION['register']['post'];
	$url=$_SESSION['register']['url'];
	$phone=$_SESSION['register']['phone'];
	$phone2=$_SESSION['register']['phone2'];
	$fax=$_SESSION['register']['fax'];
	$com=$_SESSION['register']['com'];
	
	// Get error, if any
	$uname_error=$_SESSION['register']['uname_error'];
	$password_error=$_SESSION['register']['password_error'];
	$email_error=$_SESSION['register']['email_error'];
	$regist_error=$_SESSION['register']['regist_error'];
	$com_error=$_SESSION['register']['com_error'];
	$error=$uname_error || $password_error || $email_error || $regist_error || $com_error;
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
			<?php include 'php/include/header_beta.php'; ?>
		<!-- Content -->

		<div id="content">
			<div id="contentl">
		<!-- Page content -->
		
		<h2>User registration form</h2>
		<p>Welcome to the registration form for WOVOdat!
		<br>(the fields preceded by * are required)</p>
		<p class="redtext"><?php if ($error) {print "Registration unsuccessful! Please correct the fields in red:";} ?></p>
		
		<!-- Form -->
		<form method="post" action="regist_check.php" name="form1">
			<table class="formtable" id="formtable">
				<tr>
					<th<?php if ($uname_error || $regist_error) {print " class=\"redtext\"";} ?>>*Username:</th>
					<td>
						<input type="text" maxlength="30" name="uname" value="<?php print $uname; ?>" /><span class="redtext"><?php if ($regist_error) {print " (Username already used, please choose another one)";} ?></span>
					</td>
				</tr>
				<tr>
					<th<?php if ($password_error) {print " class=\"redtext\"";} ?>>*Password (&ge; 6 characters):</th>
					<td>
						<input type="password" maxlength="30" name="password" value="<?php print $password; ?>" />
					</td>
				</tr>
				<tr>
					<th<?php if ($password_error) {print " class=\"redtext\"";} ?>>*Confirm password:</th>
					<td>
						<input type="password" maxlength="30" name="conf_password" value="<?php print $conf_password; ?>" />
					</td>
				</tr>
				<tr>
					<th<?php if ($email_error) {print " class=\"redtext\"";} ?>>*Email address:</th>
					<td>
						<input type="text" maxlength="320" name="email" value="<?php print $email; ?>" />
					</td>
				</tr>
				<tr>
					<th>First name:</th>
					<td>
						<input type="text" maxlength="30" name="fname" value="<?php print $fname; ?>" />
					</td>
				</tr>
				<tr>
					<th>Last name:</th>
					<td>
						<input type="text" maxlength="30" name="lname" value="<?php print $lname; ?>" />
					</td>
				</tr>
				<tr>
					<th>Observatory:</th>
					<td>
						<input type="text" maxlength="150" name="obs" value="<?php print $obs; ?>" />
					</td>
				</tr>
				<tr>
					<th>Address1:</th>
					<td>
						<input type="text" maxlength="60" name="add1" value="<?php print $add1; ?>" />
					</td>
				</tr>
				<tr>
					<th>Address2:</th>
					<td>
						<input type="text" maxlength="60" name="add2" value="<?php print $add2; ?>" />
					</td>
				</tr>
				<tr>
					<th>City:</th>
					<td>
						<input type="text" maxlength="50" name="city" value="<?php print $city; ?>" />
					</td>
				</tr>
				<tr>
					<th>State, Province or Prefecture:</th>
					<td>
						<input type="text" maxlength="30" name="state" value="<?php print $state; ?>" />
					</td>
				</tr>
				<tr>
					<th>Country:</th>
					<td>
						<input type="text" maxlength="50" name="country" value="<?php print $country; ?>" />
					</td>
				</tr>
				<tr>
					<th>Postal code:</th>
					<td>
						<input type="text" maxlength="30" name="post" value="<?php print $post; ?>" />
					</td>
				</tr>
				<tr>
					<th>Web address:</th>
					<td>
						<input type="text" maxlength="255" name="url" value="<?php print $url; ?>" />
					</td>
				</tr>
				<tr>
					<th>Phone:</th>
					<td>
						<input type="text" maxlength="50" name="phone" value="<?php print $phone; ?>" />
					</td>
				</tr>
				<tr>
					<th>Phone 2:</th>
					<td>
						<input type="text" maxlength="50" name="phone2" value="<?php print $phone2; ?>" />
					</td>
				</tr>
				<tr>
					<th>Fax:</th>
					<td>
						<input type="text" maxlength="60" name="fax" value="<?php print $fax; ?>" />
					</td>
				</tr>
				<tr>
					<th<?php if ($com_error) {print " class=\"redtext\"";} ?>>Comments:</th>
					<td>
						<textarea name="com" cols="40" rows="5" onkeydown="limitText(this, 255)"><?php print $com; ?></textarea><span class="redtext"><?php if ($com_error) {print " Comments should not exceed 255 characters";} ?></span>
					</td>
				</tr>
				<tr>
				</tr>
			</table>
			<input type="submit" name="cancel" value="Cancel" />
			<input type="submit" name="confirm" value="Confirm" />
		</form>
		
			</div>
			<div id="contentr">
			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>
