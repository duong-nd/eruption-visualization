<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ti_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get station
v1_get_ms($ms_ti_obj, "STATION", $gen_stations);

// ^^^ Get airplane
v1_get_ms($ms_ti_obj, "AIRPLANE", $gen_stations2);


// ^^^ Get satellite
v1_get_ms($ms_gi_obj, "SATELLITE", $gen_stations3);    


// ^^^ Get publish date
v1_get_pubdate($ms_ti_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_ti_obj['value'] as &$ms_ti_ele) {
	switch ($ms_ti_ele['tag']) {
		case "THERMALINSTRUMENT":
			$ms_ti_ti_obj=&$ms_ti_ele;
			include "ms_ti_ti.php";
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