<?php

// Increment data count
if (!isset($data_list['si'])) {
	$data_list['si']=array();
	$data_list['si']['name']="Seismic instrument";
	$data_list['si']['number']=0;
	$data_list['si']['sets']=array();
}
$data_list['si']['number']++;

// Loop on elements - Search for children
$seismicinstrument_elements=$monitoringsystem_element['value'];
foreach ($seismicinstrument_elements as $seismicinstrument_element) {
	
	// Seismic component
	if ($seismicinstrument_element['tag']=="SEISMICCOMPONENT") {
		include $include_root."ms_sinstrument_scomponent.php";
		continue;
	}
	
}

?>