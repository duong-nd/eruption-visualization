<?php

// Increment data count
if (!isset($data_list['ed_vid'])) {
	$data_list['ed_vid']=array();
	$data_list['ed_vid']['name']="Eruption videos";
	$data_list['ed_vid']['number']=0;
	$data_list['ed_vid']['sets']=array();
}
$data_list['ed_vid']['number']++;

?>