<?php

// Upload children
foreach ($er_obj['value'] as &$er_ele) {
	switch ($er_ele['tag']) {
		case "ERUPTION":
			$er_ed_obj=&$er_ele;
			include "er_ed.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "PHASES":
			$er_phs_obj=&$er_ele;
			include "er_phs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "VIDEO":
			$er_vid_obj=&$er_ele;
			include "er_vid.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "FORECAST":
			$er_for_obj=&$er_ele;
			include "er_for.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>