<?php

// Loop on elements - Search for children
$gd_elements=$data_element['value'];
foreach ($gd_elements as $gd_element) {
	
	// Directly sampled
	if ($gd_element['tag']=="DIRECTLYSAMPLED") {
		include $include_root."data_g_directlysampled.php";
		continue;
	}
	
	// Soil efflux
	if ($gd_element['tag']=="SOILEFFLUX") {
		include $include_root."data_g_soilefflux.php";
		continue;
	}
	
	// Plume
	if ($gd_element['tag']=="PLUME") {
		include $include_root."data_g_plume.php";
		continue;
	}
	
}
?>