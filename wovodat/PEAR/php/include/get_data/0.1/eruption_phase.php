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
$eruption_phase_elements=$eruption_element['value'];
foreach ($eruption_phase_elements as $eruption_phase_element) {
	
	// Video
	if ($eruption_phase_element['tag']=="VIDEO") {
		include $include_root."eruption_phase_video.php";
		continue;
	}
	
	// Forecast
	if ($eruption_phase_element['tag']=="FORECAST") {
		include $include_root."eruption_phase_forecast.php";
		continue;
	}
	
}

?>