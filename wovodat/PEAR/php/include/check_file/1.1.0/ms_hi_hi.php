<?php

// vvv Set variables
$ms_hi_hi_key="hi";
$ms_hi_hi_name="HydrologicInstrument";

// ^^^ Get code
$code=xml_get_att($ms_hi_hi_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_hi_hi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_hi_hi_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_hi_hi_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_hi_hi_stime=xml_get_ele($ms_hi_hi_obj, "STARTTIME");
$ms_hi_hi_etime=xml_get_ele($ms_hi_hi_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_hi_hi_stime) && !empty($ms_hi_hi_etime)) {
	if (strcmp($ms_hi_hi_stime, $ms_hi_hi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hi_hi_name." code=\"".$code."\"&gt;, start time (".$ms_hi_hi_stime.") should be earlier than end time (".$ms_hi_hi_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get station
v1_get_ms($ms_hi_hi_obj, "STATION", $gen_stations);

// vvv Set network
if (!v1_set_ms($ms_hi_hi_obj, $ms_hi_hi_name, $code, $ms_hi_hi_stime, $ms_hi_hi_etime, "hydrologic station", "hs", "hs", NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($ms_hi_hi_obj['results']['hs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_hi_hi_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_hi_hi_obj);

// vvv Set publish date
$data_time=array($ms_hi_hi_stime, $ms_hi_hi_etime);
v1_set_pubdate($data_time, $current_time, $ms_hi_hi_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_hi_hi_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_hi_hi_name, $ms_hi_hi_key, $code, $ms_hi_hi_stime, $ms_hi_hi_etime, $final_owners, $dupli_error)) {
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
$data['hs_id']=$ms_hi_hi_obj['results']['hs_id'];
$data['owners']=$final_owners;
$data['stime']=$ms_hi_hi_stime;
$data['etime']=$ms_hi_hi_etime;
v1_record_obj($ms_hi_hi_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_hi_hi_name, $ms_hi_hi_key, $code, $ms_hi_hi_stime, $ms_hi_hi_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_hi_hi_key])) {
	$data_list[$ms_hi_hi_key]=array();
	$data_list[$ms_hi_hi_key]['name']="Hydrologic instrument";
	$data_list[$ms_hi_hi_key]['number']=0;
	$data_list[$ms_hi_hi_key]['sets']=array();
}
$data_list[$ms_hi_hi_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>