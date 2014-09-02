<?php

// Upload children
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

?>