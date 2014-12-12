<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT jj_imgx_id, cm_id, jj_idname, jj_x_id, cc_id_load FROM jj_imgx";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [jj_imgx.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['jj_imgx_id'];
	
	// Check required field: cm_id
	if (empty($row['cm_id'])) {
		array_push($msgs, $row_id." - Required value is empty: cm_id");
	}
	
	// Check required field: jj_idname
	if (empty($row['jj_idname'])) {
		array_push($msgs, $row_id." - Required value is empty: jj_idname");
	}
	
	// Check required field: jj_x_id
	if (empty($row['jj_x_id'])) {
		array_push($msgs, $row_id." - Required value is empty: jj_x_id");
	}
	
	// Check link: cm_id
	check_link($row['cm_id'], 'cm_id', 'cm', 'cm_id', $row_id, $msgs);
	
	// Check link: jj_x_id
	if (!empty($row['jj_idname'])) {
		check_link($row['jj_x_id'], 'jj_x_id', $row['jj_idname'], $row['jj_idname'].'_id', $row_id, $msgs);
	}
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>