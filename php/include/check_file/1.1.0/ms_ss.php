<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ss_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_ss_obj, "NETWORK", $gen_networks);

// ^^^ Get publish date
v1_get_pubdate($ms_ss_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_ss_obj['value'] as &$ms_ss_ele) {
	switch ($ms_ss_ele['tag']) {
		case "SEISMICSTATION":
			$ms_ss_ss_obj=&$ms_ss_ele;
			include "ms_ss_ss.php";
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