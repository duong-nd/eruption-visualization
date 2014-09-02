<?php

/**********************************

This page exists only to redirect users to home_populate.php.
In the previous design, pages would redirect to home.php but it was decided to replace it with home_populate.php.
Hence, instead of replacing all the links in all the pages of the website, this simple script was just added to redirect users automatically to the correct page.

**********************************/

// Start session
session_start();

// Regenerate session ID
session_regenerate_id(true);

// Get root url
require_once "php/include/get_root.php";

// Redirect to new home page
header('Location: '.$url_root.'home_populate.php');
exit();

?>