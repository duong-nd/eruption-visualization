<?php

// Upload children
foreach ($da_dd_ang_obj['value'] as &$da_dd_ang_ele) {
	switch ($da_dd_ang_ele['tag']) {
		case "ANGLE":
			$da_dd_ang_ang_obj=&$da_dd_ang_ele;
			include "da_dd_ang_ang.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>