<?php

// vvv Set variables
$ms_mn_ms_key="ms";
$ms_mn_ms_name="MeteoStation";
$pr_table="cn";
$gpr_code="ms";
$pr_code=$cn_code;

// ^^^ Get station code
// this $ms_mn_ms_obj is from main script (ms_mn.php) --> 'tag' of ms_mn element
$code=xml_get_att($ms_mn_ms_obj, "CODE");
$ms_code=$code;

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_mn_ms_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_mn_ms_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_mn_ms_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_mn_ms_stime=xml_get_ele($ms_mn_ms_obj, "STARTTIME");
$ms_mn_ms_etime=xml_get_ele($ms_mn_ms_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_mn_ms_stime) && !empty($ms_mn_ms_etime)) {
	if (strcmp($ms_mn_ms_stime, $ms_mn_ms_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_mn_ms_name." code=\"".$code."\"&gt;, start time (".$ms_mn_ms_stime.") should be earlier than end time (".$ms_mn_ms_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_mn_stime) && !empty($ms_mn_ms_stime)) {
	if (strcmp($ms_mn_stime, $ms_mn_ms_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_mn_ms_name." code=\"".$code."\"&gt;, start time (".$ms_mn_ms_stime.") should be later than ".$ms_mn_name." start time (".$ms_mn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_mn_stime) && !empty($ms_mn_ms_etime)) {
	if (strcmp($ms_mn_stime, $ms_mn_ms_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_mn_ms_name." code=\"".$code."\"&gt;, end time (".$ms_mn_ms_etime.") should be later than ".$ms_mn_name." start time (".$ms_mn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_mn_ms_stime) && !empty($ms_mn_etime)) {
	if (strcmp($ms_mn_ms_stime, $ms_mn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_mn_ms_name." code=\"".$code."\"&gt;, start time (".$ms_mn_ms_stime.") should be earlier than ".$ms_mn_name." end time (".$ms_mn_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_mn_ms_etime) && !empty($ms_mn_etime)) {
	if (strcmp($ms_mn_ms_etime, $ms_mn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_mn_ms_name." code=\"".$code."\"&gt;, end time (".$ms_mn_ms_etime.") should be earlier than ".$ms_mn_name." end time (".$ms_mn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_mn_ms_obj);

// vvv Set publish date
$data_time=array($ms_mn_ms_stime, $ms_mn_ms_etime);
v1_set_pubdate($data_time, $current_time, $ms_mn_ms_obj);

// -- CHECK DUPLICATION --
// ### Check duplication
$final_owners=$ms_mn_ms_obj['results']['owners'];

if (!v1_check_dupli_timeframe2($ms_mn_ms_name, $ms_mn_ms_key, $code, $ms_mn_ms_stime, $ms_mn_ms_etime, $final_owners, $pr_code, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_mn_ms_id=v1_get_id_ms("ms", $code, $ms_mn_ms_stime, $final_owners);
if ($ms_mn_ms_id==NULL) {
	// Get XML ID
	$ms_mn_ms_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_mn_ms_stime;
$data['etime']=$ms_mn_ms_etime;
$data['parentcode']=$pr_code;
$data['gparentcode']="ms";

v1_record_obj($ms_mn_ms_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe2($ms_mn_ms_name, $ms_mn_ms_key, $code, $ms_mn_ms_stime, $ms_mn_ms_etime, $final_owners,$pr_table, $pr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_mn_ms_obj['value'] as &$ms_mn_ms_ele) {
	switch ($ms_mn_ms_ele['tag']) {
		case "METEOINSTRUMENT":
			$ms_mn_ms_mi_obj=&$ms_mn_ms_ele;
			include "ms_mn_ms_mi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_mn_ms_key])) {
	$data_list[$ms_mn_ms_key]=array();
	$data_list[$ms_mn_ms_key]['name']="Meteo station";
	$data_list[$ms_mn_ms_key]['number']=0;
	$data_list[$ms_mn_ms_key]['sets']=array();
}
$data_list[$ms_mn_ms_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>