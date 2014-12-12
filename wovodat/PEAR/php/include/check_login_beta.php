<?php

// Start session
session_start();

// Set root url
$url_root="http://{$_SERVER['SERVER_NAME']}/";

// Check whether user logged in already
if (!isset($_SESSION['dev_login'])) {
	// Redirect to "login_beta.php" page for user to re-login
	header('Location: '.$url_root.'login_beta.php?redirect='.$redirect);
	exit();
}

// Check user-agent
if ($_SESSION['HTTP_USER_AGENT']!=md5($_SERVER['HTTP_USER_AGENT'])) {
	// Destroy session variables
	session_destroy();
	
	// Redirect to "login_beta.php" page for user to re-login
	header('Location: '.$url_root.'login_beta.php?redirect='.$redirect);
	exit();
}

?>
