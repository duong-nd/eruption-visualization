<?php

// Upload children
foreach ($da_sd_ivl_obj['value'] as &$da_sd_ivl_ele) {
	switch ($da_sd_ivl_ele['tag']) {
		case "INTERVAL":
			$da_sd_ivl_ivl_obj=&$da_sd_ivl_ele;
			include "da_sd_ivl_ivl.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>