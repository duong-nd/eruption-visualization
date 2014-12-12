<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT sd_trm_id, sd_trm_code, ss_id, sn_id, sd_trm_stime, sd_trm_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM sd_trm";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [sd_trm.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['sd_trm_id'];
	
	// Check time order: sd_trm_stime < sd_trm_etime
	if (!empty($row['sd_trm_stime']) && !empty($row['sd_trm_etime'])) {
		if (strcmp($row['sd_trm_stime'], $row['sd_trm_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: sd_trm_stime=".$row['sd_trm_stime']." > sd_trm_etime=".$row['sd_trm_etime']);
		}
	}
	
	// Check link (inclusion 1): ss_id
	check_link_include1($row['ss_id'], 'ss_id', 'ss', 'ss_id', 'ss_stime', 'ss_etime', 'sd_trm_stime', $row['sd_trm_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): ss_id
	check_link_include1($row['ss_id'], 'ss_id', 'ss', 'ss_id', 'ss_stime', 'ss_etime', 'sd_trm_etime', $row['sd_trm_etime'], $row_id, $msgs);
	
	// Check link (inclusion 1): sn_id
	check_link_include1($row['sn_id'], 'sn_id', 'sn', 'sn_id', 'sn_stime', 'sn_etime', 'sd_trm_stime', $row['sd_trm_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): sn_id
	check_link_include1($row['sn_id'], 'sn_id', 'sn', 'sn_id', 'sn_stime', 'sn_etime', 'sd_trm_etime', $row['sd_trm_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique("sd_trm", $row['sd_trm_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>