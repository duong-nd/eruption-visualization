<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_gd_plu_plu_obj, "CODE");

// Get owners
$owners=$da_gd_plu_plu_obj['results']['owners'];

// Prepare link to gs_id
if (substr($da_gd_plu_plu_obj['results']['gs_id'], 0, 1)=="@") {
	$gs_id=$db_ids[substr($da_gd_plu_plu_obj['results']['gs_id'], 1)];
}
else {
	$gs_id=$da_gd_plu_plu_obj['results']['gs_id'];
}

// Prepare link to cs_id   
if (substr($da_gd_plu_plu_obj['results']['cs_id'], 0, 1)=="@") {
	$cs_id=$db_ids[substr($da_gd_plu_plu_obj['results']['cs_id'], 1)];
}
else {
	$cs_id=$da_gd_plu_plu_obj['results']['cs_id'];
}


// Prepare link to gi_id
if (substr($da_gd_plu_plu_obj['results']['gi_id'], 0, 1)=="@") {
	$gi_id=$db_ids[substr($da_gd_plu_plu_obj['results']['gi_id'], 1)];
}
else {
	$gi_id=$da_gd_plu_plu_obj['results']['gi_id'];
}

// Store ID
$da_gd_plu_plu_obj['id']=0;
array_push($db_ids, 0);

// Upload children
foreach ($da_gd_plu_plu_obj['value'] as &$da_gd_plu_plu_ele) {
	switch ($da_gd_plu_plu_ele['tag']) {
		case "PLUMESPECIES":
			$da_gd_plu_plu_spe_obj=&$da_gd_plu_plu_ele;
			include "da_gd_plu_plu_spe.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>