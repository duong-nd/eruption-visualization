<?php

// vvv Set variables
$ms_cs_sate_key="cs";          
$ms_cs_sate_name="Satellite";      

// ^^^ Get code
$code=xml_get_att($ms_cs_sate_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_cs_sate_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_cs_sate_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_cs_sate_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$start_time=xml_get_ele($ms_cs_sate_obj, "STARTTIME");
$end_time=xml_get_ele($ms_cs_sate_obj, "ENDTIME");

// ### Check time order
if (!empty($start_time) && !empty($end_time)) {
	if (strcmp($start_time, $end_time)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_cs_sate_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than end time (".$end_time.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_cs_sate_obj);

// vvv Set publish date
$data_time=array($start_time, $end_time);
v1_set_pubdate($data_time, $current_time, $ms_cs_sate_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_cs_sate_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_cs_sate_name, $ms_cs_sate_key, $code, $start_time, $end_time, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_cs_sate_id=v1_get_id_ms("cs", $code, $start_time, $final_owners);
if ($ms_cs_sate_id==NULL) {
	// Get XML ID
	$ms_cs_sate_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$start_time;
$data['etime']=$end_time;
v1_record_obj($ms_cs_sate_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_cs_sate_name, $ms_cs_sate_key, $code, $start_time, $end_time, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}


// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_cs_sate_key])) {
	$data_list[$ms_cs_sate_key]=array();
	$data_list[$ms_cs_sate_key]['name']="Satellite";
	$data_list[$ms_cs_sate_key]['number']=0;
	$data_list[$ms_cs_sate_key]['sets']=array();
}
$data_list[$ms_cs_sate_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>