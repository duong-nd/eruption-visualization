<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_hs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_hs_obj, "NETWORK", $gen_networks);

// ^^^ Get publish date
v1_get_pubdate($ms_hs_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_hs_obj['value'] as &$ms_hs_ele) {
	switch ($ms_hs_ele['tag']) {
		case "HYDROLOGICSTATION":
			$ms_hs_hs_obj=&$ms_hs_ele;
			include "ms_hs_hs.php";
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