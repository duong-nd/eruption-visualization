<?php

// Increment data count
if (!isset($data_list['hs'])) {
	$data_list['hs']=array();
	$data_list['hs']['name']="Hydrologic station";
	$data_list['hs']['number']=0;
	$data_list['hs']['sets']=array();
}
$data_list['hs']['number']++;

// Loop on elements - Search for children
$hydrologicstation_elements=$hydrologicnetwork_element['value'];
foreach ($hydrologicstation_elements as $hydrologicstation_element) {
	
	// Hydrologic instrument
	if ($hydrologicstation_element['tag']=="HYDROLOGICINSTRUMENT") {
		include $include_root."ms_hnetwork_hstation_hinstrument.php";
		continue;
	}
	
}

?>