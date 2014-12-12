<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_hi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_hi_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($ms_hi_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_hi_obj['value'] as &$ms_hi_ele) {
	switch ($ms_hi_ele['tag']) {
		case "HYDROLOGICINSTRUMENT":
			$ms_hi_hi_obj=&$ms_hi_ele;
			include "ms_hi_hi.php";
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