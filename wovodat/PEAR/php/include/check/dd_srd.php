<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_srd_id, dd_sar_id, dd_srd_numb, cc_id_load FROM dd_srd";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_srd.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_srd_id'];
	
	// Check required field: dd_sar_id
	if (empty($row['dd_sar_id'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_sar_id");
	}
	
	// Check required field: dd_srd_numb
	if (empty($row['dd_srd_numb'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_srd_numb");
	}
	
	// Check link: dd_sar_id
	check_link($row['dd_sar_id'], 'dd_sar_id', 'dd_sar', 'dd_sar_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>