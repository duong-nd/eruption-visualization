<?php

// vvv Set variables
$er_for_key="ed_for";
$er_for_name="Forecast";

// ^^^ Get code
$code=xml_get_att($er_for_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($er_for_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($er_for_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$er_for_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($er_for_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($er_for_obj);

// ^^^ Get times
$issue_time=xml_get_ele($er_for_obj, "ISSUETIME");
$earliest_start_time=xml_get_ele($er_for_obj, "EARLIESTSTARTTIME");
$latest_start_time=xml_get_ele($er_for_obj, "LATESTSTARTTIME");

// ### Check time order
if (!empty($issue_time) && !empty($earliest_start_time)) {
	if (strcmp($issue_time, $earliest_start_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$er_for_name." code=\"".$code."\"&gt;, issue time (".$issue_time.") should be earlier than earliest start time (".$earliest_start_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time order
if (!empty($issue_time) && !empty($latest_start_time)) {
	if (strcmp($issue_time, $latest_start_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$er_for_name." code=\"".$code."\"&gt;, issue time (".$issue_time.") should be earlier than latest start time (".$latest_start_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ### Check time order
if (!empty($earliest_start_time) && !empty($latest_start_time)) {
	if (strcmp($earliest_start_time, $latest_start_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$er_for_name." code=\"".$code."\"&gt;, earliest start time (".$earliest_start_time.") should be earlier than latest start time (".$latest_start_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get phase
v1_get_phase($er_for_obj);

// vvv Set phase
if (!v1_set_phase($er_for_obj, $er_for_name, $code, $issue_time, NULL, $er_for_obj['results']['vd_id'], $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($er_for_obj);

// vvv Set publish date
$data_time=array($issue_time, $earliest_start_time, $latest_start_time);
v1_set_pubdate($data_time, $current_time, $er_for_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$er_for_obj['results']['owners'];
if (!v1_check_dupli_simple($er_for_name, $er_for_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($er_for_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($er_for_name, $er_for_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$er_for_key])) {
	$data_list[$er_for_key]=array();
	$data_list[$er_for_key]['name']="Eruption forecast";
	$data_list[$er_for_key]['number']=0;
	$data_list[$er_for_key]['sets']=array();
}
$data_list[$er_for_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_phases);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>