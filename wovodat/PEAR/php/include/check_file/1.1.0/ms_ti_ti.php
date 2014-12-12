<?php

// vvv Set variables
$ms_ti_ti_key="ti";
$ms_ti_ti_name="ThermalInstrument";

// ^^^ Get code
$code=xml_get_att($ms_ti_ti_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ti_ti_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_ti_ti_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ti_ti_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_ti_ti_stime=xml_get_ele($ms_ti_ti_obj, "STARTTIME");
$ms_ti_ti_etime=xml_get_ele($ms_ti_ti_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_ti_ti_stime) && !empty($ms_ti_ti_etime)) {
	if (strcmp($ms_ti_ti_stime, $ms_ti_ti_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ti_ti_name." code=\"".$code."\"&gt;, start time (".$ms_ti_ti_stime.") should be earlier than end time (".$ms_ti_ti_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get station
v1_get_ms($ms_ti_ti_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms($ms_ti_ti_obj, $ms_ti_ti_name, $code, $ms_ti_ti_stime, $ms_ti_ti_etime, "thermal station", "ts", "ts", NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}


// ^^^ Get airplane
v1_get_ms($ms_ti_ti_obj, "AIRPLANE", $gen_stations2);

if (!v1_set_ms_data($ms_ti_ti_obj, $ms_ti_ti_name, $code, $ms_ti_ti_stime, $ms_ti_ti_etime, "airplane", "cs", "cs_id_air", "cs", NULL, NULL, NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}


// ^^^ Get satellite      
v1_get_ms($ms_ti_ti_obj, "SATELLITE", $gen_stations3);

// vvv Set satellite
if (!v1_set_ms_data($ms_ti_ti_obj, $ms_ti_ti_name, $code, $ms_ti_ti_stime, $ms_ti_ti_etime, "satellite", "cs", "cs_id_sat", "cs", NULL, NULL, NULL, NULL, $gen_stations3, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check station OR airplane OR satellite
if (!empty($ms_ti_ti_obj['results']['cs_id_air']) && !empty($ms_ti_ti_obj['results']['cs_id_sat']) && !empty($ms_ti_ti_obj['results']['ts_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ti_ti_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or airplane or satellite";
	$l_errors++;
	return FALSE;
}



// ### Check station OR airplane
if (!empty($ms_ti_ti_obj['results']['cs_id_air']) && !empty($ms_ti_ti_obj['results']['ts_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ti_ti_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or airplane";
	$l_errors++;
	return FALSE;
}
// ### Check station OR satellite
if (!empty($ms_ti_ti_obj['results']['cs_id_sat']) && !empty($ms_ti_ti_obj['results']['ts_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ti_ti_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or satellite";
	$l_errors++;
	return FALSE;
}

// ### Check airplane OR satellite
if (!empty($ms_ti_ti_obj['results']['cs_id_air']) && !empty($ms_ti_ti_obj['results']['cs_id_sat'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ti_ti_name." code=\"".$code."\"&gt; has inconsistent information: please specify only airplane or satellite";
	$l_errors++;
	return FALSE;
}

// vvv Set xs_id
if (!empty($ms_ti_ti_obj['results']['cs_id_air'])) {
	$ms_ti_ti_obj['results']['cs_id']=$ms_ti_ti_obj['results']['cs_id_air'];
}
elseif (!empty($ms_ti_ti_obj['results']['cs_id_sat'])) {
	$ms_ti_ti_obj['results']['cs_id']=$ms_ti_ti_obj['results']['cs_id_sat'];
}



// ### Check necessary information: station or airplane or satellite
if (empty($ms_ti_ti_obj['results']['ts_id']) && empty($ms_ti_ti_obj['results']['cs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ti_ti_name." code=\"".$code."\"&gt; is missing information: please specify station or airplane or satellite";
	$l_errors++;
	return FALSE;
}

// ### If no station, 0
if (empty($ms_ti_ti_obj['results']['ts_id'])) {
	$ms_ti_ti_obj['results']['ts_id']=0;
}
else {
	$ms_ti_ti_obj['results']['cs_id']=0;
}

// ^^^ Get publish date
v1_get_pubdate($ms_ti_ti_obj);

// vvv Set publish date
$data_time=array($ms_ti_ti_stime, $ms_ti_ti_etime);
v1_set_pubdate($data_time, $current_time, $ms_ti_ti_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_ti_ti_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_ti_ti_name, $ms_ti_ti_key, $code, $ms_ti_ti_stime, $ms_ti_ti_etime, $final_owners, $dupli_error)) {
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
$data['ts_id']=$ms_ti_ti_obj['results']['ts_id'];
$data['cs_id']=$ms_ti_ti_obj['results']['cs_id'];
$data['owners']=$final_owners;
$data['stime']=$ms_ti_ti_stime;
$data['etime']=$ms_ti_ti_etime;
v1_record_obj($ms_ti_ti_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_ti_ti_name, $ms_ti_ti_key, $code, $ms_ti_ti_stime, $ms_ti_ti_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_ti_ti_key])) {
	$data_list[$ms_ti_ti_key]=array();
	$data_list[$ms_ti_ti_key]['name']="Thermal instrument";
	$data_list[$ms_ti_ti_key]['number']=0;
	$data_list[$ms_ti_ti_key]['sets']=array();
}
$data_list[$ms_ti_ti_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_stations2);
array_shift($gen_stations3);   
array_shift($gen_pubdates);

?>