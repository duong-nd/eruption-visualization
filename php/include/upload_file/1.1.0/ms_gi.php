<?php

// Upload children
foreach ($ms_gi_obj['value'] as &$ms_gi_ele) {
	switch ($ms_gi_ele['tag']) {
		case "GASINSTRUMENT":
			$ms_gi_gi_obj=&$ms_gi_ele;
			include "ms_gi_gi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>