<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ss_id, ss_code, sn_id, ss_lat, ss_lon, ss_stime, ss_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM ss";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ss.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ss_id'];
	
	// Check required field: sn_id
	if (empty($row['sn_id'])) {
		array_push($msgs, $row_id." - Required value is empty: sn_id");
	}
	
	// Check required field: ss_lat
	if (empty($row['ss_lat'])) {
		array_push($msgs, $row_id." - Required value is empty: ss_lat");
	}
	
	// Check required field: ss_lon
	if (empty($row['ss_lon'])) {
		array_push($msgs, $row_id." - Required value is empty: ss_lon");
	}
	
	// Check required field: ss_stime
	if (empty($row['ss_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: ss_stime");
	}
	
	// Check time order: ss_stime < ss_etime
	if (!empty($row['ss_stime']) && !empty($row['ss_etime'])) {
		if (strcmp($row['ss_stime'], $row['ss_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ss_stime=".$row['ss_stime']." > ss_etime=".$row['ss_etime']);
		}
	}
	
	// Check link (inclusion 2): sn_id
	check_link_include2($row['sn_id'], 'sn_id', 'sn', 'sn_id', 'sn_stime', 'sn_etime', 'ss_stime', $row['ss_stime'], 'ss_etime', $row['ss_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("ss", $row['ss_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['ss_stime'], $row['ss_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>