<?php

// vvv Set variables
$er_phs_phs_vid_key="ed_vid";
$er_phs_phs_vid_name="Video";

// ^^^ Get code
$code=xml_get_att($er_phs_phs_vid_obj, "CODE");

// -- CHECK DATA --

// vvv Set volcano
$er_phs_phs_vid_obj['results']['vd_id']=$er_phs_phs_obj['results']['vd_id'];

// vvv Set eruption
$er_phs_phs_vid_obj['results']['ed_id']=$er_phs_phs_obj['results']['ed_id'];

// ^^^ Get owners
if (!v1_get_owners($er_phs_phs_vid_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($er_phs_phs_vid_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$er_phs_phs_vid_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($er_phs_phs_vid_obj);

// vvv Set publish date
$start_time=xml_get_ele($er_phs_phs_vid_obj, "STARTTIME");
$data_time=array($start_time);
v1_set_pubdate($data_time, $current_time, $er_phs_phs_vid_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$er_phs_phs_vid_obj['results']['owners'];
if (!v1_check_dupli_simple($er_phs_phs_vid_name, $er_phs_phs_vid_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($er_phs_phs_vid_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($er_phs_phs_vid_name, $er_phs_phs_vid_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$er_phs_phs_vid_key])) {
	$data_list[$er_phs_phs_vid_key]=array();
	$data_list[$er_phs_phs_vid_key]['name']="Eruption video";
	$data_list[$er_phs_phs_vid_key]['number']=0;
	$data_list[$er_phs_phs_vid_key]['sets']=array();
}
$data_list[$er_phs_phs_vid_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>