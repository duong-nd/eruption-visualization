<?php

// Increment data count
if (!isset($data_list['hd_dly'])) {
	$data_list['hd_dly']=array();
	$data_list['hd_dly']['name']="Daily";
	$data_list['hd_dly']['number']=0;
	$data_list['hd_dly']['sets']=array();
}
$data_list['hd_dly']['number']++;

?>