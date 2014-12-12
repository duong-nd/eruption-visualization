<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ch_id, ch_linkname, ch_link_id, ch_atname, cc_id_load FROM ch";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ch.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	// Row ID
	$row_id=$row['ch_id'];
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check ch_linkname
	if (empty($row['ch_linkname'])) {
		array_push($msgs, $row_id." - Required value is empty: ch_linkname");
	}
	
	// Check ch_link_id
	if (empty($row['ch_link_id'])) {
		array_push($msgs, $row_id." - Required value is empty: ch_link_id");
	}
	
	// Check ch_atname
	if (empty($row['ch_atname'])) {
		array_push($msgs, $row_id." - Required value is empty: ch_atname");
	}
	
	// Check link: ch_link_id
	if (!empty($row['ch_linkname']) && !empty($row['ch_link_id'])) {
		check_link($row['ch_link_id'], 'ch_link_id', $row['ch_linkname'], $row['ch_linkname']."_id", $row_id, $msgs);
	}
	
	// Check field exists: ch_linkname.ch_atname
	if (!empty($row['ch_linkname']) && !empty($row['ch_atname'])) {
		$query_sql="SELECT ".$row['ch_atname']." FROM ".$row['ch_linkname'];
		$query_results=array();
		$query_error="";
		if (!db_sql($query_sql, $query_results, $query_error)) {
			// Database error = field doesn't exist
			array_push($msgs, $row_id." - Field doesn't exist: ch_atname=".$row['ch_atname']." in table ".$row['ch_linkname']);
		}
	}
	
	if (count($msgs)>30) {
		break;
	}
}

?>