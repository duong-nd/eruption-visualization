<?php

// Increment data count
if (!isset($data_list['hi'])) {
	$data_list['hi']=array();
	$data_list['hi']['name']="Hydrologic instrument";
	$data_list['hi']['number']=0;
	$data_list['hi']['sets']=array();
}
$data_list['hi']['number']++;

?>