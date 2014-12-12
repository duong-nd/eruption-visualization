<?php

// Increment data count
if (!isset($data_list['ds'])) {
	$data_list['ds']=array();
	$data_list['ds']['name']="Deformation station";
	$data_list['ds']['number']=0;
	$data_list['ds']['sets']=array();
}
$data_list['ds']['number']++;

// Loop on elements - Search for children
$deformationstation_elements=$deformationnetwork_element['value'];
foreach ($deformationstation_elements as $deformationstation_element) {
	
	// Deformation instrument
	if ($deformationstation_element['tag']=="DEFORMATIONINSTRUMENT") {
		include $include_root."ms_dnetwork_dstation_dinstrument.php";
		continue;
	}
	
	// Tilt/Strain instrument
	if ($deformationstation_element['tag']=="TILTSTRAININSTRUMENT") {
		include $include_root."ms_dnetwork_dstation_tsinstrument.php";
		continue;
	}
	
}

?>