<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_me_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_me_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_me_obj['value'] as &$da_me_ele) {
	switch ($da_me_ele['tag']) {
		case "METEODATASET":
			$da_me_med_obj=&$da_me_ele;
			include "da_me_med.php";
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