<?php

// vvv Set variables
$da_sd_trm_trm_key="sd_trm";
$da_sd_trm_trm_name="Tremor";

// ^^^ Get code
$code=xml_get_att($da_sd_trm_trm_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_trm_trm_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_sd_trm_trm_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_trm_trm_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_sd_trm_trm_stime=xml_get_ele($da_sd_trm_trm_obj, "STARTTIME");
$da_sd_trm_trm_etime=xml_get_ele($da_sd_trm_trm_obj, "ENDTIME");

// ### Check time order
if (!empty($da_sd_trm_trm_stime) && !empty($da_sd_trm_trm_etime)) {
	if (strcmp($da_sd_trm_trm_stime, $da_sd_trm_trm_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$da_sd_trm_trm_name." code=\"".$code."\"&gt;, start time (".$da_sd_trm_trm_stime.") should be earlier than end time (".$da_sd_trm_trm_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get network
v1_get_ms($da_sd_trm_trm_obj, "NETWORK", $gen_networks);

// vvv Set network
if (!v1_set_ms_data($da_sd_trm_trm_obj, $da_sd_trm_trm_name, $code, $da_sd_trm_trm_stime, $da_sd_trm_trm_stime, "seismic network", "sn", "sn_id", "sn", NULL, NULL, NULL, NULL, $gen_networks, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get station
v1_get_ms($da_sd_trm_trm_obj, "STATION", $gen_stations);

// vvv Set network
if (!v1_set_ms_data($da_sd_trm_trm_obj, $da_sd_trm_trm_name, $code, $da_sd_trm_trm_stime, $da_sd_trm_trm_stime, "seismic station", "ss", "ss_id", "ss", "seismic network", "sn", "sn_id", $da_sd_trm_trm_obj['results']['sn_id'], $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: network or station
if (empty($da_sd_trm_trm_obj['results']['sn_id']) && empty($da_sd_trm_trm_obj['results']['ss_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_trm_trm_name." code=\"".$code."\"&gt; is missing information: please specify network or station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_sd_trm_trm_obj);

// vvv Set publish date
$data_time=array($da_sd_trm_trm_stime, $da_sd_trm_trm_etime);
v1_set_pubdate($data_time, $current_time, $da_sd_trm_trm_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_sd_trm_trm_obj['results']['owners'];
if (!v1_check_dupli_simple($da_sd_trm_trm_name, $da_sd_trm_trm_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_sd_trm_trm_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_sd_trm_trm_name, $da_sd_trm_trm_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_trm_trm_key])) {
	$data_list[$da_sd_trm_trm_key]=array();
	$data_list[$da_sd_trm_trm_key]['name']="Tremors";
	$data_list[$da_sd_trm_trm_key]['number']=0;
	$data_list[$da_sd_trm_trm_key]['sets']=array();
}
$data_list[$da_sd_trm_trm_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>