<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_fs_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_fs_obj, "NETWORK", $gen_networks);

// ^^^ Get publish date
v1_get_pubdate($ms_fs_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ms_fs_obj['value'] as &$ms_fs_ele) {
	switch ($ms_fs_ele['tag']) {
		case "FIELDSSTATION":
			$ms_fs_fs_obj=&$ms_fs_ele;
			include "ms_fs_fs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>