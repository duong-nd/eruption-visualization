<?php

// vvv Set variables
$ms_ss_ss_si_key="si";
$ms_ss_ss_si_name="SeismicInstrument";

// ^^^ Get code
$code=xml_get_att($ms_ss_ss_si_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ss_ss_si_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_ss_ss_si_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ss_ss_si_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_ss_ss_si_stime=xml_get_ele($ms_ss_ss_si_obj, "STARTTIME");
$ms_ss_ss_si_etime=xml_get_ele($ms_ss_ss_si_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_ss_ss_si_stime) && !empty($ms_ss_ss_si_etime)) {
	if (strcmp($ms_ss_ss_si_stime, $ms_ss_ss_si_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ss_ss_si_name." code=\"".$code."\"&gt;, start time (".$ms_ss_ss_si_stime.") should be earlier than end time (".$ms_ss_ss_si_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_ss_ss_stime) && !empty($ms_ss_ss_si_stime)) {
	if (strcmp($ms_ss_ss_stime, $ms_ss_ss_si_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ss_ss_si_name." code=\"".$code."\"&gt;, start time (".$ms_ss_ss_si_stime.") should be later than ".$ms_ss_ss_name." start time (".$ms_ss_ss_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_ss_ss_stime) && !empty($ms_ss_ss_si_etime)) {
	if (strcmp($ms_ss_ss_stime, $ms_ss_ss_si_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ss_ss_si_name." code=\"".$code."\"&gt;, end time (".$ms_ss_ss_si_etime.") should be later than ".$ms_ss_ss_name." start time (".$ms_ss_ss_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_ss_ss_si_stime) && !empty($ms_ss_ss_etime)) {
	if (strcmp($ms_ss_ss_si_stime, $ms_ss_ss_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ss_ss_si_name." code=\"".$code."\"&gt;, start time (".$ms_ss_ss_si_stime.") should be earlier than ".$ms_ss_ss_name." end time (".$ms_ss_ss_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_ss_ss_si_etime) && !empty($ms_ss_ss_etime)) {
	if (strcmp($ms_ss_ss_si_etime, $ms_ss_ss_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ss_ss_si_name." code=\"".$code."\"&gt;, end time (".$ms_ss_ss_si_etime.") should be earlier than ".$ms_ss_ss_name." end time (".$ms_ss_ss_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_ss_ss_si_obj);

// vvv Set publish date
$data_time=array($ms_ss_ss_si_stime, $ms_ss_ss_si_etime);
v1_set_pubdate($data_time, $current_time, $ms_ss_ss_si_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_ss_ss_si_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_ss_ss_si_name, $ms_ss_ss_si_key, $code, $ms_ss_ss_si_stime, $ms_ss_ss_si_etime, $final_owners, $dupli_error)) {
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
$data['ss_id']=$ms_ss_ss_id;
$data['owners']=$final_owners;
$data['stime']=$ms_ss_ss_si_stime;
$data['etime']=$ms_ss_ss_si_etime;
v1_record_obj($ms_ss_ss_si_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_ss_ss_si_name, $ms_ss_ss_si_key, $code, $ms_ss_ss_si_stime, $ms_ss_ss_si_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_ss_ss_si_obj['value'] as &$ms_ss_ss_si_ele) {
	switch ($ms_ss_ss_si_ele['tag']) {
		case "SEISMICCOMPONENT":
			$ms_ss_ss_si_sc_obj=&$ms_ss_ss_si_ele;
			include "ms_ss_ss_si_sc.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_ss_ss_si_key])) {
	$data_list[$ms_ss_ss_si_key]=array();
	$data_list[$ms_ss_ss_si_key]['name']="Seismic instrument";
	$data_list[$ms_ss_ss_si_key]['number']=0;
	$data_list[$ms_ss_ss_si_key]['sets']=array();
}
$data_list[$ms_ss_ss_si_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>