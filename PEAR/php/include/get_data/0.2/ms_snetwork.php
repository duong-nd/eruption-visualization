<?php

// Increment data count
if (!isset($data_list['sn'])) {
	$data_list['sn']=array();
	$data_list['sn']['name']="Seismic network";
	$data_list['sn']['number']=0;
	$data_list['sn']['sets']=array();
}
$data_list['sn']['number']++;

// Loop on elements - Search for children
$seismicnetwork_elements=$monitoringsystem_element['value'];
foreach ($seismicnetwork_elements as $seismicnetwork_element) {
	
	// Seismic station
	if ($seismicnetwork_element['tag']=="SEISMICSTATION") {
		include $include_root."ms_snetwork_sstation.php";
		continue;
	}
	
}

?>