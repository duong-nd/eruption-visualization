<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_gpv_id, dd_gpv_code, di_gen_id, ds_id, dd_gpv_stime, dd_gpv_etime, dd_gpv_dmag, dd_gpv_daz, dd_gpv_vincl, dd_gpv_N, dd_gpv_E, dd_gpv_vert, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_gpv";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_gpv.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_gpv_id'];
	
	// Check required field: dd_gpv_stime
	if (empty($row['dd_gpv_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_gpv_stime");
	}
	
	// Check required fields: (dd_gpv_dmag & dd_gpv_daz & dd_gpv_vincl) | (dd_gpv_N & dd_gpv_E & dd_gpv_vert)
	if (((empty($row['dd_gpv_dmag']) && $row['dd_gpv_dmag']!=0) || (empty($row['dd_gpv_daz']) && $row['dd_gpv_daz']!=0) || (empty($row['dd_gpv_vincl']) && $row['dd_gpv_vincl']!=0)) && ((empty($row['dd_gpv_N']) && $row['dd_gpv_N']!=0) || (empty($row['dd_gpv_E']) && $row['dd_gpv_E']!=0) || (empty($row['dd_gpv_vert']) && $row['dd_gpv_vert']!=0))) {
		array_push($msgs, $row_id." - Required fields are empty: (dd_gpv_dmag & dd_gpv_daz & dd_gpv_vincl) | (dd_gpv_N & dd_gpv_E & dd_gpv_vert)");
	}
	
	// Check time order: dd_gpv_stime < dd_gpv_etime
	if (!empty($row['dd_gpv_stime']) && !empty($row['dd_gpv_etime'])) {
		if (strcmp($row['dd_gpv_stime'], $row['dd_gpv_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: dd_gpv_stime=".$row['dd_gpv_stime']." > dd_gpv_etime=".$row['dd_gpv_etime']);
		}
	}
	
	// Check link (inclusion 1): di_gen_id
	check_link_include1($row['di_gen_id'], 'di_gen_id', 'di_gen', 'di_gen_id', 'di_gen_stime', 'di_gen_etime', 'dd_gpv_stime', $row['dd_gpv_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_gpv_stime', $row['dd_gpv_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): di_gen_id
	check_link_include1($row['di_gen_id'], 'di_gen_id', 'di_gen', 'di_gen_id', 'di_gen_stime', 'di_gen_etime', 'dd_gpv_etime', $row['dd_gpv_etime'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_gpv_etime', $row['dd_gpv_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: ds_id=di_gen.ds_id
	check_value($row['ds_id'], 'ds_id', 'ds_id', 'di_gen', 'di_gen_id', $row['di_gen_id'], $row_id, $msgs);
	
	// Check value: dd_gpv_daz
	if (!empty($row['dd_gpv_daz'])) {
		if ($row['dd_gpv_daz']<0 || $row['dd_gpv_daz']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_gpv_daz=".$row['dd_gpv_daz']);
		}
	}
	
	// Check value: dd_gpv_vincl
	if (!empty($row['dd_gpv_vincl'])) {
		if ($row['dd_gpv_vincl']<0 || $row['dd_gpv_vincl']>90) {
			array_push($msgs, $row_id." - Incorrect value: dd_gpv_vincl=".$row['dd_gpv_vincl']);
		}
	}
	
	// Check uniqueness
	check_unique("dd_gpv", $row['dd_gpv_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>