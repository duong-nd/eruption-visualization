<?php

// Loop on elements - Search for children
$hd_elements=$data_element['value'];
foreach ($hd_elements as $hd_element) {
	
	// Daily
	if ($hd_element['tag']=="DAILY") {
		include $include_root."data_h_daily.php";
		continue;
	}
	
	// Sample
	if ($hd_element['tag']=="SAMPLE") {
		include $include_root."data_h_sample.php";
		continue;
	}
	
}
?>