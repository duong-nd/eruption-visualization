<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cp_id, cr_id, cp_access, cc_id_load FROM cp";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [cp.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	// Row ID
	$row_id=$row['cp_id'];
	
	// Check required field: cr_id
	if (empty($row['cr_id'])) {
		array_push($msgs, $row_id." - Required value is empty: cr_id");
	}
	
	// Check required field: cp_access
	if (empty($row['cp_access']) && $row['cp_access']!=0) {
		array_push($msgs, $row_id." - Required value is empty: cp_access");
	}
	
	// Check link: cr_id
	check_link($row['cr_id'], 'cr_id', 'cr', 'cr_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>