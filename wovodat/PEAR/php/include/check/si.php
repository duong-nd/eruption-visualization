<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT si_id, si_code, ss_id, si_stime, si_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM si";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [si.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['si_id'];
	
	// Check required field: si_stime
	if (empty($row['si_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: si_stime");
	}
	
	// Check time order: si_stime < si_etime
	if (!empty($row['si_stime']) && !empty($row['si_etime'])) {
		if (strcmp($row['si_stime'], $row['si_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: si_stime=".$row['si_stime']." > si_etime=".$row['si_etime']);
		}
	}
	
	// Check link (inclusion 2): ss_id
	check_link_include2($row['ss_id'], 'ss_id', 'ss', 'ss_id', 'ss_stime', 'ss_etime', 'si_stime', $row['si_stime'], 'si_etime', $row['si_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("si", $row['si_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['si_stime'], $row['si_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>