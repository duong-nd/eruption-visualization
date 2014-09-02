<?php

// Increment data count
if (!isset($data_list['td_img'])) {
	$data_list['td_img']=array();
	$data_list['td_img']['name']="Thermal image";
	$data_list['td_img']['number']=0;
	$data_list['td_img']['sets']=array();
}
$data_list['td_img']['number']++;

?>