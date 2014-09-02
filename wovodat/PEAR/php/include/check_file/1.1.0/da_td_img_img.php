<?php

// vvv Set variables
$da_td_img_img_key="td_img";
$da_td_img_img_name="ThermalImage";

// ^^^ Get code
$code=xml_get_att($da_td_img_img_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_td_img_img_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_td_img_img_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_img_img_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($da_td_img_img_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($da_td_img_img_obj);

// ^^^ Get time
$da_td_img_img_time=xml_get_ele($da_td_img_img_obj, "TIME");

// ^^^ Get station
v1_get_ms($da_td_img_img_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_td_img_img_obj, $da_td_img_img_name, $code, $da_td_img_img_time, $da_td_img_img_time, "thermal station", "ts", "ts_id", "ts", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get airplane
v1_get_ms($da_td_img_img_obj, "AIRPLANE", $gen_stations2);


 
 // vvv Set airplane
if (!v1_set_ms_data($da_td_img_img_obj, $da_td_img_img_name, $code, $da_td_img_img_time, $da_td_img_img_time, "airplane", "cs", "cs_id_air", "cs", NULL, NULL, NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ^^^ Get satellite       Nang amended from $gen_stations2 to $gen_stations3   on 20-Mar-2012
v1_get_ms($da_td_img_img_obj, "SATELLITE", $gen_stations3);

// vvv Set satellite
if (!v1_set_ms_data($da_td_img_img_obj, $da_td_img_img_name, $code, $da_td_img_img_time, $da_td_img_img_time, "satellite", "cs", "cs_id_sat", "cs", NULL, NULL, NULL, NULL, $gen_stations3, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check station OR airplane OR satellite
if (!empty($da_td_img_img_obj['results']['cs_id_air']) && !empty($da_td_img_img_obj['results']['cs_id_sat']) && !empty($da_td_img_img_obj['results']['ts_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_img_img_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or airplane or satellite";
	$l_errors++;
	return FALSE;
}

// ### Check station OR airplane
if (!empty($da_td_img_img_obj['results']['cs_id_air']) && !empty($da_td_img_img_obj['results']['ts_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_img_img_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or airplane";
	$l_errors++;
	return FALSE;
}

// ### Check station OR satellite
if (!empty($da_td_img_img_obj['results']['cs_id_sat']) && !empty($da_td_img_img_obj['results']['ts_id'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_img_img_name." code=\"".$code."\"&gt; has inconsistent information: please specify only station or satellite";
	$l_errors++;
	return FALSE;
}

// ### Check airplane OR satellite
if (!empty($da_td_img_img_obj['results']['cs_id_air']) && !empty($da_td_img_img_obj['results']['cs_id_sat'])) {
	// Redundant information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_img_img_name." code=\"".$code."\"&gt; has inconsistent information: please specify only airplane or satellite";
	$l_errors++;
	return FALSE;
}

// vvv Set xs_id
if (!empty($da_td_img_img_obj['results']['cs_id_air'])) {
	$da_td_img_img_obj['results']['cs_id']=$da_td_img_img_obj['results']['cs_id_air'];
	$xs_id=$da_td_img_img_obj['results']['cs_id'];
	$xs_name="airplane";
	$xs_key="cs";
	$xs_target="cs_id";
}
elseif (!empty($da_td_img_img_obj['results']['cs_id_sat'])) {
	$da_td_img_img_obj['results']['cs_id']=$da_td_img_img_obj['results']['cs_id_sat'];
	$xs_id=$da_td_img_img_obj['results']['cs_id'];
	$xs_name="satellite";
	$xs_key="cs";
	$xs_target="cs_id";
}
else {
	$xs_id=$da_td_img_img_obj['results']['ts_id'];
	$xs_name="thermal station";
	$xs_key="ts";
	$xs_target="ts_id";
}

// ^^^ Get instrument
v1_get_ms($da_td_img_img_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_td_img_img_obj, $da_td_img_img_name, $code, $da_td_img_img_time, $da_td_img_img_time, "thermal instrument", "ti", "ti_id", "ti", $xs_name, $xs_key, $xs_target, $xs_id, $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station or airplane or satellite
if (empty($da_td_img_img_obj['results']['ts_id']) && empty($da_td_img_img_obj['results']['cs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_td_img_img_name." code=\"".$code."\"&gt; is missing information: please specify station or airplane or satellite";
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station OR (strict) volcano


if (empty($da_td_img_img_obj['results']['ts_id'])) {
	if (empty($da_td_img_img_obj['results']['vd_id'])) {
		// Missing information
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1;
		$errors[$l_errors]['message']="&lt;".$da_td_img_img_name." code=\"".$code."\"&gt; is missing information: please specify volcano";
		$l_errors++;
		return FALSE;
	}
}

// ### Check station and volcano
if (!empty($da_td_img_img_obj['results']['ts_id'])){// Nang Added on 20-Mar-2012.Otherwise sate/airplane cant proceed 
	if (!v1_check_station_volcano("t", $da_td_img_img_obj['results']['ts_id'], $code, $da_td_img_img_obj['results']['vd_id'])) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$da_td_img_img_name." code=\"".$code."\"&gt;, station and volcano do not match";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($da_td_img_img_obj);

// vvv Set publish date
$data_time=array($da_td_img_img_time);
v1_set_pubdate($data_time, $current_time, $da_td_img_img_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_td_img_img_obj['results']['owners'];
if (!v1_check_dupli_simple($da_td_img_img_name, $da_td_img_img_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_td_img_img_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_td_img_img_name, $da_td_img_img_key, $code, $final_owners);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_td_img_img_obj['value'] as &$da_td_img_img_ele) {
	switch ($da_td_img_img_ele['tag']) {
		case "THERMALPIXELS":
			$da_td_pix_obj=&$da_td_img_img_ele;
			include "da_td_pix.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_td_img_img_key])) {
	$data_list[$da_td_img_img_key]=array();
	$data_list[$da_td_img_img_key]['name']="Thermal images";
	$data_list[$da_td_img_img_key]['number']=0;
	$data_list[$da_td_img_img_key]['sets']=array();
}
$data_list[$da_td_img_img_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);  
array_shift($gen_stations2);
array_shift($gen_stations3);
?>