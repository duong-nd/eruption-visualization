<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT fd_mgv_id, fd_mgv_code, fs_id, fi_id, fd_mgv_time, fd_mgv_dec, fd_mgv_incl, cc_id, cc_id2, cc_id3, cc_id_load FROM fd_mgv";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [fd_mgv.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['fd_mgv_id'];
	
	// Check required field: fd_mgv_time
	if (empty($row['fd_mgv_time'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_mgv_time");
	}
	
	// Check required field: fd_mgv_dec
	if (empty($row['fd_mgv_dec'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_mgv_dec");
	}
	
	// Check required field: fd_mgv_incl
	if (empty($row['fd_mgv_incl'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_mgv_incl");
	}
	
	// Check link (inclusion 1): fi_id
	check_link_include1($row['fi_id'], 'fi_id', 'fi', 'fi_id', 'fi_stime', 'fi_etime', 'fd_mgv_time', $row['fd_mgv_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): fs_id
	check_link_include1($row['fs_id'], 'fs_id', 'fs', 'fs_id', 'fs_stime', 'fs_etime', 'fd_mgv_time', $row['fd_mgv_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: fs_id=fi_id.fs_id
	check_value($row['fs_id'], 'fs_id', 'fs_id', 'fi', 'fi_id', $row['fi_id'], $row_id, $msgs);
	
	// Check value: fd_mgv_dec
	if (!empty($row['fd_mgv_dec'])) {
		if ($row['fd_mgv_dec']<0 || $row['fd_mgv_dec']>360) {
			array_push($msgs, $row_id." - Incorrect value: fd_mgv_dec=".$row['fd_mgv_dec']);
		}
	}
	
	// Check value: fd_mgv_incl
	if (!empty($row['fd_mgv_incl'])) {
		if ($row['fd_mgv_incl']<0 || $row['fd_mgv_incl']>90) {
			array_push($msgs, $row_id." - Incorrect value: fd_mgv_incl=".$row['fd_mgv_incl']);
		}
	}
	
	// Check uniqueness
	check_unique("fd_mgv", $row['fd_mgv_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>