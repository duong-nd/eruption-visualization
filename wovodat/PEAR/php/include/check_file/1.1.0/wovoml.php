<?php

// XML functions
require_once "php/funcs/xml_funcs.php";

// DB functions
require_once "php/funcs/db_funcs.php";

// WOVOML 1.* functions
require_once "php/funcs/v1_funcs.php";

// Global variables
global $data_list;
global $checked_data;
global $xml_id_cnt;
global $gen_owners;
global $gen_pubdates;
global $gen_vd_ids;
global $gen_eruptions;
global $gen_phases;
global $gen_networks;
global $gen_stations;
global $gen_stations2;
global $gen_stations3;
global $gen_instruments;
global $gen_data;
global $gen_data2;
global $gen_data3;  

// Get schema
$xml_schema='/home/wovodat/PEAR/php/auto/wovoml-wovodat/'.$version.'/WOVOML_schema.xsd';

// Check if XML file is valid against schema and display possible errors
$local_errors=array();
$l_local_errors=0;

if (!xml_validate($xml_file, $xml_schema, $local_errors, $l_local_errors)) {
	for ($i=0; $i<$l_local_errors; $i++) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=6;
		$errors[$l_errors]['message']=$local_errors[$i];
		$l_errors++;
	}
	return FALSE;
}

// Get owners
$wovoml=&$xml_array[0];
if (!v1_get_owners($wovoml, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// Get publish date
v1_get_pubdate($wovoml);

// Check children
foreach ($wovoml['value'] as &$wovoml_ele) {
	switch ($wovoml_ele['tag']) {
		case "OBSERVATIONS":
			$ob_obj=&$wovoml_ele;
			include "ob.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "INFERREDPROCESSES":
			$ip_obj=&$wovoml_ele;
			include "ip.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "ERUPTIONS":
			$er_obj=&$wovoml_ele;
			include "er.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "MONITORINGSYSTEMS":
			$ms_obj=&$wovoml_ele;
			include "ms.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "DATA":
			$da_obj=&$wovoml_ele;
			include "da.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>