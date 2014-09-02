<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_sd_int_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get volcano
if (!v1_get_vd_id($da_sd_int_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network event
v1_get_data($da_sd_int_obj, "NETWORKEVENT", $gen_data);

// ^^^ Get single station event
v1_get_data($da_sd_int_obj, "SINGLESTATIONEVENT", $gen_data2);

// ^^^ Get publish date
v1_get_pubdate($da_sd_int_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_sd_int_obj['value'] as &$da_sd_int_ele) {
	switch ($da_sd_int_ele['tag']) {
		case "INTENSITY":
			$da_sd_int_int_obj=&$da_sd_int_ele;
			include "da_sd_int_int.php";
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
array_shift($gen_data);
array_shift($gen_data2);
array_shift($gen_pubdates);

?>