<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cm_id, cm_code, cm_lat, cm_lon, vd_id, cc_id, cc_id2, cc_id3, cc_id_load FROM cm";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [cm.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	// Row ID
	$row_id=$row['cm_id'];
	
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
	
	// Check value: cm_lat
	if (!empty($row['cm_lat'])) {
		if ($row['cm_lat']<-90 || $row['cm_lat']>90) {
			array_push($msgs, $row_id." - Incorrect value: cm_lat=".$row['cm_lat']);
		}
	}
	
	// Check value: cm_lon
	if (!empty($row['cm_lon'])) {
		if ($row['cm_lon']<-180 || $row['cm_lon']>180) {
			array_push($msgs, $row_id." - Incorrect value: cm_lon=".$row['cm_lon']);
		}
	}
	
	// Check uniqueness
	check_unique("cm", $row['cm_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>