<?php

// vvv Set variables
$ms_dn_key="dn";
$ms_dn_name="DeformationNetwork";

// ^^^ Get code ---- getting the code of a record/object.. in this case is the network code.
$code=xml_get_att($ms_dn_obj, "CODE");
$cn_code=$code;


// -- CHECK DATA --

// ^^^ Get owners ---- create a list of general owners
if (!v1_get_owners($ms_dn_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners  ---------- create $ms_dn_obj['result']['owners']--- list of owners, a copy from $gen_owners
if (!v1_set_owners($ms_dn_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_dn_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_dn_stime=xml_get_ele($ms_dn_obj, "STARTTIME");
$ms_dn_etime=xml_get_ele($ms_dn_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_dn_stime) && !empty($ms_dn_etime)) {
	if (strcmp($ms_dn_stime, $ms_dn_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_dn_name." code=\"".$code."\"&gt;, start time (".$ms_dn_stime.") should be earlier than end time (".$ms_dn_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get publish date
v1_get_pubdate($ms_dn_obj);

// vvv Set publish date
$data_time=array($ms_dn_stime, $ms_dn_etime);
v1_set_pubdate($data_time, $current_time, $ms_dn_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_dn_obj['results']['owners'];
if (!v1_check_dupli_timeframe($ms_dn_name, $ms_dn_key, $code, $ms_dn_stime, $ms_dn_etime, $final_owners, $dupli_error)) {
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
$data['stime']=$ms_dn_stime;
$data['etime']=$ms_dn_etime;
$data['parentcode']="ms";
v1_record_obj($ms_dn_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_cn($ms_dn_name, $ms_dn_key, $code, $ms_dn_stime, $ms_dn_etime, $final_owners, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_dn_obj['value'] as &$ms_dn_ele) {
	switch ($ms_dn_ele['tag']) {
		case "VOLCANOES":
			$ms_dn_vd_obj=&$ms_dn_ele;
			include "ms_dn_vd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "DEFORMATIONSTATION":
			$ms_dn_ds_obj=&$ms_dn_ele;
			include "ms_dn_ds.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_dn_key])) {
	$data_list[$ms_dn_key]=array();
	$data_list[$ms_dn_key]['name']="Deformation network";
	$data_list[$ms_dn_key]['number']=0;
	$data_list[$ms_dn_key]['sets']=array();
}
$data_list[$ms_dn_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>