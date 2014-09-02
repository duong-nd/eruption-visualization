<?php

// vvv Set variables
$da_gd_plu_plu_key="gd_plu";
$da_gd_plu_plu_name="Plume";

// ^^^ Get code
$code=xml_get_att($da_gd_plu_plu_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get volcano
if (!v1_get_vd_id($da_gd_plu_plu_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($da_gd_plu_plu_obj);

// ^^^ Get owners
if (!v1_get_owners($da_gd_plu_plu_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_gd_plu_plu_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_gd_plu_plu_time=xml_get_ele($da_gd_plu_plu_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_gd_plu_plu_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_gd_plu_plu_obj, $da_gd_plu_plu_name, $code, $da_gd_plu_plu_time, $da_gd_plu_plu_time, "gas station", "gs", "gs_id", "gs", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Nang added from 53-199  on 31-May-2012

// ^^^ Get airplane
v1_get_ms($da_gd_plu_plu_obj, "AIRPLANE", $gen_stations2);


 // vvv Set airplane
if (!v1_set_ms_data($da_gd_plu_plu_obj, $da_gd_plu_plu_name, $code, $da_gd_plu_plu_time, $da_gd_plu_plu_time, "airplane", "cs", "cs_id_air", "cs", NULL, NULL, NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get satellite      
v1_get_ms($da_gd_plu_plu_obj, "SATELLITE", $gen_stations3);

// vvv Set satellite
if (!v1_set_ms_data($da_gd_plu_plu_obj, $da_gd_plu_plu_name, $code, $da_gd_plu_plu_time, $da_gd_plu_plu_time, "satellite", "cs", "cs_id_sat", "cs", NULL, NULL, NULL, NULL, $gen_stations3, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check station OR airplane OR satellite
if (!empty($da_gd_plu_plu_obj['results']['cs_id_air']) && !empty($da_gd_plu_plu_obj['results']['cs_id_sat']) && !empty($da_gd_plu_plu_obj['results']['gs_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or airplane or satellite";
	$l_errors++;
	return FALSE;
}

// ### Check station OR airplane
if (!empty($da_gd_plu_plu_obj['results']['cs_id_air']) && !empty($da_gd_plu_plu_obj['results']['gs_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or airplane";
	$l_errors++;
	return FALSE;
}

// ### Check station OR satellite
if (!empty($da_gd_plu_plu_obj['results']['cs_id_sat']) && !empty($da_gd_plu_plu_obj['results']['gs_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or satellite";
	$l_errors++;
	return FALSE;
}

// ### Check airplane OR satellite
if (!empty($da_gd_plu_plu_obj['results']['cs_id_air']) && !empty($da_gd_plu_plu_obj['results']['cs_id_sat'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt; has inconsistent information: please specify only airplane or satellite";
	$l_errors++;
	return FALSE;
}

// vvv Set xs_id
if (!empty($da_gd_plu_plu_obj['results']['cs_id_air'])) {
	$da_gd_plu_plu_obj['results']['cs_id']=$da_gd_plu_plu_obj['results']['cs_id_air'];
	$xs_id=$da_gd_plu_plu_obj['results']['cs_id'];
	$xs_name="airplane";
	$xs_key="cs";
	$xs_target="cs_id";
}
elseif (!empty($da_gd_plu_plu_obj['results']['cs_id_sat'])) {
	$da_gd_plu_plu_obj['results']['cs_id']=$da_gd_plu_plu_obj['results']['cs_id_sat'];
	$xs_id=$da_gd_plu_plu_obj['results']['cs_id'];
	$xs_name="satellite";
	$xs_key="cs";
	$xs_target="cs_id";
}
else {
	$xs_id=$da_gd_plu_plu_obj['results']['gs_id'];
	$xs_name="gas station";
	$xs_key="gs";
	$xs_target="gs_id";
}

// ^^^ Get instrument
v1_get_ms($da_gd_plu_plu_obj, "INSTRUMENT", $gen_instruments);



// vvv Set instrument
if (!v1_set_ms_data($da_gd_plu_plu_obj, $da_gd_plu_plu_name, $code, $da_gd_plu_plu_time, $da_gd_plu_plu_time, "gas instrument", "gi", "gi_id", "gi", $xs_name, $xs_key, $xs_target, $xs_id, $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}


// ### Check necessary information: station or airplane or satellite
if (empty($da_gd_plu_plu_obj['results']['gs_id']) && empty($da_gd_plu_plu_obj['results']['cs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt; is missing information: please specify station or airplane or satellite";
	$l_errors++;
	return FALSE;
}


// ### Check necessary information: station OR (strict) volcano
if (empty($da_gd_plu_plu_obj['results']['gs_id'])) {
	if (empty($da_gd_plu_plu_obj['results']['vd_id'])) {
		// Missing information
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1;
		$errors[$l_errors]['message']="&lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt; is missing information: please specify volcano";
		$l_errors++;
		return FALSE;
	}
}


// ### Check station and volcano
if (!empty($da_gd_plu_plu_obj['results']['gs_id'])){
	if (!v1_check_station_volcano("g", $da_gd_plu_plu_obj['results']['gs_id'], $code, $da_gd_plu_plu_obj['results']['vd_id'])) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$da_gd_plu_plu_name." code=\"".$code."\"&gt;, station and volcano do not match";
		$l_errors++;
		return FALSE;
	}
}

//^^^ end for adding/refactoring this block of new script on 31-May-2012


// ^^^ Get publish date
v1_get_pubdate($da_gd_plu_plu_obj);

// vvv Set publish date
$data_time=array($da_gd_plu_plu_time);
v1_set_pubdate($data_time, $current_time, $da_gd_plu_plu_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_gd_plu_plu_obj['results']['owners'];
if (!v1_check_dupli_simple($da_gd_plu_plu_name, $da_gd_plu_plu_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_gd_plu_plu_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_gd_plu_plu_name, $da_gd_plu_plu_key, $code, $final_owners);

// -- CHECK CHILDREN --

// Variables for display
$species_array=array();
$units=NULL;

// ### Check children
foreach ($da_gd_plu_plu_obj['value'] as &$da_gd_plu_plu_ele) {
	switch ($da_gd_plu_plu_ele['tag']) {
		case "PLUMESPECIES":
			$da_gd_plu_plu_spe_obj=&$da_gd_plu_plu_ele;
			include "da_gd_plu_plu_spe.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_gd_plu_plu_key])) {
	$data_list[$da_gd_plu_plu_key]=array();
	$data_list[$da_gd_plu_plu_key]['name']="Plume data";
	$data_list[$da_gd_plu_plu_key]['number']=0;
	$data_list[$da_gd_plu_plu_key]['sets']=array();
}
$data_list[$da_gd_plu_plu_key]['number']++;

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Get values to display
$height=xml_get_ele($da_gd_plu_plu_obj, "HEIGHT");
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
if (!datetime_round_day($da_gd_plu_plu_time, $meas_time, $local_error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1380;
	$_SESSION['errors'][0]['message']="Error when rounding data to day: ".$da_gd_plu_plu_time."[check_file/1.1.0/da_gd_plu_plu.php]";
	$_SESSION['l_errors']=1;
	
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// According to instrument or station code, different set of data
$new_set=TRUE;
foreach ($data_list['gd_plu']['sets'] as &$gd_plu_set) {
	// Case 1: instrument code was declared
	if (!empty($instrument_code)) {
		// Compare with set's key
		if ($gd_plu_set['keys'][0]['name']=='instrument code' && $gd_plu_set['keys'][0]['value']==$instrument_code) {
			// Add values to this set
			$gd_plu_set['values'][$meas_time]['height']=$height;
			
			// Species
			foreach ($species_array as $species => $emission_rate) {
				$gd_plu_set['values'][$meas_time][$species]=$emission_rate;
			}
			
			// Units
			if (empty($gd_plu_set['units']) && !empty($units)) {
				$gd_plu_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_plu_set['min']) < 0) {
				$gd_plu_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_plu_set['max']) > 0) {
				$gd_plu_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 2: station code was declared
	elseif (!empty($station_code)) {
		// Compare with set's key
		if ($gd_plu_set['keys'][0]['name']=='station code' && $gd_plu_set['keys'][0]['value']==$station_code) {
			// Add values to this set
			$gd_plu_set['values'][$meas_time]['height']=$height;
			
			// Species
			foreach ($species_array as $species => $emission_rate) {
				$gd_plu_set['values'][$meas_time][$species]=$emission_rate;
			}
			
			// Units
			if (empty($gd_plu_set['units']) && !empty($units)) {
				$gd_plu_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_plu_set['min']) < 0) {
				$gd_plu_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_plu_set['max']) > 0) {
				$gd_plu_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 3: none was declared
	else {
		// If set has no key
		if ($gd_plu_set['keys'][0]['name']==NULL && $gd_plu_set['keys'][0]['value']==NULL) {
			// Add values to this set
			$gd_plu_set['values'][$meas_time]['height']=$height;
			
			// Species
			foreach ($species_array as $species => $emission_rate) {
				$gd_plu_set['values'][$meas_time][$species]=$emission_rate;
			}
			
			// Units
			if (empty($gd_plu_set['units']) && !empty($units)) {
				$gd_plu_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_plu_set['min']) < 0) {
				$gd_plu_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_plu_set['max']) > 0) {
				$gd_plu_set['max']=$meas_time;
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
	$cnt_set=count($data_list['gd_plu']['sets']);
	$data_list['gd_plu']['sets'][$cnt_set]=array();
	
	// Keys
	$data_list['gd_plu']['sets'][$cnt_set]['keys']=array();
	$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]=array();
	// Case 1: instrument code given
	if (!empty($instrument_code)) {
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['name']="instrument code";
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['value']=$instrument_code;
	}
	// Case 2: station code given
	elseif (!empty($station_code)) {
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['name']="station code";
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['value']=$station_code;
	}
	// Case 3: none given
	else {
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['name']=NULL;
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['value']=NULL;
	}
	
	// Values
	$data_list['gd_plu']['sets'][$cnt_set]['values']=array();
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['height']=$height;
	
	// Species
	foreach ($species_array as $species => $emission_rate) {
		$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time][$species]=$emission_rate;
	}
	
	// Units
	$data_list['gd_plu']['sets'][$cnt_set]['units']=$units;
	
	// Min and max
	$data_list['gd_plu']['sets'][$cnt_set]['min']=$meas_time;
	$data_list['gd_plu']['sets'][$cnt_set]['max']=$meas_time;
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_vd_ids);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_stations2);  
array_shift($gen_stations3);  
array_shift($gen_pubdates);

?>