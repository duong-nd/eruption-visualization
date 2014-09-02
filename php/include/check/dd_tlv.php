<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_tlv_id, dd_tlv_code, di_tlt_id, ds_id, dd_tlv_stime, dd_tlv_etime, dd_tlv_mag, dd_tlv_azi, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_tlv";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_tlv.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_tlv_id'];
	
	// Check required field: ds_id
	if (empty($row['ds_id'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id");
	}
	
	// Check required field: dd_tlv_stime
	if (empty($row['dd_tlv_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_tlv_stime");
	}
	
	// Check required field: dd_tlv_mag
	if (empty($row['dd_tlv_mag'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_tlv_mag");
	}
	
	// Check required field: dd_tlv_azi
	if (empty($row['dd_tlv_azi'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_tlv_azi");
	}
	
	// Check time order: dd_tlv_stime < dd_tlv_etime
	if (!empty($row['dd_tlv_stime']) && !empty($row['dd_tlv_etime'])) {
		if (strcmp($row['dd_tlv_stime'], $row['dd_tlv_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: dd_tlv_stime=".$row['dd_tlv_stime']." > dd_tlv_etime=".$row['dd_tlv_etime']);
		}
	}
	
	// Check link (inclusion 1): di_tlt_id
	check_link_include1($row['di_tlt_id'], 'di_tlt_id', 'di_tlt', 'di_tlt_id', 'di_tlt_stime', 'di_tlt_etime', 'dd_tlv_stime', $row['dd_tlv_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_tlv_stime', $row['dd_tlv_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): di_tlt_id
	check_link_include1($row['di_tlt_id'], 'di_tlt_id', 'di_tlt', 'di_tlt_id', 'di_tlt_stime', 'di_tlt_etime', 'dd_tlv_etime', $row['dd_tlv_etime'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_tlv_etime', $row['dd_tlv_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: ds_id=di_tlt.ds_id
	check_value($row['ds_id'], 'ds_id', 'ds_id', 'di_tlt', 'di_tlt_id', $row['di_tlt_id'], $row_id, $msgs);
	
	// Check value: dd_tlv_azi
	if (!empty($row['dd_tlv_azi'])) {
		if ($row['dd_tlv_azi']<0 || $row['dd_tlv_azi']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_tlv_azi=".$row['dd_tlv_azi']);
		}
	}
	
	// Check uniqueness
	check_unique("dd_tlv", $row['dd_tlv_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>