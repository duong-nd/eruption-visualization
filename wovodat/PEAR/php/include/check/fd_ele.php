<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT fd_ele_id, fd_ele_code, fs_id1, fs_id2, fi_id, fd_ele_time, fd_ele_field, fd_ele_dir, cc_id, cc_id2, cc_id3, cc_id_load FROM fd_ele";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [fd_ele.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['fd_ele_id'];
	
	// Check required field: fd_ele_time
	if (empty($row['fd_ele_time'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_ele_time");
	}
	
	// Check required field: fd_ele_field
	if (empty($row['fd_ele_field'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_ele_field");
	}
	
	// Check required field: fd_ele_dir
	if (empty($row['fd_ele_dir'])) {
		array_push($msgs, $row_id." - Required value is empty: fd_ele_dir");
	}
	
	// Check link (inclusion 1): fi_id
	check_link_include1($row['fi_id'], 'fi_id', 'fi', 'fi_id', 'fi_stime', 'fi_etime', 'fd_ele_time', $row['fd_ele_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): fs_id1
	check_link_include1($row['fs_id1'], 'fs_id1', 'fs', 'fs_id', 'fs_stime', 'fs_etime', 'fd_ele_time', $row['fd_ele_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): fs_id2
	check_link_include1($row['fs_id2'], 'fs_id2', 'fs', 'fs_id', 'fs_stime', 'fs_etime', 'fd_ele_time', $row['fd_ele_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique("fd_ele", $row['fd_ele_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>