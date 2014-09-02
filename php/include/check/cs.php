<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cs_id, cs_code, cs_type, cs_stime, cs_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM cs";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [cs.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['cs_id'];
	
	// Check required field: cs_type
	if (empty($row['cs_type'])) {
		array_push($msgs, $row_id." - Required value is empty: cs_type");
	}
	
	// Check required field: cs_stime
	if (empty($row['cs_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: cs_stime");
	}
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check time order: cs_stime < cs_etime
	if (!empty($row['cs_stime']) && !empty($row['cs_etime'])) {
		if (strcmp($row['cs_stime'], $row['cs_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: cs_stime=".$row['cs_stime']." > cs_etime=".$row['cs_etime']);
		}
	}
	
	// Check uniqueness
	check_unique_time("cs", $row['cs_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['cs_stime'], $row['cs_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>