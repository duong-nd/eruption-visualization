<?php

// vvv Set variables
$da_sd_evs_evs_key="sd_evs";
$da_sd_evs_evs_name="SingleStationEvent";

// ^^^ Get code
$code=xml_get_att($da_sd_evs_evs_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_evs_evs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_sd_evs_evs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_evs_evs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_sd_evs_evs_time=xml_get_ele($da_sd_evs_evs_obj, "STARTTIME");
$da_sd_evs_evs_time_unc=xml_get_ele($da_sd_evs_evs_obj, "STARTTIMEUNC");

// ^^^ Get station
v1_get_ms($da_sd_evs_evs_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_sd_evs_evs_obj, $da_sd_evs_evs_name, $code, $da_sd_evs_evs_time, $da_sd_evs_evs_time, "seismic station", "ss", "ss_id", "ss", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_sd_evs_evs_obj['results']['ss_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_evs_evs_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// vvv Set microseconds
v1_set_msec("sd_evs_time", "sd_evs_time_ms", $da_sd_evs_evs_time, $da_sd_evs_evs_obj);
v1_set_msec("sd_evs_time_unc", "sd_evs_time_unc_ms", $da_sd_evs_evs_time_unc, $da_sd_evs_evs_obj);

// ^^^ Get publish date
v1_get_pubdate($da_sd_evs_evs_obj);

// vvv Set publish date
$data_time=array($da_sd_evs_evs_obj['results']['sd_evs_time']);
v1_set_pubdate($data_time, $current_time, $da_sd_evs_evs_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_sd_evs_evs_obj['results']['owners'];
if (!v1_check_dupli_simple($da_sd_evs_evs_name, $da_sd_evs_evs_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_sd_evs_evs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_sd_evs_evs_name, $da_sd_evs_evs_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_evs_evs_key])) {
	$data_list[$da_sd_evs_evs_key]=array();
	$data_list[$da_sd_evs_evs_key]['name']="Single station seismic events";
	$data_list[$da_sd_evs_evs_key]['number']=0;
	$data_list[$da_sd_evs_evs_key]['sets']=array();
}
$data_list[$da_sd_evs_evs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>