<?php

// Increment data count
if (!isset($data_list['cn_T'])) {
	$data_list['cn_T']=array();
	$data_list['cn_T']['name']="Thermal network";
	$data_list['cn_T']['number']=0;
	$data_list['cn_T']['sets']=array();
}
$data_list['cn_T']['number']++;

// Loop on elements - Search for children
$thermalnetwork_elements=$monitoringsystem_element['value'];
foreach ($thermalnetwork_elements as $thermalnetwork_element) {
	
	// Thermal station
	if ($thermalnetwork_element['tag']=="THERMALSTATION") {
		include $include_root."ms_tnetwork_tstation.php";
		continue;
	}
	
}

?>