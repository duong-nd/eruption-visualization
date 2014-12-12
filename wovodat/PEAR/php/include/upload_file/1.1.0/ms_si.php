<?php

// Upload children
foreach ($ms_si_obj['value'] as &$ms_si_ele) {
	switch ($ms_si_ele['tag']) {
		case "SEISMICINSTRUMENT":
			$ms_si_si_obj=&$ms_si_ele;
			include "ms_si_si.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>