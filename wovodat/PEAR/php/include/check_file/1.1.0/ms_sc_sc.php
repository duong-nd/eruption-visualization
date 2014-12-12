<?php

// vvv Set variables
$ms_sc_sc_key="si_cmp";
$ms_sc_sc_name="SeismicComponent";

// ^^^ Get code
$code=xml_get_att($ms_sc_sc_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_sc_sc_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_sc_sc_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_sc_sc_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_sc_sc_stime=xml_get_ele($ms_sc_sc_obj, "STARTTIME");
$ms_sc_sc_etime=xml_get_ele($ms_sc_sc_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_sc_sc_stime) && !empty($ms_sc_sc_etime)) {
	if (strcmp($ms_sc_sc_stime, $ms_sc_sc_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_sc_sc_name." code=\"".$code."\"&gt;, start time (".$ms_sc_sc_stime.") should be earlier than end time (".$ms_sc_sc_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get instrument
v1_get_ms($ms_sc_sc_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms($ms_sc_sc_obj, $ms_sc_sc_name, $code, $ms_sc_sc_stime, $ms_sc_sc_etime, "seismic instrument", "si", "si", NULL, NULL, $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: instrument
if (empty($ms_sc_sc_obj['results']['si_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_sc_sc_name." code=\"".$code."\"&gt; is missing information: please specify instrument";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_sc_sc_obj);

// vvv Set publish date
$data_time=array($ms_sc_sc_stime, $ms_sc_sc_etime);
v1_set_pubdate($data_time, $current_time, $ms_sc_sc_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_sc_sc_obj['results']['owners'];
if (!v1_check_dupli_simple($ms_sc_sc_name, $ms_sc_sc_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($ms_sc_sc_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($ms_sc_sc_name, $ms_sc_sc_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_sc_sc_key])) {
	$data_list[$ms_sc_sc_key]=array();
	$data_list[$ms_sc_sc_key]['name']="Seismic component";
	$data_list[$ms_sc_sc_key]['number']=0;
	$data_list[$ms_sc_sc_key]['sets']=array();
}
$data_list[$ms_sc_sc_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_pubdates);

?>