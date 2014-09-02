<?php

// Upload children
foreach ($ms_fi_obj['value'] as &$ms_fi_ele) {
	switch ($ms_fi_ele['tag']) {
		case "FIELDSINSTRUMENT":
			$ms_fi_fi_obj=&$ms_fi_ele;
			include "ms_fi_fi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>