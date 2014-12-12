<?php

// vvv Set variables
$da_sd_ssm_ssm_key="sd_ssm";
$da_sd_ssm_ssm_name="SSAMData";

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_sd_ssm_ssm_key])) {
	$data_list[$da_sd_ssm_ssm_key]=array();
	$data_list[$da_sd_ssm_ssm_key]['name']="SSAM data";
	$data_list[$da_sd_ssm_ssm_key]['number']=0;
	$data_list[$da_sd_ssm_ssm_key]['sets']=array();
}
$data_list[$da_sd_ssm_ssm_key]['number']++;

?>