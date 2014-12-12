<?php

// Upload children
foreach ($da_sd_obj['value'] as &$da_sd_ele) {
	switch ($da_sd_ele['tag']) {
		case "NETWORKEVENTDATASET":
			$da_sd_evn_obj=&$da_sd_ele;
			include "da_sd_evn.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "SINGLESTATIONEVENTDATASET":
			$da_sd_evs_obj=&$da_sd_ele;
			include "da_sd_evs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "INTENSITYDATASET":
			$da_sd_int_obj=&$da_sd_ele;
			include "da_sd_int.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "TREMORDATASET":
			$da_sd_trm_obj=&$da_sd_ele;
			include "da_sd_trm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "INTERVALDATASET":
			$da_sd_ivl_obj=&$da_sd_ele;
			include "da_sd_ivl.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "RSAM-SSAMDATASET":
			$da_sd_sam_obj=&$da_sd_ele;
			include "da_sd_sam.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "WAVEFORMDATASET":
			$da_sd_wav_obj=&$da_sd_ele;
			include "da_sd_wav.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;				
	}
}

?>