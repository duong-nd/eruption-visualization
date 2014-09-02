<?php

/**********************************

This script returns a list of matching results for the search of a user made from search_granted_user.php.
The list permits to select one of the users to be granted for permissions. When the form is submitted, it launches manage_permissions.php.

**********************************/

// Import necessary scripts
require_once("php/funcs/db_funcs.php");

// Check login
require_once("php/include/login_check.php");

// Get root url
require_once "php/include/get_root.php";

// Direct access
if (!isset($_POST['search_granted_user_ok'])) {
	// Redirect to home page
	header('Location: '.$url_root.'home.php');
	exit();
}

// Store information

// Get posted information
$_SESSION['mng_perm']['search_code']=$_POST['search_code'];
$_SESSION['mng_perm']['search_lname']=$_POST['search_lname'];
$_SESSION['mng_perm']['search_fname']=$_POST['search_fname'];
$_SESSION['mng_perm']['search_obs']=$_POST['search_obs'];
$_SESSION['mng_perm']['search_email']=$_POST['search_email'];

// Trim posted information
$search_code=trim($_POST['search_code']);
$search_lname=trim($_POST['search_lname']);
$search_fname=trim($_POST['search_fname']);
$search_obs=trim($_POST['search_obs']);
$search_email=trim($_POST['search_email']);

// Initialize error message
$_SESSION['mng_perm']['search_error']=0;

// If all are empty
if ($search_code=="" && $search_lname=="" && $search_fname=="" && $search_obs=="" && $search_email=="") {
	$_SESSION['mng_perm']['search_error']=1;
	header('Location: '.$url_root.'search_granted_user.php');
	exit();
}

// Search user in database
$search_table="cc";
$search_field_name=array();
$search_field_value=array();
$search_field_name[0]="cc_id";
$search_field_name[1]="cc_code";
$search_field_name[2]="cc_lname";
$search_field_name[3]="cc_fname";
$search_field_name[4]="cc_obs";
$search_field_name[5]="cc_email";
$search_where_field_name=array();
$search_where_field_comp=array();
$search_where_field_value=array();
$search_where_logical=array();
$cnt=0;
if ($search_code!="") {
	$search_where_field_name[$cnt]="cc_code";
	$search_where_field_comp[$cnt]="=";
	$search_where_field_value[$cnt]=$search_code;
	$cnt++;
}
if ($search_lname!="") {
	if ($cnt!=0) {
		$search_where_logical[$cnt-1]="OR";
	}
	$search_where_field_name[$cnt]="cc_lname";
	$search_where_field_comp[$cnt]="%LIKE%";
	$search_where_field_value[$cnt]=$search_lname;
	$cnt++;
}
if ($search_fname!="") {
	if ($cnt!=0) {
		$search_where_logical[$cnt-1]="OR";
	}
	$search_where_field_name[$cnt]="cc_fname";
	$search_where_field_comp[$cnt]="%LIKE%";
	$search_where_field_value[$cnt]=$search_fname;
	$cnt++;
}
if ($search_obs!="") {
	if ($cnt!=0) {
		$search_where_logical[$cnt-1]="OR";
	}
	$search_where_field_name[$cnt]="cc_obs";
	$search_where_field_comp[$cnt]="%LIKE%";
	$search_where_field_value[$cnt]=$search_obs;
	$cnt++;
}
if ($search_email!="") {
	if ($cnt!=0) {
		$search_where_logical[$cnt-1]="OR";
	}
	$search_where_field_name[$cnt]="cc_email";
	$search_where_field_comp[$cnt]="%LIKE%";
	$search_where_field_value[$cnt]=$search_email;
}
$errors="";
if (!db_search($search_table, $search_field_name, $search_where_field_name, $search_where_field_comp, $search_where_field_value, $search_where_logical, $search_field_value, $errors)) {
	// Database error
	switch ($errors) {
		case "Error in the parameters given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1120;
			$_SESSION['errors'][0]['message']=$errors." to db_search()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		case "Error in comparative operators given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1121;
			$_SESSION['errors'][0]['message']=$errors." to db_search()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		case "Error in logical operators given":
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1122;
			$_SESSION['errors'][0]['message']=$errors." to db_search()";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		default:
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=4034;
			$_SESSION['errors'][0]['message']=$errors;
			$_SESSION['l_errors']=1;
			// Redirect user to database error page
			header('Location: '.$url_root.'db_error.php');
			exit();
	}
}
// Number of users found
$l_search_field_value=count($search_field_value);
// Prepare list of users to display
$l_user_list=0;
$id_list=array();
$code_list=array();
$lname_list=array();
$fname_list=array();
$obs_list=array();
$email_list=array();
for ($i=0; $i<$l_search_field_value; $i++) {
	// Local variables
	$id=$search_field_value[$i][0];
	$code=trim($search_field_value[$i][1]);
	$lname=trim($search_field_value[$i][2]);
	$fname=trim($search_field_value[$i][3]);
	$obs=trim($search_field_value[$i][4]);
	$email=trim($search_field_value[$i][5]);
	
	// If the user found is the same as the granting user
	if ($id==$_SESSION['mng_perm']['granting_user_id']) {
		continue;
	}
	
	// If the contact found is an observatory
	if ($lname=="" && $fname=="" && $obs!="") {
		continue;
	}
	
	// Store user information in display lists
	$id_list[$l_user_list]=$id;
	$code_list[$l_user_list]=$code;
	$lname_list[$l_user_list]=$lname;
	$fname_list[$l_user_list]=$fname;
	$obs_list[$l_user_list]=$obs;
	$email_list[$l_user_list]=$email;
	$l_user_list++;
}
// If there is no user found
if ($l_user_list==0) {
	// Return to "search_granted_user.php"
	$_SESSION['mng_perm']['search_error']=2;
	header('Location: '.$url_root.'search_granted_user.php');
	exit();
}

// Store information
$_SESSION['mng_perm']['id_list']=$id_list;
$_SESSION['mng_perm']['code_list']=$code_list;
$_SESSION['mng_perm']['lname_list']=$lname_list;
$_SESSION['mng_perm']['fname_list']=$fname_list;
$_SESSION['mng_perm']['obs_list']=$obs_list;
$_SESSION['mng_perm']['email_list']=$email_list;
$_SESSION['mng_perm']['l_user_list']=$l_user_list;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes, Volcan, Vulkan, eruption, forecasting, forecast, predict, prediction, hazard, desaster, disaster, desasters, disasters, database, data warehouse, format, formats, WOVO, WOVOdat, IAVCEI, sharing, streaming, earthquake, earthquakes, seismic, seismicity, seismology, deformation, INSar, GPS, uplift, caldera, stratovolcano, stratovulcano">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
	<script language="javascript" type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>

	<div id="wrapborder">
	<div id="wrap">
		<?php include 'php/include/header_beta.php'; ?>
		<!-- Content -->
		<div id="content">	
			<div id="contentl">
		<!-- Top of the page -->
		
		<!-- Page content -->
		<h1>Granted user selection</h1>
		<p>Select user for whom you wish to grant permissions:</p>
		<form method="post" action="manage_permissions.php" name="form_slgu">
			<div id="div_slgu">
				<table id="table_slgu">
					<tr>
						<th></th>
						<th>Code</th>
						<th>First name</th>
						<th>Last name</th>
						<th>Observatory</th>
						<th>Email</th>
					</tr>
<?php

// Display users
// First user
print "\n\t\t\t\t\t<tr>";
print "\n\t\t\t\t\t\t<td><input type=\"radio\" checked=\"true\" name=\"slgu_radio\" value=\"".$id_list[0]."\" /></td>";
print "\n\t\t\t\t\t\t<td>".$code_list[0]."</td>";
print "\n\t\t\t\t\t\t<td>".$fname_list[0]."</td>";
print "\n\t\t\t\t\t\t<td>".$lname_list[0]."</td>";
print "\n\t\t\t\t\t\t<td>".$obs_list[0]."</td>";
print "\n\t\t\t\t\t\t<td>".$email_list[0]."</td>";
print "\n\t\t\t\t\t</tr>";

// For each other users in the list
for ($i=1; $i<$l_user_list; $i++) {
	print "\n\t\t\t\t\t<tr>";
	print "\n\t\t\t\t\t\t<td><input type=\"radio\" name=\"slgu_radio\" value=\"".$id_list[$i]."\" /></td>";
	print "\n\t\t\t\t\t\t<td>".$code_list[$i]."</td>";
	print "\n\t\t\t\t\t\t<td>".$fname_list[$i]."</td>";
	print "\n\t\t\t\t\t\t<td>".$lname_list[$i]."</td>";
	print "\n\t\t\t\t\t\t<td>".$obs_list[$i]."</td>";
	print "\n\t\t\t\t\t\t<td>".$email_list[$i]."</td>";
	print "\n\t\t\t\t\t</tr>";
}

?>
				</table>
				<br />
				<input type="submit" name="select_granted_user_ok" value="OK" />
			</div>
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