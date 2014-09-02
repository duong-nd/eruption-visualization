<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_fd_ele_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_fd_ele_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get reference station 1
v1_get_ms($da_fd_ele_obj, "REFSTATION1", $gen_stations);

// ^^^ Get reference station 2
v1_get_ms($da_fd_ele_obj, "REFSTATION2", $gen_stations2);

// ^^^ Get publish date
v1_get_pubdate($da_fd_ele_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_fd_ele_obj['value'] as &$da_fd_ele_ele) {
	switch ($da_fd_ele_ele['tag']) {
		case "ELECTRIC":
			$da_fd_ele_ele_obj=&$da_fd_ele_ele;
			include "da_fd_ele_ele.php";
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
array_shift($gen_stations);
array_shift($gen_stations2);
array_shift($gen_pubdates);

?>