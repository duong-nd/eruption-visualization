<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_di_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_di_obj, "STATION", $gen_stations);
$code=xml_get_att($ms_di_obj, "STATION");

// ^^^ Get publish date
v1_get_pubdate($ms_di_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_di_obj['value'] as &$ms_di_ele) {
	switch ($ms_di_ele['tag']) {
		case "DEFORMATIONINSTRUMENT":
			$ms_di_dig_obj=&$ms_di_ele;
			include "ms_di_dig.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "TILTSTRAININSTRUMENT":
			$ms_di_dit_obj=&$ms_di_ele;
			include "ms_di_dit.php";
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