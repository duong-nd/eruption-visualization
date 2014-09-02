<?php

// Increment data count
if (!isset($data_list['dd_gpv'])) {
	$data_list['dd_gpv']=array();
	$data_list['dd_gpv']['name']="GPS vector";
	$data_list['dd_gpv']['number']=0;
	$data_list['dd_gpv']['sets']=array();
}
$data_list['dd_gpv']['number']++;

?>