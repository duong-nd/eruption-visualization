<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_gs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_gs_obj, "NETWORK", $gen_networks);

// ^^^ Get publish date
v1_get_pubdate($ms_gs_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_gs_obj['value'] as &$ms_gs_ele) {
	switch ($ms_gs_ele['tag']) {
		case "GASSTATION":
			$ms_gs_gs_obj=&$ms_gs_ele;
			include "ms_gs_gs.php";
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