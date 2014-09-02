<?php

// Increment data count
if (!isset($data_list['cn_F'])) {
	$data_list['cn_F']=array();
	$data_list['cn_F']['name']="Fields network";
	$data_list['cn_F']['number']=0;
	$data_list['cn_F']['sets']=array();
}
$data_list['cn_F']['number']++;

// Loop on elements - Search for children
$fieldsnetwork_elements=$monitoringsystem_element['value'];
foreach ($fieldsnetwork_elements as $fieldsnetwork_element) {
	
	// Fields station
	if ($fieldsnetwork_element['tag']=="FIELDSSTATION") {
		include $include_root."ms_fnetwork_fstation.php";
		continue;
	}
	
}

?>