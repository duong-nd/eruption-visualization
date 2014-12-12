<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT sd_ivl_id, sd_ivl_code, ss_id, sn_id, sd_ivl_stime, sd_ivl_etime, sd_ivl_felt_stime, sd_ivl_felt_etime, sd_ivl_etot_stime, sd_ivl_etot_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM sd_ivl";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [sd_ivl.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['sd_ivl_id'];
	
	// Check time order: sd_ivl_stime < sd_ivl_etime
	if (!empty($row['sd_ivl_stime']) && !empty($row['sd_ivl_etime'])) {
		if (strcmp($row['sd_ivl_stime'], $row['sd_ivl_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: sd_ivl_stime=".$row['sd_ivl_stime']." > sd_ivl_etime=".$row['sd_ivl_etime']);
		}
	}
	
	// Check time order: sd_ivl_felt_stime < sd_ivl_felt_etime
	if (!empty($row['sd_ivl_felt_stime']) && !empty($row['sd_ivl_felt_etime'])) {
		if (strcmp($row['sd_ivl_felt_stime'], $row['sd_ivl_felt_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: sd_ivl_felt_stime=".$row['sd_ivl_felt_stime']." > sd_ivl_felt_etime=".$row['sd_ivl_felt_etime']);
		}
	}
	
	// Check time order: sd_ivl_etot_stime < sd_ivl_etot_etime
	if (!empty($row['sd_ivl_etot_stime']) && !empty($row['sd_ivl_etot_etime'])) {
		if (strcmp($row['sd_ivl_etot_stime'], $row['sd_ivl_etot_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: sd_ivl_etot_stime=".$row['sd_ivl_etot_stime']." > sd_ivl_etot_etime=".$row['sd_ivl_etot_etime']);
		}
	}
	
	// Check link (inclusion 1): ss_id
	check_link_include1($row['ss_id'], 'ss_id', 'ss', 'ss_id', 'ss_stime', 'ss_etime', 'sd_ivl_stime', $row['sd_ivl_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): ss_id
	check_link_include1($row['ss_id'], 'ss_id', 'ss', 'ss_id', 'ss_stime', 'ss_etime', 'sd_ivl_etime', $row['sd_ivl_etime'], $row_id, $msgs);
	
	// Check link (inclusion 1): sn_id
	check_link_include1($row['sn_id'], 'sn_id', 'sn', 'sn_id', 'sn_stime', 'sn_etime', 'sd_ivl_stime', $row['sd_ivl_stime'], $row_id, $msgs);
	
	// Check link (inclusion 1): sn_id
	check_link_include1($row['sn_id'], 'sn_id', 'sn', 'sn_id', 'sn_stime', 'sn_etime', 'sd_ivl_etime', $row['sd_ivl_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique("sd_ivl", $row['sd_ivl_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>