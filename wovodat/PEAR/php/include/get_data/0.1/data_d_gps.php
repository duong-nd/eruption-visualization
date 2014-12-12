<?php

// Increment data count
if (!isset($data_list['dd_gps'])) {
	$data_list['dd_gps']=array();
	$data_list['dd_gps']['name']="GPS data";
	$data_list['dd_gps']['number']=0;
	$data_list['dd_gps']['sets']=array();
}
$data_list['dd_gps']['number']++;

?>