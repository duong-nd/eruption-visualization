<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_td_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_td_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_td_obj['value'] as &$da_td_ele) {
	switch ($da_td_ele['tag']) {
		case "GROUND-BASEDDATASET":
			$da_td_grd_obj=&$da_td_ele;
			include "da_td_grd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "THERMALIMAGEDATASET":
			$da_td_img_obj=&$da_td_ele;
			include "da_td_img.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_pubdates);

?>