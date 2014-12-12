<?php

// Prepare results
$ms_gn_obj['results']['vd_ids']=array();

// ### Check volcano codes and record vd_ids
foreach ($ms_gn_vd_obj['value'] as &$ms_gn_vd_ele) {
	// Get vd_code
	$vd_code=preg_replace('/\s+/', ' ', trim($ms_gn_vd_ele['value'][0]));
	
	// Get vd_id
	require_once "php/funcs/db_funcs.php";
	$vd_id=db_get_vd_id($vd_code);
	if (empty($vd_id)) {
		$error['code']=9;
		$error['message']="There is no volcano with such CAVW number: \"".$vd_code."\"";
		return FALSE;
	}
	
	// Check duplication
	foreach ($ms_gn_obj['results']['vd_ids'] as $rec_vd_id) {
		if ($vd_id==$rec_vd_id) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=7;
			$errors[$l_errors]['message']="In &lt;".$ms_gn_name." code=\"".$code."\"&gt;, list of volcanoes contains a duplication (volcanoCode=\"".$vd_code."\")";
			$l_errors++;
			return FALSE;
		}
	}
	
	// Record
	array_push($ms_gn_obj['results']['vd_ids'], $vd_id);
}

?>