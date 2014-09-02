<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT sd_sam_id, sd_sam_code, ss_id, sd_sam_stime, sd_sam_etime, sd_sam_int, cc_id, cc_id2, cc_id3, cc_id_load FROM sd_sam";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [sd_sam.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['sd_sam_id'];
	
	// Check required field: sd_sam_stime
	if (empty($row['sd_sam_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_sam_stime");
	}
	
	// Check required field: sd_sam_etime
	if (empty($row['sd_sam_etime'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_sam_etime");
	}
	
	// Check required field: sd_sam_int
	if (empty($row['sd_sam_int'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_sam_int");
	}
	
	// Check time order: sd_sam_stime < sd_sam_etime
	if (!empty($row['sd_sam_stime']) && !empty($row['sd_sam_etime'])) {
		if (strcmp($row['sd_sam_stime'], $row['sd_sam_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: sd_sam_stime=".$row['sd_sam_stime']." > sd_sam_etime=".$row['sd_sam_etime']);
		}
	}
	
	// Check link (inclusion 1): ss_id
	check_link_include1($row['ss_id'], 'ss_id', 'ss', 'ss_id', 'ss_stime', 'ss_etime', 'sd_sam_stime', $row['sd_sam_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): ss_id
	check_link_include1($row['ss_id'], 'ss_id', 'ss', 'ss_id', 'ss_stime', 'ss_etime', 'sd_sam_etime', $row['sd_sam_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique("sd_sam", $row['sd_sam_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	// Check RSAM
	check_rsam_ssam($row['sd_sam_stime'], $row['sd_sam_etime'], $row['sd_sam_int'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>