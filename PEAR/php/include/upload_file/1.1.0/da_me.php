<?php

// Upload children
foreach ($da_me_obj['value'] as &$da_me_ele) {
	switch ($da_me_ele['tag']) {
		case "METEODATASET":
			$da_me_med_obj=&$da_me_ele;
			include "da_me_med.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>