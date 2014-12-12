<?php

// -- CHECK CHILDREN --

// ### Check children
foreach ($da_td_pix_obj['value'] as &$da_td_pix_ele) {
	switch ($da_td_pix_ele['tag']) {
		case "THERMALPIXEL":
			$da_td_pix_pix_obj=&$da_td_pix_ele;
			include "da_td_pix_pix.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>