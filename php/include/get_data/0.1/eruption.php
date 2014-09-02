<?php

// Increment data count
if (!isset($data_list['ed'])) {
	$data_list['ed']=array();
	$data_list['ed']['name']="Eruptions";
	$data_list['ed']['number']=0;
	$data_list['ed']['sets']=array();
}
$data_list['ed']['number']++;

// Loop on elements - Search for children
$eruption_elements=$wovoml_element['value'];
foreach ($eruption_elements as $eruption_element) {
	
	// Video
	if ($eruption_element['tag']=="VIDEO") {
		include $include_root."eruption_video.php";
		continue;
	}
	
	// Phase
	if ($eruption_element['tag']=="PHASE") {
		include $include_root."eruption_phase.php";
		continue;
	}
	
}

?>