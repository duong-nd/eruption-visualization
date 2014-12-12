<?php

/**********************************

This page displays a small message to confirm to users that their new password was sent to their email address.

**********************************/

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
		<div id="headershadow">
			<?php include 'php/include/header_beta.php'; ?>
		</div>

		<!-- Content -->
		<div id="content">	
			<div id="contentl">
				<!-- Page content -->

<?php

$username=$_GET['username'];
$password=$_GET['password'];

echo <<<HTMLBLOCK
<h3>Your password has been reset.</h3>
<p> Please find below your new account details:</p>

<p>Username:&nbsp;$username  </p>
<p>Password:&nbsp;$password</p>
<p>Yor are adivsed to change immediately your password under my account page. </p>

<p>You may now go to the <a href='index.php'>home page</a> to log in.</p>
HTMLBLOCK;
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
