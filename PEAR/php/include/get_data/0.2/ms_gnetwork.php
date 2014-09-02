<?php

// Increment data count
if (!isset($data_list['cn_G'])) {
	$data_list['cn_G']=array();
	$data_list['cn_G']['name']="Gas network";
	$data_list['cn_G']['number']=0;
	$data_list['cn_G']['sets']=array();
}
$data_list['cn_G']['number']++;

// Loop on elements - Search for children
$gasnetwork_elements=$monitoringsystem_element['value'];
foreach ($gasnetwork_elements as $gasnetwork_element) {
	
	// Gas station
	if ($gasnetwork_element['tag']=="GASSTATION") {
		include $include_root."ms_gnetwork_gstation.php";
		continue;
	}
	
}

?>