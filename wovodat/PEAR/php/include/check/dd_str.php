<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_str_id, dd_str_code, di_tlt_id, ds_id, dd_str_time, dd_str_azi_ax1, dd_str_azi_ax2, dd_str_azi_ax3, dd_str_pmax_dir, dd_str_pmin_dir, dd_str_pmin, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_str";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_str.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_str_id'];
	
	// Check required field: ds_id
	if (empty($row['ds_id'])) {
		array_push($msgs, $row_id." - Required value is empty: ds_id");
	}
	
	// Check required field: dd_str_time
	if (empty($row['dd_str_time'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_str_time");
	}
	
	// Check link (inclusion 1): di_tlt_id
	check_link_include1($row['di_tlt_id'], 'di_tlt_id', 'di_tlt', 'di_tlt_id', 'di_tlt_stime', 'di_tlt_etime', 'dd_str_time', $row['dd_str_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): ds_id
	check_link_include1($row['ds_id'], 'ds_id', 'ds', 'ds_id', 'ds_stime', 'ds_etime', 'dd_str_time', $row['dd_str_time'], $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: ds_id=di_tlt.ds_id
	check_value($row['ds_id'], 'ds_id', 'ds_id', 'di_tlt', 'di_tlt_id', $row['di_tlt_id'], $row_id, $msgs);
	
	// Check value: dd_str_azi_ax1
	if (!empty($row['dd_str_azi_ax1'])) {
		if ($row['dd_str_azi_ax1']<0 || $row['dd_str_azi_ax1']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_str_azi_ax1=".$row['dd_str_azi_ax1']);
		}
	}
	
	// Check value: dd_str_azi_ax2
	if (!empty($row['dd_str_azi_ax2'])) {
		if ($row['dd_str_azi_ax2']<0 || $row['dd_str_azi_ax2']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_str_azi_ax2=".$row['dd_str_azi_ax2']);
		}
	}
	
	// Check value: dd_str_azi_ax3
	if (!empty($row['dd_str_azi_ax3'])) {
		if ($row['dd_str_azi_ax3']<0 || $row['dd_str_azi_ax3']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_str_azi_ax3=".$row['dd_str_azi_ax3']);
		}
	}
	
	// Check value: dd_str_pmax_dir
	if (!empty($row['dd_str_pmax_dir'])) {
		if ($row['dd_str_pmax_dir']<0 || $row['dd_str_pmax_dir']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_str_pmax_dir=".$row['dd_str_pmax_dir']);
		}
	}
	
	// Check value: dd_str_pmin_dir
	if (!empty($row['dd_str_pmin_dir'])) {
		if ($row['dd_str_pmin_dir']<0 || $row['dd_str_pmin_dir']>360) {
			array_push($msgs, $row_id." - Incorrect value: dd_str_pmin_dir=".$row['dd_str_pmin_dir']);
		}
	}
	
	// Check value: dd_str_pmin_dir <= dd_str_pmax_dir
	if (!empty($row['dd_str_pmin_dir']) && !empty($row['dd_str_pmax_dir'])) {
		if ($row['dd_str_pmin_dir']>$row['dd_str_pmax_dir']) {
			array_push($msgs, $row_id." - Incorrect value: dd_str_pmin_dir=".$row['dd_str_pmin_dir']." > dd_str_pmax_dir=".$row['dd_str_pmax_dir']);
		}
	}
	
	// Check uniqueness
	check_unique("dd_str", $row['dd_str_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>