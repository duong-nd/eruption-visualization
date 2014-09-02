<?php

// vvv Set variables
$er_phs_name="Phases";

// -- CHECK DATA --

// ^^^ Get eruption
v1_get_eruption($er_phs_obj);

// ^^^ Get owners
if (!v1_get_owners($er_phs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($er_phs_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($er_phs_obj['value'] as &$er_phs_ele) {
	switch ($er_phs_ele['tag']) {
		case "PHASE":
			$er_phs_phs_obj=&$er_phs_ele;
			include "er_phs_phs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_eruptions);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>