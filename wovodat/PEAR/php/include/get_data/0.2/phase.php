<?php

// Increment data count
if (!isset($data_list['ed_phs'])) {
	$data_list['ed_phs']=array();
	$data_list['ed_phs']['name']="Eruption phases";
	$data_list['ed_phs']['number']=0;
	$data_list['ed_phs']['sets']=array();
}
$data_list['ed_phs']['number']++;

// Loop on elements - Search for children
$phase_elements=$wovoml_element['value'];
foreach ($phase_elements as $phase_element) {
	
	// Video
	if ($phase_element['tag']=="VIDEO") {
		include $include_root."phase_video.php";
		continue;
	}
	
	// Forecast
	if ($phase_element['tag']=="FORECAST") {
		include $include_root."phase_forecast.php";
		continue;
	}
	
}

?>