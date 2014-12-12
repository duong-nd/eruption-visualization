<?php

// vvv Set variables
$ip_tec_key="ip_tec";
$ip_tec_name="RegionalTectonics";

// ^^^ Get code
$code=xml_get_att($ip_tec_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get volcano
if (!v1_get_vd_id($ip_tec_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($ip_tec_obj);

// ^^^ Get owners
if (!v1_get_owners($ip_tec_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ip_tec_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ip_tec_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ### Check time order
$start_time=xml_get_ele($ip_tec_obj, "STARTTIME");
$end_time=xml_get_ele($ip_tec_obj, "ENDTIME");
if (!empty($start_time) && !empty($end_time)) {
	if (strcmp($start_time, $end_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ip_tec_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than end time (".$end_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time order
$infer_time=xml_get_ele($ip_tec_obj, "INFERTIME");
if (!empty($start_time) && !empty($infer_time)) {
	if (strcmp($start_time, $infer_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ip_tec_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than inferrence time (".$infer_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ip_tec_obj);

// vvv Set publish date
$data_time=array($infer_time, $start_time, $end_time);
v1_set_pubdate($data_time, $current_time, $ip_tec_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ip_tec_obj['results']['owners'];
if (!v1_check_dupli_simple($ip_tec_name, $ip_tec_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($ip_tec_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($ip_tec_name, $ip_tec_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ip_tec_key])) {
	$data_list[$ip_tec_key]=array();
	$data_list[$ip_tec_key]['name']="Regional tectonics interaction";
	$data_list[$ip_tec_key]['number']=0;
	$data_list[$ip_tec_key]['sets']=array();
}
$data_list[$ip_tec_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_vd_ids);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>