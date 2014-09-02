<?php

// Increment data count
if (!isset($data_list['sd_ivl'])) {
	$data_list['sd_ivl']=array();
	$data_list['sd_ivl']['name']="Interval";
	$data_list['sd_ivl']['number']=0;
	$data_list['sd_ivl']['sets']=array();
}
$data_list['sd_ivl']['number']++;

?>