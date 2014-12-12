<?php

// Upload children
foreach ($da_gd_sol_obj['value'] as &$da_gd_sol_ele) {
	switch ($da_gd_sol_ele['tag']) {
		case "SOILEFFLUX":
			$da_gd_sol_sol_obj=&$da_gd_sol_ele;
			include "da_gd_sol_sol.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>