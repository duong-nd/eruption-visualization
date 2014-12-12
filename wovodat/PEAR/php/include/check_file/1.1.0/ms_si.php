<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_si_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_si_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($ms_si_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_si_obj['value'] as &$ms_si_ele) {
	switch ($ms_si_ele['tag']) {
		case "SEISMICINSTRUMENT":
			$ms_si_si_obj=&$ms_si_ele;
			include "ms_si_si.php";
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