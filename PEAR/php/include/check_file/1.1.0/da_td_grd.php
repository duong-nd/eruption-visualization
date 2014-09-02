<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_td_grd_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_td_grd_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_td_grd_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_td_grd_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_td_grd_obj['value'] as &$da_td_grd_ele) {
	switch ($da_td_grd_ele['tag']) {
		case "GROUND-BASED":
			$da_td_grd_grd_obj=&$da_td_grd_ele;
			include "da_td_grd_grd.php";
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