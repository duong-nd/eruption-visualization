<?php

// vvv Set variables
$da_dd_ang_ang_key="dd_ang";
$da_dd_ang_ang_name="Angle";

// ^^^ Get code
$code=xml_get_att($da_dd_ang_ang_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_dd_ang_ang_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_dd_ang_ang_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_ang_ang_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_dd_ang_ang_time=xml_get_ele($da_dd_ang_ang_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_dd_ang_ang_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_dd_ang_ang_obj, $da_dd_ang_ang_name, $code, $da_dd_ang_ang_time, $da_dd_ang_ang_time, "deformation station", "ds", "ds_id", "ds", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get target station
v1_get_ms($da_dd_ang_ang_obj, "TARGETSTATION1", $gen_stations2);

// vvv Set station
if (!v1_set_ms_data($da_dd_ang_ang_obj, $da_dd_ang_ang_name, $code, $da_dd_ang_ang_time, $da_dd_ang_ang_time, "target station 1", "ds", "ds_id1", "ds", NULL, NULL, NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get target station
v1_get_ms($da_dd_ang_ang_obj, "TARGETSTATION2", $gen_stations3);

// vvv Set station
if (!v1_set_ms_data($da_dd_ang_ang_obj, $da_dd_ang_ang_name, $code, $da_dd_ang_ang_time, $da_dd_ang_ang_time, "target station 2", "ds", "ds_id2", "ds", NULL, NULL, NULL, NULL, $gen_stations3, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_dd_ang_ang_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_dd_ang_ang_obj, $da_dd_ang_ang_name, $code, $da_dd_ang_ang_time, $da_dd_ang_ang_time, "deformation instrument", "di_gen", "di_gen_id", "di_gen", "deformation station", "ds", "ds_id", $da_dd_ang_ang_obj['results']['ds_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_dd_ang_ang_obj['results']['ds_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_ang_ang_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_dd_ang_ang_obj);

// vvv Set publish date
$data_time=array($da_dd_ang_ang_time);
v1_set_pubdate($data_time, $current_time, $da_dd_ang_ang_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_dd_ang_ang_obj['results']['owners'];
if (!v1_check_dupli_simple($da_dd_ang_ang_name, $da_dd_ang_ang_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_dd_ang_ang_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_dd_ang_ang_name, $da_dd_ang_ang_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_dd_ang_ang_key])) {
	$data_list[$da_dd_ang_ang_key]=array();
	$data_list[$da_dd_ang_ang_key]['name']="Angles";
	$data_list[$da_dd_ang_ang_key]['number']=0;
	$data_list[$da_dd_ang_ang_key]['sets']=array();
}
$data_list[$da_dd_ang_ang_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_stations2);
array_shift($gen_stations3);
array_shift($gen_pubdates);

?>