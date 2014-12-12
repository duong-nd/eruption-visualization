<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_dd_str_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_dd_str_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_dd_str_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_dd_str_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_dd_str_obj['value'] as &$da_dd_str_ele) {
	switch ($da_dd_str_ele['tag']) {
		case "STRAIN":
			$da_dd_str_str_obj=&$da_dd_str_ele;
			include "da_dd_str_str.php";
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