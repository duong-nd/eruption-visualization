<?php

// vvv Set variables
$ms_gs_gs_key="gs";
$ms_gs_gs_name="GasStation";

// ^^^ Get code
$code=xml_get_att($ms_gs_gs_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_gs_gs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_gs_gs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_gs_gs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_gs_gs_stime=xml_get_ele($ms_gs_gs_obj, "STARTTIME");
$ms_gs_gs_etime=xml_get_ele($ms_gs_gs_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_gs_gs_stime) && !empty($ms_gs_gs_etime)) {
	if (strcmp($ms_gs_gs_stime, $ms_gs_gs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_gs_gs_name." code=\"".$code."\"&gt;, start time (".$ms_gs_gs_stime.") should be earlier than end time (".$ms_gs_gs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get network
v1_get_ms($ms_gs_gs_obj, "NETWORK", $gen_networks);

// vvv Set network
if (!v1_set_ms($ms_gs_gs_obj, $ms_gs_gs_name, $code, $ms_gs_gs_stime, $ms_gs_gs_etime, "gas network", "cn", "gn", NULL, NULL, $gen_networks, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: network
if (empty($ms_gs_gs_obj['results']['cn_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_gs_gs_name." code=\"".$code."\"&gt; is missing information: please specify network";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_gs_gs_obj);

// vvv Set publish date
$data_time=array($ms_gs_gs_stime, $ms_gs_gs_etime);
v1_set_pubdate($data_time, $current_time, $ms_gs_gs_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_gs_gs_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_gs_gs_name, $ms_gs_gs_key, $code, $ms_gs_gs_stime, $ms_gs_gs_etime, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_gs_gs_id=v1_get_id_ms("gs", $code, $ms_gs_gs_stime, $final_owners);
if ($ms_gs_gs_id==NULL) {
	// Get XML ID
	$ms_gs_gs_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_gs_gs_stime;
$data['etime']=$ms_gs_gs_etime;
$data['cn_id']=$ms_gs_gs_obj['results']['cn_id'];
$data['cn_code']=xml_get_att($ms_gs_gs_obj, "NETWORK");
v1_record_obj($ms_gs_gs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_gs_gs_name, $ms_gs_gs_key, $code, $ms_gs_gs_stime, $ms_gs_gs_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_gs_gs_obj['value'] as &$ms_gs_gs_ele) {
	switch ($ms_gs_gs_ele['tag']) {
		case "GASINSTRUMENT":
			$ms_gs_gs_gi_obj=&$ms_gs_gs_ele;
			include "ms_gs_gs_gi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_gs_gs_key])) {
	$data_list[$ms_gs_gs_key]=array();
	$data_list[$ms_gs_gs_key]['name']="Gas station";
	$data_list[$ms_gs_gs_key]['number']=0;
	$data_list[$ms_gs_gs_key]['sets']=array();
}
$data_list[$ms_gs_gs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>