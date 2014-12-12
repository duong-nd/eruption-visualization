<?php

// Increment data count
if (!isset($data_list['ss'])) {
	$data_list['ss']=array();
	$data_list['ss']['name']="Seismic station";
	$data_list['ss']['number']=0;
	$data_list['ss']['sets']=array();
}
$data_list['ss']['number']++;

// Loop on elements - Search for children
$seismicstation_elements=$monitoringsystem_element['value'];
foreach ($seismicstation_elements as $seismicstation_element) {
	
	// Seismic instrument
	if ($seismicstation_element['tag']=="SEISMICINSTRUMENT") {
		include $include_root."ms_sstation_sinstrument.php";
		continue;
	}
	
}

?>