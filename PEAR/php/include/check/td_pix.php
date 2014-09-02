<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT td_pix_id, td_img_id, td_pix_lat, td_pix_lon, cc_id_load FROM td_pix";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [td_pix.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['td_pix_id'];
	
	// Check required field: td_pix_lat
	if (empty($row['td_pix_lat'])) {
		array_push($msgs, $row_id." - Required value is empty: td_pix_lat");
	}
	
	// Check required field: td_pix_lon
	if (empty($row['td_pix_lon'])) {
		array_push($msgs, $row_id." - Required value is empty: td_pix_lon");
	}
	
	// Check link: td_img_id
	check_link($row['td_img_id'], 'td_img_id', 'td_img', 'td_img_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>