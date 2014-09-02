<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT sd_ssm_id, sd_sam_id, sd_ssm_stime, sd_ssm_count, sd_ssm_lowf, sd_ssm_highf, cc_id_load FROM sd_ssm";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [sd_ssm.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['sd_ssm_id'];
	
	// Check required field: sd_sam_id
	if (empty($row['sd_sam_id'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_sam_id");
	}
	
	// Check required field: sd_ssm_stime
	if (empty($row['sd_ssm_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_ssm_stime");
	}
	
	// Check required field: sd_ssm_count
	if (empty($row['sd_ssm_count']) && $row['sd_ssm_count']!=0) {
		array_push($msgs, $row_id." - Required value is empty: sd_ssm_count");
	}
	
	// Check required field: sd_ssm_lowf
	if (empty($row['sd_ssm_lowf'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_ssm_lowf");
	}
	
	// Check required field: sd_ssm_highf
	if (empty($row['sd_ssm_highf'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_ssm_highf");
	}
	
	// Check value: sd_ssm_lowf < sd_ssm_highf
	if ($row['sd_ssm_lowf']>=$row['sd_ssm_highf']) {
		array_push($msgs, $row_id." - Incorrect value: sd_ssm_lowf=".$row['sd_ssm_lowf']." &ge; sd_ssm_highf=".$row['sd_ssm_highf']);
	}
	
	// Check link: sd_sam_id
	check_link($row['sd_sam_id'], 'sd_sam_id', 'sd_sam', 'sd_sam_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>