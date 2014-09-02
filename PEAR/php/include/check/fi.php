<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT fi_id, fi_code, fs_id, fi_stime, fi_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM fi";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [fi.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['fi_id'];
	
	// Check required field: fi_stime
	if (empty($row['fi_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: fi_stime");
	}
	
	// Check time order: fi_stime < fi_etime
	if (!empty($row['fi_stime']) && !empty($row['fi_etime'])) {
		if (strcmp($row['fi_stime'], $row['fi_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: fi_stime=".$row['fi_stime']." > fi_etime=".$row['fi_etime']);
		}
	}
	
	// Check link (inclusion 2): fs_id
	check_link_include2($row['fs_id'], 'fs_id', 'fs', 'fs_id', 'fs_stime', 'fs_etime', 'fi_stime', $row['fi_stime'], 'fi_etime', $row['fi_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("fi", $row['fi_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['fi_stime'], $row['fi_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>