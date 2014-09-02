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
				<h1><br><br>About the database</h1>
				<h2>Why several versions?</h2>
				<p>The type of data, the techniques used, the monitoring systems and the precision of data being constantly improved, our database structure has to follow these changes accordingly. In order to be consistent with the reality, the database structure is thus regularly reviewed (every 5-10 years). Some tables and fields may be added to accommodate new data. It is however unlikely that tables or fields will be removed or changed dramatically.</p>
				<h2>List of versions</h2>
				<ul>
					<li>
						<h3>1.1<span> <em>(release in March 2010)</em></span></h3>
						<p>Description: Major changes resulting from pilot testing and data populating phases.</p>
						<p>Technical description: <a href="/docum/database/1.1/">Go to online reference</a> | <a href="/docum/database/1.1/wovodat11_tech.pdf" target="_blank">Download document</a></p>
						<p>Textual description: <a href="/docum/database/1.1/wovodat11_doc.pdf" target="_blank">Download document</a></p>
					</li>
					<li>
						<h3>1.0<span> <em>(release in 2007)</em></span></h3>
						<p>Description: Initial version.</p>
						<p>Technical description: <a href="#">Go to online reference</a> | <a href="#">Download document</a></p>
						<p>Textual description: <a href="/docum/database/1.0/wovodat10_doc.pdf" target="_blank">Download document</a></p>
					</li>
				</ul>
			
			</div>
			
			<!-- Right content -->
			<div id="contentr">
			</div>
			
		</div>
		
		<!-- Footer -->
		<div id="footer">
			<?php include 'php/include/footer_main_beta.php'; ?>
		</div>
		
	</div>
</body>
</html>