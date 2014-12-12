<?php

// Increment data count
if (!isset($data_list['cn_D'])) {
	$data_list['cn_D']=array();
	$data_list['cn_D']['name']="Deformation network";
	$data_list['cn_D']['number']=0;
	$data_list['cn_D']['sets']=array();
}
$data_list['cn_D']['number']++;

// Loop on elements - Search for children
$deformationnetwork_elements=$monitoringsystem_element['value'];
foreach ($deformationnetwork_elements as $deformationnetwork_element) {
	
	// Deformation station
	if ($deformationnetwork_element['tag']=="DEFORMATIONSTATION") {
		include $include_root."ms_dnetwork_dstation.php";
		continue;
	}
	
}

?>