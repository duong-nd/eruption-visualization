<?php

// Upload children
foreach ($da_fd_mgv_obj['value'] as &$da_fd_mgv_ele) {
	switch ($da_fd_mgv_ele['tag']) {
		case "MAGNETICVECTOR":
			$da_fd_mgv_mgv_obj=&$da_fd_mgv_ele;
			include "da_fd_mgv_mgv.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>