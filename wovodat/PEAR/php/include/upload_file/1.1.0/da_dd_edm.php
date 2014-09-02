<?php

// Upload children
foreach ($da_dd_edm_obj['value'] as &$da_dd_edm_ele) {
	switch ($da_dd_edm_ele['tag']) {
		case "EDM":
			$da_dd_edm_edm_obj=&$da_dd_edm_ele;
			include "da_dd_edm_edm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>