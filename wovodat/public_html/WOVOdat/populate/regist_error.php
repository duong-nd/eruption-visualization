<?php

/**********************************

This page displays an error message, this error being related to the registration process.

**********************************/

// Start session
session_start();

// Regenerate session ID
session_regenerate_id(true);

// Find error to be printed
$found=FALSE;
for ($i=0; $i<$_SESSION['l_errors']; $i++) {
	$error_code=$_SESSION['errors'][$i]['code'];
	if ($error_code>=1000 && $error_code<2000) {
		// It's a system error
		$found=TRUE;
		$error_message=$_SESSION['errors'][$i]['message'];
		break;
	}
}

if (!$found) {
	$error_code=1105;
	$error_message="Redirected to registration error page but no system error was found in the list";
}

// Unset session variables
unset($_SESSION['register']);

// Report error to WOVOdat team
/*
// Include PEAR Mail package
require_once "Mail-1.2.0/Mail.php";

// New mail object
$mail=Mail::factory("mail");

// Headers and body
$from="sender address";
$to="receiver address";
$subject="WOVOdat system - Registration error report";
$headers=array("From"=>$from, "Subject"=>$subject);
$body="Hello WOVOdat administrator,\n\n".
"This message was sent to you because an error occurred during an operation on WOVOdat website.\n".
"Here are the details that may be useful for you to fix it:\n".
"Error type: Registration error\n".
"Error code: ".$error_code."\n".
"Error message: ".$error_message."\n".
"User IP: ".$_SERVER['REMOTE_ADDR']."\n".
"Date and time: ".date("Y-m-d H:i:s", (time()-date("Z")))." (UTC)\n\n".
"Thanks,\n".
"The WOVOdat system";

// Send email
$mail->send($to, $headers, $body);
*/
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
		<h1>Registration error <?php print $error_code; ?></h1>
		<p>Sorry, an error occurred during registration. It was due to some problem with the system. We thank you to <a href="#">report this problem to the WOVOdat team</a> if this happens repeatedly.</p>
		<p>Please <a href="regist_form.php">try again</a> later.</p>
		<br />
		<p><a href="index.php">Go to WOVOdat welcome page</a></p>

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