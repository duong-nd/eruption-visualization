<?php

// Upload children
foreach ($da_gd_smp_obj['value'] as &$da_gd_smp_ele) {
	switch ($da_gd_smp_ele['tag']) {
		case "GASSAMPLE":
			$da_gd_smp_smp_obj=&$da_gd_smp_ele;
			include "da_gd_smp_smp.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>