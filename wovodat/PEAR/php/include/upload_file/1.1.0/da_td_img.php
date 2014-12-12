<?php

// Upload children
foreach ($da_td_img_obj['value'] as &$da_td_img_ele) {
	switch ($da_td_img_ele['tag']) {
		case "THERMALIMAGE":
			$da_td_img_img_obj=&$da_td_img_ele;
			include "da_td_img_img.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>