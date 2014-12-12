<?php

// vvv Set variables
$da_gd_sol_sol_key="gd_sol";
$da_gd_sol_sol_name="SoilEfflux";

// ^^^ Get code
$code=xml_get_att($da_gd_sol_sol_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_gd_sol_sol_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_gd_sol_sol_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_sol_sol_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_gd_sol_sol_time=xml_get_ele($da_gd_sol_sol_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_gd_sol_sol_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_gd_sol_sol_obj, $da_gd_sol_sol_name, $code, $da_gd_sol_sol_time, $da_gd_sol_sol_time, "gas station", "gs", "gs_id", "gs", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_gd_sol_sol_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_gd_sol_sol_obj, $da_gd_sol_sol_name, $code, $da_gd_sol_sol_time, $da_gd_sol_sol_time, "gas instrument", "gi", "gi_id", "gi", "gas station", "gs", "gs_id", $da_gd_sol_sol_obj['results']['gs_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_gd_sol_sol_obj['results']['gs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_gd_sol_sol_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_gd_sol_sol_obj);

// vvv Set publish date
$data_time=array($da_gd_sol_sol_time);
v1_set_pubdate($data_time, $current_time, $da_gd_sol_sol_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_gd_sol_sol_obj['results']['owners'];
if (!v1_check_dupli_simple($da_gd_sol_sol_name, $da_gd_sol_sol_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_gd_sol_sol_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_gd_sol_sol_name, $da_gd_sol_sol_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_gd_sol_sol_key])) {
	$data_list[$da_gd_sol_sol_key]=array();
	$data_list[$da_gd_sol_sol_key]['name']="Soil efflux data";
	$data_list[$da_gd_sol_sol_key]['number']=0;
	$data_list[$da_gd_sol_sol_key]['sets']=array();
}
$data_list[$da_gd_sol_sol_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>