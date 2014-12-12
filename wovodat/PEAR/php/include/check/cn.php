<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cn_id, cn_code, cn_type, cn_stime, cn_etime, vd_id, cc_id, cc_id2, cc_id3, cc_id_load FROM cn";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [cn.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	// Row ID
	$row_id=$row['cn_id'];
	
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
	
	// Check required field: cn_stime
	if (empty($row['cn_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: cn_stime");
	}
	
	// Check time order: cn_stime < cn_etime
	if (!empty($row['cn_stime']) && !empty($row['cn_etime'])) {
		if (strcmp($row['cn_stime'], $row['cn_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: cn_stime=".$row['cn_stime']." > cn_etime=".$row['cn_etime']);
		}
	}
	
	// Check uniqueness
	check_unique_cn($row['cn_type'], $row['cn_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['cn_stime'], $row['cn_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>