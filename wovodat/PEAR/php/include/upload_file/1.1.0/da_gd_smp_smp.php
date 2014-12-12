<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_gd_smp_smp_obj, "CODE");

// Get owners
$owners=$da_gd_smp_smp_obj['results']['owners'];

// Prepare link to gs_id
if (substr($da_gd_smp_smp_obj['results']['gs_id'], 0, 1)=="@") {
	$gs_id=$db_ids[substr($da_gd_smp_smp_obj['results']['gs_id'], 1)];
}
else {
	$gs_id=$da_gd_smp_smp_obj['results']['gs_id'];
}

// Prepare link to gi_id
if (substr($da_gd_smp_smp_obj['results']['gi_id'], 0, 1)=="@") {
	$gi_id=$db_ids[substr($da_gd_smp_smp_obj['results']['gi_id'], 1)];
}
else {
	$gi_id=$da_gd_smp_smp_obj['results']['gi_id'];
}

// Store ID
$da_gd_smp_smp_obj['id']=0;
array_push($db_ids, 0);

// Upload children
foreach ($da_gd_smp_smp_obj['value'] as &$da_gd_smp_smp_ele) {
	switch ($da_gd_smp_smp_ele['tag']) {
		case "GASSPECIES":
			$da_gd_smp_smp_spe_obj=&$da_gd_smp_smp_ele;
			include "da_gd_smp_smp_spe.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>