<?php

// Upload children
foreach ($da_me_med_obj['value'] as &$da_me_med_ele) {
	switch ($da_me_med_ele['tag']) {
		case "METEODATA":
			$da_me_med_med_obj=&$da_me_med_ele;
			include "da_me_med_med.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>