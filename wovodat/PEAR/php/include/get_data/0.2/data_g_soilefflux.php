<?php

// Increment data count
if (!isset($data_list['gd_sol'])) {
	$data_list['gd_sol']=array();
	$data_list['gd_sol']['name']="Soil efflux";
	$data_list['gd_sol']['number']=0;
	$data_list['gd_sol']['sets']=array();
}
$data_list['gd_sol']['number']++;

?>