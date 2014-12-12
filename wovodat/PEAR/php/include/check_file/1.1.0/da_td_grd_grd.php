<?php

// vvv Set variables
$da_td_grd_grd_key="td_grd";
$da_td_grd_grd_name="Ground-based";

// ^^^ Get code
$code=xml_get_att($da_td_grd_grd_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_td_grd_grd_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_td_grd_grd_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_grd_grd_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_td_grd_grd_time=xml_get_ele($da_td_grd_grd_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_td_grd_grd_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_td_grd_grd_obj, $da_td_grd_grd_name, $code, $da_td_grd_grd_time, $da_td_grd_grd_time, "thermal station", "ts", "ts_id", "ts", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_td_grd_grd_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_td_grd_grd_obj, $da_td_grd_grd_name, $code, $da_td_grd_grd_time, $da_td_grd_grd_time, "thermal instrument", "ti", "ti_id", "ti", "thermal station", "ts", "ts_id", $da_td_grd_grd_obj['results']['ts_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_td_grd_grd_obj['results']['ts_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_grd_grd_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_td_grd_grd_obj);

// vvv Set publish date
$data_time=array($da_td_grd_grd_time);
v1_set_pubdate($data_time, $current_time, $da_td_grd_grd_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_td_grd_grd_obj['results']['owners'];
if (!v1_check_dupli_simple($da_td_grd_grd_name, $da_td_grd_grd_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_td_grd_grd_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_td_grd_grd_name, "td", $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_td_grd_grd_key])) {
	$data_list[$da_td_grd_grd_key]=array();
	$data_list[$da_td_grd_grd_key]['name']="Ground-based thermal data";
	$data_list[$da_td_grd_grd_key]['number']=0;
	$data_list[$da_td_grd_grd_key]['sets']=array();
}
$data_list[$da_td_grd_grd_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>