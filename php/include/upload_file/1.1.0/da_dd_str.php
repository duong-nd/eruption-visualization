<?php

// Upload children
foreach ($da_dd_str_obj['value'] as &$da_dd_str_ele) {
	switch ($da_dd_str_ele['tag']) {
		case "STRAIN":
			$da_dd_str_str_obj=&$da_dd_str_ele;
			include "da_dd_str_str.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>