<?php

// vvv Set variables
$ms_hs_hs_hi_key="hi";
$ms_hs_hs_hi_name="HydrologicInstrument";

// ^^^ Get code
$code=xml_get_att($ms_hs_hs_hi_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_hs_hs_hi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_hs_hs_hi_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_hs_hs_hi_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_hs_hs_hi_stime=xml_get_ele($ms_hs_hs_hi_obj, "STARTTIME");
$ms_hs_hs_hi_etime=xml_get_ele($ms_hs_hs_hi_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_hs_hs_hi_stime) && !empty($ms_hs_hs_hi_etime)) {
	if (strcmp($ms_hs_hs_hi_stime, $ms_hs_hs_hi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hs_hs_hi_name." code=\"".$code."\"&gt;, start time (".$ms_hs_hs_hi_stime.") should be earlier than end time (".$ms_hs_hs_hi_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_hs_hs_stime) && !empty($ms_hs_hs_hi_stime)) {
	if (strcmp($ms_hs_hs_stime, $ms_hs_hs_hi_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hs_hs_hi_name." code=\"".$code."\"&gt;, start time (".$ms_hs_hs_hi_stime.") should be later than ".$ms_hs_hs_name." start time (".$ms_hs_hs_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_hs_hs_stime) && !empty($ms_hs_hs_hi_etime)) {
	if (strcmp($ms_hs_hs_stime, $ms_hs_hs_hi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hs_hs_hi_name." code=\"".$code."\"&gt;, end time (".$ms_hs_hs_hi_etime.") should be later than ".$ms_hs_hs_name." start time (".$ms_hs_hs_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_hs_hs_hi_stime) && !empty($ms_hs_hs_etime)) {
	if (strcmp($ms_hs_hs_hi_stime, $ms_hs_hs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hs_hs_hi_name." code=\"".$code."\"&gt;, start time (".$ms_hs_hs_hi_stime.") should be earlier than ".$ms_hs_hs_name." end time (".$ms_hs_hs_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_hs_hs_hi_etime) && !empty($ms_hs_hs_etime)) {
	if (strcmp($ms_hs_hs_hi_etime, $ms_hs_hs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hs_hs_hi_name." code=\"".$code."\"&gt;, end time (".$ms_hs_hs_hi_etime.") should be earlier than ".$ms_hs_hs_name." end time (".$ms_hs_hs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_hs_hs_hi_obj);

// vvv Set publish date
$data_time=array($ms_hs_hs_hi_stime, $ms_hs_hs_hi_etime);
v1_set_pubdate($data_time, $current_time, $ms_hs_hs_hi_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_hs_hs_hi_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_hs_hs_hi_name, $ms_hs_hs_hi_key, $code, $ms_hs_hs_hi_stime, $ms_hs_hs_hi_etime, $final_owners, $dupli_error)) {
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
$data['hs_id']=$ms_hs_hs_id;
$data['owners']=$final_owners;
$data['stime']=$ms_hs_hs_hi_stime;
$data['etime']=$ms_hs_hs_hi_etime;
v1_record_obj($ms_hs_hs_hi_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_hs_hs_hi_name, $ms_hs_hs_hi_key, $code, $ms_hs_hs_hi_stime, $ms_hs_hs_hi_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_hs_hs_hi_key])) {
	$data_list[$ms_hs_hs_hi_key]=array();
	$data_list[$ms_hs_hs_hi_key]['name']="Hydrologic instrument";
	$data_list[$ms_hs_hs_hi_key]['number']=0;
	$data_list[$ms_hs_hs_hi_key]['sets']=array();
}
$data_list[$ms_hs_hs_hi_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>