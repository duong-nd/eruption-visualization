<?php

/**********************************

This script is important for the HTTP session security.
It regenerates the session ID (so that it cannot be fixed) and checks the HTTP user agent (session is likely to be hacked if it changes -> ask user to login again).

**********************************/

// Start session
session_start();

// Regenerate session ID
session_regenerate_id(true);

// If session already started
if (isset($_SESSION['HTTP_USER_AGENT'])) {
	if ($_SESSION['HTTP_USER_AGENT']!=md5($_SERVER['HTTP_USER_AGENT'])) {
		
		// Set root url
		$url_root="http://{$_SERVER['SERVER_NAME']}/populate/";
		
		// Destroy session variables
		session_destroy();
		
		// Redirect to "login required" page for user to re-login
		header('Location: '.$url_root.'login_required.php');
		exit();
	}
}

// Else
$_SESSION['HTTP_USER_AGENT']=md5($_SERVER['HTTP_USER_AGENT']);

?>