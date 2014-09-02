<?php

// vvv Set variables
$da_sd_int_int_key="sd_int";
$da_sd_int_int_name="Intensity";

// ^^^ Get code
$code=xml_get_att($da_sd_int_int_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_int_int_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_sd_int_int_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_int_int_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($da_sd_int_int_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($da_sd_int_int_obj);

// ^^^ Get time
$da_sd_int_int_time=xml_get_ele($da_sd_int_int_obj, "TIME");

// ^^^ Get network event
v1_get_data($da_sd_int_int_obj, "NETWORKEVENT", $gen_data);

// vvv Set network event
if (!v1_set_data($da_sd_int_int_obj, $da_sd_int_int_name, "sd_evn", $gen_data, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get single station event
v1_get_data($da_sd_int_int_obj, "SINGLESTATIONEVENT", $gen_data2);

// vvv Set network event
if (!v1_set_data($da_sd_int_int_obj, $da_sd_int_int_name, "sd_evs", $gen_data2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: volcano or network event or single station event
if (empty($da_sd_int_int_obj['results']['vd_id']) && empty($da_sd_int_int_obj['results']['sd_evn_id']) && empty($da_sd_int_int_obj['results']['sd_evs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_int_int_name." code=\"".$code."\"&gt; is missing information: please specify volcano or network event or single station event";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_sd_int_int_obj);

// vvv Set publish date
$data_time=array($da_sd_int_int_time);
v1_set_pubdate($data_time, $current_time, $da_sd_int_int_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_sd_int_int_obj['results']['owners'];
if (!v1_check_dupli_simple($da_sd_int_int_name, $da_sd_int_int_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_sd_int_int_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_sd_int_int_name, $da_sd_int_int_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_int_int_key])) {
	$data_list[$da_sd_int_int_key]=array();
	$data_list[$da_sd_int_int_key]['name']="Intensity data";
	$data_list[$da_sd_int_int_key]['number']=0;
	$data_list[$da_sd_int_int_key]['sets']=array();
}
$data_list[$da_sd_int_int_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_vd_ids);
array_shift($gen_data);
array_shift($gen_data2);
array_shift($gen_pubdates);

?>