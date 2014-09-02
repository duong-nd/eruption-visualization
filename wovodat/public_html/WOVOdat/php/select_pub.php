<?php

// Connect to database
include "php/include/db_connect.php";

// Get values
$title=urldecode(trim($_GET['title']));
$auth=urldecode(trim($_GET['auth']));
$year=urldecode(trim($_GET['year']));
$n_list=urldecode($_GET['n_list']);
if ($n_list!=0) {
	$list=explode("-", urldecode($_GET['list']));
}

// Prepare SQL query
$first=TRUE;
$sql="SELECT cb_id FROM cb WHERE ";
if ($title!="") {
	$sql.="cb_title='".$title."' ";
	$first=FALSE;
}
if ($auth!="") {
	if ($first) {
		$sql.="cb_auth='".$auth."' ";
		$first=FALSE;
	}
	$sql.="AND cb_auth='".$auth."' ";
}
if ($year!="") {
	if ($first) {
		$sql.="cb_year='".$year."' ";
		$first=FALSE;
	}
	$sql.="AND cb_year='".$year."' ";
}
$sql.="LIMIT 1";

// Check values all empty
if ($first) {
	exit;
}

// Query database
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

if ($row===FALSE) {
	// Insert new record into cb
	// Start session
	session_start();

	// Regenerate session ID
	session_regenerate_id(true);

	// If session already started
	if (isset($_SESSION['HTTP_USER_AGENT'])) {
		if ($_SESSION['HTTP_USER_AGENT']!=md5($_SERVER['HTTP_USER_AGENT'])) {
			
			// Destroy session variables
			session_destroy();
			
			// Redirect to "login required" page for user to re-login
			exit();
		}
	}

	// Else
	$_SESSION['HTTP_USER_AGENT']=md5($_SERVER['HTTP_USER_AGENT']);

	// If the session was not started yet
	if (!isset($_SESSION['login']['cr_uname'])) {
		// Redirect to login required page
		exit();
	}

	// Get cc_id_load and loaddate
	$cc_id_load=$_SESSION['login']['cc_id'];
	// Get current date time
	$current_time=date("YmdHis", (time()-date("Z")));
	// Get current date time in ISO format
	$current_time_iso=substr($current_time, 0, 4)."-".substr($current_time, 4, 2)."-".substr($current_time, 6, 2)." ".substr($current_time, 8, 2).":".substr($current_time, 10, 2).":".substr($current_time, 12, 2);

	$sql="INSERT INTO cb (cb_title, cb_auth, cb_year, cc_id_load, cb_loaddate) VALUES ('".mysql_real_escape_string($title)."', '".mysql_real_escape_string($auth)."', '".mysql_real_escape_string($year)."', '".mysql_real_escape_string($cc_id_load)."', '".mysql_real_escape_string($current_time_iso)."')";
	mysql_query($sql);
	$cb_id=mysql_insert_id();
}
else {
	// Get cb_id
	$cb_id=$row['cb_id'];
}

// Add to list of selected publications
if ($n_list==0) {
	// Begin list
	$n_list++;
	?>
					<tr>
						<th>Data issued from:</th>
						<td><input type="radio" class="cb_id" id="cb_id_1" name="pub_1" checked="true" value="<?php echo $cb_id; ?>" /> <?php echo $auth." (".$year."). ".$title; ?></td>
						<td><input type="radio" name="pub_1" value="no" /> No</td>
					</tr>
	<?php
}
else {
	// Check if not already in list
	foreach ($list as $listed) {
		if ($cb_id==$listed) {
			// Already listed
			exit;
		}
	}
	// Add to list
	$n_list++;
	?>
					<tr>
						<th></th>
						<td><input type="radio" class="cb_id" id="cb_id_<?php echo $n_list; ?>" name="pub_<?php echo $n_list; ?>" checked="true" value="<?php echo $cb_id; ?>" /> <?php echo $auth." (".$year."). ".$title; ?></td>
						<td><input type="radio" name="pub_<?php echo $n_list; ?>" value="no" /> No</td>
					</tr>
	<?php
}

?>