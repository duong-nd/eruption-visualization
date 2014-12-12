<?php

// vvv Set variables
$ms_di_dig_key="di_gen";
$ms_di_dig_name="DeformationInstrument";

$pr_table="ds";
$pr_code=$code;

// ^^^ Get code
$code=xml_get_att($ms_di_dig_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_di_dig_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_di_dig_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_di_dig_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_di_dig_stime=xml_get_ele($ms_di_dig_obj, "STARTTIME");
$ms_di_dig_etime=xml_get_ele($ms_di_dig_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_di_dig_stime) && !empty($ms_di_dig_etime)) {
	if (strcmp($ms_di_dig_stime, $ms_di_dig_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_di_dig_name." code=\"".$code."\"&gt;, start time (".$ms_di_dig_stime.") should be earlier than end time (".$ms_di_dig_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get station
v1_get_ms($ms_di_dig_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms($ms_di_dig_obj, $ms_di_dig_name, $code, $ms_di_dig_stime, $ms_di_dig_etime, "deformation station", "ds", "ds", NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($ms_di_dig_obj['results']['ds_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_di_dig_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_di_dig_obj);

// vvv Set publish date
$data_time=array($ms_di_dig_stime, $ms_di_dig_etime);
v1_set_pubdate($data_time, $current_time, $ms_di_dig_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_di_dig_obj['results']['owners'];
//if (!v1_check_dupli_timeframe($ms_di_dig_name, $ms_di_dig_key, $code, $ms_di_dig_stime, $ms_di_dig_etime, $final_owners, $dupli_error)) {
if (!v1_check_dupli_timeframe2($ms_di_dig_name, $ms_di_dig_key, $code, $ms_di_dig_stime, $ms_di_dig_etime, $final_owners, $pr_code, $dupli_error)) {
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
$data['ds_id']=$ms_di_dig_obj['results']['ds_id'];
$data['owners']=$final_owners;
$data['stime']=$ms_di_dig_stime;
$data['etime']=$ms_di_dig_etime;
$data['parentcode']=$pr_code;

v1_record_obj($ms_di_dig_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
//if (!v1_check_db_timeframe($ms_di_dig_name, $ms_di_dig_key, $code, $ms_di_dig_stime, $ms_di_dig_etime, $final_owners, $check_db_error)) {
if (!v1_check_db_timeframe2($ms_di_dig_name, $ms_di_dig_key, $code, $ms_di_dig_stime, $ms_di_dig_etime, $final_owners, $pr_table, $pr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_di_dig_key])) {
	$data_list[$ms_di_dig_key]=array();
	$data_list[$ms_di_dig_key]['name']="Deformation instrument";
	$data_list[$ms_di_dig_key]['number']=0;
	$data_list[$ms_di_dig_key]['sets']=array();
}
$data_list[$ms_di_dig_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>