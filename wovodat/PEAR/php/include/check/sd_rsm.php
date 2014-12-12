<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT sd_rsm_id, sd_sam_id, sd_rsm_stime, sd_rsm_count, cc_id_load FROM sd_rsm";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [sd_rsm.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['sd_rsm_id'];
	
	// Check required field: sd_sam_id
	if (empty($row['sd_sam_id'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_sam_id");
	}
	
	// Check required field: sd_rsm_stime
	if (empty($row['sd_rsm_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_rsm_stime");
	}
	
	// Check required field: sd_rsm_count
	if (empty($row['sd_rsm_count']) && $row['sd_rsm_count']!=0) {
		array_push($msgs, $row_id." - Required value is empty: sd_rsm_count");
	}
	
	// Check link: sd_sam_id
	check_link($row['sd_sam_id'], 'sd_sam_id', 'sd_sam', 'sd_sam_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>