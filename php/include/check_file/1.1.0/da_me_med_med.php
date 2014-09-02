<?php

// vvv Set variables       
$da_me_med_med_key="med";
$da_me_med_med_name="MeteoData";

// ^^^ Get code
$code=xml_get_att($da_me_med_med_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_me_med_med_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_me_med_med_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_me_med_med_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_me_med_med_time=xml_get_ele($da_me_med_med_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_me_med_med_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_me_med_med_obj, $da_me_med_med_name, $code, $da_me_med_med_time, $da_me_med_med_time, "meteo station", "ms", "ms_id", "ms", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_me_med_med_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_me_med_med_obj, $da_me_med_med_name, $code, $da_me_med_med_time, $da_me_med_med_time, "meteo instrument", "mi", "mi_id", "mi", "meteo station", "ms", "ms_id", $da_me_med_med_obj['results']['ms_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_me_med_med_obj['results']['ms_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_me_med_med_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_me_med_med_obj);

// vvv Set publish date
$data_time=array($da_me_med_med_time);
v1_set_pubdate($data_time, $current_time, $da_me_med_med_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_me_med_med_obj['results']['owners'];
if (!v1_check_dupli_simple($da_me_med_med_name, $da_me_med_med_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_me_med_med_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_me_med_med_name, $da_me_med_med_key, $code, $final_owners);


// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_me_med_med_key])) {
	$data_list[$da_me_med_med_key]=array();
	$data_list[$da_me_med_med_key]['name']="Meteo Data";
	$data_list[$da_me_med_med_key]['number']=0;
	$data_list[$da_me_med_med_key]['sets']=array();
}
$data_list[$da_me_med_med_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>