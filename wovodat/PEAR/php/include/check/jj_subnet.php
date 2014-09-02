<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT jj_subnet_id, jj_net_id, jj_sub_id, jj_net_type, cc_id_load FROM jj_subnet";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [jj_subnet.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['jj_subnet_id'];
	
	// Check required field: jj_net_id
	if (empty($row['jj_net_id'])) {
		array_push($msgs, $row_id." - Required value is empty: jj_net_id");
	}
	
	// Check required field: jj_sub_id
	if (empty($row['jj_sub_id'])) {
		array_push($msgs, $row_id." - Required value is empty: jj_sub_id");
	}
	
	// Check required field: jj_net_type
	if (empty($row['jj_net_type'])) {
		array_push($msgs, $row_id." - Required value is empty: jj_net_type");
	}
	
	$net_type_lower=strtolower($row['jj_net_type']);
	
	// Check link: jj_net_id
	check_link($row['jj_net_id'], 'jj_net_id', $net_type_lower.'n', $net_type_lower.'n_id', $row_id, $msgs);
	
	// Check link: jj_sub_id
	check_link($row['jj_sub_id'], 'jj_sub_id', $net_type_lower.'n', $net_type_lower.'n_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>