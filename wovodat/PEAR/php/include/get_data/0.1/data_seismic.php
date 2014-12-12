<?php

// Loop on elements - Search for children
$sd_elements=$data_element['value'];
foreach ($sd_elements as $sd_element) {
	
	// Network event
	if ($sd_element['tag']=="NETWORKEVENT") {
		include $include_root."data_s_networkevent.php";
		continue;
	}
	
	// Single station event
	if ($sd_element['tag']=="SINGLESTATIONEVENT") {
		include $include_root."data_s_singlestationevent.php";
		continue;
	}
	
	// Intensity
	if ($sd_element['tag']=="INTENSITY") {
		include $include_root."data_s_intensity.php";
		continue;
	}
	
	// Tremor
	if ($sd_element['tag']=="TREMOR") {
		include $include_root."data_s_tremor.php";
		continue;
	}
	
	// Waveform
	if ($sd_element['tag']=="WAVEFORM") {
		include $include_root."data_s_waveform.php";
		continue;
	}
	
	// Interval
	if ($sd_element['tag']=="INTERVAL") {
		include $include_root."data_s_interval.php";
		continue;
	}
	
	// RSAM-SSAM
	if ($sd_element['tag']=="RSAM-SSAM") {
		include $include_root."data_s_rsamssam.php";
		continue;
	}
	
}
?>