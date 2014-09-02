<?php

// Increment data count
if (!isset($data_list['cs'])) {
	$data_list['cs']=array();
	$data_list['cs']['name']="Airplane";
	$data_list['cs']['number']=0;
	$data_list['cs']['sets']=array();
}
$data_list['cs']['number']++;

// Loop on elements - Search for children
$airplane_elements=$monitoringsystem_element['value'];
foreach ($airplane_elements as $airplane_element) {
	
	// Gas instrument
	if ($airplane_element['tag']=="GASINSTRUMENT") {
		include $include_root."ms_airplane_ginstrument.php";
		continue;
	}
	
	// Thermal instrument
	if ($airplane_element['tag']=="THERMALINSTRUMENT") {
		include $include_root."ms_airplane_tinstrument.php";
		continue;
	}
	
}

?>