<?php

// vvv Set variables
$ms_mn_key="mn";
$ms_mn_name="MeteoNetwork";

// ^^^ Get code  ---- getting the code of a record/object.. in this case is the network code.
$code=xml_get_att($ms_mn_obj, "CODE");
$cn_code=$code;
$pr_code="ms";
$gpr_code="wovoml";


// -- CHECK DATA --

// ^^^ Get owners  ---- create a list of general owners
if (!v1_get_owners($ms_mn_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners  ---------- create $ms_mn_obj['result']['owners']--- list of owners, a copy from $gen_owners
if (!v1_set_owners($ms_mn_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_mn_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_mn_stime=xml_get_ele($ms_mn_obj, "STARTTIME");
$ms_mn_etime=xml_get_ele($ms_mn_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_mn_stime) && !empty($ms_mn_etime)) {
	if (strcmp($ms_mn_stime, $ms_mn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_mn_name." code=\"".$code."\"&gt;, start time (".$ms_mn_stime.") should be earlier than end time (".$ms_mn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_mn_obj);

// vvv Set publish date
$data_time=array($ms_mn_stime, $ms_mn_etime);
v1_set_pubdate($data_time, $current_time, $ms_mn_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_mn_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_mn_name, $ms_mn_key, $code, $ms_mn_stime, $ms_mn_etime, $final_owners, $dupli_error)) {
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
$data['stime']=$ms_mn_stime;
$data['etime']=$ms_mn_etime;
$data['parentcode']="ms";
$data['gparentcode']="wovoml";

v1_record_obj($ms_mn_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_cn($ms_mn_name, $ms_mn_key, $code, $ms_mn_stime, $ms_mn_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_mn_obj['value'] as &$ms_mn_ele) {
	switch ($ms_mn_ele['tag']) {
		case "VOLCANOES":
			$ms_mn_vd_obj=&$ms_mn_ele;
			include "ms_mn_vd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "METEOSTATION":
			$ms_mn_ms_obj=&$ms_mn_ele;
			include "ms_mn_ms.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_mn_key])) {
	$data_list[$ms_mn_key]=array();
	$data_list[$ms_mn_key]['name']="Meteo network";
	$data_list[$ms_mn_key]['number']=0;
	$data_list[$ms_mn_key]['sets']=array();
}
$data_list[$ms_mn_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>