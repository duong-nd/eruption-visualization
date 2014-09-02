<?php
// vvv Set variables
$da_sd_wav_wav_key="sd_wav";
$da_sd_wav_wav_name="Waveform";

// ^^^ Get code
$code=xml_get_att($da_sd_wav_wav_obj, "CODE");

// -- CHECK DATA --
// ^^^ Get owners
if (!v1_get_owners($da_sd_wav_wav_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}


// vvv Set owners
if (!v1_set_owners($da_sd_wav_wav_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_wav_wav_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}


// ^^^ Get network event
v1_get_data($da_sd_wav_wav_obj, "NETWORKEVENT", $gen_data);

// vvv Set network event
if (!v1_set_data($da_sd_wav_wav_obj, $da_sd_wav_wav_name, "sd_evn", $gen_data, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}



// ^^^ Get single station event
v1_get_data($da_sd_wav_wav_obj, "SINGLESTATIONEVENT", $gen_data2);

// vvv Set single station event
if (!v1_set_data($da_sd_wav_wav_obj, $da_sd_wav_wav_name, "sd_evs", $gen_data2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}


// ^^^ Get Tremor id
v1_get_data($da_sd_wav_wav_obj, "TREMOR", $gen_data3);

// vvv Set Tremor id
if (!v1_set_data($da_sd_wav_wav_obj, $da_sd_wav_wav_name, "sd_trm", $gen_data3, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}




// ^^^ Get station
v1_get_ms($da_sd_wav_wav_obj, "STATION", $gen_stations);


// Get station statrt time and etime by checking ss_name
$station_time=v1_get_code($gen_stations);   



// vvv Set station
if (!v1_set_ms_data($da_sd_wav_wav_obj, $da_sd_wav_wav_name, $code, $station_time[0], $station_time[1],"seismic station", "ss", "ss_id", "ss", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}



// ### Check necessary information: network event or single station event or Tremor
if (empty($da_sd_wav_wav_obj['results']['sd_evn_id']) && empty($da_sd_wav_wav_obj['results']['sd_evs_id']) && empty($da_sd_wav_wav_obj['results']['sd_trm_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_wav_wav_name." code=\"".$code."\"&gt; is missing information: please specify network event or single station event or Tremor";
	$l_errors++;
	return FALSE;
}


// ^^^ Get publish date
v1_get_pubdate($da_sd_wav_wav_obj);

v1_set_pubdate('', $current_time, $da_sd_wav_wav_obj);



// ### Check duplication
$final_owners=$da_sd_wav_wav_obj['results']['owners'];
if (!v1_check_dupli_simple($da_sd_wav_wav_name, $da_sd_wav_wav_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_sd_wav_wav_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_sd_wav_wav_name, $da_sd_wav_wav_key, $code, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_wav_wav_key])) {
	$data_list[$da_sd_wav_wav_key]=array();
	$data_list[$da_sd_wav_wav_key]['name']="Waveform";
	$data_list[$da_sd_wav_wav_key]['number']=0;
	$data_list[$da_sd_wav_wav_key]['sets']=array();
}
$data_list[$da_sd_wav_wav_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_data);
array_shift($gen_data2);
array_shift($gen_data3);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>