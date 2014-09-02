<?php

// Upload children
foreach ($da_sd_int_obj['value'] as &$da_sd_int_ele) {
	switch ($da_sd_int_ele['tag']) {
		case "INTENSITY":
			$da_sd_int_int_obj=&$da_sd_int_ele;
			include "da_sd_int_int.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>