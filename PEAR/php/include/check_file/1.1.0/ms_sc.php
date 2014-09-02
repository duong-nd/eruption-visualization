<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_sc_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_sc_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get publish date
v1_get_pubdate($ms_sc_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_sc_obj['value'] as &$ms_sc_ele) {
	switch ($ms_sc_ele['tag']) {
		case "SEISMICCOMPONENT":
			$ms_sc_sc_obj=&$ms_sc_ele;
			include "ms_sc_sc.php";
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
array_shift($gen_pubdates);

?>