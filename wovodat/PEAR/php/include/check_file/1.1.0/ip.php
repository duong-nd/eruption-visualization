<?php

// -- CHECK DATA --

// ^^^ Get volcano
if (!v1_get_vd_id($ip_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get owners
if (!v1_get_owners($ip_obj, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// ^^^ Get publish date
v1_get_pubdate($ip_obj);

// -- CHECK CHILDREN --

// ### Check children
foreach ($ip_obj['value'] as &$ip_ele) {
	switch ($ip_ele['tag']) {
		case "MAGMAMOVEMENT":
			$ip_mag_obj=&$ip_ele;
			include "ip_mag.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "VOLATILESAT":
			$ip_sat_obj=&$ip_ele;
			include "ip_sat.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "MAGMAPRESSURE":
			$ip_pres_obj=&$ip_ele;
			include "ip_pres.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "HYDROTHERMAL":
			$ip_hyd_obj=&$ip_ele;
			include "ip_hyd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "REGIONALTECTONICS":
			$ip_tec_obj=&$ip_ele;
			include "ip_tec.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// -- POP OUT GENERAL INFO --

// Pop general informations
array_shift($gen_vd_ids);
array_shift($gen_owners);
array_shift($gen_pubdates);

?>