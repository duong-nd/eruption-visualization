<?php

// Increment data count
if (!isset($data_list['fd_mag'])) {
	$data_list['fd_mag']=array();
	$data_list['fd_mag']['name']="Magnetic fields";
	$data_list['fd_mag']['number']=0;
	$data_list['fd_mag']['sets']=array();
}
$data_list['fd_mag']['number']++;

?>