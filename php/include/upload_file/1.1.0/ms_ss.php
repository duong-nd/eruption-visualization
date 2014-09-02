<?php

// Upload children
foreach ($ms_ss_obj['value'] as &$ms_ss_ele) {
	switch ($ms_ss_ele['tag']) {
		case "SEISMICSTATION":
			$ms_ss_ss_obj=&$ms_ss_ele;
			include "ms_ss_ss.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>