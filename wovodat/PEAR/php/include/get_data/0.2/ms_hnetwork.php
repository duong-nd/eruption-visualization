<?php

// Increment data count
if (!isset($data_list['cn_H'])) {
	$data_list['cn_H']=array();
	$data_list['cn_H']['name']="Hydrologic network";
	$data_list['cn_H']['number']=0;
	$data_list['cn_H']['sets']=array();
}
$data_list['cn_H']['number']++;

// Loop on elements - Search for children
$hydrologicnetwork_elements=$monitoringsystem_element['value'];
foreach ($hydrologicnetwork_elements as $hydrologicnetwork_element) {
	
	// Hydrologic station
	if ($hydrologicnetwork_element['tag']=="HYDROLOGICSTATION") {
		include $include_root."ms_hnetwork_hstation.php";
		continue;
	}
	
}

?>