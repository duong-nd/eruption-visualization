<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_trm_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($da_sd_trm_obj, "NETWORK", $gen_networks);

// ^^^ Get single
v1_get_ms($da_sd_trm_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_sd_trm_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_sd_trm_obj['value'] as &$da_sd_trm_ele) {
	switch ($da_sd_trm_ele['tag']) {
		case "TREMOR":
			$da_sd_trm_trm_obj=&$da_sd_trm_ele;
			include "da_sd_trm_trm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>