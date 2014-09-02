<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_sam_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get single
v1_get_ms($da_sd_sam_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_sd_sam_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_sd_sam_obj['value'] as &$da_sd_sam_ele) {
	switch ($da_sd_sam_ele['tag']) {
		case "RSAM-SSAM":
			$da_sd_sam_sam_obj=&$da_sd_sam_ele;
			include "da_sd_sam_sam.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>