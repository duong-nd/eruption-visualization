<?php

// Start session
session_start();

// Get root url
require_once "php/include/get_root.php";

// Find error to be printed
$found=FALSE;
for ($i=0; $i<$_SESSION['l_errors']; $i++) {
	$error_code=$_SESSION['errors'][$i]['code'];
	if ($error_code>=4000) {
		// It's a database error
		$found=TRUE;
		$error_message=$_SESSION['errors'][$i]['message'];
		break;
	}
}

// If error was not found
if (!$found) {
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1037;
	$_SESSION['errors'][0]['message']="Redirected to database error page but no database error was found in the list";
	$_SESSION['l_errors']=1;
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Prepare link
if (isset($_SESSION['login'])) {
	$link="<a href=\"home.php\">Go back to home page</a>";
}
else {
	$link="<a href=\"index.php\">Go back to welcome page</a>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)I</title>
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
			<div id="contentl"><br>
				<!-- Page content -->
				<h1>Database error <?php print $error_code; ?></h1>
				<p>An error occurred during this operation. It was due to some problems with the database. Please try again later. We thank you to <a href="#">report this problem to the WOVOdat team</a> if this happens repeatedly.</p>
				<p><?php print $link; ?></p>

			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>