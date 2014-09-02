<?php

// vvv Set variables
$ms_hs_hs_key="hs";
$ms_hs_hs_name="HydrologicStation";

// ^^^ Get code
$code=xml_get_att($ms_hs_hs_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_hs_hs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_hs_hs_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_hs_hs_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_hs_hs_stime=xml_get_ele($ms_hs_hs_obj, "STARTTIME");
$ms_hs_hs_etime=xml_get_ele($ms_hs_hs_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_hs_hs_stime) && !empty($ms_hs_hs_etime)) {
	if (strcmp($ms_hs_hs_stime, $ms_hs_hs_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_hs_hs_name." code=\"".$code."\"&gt;, start time (".$ms_hs_hs_stime.") should be earlier than end time (".$ms_hs_hs_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get network
v1_get_ms($ms_hs_hs_obj, "NETWORK", $gen_networks);

// vvv Set network
if (!v1_set_ms($ms_hs_hs_obj, $ms_hs_hs_name, $code, $ms_hs_hs_stime, $ms_hs_hs_etime, "hydrologic network", "cn", "hn", NULL, NULL, $gen_networks, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: network
if (empty($ms_hs_hs_obj['results']['cn_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_hs_hs_name." code=\"".$code."\"&gt; is missing information: please specify network";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_hs_hs_obj);

// vvv Set publish date
$data_time=array($ms_hs_hs_stime, $ms_hs_hs_etime);
v1_set_pubdate($data_time, $current_time, $ms_hs_hs_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_hs_hs_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_hs_hs_name, $ms_hs_hs_key, $code, $ms_hs_hs_stime, $ms_hs_hs_etime, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_hs_hs_id=v1_get_id_ms("hs", $code, $ms_hs_hs_stime, $final_owners);
if ($ms_hs_hs_id==NULL) {
	// Get XML ID
	$ms_hs_hs_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_hs_hs_stime;
$data['etime']=$ms_hs_hs_etime;
v1_record_obj($ms_hs_hs_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_hs_hs_name, $ms_hs_hs_key, $code, $ms_hs_hs_stime, $ms_hs_hs_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_hs_hs_obj['value'] as &$ms_hs_hs_ele) {
	switch ($ms_hs_hs_ele['tag']) {
		case "HYDROLOGICINSTRUMENT":
			$ms_hs_hs_hi_obj=&$ms_hs_hs_ele;
			include "ms_hs_hs_hi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_hs_hs_key])) {
	$data_list[$ms_hs_hs_key]=array();
	$data_list[$ms_hs_hs_key]['name']="Hydrologic station";
	$data_list[$ms_hs_hs_key]['number']=0;
	$data_list[$ms_hs_hs_key]['sets']=array();
}
$data_list[$ms_hs_hs_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>