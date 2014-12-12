<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_gd_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_gd_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_gd_obj['value'] as &$da_gd_ele) {
	switch ($da_gd_ele['tag']) {
		case "GASSAMPLEDATASET":
			$da_gd_smp_obj=&$da_gd_ele;
			include "da_gd_smp.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "SOILEFFLUXDATASET":
			$da_gd_sol_obj=&$da_gd_ele;
			include "da_gd_sol.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "PLUMEDATASET":
			$da_gd_plu_obj=&$da_gd_ele;
			include "da_gd_plu.php";
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