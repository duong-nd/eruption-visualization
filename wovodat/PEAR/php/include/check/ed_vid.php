<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ed_vid_id, ed_vid_code, vd_id, ed_id, ed_phs_id, ed_vid_link, cc_id, cc_id2, cc_id3, cc_id_load FROM ed_vid";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ed_vid.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ed_vid_id'];
	
	// Check required field: ed_vid_link
	if (empty($row['ed_vid_link'])) {
		array_push($msgs, $row_id." - Required value is empty: ed_vid_link");
	}
	
	// Check link: vd_id
	check_link($row['vd_id'], 'vd_id', 'vd', 'vd_id', $row_id, $msgs);
	
	// Check link: ed_id
	check_link($row['ed_id'], 'ed_id', 'ed', 'ed_id', $row_id, $msgs);
	
	// Check link: ed_phs_id
	check_link($row['ed_phs_id'], 'ed_phs_id', 'ed_phs', 'ed_phs_id', $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: ed_id=ed_phs_id.ed_id
	check_value($row['ed_id'], 'ed_id', 'ed_id', 'ed_phs', 'ed_phs_id', $row['ed_phs_id'], $row_id, $msgs);
	
	// Check value: vd_id=ed_phs_id.ed_id.vd_id
	check_value2($row['vd_id'], 'vd_id', 'ed_id', 'ed_phs', 'ed_phs_id', $row['ed_phs_id'], 'vd_id', 'ed', 'ed_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique("ed_vid", $row['ed_vid_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>