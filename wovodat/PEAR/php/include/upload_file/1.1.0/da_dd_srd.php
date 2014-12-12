<?php

// Upload children
foreach ($da_dd_srd_obj['value'] as &$da_dd_srd_ele) {
	switch ($da_dd_srd_ele['tag']) {
		case "INSARPIXEL":
			$da_dd_srd_srd_obj=&$da_dd_srd_ele;
			include "da_dd_srd_srd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>