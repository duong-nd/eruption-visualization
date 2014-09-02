<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_hd_smp_smp_obj, "CODE");

// Get owners
$owners=$da_hd_smp_smp_obj['results']['owners'];

// Prepare link to hs_id
if (substr($da_hd_smp_smp_obj['results']['hs_id'], 0, 1)=="@") {
	$hs_id=$db_ids[substr($da_hd_smp_smp_obj['results']['hs_id'], 1)];
}
else {
	$hs_id=$da_hd_smp_smp_obj['results']['hs_id'];
}

// Prepare link to hi_id
if (substr($da_hd_smp_smp_obj['results']['hi_id'], 0, 1)=="@") {
	$hi_id=$db_ids[substr($da_hd_smp_smp_obj['results']['hi_id'], 1)];
}
else {
	$hi_id=$da_hd_smp_smp_obj['results']['hi_id'];
}

// Store ID
$da_hd_smp_smp_obj['id']=0;
array_push($db_ids, 0);

// Upload children
foreach ($da_hd_smp_smp_obj['value'] as &$da_hd_smp_smp_ele) {
	switch ($da_hd_smp_smp_ele['tag']) {
		case "HYDROLOGICSPECIES":
			$da_hd_smp_smp_spe_obj=&$da_hd_smp_smp_ele;
			include "da_hd_smp_smp_spe.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>