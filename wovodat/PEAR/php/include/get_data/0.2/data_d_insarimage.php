<?php

// Increment data count
if (!isset($data_list['dd_sar'])) {
	$data_list['dd_sar']=array();
	$data_list['dd_sar']['name']="InSAR image";
	$data_list['dd_sar']['number']=0;
	$data_list['dd_sar']['sets']=array();
}
$data_list['dd_sar']['number']++;

?>