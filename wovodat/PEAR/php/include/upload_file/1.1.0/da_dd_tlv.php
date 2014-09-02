<?php

// Upload children
foreach ($da_dd_tlv_obj['value'] as &$da_dd_tlv_ele) {
	switch ($da_dd_tlv_ele['tag']) {
		case "TILTVECTOR":
			$da_dd_tlv_tlv_obj=&$da_dd_tlv_ele;
			include "da_dd_tlv_tlv.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>