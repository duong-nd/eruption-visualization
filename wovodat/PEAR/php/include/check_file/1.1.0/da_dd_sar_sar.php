<?php

// vvv Set variables
$da_dd_sar_sar_key="dd_sar";
$da_dd_sar_sar_name="InSARImage";

// ^^^ Get code
$code=xml_get_att($da_dd_sar_sar_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_dd_sar_sar_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_dd_sar_sar_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($da_dd_sar_sar_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($da_dd_sar_sar_obj);

// ^^^ Get time
$da_dd_sar_sar_time1=xml_get_ele($da_dd_sar_sar_obj, "IMG1TIME");
$da_dd_sar_sar_time2=xml_get_ele($da_dd_sar_sar_obj, "IMG2TIME");

// ### Check time order
if (!empty($da_dd_sar_sar_time1) && !empty($da_dd_sar_sar_time2)) {
	if (strcmp($da_dd_sar_sar_time1, $da_dd_sar_sar_time2)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt;, time of image 1 (".$da_dd_sar_sar_time1.") should be earlier than time of image 2 (".$da_dd_sar_sar_time2.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get instrument
v1_get_ms($da_dd_sar_sar_obj, "INSTRUMENT", $gen_instruments);

// vvv Set instrument
if (!v1_set_ms_data($da_dd_sar_sar_obj, $da_dd_sar_sar_name, $code, $da_dd_sar_sar_time1, $da_dd_sar_sar_time1, "deformation instrument", "di_gen", "di_gen_id", "di_gen", NULL, NULL, NULL, NULL, $gen_instruments, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

 
v1_get_ms($da_dd_sar_sar_obj, "SATELLITE", $gen_stations2);

// vvv Set airplane
if (!v1_set_ms($da_dd_sar_sar_obj, $da_dd_sar_sar_name, $code, $da_dd_sar_sar_time1, $da_dd_sar_sar_time1, "satellite", "cs", "cs", NULL, NULL, $gen_stations2, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: instrument or satellite... 
if (empty($da_dd_sar_sar_obj['results']['di_gen_id']) && empty($da_dd_sar_sar_obj['results']['cs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt; is missing information: please specify instrument or satellite";
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: only instrument or satellite
if (!empty($da_dd_sar_sar_obj['results']['di_gen_id']) && !empty($da_dd_sar_sar_obj['results']['cs_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=2;
	$errors[$l_errors]['message']="&lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt; is inconsistent: please specify only instrument or satellite";
	$l_errors++;
	return FALSE;
}

// ### If no station, 0
if (empty($da_dd_sar_sar_obj['results']['di_gen_id'])) {
	$da_dd_sar_sar_obj['results']['di_gen_id']=0;
}
else {
	$da_dd_sar_sar_obj['results']['cs_id']=0;
}

// ^^^ Get publish date
v1_get_pubdate($da_dd_sar_sar_obj);

// vvv Set publish date
$data_time=array($da_dd_sar_sar_time1, $da_dd_sar_sar_time2);
v1_set_pubdate($data_time, $current_time, $da_dd_sar_sar_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_dd_sar_sar_obj['results']['owners'];
if (!v1_check_dupli_simple($da_dd_sar_sar_name, $da_dd_sar_sar_key, $code, $final_owners, $dupli_error)) {
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
$data['di_gen_id']=$da_dd_sar_sar_obj['results']['di_gen_id'];   
$data['cs_id']=$da_dd_sar_sar_obj['results']['cs_id'];           


v1_record_obj($da_dd_sar_sar_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_dd_sar_sar_name, $da_dd_sar_sar_key, $code, $final_owners);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_dd_sar_sar_obj['value'] as &$da_dd_sar_sar_ele) {
	switch ($da_dd_sar_sar_ele['tag']) {
		case "SATELLITES":
			$da_dd_sar_sar_sat_obj=&$da_dd_sar_sar_sat_ele;
			include "da_dd_sar_sar_sat.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "INSARPIXELS":
			$da_dd_srd_obj=&$da_dd_sar_sar_ele;
			include "da_dd_srd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_dd_sar_sar_key])) {
	$data_list[$da_dd_sar_sar_key]=array();
	$data_list[$da_dd_sar_sar_key]['name']="InSAR image";
	$data_list[$da_dd_sar_sar_key]['number']=0;
	$data_list[$da_dd_sar_sar_key]['sets']=array();
}
$data_list[$da_dd_sar_sar_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_vd_ids);
array_shift($gen_pubdates);
array_shift($gen_stations2);      
?>