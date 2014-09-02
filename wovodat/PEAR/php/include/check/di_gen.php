<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT di_gen_id, di_gen_code, ds_id, di_gen_stime, di_gen_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM di_gen";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [di_gen.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['di_gen_id'];
	
	// Check required field: di_gen_stime
	if (empty($row['di_gen_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: di_gen_stime");
	}
	
	// Check time order: di_gen_stime < di_gen_etime
	if (!empty($row['di_gen_stime']) && !empty($row['di_gen_etime'])) {
		if (strcmp($row['di_gen_stime'], $row['di_gen_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: di_gen_stime=".$row['di_gen_stime']." > di_gen_etime=".$row['di_gen_etime']);
		}
	}
	
	// Check link (inclusion 2): ds_id
	check_link_include2($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'di_gen_stime', $row['di_gen_stime'], 'di_gen_etime', $row['di_gen_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("di_gen", $row['di_gen_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['di_gen_stime'], $row['di_gen_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>