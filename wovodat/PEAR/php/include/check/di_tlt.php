<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT di_tlt_id, di_tlt_code, ds_id, di_tlt_stime, di_tlt_etime, di_tlt_dir1, di_tlt_dir2, di_tlt_dir3, di_tlt_dir4, cc_id, cc_id2, cc_id3, cc_id_load FROM di_tlt";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [di_tlt.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['di_tlt_id'];
	
	// Check required field: di_tlt_stime
	if (empty($row['di_tlt_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: di_tlt_stime");
	}
	
	// Check time order: di_tlt_stime < di_tlt_etime
	if (!empty($row['di_tlt_stime']) && !empty($row['di_tlt_etime'])) {
		if (strcmp($row['di_tlt_stime'], $row['di_tlt_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: di_tlt_stime=".$row['di_tlt_stime']." > di_tlt_etime=".$row['di_tlt_etime']);
		}
	}
	
	// Check link (inclusion 2): ds_id
	check_link_include2($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'di_tlt_stime', $row['di_tlt_stime'], 'di_tlt_etime', $row['di_tlt_etime'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: di_tlt_dir1
	if (!empty($row['di_tlt_dir1'])) {
		if ($row['di_tlt_dir1']<0 || $row['di_tlt_dir1']>360) {
			array_push($msgs, $row_id." - Incorrect value: di_tlt_dir1=".$row['di_tlt_dir1']);
		}
	}
	
	// Check value: di_tlt_dir2
	if (!empty($row['di_tlt_dir2'])) {
		if ($row['di_tlt_dir2']<0 || $row['di_tlt_dir2']>360) {
			array_push($msgs, $row_id." - Incorrect value: di_tlt_dir2=".$row['di_tlt_dir2']);
		}
	}
	
	// Check value: di_tlt_dir3
	if (!empty($row['di_tlt_dir3'])) {
		if ($row['di_tlt_dir3']<0 || $row['di_tlt_dir3']>360) {
			array_push($msgs, $row_id." - Incorrect value: di_tlt_dir3=".$row['di_tlt_dir3']);
		}
	}
	
	// Check value: di_tlt_dir4
	if (!empty($row['di_tlt_dir4'])) {
		if ($row['di_tlt_dir4']<0 || $row['di_tlt_dir4']>360) {
			array_push($msgs, $row_id." - Incorrect value: di_tlt_dir4=".$row['di_tlt_dir4']);
		}
	}
	
	// Check uniqueness
	check_unique_time("di_tlt", $row['di_tlt_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['di_tlt_stime'], $row['di_tlt_etime'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>