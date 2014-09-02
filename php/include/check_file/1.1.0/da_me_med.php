<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_me_med_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_me_med_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_me_med_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_me_med_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_me_med_obj['value'] as &$da_me_med_ele) {
	switch ($da_me_med_ele['tag']) {
		case "METEODATA":
			$da_me_med_med_obj=&$da_me_med_ele;
			include "da_me_med_med.php";
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