<?php
// Allow unlimited capacity and time
ini_set("memory_limit","-1");
set_time_limit(0);

// Check login
require_once "php/include/login_check.php";

// Get root url
require_once "php/include/get_root.php";

// Check direct access
if (!isset($_POST['check_select_table_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get posted information
$checked_tables=$_POST['select_table'];

// Initialize messages
$messages=array();

// Loop on tables and check (using include)
foreach ($checked_tables as $check_table) {
	// Initialize table messages
	$msgs=array();
	// Include fonction to do
	include "php/include/check/".$check_table.".php";
	$messages[$check_table]=$msgs;
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
			<div id="content_ref">
				
				<!-- Page content -->
				<h1>Check tables result</h1>
<?php

if (empty($checked_tables)) {
	print <<<STRING
				<p>No table was selected.</p>
STRING;
}
else {
	// Start list
	print <<<STRING
				<p>Here is a list of messages returned for each table checked:</p>
				<ul>
STRING;
	foreach ($messages as $table => $table_messages) {
		print <<<STRING
					<li>Table $table:</li>
STRING;
		if (empty($table_messages)) {
		print <<<STRING
					<p>No error found.</p>
STRING;
		}
		else {
			print <<<STRING
					<ul>
STRING;
			foreach ($table_messages as $message) {
				print <<<STRING
						<li>$message</li>
STRING;
			}
			print <<<STRING
					</ul>
STRING;
		}
	}
	print <<<STRING
				</ul>
STRING;
}
?>

				<p><a href="/populate/home.php">Go to homepage</a> or <a href="/populate/check_select_table.php">go to table selection page</a></p>
			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>
