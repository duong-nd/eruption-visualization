<?php

// Upload children
foreach ($da_dd_gpv_obj['value'] as &$da_dd_gpv_ele) {
	switch ($da_dd_gpv_ele['tag']) {
		case "GPSVECTOR":
			$da_dd_gpv_gpv_obj=&$da_dd_gpv_ele;
			include "da_dd_gpv_gpv.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>