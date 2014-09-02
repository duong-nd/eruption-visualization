<?php

// Upload children
foreach ($ms_gs_obj['value'] as &$ms_gs_ele) {
	switch ($ms_gs_ele['tag']) {
		case "GASSTATION":
			$ms_gs_gs_obj=&$ms_gs_ele;
			include "ms_gs_gs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>