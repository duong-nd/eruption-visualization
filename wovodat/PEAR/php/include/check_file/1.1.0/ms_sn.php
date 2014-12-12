<?php

// vvv Set variables
$ms_sn_key="sn";
$ms_sn_name="SeismicNetwork";

// ^^^ Get code
$code=xml_get_att($ms_sn_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_sn_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_sn_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_sn_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_sn_stime=xml_get_ele($ms_sn_obj, "STARTTIME");
$ms_sn_etime=xml_get_ele($ms_sn_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_sn_stime) && !empty($ms_sn_etime)) {
	if (strcmp($ms_sn_stime, $ms_sn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_sn_name." code=\"".$code."\"&gt;, start time (".$ms_sn_stime.") should be earlier than end time (".$ms_sn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_sn_obj);

// vvv Set publish date
$data_time=array($ms_sn_stime, $ms_sn_etime);
v1_set_pubdate($data_time, $current_time, $ms_sn_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_sn_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_sn_name, $ms_sn_key, $code, $ms_sn_stime, $ms_sn_etime, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_sn_id=v1_get_id_ms("sn", $code, $ms_sn_stime, $final_owners);
if ($ms_sn_id==NULL) {
	// Get XML ID
	$ms_sn_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_sn_stime;
$data['etime']=$ms_sn_etime;
v1_record_obj($ms_sn_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe($ms_sn_name, $ms_sn_key, $code, $ms_sn_stime, $ms_sn_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_sn_obj['value'] as &$ms_sn_ele) {
	switch ($ms_sn_ele['tag']) {
		case "VOLCANOES":
			$ms_sn_vd_obj=&$ms_sn_ele;
			include "ms_sn_vd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "SEISMICSTATION":
			$ms_sn_ss_obj=&$ms_sn_ele;
			include "ms_sn_ss.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_sn_key])) {
	$data_list[$ms_sn_key]=array();
	$data_list[$ms_sn_key]['name']="Seismic network";
	$data_list[$ms_sn_key]['number']=0;
	$data_list[$ms_sn_key]['sets']=array();
}
$data_list[$ms_sn_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>