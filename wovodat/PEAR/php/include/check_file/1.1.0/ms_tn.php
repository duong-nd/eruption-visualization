<?php

// vvv Set variables
$ms_tn_key="tn";
$ms_tn_name="ThermalNetwork";

// ^^^ Get code  ---- getting the code of a record/object.. in this case is the network code.
$code=xml_get_att($ms_tn_obj, "CODE");
$cn_code=$code;
$pr_code="ms";
$gpr_code="wovoml";

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_tn_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_tn_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_tn_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_tn_stime=xml_get_ele($ms_tn_obj, "STARTTIME");
$ms_tn_etime=xml_get_ele($ms_tn_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_tn_stime) && !empty($ms_tn_etime)) {
	if (strcmp($ms_tn_stime, $ms_tn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_tn_name." code=\"".$code."\"&gt;, start time (".$ms_tn_stime.") should be earlier than end time (".$ms_tn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_tn_obj);

// vvv Set publish date
$data_time=array($ms_tn_stime, $ms_tn_etime);
v1_set_pubdate($data_time, $current_time, $ms_tn_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_tn_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_tn_name, $ms_tn_key, $code, $ms_tn_stime, $ms_tn_etime, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_cn($ms_tn_name, $ms_tn_key, $code, $ms_tn_stime, $ms_tn_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_tn_obj['value'] as &$ms_tn_ele) {
	switch ($ms_tn_ele['tag']) {
		case "VOLCANOES":
			$ms_tn_vd_obj=&$ms_tn_ele;
			include "ms_tn_vd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			// -- RECORD OBJECT --
			// vvv Record object
			global $xml_id_cnt;
			$ms_tn_id="@".$xml_id_cnt;
			$data=array();
			$data['owners']=$final_owners;
			$data['stime']=$ms_tn_stime;
			$data['etime']=$ms_tn_etime;
			$data['parentcode']="ms";
			$data['gparentcode']="wovoml";
			$data['vd_ids']=$ms_tn_obj['results']['vd_ids'];
			v1_record_obj($ms_tn_key, $code, $data);
			break;
			
		case "THERMALSTATION":
			$ms_tn_ts_obj=&$ms_tn_ele;
			include "ms_tn_ts.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_tn_key])) {
	$data_list[$ms_tn_key]=array();
	$data_list[$ms_tn_key]['name']="Thermal network";
	$data_list[$ms_tn_key]['number']=0;
	$data_list[$ms_tn_key]['sets']=array();
}
$data_list[$ms_tn_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>