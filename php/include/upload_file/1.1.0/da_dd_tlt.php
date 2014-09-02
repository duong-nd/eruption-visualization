<?php

// Upload children
foreach ($da_dd_tlt_obj['value'] as &$da_dd_tlt_ele) {
	switch ($da_dd_tlt_ele['tag']) {
		case "ELECTRONICTILT":
			$da_dd_tlt_tlt_obj=&$da_dd_tlt_ele;
			include "da_dd_tlt_tlt.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>