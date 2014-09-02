<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT gs_id, gs_code, cn_id, gs_lat, gs_lon, gs_stime, gs_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM gs";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [gs.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['gs_id'];
	
	// Check required field: gs_lat
	if (empty($row['gs_lat'])) {
		array_push($msgs, $row_id." - Required value is empty: gs_lat");
	}
	
	// Check required field: gs_lon
	if (empty($row['gs_lon'])) {
		array_push($msgs, $row_id." - Required value is empty: gs_lon");
	}
	
	// Check required field: gs_stime
	if (empty($row['gs_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: gs_stime");
	}
	
	// Check time order: gs_stime < gs_etime
	if (!empty($row['gs_stime']) && !empty($row['gs_etime'])) {
		if (strcmp($row['gs_stime'], $row['gs_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: gs_stime=".$row['gs_stime']." > gs_etime=".$row['gs_etime']);
		}
	}
	
	// Check link (inclusion 2): cn_id
	check_link_include2($row['cn_id'], 'cn_id', 'cn', 'cn_id', 'cn_stime', 'cn_etime', 'gs_stime', $row['gs_stime'], 'gs_etime', $row['gs_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("gs", $row['gs_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['gs_stime'], $row['gs_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>