<?php

// Increment data count
if (!isset($data_list['fs'])) {
	$data_list['fs']=array();
	$data_list['fs']['name']="Fields station";
	$data_list['fs']['number']=0;
	$data_list['fs']['sets']=array();
}
$data_list['fs']['number']++;

// Loop on elements - Search for children
$fieldsstation_elements=$fieldsnetwork_element['value'];
foreach ($fieldsstation_elements as $fieldsstation_element) {
	
	// Fields instrument
	if ($fieldsstation_element['tag']=="FIELDSINSTRUMENT") {
		include $include_root."ms_fnetwork_fstation_finstrument.php";
		continue;
	}
	
}

?>