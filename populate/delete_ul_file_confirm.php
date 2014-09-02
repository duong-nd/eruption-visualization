<?php

/**********************************

This page is for the administrator to confirm the selection of the file they want to delete.
When form is submitted, delete_ul_file_check.php is launched.

**********************************/

// Check login
require_once("php/include/login_check.php");

// Get root url
require_once "php/include/get_root.php";

// Check direct access
if (!isset($_POST['select_file_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Check no selection
if (!isset($_POST['select_file'])) {
	$_SESSION['delete_ul_file_check']['message']="Please select a file";
	// Redirect to home page
	header('Location: '.$url_root.'delete_ul_file_list.php');
	exit();
}

// Get posted information
$selected_cu_id=$_POST['select_file'];

// Import necessary scripts
require_once("php/funcs/db_funcs.php");

// Get file name and upload date
$query_sql="SELECT cu_file, cu_type, cu_loaddate, cc_id_load FROM cu WHERE cu_id=".$selected_cu_id;
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [delete_ul_file_confirm.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Get type and check
if ($query_results[0]['cu_type']!="PE" && $query_results[0]['cu_type']!="TE") {
	$_SESSION['delete_ul_file_check']['message']="Cannot delete this type of file (only PE and TE)";
	// Redirect user to system error page
	header('Location: '.$url_root.'delete_ul_file_list.php');
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
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes, Volcan, Vulkan, eruption, forecasting, forecast, predict, prediction, hazard, desaster, disaster, desasters, disasters, database, data warehouse, format, formats, WOVO, WOVOdat, IAVCEI, sharing, streaming, earthquake, earthquakes, seismic, seismicity, seismology, deformation, INSar, GPS, uplift, caldera, stratovolcano, stratovulcano">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">	
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>

	<div id="wrapborder">
	<div id="wrap">
		<div id="headershadow">
			<?php include 'php/include/header_beta.php'; ?>
		</div>

		<!-- Content -->
		<div id="content">
			<div id="content_ref">
			
				<!-- Top of the page -->
				<div id="top">
					<!-- Aligned to the right: You are logged in as username (FName LName | Obs) | Logout -->
					<p>Login as <b><?php print $uname; ?></b> | <a href="logout.php">Logout</a></p>
				</div>
		
		<!-- Page content -->
		<h1>Delete uploaded file</h1>
		<p><b>Warning!</b> File <b><?php print htmlentities($query_results[0]['cu_file'], ENT_COMPAT, "cp1252"); ?></b> will be deleted from database and server. Are you really sure you want to do that?</p>
		<form method="post" action="delete_ul_file_check.php" name="delete_ul_file_confirm">
			<input type="hidden" name="cu_id" value="<?php print $selected_cu_id; ?>" />
			<input type="hidden" name="cu_file" value="<?php print htmlentities($query_results[0]['cu_file'], ENT_COMPAT, "cp1252"); ?>" />
			<input type="hidden" name="cu_type" value="<?php print htmlentities($query_results[0]['cu_type'], ENT_COMPAT, "cp1252"); ?>" />
			<input type="hidden" name="cu_loaddate" value="<?php print htmlentities($query_results[0]['cu_loaddate'], ENT_COMPAT, "cp1252"); ?>" />
			<input type="hidden" name="cc_id_load" value="<?php print htmlentities($query_results[0]['cc_id_load'], ENT_COMPAT, "cp1252"); ?>" />
			<input type="submit" name="delete_ul_file_check_ok" value="OK" />
		</form>

		<form method="post" action="home.php" name="donot_delete_ul_file_check">
			<input type="submit" name="delete_ul_file_check_cancel" value="Cancel" />
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
