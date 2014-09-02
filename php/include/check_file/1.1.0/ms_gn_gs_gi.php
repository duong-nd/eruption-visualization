<?php

// vvv Set variables
$ms_gn_gs_gi_key="gi";
$ms_gn_gs_gi_name="GasInstrument";

// ^^^ Get code
$code=xml_get_att($ms_gn_gs_gi_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_gn_gs_gi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_gn_gs_gi_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_gn_gs_gi_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_gn_gs_gi_stime=xml_get_ele($ms_gn_gs_gi_obj, "STARTTIME");
$ms_gn_gs_gi_etime=xml_get_ele($ms_gn_gs_gi_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_gn_gs_gi_stime) && !empty($ms_gn_gs_gi_etime)) {
	if (strcmp($ms_gn_gs_gi_stime, $ms_gn_gs_gi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_gi_name." code=\"".$code."\"&gt;, start time (".$ms_gn_gs_gi_stime.") should be earlier than end time (".$ms_gn_gs_gi_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_gn_gs_stime) && !empty($ms_gn_gs_gi_stime)) {
	if (strcmp($ms_gn_gs_stime, $ms_gn_gs_gi_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_gi_name." code=\"".$code."\"&gt;, start time (".$ms_gn_gs_gi_stime.") should be later than ".$ms_gn_gs_name." start time (".$ms_gn_gs_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_gn_gs_stime) && !empty($ms_gn_gs_gi_etime)) {
	if (strcmp($ms_gn_gs_stime, $ms_gn_gs_gi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_gi_name." code=\"".$code."\"&gt;, end time (".$ms_gn_gs_gi_etime.") should be later than ".$ms_gn_gs_name." start time (".$ms_gn_gs_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_gn_gs_gi_stime) && !empty($ms_gn_gs_etime)) {
	if (strcmp($ms_gn_gs_gi_stime, $ms_gn_gs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_gi_name." code=\"".$code."\"&gt;, start time (".$ms_gn_gs_gi_stime.") should be earlier than ".$ms_gn_gs_name." end time (".$ms_gn_gs_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_gn_gs_gi_etime) && !empty($ms_gn_gs_etime)) {
	if (strcmp($ms_gn_gs_gi_etime, $ms_gn_gs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_gi_name." code=\"".$code."\"&gt;, end time (".$ms_gn_gs_gi_etime.") should be earlier than ".$ms_gn_gs_name." end time (".$ms_gn_gs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_gn_gs_gi_obj);

// vvv Set publish date
$data_time=array($ms_gn_gs_gi_stime, $ms_gn_gs_gi_etime);
v1_set_pubdate($data_time, $current_time, $ms_gn_gs_gi_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_gn_gs_gi_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_gn_gs_gi_name, $ms_gn_gs_gi_key, $code, $ms_gn_gs_gi_stime, $ms_gn_gs_gi_etime, $final_owners, $dupli_error)) {
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
$data['gs_id']=$ms_gn_gs_id;
$data['owners']=$final_owners;
$data['stime']=$ms_gn_gs_gi_stime;
$data['etime']=$ms_gn_gs_gi_etime;
v1_record_obj($ms_gn_gs_gi_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_gn_gs_gi_name, $ms_gn_gs_gi_key, $code, $ms_gn_gs_gi_stime, $ms_gn_gs_gi_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_gn_gs_gi_key])) {
	$data_list[$ms_gn_gs_gi_key]=array();
	$data_list[$ms_gn_gs_gi_key]['name']="Gas instrument";
	$data_list[$ms_gn_gs_gi_key]['number']=0;
	$data_list[$ms_gn_gs_gi_key]['sets']=array();
}
$data_list[$ms_gn_gs_gi_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>