<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_hd_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_hd_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_hd_obj['value'] as &$da_hd_ele) {
	switch ($da_hd_ele['tag']) {
		case "HYDROLOGICSAMPLEDATASET":
			$da_hd_smp_obj=&$da_hd_ele;
			include "da_hd_smp.php";
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