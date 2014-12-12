<?php

// Upload children  
foreach ($ms_ms_obj['value'] as &$ms_ms_ele) {
	switch ($ms_ms_ele['tag']) {
		case "METEOSTATION": 
			$ms_ms_ms_obj=&$ms_ms_ele;
			include "ms_ms_ms.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>