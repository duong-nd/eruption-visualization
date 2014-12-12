<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT fs_id, fs_code, cn_id, fs_lat, fs_lon, fs_stime, fs_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM fs";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [fs.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['fs_id'];
	
	// Check required field: fs_lat
	if (empty($row['fs_lat'])) {
		array_push($msgs, $row_id." - Required value is empty: fs_lat");
	}
	
	// Check required field: fs_lon
	if (empty($row['fs_lon'])) {
		array_push($msgs, $row_id." - Required value is empty: fs_lon");
	}
	
	// Check required field: fs_stime
	if (empty($row['fs_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: fs_stime");
	}
	
	// Check time order: fs_stime < fs_etime
	if (!empty($row['fs_stime']) && !empty($row['fs_etime'])) {
		if (strcmp($row['fs_stime'], $row['fs_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: fs_stime=".$row['fs_stime']." > fs_etime=".$row['fs_etime']);
		}
	}
	
	// Check link (inclusion 2): cn_id
	check_link_include2($row['cn_id'], 'cn_id', 'cn', 'cn_id', 'cn_stime', 'cn_etime', 'fs_stime', $row['fs_stime'], 'fs_etime', $row['fs_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("fs", $row['fs_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['fs_stime'], $row['fs_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>