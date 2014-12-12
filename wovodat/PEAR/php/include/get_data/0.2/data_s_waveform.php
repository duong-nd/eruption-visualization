<?php

// Increment data count
if (!isset($data_list['sd_wav'])) {
	$data_list['sd_wav']=array();
	$data_list['sd_wav']['name']="Waveform";
	$data_list['sd_wav']['number']=0;
	$data_list['sd_wav']['sets']=array();
}
$data_list['sd_wav']['number']++;

?>