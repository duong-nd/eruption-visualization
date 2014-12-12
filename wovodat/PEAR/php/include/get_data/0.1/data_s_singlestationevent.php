<?php

// Increment data count
if (!isset($data_list['sd_evs'])) {
	$data_list['sd_evs']=array();
	$data_list['sd_evs']['name']="Seismic event from a single station";
	$data_list['sd_evs']['number']=0;
	$data_list['sd_evs']['sets']=array();
}
$data_list['sd_evs']['number']++;

?>