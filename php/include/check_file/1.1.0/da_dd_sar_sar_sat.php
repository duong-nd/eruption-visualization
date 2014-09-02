<?php

// Prepare results
$da_dd_sar_sar_obj['results']['cs_ids']=array();

// ### Check satellite codes and record cs_ids
foreach ($da_dd_sar_sar_sat_obj['value'] as &$da_dd_sar_sar_sat_ele) {
	
	// Get cs_code
	$cs_code=preg_replace('/\s+/', ' ', trim($da_dd_sar_sar_sat_ele['value'][0]));
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT cs_id, cs_stime, cs_etime FROM cs WHERE cs_code='".mysql_real_escape_string($cs_code)."' AND cs_type='S' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($final_owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=array();
	while ($row=mysql_fetch_array($result)) {
		array_push($results, $row);
	}
	
	// Loop on results - get the one with correct time frame
	$cs_selected=array();
	$selected=FALSE;
	foreach ($results as $cs) {
		$check2=FALSE;
		// Check time inclusion
		// Parent start time < Object start time
		if (!empty($cs['stime']) && !empty($da_dd_sar_sar_time1)) {
			if (strcmp($cs['stime'], $da_dd_sar_sar_time1)>0) {
				$check2=TRUE;
			}
			else {
				// Object start time < Parent end time
				if (!empty($da_dd_sar_sar_time1) && !empty($cs['etime'])) {
					if (strcmp($da_dd_sar_sar_time1, $cs['etime'])>0) {
						$check2=TRUE;
					}
				}
			}
		}
		if (!$check2) {
			$cs_selected=$cs['cs_id'];
			$selected=TRUE;
			break;
		}
		// Parent start time < Object start time
		if (!empty($cs['stime']) && !empty($da_dd_sar_sar_time2)) {
			if (strcmp($cs['stime'], $da_dd_sar_sar_time2)>0) {
				continue;
			}
			else {
				// Object start time < Parent end time
				if (!empty($da_dd_sar_sar_time2) && !empty($cs['etime'])) {
					if (strcmp($da_dd_sar_sar_time2, $cs['etime'])>0) {
						continue;
					}
				}
			}
		}
		$cs_selected=$cs['cs_id'];
		$selected=TRUE;
		break;
	}
	
	if (!$selected) {
		$error=array();
		$error['code']=2;
		$error['message']="For &lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt;, no satellite (code=\"".$cs_code."\") was found to have a timeframe including either time of image 1 (".$da_dd_sar_sar_time1.") or time of image 2 (".$da_dd_sar_sar_time2.")";
		array_push($errors, $error);
		$l_errors++;
		return FALSE;
	}
	
	// Check duplication
	foreach ($da_dd_sar_sar_obj['results']['cs_ids'] as $rec_cs_id) {
		if ($cs_selected==$rec_cs_id) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=7;
			$errors[$l_errors]['message']="In &lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt;, list of satellites contains a duplication (satelliteCode=\"".$cs_code."\")";
			$l_errors++;
			return FALSE;
		}
	}
	
	// Record
	array_push($da_dd_sar_sar_obj['results']['cs_ids'], $cs_selected);
}

?>