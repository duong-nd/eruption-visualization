<?php

// Upload children
foreach ($ms_ts_obj['value'] as &$ms_ts_ele) {
	switch ($ms_ts_ele['tag']) {
		case "THERMALSTATION":
			$ms_ts_ts_obj=&$ms_ts_ele;
			include "ms_ts_ts.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>