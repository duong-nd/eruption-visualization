<?php

// Upload children
foreach ($da_fd_mag_obj['value'] as &$da_fd_mag_ele) {
	switch ($da_fd_mag_ele['tag']) {
		case "MAGNETIC":
			$da_fd_mag_mag_obj=&$da_fd_mag_ele;
			include "da_fd_mag_mag.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>