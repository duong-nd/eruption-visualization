<?php
// Start session
session_start();

// Regenerate session ID
session_regenerate_id(true);

// Check login
require_once("php/include/login_check.php");

// Get root url
require_once "php/include/get_root.php";

// Get information stored
$user_admin=$_SESSION['permissions']['user_admin'];
$l_user_admin=$_SESSION['permissions']['l_user_admin'];
$cc_id=$_SESSION['login']['cc_id'];
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
			<br><br>
			<!-- Page content -->
			<div>
				<p>Which operation would you like to do?</p>
				<ul>
					<li>
						<p><a href="manage_account.php">Change my password</a></p>
					</li>
					<li>
<?php

// If user has no admin permission for other users
if ($l_user_admin==0) {
	print <<<STRING
					<p><a href="manage_contact_info.php">Change my contact information</a></p>
STRING;
}
else {
	print <<<STRING
					<form action="manage_contact_info.php" enctype="multipart/form-data" method="post">
						<p>Change contact information for:
							<select name="select_user_ccinfo" style='width:375px;'>
								<option value="$cc_id"> Myself ($user_name) </option>\n
STRING;
	for ($i=0; $i<$l_user_admin; $i++) {
		$user_id=$user_admin['id'][$i];
		$username=$user_admin['name'][$i];
		print <<<STRING
								<option value="$user_id"> $username </option>\n
STRING;
	}
	print <<<STRING
							</select>
						</p>
						<p><input type="submit" name="manage_contact_info_ok" value="OK" /></p>
					</form>
STRING;
}

?>
				</li>
				<li>
<?php

// If user has no admin permission for other users
if ($l_user_admin==0) {
	print <<<STRING
					<p><a href="search_granted_user.php">Grant permissions to other users</a></p>
STRING;
}
else {
	print <<<STRING
					<form action="search_granted_user.php" enctype="multipart/form-data" method="post">
						<p>Grant permissions to other users</p>
						<p>Select granting user:
							<select name="select_user_perm" style='width:375px;'>
								<option value="$cc_id"> Myself ($user_name) </option>\n
STRING;
	for ($i=0; $i<$l_user_admin; $i++) {
		$user_id=$user_admin['id'][$i];
		$username=$user_admin['name'][$i];
		print <<<STRING
								<option value="$user_id"> $username </option>\n
STRING;
	}
	print <<<STRING
							</select>
						</p>
						<p><input type="submit" name="manage_permissions_ok" value="OK" /></p>
					</form>
STRING;
}

?>
				</li>
			</ul>
		</div>
			
			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>