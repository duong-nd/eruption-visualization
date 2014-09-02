<?php

// Increment data count
if (!isset($data_list['gi'])) {
	$data_list['gi']=array();
	$data_list['gi']['name']="Gas instrument";
	$data_list['gi']['number']=0;
	$data_list['gi']['sets']=array();
}
$data_list['gi']['number']++;

?>