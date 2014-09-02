<?php

// vvv Set variables
$da_dd_str_str_key="dd_str";
$da_dd_str_str_name="Strain";

// ^^^ Get code
$code=xml_get_att($da_dd_str_str_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_dd_str_str_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_dd_str_str_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_str_str_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_dd_str_str_time=xml_get_ele($da_dd_str_str_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_dd_str_str_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_dd_str_str_obj, $da_dd_str_str_name, $code, $da_dd_str_str_time, $da_dd_str_str_time, "deformation station", "ds", "ds_id", "ds", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_dd_str_str_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_dd_str_str_obj, $da_dd_str_str_name, $code, $da_dd_str_str_time, $da_dd_str_str_time, "strainmeter", "di_tlt", "di_tlt_id", "di_tlt", "deformation station", "ds", "ds_id", $da_dd_str_str_obj['results']['ds_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_dd_str_str_obj['results']['ds_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_str_str_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_dd_str_str_obj);

// vvv Set publish date
$data_time=array($da_dd_str_str_time);
v1_set_pubdate($data_time, $current_time, $da_dd_str_str_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_dd_str_str_obj['results']['owners'];
if (!v1_check_dupli_simple($da_dd_str_str_name, $da_dd_str_str_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_dd_str_str_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_dd_str_str_name, $da_dd_str_str_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_dd_str_str_key])) {
	$data_list[$da_dd_str_str_key]=array();
	$data_list[$da_dd_str_str_key]['name']="Strain data";
	$data_list[$da_dd_str_str_key]['number']=0;
	$data_list[$da_dd_str_str_key]['sets']=array();
}
$data_list[$da_dd_str_str_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>