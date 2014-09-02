<?php

/**********************************

This page displays the list of data going to be uploaded to the database (possibly these data are ploted with JPGraph), and asks user to confirm upload.
It also displays a warning message if some data are going to be overwritten.
When user confirms, upload_file_upload.php is launched.

**********************************/

// Set unlimited capacity and time for processing
ini_set("memory_limit","-1");
set_time_limit(180);

// Check login
require_once "php/include/login_check.php";

// Set root URL
$url_root="http://{$_SERVER['SERVER_NAME']}/populate/";

// Check direct access
if (!isset($_SESSION['upload'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Get information to be displayed (depends on file type)
$file_type=$_SESSION['upload']['file_type'];
switch ($file_type) {
	case "ini_csv_cc":
		// Initialization CSV file for contacts
	case "ini_csv_cc_no_ul":
		// Initialization CSV file for contacts, no upload to DB
	case "ini":
		// Initialization WOVOML file
	case "ini_no_ul":
		// Initialization WOVOML file, no upload to DB
		
		// No information to be displayed -- Only file type
		$main_message="This file is an initialization file.";
		$data_list=array();
		
		break;
	case "ori":
		// Observatory file
	case "ori_no_ul":
		// Observatory file, no upload to DB
	case "wovoml":
		// Initialization WOVOML file
	case "wovoml_no_ul":
		// Initialization WOVOML file, no upload to DB
	case "wovoml_no_pub":
		// WOVOML file, no checking of publish dates
		
		// Get data from WOVOML file
		$main_message="This file contains the following data";
		$data_list=array();
		require_once "php/include/get_data/wovoml.php";
		break;
	default:
		// Report error
		$file_name=$_SESSION['upload']['file_name'];
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1876;
		$_SESSION['errors'][0]['message']="Type of file was not recognized: file_name=$file_name, file_type=$file_type [upload_file_confirm.php]";
		$_SESSION['l_errors']=1;
		
		// Redirect to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
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
			<!-- Header -->
				<?php include 'php/include/header_beta.php'; ?>

			<!-- Content -->
			<div id="content">
				<!-- Left panel -->
				<div id="contentl">
					<!-- Page content -->
					<h1>Please confirm upload</h1>
					<p>You are going to upload data to WOVOdat. These data will be open to the public 2 years after date of occurrence or (if the latter is not available) date of upload.</p>
<?php

// If there are warnings
if (!empty($_SESSION['upload']['warnings'])) {
	
	// Open list of warnings
	print <<<STRING
					<p><b>Warning!</b> The following data that you are trying to upload were already found in the database. Please check the codes you used (must be unique identifiants for each data) otherwise data will be overwritten.</p>
					<ul>
STRING;

	// Loop on warning messages
	foreach ($_SESSION['upload']['warnings'] as $warning) {
		print <<<STRING
						<li>$warning</li>
STRING;
	}
	
	// Close list of warnings
	print <<<STRING
					</ul>
STRING;

}

?>
					<p><?php print $main_message; ?></p>
<?php

// List of data contained in file
print "\t\t\t\t\t<ul>\n";

foreach ($data_list as $data_list_element) {
	print "\t\t\t\t\t\t<li>\n";
	// Display data name and number (e.g.: "Observations: 155 objects")
	if ($data_list_element['number']>1) {
		print "\t\t\t\t\t\t\t<p>".$data_list_element['name'].": ".$data_list_element['number']." objects</p>\n";
	}
	else {
		print "\t\t\t\t\t\t\t<p>".$data_list_element['name'].": ".$data_list_element['number']." object</p>\n";
	}
	
	print "\t\t\t\t\t\t</li>\n";
}

print "\t\t\t\t\t</ul>\n";

?>
					<form method="post" action="upload_file_cancel.php" name="form1">
						<input type="submit" name="upload_file_cancel" value="Cancel" />
					</form>
					<form method="post" action="upload_file_upload.php" name="form2">
						<input type="submit" name="confirm_file_upload" value="Confirm" />
					</form>
				</div>
				
				<!-- Right panel -->
				<div id="contentr">
<?php

// Create folder for display images
$display_folder="/home/wovodat/public_html/WOVOdat/output/".$_SESSION['login']['cc_id']."_".$_SESSION['upload']['current_time'];
$src_folder="/output/".$_SESSION['login']['cc_id']."_".$_SESSION['upload']['current_time'];
if (!file_exists($display_folder)) {
	mkdir($display_folder);
}
$_SESSION['upload']['display']=array();
$_SESSION['upload']['display']['folder']=$display_folder;
$_SESSION['upload']['display']['files']=array();

// List sets of data
print "\t\t\t\t\t<ul>\n";

// Import date-time functions
include_once "php/funcs/datetime_funcs.php";

foreach ($data_list as $data_list_key => $data_list_element) {
	// If sets of data are not empty, display them
	if (!empty($data_list_element['sets'])) {
		include "php/include/display_data/".$version."/".$data_list_key.".php";
	}
}

print "\t\t\t\t\t</ul>\n";

?>
				</div>
			</div>
			
			<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
			
		</div>
	</div>
</body>
</html>