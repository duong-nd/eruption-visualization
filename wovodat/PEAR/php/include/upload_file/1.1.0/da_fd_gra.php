<?php

// Upload children
foreach ($da_fd_gra_obj['value'] as &$da_fd_gra_ele) {
	switch ($da_fd_gra_ele['tag']) {
		case "GRAVITY":
			$da_fd_gra_gra_obj=&$da_fd_gra_ele;
			include "da_fd_gra_gra.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>