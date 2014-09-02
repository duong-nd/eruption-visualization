<?php

// Upload children
foreach ($da_dd_obj['value'] as &$da_dd_ele) {
	switch ($da_dd_ele['tag']) {
		case "ELECTRONICTILTDATASET":
			$da_dd_tlt_obj=&$da_dd_ele;
			include "da_dd_tlt.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "TILTVECTORDATASET":
			$da_dd_tlv_obj=&$da_dd_ele;
			include "da_dd_tlv.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "STRAINDATASET":
			$da_dd_str_obj=&$da_dd_ele;
			include "da_dd_str.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "EDMDATASET":
			$da_dd_edm_obj=&$da_dd_ele;
			include "da_dd_edm.php";
			if (!empty($errors)) {
				return FALSE;
			}
		case "ANGLEDATASET":
			$da_dd_ang_obj=&$da_dd_ele;
			include "da_dd_ang.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "GPSDATASET":
			$da_dd_gps_obj=&$da_dd_ele;
			include "da_dd_gps.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "GPSVECTORDATASET":
			$da_dd_gpv_obj=&$da_dd_ele;
			include "da_dd_gpv.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "LEVELINGDATASET":
			$da_dd_lev_obj=&$da_dd_ele;
			include "da_dd_lev.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "INSARIMAGEDATASET":
			$da_dd_sar_obj=&$da_dd_ele;
			include "da_dd_sar.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>