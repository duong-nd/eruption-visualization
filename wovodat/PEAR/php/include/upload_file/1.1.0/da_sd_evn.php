<?php

// Upload children
foreach ($da_sd_evn_obj['value'] as &$da_sd_evn_ele) {
	switch ($da_sd_evn_ele['tag']) {
		case "NETWORKEVENT":
			$da_sd_evn_evn_obj=&$da_sd_evn_ele;
			include "da_sd_evn_evn.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>