<?php

// vvv Set variables
$da_fd_gra_gra_key="fd_gra";
$da_fd_gra_gra_name="Gravity";

// ^^^ Get code
$code=xml_get_att($da_fd_gra_gra_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_fd_gra_gra_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_fd_gra_gra_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_fd_gra_gra_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_fd_gra_gra_time=xml_get_ele($da_fd_gra_gra_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_fd_gra_gra_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_fd_gra_gra_obj, $da_fd_gra_gra_name, $code, $da_fd_gra_gra_time, $da_fd_gra_gra_time, "fields station", "fs", "fs_id", "fs", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get reference station
v1_get_ms($da_fd_gra_gra_obj, "REFSTATION", $gen_stations2);

// vvv Set station
if (!v1_set_ms_data($da_fd_gra_gra_obj, $da_fd_gra_gra_name, $code, $da_fd_gra_gra_time, $da_fd_gra_gra_time, "reference station", "fs", "fs_id_ref", "fs", NULL, NULL, NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_fd_gra_gra_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_fd_gra_gra_obj, $da_fd_gra_gra_name, $code, $da_fd_gra_gra_time, $da_fd_gra_gra_time, "fields instrument", "fi", "fi_id", "fi", "fields station", "fs", "fs_id", $da_fd_gra_gra_obj['results']['fs_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_fd_gra_gra_obj['results']['fs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_fd_gra_gra_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_fd_gra_gra_obj);

// vvv Set publish date
$data_time=array($da_fd_gra_gra_time);
v1_set_pubdate($data_time, $current_time, $da_fd_gra_gra_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_fd_gra_gra_obj['results']['owners'];
if (!v1_check_dupli_simple($da_fd_gra_gra_name, $da_fd_gra_gra_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_fd_gra_gra_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_fd_gra_gra_name, $da_fd_gra_gra_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_fd_gra_gra_key])) {
	$data_list[$da_fd_gra_gra_key]=array();
	$data_list[$da_fd_gra_gra_key]['name']="Gravity fields data";
	$data_list[$da_fd_gra_gra_key]['number']=0;
	$data_list[$da_fd_gra_gra_key]['sets']=array();
}
$data_list[$da_fd_gra_gra_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_stations2);
array_shift($gen_pubdates);

?>