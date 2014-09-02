<?php

// Upload children
foreach ($da_dd_lev_obj['value'] as &$da_dd_lev_ele) {
	switch ($da_dd_lev_ele['tag']) {
		case "LEVELING":
			$da_dd_lev_lev_obj=&$da_dd_lev_ele;
			include "da_dd_lev_lev.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>