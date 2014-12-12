<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cu_id, cu_file, cu_type, cu_loaddate, cc_id_load FROM cu";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [cu.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['cu_id'];
	
	// Check required field: cu_file
	if (empty($row['cu_file'])) {
		array_push($msgs, $row_id." - Required value is empty: cu_file");
	}
	
	// Check required field: cu_type
	if (empty($row['cu_type'])) {
		array_push($msgs, $row_id." - Required value is empty: cu_type");
	}
	
	// Check required field: cu_loaddate
	if (empty($row['cu_loaddate'])) {
		array_push($msgs, $row_id." - Required value is empty: cu_loaddate");
	}
	
	// Check link: cc_id_load
	if (!empty($row['cc_id_load'])) {
		check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	}
	
	if (count($msgs)>30) {
		break;
	}
}

?>