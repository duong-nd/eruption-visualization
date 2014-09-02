<?php

// vvv Set variables
$ms_fn_fs_key="fs";
$ms_fn_fs_name="FieldsStation";
$pr_table="cn";
$gpr_code="ms";
$pr_code=$cn_code;

// ^^^ Get code
$code=xml_get_att($ms_fn_fs_obj, "CODE");
$fs_code=$code;

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_fn_fs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_fn_fs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_fn_fs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_fn_fs_stime=xml_get_ele($ms_fn_fs_obj, "STARTTIME");
$ms_fn_fs_etime=xml_get_ele($ms_fn_fs_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_fn_fs_stime) && !empty($ms_fn_fs_etime)) {
	if (strcmp($ms_fn_fs_stime, $ms_fn_fs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fn_fs_name." code=\"".$code."\"&gt;, start time (".$ms_fn_fs_stime.") should be earlier than end time (".$ms_fn_fs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_fn_stime) && !empty($ms_fn_fs_stime)) {
	if (strcmp($ms_fn_stime, $ms_fn_fs_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fn_fs_name." code=\"".$code."\"&gt;, start time (".$ms_fn_fs_stime.") should be later than ".$ms_fn_name." start time (".$ms_fn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_fn_stime) && !empty($ms_fn_fs_etime)) {
	if (strcmp($ms_fn_stime, $ms_fn_fs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fn_fs_name." code=\"".$code."\"&gt;, end time (".$ms_fn_fs_etime.") should be later than ".$ms_fn_name." start time (".$ms_fn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_fn_fs_stime) && !empty($ms_fn_etime)) {
	if (strcmp($ms_fn_fs_stime, $ms_fn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fn_fs_name." code=\"".$code."\"&gt;, start time (".$ms_fn_fs_stime.") should be earlier than ".$ms_fn_name." end time (".$ms_fn_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_fn_fs_etime) && !empty($ms_fn_etime)) {
	if (strcmp($ms_fn_fs_etime, $ms_fn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fn_fs_name." code=\"".$code."\"&gt;, end time (".$ms_fn_fs_etime.") should be earlier than ".$ms_fn_name." end time (".$ms_fn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_fn_fs_obj);

// vvv Set publish date
$data_time=array($ms_fn_fs_stime, $ms_fn_fs_etime);
v1_set_pubdate($data_time, $current_time, $ms_fn_fs_obj);

// -- CHECK DUPLICATION --
// ### Check duplication
// this to check duplication inside the input xml file, not with the available related data from database... revision note
$final_owners=$ms_fn_fs_obj['results']['owners'];

if (!v1_check_dupli_timeframe2($ms_fn_fs_name, $ms_fn_fs_key, $code, $ms_fn_fs_stime, $ms_fn_fs_etime, $final_owners, $pr_code, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_fn_fs_id=v1_get_id_ms("fs", $code, $ms_fn_fs_stime, $final_owners);
if ($ms_fn_fs_id==NULL) {
	// Get XML ID
	$ms_fn_fs_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_fn_fs_stime;
$data['etime']=$ms_fn_fs_etime;
$data['parentcode']=$pr_code;
$data['gparentcode']="ms";

v1_record_obj($ms_fn_fs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database

if (!v1_check_db_timeframe2($ms_fn_fs_name, $ms_fn_fs_key, $code, $ms_fn_fs_stime, $ms_fn_fs_etime, $final_owners, $pr_table, $pr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_fn_fs_obj['value'] as &$ms_fn_fs_ele) {
	switch ($ms_fn_fs_ele['tag']) {
		case "FIELDSINSTRUMENT":
			$ms_fn_fs_fi_obj=&$ms_fn_fs_ele;
			include "ms_fn_fs_fi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_fn_fs_key])) {
	$data_list[$ms_fn_fs_key]=array();
	$data_list[$ms_fn_fs_key]['name']="Fields station";
	$data_list[$ms_fn_fs_key]['number']=0;
	$data_list[$ms_fn_fs_key]['sets']=array();
}
$data_list[$ms_fn_fs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>