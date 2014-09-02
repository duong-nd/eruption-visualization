<?php

// Start session
session_start();

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
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>
	<div id="wrapborder">
	<div id="wrap">
		<!-- Header -->
		<?php include 'php/include/header_beta.php'; ?>
		<!-- Content -->
		<div id="content">	
			<div id="contentl"><br>
			
		<!-- Page content -->
		<h1>Error during data upload</h1>
		<p>The following errors occurred during the data upload:</p>
		<ul>
<?php

// Print errors
for ($i=0; $i<$_SESSION['l_errors']; $i++) {
	// Limit display to 20 errors
	if ($i==20) {
		break;
	}
	
	// Get error
	$error=$_SESSION['errors'][$i];
	switch ($error['code']) {
		case 1:
			// Missing information
			print "\n\t\t\t<li>Missing information - ".$error['message']."</li>";
			break;
		case 2:
			// Dirty data
			print "\n\t\t\t<li>Dirty data - ".$error['message']."</li>";
			break;
		case 3:
			// Loader doesn't have the right to upload for this owner
			print "\n\t\t\t<li>No upload permission - ".$error['message']."</li>";
			break;
		case 4:
			// Wrong file format
			print "\n\t\t\t<li>Unknown file type - ".$error['message']."</li>";
			break;
		case 5:
			// Not well-formed WOVOML error
			print "\n\t\t\t<li>WOVOML not well-formed - ".$error['message']."</li>";
			break;
		case 6:
			// Unvalid WOVOML error
			print "\n\t\t\t<li>Unvalid WOVOML - ".$error['message']."</li>";
			break;
		case 7:
			// Duplicated data error
			print "\n\t\t\t<li>Duplicated data - ".$error['message']."</li>";
			break;
		case 8:
			// Data already existing error
			print "\n\t\t\t<li>Data already exists in DB - ".$error['message']."</li>";
			break;
		case 9:
			// Links error
			print "\n\t\t\t<li>Incorrect reference - ".$error['message']."</li>";
			break;
		default:
			// Nothing
	}
}

?>
		</ul>
		<p>Please make necessary changes and <a href="home.php">try again</a>.</p>

			</div>
			<div id="contentr">
			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>