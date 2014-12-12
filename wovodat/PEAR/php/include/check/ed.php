<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ed_id, ed_code, vd_id, ed_stime, ed_stime_bc, ed_climax, ed_climax_bc, ed_etime, ed_etime_bc, cc_id, cc_id2, cc_id3, cc_id_load FROM ed";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ed.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ed_id'];
	
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
	
	// Create real ed_stime
	$ed_stime_is_bc=FALSE;
	if (!empty($row['ed_stime_bc'])) {
		$ed_stime=$row['ed_stime_bc'].substr($row['ed_stime'], 4);
		$ed_stime_is_bc=TRUE;
	}
	else {
		$ed_stime=$row['ed_stime'];
	}
	
	// Create real ed_climax
	$ed_climax_is_bc=FALSE;
	if (!empty($row['ed_climax_bc'])) {
		$ed_climax=$row['ed_climax_bc'].substr($row['ed_climax'], 4);
		$ed_climax_is_bc=TRUE;
	}
	else {
		$ed_climax=$row['ed_climax'];
	}
	
	// Create real ed_etime
	$ed_etime_is_bc=FALSE;
	if (!empty($row['ed_etime_bc'])) {
		$ed_etime=$row['ed_etime_bc'].substr($row['ed_etime'], 4);
		$ed_etime_is_bc=TRUE;
	}
	else {
		$ed_etime=$row['ed_etime'];
	}
	
	// Check time order: ed_stime < ed_etime
	if (!empty($ed_stime) && !empty($ed_etime)) {
		if ($ed_stime_is_bc && $ed_etime_is_bc) {
			if (strcmp($ed_stime, $ed_etime) < 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_stime=".$ed_stime." > ed_etime=".$ed_etime);
			}
		}
		else {
			if (strcmp($ed_stime, $ed_etime) > 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_stime=".$ed_stime." > ed_etime=".$ed_etime);
			}
		}
	}
	
	// Check time order: ed_stime < ed_climax
	if (!empty($ed_stime) && !empty($ed_climax)) {
		if ($ed_stime_is_bc && $ed_climax_is_bc) {
			if (strcmp($ed_stime, $ed_climax) < 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_stime=".$ed_stime." > ed_climax=".$ed_climax);
			}
		}
		else {
			if (strcmp($ed_stime, $ed_climax) > 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_stime=".$ed_stime." > ed_climax=".$ed_climax);
			}
		}
	}
	
	// Check time order: ed_climax < ed_etime
	if (!empty($ed_climax) && !empty($ed_etime)) {
		if ($ed_climax_is_bc && $ed_etime_is_bc) {
			if (strcmp($ed_climax, $ed_etime) < 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_climax=".$ed_climax." > ed_etime=".$ed_etime);
			}
		}
		else {
			if (strcmp($ed_climax, $ed_etime) > 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_climax=".$ed_climax." > ed_etime=".$ed_etime);
			}
		}
	}
	
	// Check uniqueness
	check_unique("ed", $row['ed_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>