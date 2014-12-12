<?php

// Increment data count
if (!isset($data_list['sd_evn'])) {
	$data_list['sd_evn']=array();
	$data_list['sd_evn']['name']="Seismic network event";
	$data_list['sd_evn']['number']=0;
	$data_list['sd_evn']['sets']=array();
}
$data_list['sd_evn']['number']++;

?>