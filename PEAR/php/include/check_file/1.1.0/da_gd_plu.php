<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_gd_plu_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($da_gd_plu_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_gd_plu_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_gd_plu_obj, "STATION", $gen_stations);

// ^^^ Get airplane
v1_get_ms($da_gd_plu_obj, "AIRPLANE", $gen_stations2);    

// ^^^ Get satellite
v1_get_ms($da_gd_plu_obj, "SATELLITE", $gen_stations3);   

// ^^^ Get publish date
v1_get_pubdate($da_gd_plu_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_gd_plu_obj['value'] as &$da_gd_plu_ele) {
	switch ($da_gd_plu_ele['tag']) {
		case "PLUME":
			$da_gd_plu_plu_obj=&$da_gd_plu_ele;
			include "da_gd_plu_plu.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_vd_ids);
array_shift($gen_instruments);
array_shift($gen_stations);
array_shift($gen_stations2);  	
array_shift($gen_stations3);    
array_shift($gen_pubdates);

?>