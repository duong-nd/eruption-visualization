<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ts_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_ts_obj, "NETWORK", $gen_networks);

// ^^^ Get publish date
v1_get_pubdate($ms_ts_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_ts_obj['value'] as &$ms_ts_ele) {
	switch ($ms_ts_ele['tag']) {
		case "THERMALSTATION":
			$ms_ts_ts_obj=&$ms_ts_ele;
			include "ms_ts_ts.php";
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