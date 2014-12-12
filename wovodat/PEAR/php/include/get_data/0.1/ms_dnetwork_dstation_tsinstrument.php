<?php

// Increment data count
if (!isset($data_list['di_tlt'])) {
	$data_list['di_tlt']=array();
	$data_list['di_tlt']['name']="Tilt/Strain instrument";
	$data_list['di_tlt']['number']=0;
	$data_list['di_tlt']['sets']=array();
}
$data_list['di_tlt']['number']++;

?>