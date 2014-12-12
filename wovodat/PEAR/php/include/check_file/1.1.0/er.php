<?php

// -- CHECK DATA --

// ^^^ Get volcano
if (!v1_get_vd_id($er_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get owners
if (!v1_get_owners($er_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($er_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($er_obj['value'] as &$er_ele) {
	switch ($er_ele['tag']) {
		case "ERUPTION":
			$er_ed_obj=&$er_ele;
			include "er_ed.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "PHASES":
			$er_phs_obj=&$er_ele;
			include "er_phs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "VIDEO":
			$er_vid_obj=&$er_ele;
			include "er_vid.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "FORECAST":
			$er_for_obj=&$er_ele;
			include "er_for.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_vd_ids);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>