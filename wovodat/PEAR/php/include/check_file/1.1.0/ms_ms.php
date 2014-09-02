<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ms_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_ms_obj, "NETWORK", $gen_networks);

// ^^^ Get publish date
v1_get_pubdate($ms_ms_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_ms_obj['value'] as &$ms_ms_ele) {
	switch ($ms_ms_ele['tag']) {
		case "METEOSTATION":
			$ms_ms_ms_obj=&$ms_ms_ele;
			include "ms_ms_ms.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>