<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT hi_id, hi_code, hs_id, hi_stime, hi_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM hi";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [hi.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['hi_id'];
	
	// Check required field: hi_stime
	if (empty($row['hi_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: hi_stime");
	}
	
	// Check time order: hi_stime < hi_etime
	if (!empty($row['hi_stime']) && !empty($row['hi_etime'])) {
		if (strcmp($row['hi_stime'], $row['hi_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: hi_stime=".$row['hi_stime']." > hi_etime=".$row['hi_etime']);
		}
	}
	
	// Check link (inclusion 2): hs_id
	check_link_include2($row['hs_id'], 'hs_id', 'hs', 'hs_id', 'hs_stime', 'hs_etime', 'hi_stime', $row['hi_stime'], 'hi_etime', $row['hi_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("hi", $row['hi_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['hi_stime'], $row['hi_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>