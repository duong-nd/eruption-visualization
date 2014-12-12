<?php

// Increment data count
if (!isset($data_list['di_gen'])) {
	$data_list['di_gen']=array();
	$data_list['di_gen']['name']="Deformation instrument";
	$data_list['di_gen']['number']=0;
	$data_list['di_gen']['sets']=array();
}
$data_list['di_gen']['number']++;

?>