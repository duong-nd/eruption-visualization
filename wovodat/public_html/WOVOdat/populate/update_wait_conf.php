<?php

/**********************************

This page displays a small message to let the users know that an email was sent to their newly updated email address.
They shall click the link given in that email in order to confirm the update.

**********************************/

// Start session
session_start();

// Get root url
require_once "php/include/get_root.php";

// If no registration was started
if (!isset($_SESSION['mng_ccinfo']['email_sent'])) {
	// Redirect to welcome page
	header('Location: '.$url_root.'index.php');
	exit();
}

// Get email address
$email=$_SESSION['mng_ccinfo']['email'];

// Unset session variables used for registration
unset($_SESSION['mng_ccinfo']);

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
		<h1>Email update waiting confirmation</h1>
		<p>Thank you for registering to WOVOdat. An email was sent to your new email address (<?php print $email; ?>) for you to confirm its validity. Once you receive it, please click on the link provided.</p>
		<p>If you do not receive any email after several hours, please check your Spam/Junk email inbox. If it is not there, try to register again and make sure that the email address you entered is valid.</p>
		<p>Feel free to <a href="http://www.wovodat.org/populate/contact_us_form.php">Contact us</a> if you have any question or issue.</p>
		<br />
		<p><a href="index.php">Go back to home page</a></p>

			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>