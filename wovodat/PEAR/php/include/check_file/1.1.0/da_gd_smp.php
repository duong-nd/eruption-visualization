<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_gd_smp_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_gd_smp_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_gd_smp_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_gd_smp_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_gd_smp_obj['value'] as &$da_gd_smp_ele) {
	switch ($da_gd_smp_ele['tag']) {
		case "GASSAMPLE":
			$da_gd_smp_smp_obj=&$da_gd_smp_ele;
			include "da_gd_smp_smp.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_pubdates);

?>