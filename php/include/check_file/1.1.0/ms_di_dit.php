<?php

// vvv Set variables
$ms_di_dit_key="di_tlt";
$ms_di_dit_name="TiltStrainInstrument";

$pr_table="ds";
$pr_code=$code;

// ^^^ Get code
$code=xml_get_att($ms_di_dit_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_di_dit_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_di_dit_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_di_dit_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_di_dit_stime=xml_get_ele($ms_di_dit_obj, "STARTTIME");
$ms_di_dit_etime=xml_get_ele($ms_di_dit_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_di_dit_stime) && !empty($ms_di_dit_etime)) {
	if (strcmp($ms_di_dit_stime, $ms_di_dit_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_di_dit_name." code=\"".$code."\"&gt;, start time (".$ms_di_dit_stime.") should be earlier than end time (".$ms_di_dit_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get station
v1_get_ms($ms_di_dit_obj, "STATION", $gen_stations);

// vvv Set network
if (!v1_set_ms($ms_di_dit_obj, $ms_di_dit_name, $code, $ms_di_dit_stime, $ms_di_dit_etime, "deformation station", "ds", "ds", NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($ms_di_dit_obj['results']['ds_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_di_dit_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_di_dit_obj);

// vvv Set publish date
$data_time=array($ms_di_dit_stime, $ms_di_dit_etime);
v1_set_pubdate($data_time, $current_time, $ms_di_dit_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_di_dit_obj['results']['owners'];
//if (!v1_check_dupli_timeframe($ms_di_dit_name, $ms_di_dit_key, $code, $ms_di_dit_stime, $ms_di_dit_etime, $final_owners, $dupli_error)) {
if (!v1_check_dupli_timeframe2($ms_di_dit_name, $ms_di_dit_key, $code, $ms_di_dit_stime, $ms_di_dit_etime, $final_owners, $pr_code, $dupli_error)) {
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
$data['ds_id']=$ms_di_dit_obj['results']['ds_id'];
$data['owners']=$final_owners;
$data['stime']=$ms_di_dit_stime;
$data['etime']=$ms_di_dit_etime;
$data['parentcode']=$pr_code;

v1_record_obj($ms_di_dit_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
//if (!v1_check_db_timeframe($ms_di_dit_name, $ms_di_dit_key, $code, $ms_di_dit_stime, $ms_di_dit_etime, $final_owners, $check_db_error)) {
if (!v1_check_db_timeframe2($ms_di_dit_name, $ms_di_dit_key, $code, $ms_di_dit_stime, $ms_di_dit_etime, $final_owners, $pr_table, $pr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_di_dit_key])) {
	$data_list[$ms_di_dit_key]=array();
	$data_list[$ms_di_dit_key]['name']="Tilt/Strain instrument";
	$data_list[$ms_di_dit_key]['number']=0;
	$data_list[$ms_di_dit_key]['sets']=array();
}
$data_list[$ms_di_dit_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>