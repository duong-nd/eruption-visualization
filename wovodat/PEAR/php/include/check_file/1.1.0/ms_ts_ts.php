<?php

// vvv Set variables
$ms_ts_ts_key="ts";
$ms_ts_ts_name="ThermalStation";

// ^^^ Get code
$code=xml_get_att($ms_ts_ts_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ts_ts_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_ts_ts_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ts_ts_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_ts_ts_stime=xml_get_ele($ms_ts_ts_obj, "STARTTIME");
$ms_ts_ts_etime=xml_get_ele($ms_ts_ts_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_ts_ts_stime) && !empty($ms_ts_ts_etime)) {
	if (strcmp($ms_ts_ts_stime, $ms_ts_ts_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ts_ts_name." code=\"".$code."\"&gt;, start time (".$ms_ts_ts_stime.") should be earlier than end time (".$ms_ts_ts_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get network
v1_get_ms($ms_ts_ts_obj, "NETWORK", $gen_networks);

// vvv Set network
if (!v1_set_ms($ms_ts_ts_obj, $ms_ts_ts_name, $code, $ms_ts_ts_stime, $ms_ts_ts_etime, "thermal network", "cn", "tn", NULL, NULL, $gen_networks, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: network
if (empty($ms_ts_ts_obj['results']['cn_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ts_ts_name." code=\"".$code."\"&gt; is missing information: please specify network";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_ts_ts_obj);

// vvv Set publish date
$data_time=array($ms_ts_ts_stime, $ms_ts_ts_etime);
v1_set_pubdate($data_time, $current_time, $ms_ts_ts_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_ts_ts_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_ts_ts_name, $ms_ts_ts_key, $code, $ms_ts_ts_stime, $ms_ts_ts_etime, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_ts_ts_id=v1_get_id_ms("ts", $code, $ms_ts_ts_stime, $final_owners);
if ($ms_ts_ts_id==NULL) {
	// Get XML ID
	$ms_ts_ts_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_ts_ts_stime;
$data['etime']=$ms_ts_ts_etime;
$data['cn_id']=$ms_ts_ts_obj['results']['cn_id'];
$data['cn_code']=xml_get_att($ms_ts_ts_obj, "NETWORK");
v1_record_obj($ms_ts_ts_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_ts_ts_name, $ms_ts_ts_key, $code, $ms_ts_ts_stime, $ms_ts_ts_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_ts_ts_obj['value'] as &$ms_ts_ts_ele) {
	switch ($ms_ts_ts_ele['tag']) {
		case "THERMALINSTRUMENT":
			$ms_ts_ts_ti_obj=&$ms_ts_ts_ele;
			include "ms_ts_ts_ti.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_ts_ts_key])) {
	$data_list[$ms_ts_ts_key]=array();
	$data_list[$ms_ts_ts_key]['name']="Thermal station";
	$data_list[$ms_ts_ts_key]['number']=0;
	$data_list[$ms_ts_ts_key]['sets']=array();
}
$data_list[$ms_ts_ts_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>