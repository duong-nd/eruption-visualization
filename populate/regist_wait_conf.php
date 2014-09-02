<?php
/**********************************
This page displays a message to a user who just registered to WOVOdat.
This message tells the user to check their mailbox for an email to confirm registration to WOVOdat.
**********************************/

// Start session
session_start();
// Get root url
require_once "php/include/get_root.php";
// If no registration was started
if (!isset($_SESSION['register']['email_sent'])) {
	// Redirect to welcome page
	header('Location: '.$url_root.'index.php');
	exit();
}

// Get email address
$email=$_SESSION['register']['email'];

// Unset session variables used for registration
unset($_SESSION['register']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
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
		<h1>Registration waiting confirmation</h1>
		<p>Thank you for registering. An email was sent to your email address (<?php print $email; ?>) <b>for you to confirm registration</b>. Once you receive it, please click on the link provided.</p>
		<p>If you do not receive any email after several hours, please check your Spam/Junk email inbox. If it is not there, try to register again and make sure that the email address you entered is valid.</p>
		<p>Feel free to <a href="/populate/contact_us_form.php">contact us</a> if you have any question or issue.</p>
		<br />
		<p><a href="index.php">Go back to home page</a></p>

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