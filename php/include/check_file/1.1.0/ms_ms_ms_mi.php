<?php

// vvv Set variables
$ms_ms_ms_mi_key="mi";
$ms_ms_ms_mi_name="MeteoInstrument";

// ^^^ Get code
$code=xml_get_att($ms_ms_ms_mi_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ms_ms_mi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_ms_ms_mi_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ms_ms_mi_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_ms_ms_mi_stime=xml_get_ele($ms_ms_ms_mi_obj, "STARTTIME");
$ms_ms_ms_mi_etime=xml_get_ele($ms_ms_ms_mi_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_ms_ms_mi_stime) && !empty($ms_ms_ms_mi_etime)) {
	if (strcmp($ms_ms_ms_mi_stime, $ms_ms_ms_mi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ms_ms_mi_name." code=\"".$code."\"&gt;, start time (".$ms_ms_ms_mi_stime.") should be earlier than end time (".$ms_ms_ms_mi_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_ms_ms_stime) && !empty($ms_ms_ms_mi_stime)) {
	if (strcmp($ms_ms_ms_stime, $ms_ms_ms_mi_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ms_ms_mi_name." code=\"".$code."\"&gt;, start time (".$ms_ms_ms_mi_stime.") should be later than ".$ms_ms_ms_name." start time (".$ms_ms_ms_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_ms_ms_stime) && !empty($ms_ms_ms_mi_etime)) {
	if (strcmp($ms_ms_ms_stime, $ms_ms_ms_mi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ms_ms_mi_name." code=\"".$code."\"&gt;, end time (".$ms_ms_ms_mi_etime.") should be later than ".$ms_ms_ms_name." start time (".$ms_ms_ms_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_ms_ms_mi_stime) && !empty($ms_ms_ms_etime)) {
	if (strcmp($ms_ms_ms_mi_stime, $ms_ms_ms_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ms_ms_mi_name." code=\"".$code."\"&gt;, start time (".$ms_ms_ms_mi_stime.") should be earlier than ".$ms_ms_ms_name." end time (".$ms_ms_ms_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_ms_ms_mi_etime) && !empty($ms_ms_ms_etime)) {
	if (strcmp($ms_ms_ms_mi_etime, $ms_ms_ms_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ms_ms_mi_name." code=\"".$code."\"&gt;, end time (".$ms_ms_ms_mi_etime.") should be earlier than ".$ms_ms_ms_name." end time (".$ms_ms_ms_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_ms_ms_mi_obj);

// vvv Set publish date
$data_time=array($ms_ms_ms_mi_stime, $ms_ms_ms_mi_etime);
v1_set_pubdate($data_time, $current_time, $ms_ms_ms_mi_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_ms_ms_mi_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_ms_ms_mi_name, $ms_ms_ms_mi_key, $code, $ms_ms_ms_mi_stime, $ms_ms_ms_mi_etime, $final_owners, $dupli_error)) {
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
$data['ms_id']=$ms_ms_ms_id;
$data['owners']=$final_owners;
$data['stime']=$ms_ms_ms_mi_stime;
$data['etime']=$ms_ms_ms_mi_etime;
v1_record_obj($ms_ms_ms_mi_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_ms_ms_mi_name, $ms_ms_ms_mi_key, $code, $ms_ms_ms_mi_stime, $ms_ms_ms_mi_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_ms_ms_mi_key])) {
	$data_list[$ms_ms_ms_mi_key]=array();
	$data_list[$ms_ms_ms_mi_key]['name']="Meteo instrument";
	$data_list[$ms_ms_ms_mi_key]['number']=0;
	$data_list[$ms_ms_ms_mi_key]['sets']=array();
}
$data_list[$ms_ms_ms_mi_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>