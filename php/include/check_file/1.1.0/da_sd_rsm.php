<?php

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_sd_rsm_obj['value'] as &$da_sd_rsm_ele) {
	switch ($da_sd_rsm_ele['tag']) {
		case "RSAMDATA":
			$da_sd_rsm_rsm_obj=&$da_sd_rsm_ele;
			include "da_sd_rsm_rsm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>