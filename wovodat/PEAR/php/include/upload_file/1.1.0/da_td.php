<?php

// Upload children
foreach ($da_td_obj['value'] as &$da_td_ele) {
	switch ($da_td_ele['tag']) {
		case "GROUND-BASEDDATASET":
			$da_td_grd_obj=&$da_td_ele;
			include "da_td_grd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "THERMALIMAGEDATASET":
			$da_td_img_obj=&$da_td_ele;
			include "da_td_img.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>