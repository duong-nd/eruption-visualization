<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ip_sat_id, ip_sat_code, vd_id, ip_sat_time, ip_sat_start, ip_sat_end, cc_id, cc_id2, cc_id3, cc_id_load FROM ip_sat";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ip_sat.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ip_sat_id'];
	
	// Check required field: ip_sat_time
	if (empty($row['ip_sat_time'])) {
		array_push($msgs, $row_id." - Required value is empty: ip_sat_time");
	}
	
	// Check link: vd_id
	check_link($row['vd_id'], 'vd_id', 'vd', 'vd_id', $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check time order: ip_sat_start < ip_sat_time
	if (!empty($row['ip_sat_start']) && !empty($row['ip_sat_time'])) {
		if (strcmp($row['ip_sat_start'], $row['ip_sat_time']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ip_sat_start=".$row['ip_sat_start']." > ip_sat_time=".$row['ip_sat_time']);
		}
	}
	
	// Check time order: ip_sat_start < ip_sat_end
	if (!empty($row['ip_sat_start']) && !empty($row['ip_sat_end'])) {
		if (strcmp($row['ip_sat_start'], $row['ip_sat_end']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ip_sat_start=".$row['ip_sat_start']." > ip_sat_end=".$row['ip_sat_end']);
		}
	}
	
	// Check uniqueness
	check_unique("ip_sat", $row['ip_sat_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>