<?php

// vvv Set variables
$ms_cs_gi_key="gi";
$ms_cs_gi_name="GasInstrument";

// ^^^ Get code
$code=xml_get_att($ms_cs_gi_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_cs_gi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_cs_gi_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_cs_gi_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_cs_gi_stime=xml_get_ele($ms_cs_gi_obj, "STARTTIME");
$ms_cs_gi_etime=xml_get_ele($ms_cs_gi_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_cs_gi_stime) && !empty($ms_cs_gi_etime)) {
	if (strcmp($ms_cs_gi_stime, $ms_cs_gi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_cs_gi_name." code=\"".$code."\"&gt;, start time (".$ms_cs_gi_stime.") should be earlier than end time (".$ms_cs_gi_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check inclusion (gas instrument included in airplane)
// Airplane start time < Gas instrument start time
if (!empty($start_time) && !empty($ms_cs_gi_stime)) {
	if (strcmp($start_time, $ms_cs_gi_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_cs_gi_name." code=\"".$code."\"&gt;, start time (".$ms_cs_gi_stime.") should be later than ".$ms_cs_name." start time (".$start_time.")";
		$l_errors++;
		return FALSE;
	}
}
// Airplane start time < Gas instrument end time
if (!empty($start_time) && !empty($ms_cs_gi_etime)) {
	if (strcmp($start_time, $ms_cs_gi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_cs_gi_name." code=\"".$code."\"&gt;, end time (".$ms_cs_gi_etime.") should be later than ".$ms_cs_name." start time (".$start_time.")";
		$l_errors++;
		return FALSE;
	}
}
// Gas instrument start time < Airplane end time
if (!empty($ms_cs_gi_stime) && !empty($end_time)) {
	if (strcmp($ms_cs_gi_stime, $end_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_cs_gi_name." code=\"".$code."\"&gt;, start time (".$ms_cs_gi_stime.") should be earlier than ".$ms_cs_name." end time (".$end_time.")";
		$l_errors++;
		return FALSE;
	}
}
// Gas instrument end time < Airplane end time
if (!empty($ms_cs_gi_etime) && !empty($end_time)) {
	if (strcmp($ms_cs_gi_etime, $end_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_cs_gi_name." code=\"".$code."\"&gt;, end time (".$ms_cs_gi_etime.") should be earlier than ".$ms_cs_name." end time (".$end_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_cs_gi_obj);

// vvv Set publish date
$data_time=array($ms_cs_gi_stime, $ms_cs_gi_etime);
v1_set_pubdate($data_time, $current_time, $ms_cs_gi_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_cs_gi_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_cs_gi_name, $ms_cs_gi_key, $code, $ms_cs_gi_stime, $ms_cs_gi_etime, $final_owners, $dupli_error)) {
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
$data['cs_id']=$ms_cs_id;
$data['owners']=$final_owners;
$data['stime']=$ms_cs_gi_stime;
$data['etime']=$ms_cs_gi_etime;
v1_record_obj($ms_cs_gi_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_cs_gi_name, $ms_cs_gi_key, $code, $ms_cs_gi_stime, $ms_cs_gi_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_cs_gi_key])) {
	$data_list[$ms_cs_gi_key]=array();
	$data_list[$ms_cs_gi_key]['name']="Gas instrument";
	$data_list[$ms_cs_gi_key]['number']=0;
	$data_list[$ms_cs_gi_key]['sets']=array();
}
$data_list[$ms_cs_gi_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>