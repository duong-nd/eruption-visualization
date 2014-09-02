<?php

// vvv Set variables
$ms_fn_key="fn";
$ms_fn_name="FieldsNetwork";

// ^^^ Get code
$code=xml_get_att($ms_fn_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_fn_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_fn_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_fn_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_fn_stime=xml_get_ele($ms_fn_obj, "STARTTIME");
$ms_fn_etime=xml_get_ele($ms_fn_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_fn_stime) && !empty($ms_fn_etime)) {
	if (strcmp($ms_fn_stime, $ms_fn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fn_name." code=\"".$code."\"&gt;, start time (".$ms_fn_stime.") should be earlier than end time (".$ms_fn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_fn_obj);

// vvv Set publish date
$data_time=array($ms_fn_stime, $ms_fn_etime);
v1_set_pubdate($data_time, $current_time, $ms_fn_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_fn_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_fn_name, $ms_fn_key, $code, $ms_fn_stime, $ms_fn_etime, $final_owners, $dupli_error)) {
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
$data['stime']=$ms_fn_stime;
$data['etime']=$ms_fn_etime;
v1_record_obj($ms_fn_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_cn($ms_fn_name, $ms_fn_key, $code, $ms_fn_stime, $ms_fn_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_fn_obj['value'] as &$ms_fn_ele) {
	switch ($ms_fn_ele['tag']) {
		case "VOLCANOES":
			$ms_fn_vd_obj=&$ms_fn_ele;
			include "ms_fn_vd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "FIELDSSTATION":
			$ms_fn_fs_obj=&$ms_fn_ele;
			include "ms_fn_fs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_fn_key])) {
	$data_list[$ms_fn_key]=array();
	$data_list[$ms_fn_key]['name']="Fields network";
	$data_list[$ms_fn_key]['number']=0;
	$data_list[$ms_fn_key]['sets']=array();
}
$data_list[$ms_fn_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>