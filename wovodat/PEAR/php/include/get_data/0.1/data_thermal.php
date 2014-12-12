<?php

// Loop on elements - Search for children
$td_elements=$data_element['value'];
foreach ($td_elements as $td_element) {
	
	// Ground-based
	if ($td_element['tag']=="GROUND-BASED") {
		include $include_root."data_t_groundbased.php";
		continue;
	}
	
	// Thermal image
	if ($td_element['tag']=="THERMALIMAGE") {
		include $include_root."data_t_thermalimage.php";
		continue;
	}
	
}
?>