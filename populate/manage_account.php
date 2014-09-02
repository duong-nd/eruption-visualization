<?php

// Check login
require_once("php/include/login_check.php");

// Local variable
$update_error="";

// Did an error occurred?
if (isset($_GET['attempt'])) {
	$attempt=$_GET['attempt'];
	if ($attempt==1) {
		// Password change unsuccessful
		$update_error="Password change unsuccessful! Please try again:";
	}
}

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
		<!-- Top of the page -->
		<div id="contentl">
		<!-- Page content -->
		<h1>Manage account</h1>
		<p class="redtext"><?php print $update_error; ?></p>
		<!-- Form -->
		<form method="post" action="update_account.php" name="update_cr">
			<table class="formtable">
				<tr>
<?php

if ($old_pw_error) {
	print "\t\t\t\t\t<th class=\"red\">";
}
else {
	print "\t\t\t\t\t<th>";
}

?>Old password:</th>
					<td>
						<input type="password" maxlength="30" name="old_password" />
					</td>
				</tr>
				<tr>
<?php

if ($new_pw_error) {
	print "\t\t\t\t\t<th class=\"red\">";
}
else {
	print "\t\t\t\t\t<th>";
}

?>New password (&ge; 6 characters):</th>
					<td>
						<input type="password" maxlength="30" name="new_password" />
					</td>
				</tr>
				<tr>
<?php

if ($new_pw_error) {
	print "\t\t\t\t\t<th class=\"red\">";
}
else {
	print "\t\t\t\t\t<th>";
}

?>Confirm new password:</th>
					<td>
						<input type="password" maxlength="30" name="conf_new_password" />
					</td>
				</tr>
			</table>
			<input type="submit" name="confirm" value="Confirm" />
		</form>

			</div>

		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>
