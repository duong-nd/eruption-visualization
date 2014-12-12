<?php

// Upload children
foreach ($da_sd_sam_obj['value'] as &$da_sd_sam_ele) {
	switch ($da_sd_sam_ele['tag']) {
		case "RSAM-SSAM":
			$da_sd_sam_sam_obj=&$da_sd_sam_ele;
			include "da_sd_sam_sam.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>