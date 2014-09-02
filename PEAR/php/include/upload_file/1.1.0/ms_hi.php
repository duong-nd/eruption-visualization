<?php

// Upload children
foreach ($ms_hi_obj['value'] as &$ms_hi_ele) {
	switch ($ms_hi_ele['tag']) {
		case "HYDROLOGICINSTRUMENT":
			$ms_hi_hi_obj=&$ms_hi_ele;
			include "ms_hi_hi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>