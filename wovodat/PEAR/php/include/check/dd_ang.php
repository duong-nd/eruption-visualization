<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_ang_id, dd_ang_code, di_gen_id, ds_id, ds_id1, ds_id2, dd_ang_time, dd_ang_hort1, dd_ang_hort2, dd_ang_vert1, dd_ang_vert2, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_ang";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_ang.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_ang_id'];
	
	// Check required field: ds_id
	if (empty($row['ds_id'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id");
	}
	
	// Check required field: ds_id1
	if (empty($row['ds_id1'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id1");
	}
	
	// Check required field: ds_id2
	if (empty($row['ds_id2'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id2");
	}
	
	// Check required field: dd_ang_time
	if (empty($row['dd_ang_time'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_ang_time");
	}
	
	// Check required field: dd_ang_hort1
	if (empty($row['dd_ang_hort1'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_ang_hort1");
	}
	
	// Check required field: dd_ang_hort2
	if (empty($row['dd_ang_hort2'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_ang_hort2");
	}
	
	// Check required field: dd_ang_vert1
	if (empty($row['dd_ang_vert1'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_ang_vert1");
	}
	
	// Check required field: dd_ang_vert2
	if (empty($row['dd_ang_vert2'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_ang_vert2");
	}
	
	// Check link (inclusion 1): di_gen_id
	check_link_include1($row['di_gen_id'], 'di_gen_id', 'di_gen', 'di_gen_id', 'di_gen_stime', 'di_gen_etime', 'dd_ang_time', $row['dd_ang_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_ang_time', $row['dd_ang_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id1
	check_link_include1($row['ds_id1'], 'ds_id1', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_ang_time', $row['dd_ang_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id2
	check_link_include1($row['ds_id2'], 'ds_id2', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_ang_time', $row['dd_ang_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: ds_id=di_gen.ds_id
	check_value($row['ds_id'], 'ds_id', 'ds_id', 'di_gen', 'di_gen_id', $row['di_gen_id'], $row_id, $msgs);
	
	// Check value: dd_ang_hort1
	if (!empty($row['dd_ang_hort1'])) {
		if ($row['dd_ang_hort1']<0 || $row['dd_ang_hort1']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_ang_hort1=".$row['dd_ang_hort1']);
		}
	}
	
	// Check value: dd_ang_hort2
	if (!empty($row['dd_ang_hort2'])) {
		if ($row['dd_ang_hort2']<0 || $row['dd_ang_hort2']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_ang_hort2=".$row['dd_ang_hort2']);
		}
	}
	
	// Check value: dd_ang_vert1
	if (!empty($row['dd_ang_vert1'])) {
		if ($row['dd_ang_vert1']<-90 || $row['dd_ang_vert1']>90) {
			array_push($msgs, $row_id." - Incorrect value: dd_ang_vert1=".$row['dd_ang_vert1']);
		}
	}
	
	// Check value: dd_ang_vert2
	if (!empty($row['dd_ang_vert2'])) {
		if ($row['dd_ang_vert2']<-90 || $row['dd_ang_vert2']>90) {
			array_push($msgs, $row_id." - Incorrect value: dd_ang_vert2=".$row['dd_ang_vert2']);
		}
	}
	
	// Check uniqueness
	check_unique("dd_ang", $row['dd_ang_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>