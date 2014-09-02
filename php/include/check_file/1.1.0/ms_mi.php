<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_mi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_mi_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($ms_mi_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_mi_obj['value'] as &$ms_mi_ele) {
	switch ($ms_mi_ele['tag']) {
		case "METEOINSTRUMENT":
			$ms_mi_mi_obj=&$ms_mi_ele;
			include "ms_mi_mi.php";
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