<?php

// Loop on elements - Search for children
$dd_elements=$data_element['value'];
foreach ($dd_elements as $dd_element) {
	
	// Electronic tilt
	if ($dd_element['tag']=="ELECTRONICTILT") {
		include $include_root."data_d_electronictilt.php";
		continue;
	}
	
	// Tilt vector
	if ($dd_element['tag']=="TILTVECTOR") {
		include $include_root."data_d_tiltvector.php";
		continue;
	}
	
	// Strain
	if ($dd_element['tag']=="STRAIN") {
		include $include_root."data_d_strain.php";
		continue;
	}
	
	// EDM
	if ($dd_element['tag']=="EDM") {
		include $include_root."data_d_edm.php";
		continue;
	}
	
	// Angle
	if ($dd_element['tag']=="ANGLE") {
		include $include_root."data_d_angle.php";
		continue;
	}
	
	// GPS
	if ($dd_element['tag']=="GPS") {
		include $include_root."data_d_gps.php";
		continue;
	}
	
	// GPS vector
	if ($dd_element['tag']=="GPSVECTOR") {
		include $include_root."data_d_gpsvector.php";
		continue;
	}
	
	// Leveling
	if ($dd_element['tag']=="LEVELING") {
		include $include_root."data_d_leveling.php";
		continue;
	}
	
	// InSAR image
	if ($dd_element['tag']=="INSARIMAGE") {
		include $include_root."data_d_insarimage.php";
		continue;
	}
	
}
?>