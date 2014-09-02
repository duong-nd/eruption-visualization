<?php

// Upload children
foreach ($ms_hs_obj['value'] as &$ms_hs_ele) {
	switch ($ms_hs_ele['tag']) {
		case "HYDROLOGICSTATION":
			$ms_hs_hs_obj=&$ms_hs_ele;
			include "ms_hs_hs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>