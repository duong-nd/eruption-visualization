<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_fd_mgv_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get instrument
v1_get_ms($da_fd_mgv_obj, "INSTRUMENT", $gen_instruments);

// ^^^ Get station
v1_get_ms($da_fd_mgv_obj, "STATION", $gen_stations);

// ^^^ Get publish date
v1_get_pubdate($da_fd_mgv_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_fd_mgv_obj['value'] as &$da_fd_mgv_ele) {
	switch ($da_fd_mgv_ele['tag']) {
		case "MAGNETICVECTOR":
			$da_fd_mgv_mgv_obj=&$da_fd_mgv_ele;
			include "da_fd_mgv_mgv.php";
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
array_shift($gen_pubdates);

?>