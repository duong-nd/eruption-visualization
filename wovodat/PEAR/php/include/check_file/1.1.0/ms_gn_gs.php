<?php

// vvv Set variables
$ms_gn_gs_key="gs";
$ms_gn_gs_name="GasStation";

// ^^^ Get code
$code=xml_get_att($ms_gn_gs_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_gn_gs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_gn_gs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_gn_gs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_gn_gs_stime=xml_get_ele($ms_gn_gs_obj, "STARTTIME");
$ms_gn_gs_etime=xml_get_ele($ms_gn_gs_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_gn_gs_stime) && !empty($ms_gn_gs_etime)) {
	if (strcmp($ms_gn_gs_stime, $ms_gn_gs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_name." code=\"".$code."\"&gt;, start time (".$ms_gn_gs_stime.") should be earlier than end time (".$ms_gn_gs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_gn_stime) && !empty($ms_gn_gs_stime)) {
	if (strcmp($ms_gn_stime, $ms_gn_gs_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_name." code=\"".$code."\"&gt;, start time (".$ms_gn_gs_stime.") should be later than ".$ms_gn_name." start time (".$ms_gn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_gn_stime) && !empty($ms_gn_gs_etime)) {
	if (strcmp($ms_gn_stime, $ms_gn_gs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_name." code=\"".$code."\"&gt;, end time (".$ms_gn_gs_etime.") should be later than ".$ms_gn_name." start time (".$ms_gn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_gn_gs_stime) && !empty($ms_gn_etime)) {
	if (strcmp($ms_gn_gs_stime, $ms_gn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_name." code=\"".$code."\"&gt;, start time (".$ms_gn_gs_stime.") should be earlier than ".$ms_gn_name." end time (".$ms_gn_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_gn_gs_etime) && !empty($ms_gn_etime)) {
	if (strcmp($ms_gn_gs_etime, $ms_gn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gn_gs_name." code=\"".$code."\"&gt;, end time (".$ms_gn_gs_etime.") should be earlier than ".$ms_gn_name." end time (".$ms_gn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_gn_gs_obj);

// vvv Set publish date
$data_time=array($ms_gn_gs_stime, $ms_gn_gs_etime);
v1_set_pubdate($data_time, $current_time, $ms_gn_gs_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_gn_gs_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_gn_gs_name, $ms_gn_gs_key, $code, $ms_gn_gs_stime, $ms_gn_gs_etime, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_gn_gs_id=v1_get_id_ms("gs", $code, $ms_gn_gs_stime, $final_owners);
if ($ms_gn_gs_id==NULL) {
	// Get XML ID
	$ms_gn_gs_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_gn_gs_stime;
$data['etime']=$ms_gn_gs_etime;
$data['cn_id']=$ms_gn_id;
$data['cn_code']=$ms_gn_code;
v1_record_obj($ms_gn_gs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_gn_gs_name, $ms_gn_gs_key, $code, $ms_gn_gs_stime, $ms_gn_gs_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_gn_gs_obj['value'] as &$ms_gn_gs_ele) {
	switch ($ms_gn_gs_ele['tag']) {
		case "GASINSTRUMENT":
			$ms_gn_gs_gi_obj=&$ms_gn_gs_ele;
			include "ms_gn_gs_gi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_gn_gs_key])) {
	$data_list[$ms_gn_gs_key]=array();
	$data_list[$ms_gn_gs_key]['name']="Gas station";
	$data_list[$ms_gn_gs_key]['number']=0;
	$data_list[$ms_gn_gs_key]['sets']=array();
}
$data_list[$ms_gn_gs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>