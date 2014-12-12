<?php

// Upload children
foreach ($ms_mi_obj['value'] as &$ms_mi_ele) {
	switch ($ms_mi_ele['tag']) {
		case "METEOINSTRUMENT":
			$ms_mi_mi_obj=&$ms_mi_ele;
			include "ms_mi_mi.php";
			if (!empty($errors)) {
				return FALSE; 
			}
			break;
	}
}

?>