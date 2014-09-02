<?php

// vvv Set variables
$ms_fs_fs_key="fs";
$ms_fs_fs_name="FieldsStation";

// ^^^ Get code
$code=xml_get_att($ms_fs_fs_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_fs_fs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_fs_fs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_fs_fs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_fs_fs_stime=xml_get_ele($ms_fs_fs_obj, "STARTTIME");
$ms_fs_fs_etime=xml_get_ele($ms_fs_fs_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_fs_fs_stime) && !empty($ms_fs_fs_etime)) {
	if (strcmp($ms_fs_fs_stime, $ms_fs_fs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_fs_fs_name." code=\"".$code."\"&gt;, start time (".$ms_fs_fs_stime.") should be earlier than end time (".$ms_fs_fs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get network
v1_get_ms($ms_fs_fs_obj, "NETWORK", $gen_networks);

// vvv Set network
if (!v1_set_ms($ms_fs_fs_obj, $ms_fs_fs_name, $code, $ms_fs_fs_stime, $ms_fs_fs_etime, "fields network", "cn", "fn", NULL, NULL, $gen_networks, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: network
if (empty($ms_fs_fs_obj['results']['cn_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_fs_fs_name." code=\"".$code."\"&gt; is missing information: please specify network";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_fs_fs_obj);

// vvv Set publish date
$data_time=array($ms_fs_fs_stime, $ms_fs_fs_etime);
v1_set_pubdate($data_time, $current_time, $ms_fs_fs_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_fs_fs_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_fs_fs_name, $ms_fs_fs_key, $code, $ms_fs_fs_stime, $ms_fs_fs_etime, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_fs_fs_id=v1_get_id_ms("fs", $code, $ms_fs_fs_stime, $final_owners);
if ($ms_fs_fs_id==NULL) {
	// Get XML ID
	$ms_fs_fs_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_fs_fs_stime;
$data['etime']=$ms_fs_fs_etime;
v1_record_obj($ms_fs_fs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_fs_fs_name, $ms_fs_fs_key, $code, $ms_fs_fs_stime, $ms_fs_fs_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_fs_fs_obj['value'] as &$ms_fs_fs_ele) {
	switch ($ms_fs_fs_ele['tag']) {
		case "FIELDSINSTRUMENT":
			$ms_fs_fs_fi_obj=&$ms_fs_fs_ele;
			include "ms_fs_fs_fi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_fs_fs_key])) {
	$data_list[$ms_fs_fs_key]=array();
	$data_list[$ms_fs_fs_key]['name']="Fields station";
	$data_list[$ms_fs_fs_key]['number']=0;
	$data_list[$ms_fs_fs_key]['sets']=array();
}
$data_list[$ms_fs_fs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>