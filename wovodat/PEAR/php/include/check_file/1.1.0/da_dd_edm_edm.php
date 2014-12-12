<?php

// vvv Set variables
$da_dd_edm_edm_key="dd_edm";
$da_dd_edm_edm_name="EDM";

// ^^^ Get code
$code=xml_get_att($da_dd_edm_edm_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_dd_edm_edm_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_dd_edm_edm_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_edm_edm_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_dd_edm_edm_time=xml_get_ele($da_dd_edm_edm_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_dd_edm_edm_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_dd_edm_edm_obj, $da_dd_edm_edm_name, $code, $da_dd_edm_edm_time, $da_dd_edm_edm_time, "deformation station", "ds", "ds_id1", "ds", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get target station
v1_get_ms($da_dd_edm_edm_obj, "TARGETSTATION", $gen_stations2);

// vvv Set station
if (!v1_set_ms_data($da_dd_edm_edm_obj, $da_dd_edm_edm_name, $code, $da_dd_edm_edm_time, $da_dd_edm_edm_time, "target station", "ds", "ds_id2", "ds", NULL, NULL, NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_dd_edm_edm_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_dd_edm_edm_obj, $da_dd_edm_edm_name, $code, $da_dd_edm_edm_time, $da_dd_edm_edm_time, "deformation instrument", "di_gen", "di_gen_id", "di_gen", "deformation station", "ds", "ds_id1", $da_dd_edm_edm_obj['results']['ds_id1'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_dd_edm_edm_obj['results']['ds_id1'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_edm_edm_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_dd_edm_edm_obj);

// vvv Set publish date
$data_time=array($da_dd_edm_edm_time);
v1_set_pubdate($data_time, $current_time, $da_dd_edm_edm_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_dd_edm_edm_obj['results']['owners'];
if (!v1_check_dupli_simple($da_dd_edm_edm_name, $da_dd_edm_edm_key, $code, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// vvv Record object
$data=array();
$data['owners']=$final_owners;
v1_record_obj($da_dd_edm_edm_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_dd_edm_edm_name, $da_dd_edm_edm_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_dd_edm_edm_key])) {
	$data_list[$da_dd_edm_edm_key]=array();
	$data_list[$da_dd_edm_edm_key]['name']="EDM data";
	$data_list[$da_dd_edm_edm_key]['number']=0;
	$data_list[$da_dd_edm_edm_key]['sets']=array();
}
$data_list[$da_dd_edm_edm_key]['number']++;

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Get values for display
$line_length=xml_get_ele($da_dd_edm_edm_obj, "LINELENGTH");

// Instrument code
$instrument_code=NULL;
foreach ($gen_instruments as $gen_code) {
	if (empty($gen_code)) {
		continue;
	}
	$instrument_code=$gen_code;
	break;
}
// Station code
$station_code=NULL;
foreach ($gen_stations as $gen_code) {
	if (empty($gen_code)) {
		continue;
	}
	$station_code=$gen_code;
	break;
}
// Target code
$target_code=NULL;
foreach ($gen_stations2 as $gen_code) {
	if (empty($gen_code)) {
		continue;
	}
	$target_code=$gen_code;
	break;
}

// Measurement time	(round to day)
if (!datetime_round_day($da_dd_edm_edm_time, $meas_time, $local_error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1380;
	$_SESSION['errors'][0]['message']="Error when rounding data to day: ".$da_dd_edm_edm_time."[check_file/1.1.0/da_dd_edm_edm.php]";
	$_SESSION['l_errors']=1;
	
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// According to couple {instCode - targetCode} or {stationCode - targetCode}, different set of data
$new_set=TRUE;
foreach ($data_list['dd_edm']['sets'] as &$edm_set) {
	// Case 1: instrument code was declared
	if (!empty($instrument_code)) {
		// Compare with set's key
		if ($edm_set['keys'][0]['name']=='instrument code' && $edm_set['keys'][0]['value']==$instrument_code) {
			// Compare target station code
			if ($edm_set['keys'][1]['value']==$target_code) {
				// Add values to this set
				$edm_set['values'][$meas_time]['line_length']=$line_length;
				
				// Compare min and max
				if (strcmp($meas_time, $edm_set['min']) < 0) {
					$edm_set['min']=$meas_time;
				}
				if (strcmp($meas_time, $edm_set['max']) > 0) {
					$edm_set['max']=$meas_time;
				}
				
				// No need to add a new set
				$new_set=FALSE;
				
				break;
			}
		}
	}
	// Case 2: station code was declared
	elseif (!empty($station_code)) {
		// Compare with set's key
		if ($edm_set['keys'][0]['name']=='station code' && $edm_set['keys'][0]['value']==$station_code) {
			// Compare target station code
			if ($edm_set['keys'][1]['value']==$target_code) {
				// Add values to this set
				$edm_set['values'][$meas_time]['line_length']=$line_length;
				
				// Compare min and max
				if (strcmp($meas_time, $edm_set['min']) < 0) {
					$edm_set['min']=$meas_time;
				}
				if (strcmp($meas_time, $edm_set['max']) > 0) {
					$edm_set['max']=$meas_time;
				}
				
				// No need to add a new set
				$new_set=FALSE;
				
				break;
			}
		}
	}
}

// If must add a new set
if ($new_set) {
	// Create set
	$cnt_set=count($data_list['dd_edm']['sets']);
	$data_list['dd_edm']['sets'][$cnt_set]=array();
	
	// Keys
	$data_list['dd_edm']['sets'][$cnt_set]['keys']=array();
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]=array();
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][1]=array();
	// If instrument code is empty
	if (empty($instrument_code)) {
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['name']="station code";
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['value']=$station_code;
	}
	else {
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['name']="instrument code";
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['value']=$instrument_code;
	}
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][1]['name']="target station code";
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][1]['value']=$target_code;
	
	// Values
	$data_list['dd_edm']['sets'][$cnt_set]['values']=array();
	$data_list['dd_edm']['sets'][$cnt_set]['values'][$meas_time]['line_length']=$line_length;
	
	// Min and max
	$data_list['dd_edm']['sets'][$cnt_set]['min']=$meas_time;
	$data_list['dd_edm']['sets'][$cnt_set]['max']=$meas_time;
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_stations2);
array_shift($gen_pubdates);

?>