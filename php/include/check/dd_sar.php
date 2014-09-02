<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT dd_sar_id, dd_sar_code, di_gen_id, vd_id, dd_sar_slat, dd_sar_slon, dd_sar_spos, dd_sar_rord, dd_sar_nrows, dd_sar_ncols, dd_sar_img1_time, dd_sar_img2_time, cc_id, cc_id2, cc_id3, cc_id_load FROM dd_sar";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [dd_sar.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['dd_sar_id'];
	
	// Check required field: dd_sar_slat
	if (empty($row['dd_sar_slat'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_sar_slat");
	}
	
	// Check required field: dd_sar_slon
	if (empty($row['dd_sar_slon'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_sar_slon");
	}
	
	// Check required field: dd_sar_spos
	if (empty($row['dd_sar_spos'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_sar_spos");
	}
	
	// Check required field: dd_sar_rord
	if (empty($row['dd_sar_rord'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_sar_rord");
	}
	
	// Check required field: dd_sar_nrows
	if (empty($row['dd_sar_nrows'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_sar_nrows");
	}
	
	// Check required field: dd_sar_ncols
	if (empty($row['dd_sar_ncols'])) {
		array_push($msgs, $row_id." - Required value is empty: dd_sar_ncols");
	}
	
	// Check link (inclusion 1): di_gen_id
	check_link_include1($row['di_gen_id'], 'di_gen_id', 'di_gen', 'di_gen_id', 'di_gen_stime', 'di_gen_etime', 'dd_sar_img1_time', $row['dd_sar_img1_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): di_gen_id
	check_link_include1($row['di_gen_id'], 'di_gen_id', 'di_gen', 'di_gen_id', 'di_gen_stime', 'di_gen_etime', 'dd_sar_img2_time', $row['dd_sar_img2_time'], $row_id, $msgs);
	
	// Check link: vd_id
	check_link($row['vd_id'], 'vd_id', 'vd', 'vd_id', $row_id, $msgs);
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check value: dd_sar_slat
	if (!empty($row['dd_sar_slat'])) {
		if ($row['dd_sar_slat']<-90 || $row['dd_sar_slat']>90) {
			array_push($msgs, $row_id." - Incorrect value: dd_sar_slat=".$row['dd_sar_slat']);
		}
	}
	
	// Check value: dd_sar_slon
	if (!empty($row['dd_sar_slon'])) {
		if ($row['dd_sar_slon']<-180 || $row['dd_sar_slon']>180) {
			array_push($msgs, $row_id." - Incorrect value: dd_sar_slon=".$row['dd_sar_slon']);
		}
	}
	
	// Check time order: dd_sar_img1_time < dd_sar_img2_time
	if (!empty($row['dd_sar_img1_time']) && !empty($row['dd_sar_img2_time'])) {
		if (strcmp($row['dd_sar_img1_time'], $row['dd_sar_img2_time']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: dd_sar_img1_time=".$row['dd_sar_img1_time']." > dd_sar_img2_time=".$row['dd_sar_img2_time']);
		}
	}
	
	// Check vd_id: vd_id = di_gen_id.ds_id.cn_id.vd_id OR jj_volnet.vd_id WHERE jj_net_id= di_gen_id.ds_id.cn_id AND jj_net_flag=C
	check_vd_id($row['vd_id'], 'di_gen', 'di_gen_id', $row['di_gen_id'], 'ds_id', 'C', $row_id, $msgs);
	
	// Check InSAR pixels
	check_insar_pix($row_id, $row['dd_sar_nrows'], $row['dd_sar_ncols'], $msgs);
	
	// Check uniqueness
	check_unique("dd_sar", $row['dd_sar_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>