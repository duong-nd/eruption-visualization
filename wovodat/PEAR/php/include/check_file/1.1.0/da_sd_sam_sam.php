<?php

// vvv Set variables
$da_sd_sam_sam_key="sd_sam";
$da_sd_sam_sam_name="RSAM-SSAM";

// ^^^ Get code
$code=xml_get_att($da_sd_sam_sam_obj, "CODE");

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_sam_sam_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// vvv Set owners
if (!v1_set_owners($da_sd_sam_sam_obj)) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_sam_sam_name." code=\"".$code."\"&gt; is missing information: please specify owner";
	$l_errors++;
	return FALSE;
}

// ^^^ Get time and values
$da_sd_sam_sam_stime=xml_get_ele($da_sd_sam_sam_obj, "STARTTIME");
$da_sd_sam_sam_etime=xml_get_ele($da_sd_sam_sam_obj, "ENDTIME");
$da_sd_sam_sam_cntivl=xml_get_ele($da_sd_sam_sam_obj, "CNTINTERVAL");
$da_sd_sam_sam_cntivl_unc=xml_get_ele($da_sd_sam_sam_obj, "CNTINTERVALUNC");

// ### Check value of count interval
if ($da_sd_sam_sam_cntivl<=0) {
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=2;
	$errors[$l_errors]['message']="In &lt;".$da_sd_sam_sam_name." code=\"".$code."\"&gt;, count interval should be strictly positive";
	$l_errors++;
	return FALSE;
}

// ### Check time order
if (!empty($da_sd_sam_sam_stime) && !empty($da_sd_sam_sam_etime)) {
	if (strcmp($da_sd_sam_sam_stime, $da_sd_sam_sam_etime)>0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="In &lt;".$da_sd_sam_sam_name." code=\"".$code."\"&gt;, start time (".$da_sd_sam_sam_stime.") should be earlier than end time (".$da_sd_sam_sam_etime.")";
		$l_errors++;
		return FALSE;
	}
}

// ^^^ Get station
v1_get_ms($da_sd_sam_sam_obj, "STATION", $gen_stations);

// vvv Set station
if (!v1_set_ms_data($da_sd_sam_sam_obj, $da_sd_sam_sam_name, $code, $da_sd_sam_sam_stime, $da_sd_sam_sam_stime, "seismic station", "ss", "ss_id", "ss", NULL, NULL, NULL, NULL, $gen_stations, $error)) {
	// Error
	array_push($errors, $error);
	$l_errors++;
	return FALSE;
}

// ### Check necessary information: station
if (empty($da_sd_sam_sam_obj['results']['ss_id'])) {
	// Missing information
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1;
	$errors[$l_errors]['message']="&lt;".$da_sd_sam_sam_name." code=\"".$code."\"&gt; is missing information: please specify station";
	$l_errors++;
	return FALSE;
}

// ### Check RSAM and SSAM
if (!v1_check_rsam_ssam($da_sd_sam_sam_obj, $da_sd_sam_sam_stime, $da_sd_sam_sam_stime_unc, $da_sd_sam_sam_etime, $da_sd_sam_sam_etime_unc, $da_sd_sam_sam_cntivl, $da_sd_sam_sam_cntivl_unc, $error)) {
	$error['message']="In &lt;".$da_sd_sam_sam_name." code=\"".$code."\"&gt;, ".$error['message'];
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_sd_sam_sam_obj);

// vvv Set publish date
$data_time=array($da_sd_sam_sam_stime, $da_sd_sam_sam_etime);
v1_set_pubdate($data_time, $current_time, $da_sd_sam_sam_obj);

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_sd_sam_sam_obj['results']['owners'];
if (!v1_check_dupli_simple($da_sd_sam_sam_name, $da_sd_sam_sam_key, $code, $final_owners, $dupli_error)) {
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
v1_record_obj($da_sd_sam_sam_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_simple($da_sd_sam_sam_name, $da_sd_sam_sam_key, $code, $final_owners);

// -- CHECK CHILDREN --

// Display variables
$rsam=array();
$ssam=array();

// ### Check children
foreach ($da_sd_sam_sam_obj['value'] as &$da_sd_sam_sam_ele) {
	switch ($da_sd_sam_sam_ele['tag']) {
		case "RSAM":
			$da_sd_rsm_obj=&$da_sd_sam_sam_ele;
			include "da_sd_rsm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "SSAM":
			$da_sd_ssm_obj=&$da_sd_sam_sam_ele;
			include "da_sd_ssm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_sam_sam_key])) {
	$data_list[$da_sd_sam_sam_key]=array();
	$data_list[$da_sd_sam_sam_key]['name']="RSAM-SSAM group";
	$data_list[$da_sd_sam_sam_key]['number']=0;
	$data_list[$da_sd_sam_sam_key]['sets']=array();
}
$data_list[$da_sd_sam_sam_key]['number']++;

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Get values to display
$cnt_interval=$da_sd_sam_sam_cntivl;
$start_time=$da_sd_sam_sam_stime;
$end_time=$da_sd_sam_sam_etime;

// Get station code
foreach ($gen_stations as $gen_code) {
	if (empty($gen_code)) {
		continue;
	}
	$station_code=$gen_code;
	break;
}

// Create set
$cnt_set=count($data_list['sd_sam']['sets']);
$data_list['sd_sam']['sets'][$cnt_set]=array();

// Keys
$data_list['sd_sam']['sets'][$cnt_set]['keys']=array();
$data_list['sd_sam']['sets'][$cnt_set]['keys'][0]=$station_code;
$data_list['sd_sam']['sets'][$cnt_set]['keys'][1]=$start_time;
$data_list['sd_sam']['sets'][$cnt_set]['keys'][2]=$end_time;

// Values
$data_list['sd_sam']['sets'][$cnt_set]['values']=array();
$data_list['sd_sam']['sets'][$cnt_set]['values']['rsam']=$rsam;
$data_list['sd_sam']['sets'][$cnt_set]['values']['ssam']=$ssam;

// Min and max
$data_list['sd_sam']['sets'][$cnt_set]['min']=$start_time;
if (!datetime_substract_seconds($end_time, $cnt_interval, $max_time, $local_error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1380;
	$_SESSION['errors'][0]['message']="Error when substracting seconds to get max_time: end_time=".$end_time.", cnt_interval=".$cnt_interval." [check_file/1.1.0/da_sd_sam_sam.php]";
	$_SESSION['l_errors']=1;
	
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}
$data_list['sd_sam']['sets'][$cnt_set]['max']=$max_time;

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>