<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT jj_concon_id, jj_concon_view, jj_concon_upload, jj_concon_update, jj_concon_admin, cc_id_granted, cc_id, cc_id_load FROM jj_concon";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [jj_concon.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['jj_concon_id'];
	
	// Check required field: jj_concon_view
	if (empty($row['jj_concon_view']) && $row['jj_concon_view']!=0) {
		array_push($msgs, $row_id." - Required value is empty: jj_concon_view");
	}
	
	// Check required field: jj_concon_upload
	if (empty($row['jj_concon_upload']) && $row['jj_concon_upload']!=0) {
		array_push($msgs, $row_id." - Required value is empty: jj_concon_upload");
	}
	
	// Check required field: jj_concon_update
	if (empty($row['jj_concon_update']) && $row['jj_concon_update']!=0) {
		array_push($msgs, $row_id." - Required value is empty: jj_concon_update");
	}
	
	// Check required field: jj_concon_admin
	if (empty($row['jj_concon_admin']) && $row['jj_concon_admin']!=0) {
		array_push($msgs, $row_id." - Required value is empty: jj_concon_admin");
	}
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_granted
	check_link($row['cc_id_granted'], 'cc_id_granted', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>