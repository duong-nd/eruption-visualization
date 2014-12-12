<?php

// Loop on elements - Search for children
$fd_elements=$data_element['value'];
foreach ($fd_elements as $fd_element) {
	
	// Magnetic
	if ($fd_element['tag']=="MAGNETIC") {
		include $include_root."data_f_magnetic.php";
		continue;
	}
	
	// Magnetic vector
	if ($fd_element['tag']=="MAGNETICVECTOR") {
		include $include_root."data_f_magneticvector.php";
		continue;
	}
	
	// Electric
	if ($fd_element['tag']=="ELECTRIC") {
		include $include_root."data_f_electric.php";
		continue;
	}
	
	// Gravity
	if ($fd_element['tag']=="GRAVITY") {
		include $include_root."data_f_gravity.php";
		continue;
	}
	
}
?>