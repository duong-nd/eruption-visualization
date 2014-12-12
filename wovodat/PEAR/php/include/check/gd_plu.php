<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT gd_plu_id, gd_plu_code, vd_id, gs_id, gi_id, gd_plu_time, gd_plu_species, cc_id, cc_id2, cc_id3, cc_id_load FROM gd_plu";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [gd_plu.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['gd_plu_id'];
	
	// Check required field: gd_plu_time
	if (empty($row['gd_plu_time'])) {
		array_push($msgs, $row_id." - Required value is empty: gd_plu_time");
	}
	
	// Check link (inclusion 1): gi_id
	check_link_include1($row['gi_id'], 'gi_id', 'gi', 'gi_id', 'gi_stime', 'gi_etime', 'gd_plu_time', $row['gd_plu_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): gs_id
	check_link_include1($row['gs_id'], 'gs_id', 'gs', 'gs_id', 'gs_stime', 'gs_etime', 'gd_plu_time', $row['gd_plu_time'], $row_id, $msgs);
	
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
	
	// Check value: gs_id=gi_id.gs_id
	check_value($row['gs_id'], 'gs_id', 'gs_id', 'gi', 'gi_id', $row['gi_id'], $row_id, $msgs);
	
	// Check vd_id: vd_id = gi_id.gs_id.cn_id.vd_id OR jj_volnet.vd_id WHERE jj_net_id= gi_id.gs_id.cn_id AND jj_net_flag=C
	check_vd_id($row['vd_id'], 'gi', 'gi_id', $row['gi_id'], 'gs_id', 'C', $row_id, $msgs);
	
	// Check uniqueness
	check_unique_species("gd_plu", $row['gd_plu_code'], $row['gd_plu_species'], NULL, $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>