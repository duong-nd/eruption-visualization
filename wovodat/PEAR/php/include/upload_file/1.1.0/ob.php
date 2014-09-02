<?php

// Upload children
foreach ($ob_obj['value'] as &$ob_ele) {
	switch ($ob_ele['tag']) {
		case "OBSERVATION":
			$ob_co_obj=&$ob_ele;
			include "ob_co.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>