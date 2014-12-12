<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ds_id, ds_code, cn_id, ds_nlat, ds_nlon, ds_stime, ds_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM ds";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ds.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ds_id'];
	
	// Check required field: ds_nlat
	if (empty($row['ds_nlat'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_nlat");
	}
	
	// Check required field: ds_nlon
	if (empty($row['ds_nlon'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_nlon");
	}
	
	// Check required field: ds_stime
	if (empty($row['ds_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_stime");
	}
	
	// Check time order: ds_stime < ds_etime
	if (!empty($row['ds_stime']) && !empty($row['ds_etime'])) {
		if (strcmp($row['ds_stime'], $row['ds_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ds_stime=".$row['ds_stime']." > ds_etime=".$row['ds_etime']);
		}
	}
	
	// Check link (inclusion 2): cn_id
	check_link_include2($row['cn_id'], 'cn_id', 'cn', 'cn_id', 'cn_stime', 'cn_etime', 'ds_stime', $row['ds_stime'], 'ds_etime', $row['ds_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("ds", $row['ds_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['ds_stime'], $row['ds_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>