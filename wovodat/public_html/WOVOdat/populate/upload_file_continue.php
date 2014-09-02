<?php

/**********************************

This page is displayed if an upload was already launched (and not finished), while the user tries to upload another file.
It shows a small message for users to know about the issue and asks them whether they want to continue or abort the previous upload.
Depending on the answer, it launches upload_file_cancel.php or upload_file_confirm.php.

**********************************/

// Set unlimited capacity and time for processing
ini_set("memory_limit","-1");
set_time_limit(0);
session_start();

// Check login
require_once("php/include/login_check.php");

// Get root url
require_once "php/include/get_root.php";

// No upload started
if (!isset($_SESSION['upload'])) {
	// Redirect to page: upload start
	header('Location: '.$url_root.'home_populate.php');
	exit();
}

// Get file name and upload date

$ori_file_name=$_SESSION['upload']['ori_file_name'];
	
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
			
			<!-- Left content -->
			<div id="contentl">
				<!-- Page content -->
				<h1>File upload in progress</h1>
				<p><b>Warning!</b> You have already started to upload a file ("<b><?php print $ori_file_name; ?></b>") to WOVOdat. Do you wish to abort this upload?</p>
				<form method="post" action="upload_file_cancel.php" name="form1">
					<input type="submit" name="upload_file_cancel" value="Abort upload" />
				</form>
				<form method="post" action="upload_file_confirm.php" name="form2">
					<input type="submit" name="upload_file_confirm" value="Continue upload" />
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