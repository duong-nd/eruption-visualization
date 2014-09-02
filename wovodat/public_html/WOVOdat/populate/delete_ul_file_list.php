<?php

// Import necessary scripts
require_once("php/funcs/db_funcs.php");

// Check login
require_once("php/include/login_check.php");

// Get root url
require_once "php/include/get_root.php";


// Get message from redirection
$message=NULL;
if (isset($_SESSION['delete_ul_file_check'])) {
	if (isset($_SESSION['delete_ul_file_check']['message'])) {
		$message=$_SESSION['delete_ul_file_check']['message'];
		unset($_SESSION['delete_ul_file_check']);
	}
}

// Get list of records stored cu table
$query_sql="SELECT cu_id, cu_file, cu_type, cu_com, cu_loaddate, cc_id_load FROM cu ORDER BY cu_loaddate ASC";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [delete_ul_file_list.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Get number of results
$cnt_results=count($query_results);

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
			
	
		<!-- Page content -->
		<h1>List of uploaded files</h1>
		<span class="redtext"><?php print $message; ?></span>
<?php

if ($cnt_results==0) {
	print <<<STRING
		<p>There is no record in cu table.</p>
STRING;
}
else {
	print <<<STRING
		<p>Select file that you wish to delete permanently (from database and server):</p>
		<form method="post" action="delete_ul_file_confirm.php" name="form_slgu">
			<div id="div_slgu">
				<table id="table_slgu">
					<tr>
						<th></th>
						<th>ID</th>
						<th>File name</th>
						<th>Type of upload</th>
						<th>Comments</th>
						<th>Load date</th>
						<th>Loader ID</th>
					</tr>
STRING;
	
	// Display list of uploaded files
	for ($i=0; $i<$cnt_results; $i++) {
		print "\n\t\t\t\t\t<tr>".
			"\n\t\t\t\t\t\t<td><input type=\"radio\" name=\"select_file\" value=\"".htmlentities($query_results[$i]['cu_id'], ENT_COMPAT, "cp1252")."\" /></td>".
			"\n\t\t\t\t\t\t<td>".htmlentities($query_results[$i]['cu_id'], ENT_COMPAT, "cp1252")."</td>".
			"\n\t\t\t\t\t\t<td>".htmlentities($query_results[$i]['cu_file'], ENT_COMPAT, "cp1252")."</td>".
			"\n\t\t\t\t\t\t<td>".htmlentities($query_results[$i]['cu_type'], ENT_COMPAT, "cp1252")."</td>".
			"\n\t\t\t\t\t\t<td>".htmlentities($query_results[$i]['cu_com'], ENT_COMPAT, "cp1252")."</td>".
			"\n\t\t\t\t\t\t<td>".htmlentities($query_results[$i]['cu_loaddate'], ENT_COMPAT, "cp1252")."</td>".
			"\n\t\t\t\t\t\t<td>".htmlentities($query_results[$i]['cc_id_load'], ENT_COMPAT, "cp1252")."</td>".
			"\n\t\t\t\t\t</tr>";
	}

	print <<<STRING
				</table>
				<br />
				<input type="submit" name="select_file_ok" value="OK" />
			</div>
		</form>
STRING;
}

?>
			
			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>
