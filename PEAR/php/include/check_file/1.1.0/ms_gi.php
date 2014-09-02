<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_gi_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get station
v1_get_ms($ms_gi_obj, "STATION", $gen_stations);

// ^^^ Get airplane
v1_get_ms($ms_gi_obj, "AIRPLANE", $gen_stations2);

// ^^^ Get satellite
v1_get_ms($ms_gi_obj, "SATELLITE", $gen_stations3);    

// ^^^ Get publish date
v1_get_pubdate($ms_gi_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_gi_obj['value'] as &$ms_gi_ele) {
	switch ($ms_gi_ele['tag']) {
		case "GASINSTRUMENT":
			$ms_gi_gi_obj=&$ms_gi_ele;
			include "ms_gi_gi.php";
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
array_shift($gen_stations2);
array_shift($gen_stations3);    
array_shift($gen_pubdates);

?>