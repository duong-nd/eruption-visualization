<?php

// Loop on elements - Search for children
$data_elements=$wovoml_element['value'];
foreach ($data_elements as $data_element) {
	
	// Deformation
	if ($data_element['tag']=="DEFORMATION") {
		include $include_root."data_deformation.php";
		continue;
	}
	
	// Gas
	if ($data_element['tag']=="GAS") {
		include $include_root."data_gas.php";
		continue;
	}
	
	// Hydrologic
	if ($data_element['tag']=="HYDROLOGIC") {
		include $include_root."data_hydrologic.php";
		continue;
	}
	
	// Fields
	if ($data_element['tag']=="FIELDS") {
		include $include_root."data_fields.php";
		continue;
	}
	
	// Thermal
	if ($data_element['tag']=="THERMAL") {
		include $include_root."data_thermal.php";
		continue;
	}
	
	// Seismic
	if ($data_element['tag']=="SEISMIC") {
		include $include_root."data_seismic.php";
		continue;
	}
	
}
?>