<?php

// Upload children
foreach ($ms_ds_obj['value'] as &$ms_ds_ele) {
	switch ($ms_ds_ele['tag']) {
		case "DEFORMATIONSTATION":
			$ms_ds_ds_obj=&$ms_ds_ele;
			include "ms_ds_ds.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>