<?php


function showCommonHeader(){
echo <<< HTMLBLOCK
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes, Volcan, Vulkan, eruption, forecasting, forecast, predict, prediction, hazard, desaster, disaster, desasters, disasters, database, data warehouse, format, formats, WOVO, WOVOdat, IAVCEI, sharing, streaming, earthquake, earthquakes, seismic, seismicity, seismology, deformation, INSar, GPS, uplift, caldera, stratovolcano, stratovulcano">
	<link href="../../css/styles_beta.css" rel="stylesheet">
	<link href="../../gif/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
	
</head>
<body>
	<div id="wrapborder">
		<div id="wrap">
HTMLBLOCK;

include "php/include/header_beta.php"; 
}

function showCssExternalJs(){
echo <<< HTMLBLOCK
	<script language="javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>	
	<script type="text/javascript" src="/js/jquery.defaultvalue.js"></script>	
	<script type="text/javascript" src="/js/insertFormValidation.js"></script>
	
	<style type="text/css">
		label.error { float: none; color: red; }
		input[type="text"]  { width:180px; }
		 select           { width:180px; }
		.bibliographic   {width:450px;}
		textarea { width:180px; }
		.formFont {font-size:12px;font-weight:bold;}
	</style>
HTMLBLOCK;

}

function showCommonFooter(){

		echo "<div>";
			include 'php/include/footer_main_beta.php';
		echo "</div>";
		
	echo "</div>";
echo"</body>";
echo"</html>";

}



function showSuccessfulMessage(){
echo <<< HTMLBLOCK

		<!-- Content -->

		<div id="content">
		<!-- Page content -->
		
			<h2>Successfully Upload to the database</h2>
		
			<ul><br/>
				<li>If you want to upload more data, 
				you can click <a href="http://{$_SERVER['SERVER_NAME']}/populate/home_populate.php"> here </a> to go back to online form page.</li><br/>
				<li>If you want to check out your data, you can click <a href="http://{$_SERVER['SERVER_NAME']}/phpmyadmin/" target="_blank"> here </a> to go to phpmyadmin. </li>
			</ul>
		</div>  <!-- end page content div -->
HTMLBLOCK;
}

function showUnsuccessfulMessage(){
echo <<< HTMLBLOCK

		<!-- Content -->

		<div id="content">
		<!-- Page content -->
		
			<h2>Error on Uploading form</h2>
			<br/>
			<ul>
				Unexcepted error occured, 
				please try again by clicking <a href="http://{$_SERVER['SERVER_NAME']}/populate/home_populate.php"> here </a> to go back to online form page.
				<br/>
				If you contiuously encounter this problem, please click <a href="http://{$_SERVER['SERVER_NAME']}/populate/contact_us_form.php"> here </a> to send email to our wovodat team. 
			</ul>
		</div>  <!-- end page content div -->
HTMLBLOCK;
}
?>