<?php include '/php/include/header_beta.php'; ?>
<html>
  <head>
		<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
		<meta http-equiv="cache-control" content="no-cache, must-revalidate">
		<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
		<meta name="keywords" content="Volcano, Vulcano, Volcanoes">
		<link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">		
		<link href="/css/jquery.jgrowl.css" rel="stylesheet">
		<link href="/css/styles_beta.css" rel="stylesheet"> 
		<link href="/css/tooltip.css" rel="stylesheet">

		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.wovodat.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.navigate.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.selection.js"></script>
		<script type="text/javascript" src="js/flot/jquery.flot.time.js"></script>
		<script type="text/javascript" src="js/DataSeriesOverviewPlotter.js"></script>
		<script type="text/javascript" src="js/DataPuller.js"></script>
		<script type="text/javascript" src="js/EruptionPlotter.js"></script>
		<script type="text/javascript" src="js/EruptionForecastPlotter.js"></script>
		<script type="text/javascript" src="js/DataSeriesPlotter.js"></script>    
		<script type="text/javascript" src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div id = "volcanodiv"> 
      <select id = "volcano"></select>
      <select id = "eruptionselect"></select>

    </div>
    <div id = "eruptiondiv"> 
    </div>

    <div id="eruption_graph"></div>
    <div id="eruption_forecast_graph"></div>	
	<div id="data_series_box">
	<div id="data_series_checkbox"></div>
	</div>
	<div id="overview_title"></div>	<div id="data_series_overview"></div>
	<div id="graph1_title"></div>	<div id="data_series_graph1"></div>
	<div id="graph2_title"></div>	<div id="data_series_graph2"></div>
	<div id="graph3_title"></div>	<div id="data_series_graph3"></div>
	<div id="graph4_title"></div>	<div id="data_series_graph4"></div>
	
    <div id="tooltip"></div>
	<div class="wrapborder_x">
		<?php include 'php/include/footer_main_beta.php'; ?>
	</div>
	
  </body>
  
</html>