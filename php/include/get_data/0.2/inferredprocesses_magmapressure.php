<?php

// Increment data count
if (!isset($data_list['ip_pres'])) {
	$data_list['ip_pres']=array();
	$data_list['ip_pres']['name']="Magma pressure";
	$data_list['ip_pres']['number']=0;
	$data_list['ip_pres']['sets']=array();
}
$data_list['ip_pres']['number']++;

?>