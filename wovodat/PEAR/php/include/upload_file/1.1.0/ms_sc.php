<?php

// Upload children
foreach ($ms_sc_obj['value'] as &$ms_sc_ele) {
	switch ($ms_sc_ele['tag']) {
		case "SEISMICCOMPONENT":
			$ms_sc_sc_obj=&$ms_sc_ele;
			include "ms_sc_sc.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>