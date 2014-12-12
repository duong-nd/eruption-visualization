<?php

// Upload children
foreach ($ms_di_obj['value'] as &$ms_di_ele) {
	switch ($ms_di_ele['tag']) {
		case "DEFORMATIONINSTRUMENT":
			$ms_di_dig_obj=&$ms_di_ele;
			include "ms_di_dig.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "TILTSTRAININSTRUMENT":
			$ms_di_dit_obj=&$ms_di_ele;
			include "ms_di_dit.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>