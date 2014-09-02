<?php

// vvv Set variables
$da_gd_smp_smp_key="gd";
$da_gd_smp_smp_name="GasSample";

// ^^^ Get code
$code=xml_get_att($da_gd_smp_smp_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_gd_smp_smp_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_gd_smp_smp_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_smp_smp_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_gd_smp_smp_time=xml_get_ele($da_gd_smp_smp_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_gd_smp_smp_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_gd_smp_smp_obj, $da_gd_smp_smp_name, $code, $da_gd_smp_smp_time, $da_gd_smp_smp_time, "gas station", "gs", "gs_id", "gs", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_gd_smp_smp_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_gd_smp_smp_obj, $da_gd_smp_smp_name, $code, $da_gd_smp_smp_time, $da_gd_smp_smp_time, "gas instrument", "gi", "gi_id", "gi", "gas station", "gs", "gs_id", $da_gd_smp_smp_obj['results']['gs_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_gd_smp_smp_obj['results']['gs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_smp_smp_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_gd_smp_smp_obj);

// vvv Set publish date
$data_time=array($da_gd_smp_smp_time);
v1_set_pubdate($data_time, $current_time, $da_gd_smp_smp_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_gd_smp_smp_obj['results']['owners'];
if (!v1_check_dupli_simple($da_gd_smp_smp_name, $da_gd_smp_smp_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_gd_smp_smp_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_gd_smp_smp_name, $da_gd_smp_smp_key, $code, $final_owners);

// -- CHECK CHILDREN --

// Values to display
$units=NULL;
$species_array=array();

// ### Check children
foreach ($da_gd_smp_smp_obj['value'] as &$da_gd_smp_smp_ele) {
	switch ($da_gd_smp_smp_ele['tag']) {
		case "GASSPECIES":
			$da_gd_smp_smp_spe_obj=&$da_gd_smp_smp_ele;
			include "da_gd_smp_smp_spe.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_gd_smp_smp_key])) {
	$data_list[$da_gd_smp_smp_key]=array();
	$data_list[$da_gd_smp_smp_key]['name']="Gas samples";
	$data_list[$da_gd_smp_smp_key]['number']=0;
	$data_list[$da_gd_smp_smp_key]['sets']=array();
}
$data_list[$da_gd_smp_smp_key]['number']++;

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Get values to display
$temperature=xml_get_ele($da_gd_smp_smp_obj, "TEMPERATURE");
$atmos_press=xml_get_ele($da_gd_smp_smp_obj, "ATMOSPRESS");
$emission_rate=xml_get_ele($da_gd_smp_smp_obj, "EMISSIONRATE");
// Station code
$station_code=NULL;
foreach ($gen_stations as $gen_code) {
	if (empty($gen_code)) {
		continue;
	}
	$station_code=$gen_code;
	break;
}
// Instrument code
$instrument_code=NULL;
foreach ($gen_instruments as $gen_code) {
	if (empty($gen_code)) {
		continue;
	}
	$instrument_code=$gen_code;
	break;
}

// Measurement time	(round to day)
if (!datetime_round_day($da_gd_smp_smp_time, $meas_time, $local_error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1380;
	$_SESSION['errors'][0]['message']="Error when rounding data to day: ".$da_gd_smp_smp_time."[check_file/1.1.0/da_gd_smp_smp.php]";
	$_SESSION['l_errors']=1;
	
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// According to instrument or station code, different set of data
$new_set=TRUE;
foreach ($data_list['gd']['sets'] as &$gd_set) {
	// Case 1: instrument code was declared
	if (!empty($instrument_code)) {
		// Compare with set's key
		if ($gd_set['keys'][0]['name']=='instrument code' && $gd_set['keys'][0]['value']==$instrument_code) {
			// Add values to this set
			$gd_set['values'][$meas_time]['temperature']=$temperature;
			$gd_set['values'][$meas_time]['atmos_press']=$atmos_press;
			$gd_set['values'][$meas_time]['emission_rate']=$emission_rate;
			
			// Species
			foreach ($species_array as $species => $concentration) {
				$gd_set['values'][$meas_time][$species]=$concentration;
			}
			
			// Units
			if (empty($gd_set['units']) && !empty($units)) {
				$gd_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_set['min']) < 0) {
				$gd_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_set['max']) > 0) {
				$gd_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 2: station code was declared
	elseif (!empty($station_code)) {
		// Compare with set's key
		if ($gd_set['keys'][0]['name']=='station code' && $gd_set['keys'][0]['value']==$station_code) {
			// Add values to this set
			$gd_set['values'][$meas_time]['temperature']=$temperature;
			$gd_set['values'][$meas_time]['atmos_press']=$atmos_press;
			$gd_set['values'][$meas_time]['emission_rate']=$emission_rate;
			
			// Species
			foreach ($species_array as $species => $concentration) {
				$gd_set['values'][$meas_time][$species]=$concentration;
			}
			
			// Units
			if (empty($gd_set['units']) && !empty($units)) {
				$gd_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_set['min']) < 0) {
				$gd_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_set['max']) > 0) {
				$gd_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 3: none was declared
	else {
		// If set has no key
		if ($gd_set['keys'][0]['name']==NULL && $gd_set['keys'][0]['value']==NULL) {
			// Add values to this set
			$gd_set['values'][$meas_time]['temperature']=$temperature;
			$gd_set['values'][$meas_time]['atmos_press']=$atmos_press;
			$gd_set['values'][$meas_time]['emission_rate']=$emission_rate;
			
			// Species
			foreach ($species_array as $species => $concentration) {
				$gd_set['values'][$meas_time][$species]=$concentration;
			}
			
			// Units
			if (empty($gd_set['units']) && !empty($units)) {
				$gd_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_set['min']) < 0) {
				$gd_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_set['max']) > 0) {
				$gd_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
}

// If must add a new set
if ($new_set) {
	// Create set
	$cnt_set=count($data_list['gd']['sets']);
	$data_list['gd']['sets'][$cnt_set]=array();
	
	// Keys
	$data_list['gd']['sets'][$cnt_set]['keys']=array();
	$data_list['gd']['sets'][$cnt_set]['keys'][0]=array();
	// Case 1: instrument code given
	if (!empty($instrument_code)) {
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['name']="instrument code";
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['value']=$instrument_code;
	}
	// Case 2: station code given
	elseif (!empty($station_code)) {
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['name']="station code";
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['value']=$station_code;
	}
	// Case 3: none given
	else {
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['name']=NULL;
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['value']=NULL;
	}
	
	// Values
	$data_list['gd']['sets'][$cnt_set]['values']=array();
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['temperature']=$temperature;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['atmos_press']=$atmos_press;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['emission_rate']=$emission_rate;
	
	// Species
	foreach ($species_array as $species => $concentration) {
		$data_list['gd']['sets'][$cnt_set]['values'][$meas_time][$species]=$concentration;
	}
	
	// Units
	$data_list['gd']['sets'][$cnt_set]['units']=$units;
	
	// Min and max
	$data_list['gd']['sets'][$cnt_set]['min']=$meas_time;
	$data_list['gd']['sets'][$cnt_set]['max']=$meas_time;
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>