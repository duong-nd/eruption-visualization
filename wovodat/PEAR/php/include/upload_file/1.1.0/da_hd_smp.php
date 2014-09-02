<?php

// Upload children
foreach ($da_hd_smp_obj['value'] as &$da_hd_smp_ele) {
	switch ($da_hd_smp_ele['tag']) {
		case "HYDROLOGICSAMPLE":
			$da_hd_smp_smp_obj=&$da_hd_smp_ele;
			include "da_hd_smp_smp.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>