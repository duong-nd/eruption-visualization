<?php

// -- CHECK DATA --

// ^^^ Get volcano
if (!v1_get_vd_id($ob_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get owners
if (!v1_get_owners($ob_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ob_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ob_obj['value'] as &$ob_ele) {
	switch ($ob_ele['tag']) {
		case "OBSERVATION":
			$ob_co_obj=&$ob_ele;
			include "ob_co.php";
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