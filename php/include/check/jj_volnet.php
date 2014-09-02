<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT jj_volnet_id, vd_id, jj_net_id, jj_net_flag, cc_id_load FROM jj_volnet";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [jj_volnet.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['jj_volnet_id'];
	
	// Check required field: vd_id
	if (empty($row['vd_id'])) {
		array_push($msgs, $row_id." - Required value is empty: vd_id");
	}
	
	// Check required field: jj_net_id
	if (empty($row['jj_net_id'])) {
		array_push($msgs, $row_id." - Required value is empty: jj_net_id");
	}
	
	// Check required field: jj_net_flag
	if (empty($row['jj_net_flag'])) {
		array_push($msgs, $row_id." - Required value is empty: jj_net_flag");
	}
	
	// Check link: vd_id
	check_link($row['vd_id'], 'vd_id', 'vd', 'vd_id', $row_id, $msgs);
	
	// Check link: jj_net_id
	if (!empty($row['jj_net_flag'])) {
		check_link($row['jj_net_id'], strtolower($row['jj_net_flag']).'n_id', strtolower($row['jj_net_flag']).'n', strtolower($row['jj_net_flag']).'n_id', $row_id, $msgs);
	}
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>