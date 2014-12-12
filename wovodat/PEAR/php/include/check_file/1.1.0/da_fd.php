<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($da_fd_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($da_fd_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_fd_obj['value'] as &$da_fd_ele) {
	switch ($da_fd_ele['tag']) {
		case "MAGNETICDATASET":
			$da_fd_mag_obj=&$da_fd_ele;
			include "da_fd_mag.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "MAGNETICVECTORDATASET":
			$da_fd_mgv_obj=&$da_fd_ele;
			include "da_fd_mgv.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "ELECTRICDATASET":
			$da_fd_ele_obj=&$da_fd_ele;
			include "da_fd_ele.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "GRAVITYDATASET":
			$da_fd_gra_obj=&$da_fd_ele;
			include "da_fd_gra.php";
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