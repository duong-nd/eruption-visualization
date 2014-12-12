<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT sd_evn_id, sd_evn_code, sn_id, sd_evn_time, sd_evn_timecsec, sd_evn_tech, sd_evn_gp, sd_evn_strk1, sd_evn_dip1, sd_evn_rak1, sd_evn_strk2, sd_evn_dip2, sd_evn_rak2, cc_id, cc_id2, cc_id3, cc_id_load FROM sd_evn";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [sd_evn.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['sd_evn_id'];
	
	// Check required field: sd_evn_time
	if (empty($row['sd_evn_time'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_evn_time");
	}
	
	// Check required field: sd_evn_tech
	if (empty($row['sd_evn_tech'])) {
		array_push($msgs, $row_id." - Required value is empty: sd_evn_tech");
	}
	
	// Check required field: sn_id
	if (empty($row['sn_id'])) {
		array_push($msgs, $row_id." - Required value is empty: sn_id");
	}
	
	// sd_evn_time with csec
	if (!empty($row['sd_evn_timecsec'])) {
		$sd_evn_time=$row['sd_evn_time'].".".substr($row['sd_evn_timecsec'], 2);
	}
	else {
		$sd_evn_time=$row['sd_evn_time'];
	}
	
	// Check link (inclusion 1): sn_id
	check_link_include1($row['sn_id'], 'sn_id', 'sn', 'sn_id', 'sn_stime', 'sn_etime', 'sd_evn_time', $sd_evn_time, $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: sd_evn_gp
	if (!empty($row['sd_evn_gp'])) {
		if ($row['sd_evn_gp']<0 || $row['sd_evn_gp']>360) {
			array_push($msgs, $row_id." - Incorrect value: sd_evn_gp=".$row['sd_evn_gp']);
		}
	}
	
	// Check value: sd_evn_strk1
	if (!empty($row['sd_evn_strk1'])) {
		if ($row['sd_evn_strk1']<0 || $row['sd_evn_strk1']>360) {
			array_push($msgs, $row_id." - Incorrect value: sd_evn_strk1=".$row['sd_evn_strk1']);
		}
	}
	
	// Check value: sd_evn_dip1
	if (!empty($row['sd_evn_dip1'])) {
		if ($row['sd_evn_dip1']<0 || $row['sd_evn_dip1']>90) {
			array_push($msgs, $row_id." - Incorrect value: sd_evn_dip1=".$row['sd_evn_dip1']);
		}
	}
	
	// Check value: sd_evn_rak1
	if (!empty($row['sd_evn_rak1'])) {
		if ($row['sd_evn_rak1']<-180 || $row['sd_evn_rak1']>180) {
			array_push($msgs, $row_id." - Incorrect value: sd_evn_rak1=".$row['sd_evn_rak1']);
		}
	}
	
	// Check value: sd_evn_strk2
	if (!empty($row['sd_evn_strk2'])) {
		if ($row['sd_evn_strk2']<0 || $row['sd_evn_strk2']>360) {
			array_push($msgs, $row_id." - Incorrect value: sd_evn_strk2=".$row['sd_evn_strk2']);
		}
	}
	
	// Check value: sd_evn_dip2
	if (!empty($row['sd_evn_dip2'])) {
		if ($row['sd_evn_dip2']<0 || $row['sd_evn_dip2']>90) {
			array_push($msgs, $row_id." - Incorrect value: sd_evn_dip2=".$row['sd_evn_dip2']);
		}
	}
	
	// Check value: sd_evn_rak2
	if (!empty($row['sd_evn_rak2'])) {
		if ($row['sd_evn_rak2']<-180 || $row['sd_evn_rak2']>180) {
			array_push($msgs, $row_id." - Incorrect value: sd_evn_rak2=".$row['sd_evn_rak2']);
		}
	}
	
	// Check uniqueness
	check_unique_sd_evn($row['sd_evn_code'], $row['sn_id'], $row['sd_evn_tech'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>