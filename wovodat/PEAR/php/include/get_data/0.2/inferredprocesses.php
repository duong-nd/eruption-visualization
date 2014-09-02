<?php

// Loop on elements - Search for children
$inferredprocesses_elements=$wovoml_element['value'];
foreach ($inferredprocesses_elements as $inferredprocesses_element) {
	
	// Magma movement
	if ($inferredprocesses_element['tag']=="MAGMAMOVEMENT") {
		include $include_root."inferredprocesses_magmamovement.php";
		continue;
	}
	
	// Volatile saturation
	if ($inferredprocesses_element['tag']=="VOLATILESAT") {
		include $include_root."inferredprocesses_volatilesat.php";
		continue;
	}
	
	// Magma pressure
	if ($inferredprocesses_element['tag']=="MAGMAPRESSURE") {
		include $include_root."inferredprocesses_magmapressure.php";
		continue;
	}
	
	// Hydrothermal
	if ($inferredprocesses_element['tag']=="HYDROTHERMAL") {
		include $include_root."inferredprocesses_hydrothermal.php";
		continue;
	}
	
	// Regional tectonics
	if ($inferredprocesses_element['tag']=="REGIONALTECTONICS") {
		include $include_root."inferredprocesses_regionaltectonics.php";
		continue;
	}
	
}

?>