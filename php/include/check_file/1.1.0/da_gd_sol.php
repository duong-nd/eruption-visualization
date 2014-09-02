<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_gd_sol_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_gd_sol_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_gd_sol_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_gd_sol_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_gd_sol_obj['value'] as &$da_gd_sol_ele) {
	switch ($da_gd_sol_ele['tag']) {
		case "SOILEFFLUX":
			$da_gd_sol_sol_obj=&$da_gd_sol_ele;
			include "da_gd_sol_sol.php";
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