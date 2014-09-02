<?php

// vvv Set variables
$da_sd_rsm_rsm_key="sd_rsm";
$da_sd_rsm_rsm_name="RSAMData";

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_rsm_rsm_key])) {
	$data_list[$da_sd_rsm_rsm_key]=array();
	$data_list[$da_sd_rsm_rsm_key]['name']="RSAM data";
	$data_list[$da_sd_rsm_rsm_key]['number']=0;
	$data_list[$da_sd_rsm_rsm_key]['sets']=array();
}
$data_list[$da_sd_rsm_rsm_key]['number']++;

// Get values to display
$cnt=xml_get_ele($da_sd_rsm_rsm_obj, "CNT");
$temp_time=xml_get_ele($da_sd_rsm_rsm_obj, "STARTTIME");
$meas_time=NULL;
if (!datetime_round_hour($temp_time, $meas_time, $local_error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1380;
	$_SESSION['errors'][0]['message']="Error when rounding data to hour: ".$temp_time."[check_file/1.1.0/da_sd_rsm_rsm.php]";
	$_SESSION['l_errors']=1;
	
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}

// Store count and time into array
$rsam[$meas_time]=$cnt;

?>