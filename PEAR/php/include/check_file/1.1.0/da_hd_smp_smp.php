<?php

// vvv Set variables
$da_hd_smp_smp_key="hd";
$da_hd_smp_smp_name="HydrologicSample";

// ^^^ Get code
$code=xml_get_att($da_hd_smp_smp_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_hd_smp_smp_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_hd_smp_smp_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_hd_smp_smp_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time
$da_hd_smp_smp_time=xml_get_ele($da_hd_smp_smp_obj, "MEASTIME");

// ^^^ Get station
v1_get_ms($da_hd_smp_smp_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_hd_smp_smp_obj, $da_hd_smp_smp_name, $code, $da_hd_smp_smp_time, $da_hd_smp_smp_time, "hydrologic station", "hs", "hs_id", "hs", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_hd_smp_smp_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_hd_smp_smp_obj, $da_hd_smp_smp_name, $code, $da_hd_smp_smp_time, $da_hd_smp_smp_time, "hydrologic instrument", "hi", "hi_id", "hi", "hydrologic station", "hs", "hs_id", $da_hd_smp_smp_obj['results']['hs_id'], $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_hd_smp_smp_obj['results']['hs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_hd_smp_smp_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_hd_smp_smp_obj);

// vvv Set publish date
$data_time=array($da_hd_smp_smp_time);
v1_set_pubdate($data_time, $current_time, $da_hd_smp_smp_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_hd_smp_smp_obj['results']['owners'];
if (!v1_check_dupli_simple($da_hd_smp_smp_name, $da_hd_smp_smp_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_hd_smp_smp_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_hd_smp_smp_name, $da_hd_smp_smp_key, $code, $final_owners);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_hd_smp_smp_obj['value'] as &$da_hd_smp_smp_ele) {
	switch ($da_hd_smp_smp_ele['tag']) {
		case "HYDROLOGICSPECIES":
			$da_hd_smp_smp_spe_obj=&$da_hd_smp_smp_ele;
			include "da_hd_smp_smp_spe.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_hd_smp_smp_key])) {
	$data_list[$da_hd_smp_smp_key]=array();
	$data_list[$da_hd_smp_smp_key]['name']="Hydrologic samples";
	$data_list[$da_hd_smp_smp_key]['number']=0;
	$data_list[$da_hd_smp_smp_key]['sets']=array();
}
$data_list[$da_hd_smp_smp_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>