<?php

// vvv Set variables
$er_phs_phs_key="ed_phs";
$er_phs_phs_name="Phase";

// ^^^ Get code
$code=xml_get_att($er_phs_phs_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($er_phs_phs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($er_phs_phs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$er_phs_phs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$start_time_phs=xml_get_ele($er_phs_phs_obj, "STARTTIME");
$end_time_phs=xml_get_ele($er_phs_phs_obj, "ENDTIME");

// ### Check B.C. dates
if (substr($start_time_phs, 0, 1)=="-") {
	$start_time_phs_is_bc=TRUE;
}
else {
	$start_time_phs_is_bc=FALSE;
}
if (substr($end_time_phs, 0, 1)=="-") {
	$end_time_phs_is_bc=TRUE;
}
else {
	$end_time_phs_is_bc=FALSE;
}

// ### Check time order
if (!empty($start_time_phs) && !empty($end_time_phs)) {
	if ($start_time_phs_is_bc && $end_time_phs_is_bc) {
		if (strcmp($start_time_phs, $end_time_phs)<0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_phs_phs_name." code=\"".$code."\"&gt;, start time (".$start_time_phs.") should be earlier than end time (".$end_time_phs.")";
			$l_errors++;
			return FALSE;
		}
	}
	else {
		if (strcmp($start_time_phs, $end_time_phs)>0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_phs_phs_name." code=\"".$code."\"&gt;, start time (".$start_time_phs.") should be earlier than end time (".$end_time_phs.")";
			$l_errors++;
			return FALSE;
		}
	}
}

// ^^^ Get eruption
v1_get_eruption($er_phs_phs_obj);

// vvv Set eruption
if (!v1_set_eruption($er_phs_phs_obj, $er_phs_phs_name, $code, $start_time_phs, $start_time_phs_is_bc, $end_time_phs, $end_time_phs_is_bc, NULL, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary data: eruption
if (empty($er_phs_phs_obj['results']['ed_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$er_phs_phs_name." code=\"".$code."\"&gt; is missing information: please specify eruption";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($er_phs_phs_obj);

// vvv Set publish date
if ($start_time_phs_is_bc || $end_time_phs_is_bc) {
	$data_time=array("0000-00-00 00:00:00");
}
else {
	$data_time=array($start_time_phs, $end_time_phs);
}
v1_set_pubdate($data_time, $current_time, $er_phs_phs_obj);

// vvv Set BC dates
if ($start_time_phs_is_bc) {
	v1_set_bc_date($start_time_phs, "ed_phs_stime", "ed_phs_stime_bc", $er_phs_phs_obj);
}
else {
	$er_phs_phs_obj['results']['ed_phs_stime']=$start_time_phs;
	$er_phs_phs_obj['results']['ed_phs_stime_bc']=NULL;
}
if ($end_time_phs_is_bc) {
	v1_set_bc_date($end_time_phs, "ed_phs_etime", "ed_phs_etime_bc", $er_phs_phs_obj);
}
else {
	$er_phs_phs_obj['results']['ed_phs_etime']=$end_time_phs;
	$er_phs_phs_obj['results']['ed_phs_etime_bc']=NULL;
}

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$er_phs_phs_obj['results']['owners'];
if (!v1_check_dupli_simple($er_phs_phs_name, $er_phs_phs_key, $code, $final_owners, $dupli_error)) {
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
$data['ed_id']=$er_phs_phs_obj['results']['ed_id'];
$data['stime']=$start_time;
$data['stime_is_bc']=$start_time_is_bc;
$data['etime']=$end_time;
$data['etime_is_bc']=$end_time_is_bc;
v1_record_obj($er_phs_phs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($er_phs_phs_name, $er_phs_phs_key, $code, $final_owners);

// -- CHECK CHILDREN --

// ### Check children
foreach ($er_phs_phs_obj['value'] as &$er_phs_phs_ele) {
	switch ($er_phs_phs_ele['tag']) {
		case "VIDEO":
			$er_phs_phs_vid_obj=&$er_phs_phs_ele;
			include "er_phs_phs_vid.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "FORECAST":
			$er_phs_phs_for_obj=&$er_phs_phs_ele;
			include "er_phs_phs_for.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$er_phs_phs_key])) {
	$data_list[$er_phs_phs_key]=array();
	$data_list[$er_phs_phs_key]['name']="Eruption phase";
	$data_list[$er_phs_phs_key]['number']=0;
	$data_list[$er_phs_phs_key]['sets']=array();
}
$data_list[$er_phs_phs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_eruptions);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>