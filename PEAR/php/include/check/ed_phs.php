<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ed_phs_id, ed_phs_code, ed_id, ed_phs_stime, ed_phs_stime_bc, ed_phs_etime, ed_phs_etime_bc, cc_id, cc_id2, cc_id3, cc_id_load FROM ed_phs";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ed_phs.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ed_phs_id'];
	
	// Create real ed_phs_stime
	$ed_phs_stime_is_bc=FALSE;
	if (!empty($row['ed_phs_stime_bc'])) {
		$ed_phs_stime=$row['ed_phs_stime_bc'].substr($row['ed_phs_stime'], 4);
		$ed_phs_stime_is_bc=TRUE;
	}
	else {
		$ed_phs_stime=$row['ed_phs_stime'];
	}
	
	// Create real ed_phs_etime
	$ed_phs_etime_is_bc=FALSE;
	if (!empty($row['ed_phs_etime_bc'])) {
		$ed_phs_etime=$row['ed_phs_etime_bc'].substr($row['ed_phs_etime'], 4);
		$ed_phs_etime_is_bc=TRUE;
	}
	else {
		$ed_phs_etime=$row['ed_phs_etime'];
	}
	
	// Check time order: ed_phs_stime < ed_phs_etime
	if (!empty($ed_phs_stime) && !empty($ed_phs_etime)) {
		if ($ed_phs_stime_is_bc && $ed_phs_etime_is_bc) {
			if (strcmp($ed_phs_stime, $ed_phs_etime) < 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_phs_stime=".$ed_phs_stime." > ed_phs_etime=".$ed_phs_etime);
			}
		}
		else {
			if (strcmp($ed_phs_stime, $ed_phs_etime) > 0) {
				array_push($msgs, $row_id." - Incorrect time order: ed_phs_stime=".$ed_phs_stime." > ed_phs_etime=".$ed_phs_etime);
			}
		}
	}
	
	// Check link (special: inclusion2 with bc dates): ed_id
	// Required values
	if (!empty($ed_phs_stime) || !empty($row['ed_id'])) {
		// Check link (unique)
		$count_table_name="ed";
		$count_field_name=array();
		$count_field_name[0]="ed_id";
		$count_field_value=array();
		$count_field_value[0]=$row['ed_id'];
		$num=0;
		$errors="";
		if (!db_count($count_table_name, $count_field_name, $count_field_value, $num, $errors)) {
			// Database error
			switch ($errors) {
				case "Error in the parameters given":
					$_SESSION['errors'][0]=array();
					$_SESSION['errors'][0]['code']=1039;
					$_SESSION['errors'][0]['message']=$errors." // ed_phs.php -> db_count";
					$_SESSION['l_errors']=1;
					// Redirect user to system error page
					header('Location: '.$url_root.'system_error.php');
					exit();
				default:
					$_SESSION['errors'][0]=array();
					$_SESSION['errors'][0]['code']=4011;
					$_SESSION['errors'][0]['message']=$errors;
					$_SESSION['l_errors']=1;
					// Redirect user to database error page
					header('Location: '.$url_root.'db_error.php');
					exit();
			}
		}
		if ($num!=1) {
			// No or many results
			array_push($msgs, $row_id." - Incorrect link  to ed.ed_id: ed_id=".$row['ed_id']);
			return;
		}
		
		// Get start time and end time
		$query_sql="SELECT ed_stime, ed_stime_bc, ed_etime, ed_etime_bc FROM ed WHERE ed_id=".$row['ed_id']." LIMIT 1";
		$query_results2=array();
		$query_error="";
		if (!db_sql($query_sql, $query_results2, $query_error)) {
			// Database error
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1120;
			$_SESSION['errors'][0]['message']=$query_error." [check_link_include2 -> db_sql(query_sql=$query_sql)]";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		
		// Get ed_stime and ed_etime
		$ed_stime=$query_results2[0][$field_stime];
		$ed_etime=$query_results2[0][$field_etime];
		
		// Create real ed_stime
		$ed_stime_is_bc=FALSE;
		if (!empty($row['ed_stime_bc'])) {
			$ed_stime=$row['ed_stime_bc'].substr($row['ed_stime'], 4);
			$ed_stime_is_bc=TRUE;
		}
		else {
			$ed_stime=$row['ed_stime'];
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
		
		// Compare: ed_phs_stime <= ed_stime
		if (!empty($ed_phs_stime) && !empty($ed_stime)) {
			if ($ed_phs_stime_is_bc && $ed_stime_is_bc) {
				if (strcmp($ed_stime, $ed_phs_stime)<0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: [ed_phs_stime=".$ed_phs_stime.", ed_phs_etime=".$ed_phs_etime."] is not included in time frame of ed_id=".$row['ed_id']);
				}
			}
			else {
				if (strcmp($ed_stime, $ed_phs_stime)>0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: [ed_phs_stime=".$ed_phs_stime.", ed_phs_etime=".$ed_phs_etime."] is not included in time frame of ed_id=".$row['ed_id']);
				}
			}
		}
		// Compare: ed_phs_etime <= ed_etime
		if (!empty($ed_phs_etime) && !empty($ed_etime)) {
			if ($ed_phs_etime_is_bc && $ed_etime_is_bc) {
				if (strcmp($ed_phs_etime, $ed_etime)<0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: [ed_phs_stime=".$ed_phs_stime.", ed_phs_etime=".$ed_phs_etime."] is not included in time frame of ed_id=".$row['ed_id']);
				}
			}
			else {
				if (strcmp($ed_phs_etime, $ed_etime)>0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: [ed_phs_stime=".$ed_phs_stime.", ed_phs_etime=".$ed_phs_etime."] is not included in time frame of ed_id=".$row['ed_id']);
				}
			}
		}
		
	}
	
	// Check link: cc_id
	check_link($row['cc_id'], 'cc_id', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id2
	check_link($row['cc_id2'], 'cc_id2', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id3
	check_link($row['cc_id3'], 'cc_id3', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check link: cc_id_load
	check_link($row['cc_id_load'], 'cc_id_load', 'cc', 'cc_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique("ed_phs", $row['ed_phs_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>