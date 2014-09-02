<?php

// vvv Set variables
$ms_ds_ds_key="ds";
$ms_ds_ds_name="DeformationStation";

$pr_table="cn";
$pr_code=$network_code;

// ^^^ Get code
$code=xml_get_att($ms_ds_ds_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ds_ds_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($ms_ds_ds_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ds_ds_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get times
$ms_ds_ds_stime=xml_get_ele($ms_ds_ds_obj, "STARTTIME");
$ms_ds_ds_etime=xml_get_ele($ms_ds_ds_obj, "ENDTIME");

// ### Check time order
if (!empty($ms_ds_ds_stime) && !empty($ms_ds_ds_etime)) {
	if (strcmp($ms_ds_ds_stime, $ms_ds_ds_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$ms_ds_ds_name." code=\"".$code."\"&gt;, start time (".$ms_ds_ds_stime.") should be earlier than end time (".$ms_ds_ds_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get network
v1_get_ms($ms_ds_ds_obj, "NETWORK", $gen_networks);

// vvv Set network
if (!v1_set_ms($ms_ds_ds_obj, $ms_ds_ds_name, $code, $ms_ds_ds_stime, $ms_ds_ds_etime, "deformation network", "cn", "dn", NULL, NULL, $gen_networks, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: network
if (empty($ms_ds_ds_obj['results']['cn_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$ms_ds_ds_name." code=\"".$code."\"&gt; is missing information: please specify network";
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ms_ds_ds_obj);

// vvv Set publish date
$data_time=array($ms_ds_ds_stime, $ms_ds_ds_etime);
v1_set_pubdate($data_time, $current_time, $ms_ds_ds_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$ms_ds_ds_obj['results']['owners'];
if (!v1_check_dupli_timeframe2($ms_ds_ds_name, $ms_ds_ds_key, $code, $ms_ds_ds_stime, $ms_ds_ds_etime, $final_owners, $pr_code, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// ^^^ Get ID (for underlying elements)
$ms_ds_ds_id=v1_get_id_ms("ds", $code, $ms_ds_ds_stime, $final_owners);
if ($ms_ds_ds_id==NULL) {
	// Get XML ID
	$ms_ds_ds_id="@".$xml_id_cnt;
}

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['stime']=$ms_ds_ds_stime;
$data['etime']=$ms_ds_ds_etime;
$data['parentcode']=$pr_code;
$data['gparentcode']="ms";
v1_record_obj($ms_ds_ds_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
if (!v1_check_db_timeframe2($ms_ds_ds_name, $ms_ds_ds_key, $code, $ms_ds_ds_stime, $ms_ds_ds_etime, $final_owners, $pr_table, $pr_code, $check_db_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=8;
	$errors[$l_errors]['message']=$check_db_error;
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_ds_ds_obj['value'] as &$ms_ds_ds_ele) {
	switch ($ms_ds_ds_ele['tag']) {
		case "DEFORMATIONINSTRUMENT":
			$ms_ds_ds_dig_obj=&$ms_ds_ds_ele;
			include "ms_ds_ds_dig.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "TILTSTRAININSTRUMENT":
			$ms_ds_ds_dit_obj=&$ms_ds_ds_ele;
			include "ms_ds_ds_dit.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$ms_ds_ds_key])) {
	$data_list[$ms_ds_ds_key]=array();
	$data_list[$ms_ds_ds_key]['name']="Deformation station";
	$data_list[$ms_ds_ds_key]['number']=0;
	$data_list[$ms_ds_ds_key]['sets']=array();
}
$data_list[$ms_ds_ds_key]['number']++;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>