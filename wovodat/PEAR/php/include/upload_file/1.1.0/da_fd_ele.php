<?php

// Upload children
foreach ($da_fd_ele_obj['value'] as &$da_fd_ele_ele) {
	switch ($da_fd_ele_ele['tag']) {
		case "ELECTRIC":
			$da_fd_ele_ele_obj=&$da_fd_ele_ele;
			include "da_fd_ele_ele.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>