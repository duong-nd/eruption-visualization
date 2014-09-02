<?php

// Upload children
foreach ($da_dd_gps_obj['value'] as &$da_dd_gps_ele) {
	switch ($da_dd_gps_ele['tag']) {
		case "GPS":
			$da_dd_gps_gps_obj=&$da_dd_gps_ele;
			include "da_dd_gps_gps.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>