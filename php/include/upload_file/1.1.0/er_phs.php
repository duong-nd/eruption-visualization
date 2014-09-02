<?php

// Upload children
foreach ($er_phs_obj['value'] as &$er_phs_ele) {
	switch ($er_phs_ele['tag']) {
		case "PHASE":
			$er_phs_phs_obj=&$er_phs_ele;
			include "er_phs_phs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>