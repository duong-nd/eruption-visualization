<?php

// -- CHECK DATA --

// ^^^ Get owners
if (!v1_get_owners($ms_ds_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get network
v1_get_ms($ms_ds_obj, "NETWORK", $gen_networks);
$network_code=xml_get_att($ms_ds_obj, "NETWORK");

// ^^^ Get publish date
v1_get_pubdate($ms_ds_obj);

// -- CHECK CHILDREN --

// ### Check children
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

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_owners);
array_shift($gen_networks);
array_shift($gen_pubdates);

?>