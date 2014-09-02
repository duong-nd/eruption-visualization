<?php

// vvv Set variables
$da_fd_ele_ele_key="fd_ele";
$da_fd_ele_ele_name="Electric";

// ^^^ Get code
$code=xml_get_att($da_fd_ele_ele_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_fd_ele_ele_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_fd_ele_ele_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_fd_ele_ele_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_fd_ele_ele_time=xml_get_ele($da_fd_ele_ele_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_fd_ele_ele_obj, "REFSTATION1", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_fd_ele_ele_obj, $da_fd_ele_ele_name, $code, $da_fd_ele_ele_time, $da_fd_ele_ele_time, "reference station 1", "fs", "fs_id1", "fs", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get reference station
v1_get_ms($da_fd_ele_ele_obj, "REFSTATION2", $gen_stations2);

// vvv Set station
if (!v1_set_ms_data($da_fd_ele_ele_obj, $da_fd_ele_ele_name, $code, $da_fd_ele_ele_time, $da_fd_ele_ele_time, "reference station 2", "fs", "fs_id2", "fs", NULL, NULL, NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_fd_ele_ele_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_fd_ele_ele_obj, $da_fd_ele_ele_name, $code, $da_fd_ele_ele_time, $da_fd_ele_ele_time, "fields instrument", "fi", "fi_id", "fi", NULL, NULL, NULL, NULL, $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: reference station 1
if (empty($da_fd_ele_ele_obj['results']['fs_id1'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_fd_ele_ele_name." code=\"".$code."\"&gt; is missing information: please specify reference station 1";
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: reference station 2
if (empty($da_fd_ele_ele_obj['results']['fs_id2'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_fd_ele_ele_name." code=\"".$code."\"&gt; is missing information: please specify reference station 2";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_fd_ele_ele_obj);

// vvv Set publish date
$data_time=array($da_fd_ele_ele_time);
v1_set_pubdate($data_time, $current_time, $da_fd_ele_ele_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_fd_ele_ele_obj['results']['owners'];
if (!v1_check_dupli_simple($da_fd_ele_ele_name, $da_fd_ele_ele_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_fd_ele_ele_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_fd_ele_ele_name, $da_fd_ele_ele_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_fd_ele_ele_key])) {
	$data_list[$da_fd_ele_ele_key]=array();
	$data_list[$da_fd_ele_ele_key]['name']="Electric fields data";
	$data_list[$da_fd_ele_ele_key]['number']=0;
	$data_list[$da_fd_ele_ele_key]['sets']=array();
}
$data_list[$da_fd_ele_ele_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_stations2);
array_shift($gen_pubdates);

?>