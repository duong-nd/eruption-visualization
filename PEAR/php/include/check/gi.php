<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT gi_id, gi_code, cs_id, gs_id, gi_stime, gi_etime, cc_id, cc_id2, cc_id3, cc_id_load FROM gi";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [gi.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['gi_id'];
	
	// Check required field: gi_stime
	if (empty($row['gi_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: gi_stime");
	}
	
	// Check time order: gi_stime < gi_etime
	if (!empty($row['gi_stime']) && !empty($row['gi_etime'])) {
		if (strcmp($row['gi_stime'], $row['gi_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: gi_stime=".$row['gi_stime']." > gi_etime=".$row['gi_etime']);
		}
	}
	
	// Check link (inclusion 2): gs_id
	check_link_include2($row['gs_id'], 'gs_id', 'gs', 'gs_id', 'gs_stime', 'gs_etime', 'gi_stime', $row['gi_stime'], 'gi_etime', $row['gi_etime'], $row_id, $msgs);
	
	// Check link (inclusion 2): cs_id
	check_link_include2($row['cs_id'], 'cs_id', 'cs', 'cs_id', 'cs_stime', 'cs_etime', 'gi_stime', $row['gi_stime'], 'gi_etime', $row['gi_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_time("gi", $row['gi_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['gi_stime'], $row['gi_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>