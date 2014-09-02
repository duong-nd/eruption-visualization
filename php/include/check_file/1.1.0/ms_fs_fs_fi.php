<?php

// vvv Set variables
$ms_fs_fs_fi_key="fi";
$ms_fs_fs_fi_name="FieldsInstrument";
$gpr_table="cn";
$gpr_code=$pr_code;
$pr_table="fs";
$pr_code=$fs_code;

// ^^^ Get code
$code=xml_get_att($ms_fs_fs_fi_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_fs_fs_fi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_fs_fs_fi_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_fs_fs_fi_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_fs_fs_fi_stime=xml_get_ele($ms_fs_fs_fi_obj, "STARTTIME");
$ms_fs_fs_fi_etime=xml_get_ele($ms_fs_fs_fi_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_fs_fs_fi_stime) && !empty($ms_fs_fs_fi_etime)) {
	if (strcmp($ms_fs_fs_fi_stime, $ms_fs_fs_fi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fs_fs_fi_name." code=\"".$code."\"&gt;, start time (".$ms_fs_fs_fi_stime.") should be earlier than end time (".$ms_fs_fs_fi_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_fs_fs_stime) && !empty($ms_fs_fs_fi_stime)) {
	if (strcmp($ms_fs_fs_stime, $ms_fs_fs_fi_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fs_fs_fi_name." code=\"".$code."\"&gt;, start time (".$ms_fs_fs_fi_stime.") should be later than ".$ms_fs_fs_name." start time (".$ms_fs_fs_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_fs_fs_stime) && !empty($ms_fs_fs_fi_etime)) {
	if (strcmp($ms_fs_fs_stime, $ms_fs_fs_fi_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fs_fs_fi_name." code=\"".$code."\"&gt;, end time (".$ms_fs_fs_fi_etime.") should be later than ".$ms_fs_fs_name." start time (".$ms_fs_fs_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_fs_fs_fi_stime) && !empty($ms_fs_fs_etime)) {
	if (strcmp($ms_fs_fs_fi_stime, $ms_fs_fs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fs_fs_fi_name." code=\"".$code."\"&gt;, start time (".$ms_fs_fs_fi_stime.") should be earlier than ".$ms_fs_fs_name." end time (".$ms_fs_fs_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_fs_fs_fi_etime) && !empty($ms_fs_fs_etime)) {
	if (strcmp($ms_fs_fs_fi_etime, $ms_fs_fs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fs_fs_fi_name." code=\"".$code."\"&gt;, end time (".$ms_fs_fs_fi_etime.") should be earlier than ".$ms_fs_fs_name." end time (".$ms_fs_fs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_fs_fs_fi_obj);

// vvv Set publish date
$data_time=array($ms_fs_fs_fi_stime, $ms_fs_fs_fi_etime);
v1_set_pubdate($data_time, $current_time, $ms_fs_fs_fi_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_fs_fs_fi_obj['results']['owners'];

if (!v1_check_dupli_timeframe3($ms_fs_fs_fi_name, $ms_fs_fs_fi_key, $code, $ms_fs_fs_fi_stime, $ms_fs_fs_fi_etime, $final_owners, $pr_code, $gpr_code, $dupli_error)) {
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
$data['fs_id']=$ms_fs_fs_id;
$data['owners']=$final_owners;
$data['stime']=$ms_fs_fs_fi_stime;
$data['etime']=$ms_fs_fs_fi_etime;
$data['parentcode']=$pr_code;
$data['gparentcode']=$gpr_code;

v1_record_obj($ms_fs_fs_fi_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database

if (!v1_check_db_timeframe3($ms_fs_fs_fi_name, $ms_fs_fs_fi_key, $code, $ms_fs_fs_fi_stime, $ms_fs_fs_fi_etime, $final_owners, $pr_table, $pr_code, $gpr_table, $gpr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_fs_fs_fi_key])) {
	$data_list[$ms_fs_fs_fi_key]=array();
	$data_list[$ms_fs_fs_fi_key]['name']="Fields instrument";
	$data_list[$ms_fs_fs_fi_key]['number']=0;
	$data_list[$ms_fs_fs_fi_key]['sets']=array();
}
$data_list[$ms_fs_fs_fi_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>