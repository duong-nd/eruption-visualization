<?php

// vvv Set variables
$ms_hn_hs_key="hs";
$ms_hn_hs_name="HydrologicStation";
$pr_table="cn";
$gpr_code="ms";
$pr_code=$cn_code;

// ^^^ Get station code
// this $ms_hn_hs_obj is from main script (ms_hn.php) --> 'tag' of ms_hn element
$code=xml_get_att($ms_hn_hs_obj, "CODE");
$hs_code=$code;

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_hn_hs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_hn_hs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_hn_hs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_hn_hs_stime=xml_get_ele($ms_hn_hs_obj, "STARTTIME");
$ms_hn_hs_etime=xml_get_ele($ms_hn_hs_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_hn_hs_stime) && !empty($ms_hn_hs_etime)) {
	if (strcmp($ms_hn_hs_stime, $ms_hn_hs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hn_hs_name." code=\"".$code."\"&gt;, start time (".$ms_hn_hs_stime.") should be earlier than end time (".$ms_hn_hs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time < this start time
if (!empty($ms_hn_stime) && !empty($ms_hn_hs_stime)) {
	if (strcmp($ms_hn_stime, $ms_hn_hs_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hn_hs_name." code=\"".$code."\"&gt;, start time (".$ms_hn_hs_stime.") should be later than ".$ms_hn_name." start time (".$ms_hn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_hn_stime) && !empty($ms_hn_hs_etime)) {
	if (strcmp($ms_hn_stime, $ms_hn_hs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hn_hs_name." code=\"".$code."\"&gt;, end time (".$ms_hn_hs_etime.") should be later than ".$ms_hn_name." start time (".$ms_hn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_hn_hs_stime) && !empty($ms_hn_etime)) {
	if (strcmp($ms_hn_hs_stime, $ms_hn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hn_hs_name." code=\"".$code."\"&gt;, start time (".$ms_hn_hs_stime.") should be earlier than ".$ms_hn_name." end time (".$ms_hn_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_hn_hs_etime) && !empty($ms_hn_etime)) {
	if (strcmp($ms_hn_hs_etime, $ms_hn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hn_hs_name." code=\"".$code."\"&gt;, end time (".$ms_hn_hs_etime.") should be earlier than ".$ms_hn_name." end time (".$ms_hn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_hn_hs_obj);

// vvv Set publish date
$data_time=array($ms_hn_hs_stime, $ms_hn_hs_etime);
v1_set_pubdate($data_time, $current_time, $ms_hn_hs_obj);

// -- CHECK DUPLICATION --
// ### Check duplication
$final_owners=$ms_hn_hs_obj['results']['owners'];

if (!v1_check_dupli_timeframe2($ms_hn_hs_name, $ms_hn_hs_key, $code, $ms_hn_hs_stime, $ms_hn_hs_etime, $final_owners, $pr_code, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_hn_hs_id=v1_get_id_ms("hs", $code, $ms_hn_hs_stime, $final_owners);
if ($ms_hn_hs_id==NULL) {
	// Get XML ID
	$ms_hn_hs_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_hn_hs_stime;
$data['etime']=$ms_hn_hs_etime;
$data['parentcode']=$pr_code;
$data['gparentcode']="ms";

v1_record_obj($ms_hn_hs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe2($ms_hn_hs_name, $ms_hn_hs_key, $code, $ms_hn_hs_stime, $ms_hn_hs_etime, $final_owners, $pr_table, $pr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_hn_hs_obj['value'] as &$ms_hn_hs_ele) {
	switch ($ms_hn_hs_ele['tag']) {
		case "HYDROLOGICINSTRUMENT":
			$ms_hn_hs_hi_obj=&$ms_hn_hs_ele;
			include "ms_hn_hs_hi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_hn_hs_key])) {
	$data_list[$ms_hn_hs_key]=array();
	$data_list[$ms_hn_hs_key]['name']="Hydrologic station";
	$data_list[$ms_hn_hs_key]['number']=0;
	$data_list[$ms_hn_hs_key]['sets']=array();
}
$data_list[$ms_hn_hs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>