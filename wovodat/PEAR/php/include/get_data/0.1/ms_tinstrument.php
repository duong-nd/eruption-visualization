<?php

// Increment data count
if (!isset($data_list['ti'])) {
	$data_list['ti']=array();
	$data_list['ti']['name']="Thermal instrument";
	$data_list['ti']['number']=0;
	$data_list['ti']['sets']=array();
}
$data_list['ti']['number']++;

?>