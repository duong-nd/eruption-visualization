<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_dd_ang_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_dd_ang_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_dd_ang_obj, "STATION", $gen_stations);

// ^^^ Get target station 1
v1_get_ms($da_dd_ang_obj, "TARGETSTATION1", $gen_stations2);

// ^^^ Get target station 2
v1_get_ms($da_dd_ang_obj, "TARGETSTATION2", $gen_stations3);

// ^^^ Get publish date
v1_get_pubdate($da_dd_ang_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_dd_ang_obj['value'] as &$da_dd_ang_ele) {
	switch ($da_dd_ang_ele['tag']) {
		case "ANGLE":
			$da_dd_ang_ang_obj=&$da_dd_ang_ele;
			include "da_dd_ang_ang.php";
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
array_shift($gen_stations2);
array_shift($gen_stations3);
array_shift($gen_pubdates);

?>