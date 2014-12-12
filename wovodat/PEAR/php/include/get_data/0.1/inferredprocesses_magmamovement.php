<?php

// Increment data count
if (!isset($data_list['ip_mag'])) {
	$data_list['ip_mag']=array();
	$data_list['ip_mag']['name']="Magma movement";
	$data_list['ip_mag']['number']=0;
	$data_list['ip_mag']['sets']=array();
}
$data_list['ip_mag']['number']++;

?>