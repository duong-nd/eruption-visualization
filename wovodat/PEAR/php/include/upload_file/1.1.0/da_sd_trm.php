<?php

// Upload children
foreach ($da_sd_trm_obj['value'] as &$da_sd_trm_ele) {
	switch ($da_sd_trm_ele['tag']) {
		case "TREMOR":
			$da_sd_trm_trm_obj=&$da_sd_trm_ele;
			include "da_sd_trm_trm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>