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
			<div id="contentl">
		<!-- Page content -->
		<h1>Error during data update</h1>
		<p>The following errors occurred during the data update:</p>
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
			// Data not yet uploaded error
			print "\n\t\t\t<li>Data non existing in DB - ".$error['message']."</li>";
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
		<p>Please make the necessary changes and <a href="home_populate.php">Try again</a>.</p>

			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>		
	</div>
</body>
</html>