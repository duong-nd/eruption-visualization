<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cr_id, cc_id, cr_uname, cr_pwd FROM cr";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [cr.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['cr_id'];
	
	// Check required field: cc_id
	if (empty($row['cc_id']) && $row_id!=32) {// Skip cr_id=32 == "only4developers" login
		array_push($msgs, $row_id." - Required value is empty: cc_id");
	}
	
	// Check required field: cr_uname
	if (empty($row['cr_uname'])) {
		array_push($msgs, $row_id." - Required value is empty: cr_uname");
	}
	
	// Check required field: cr_pwd
	if (empty($row['cr_pwd'])) {
		array_push($msgs, $row_id." - Required value is empty: cr_pwd");
	}
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>