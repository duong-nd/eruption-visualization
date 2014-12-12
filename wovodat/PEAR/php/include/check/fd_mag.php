<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT fd_mag_id, fd_mag_code, fs_id, fs_id_ref, fi_id, fd_mag_time, fd_mag_f, cc_id, cc_id2, cc_id3, cc_id_load FROM fd_mag";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [fd_mag.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['fd_mag_id'];
	
	// Check required field: fd_mag_time
	if (empty($row['fd_mag_time'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_mag_time");
	}
	
	// Check required field: fd_mag_f
	if (empty($row['fd_mag_f'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_mag_f");
	}
	
	// Check link (inclusion 1): fi_id
	check_link_include1($row['fi_id'], 'fi_id', 'fi', 'fi_id', 'fi_stime', 'fi_etime', 'fd_mag_time', $row['fd_mag_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): fs_id
	check_link_include1($row['fs_id'], 'fs_id', 'fs', 'fs_id', 'fs_stime', 'fs_etime', 'fd_mag_time', $row['fd_mag_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): fs_id_ref
	check_link_include1($row['fs_id_ref'], 'fs_id_ref', 'fs', 'fs_id', 'fs_stime', 'fs_etime', 'fd_mag_time', $row['fd_mag_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: fs_id=fi_id.fs_id
	check_value($row['fs_id'], 'fs_id', 'fs_id', 'fi', 'fi_id', $row['fi_id'], $row_id, $msgs);
	
	// Check uniqueness
	check_unique("fd_mag", $row['fd_mag_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>