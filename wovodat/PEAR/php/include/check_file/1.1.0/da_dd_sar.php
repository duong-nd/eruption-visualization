<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_dd_sar_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($da_dd_sar_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}


// ^^^ Get airplane   
v1_get_ms($da_dd_sar_obj, "AIRPLANE", $gen_stations2);


// ^^^ Get instrument
v1_get_ms($da_dd_sar_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get publish date
v1_get_pubdate($da_dd_sar_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_dd_sar_obj['value'] as &$da_dd_sar_ele) {
	switch ($da_dd_sar_ele['tag']) {
		case "INSARIMAGE":
			$da_dd_sar_sar_obj=&$da_dd_sar_ele;
			include "da_dd_sar_sar.php";
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
array_shift($gen_vd_ids);
array_shift($gen_pubdates);
array_shift($gen_stations2);    


?>