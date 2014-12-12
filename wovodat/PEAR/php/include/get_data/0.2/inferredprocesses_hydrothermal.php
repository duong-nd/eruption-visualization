<?php

// Increment data count
if (!isset($data_list['ip_hyd'])) {
	$data_list['ip_hyd']=array();
	$data_list['ip_hyd']['name']="Hydrothermal";
	$data_list['ip_hyd']['number']=0;
	$data_list['ip_hyd']['sets']=array();
}
$data_list['ip_hyd']['number']++;

?>