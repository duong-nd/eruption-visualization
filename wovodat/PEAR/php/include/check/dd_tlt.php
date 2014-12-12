<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_tlt_id, dd_tlt_code, di_tlt_id, ds_id, dd_tlt_time, dd_tlt1, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_tlt";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_tlt.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_tlt_id'];
	
	// Check required field: ds_id
	if (empty($row['ds_id'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id");
	}
	
	// Check required field: dd_tlt_time
	if (empty($row['dd_tlt_time'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_tlt_time");
	}
	
	// Check required field: dd_tlt1
	if (empty($row['dd_tlt1'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_tlt1");
	}
	
	// Check link (inclusion 1): di_tlt_id
	check_link_include1($row['di_tlt_id'], 'di_tlt_id', 'di_tlt', 'di_tlt_id', 'di_tlt_stime', 'di_tlt_etime', 'dd_tlt_time', $row['dd_tlt_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_tlt_time', $row['dd_tlt_time'], $row_id, $msgs);
	
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
	
	// Check uniqueness
	check_unique("dd_tlt", $row['dd_tlt_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>