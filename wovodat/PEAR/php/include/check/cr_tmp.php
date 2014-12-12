<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cr_tmp_id, cr_tmp_email, cr_tmp_time, cr_tmp_uname, cr_tmp_pwd FROM cr_tmp";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [cr_tmp.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['cr_tmp_id'];
	
	// Check required field: cr_tmp_email
	if (empty($row['cr_tmp_email'])) {
		array_push($msgs, $row_id." - Required value is empty: cr_tmp_email");
	}
	
	// Check required field: cr_tmp_time
	if (empty($row['cr_tmp_time'])) {
		array_push($msgs, $row_id." - Required value is empty: cr_tmp_time");
	}
	
	// Check required field: cr_tmp_uname
	if (empty($row['cr_tmp_uname'])) {
		array_push($msgs, $row_id." - Required value is empty: cr_tmp_uname");
	}
	
	// Check required field: cr_tmp_pwd
	if (empty($row['cr_tmp_pwd'])) {
		array_push($msgs, $row_id." - Required value is empty: cr_tmp_pwd");
	}
	
	if (count($msgs)>30) {
		break;
	}
}

?>