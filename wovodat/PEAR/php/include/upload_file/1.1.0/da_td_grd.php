<?php

// Upload children
foreach ($da_td_grd_obj['value'] as &$da_td_grd_ele) {
	switch ($da_td_grd_ele['tag']) {
		case "GROUND-BASED":
			$da_td_grd_grd_obj=&$da_td_grd_ele;
			include "da_td_grd_grd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>