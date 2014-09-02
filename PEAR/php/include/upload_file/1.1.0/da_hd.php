<?php

// Upload children
foreach ($da_hd_obj['value'] as &$da_hd_ele) {
	switch ($da_hd_ele['tag']) {
		case "HYDROLOGICSAMPLEDATASET":
			$da_hd_smp_obj=&$da_hd_ele;
			include "da_hd_smp.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>