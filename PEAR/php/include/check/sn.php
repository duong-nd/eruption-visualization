<?php

// Database functions
require_once "php/funcs/db_funcs.php";

// Check functions
require_once "php/funcs/check_funcs.php";

// Get values of interest
$query_sql="SELECT cb_ids, sn_id, sn_code, sn_vmodel, sn_stime, sn_etime, vd_id, sn_tot, sn_bb, sn_smp, sn_digital, sn_analog, sn_tcomp, sn_micro, cc_id, cc_id2, cc_id3, cc_id_load FROM sn";
$query_results=array();
$query_error="";
if (!db_sql($query_sql, $query_results, $query_error)) {
	// Database error
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1120;
	$_SESSION['errors'][0]['message']=$query_error." [sn.php -> db_sql(query_sql=$query_sql)]";
	$_SESSION['l_errors']=1;
	// Redirect user to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// For each row
foreach ($query_results as $row) {
	// Row ID
	$row_id=$row['sn_id'];
	
	// Check required field: sn_stime
	if (empty($row['sn_stime'])) {
		array_push($msgs, $row_id." - Required value is empty: sn_stime");
	}
	
	// Check time order: sn_stime < sn_etime
	if (!empty($row['sn_stime']) && !empty($row['sn_etime'])) {
		if (strcmp($row['sn_stime'], $row['sn_etime']) > 0) {
			array_push($msgs, $row_id." - Incorrect time order: sn_stime=".$row['sn_stime']." > sn_etime=".$row['sn_etime']);
		}
	}
	
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
	
	// Check value: sn_tot
	if (!empty($row['sn_tot']) || $row['sn_tot']==0) {
		// Check value: sn_bb <= sn_tot
		if (!empty($row['sn_bb'])) {
			if ($row['sn_tot']<$row['sn_bb']) {
				array_push($msgs, $row_id." - Incorrect value: sn_tot=".$row['sn_tot']." &lt; sn_bb=".$row['sn_bb']);
			}
		}
		// Check value: sn_smp <= sn_tot
		if (!empty($row['sn_smp'])) {
			if ($row['sn_tot']<$row['sn_smp']) {
				array_push($msgs, $row_id." - Incorrect value: sn_tot=".$row['sn_tot']." &lt; sn_smp=".$row['sn_smp']);
			}
		}
		// Check value: sn_digital <= sn_tot
		if (!empty($row['sn_digital'])) {
			if ($row['sn_tot']<$row['sn_digital']) {
				array_push($msgs, $row_id." - Incorrect value: sn_tot=".$row['sn_tot']." &lt; sn_digital=".$row['sn_digital']);
			}
		}
		// Check value: sn_analog <= sn_tot
		if (!empty($row['sn_analog'])) {
			if ($row['sn_tot']<$row['sn_analog']) {
				array_push($msgs, $row_id." - Incorrect value: sn_tot=".$row['sn_tot']." &lt; sn_analog=".$row['sn_analog']);
			}
		}
		// Check value: sn_tcomp <= sn_tot
		if (!empty($row['sn_tcomp'])) {
			if ($row['sn_tot']<$row['sn_tcomp']) {
				array_push($msgs, $row_id." - Incorrect value: sn_tot=".$row['sn_tot']." &lt; sn_tcomp=".$row['sn_tcomp']);
			}
		}
		// Check value: sn_micro <= sn_tot
		if (!empty($row['sn_micro'])) {
			if ($row['sn_tot']<$row['sn_micro']) {
				array_push($msgs, $row_id." - Incorrect value: sn_tot=".$row['sn_tot']." &lt; sn_micro=".$row['sn_micro']);
			}
		}
	}
	
	// Check uniqueness
	check_unique_time("sn", $row['sn_code'], $row['cc_id'], $row['cc_id2'], $row['cc_id3'], $row['sn_stime'], $row['sn_etime'], $row_id, $msgs);
	
	// Check links: cb_ids
	check_cb_ids($row['cb_ids'], $row_id, $msgs);
	
	if (count($msgs)>30) {
		break;
	}
}

?>