<?php

// Upload children
foreach ($da_gd_plu_obj['value'] as &$da_gd_plu_ele) {
	switch ($da_gd_plu_ele['tag']) {
		case "PLUME":
			$da_gd_plu_plu_obj=&$da_gd_plu_ele;
			include "da_gd_plu_plu.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>