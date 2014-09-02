<?php

// Check login
require_once "php/include/login_check.php";

// Get root url
require_once "php/include/get_root.php";


// Check direct access
if (!isset($_SESSION['specify'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}
// Get parameters
$origin=$_SESSION['specify']['origin'];
$from_class=$_SESSION['specify']['from_class'];
$from_obj_id=$_SESSION['specify']['from_obj_id'];
$reference_name=$_SESSION['specify']['reference_name'];
$reference_value=$_SESSION['specify']['reference_value'];
$help_parameters_names=$_SESSION['specify']['help_parameters_names'];
$help_parameters_values=$_SESSION['specify']['help_parameters_values'];
$l_help_parameters=$_SESSION['specify']['l_help_parameters'];
$matches_ids=$_SESSION['specify']['matches_ids'];
$cnt_matches=$_SESSION['specify']['cnt_matches'];

unset($_SESSION['specify']);

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
		<!-- Top of the page -->
		<!-- Page content -->
		<p>Please specify which element you were refering to when using <?php print $reference_name; ?> with value "<?php print $reference_value; ?>" in class <?php print $from_class; ?> with code "<?php print $from_obj_id; ?>":</p>
		<form method="post" action="specify_reference_check.php" name="specify_reference_form">
			<input type="hidden" name="origin" value="<?php print $origin; ?>" />
			<div id="div_slgu">
				<table id="table_slgu">
					<tr>
						<th></th>
<?php

// Loop on parameters names
for ($i=0; $i<$l_help_parameters; $i++) {
	print "\n\t\t\t\t\t\t<th>".$help_parameters_names[$i]."</th>";
}

?>
					</tr>
<?php

// Display matches - radio button with value = ID / parameters values...

// Display matches
// First match
print "\n\t\t\t\t\t<tr>";
print "\n\t\t\t\t\t\t<td><input type=\"radio\" checked=\"true\" name=\"specify_reference_radio\" value=\"".$matches_ids[0]."\" /></td>";
// Loop on help parameters values
for ($i=0; $i<$l_help_parameters; $i++) {
	print "\n\t\t\t\t\t\t<td>".$help_parameters_values[0][$i]."</td>";
}
print "\n\t\t\t\t\t</tr>";

// Loop on other matches
for ($i=1; $i<$cnt_matches; $i++) {
	print "\n\t\t\t\t\t<tr>";
	print "\n\t\t\t\t\t\t<td><input type=\"radio\" name=\"specify_reference_radio\" value=\"".$matches_ids[$i]."\" /></td>";
	// Loop on help parameters values
	for ($j=0; $j<$l_help_parameters; $j++) {
		print "\n\t\t\t\t\t\t<td>".$help_parameters_values[$i][$j]."</td>";
	}
	print "\n\t\t\t\t\t</tr>\n";
}

?>
				</table>
				<br />
				<input type="submit" name="specify_reference_ok" value="OK" />
			</div>
		</form>
		<form name="cancel_upload_form" method="post" action="home.php" enctype="multipart/form-data">
			<input type="submit" name="cancel_upload" value="Cancel upload" />
		</form>

			</div>
			<div id="contentr">
				<div id="top" align="left">
					<!-- Aligned to the right: You are logged in as username (FName LName | Obs) | Logout -->
					<p align="right">Login as <b><?php print $uname; ?></b> | <a href="logout.php">Logout</a></p>
				</div><br>
		
			</div>
		</div>
		
		<!-- Footer -->
			<div>
				<?php include 'php/include/footer_main_beta.php'; ?>
			</div>
		
	</div>
</body>
</html>
