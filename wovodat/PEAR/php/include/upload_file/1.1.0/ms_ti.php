<?php

// Upload children
foreach ($ms_ti_obj['value'] as &$ms_ti_ele) {
	switch ($ms_ti_ele['tag']) {
		case "THERMALINSTRUMENT":
			$ms_ti_ti_obj=&$ms_ti_ele;
			include "ms_ti_ti.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>