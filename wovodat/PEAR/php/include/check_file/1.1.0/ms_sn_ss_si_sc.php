<?php

// vvv Set variables
$ms_sn_ss_si_sc_key="si_cmp";
$ms_sn_ss_si_sc_name="SeismicComponent";

// ^^^ Get code
$code=xml_get_att($ms_sn_ss_si_sc_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_sn_ss_si_sc_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_sn_ss_si_sc_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_sn_ss_si_sc_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_sn_ss_si_sc_stime=xml_get_ele($ms_sn_ss_si_sc_obj, "STARTTIME");
$ms_sn_ss_si_sc_etime=xml_get_ele($ms_sn_ss_si_sc_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_sn_ss_si_sc_stime) && !empty($ms_sn_ss_si_sc_etime)) {
	if (strcmp($ms_sn_ss_si_sc_stime, $ms_sn_ss_si_sc_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_sn_ss_si_sc_name." code=\"".$code."\"&gt;, start time (".$ms_sn_ss_si_sc_stime.") should be earlier than end time (".$ms_sn_ss_si_sc_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_sn_ss_si_stime) && !empty($ms_sn_ss_si_sc_stime)) {
	if (strcmp($ms_sn_ss_si_stime, $ms_sn_ss_si_sc_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_sn_ss_si_sc_name." code=\"".$code."\"&gt;, start time (".$ms_sn_ss_si_sc_stime.") should be later than ".$ms_sn_ss_si_name." start time (".$ms_sn_ss_si_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_sn_ss_si_stime) && !empty($ms_sn_ss_si_sc_etime)) {
	if (strcmp($ms_sn_ss_si_stime, $ms_sn_ss_si_sc_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_sn_ss_si_sc_name." code=\"".$code."\"&gt;, end time (".$ms_sn_ss_si_sc_etime.") should be later than ".$ms_sn_ss_si_name." start time (".$ms_sn_ss_si_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_sn_ss_si_sc_stime) && !empty($ms_sn_ss_si_etime)) {
	if (strcmp($ms_sn_ss_si_sc_stime, $ms_sn_ss_si_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_sn_ss_si_sc_name." code=\"".$code."\"&gt;, start time (".$ms_sn_ss_si_sc_stime.") should be earlier than ".$ms_sn_ss_si_name." end time (".$ms_sn_ss_si_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_sn_ss_si_sc_etime) && !empty($ms_sn_ss_si_etime)) {
	if (strcmp($ms_sn_ss_si_sc_etime, $ms_sn_ss_si_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_sn_ss_si_sc_name." code=\"".$code."\"&gt;, end time (".$ms_sn_ss_si_sc_etime.") should be earlier than ".$ms_sn_ss_si_name." end time (".$ms_sn_ss_si_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_sn_ss_si_sc_obj);

// vvv Set publish date
$data_time=array($ms_sn_ss_si_sc_stime, $ms_sn_ss_si_sc_etime);
v1_set_pubdate($data_time, $current_time, $ms_sn_ss_si_sc_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_sn_ss_si_sc_obj['results']['owners'];
if (!v1_check_dupli_simple($ms_sn_ss_si_sc_name, $ms_sn_ss_si_sc_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($ms_sn_ss_si_sc_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($ms_sn_ss_si_sc_name, $ms_sn_ss_si_sc_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_sn_ss_si_sc_key])) {
	$data_list[$ms_sn_ss_si_sc_key]=array();
	$data_list[$ms_sn_ss_si_sc_key]['name']="Seismic component";
	$data_list[$ms_sn_ss_si_sc_key]['number']=0;
	$data_list[$ms_sn_ss_si_sc_key]['sets']=array();
}
$data_list[$ms_sn_ss_si_sc_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>