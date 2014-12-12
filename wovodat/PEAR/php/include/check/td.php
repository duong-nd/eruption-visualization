<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT td_id, td_code, ts_id, ti_id, td_time, cc_id, cc_id2, cc_id3, cc_id_load FROM td";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [td.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['td_id'];
	
	// Check link (inclusion 1): ts_id
	check_link_include1($row['ts_id'], 'ts_id', 'ts', 'ts_id', 'ts_stime', 'ts_etime', 'td_time', $row['td_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ti_id
	check_link_include1($row['ti_id'], 'ti_id', 'ti', 'ti_id', 'ti_stime', 'ti_etime', 'td_time', $row['td_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: ts_id=ti.ts_id
	check_value($row['ts_id'], 'ts_id', 'ts_id', 'ti', 'ti_id', $row['ti_id'], $row_id, $msgs);
	
	// Check uniqueness
	check_unique("td", $row['td_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>