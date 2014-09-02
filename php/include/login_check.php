<?php

/**********************************

This script is called every time a page is displayed, which requires users to be logged in.

**********************************/

/* MAINTENANCE - START */
/*
// Start session (and check user-agent)
include "php/include/check_session.php";

// If the session was not started yet OR if user is not Alex
if (!isset($_SESSION['login']['cr_uname']) || $_SESSION['login']['cc_id']!=3) {
	// Get root url
	require_once "php/include/get_root.php";
	
	// Redirect to maintenance page
	header('Location: '.$url_root.'maintenance.php');
	exit();
}

// Get login ID and user name
$uname=$_SESSION['login']['cr_uname'];
$user_name=$_SESSION['login']['user_name'];
*/
/* MAINTENANCE - END */

// Start session (and check user-agent)
include "php/include/check_session.php";

// If the session was not started yet
if (!isset($_SESSION['login']['cr_uname'])) {
	// Get root url
	require_once "php/include/get_root.php";
	
	// Redirect to login required page
	header('Location: '.$url_root.'login_required.php');
	exit();
}

// Get login ID and user name
$uname=$_SESSION['login']['cr_uname'];
$user_name=$_SESSION['login']['user_name'];

?>