<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_sd_obj);

// -- CHECK CHILDREN --

// ### Check children
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

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>