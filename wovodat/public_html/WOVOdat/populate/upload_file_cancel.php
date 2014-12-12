<?php

/**********************************

This script is run when a user chose to abort a previous upload (from upload_file_continue.php) or doesn't confirm upload of current file (from upload_file_confirm.php).
It deletes all related data and redirects back to the home page.

**********************************/

// Set unlimited capacity and time for processing
ini_set("memory_limit","-1");
set_time_limit(0);

// Check login
require_once "php/include/login_check.php";

// Get root url
require_once "php/include/get_root.php";

// If direct access
if (!isset($_POST['upload_file_cancel'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home_populate.php');
	exit();
}

// Delete display files
foreach ($_SESSION['upload']['display']['files'] as $file) {
	unlink($file);
}
rmdir($_SESSION['upload']['display']['folder']);

// Delete file
unlink($_SESSION['upload']['ul_file_name']);

// Unset upload variables
unset($_SESSION['upload']);

// Redirect to home page
header('Location: '.$url_root.'home_populate.php');

?>