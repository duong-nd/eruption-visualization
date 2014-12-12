<?php

// Increment data count
if (!isset($data_list['co'])) {
	$data_list['co']=array();
	$data_list['co']['name']="Observations";
	$data_list['co']['number']=0;
	$data_list['co']['sets']=array();
}
$data_list['co']['number']++;

?>