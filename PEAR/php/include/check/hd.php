<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT hd_id, hd_code, hs_id, hi_id, hd_time, hd_comp_species, cc_id, cc_id2, cc_id3, cc_id_load FROM hd";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [hd.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['hd_id'];
	
	// Check required field: hd_time
	if (empty($row['hd_time'])) {
		array_push($msgs, $row_id." - Required value is empty: hd_time");
	}
	
	// Check link (inclusion 1): hi_id
	check_link_include1($row['hi_id'], 'hi_id', 'hi', 'hi_id', 'hi_stime', 'hi_etime', 'hd_time', $row['hd_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): hs_id
	check_link_include1($row['hs_id'], 'hs_id', 'hs', 'hs_id', 'hs_stime', 'hs_etime', 'hd_time', $row['hd_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: hs_id=hi_id.hs_id
	check_value($row['hs_id'], 'hs_id', 'hs_id', 'hi', 'hi_id', $row['hi_id'], $row_id, $msgs);
	
	// Check uniqueness
	check_unique_species("hd", $row['hd_code'], $row['hd_comp_species'], NULL, $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>