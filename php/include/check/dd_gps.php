<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_gps_id, dd_gps_code, di_gen_id, ds_id, ds_id_ref1, ds_id_ref2, dd_gps_time, dd_gps_lat, dd_gps_lon, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_gps";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_gps.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_gps_id'];
	
	// Check required field: ds_id
	if (empty($row['ds_id'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id");
	}
	
	// Check required field: dd_gps_time
	if (empty($row['dd_gps_time'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_gps_time");
	}
	
	// Check required field: dd_gps_lat
	if (empty($row['dd_gps_lat'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_gps_lat");
	}
	
	// Check required field: dd_gps_lon
	if (empty($row['dd_gps_lon'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_gps_lon");
	}
	
	// Check link (inclusion 1): di_gen_id
	check_link_include1($row['di_gen_id'], 'di_gen_id', 'di_gen', 'di_gen_id', 'di_gen_stime', 'di_gen_etime', 'dd_gps_time', $row['dd_gps_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_gps_time', $row['dd_gps_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id_ref1
	check_link_include1($row['ds_id_ref1'], 'ds_id_ref1', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_gps_time', $row['dd_gps_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id_ref2
	check_link_include1($row['ds_id_ref2'], 'ds_id_ref2', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_gps_time', $row['dd_gps_time'], $row_id, $msgs);
	
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
	
	// Check value: dd_gps_lat
	if (!empty($row['dd_gps_lat'])) {
		if ($row['dd_gps_lat']<-90 || $row['dd_gps_lat']>90) {
			array_push($msgs, $row_id." - Incorrect value: dd_gps_lat=".$row['dd_gps_lat']);
		}
	}
	
	// Check value: dd_gps_lon
	if (!empty($row['dd_gps_lon'])) {
		if ($row['dd_gps_lon']<-180 || $row['dd_gps_lon']>180) {
			array_push($msgs, $row_id." - Incorrect value: dd_gps_lon=".$row['dd_gps_lon']);
		}
	}
	
	// Check uniqueness
	check_unique("dd_gps", $row['dd_gps_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>