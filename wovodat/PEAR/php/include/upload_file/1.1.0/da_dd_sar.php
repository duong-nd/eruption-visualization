<?php

// Upload children
foreach ($da_dd_sar_obj['value'] as &$da_dd_sar_ele) {
	switch ($da_dd_sar_ele['tag']) {
		case "INSARIMAGE":
			$da_dd_sar_sar_obj=&$da_dd_sar_ele;
			include "da_dd_sar_sar.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>