<?php

// Increment data count
if (!isset($data_list['ts'])) {
	$data_list['ts']=array();
	$data_list['ts']['name']="Thermal station";
	$data_list['ts']['number']=0;
	$data_list['ts']['sets']=array();
}
$data_list['ts']['number']++;

// Loop on elements - Search for children
$thermalstation_elements=$wovoml_element['value'];
foreach ($thermalstation_elements as $thermalstation_element) {
	
	// Thermal instrument
	if ($thermalstation_element['tag']=="THERMALINSTRUMENT") {
		include $include_root."ms_tstation_tinstrument.php";
		continue;
	}
	
}

?>