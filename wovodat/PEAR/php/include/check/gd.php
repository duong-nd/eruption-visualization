<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT gd_id, gd_code, gs_id, gi_id, gd_time, gd_species, gd_waterfree_flag, cc_id, cc_id2, cc_id3, cc_id_load FROM gd";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [gd.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['gd_id'];
	
	// Check required field: gd_time
	if (empty($row['gd_time'])) {
		array_push($msgs, $row_id." - Required value is empty: gd_time");
	}
	
	// Check link (inclusion 1): gi_id
	check_link_include1($row['gi_id'], 'gi_id', 'gi', 'gi_id', 'gi_stime', 'gi_etime', 'gd_time', $row['gd_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): gs_id
	check_link_include1($row['gs_id'], 'gs_id', 'gs', 'gs_id', 'gs_stime', 'gs_etime', 'gd_time', $row['gd_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: gs_id=gi_id.gs_id
	check_value($row['gs_id'], 'gs_id', 'gs_id', 'gi', 'gi_id', $row['gi_id'], $row_id, $msgs);
	
	// Check uniqueness
	check_unique_species("gd", $row['gd_code'], $row['gd_species'], $row['gd_waterfree_flag'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>