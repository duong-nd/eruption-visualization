<?php

// vvv Set variables
$er_ed_key="ed";
$er_ed_name="Eruption";

// ^^^ Get code
$code=xml_get_att($er_ed_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get volcano
if (!v1_get_vd_id($er_ed_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set volcano
v1_set_vd_id($er_ed_obj);

// ^^^ Get owners
if (!v1_get_owners($er_ed_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($er_ed_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$er_ed_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$start_time=xml_get_ele($er_ed_obj, "STARTTIME");
$climax_time=xml_get_ele($er_ed_obj, "CLIMAXTIME");
$end_time=xml_get_ele($er_ed_obj, "ENDTIME");

// ### Check B.C. dates
if (substr($start_time, 0, 1)=="-") {
	$start_time_is_bc=TRUE;
}
else {
	$start_time_is_bc=FALSE;
}
if (substr($climax_time, 0, 1)=="-") {
	$climax_time_is_bc=TRUE;
}
else {
	$climax_time_is_bc=FALSE;
}
if (substr($end_time, 0, 1)=="-") {
	$end_time_is_bc=TRUE;
}
else {
	$end_time_is_bc=FALSE;
}

// ### Check time order
if (!empty($start_time) && !empty($climax_time)) {
	if ($start_time_is_bc && $climax_time_is_bc) {
		if (strcmp($start_time, $climax_time)<0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_ed_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than climax time (".$climax_time.")";
			$l_errors++;
			return FALSE;
		}
	}
	else {
		if (strcmp($start_time, $climax_time)>0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_ed_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than climax time (".$climax_time.")";
			$l_errors++;
			return FALSE;
		}
	}
}

// ### Check time order
if (!empty($climax_time) && !empty($end_time)) {
	if ($climax_time_is_bc && $end_time_is_bc) {
		if (strcmp($climax_time, $end_time)<0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_ed_name." code=\"".$code."\"&gt;, climax time (".$climax_time.") should be earlier than end time (".$end_time.")";
			$l_errors++;
			return FALSE;
		}
	}
	else {
		if (strcmp($climax_time, $end_time)>0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_ed_name." code=\"".$code."\"&gt;, climax time (".$climax_time.") should be earlier than end time (".$end_time.")";
			$l_errors++;
			return FALSE;
		}
	}
}

// ### Check time order
if (!empty($start_time) && !empty($end_time)) {
	if ($start_time_is_bc && $end_time_is_bc) {
		if (strcmp($start_time, $end_time)<0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_ed_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than end time (".$end_time.")";
			$l_errors++;
			return FALSE;
		}
	}
	else {
		if (strcmp($start_time, $end_time)>0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="In &lt;".$er_ed_name." code=\"".$code."\"&gt;, start time (".$start_time.") should be earlier than end time (".$end_time.")";
			$l_errors++;
			return FALSE;
		}
	}
}

// ^^^ Get publish date
v1_get_pubdate($er_ed_obj);

// vvv Set publish date
if ($start_time_is_bc || $climax_time_is_bc || $end_time_is_bc) {
	$data_time=array("0000-00-00 00:00:00");
}
else {
	$data_time=array($start_time, $end_time, $climax_time);
}
v1_set_pubdate($data_time, $current_time, $er_ed_obj);

// vvv Set BC dates
if ($start_time_is_bc) {
	v1_set_bc_date($start_time, "ed_stime", "ed_stime_bc", $er_ed_obj);
}
else {
	$er_ed_obj['results']['ed_stime']=$start_time;
	$er_ed_obj['results']['ed_stime_bc']=NULL;
}
if ($climax_time_is_bc) {
	v1_set_bc_date($climax_time, "ed_climax", "ed_climax_bc", $er_ed_obj);
}
else {
	$er_ed_obj['results']['ed_climax']=$climax_time;
	$er_ed_obj['results']['ed_climax_bc']=NULL;
}
if ($end_time_is_bc) {
	v1_set_bc_date($end_time, "ed_etime", "ed_etime_bc", $er_ed_obj);
}
else {
	$er_ed_obj['results']['ed_etime']=$end_time;
	$er_ed_obj['results']['ed_etime_bc']=NULL;
}

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$er_ed_obj['results']['owners'];
if (!v1_check_dupli_simple($er_ed_name, $er_ed_key, $code, $final_owners, $dupli_error)) {
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
$data['vd_id']=$er_ed_obj['results']['vd_id'];
$data['stime']=$start_time;
$data['stime_is_bc']=$start_time_is_bc;
$data['etime']=$end_time;
$data['etime_is_bc']=$end_time_is_bc;
v1_record_obj($er_ed_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($er_ed_name, $er_ed_key, $code, $final_owners);

// -- CHECK CHILDREN --

// ### Check children
foreach ($er_ed_obj['value'] as &$er_ed_ele) {
	switch ($er_ed_ele['tag']) {
		case "VIDEO":
			$er_ed_vid_obj=&$er_ed_ele;
			include "er_ed_vid.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "PHASE":
			$er_ed_phs_obj=&$er_ed_ele;
			include "er_ed_phs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$er_ed_key])) {
	$data_list[$er_ed_key]=array();
	$data_list[$er_ed_key]['name']="Eruption";
	$data_list[$er_ed_key]['number']=0;
	$data_list[$er_ed_key]['sets']=array();
}
$data_list[$er_ed_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_vd_ids);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>