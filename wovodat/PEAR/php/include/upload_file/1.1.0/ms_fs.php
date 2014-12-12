<?php

// Upload children
foreach ($ms_fs_obj['value'] as &$ms_fs_ele) {
	switch ($ms_fs_ele['tag']) {
		case "FIELDSSTATION":
			$ms_fs_fs_obj=&$ms_fs_ele;
			include "ms_fs_fs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>