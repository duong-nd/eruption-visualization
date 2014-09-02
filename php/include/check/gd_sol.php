<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT gd_sol_id, gd_sol_code, gs_id, gi_id, gd_sol_time, gd_sol_species, gd_sol_tflux, cc_id, cc_id2, cc_id3, cc_id_load FROM gd_sol";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [gd_sol.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['gd_sol_id'];
	
	// Check required field: gd_sol_time
	if (empty($row['gd_sol_time'])) {
		array_push($msgs, $row_id." - Required value is empty: gd_sol_time");
	}
	
	// Check required field: gd_sol_species
	if (empty($row['gd_sol_species'])) {
		array_push($msgs, $row_id." - Required value is empty: gd_sol_species");
	}
	
	// Check required field: gd_sol_tflux
	if (empty($row['gd_sol_tflux'])) {
		array_push($msgs, $row_id." - Required value is empty: gd_sol_tflux");
	}
	
	// Check link (inclusion 1): gi_id
	check_link_include1($row['gi_id'], 'gi_id', 'gi', 'gi_id', 'gi_stime', 'gi_etime', 'gd_sol_time', $row['gd_sol_time'], $row_id, $msgs);
	
	// Check link (inclusion 1): gs_id
	check_link_include1($row['gs_id'], 'gs_id', 'gs', 'gs_id', 'gs_stime', 'gs_etime', 'gd_sol_time', $row['gd_sol_time'], $row_id, $msgs);
	
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
	
	// Check uniqueness
	check_unique("gd_sol", $row['gd_sol_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>