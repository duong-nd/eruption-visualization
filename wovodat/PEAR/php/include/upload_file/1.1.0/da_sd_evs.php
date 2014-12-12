<?php

// Upload children
foreach ($da_sd_evs_obj['value'] as &$da_sd_evs_ele) {
	switch ($da_sd_evs_ele['tag']) {
		case "SINGLESTATIONEVENT":
			$da_sd_evs_evs_obj=&$da_sd_evs_ele;
			include "da_sd_evs_evs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>