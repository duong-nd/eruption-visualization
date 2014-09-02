<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT ed_for_id, ed_for_code, vd_id, ed_phs_id, ed_for_open, ed_for_close, ed_for_time, cc_id, cc_id2, cc_id3, cc_id_load FROM ed_for";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [ed_for.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	
	// Row ID
	$row_id=$row['ed_for_id'];
	
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
	
	// Check link (time before): ed_phs_id
	if (!empty($row['ed_phs_id']) && !empty($row['ed_for_time'])) {
		
		// Check link (unique)
		$count_table_name='ed_phs';
		$count_field_name=array();
		$count_field_name[0]='ed_phs_id';
		$count_field_value=array();
		$count_field_value[0]=$row['ed_phs_id'];
		$num=0;
		$errors="";
		if (!db_count($count_table_name, $count_field_name, $count_field_value, $num, $errors)) {
			// Database error
			switch ($errors) {
				case "Error in the parameters given":
					$_SESSION['errors'][0]=array();
					$_SESSION['errors'][0]['code']=1039;
					$_SESSION['errors'][0]['message']=$errors." // ed_for.php -> db_count";
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
			array_push($msgs, $row_id." - Incorrect link  to ed_phs.ed_phs_id: ed_phs_id=".$row['ed_phs_id']);
		}
		
		else {
			// Check time condition
			
			// Get phase time
			$query_sql="SELECT ed_phs_stime, ed_phs_stime_bc FROM ed_phs WHERE ed_phs_id=".$row['ed_phs_id']." LIMIT 1";
			$query_results2=array();
			$query_error="";
			if (!db_sql($query_sql, $query_results2, $query_error)) {
				// Database error
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1120;
				$_SESSION['errors'][0]['message']=$query_error." [ed_for.php -> db_sql(query_sql=$query_sql)]";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			}
			
			// Calculate phase time
			$ed_phs_stime=$query_results2[0]['ed_phs_stime'];
			$ed_phs_stime_bc=$query_results2[0]['ed_phs_stime_bc'];
			
			// If phase time is BC, forecast can't be before
			if (empty($ed_phs_stime_bc)) {
				array_push($msgs, $row_id." - Time condition: ed_for_time=".$row['ed_for_time']." is after time of ed_phs_id=".$row['ed_phs_id']);
			}
			else {
				// Compare: ed_for_time <= ed_phs_stime
				if (strcmp($row['ed_for_time'], $ed_phs_stime) > 0) {
					array_push($msgs, $row_id." - Time condition: ed_for_time=".$row['ed_for_time']." is after time of ed_phs_id=".$row['ed_phs_id']);
				}
			}
		}
	}
	
	// Check time order: ed_for_time < ed_for_open
	if (!empty($row['ed_for_time']) && !empty($row['ed_for_open'])) {
		if (strcmp($row['ed_for_time'], $row['ed_for_open']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ed_for_time=".$row['ed_for_time']." > ed_for_open=".$row['ed_for_open']);
		}
	}
	
	// Check time order: ed_for_open < ed_for_close
	if (!empty($row['ed_for_open']) && !empty($row['ed_for_close'])) {
		if (strcmp($row['ed_for_open'], $row['ed_for_close']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: ed_for_open=".$row['ed_for_open']." > ed_for_close=".$row['ed_for_close']);
		}
	}
	
	// Check value: vd_id=ed_phs_id.ed_id.vd_id
	check_value2($row['vd_id'], 'vd_id', 'ed_id', 'ed_phs', 'ed_phs_id', $row['ed_phs_id'], 'vd_id', 'ed', 'ed_id', $row_id, $msgs);
	
	// Check uniqueness
	check_unique("ed_for", $row['ed_for_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>