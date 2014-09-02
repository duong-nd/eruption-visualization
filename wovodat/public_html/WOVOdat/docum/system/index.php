<?php
$redirect=substr($_SERVER['PHP_SELF'], 1);
include "php/include/check_login_beta.php";
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
	<link href="/js2/navig.css" rel="stylesheet">
	<link href="/gif/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>

	<div id="wrapborder">
	<div id="wrap">
			<?php include 'php/include/header_beta.php'; ?>

		<!-- Content -->
		<div id="content">
		
			<!-- Left content -->
			<div id="contentl">
			
				<h1><br>About the upload system</h1>		
				<h2>How does the upload work?</h2>

				<h2<br><br>Submit a file</h2>
				<p>On the basic start, Monitoring Data usually consists of <b>Station</b>, <b>Type of Data</b>, the <b>Data</b> itself. A CSV(comma delimited value) file is the easiest way to submit data. <a href="#">Here</a> is to submit the data. For Station, the information includes Network code, if any, Station name, Lat, Lon and Elevation. For time series data it contains at least three columns: "Date", "Time" and "Value".
				</p>
				
				<h2>Why several versions?</h2>
				<p>As the database is changing versions (see explanation in the <a href="/docum/database/">database documentation</a>), the scripts used for uploading files to the database need to change accordingly.</p>
				
				<h2>List of versions</h2>
				<ul>
					<li>
						<h3>1.001<span> <em>(release in March 2010)</em></span></h3>
						<p>Description: Major changes resulting from pilot testing and data populating phases.</p>
						<p>Go to reference for: <a href="1.001/wovoml.php">WOVOML reference</a> | <a href="1.001/wovoml_to_db.php">Upload process</a></p>
					</li>
					<li>
						<h3>1.0<span> <em>(release in 2007)</em></span></h3>
						<p>Description: Initial version.</p>
						<p>Go to reference for: <a href="1.0/wovoml.php">WOVOML reference</a> | <a href="#">Upload process</a></p>
					</li>
				</ul>
			
			</div>
			
			<!-- Right content -->
			<div id="contentr"><br><br>
				<p align="center"><img src="/gif/flowschema.png" width="400" height="210" alt="schema"></p>
			</div>
			
		</div>
		
		<!-- Footer -->
		<div id="footer">
			<?php include 'php/include/footer_main_beta.php'; ?>
		</div>
		
	</div>
</body>
</html>