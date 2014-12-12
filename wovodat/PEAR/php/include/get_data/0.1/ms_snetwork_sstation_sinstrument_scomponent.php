<?php

// Increment data count
if (!isset($data_list['si_cmp'])) {
	$data_list['si_cmp']=array();
	$data_list['si_cmp']['name']="Seismic component";
	$data_list['si_cmp']['number']=0;
	$data_list['si_cmp']['sets']=array();
}
$data_list['si_cmp']['number']++;

?>