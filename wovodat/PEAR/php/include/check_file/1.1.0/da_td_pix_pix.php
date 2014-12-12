<?php

// vvv Set variables
$da_td_pix_pix_key="td_pix";
$da_td_pix_pix_name="ThermalPixel";

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_td_pix_pix_key])) {
	$data_list[$da_td_pix_pix_key]=array();
	$data_list[$da_td_pix_pix_key]['name']="Thermal pixels";
	$data_list[$da_td_pix_pix_key]['number']=0;
	$data_list[$da_td_pix_pix_key]['sets']=array();
}
$data_list[$da_td_pix_pix_key]['number']++;

?>