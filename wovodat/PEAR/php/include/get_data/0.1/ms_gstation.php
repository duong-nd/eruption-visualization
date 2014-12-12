<?php

// Increment data count
if (!isset($data_list['gs'])) {
	$data_list['gs']=array();
	$data_list['gs']['name']="Gas station";
	$data_list['gs']['number']=0;
	$data_list['gs']['sets']=array();
}
$data_list['gs']['number']++;

// Loop on elements - Search for children
$gasstation_elements=$wovoml_element['value'];
foreach ($gasstation_elements as $gasstation_element) {
	
	// Gas instrument
	if ($gasstation_element['tag']=="GASINSTRUMENT") {
		include $include_root."ms_gstation_ginstrument.php";
		continue;
	}
	
}

?>