<?php

// Increment data count
if (!isset($data_list['ed_for'])) {
	$data_list['ed_for']=array();
	$data_list['ed_for']['name']="Eruption forecasts";
	$data_list['ed_for']['number']=0;
	$data_list['ed_for']['sets']=array();
}
$data_list['ed_for']['number']++;

?>