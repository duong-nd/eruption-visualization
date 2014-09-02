<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_edm_id, dd_edm_code, di_gen_id, ds_id1, ds_id2, dd_edm_time, dd_edm_line, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_edm";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_edm.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_edm_id'];
	
	// Check required field: ds_id1
	if (empty($row['ds_id1'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id1");
	}
	
	// Check required field: ds_id2
	if (empty($row['ds_id2'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id2");
	}
	
	// Check required field: dd_edm_time
	if (empty($row['dd_edm_time'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_edm_time");
	}
	
	// Check required field: dd_edm_line
	if (empty($row['dd_edm_line'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_edm_line");
	}
	
	// Check link (inclusion 1): di_gen_id
	check_link_include1($row['di_gen_id'], 'di_gen_id', 'di_gen', 'di_gen_id', 'di_gen_stime', 'di_gen_etime', 'dd_edm_time', $row['dd_edm_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id1
	check_link_include1($row['ds_id1'], 'ds_id1', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_edm_time', $row['dd_edm_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id2
	check_link_include1($row['ds_id2'], 'ds_id2', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_edm_time', $row['dd_edm_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: ds_id1=di_gen.ds_id
	check_value($row['ds_id1'], 'ds_id1', 'ds_id', 'di_gen', 'di_gen_id', $row['di_gen_id'], $row_id, $msgs);
	
	// Check uniqueness
	check_unique("dd_edm", $row['dd_edm_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>