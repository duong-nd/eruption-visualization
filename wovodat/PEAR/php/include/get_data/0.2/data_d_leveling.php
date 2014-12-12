<?php

// Increment data count
if (!isset($data_list['dd_lev'])) {
	$data_list['dd_lev']=array();
	$data_list['dd_lev']['name']="Leveling";
	$data_list['dd_lev']['number']=0;
	$data_list['dd_lev']['sets']=array();
}
$data_list['dd_lev']['number']++;

?>