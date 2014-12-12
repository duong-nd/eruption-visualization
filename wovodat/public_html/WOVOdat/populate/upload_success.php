<?php

/**********************************

This page displays a small message to confirm that the operation of updating user's contact information/password was successful.

**********************************/

// Start session
session_start();

// Get message
$message=$_SESSION['upload']['message'];
if ($message=="" || $message==NULL) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

unset($_SESSION['upload']);

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
			<div id="contentl"><br>
		<!-- Page content -->
		<h1>Upload successful</h1>
		<p><b>Thank you</b> for your contribution to WOVOdat.</p>
		<p><?php print $message; ?></p>
		<p>You may now go back to the <a href="home_populate.php">home page</a> for any other operation.</p>

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