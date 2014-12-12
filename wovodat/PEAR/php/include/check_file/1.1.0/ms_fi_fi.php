<?php

// vvv Set variables
$ms_fi_fi_key="fi";
$ms_fi_fi_name="FieldsInstrument";

// ^^^ Get code
$code=xml_get_att($ms_fi_fi_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_fi_fi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_fi_fi_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_fi_fi_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_fi_fi_stime=xml_get_ele($ms_fi_fi_obj, "STARTTIME");
$ms_fi_fi_etime=xml_get_ele($ms_fi_fi_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_fi_fi_stime) && !empty($ms_fi_fi_etime)) {
	if (strcmp($ms_fi_fi_stime, $ms_fi_fi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fi_fi_name." code=\"".$code."\"&gt;, start time (".$ms_fi_fi_stime.") should be earlier than end time (".$ms_fi_fi_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get station
v1_get_ms($ms_fi_fi_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms($ms_fi_fi_obj, $ms_fi_fi_name, $code, $ms_fi_fi_stime, $ms_fi_fi_etime, "fields station", "fs", "fs", NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($ms_fi_fi_obj['results']['fs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_fi_fi_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_fi_fi_obj);

// vvv Set publish date
$data_time=array($ms_fi_fi_stime, $ms_fi_fi_etime);
v1_set_pubdate($data_time, $current_time, $ms_fi_fi_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_fi_fi_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_fi_fi_name, $ms_fi_fi_key, $code, $ms_fi_fi_stime, $ms_fi_fi_etime, $final_owners, $dupli_error)) {
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
$data['fs_id']=$ms_fi_fi_obj['results']['fs_id'];
$data['owners']=$final_owners;
$data['stime']=$ms_fi_fi_stime;
$data['etime']=$ms_fi_fi_etime;
v1_record_obj($ms_fi_fi_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_fi_fi_name, $ms_fi_fi_key, $code, $ms_fi_fi_stime, $ms_fi_fi_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_fi_fi_key])) {
	$data_list[$ms_fi_fi_key]=array();
	$data_list[$ms_fi_fi_key]['name']="Fields instrument";
	$data_list[$ms_fi_fi_key]['number']=0;
	$data_list[$ms_fi_fi_key]['sets']=array();
}
$data_list[$ms_fi_fi_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>