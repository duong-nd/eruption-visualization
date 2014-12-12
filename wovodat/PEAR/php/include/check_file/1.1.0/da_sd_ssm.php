<?php

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_sd_ssm_obj['value'] as &$da_sd_ssm_ele) {
	switch ($da_sd_ssm_ele['tag']) {
		case "SSAMDATA":
			$da_sd_ssm_ssm_obj=&$da_sd_ssm_ele;
			include "da_sd_ssm_ssm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>