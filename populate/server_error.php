<?php

// Help debugging
ini_set("display_startup_errors", "1");
ini_set("display_errors", "1");
error_reporting(E_ALL);

// Start session
session_start();

// Find error to be printed
$found=FALSE;
for ($i=0; $i<$_SESSION['l_errors']; $i++) {
	$error_code=$_SESSION['errors'][$i]['code'];
	if ($error_code>=2000 && $error_code<4000) {
		// It's a server error
		$found=TRUE;
		$error_message=$_SESSION['errors'][$i]['message'];
		break;
	}
}

if (!$found) {
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1002;
	$_SESSION['errors'][0]['message']="Redirected to server error page but no server error was found in the list";
	$_SESSION['l_errors']=1;
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)</title>
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
		<h1>Server error <?php print $error_code; ?></h1>
		<p>An error occurred during this operation. It was due to some problems with the server. Please <a href="home_populate.php">Try again</a> later. We thank you to report this problem to the WOVOdat team (link to be added later) if this happens repeatedly.</p>

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