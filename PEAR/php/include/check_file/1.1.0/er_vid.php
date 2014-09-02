<?php

// vvv Set variables
$er_vid_key="ed_vid";
$er_vid_name="Video";

// ^^^ Get code
$code=xml_get_att($er_vid_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($er_vid_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($er_vid_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$er_vid_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($er_vid_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($er_vid_obj);

// ^^^ Get eruption
v1_get_eruption($er_vid_obj);

// vvv Set eruption
if (!v1_set_eruption($er_vid_obj, $er_vid_name, $code, NULL, NULL, NULL, NULL, $er_vid_obj['results']['vd_id'], $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get phase
v1_get_phase($er_vid_obj);

// vvv Set phase
if (!v1_set_phase($er_vid_obj, $er_vid_name, $code, NULL, $er_vid_obj['results']['ed_id'], $er_vid_obj['results']['vd_id'], $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($er_vid_obj);

// vvv Set publish date
$start_time=xml_get_ele($er_vid_obj, "STARTTIME");
$data_time=array($start_time);
v1_set_pubdate($data_time, $current_time, $er_vid_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$er_vid_obj['results']['owners'];
if (!v1_check_dupli_simple($er_vid_name, $er_vid_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($er_vid_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($er_vid_name, $er_vid_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$er_vid_key])) {
	$data_list[$er_vid_key]=array();
	$data_list[$er_vid_key]['name']="Eruption video";
	$data_list[$er_vid_key]['number']=0;
	$data_list[$er_vid_key]['sets']=array();
}
$data_list[$er_vid_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_eruptions);
array_shift($gen_phases);
array_shift($gen_pubdates);

?>