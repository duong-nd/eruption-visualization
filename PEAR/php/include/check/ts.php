<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ts_id, ts_code, cn_id, ts_lat, ts_lon, ts_stime, ts_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM ts";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ts.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ts_id'];
	
	// Check required field: cn_id
	if (empty($row['cn_id'])) {
		array_push($msgs, $row_id." - Required value is empty: cn_id");
	}
	
	// Check required field: ts_lat
	if (empty($row['ts_lat'])) {
		array_push($msgs, $row_id." - Required value is empty: ts_lat");
	}
	
	// Check required field: ts_lon
	if (empty($row['ts_lon'])) {
		array_push($msgs, $row_id." - Required value is empty: ts_lon");
	}
	
	// Check required field: ts_stime
	if (empty($row['ts_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: ts_stime");
	}
	
	// Check time order: ts_stime < ts_etime
	if (!empty($row['ts_stime']) && !empty($row['ts_etime'])) {
		if (strcmp($row['ts_stime'], $row['ts_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ts_stime=".$row['ts_stime']." > ts_etime=".$row['ts_etime']);
		}
	}
	
	// Check link (inclusion 2): cn_id
	check_link_include2($row['cn_id'], 'cn_id', 'cn', 'cn_id', 'cn_stime', 'cn_etime', 'ts_stime', $row['ts_stime'], 'ts_etime', $row['ts_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("ts", $row['ts_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['ts_stime'], $row['ts_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>