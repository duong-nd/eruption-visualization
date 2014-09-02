<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_fi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get station
v1_get_ms($ms_fi_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($ms_fi_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_fi_obj['value'] as &$ms_fi_ele) {
	switch ($ms_fi_ele['tag']) {
		case "FIELDSINSTRUMENT":
			$ms_fi_fi_obj=&$ms_fi_ele;
			include "ms_fi_fi.php";
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