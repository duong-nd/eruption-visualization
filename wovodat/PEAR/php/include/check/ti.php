<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ti_id, ti_code, ts_id, cs_id, ti_stime, ti_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM ti";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ti.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ti_id'];
	
	// Check required field: ti_stime
	if (empty($row['ti_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: ti_stime");
	}
	
	// Check time order: ti_stime < ti_etime
	if (!empty($row['ti_stime']) && !empty($row['ti_etime'])) {
		if (strcmp($row['ti_stime'], $row['ti_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ti_stime=".$row['ti_stime']." > ti_etime=".$row['ti_etime']);
		}
	}
	
	// Check link (inclusion 2): ts_id
	check_link_include2($row['ts_id'], 'ts_id', 'ts', 'ts_id', 'ts_stime', 'ts_etime', 'ti_stime', $row['ti_stime'], 'ti_etime', $row['ti_etime'], $row_id, $msgs);
	
	// Check link (inclusion 2): cs_id
	check_link_include2($row['cs_id'], 'cs_id', 'cs', 'cs_id', 'cs_stime', 'cs_etime', 'ti_stime', $row['ti_stime'], 'ti_etime', $row['ti_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("ti", $row['ti_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['ti_stime'], $row['ti_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>