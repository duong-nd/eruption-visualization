<?php

// vvv Set variables
$ob_co_key="co";
$ob_co_name="Observation";

// ^^^ Get code
$code=xml_get_att($ob_co_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get volcano
if (!v1_get_vd_id($ob_co_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($ob_co_obj);

// ^^^ Get owners
if (!v1_get_owners($ob_co_obj, $owners, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ob_co_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ob_co_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ### Check time order
$start_time=xml_get_ele($ob_co_obj, "STARTTIME");
$end_time=xml_get_ele($ob_co_obj, "ENDTIME");
if (!empty($start_time) && !empty($end_time)) {
	if (strcmp($start_time, $end_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ob_co_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than end time (".$end_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ob_co_obj);

// vvv Set publish date
$data_time=array($start_time, $end_time);
v1_set_pubdate($data_time, $current_time, $ob_co_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ob_co_obj['results']['owners'];
if (!v1_check_dupli_simple($ob_co_name, $ob_co_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($ob_co_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($ob_co_name, $ob_co_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ob_co_key])) {
	$data_list[$ob_co_key]=array();
	$data_list[$ob_co_key]['name']="Observations";
	$data_list[$ob_co_key]['number']=0;
	$data_list[$ob_co_key]['sets']=array();
}
$data_list[$ob_co_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_vd_ids);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>