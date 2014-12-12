<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_td_img_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($da_td_img_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_td_img_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_td_img_obj, "STATION", $gen_stations);

// ^^^ Get airplane
v1_get_ms($da_td_img_obj, "AIRPLANE", $gen_stations2);

// ^^^ Get satellite
v1_get_ms($da_td_img_obj, "SATELLITE", $gen_stations3);

// ^^^ Get publish date
v1_get_pubdate($da_td_img_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_td_img_obj['value'] as &$da_td_img_ele) {
	switch ($da_td_img_ele['tag']) {
		case "THERMALIMAGE":
			$da_td_img_img_obj=&$da_td_img_ele;
			include "da_td_img_img.php";
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