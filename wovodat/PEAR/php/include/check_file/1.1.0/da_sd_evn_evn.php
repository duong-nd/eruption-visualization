<?php

// vvv Set variables
$da_sd_evn_evn_key="sd_evn";
$da_sd_evn_evn_name="NetworkEvent";

// ^^^ Get code
$code=xml_get_att($da_sd_evn_evn_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_evn_evn_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_sd_evn_evn_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_evn_evn_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_sd_evn_evn_time=xml_get_ele($da_sd_evn_evn_obj, "ORIGINTIME");
$da_sd_evn_evn_time_unc=xml_get_ele($da_sd_evn_evn_obj, "ORIGINTIMEUNC");

// ^^^ Get network
v1_get_ms($da_sd_evn_evn_obj, "NETWORK", $gen_networks);

// vvv Set network
if (!v1_set_ms_data($da_sd_evn_evn_obj, $da_sd_evn_evn_name, $code, $da_sd_evn_evn_time, $da_sd_evn_evn_time, "seismic network", "sn", "sn_id", "sn", NULL, NULL, NULL, NULL, $gen_networks, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: network
if (empty($da_sd_evn_evn_obj['results']['sn_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_evn_evn_name." code=\"".$code."\"&gt; is missing information: please specify network";
	$l_errors++;
	return FALSE;
}

// vvv Set microseconds
v1_set_msec("sd_evn_time", "sd_evn_timecsec", $da_sd_evn_evn_time, $da_sd_evn_evn_obj);
v1_set_msec("sd_evn_time_unc", "sd_evn_timecsec_unc", $da_sd_evn_evn_time_unc, $da_sd_evn_evn_obj);

// ^^^ Get publish date
v1_get_pubdate($da_sd_evn_evn_obj);

// vvv Set publish date
$data_time=array($da_sd_evn_evn_obj['results']['sd_evn_time']);
v1_set_pubdate($data_time, $current_time, $da_sd_evn_evn_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_sd_evn_evn_obj['results']['owners'];
$sn_id=$da_sd_evn_evn_obj['results']['sn_id'];
$sd_evn_tech=xml_get_ele($da_sd_evn_evn_obj, "LOCATECHNIQUE");
if (!v1_check_dupli_sd_evn($da_sd_evn_evn_name, $da_sd_evn_evn_key, $code, $sn_id, $sd_evn_tech,  $final_owners, $dupli_error)) {
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
$data['sn_id']=$sn_id;
$data['sd_evn_tech']=$sd_evn_tech;
v1_record_obj($da_sd_evn_evn_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_sd_evn($da_sd_evn_evn_name, $code, $sn_id, $sd_evn_tech, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_evn_evn_key])) {
	$data_list[$da_sd_evn_evn_key]=array();
	$data_list[$da_sd_evn_evn_key]['name']="Network seismic events";
	$data_list[$da_sd_evn_evn_key]['number']=0;
	$data_list[$da_sd_evn_evn_key]['sets']=array();
}
$data_list[$da_sd_evn_evn_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>