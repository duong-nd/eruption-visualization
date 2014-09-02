<?php

// vvv Set variables
$ms_dn_ds_key="ds";
$ms_dn_ds_name="DeformationStation";
$pr_table="cn";
$gpr_code="ms";
$pr_code=$cn_code;

// ^^^ Get station code
$code=xml_get_att($ms_dn_ds_obj, "CODE");
$ds_code=$code;

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_dn_ds_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_dn_ds_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_dn_ds_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_dn_ds_stime=xml_get_ele($ms_dn_ds_obj, "STARTTIME");
$ms_dn_ds_etime=xml_get_ele($ms_dn_ds_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_dn_ds_stime) && !empty($ms_dn_ds_etime)) {
	if (strcmp($ms_dn_ds_stime, $ms_dn_ds_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_dn_ds_name." code=\"".$code."\"&gt;, start time (".$ms_dn_ds_stime.") should be earlier than end time (".$ms_dn_ds_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time inclusion
// Parent start time must be < this start time
if (!empty($ms_dn_stime) && !empty($ms_dn_ds_stime)) {
	if (strcmp($ms_dn_stime, $ms_dn_ds_stime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_dn_ds_name." code=\"".$code."\"&gt;, start time (".$ms_dn_ds_stime.") should be later than ".$ms_dn_name." start time (".$ms_dn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// Parent start time < this end time
if (!empty($ms_dn_stime) && !empty($ms_dn_ds_etime)) {
	if (strcmp($ms_dn_stime, $ms_dn_ds_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_dn_ds_name." code=\"".$code."\"&gt;, end time (".$ms_dn_ds_etime.") should be later than ".$ms_dn_name." start time (".$ms_dn_stime.")";
		$l_errors++;
		return FALSE;
	}
}
// This start time < parent end time
if (!empty($ms_dn_ds_stime) && !empty($ms_dn_etime)) {
	if (strcmp($ms_dn_ds_stime, $ms_dn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_dn_ds_name." code=\"".$code."\"&gt;, start time (".$ms_dn_ds_stime.") should be earlier than ".$ms_dn_name." end time (".$ms_dn_etime.")";
		$l_errors++;
		return FALSE;
	}
}
// This end time < parent end time
if (!empty($ms_dn_ds_etime) && !empty($ms_dn_etime)) {
	if (strcmp($ms_dn_ds_etime, $ms_dn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_dn_ds_name." code=\"".$code."\"&gt;, end time (".$ms_dn_ds_etime.") should be earlier than ".$ms_dn_name." end time (".$ms_dn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_dn_ds_obj);

// vvv Set publish date
$data_time=array($ms_dn_ds_stime, $ms_dn_ds_etime);
v1_set_pubdate($data_time, $current_time, $ms_dn_ds_obj);

// -- CHECK DUPLICATION --
// ### Check duplication 
$final_owners=$ms_dn_ds_obj['results']['owners'];

if (!v1_check_dupli_timeframe2($ms_dn_ds_name, $ms_dn_ds_key, $code, $ms_dn_ds_stime, $ms_dn_ds_etime, $final_owners, $pr_code, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_dn_ds_id=v1_get_id_ms("ds", $code, $ms_dn_ds_stime, $final_owners);
if ($ms_dn_ds_id==NULL) {
	// Get XML ID
	$ms_dn_ds_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_dn_ds_stime;
$data['etime']=$ms_dn_ds_etime;
$data['parentcode']=$pr_code;
$data['gparentcode']="ms";

v1_record_obj($ms_dn_ds_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe2($ms_dn_ds_name, $ms_dn_ds_key, $code, $ms_dn_ds_stime, $ms_dn_ds_etime, $final_owners, $pr_table, $pr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_dn_ds_obj['value'] as &$ms_dn_ds_ele) {
	switch ($ms_dn_ds_ele['tag']) {
		case "DEFORMATIONINSTRUMENT":
			$ms_dn_ds_dig_obj=&$ms_dn_ds_ele;
			include "ms_dn_ds_dig.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "TILTSTRAININSTRUMENT":
			$ms_dn_ds_dit_obj=&$ms_dn_ds_ele;
			include "ms_dn_ds_dit.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_dn_ds_key])) {
	$data_list[$ms_dn_ds_key]=array();
	$data_list[$ms_dn_ds_key]['name']="Deformation station";
	$data_list[$ms_dn_ds_key]['number']=0;
	$data_list[$ms_dn_ds_key]['sets']=array();
}
$data_list[$ms_dn_ds_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>