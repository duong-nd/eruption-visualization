<?php

/******************************************************************************************************
*
* Package of functions doing operations for WOVOML version 1.1.* files
*
* v1_check_dupli_simple: Function to check duplication of data in a same WOVOML file
* v1_check_db_simple: Function to check if data already exist in DB
* v1_get_owners: Function to get the owners of an object
* v1_get_vd_id: Function to get the vd_id of an object
* v1_get_pubdate: Function to get the publish date of an object
* v1_store_owners: Function to store the owners for an object
* v1_store_vd_id: Function to store the vd_id for an object
* v1_store_pubdate: Function to store the publish date for an object
* v1_set_bc_date: Function to store the B.C date for an object
* v1_calculate_pubdate: Function to calculate the publish date of a data (2 years after data time maximum)
* v1_get_id: Function to get the DB ID of an object
* v1_insert: Function to insert data in DB
* v1_update: Function to update data in DB
*
******************************************************************************************************/

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_dupli_simple($name, $key, $code, $owners, &$error) {
	
	global $checked_data;
	
	// If such code was found before
	if (isset($checked_data[$key][$code])) {
		// Compare data
		foreach ($checked_data[$key][$code] as $cmp_data) {
			// Check owners
			foreach ($owners as $owner) {
				foreach ($cmp_data['owners'] as $cmp_owner) {
					if ($owner['id']==$cmp_owner['id']) {
						// Duplication found
						$error="&lt;".$name." code=\"".$code."\" owner=\"".$owner['code']."\"&gt; is duplicated";
						return FALSE;
					}
				}
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_dupli_species($parent_name, $name, $key, $code, $type, $waterfree, $owners, &$error) {
	
	global $checked_data;
	
	// If such code was found before
	if (isset($checked_data[$key][$code])) {
		// Compare data
		foreach ($checked_data[$key][$code] as $cmp_data) {
			// Check owners
			foreach ($owners as $owner) {
				foreach ($cmp_data['owners'] as $cmp_owner) {
					if ($owner['id']==$cmp_owner['id']) {
						// Check type and waterfree
						if ($cmp_data['type']==$type && $cmp_data['waterfree']==$waterfree) {
							// Duplication found
							$error="&lt;".$parent_name." code=\"".$code."\" owner=\"".$owner['code']."\"&gt; with &lt;".$name." type=\"".$type."\"";
							if (!empty($waterfree)) {
								$error.=" waterfree=\"".$waterfree."\"";
							}
							$error.="&gt; is duplicated";
							return FALSE;
						}
					}
				}
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_dupli_sd_evn($name, $key, $code, $sn_id, $sd_evn_tech, $owners, &$error) {
	
	global $checked_data;
	
	// If such code was found before
	if (isset($checked_data[$key][$code])) {
		// Compare data
		foreach ($checked_data[$key][$code] as $cmp_data) {
			// Check sn_id
			if ($cmp_data['sn_id']!=$sn_id) {
				continue;
			}
			
			// Check location technique
			if ($cmp_data['sd_evn_tech']!=$sd_evn_tech) {
				continue;
			}
			
			// Check owners
			foreach ($owners as $owner) {
				foreach ($cmp_data['owners'] as $cmp_owner) {
					if ($owner['id']==$cmp_owner['id']) {
						// Duplication found
						$error="&lt;".$name." code=\"".$code."\" owner=\"".$owner['code']."\"&gt; is duplicated";
						return FALSE;
					}
				}
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_simple($name, $key, $code, $owners) {
	
	global $warnings;
	
	// If already in database, send a warning
	$id=v1_get_id($key, $code, $owners);
	
	if (!empty($id)) {
		// Warning: already in database
		$warning_msg=$name." code=\"".$code."\"";
		// 1st owner
		if (!empty($owners[0])) {
			$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
		}
		// 2nd owner
		if (!empty($owners[1])) {
			$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
		}
		// 3rd owner
		if (!empty($owners[2])) {
			$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
		}
		array_push($warnings, $warning_msg);
	}
	
}

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_sd_evn($name, $code, $sn_id, $sd_evn_tech, $owners) {
	
	global $warnings;
	
	if (substr($sn_id, 0, 1)=="@") {
		return;
	}
	
	// If already in database, send a warning
	$id=v1_get_id_sd_evn($code, $sn_id, $sd_evn_tech, $owners);
	
	if (!empty($id)) {
		// Warning: already in database
		$warning_msg=$name." code=\"".$code."\"";
		// 1st owner
		if (!empty($owners[0])) {
			$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
		}
		// 2nd owner
		if (!empty($owners[1])) {
			$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
		}
		// 3rd owner
		if (!empty($owners[2])) {
			$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
		}
		array_push($warnings, $warning_msg);
	}
	
}

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_species($name, $name_species, $key, $code, $type, $waterfree, $owners) {
	
	global $warnings;
	
	// If already in database, send a warning
	$id=v1_get_id_species($key, $code, $type, $waterfree, $owners);
	
	if (!empty($id)) {
		// Warning: already in database
		$warning_msg=$name." code=\"".$code."\"";
		// 1st owner
		if (!empty($owners[0])) {
			$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
		}
		// 2nd owner
		if (!empty($owners[1])) {
			$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
		}
		// 3rd owner
		if (!empty($owners[2])) {
			$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
		}
		$warning_msg.=" with ".$name_species." type=\"".$type."\"";
		if (!empty($waterfree)) {
			$warning_msg.=" waterfree=\"".$waterfree."\"";
		}
		array_push($warnings, $warning_msg);
	}
	
}

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_insarpixel($parent_name, $name, $code, $number, $owners) {
	
	global $warnings;
	
	// If already in database, send a warning
	
	// Get InSAR image ID 
	$id=v1_get_id("dd_sar", $code, $owners);
	
	// If no ID found, no update possible
	if (empty($id)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect.php";
	
	$dd_srd_id=v1_get_id_insarpixel($id, $number);
	
	if (!empty($dd_srd_id)) {
		// Warning: already in database
		$warning_msg=$parent_name." code=\"".$code."\"";
		// 1st owner
		if (!empty($owners[0])) {
			$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
		}
		// 2nd owner
		if (!empty($owners[1])) {
			$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
		}
		// 3rd owner
		if (!empty($owners[2])) {
			$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
		}
		$warning_msg.=" -> ".$name." number=\"".$number."\"";
		array_push($warnings, $warning_msg);
	}
	
}

/******************************************************************************************************
* Function to check any duplication of an object in the WOVOML file, with no possible time overlap
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 				- $error: an error message and its code
******************************************************************************************************/
function v1_check_dupli_timeframe($name, $key, $code, $stime, $etime, $owners, &$error) {
	
	global $checked_data;
	
	// Format times
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	if (empty($etime)) {
		$etime="9999-12-31 23:59:59";
	}
	
	// If such code was found before
	if (isset($checked_data[$key][$code])) {
		// Compare data
		foreach ($checked_data[$key][$code] as $cmp_data) {
			// Check owners
			foreach ($owners as $owner) {
				foreach ($cmp_data['owners'] as $cmp_owner) {
					if ($owner['id']==$cmp_owner['id']) {
						// Check time
						
						// Format times
						if (empty($cmp_data['stime'])) {
							$cmp_stime="0000-00-00 00:00:00";
						}else {
							$cmp_stime=$cmp_data['stime'];
						}
						
						if (empty($cmp_data['etime'])) {
							$cmp_etime="9999-12-31 23:59:59";
						}else {
							$cmp_etime=$cmp_data['etime'];
						}
						
						// No error = only if end time stricly before compared start time OR start time strictly after compared end time
						if (strcmp($stime, $cmp_etime)<=0 && strcmp($etime, $cmp_stime)>=0) {
							$error="&lt;".$name." code=\"".$code."\" owner=\"".$owner['code']."\"&gt;, the timeframes are overlapping: [".$stime.", ".$etime."] and [".$cmp_stime.", ".$cmp_etime."]";
							return FALSE;
						}
					}
				}
			}
		}
	}
	return TRUE;
}

/******************************************************************************************************
* added June29, to avoid false error for "same station names at different networks".. in development..!!!
* Function to check any duplication of an object in the WOVOML file, with no possible time overlap
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 				- $error: an error message and its code
******************************************************************************************************/
function v1_check_dupli_timeframe2($name, $key, $code, $stime, $etime, $owners, $pr_code, &$error) {
	global $checked_data;
	// Format times
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	if (empty($etime)) {
		$etime="9999-12-31 23:59:59";
	}
	// If such code was found before
	if (isset($checked_data[$key][$code])) {
		// Compare data
		foreach ($checked_data[$key][$code] as $cmp_data) {
			// Check owners
			foreach ($owners as $owner) {
				foreach ($cmp_data['owners'] as $cmp_owner) {
					if ($owner['id']==$cmp_owner['id'] && $cmp_data['parentcode']==$pr_code) {
						// Check time
						// Format times
						if (empty($cmp_data['stime'])) {
							$cmp_stime="0000-00-00 00:00:00";
						}else {
							$cmp_stime=$cmp_data['stime'];
						}
						
						if (empty($cmp_data['etime'])) {
							$cmp_etime="9999-12-31 23:59:59";
						}else {
							$cmp_etime=$cmp_data['etime'];
						}
						
						// No error = only if end time stricly before compared start time OR start time strictly after compared end time
						if (strcmp($stime, $cmp_etime)<=0 && strcmp($etime, $cmp_stime)>=0) {
							$error="&lt;".$name." code=\"".$code."\" owner=\"".$owner['code']."\"&gt;, the timeframes are overlapping: [".$stime.", ".$etime."] and [".$cmp_stime.", ".$cmp_etime."]";
							return FALSE;
						}
					}
				}
			}
		}
	}
	return TRUE;
}

/******************************************************************************************************
* added June29, to avoid false error for "same station names at different networks".. in development..!!!
* Function to check any duplication of an object in the WOVOML file, with no possible time overlap
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 				- $error: an error message and its code
******************************************************************************************************/
function v1_check_dupli_timeframe3($name, $key, $code, $stime, $etime, $owners, $pr_code, $gpr_code, &$error) {
	global $checked_data;
	// Format times
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	if (empty($etime)) {
		$etime="9999-12-31 23:59:59";
	}
	// If such code was found before
	if (isset($checked_data[$key][$code])) {
		// Compare data
		foreach ($checked_data[$key][$code] as $cmp_data) {
			// Check owners
			foreach ($owners as $owner) {
				foreach ($cmp_data['owners'] as $cmp_owner) {
					if ($owner['id']==$cmp_owner['id'] && $cmp_data['parentcode']==$pr_code && $cmp_data['gparentcode']==$gpr_code) {
						// Check time
						// Format times
						if (empty($cmp_data['stime'])) {
							$cmp_stime="0000-00-00 00:00:00";
						}else {
							$cmp_stime=$cmp_data['stime'];
						}
						
						if (empty($cmp_data['etime'])) {
							$cmp_etime="9999-12-31 23:59:59";
						}else {
							$cmp_etime=$cmp_data['etime'];
						}
						
						// No error = only if end time stricly before compared start time OR start time strictly after compared end time
						if (strcmp($stime, $cmp_etime)<=0 && strcmp($etime, $cmp_stime)>=0) {
							$error="&lt;".$name." code=\"".$code."\" owner=\"".$owner['code']."\"&gt;, the timeframes are overlapping: [".$stime.", ".$etime."] and [".$cmp_stime.", ".$cmp_etime."]";
							return FALSE;
						}
					}
				}
			}
		}
	}
	return TRUE;
}

/******************************************************************************************************
* Function to check existence of an object in the DB, with no possible time overlap
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_timeframe($name, $key, $code, $stime, $etime, $owners, &$error) {
	
	global $warnings;
	
	// Format times
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	if (empty($etime)) {
		$etime="9999-12-31 23:59:59";
	}
	
	// If already in database, send a warning
	$rows=v1_get_id_times($key, $code, $owners);
	
	foreach ($rows as $row) {
		// Check time
		
		// Format times
		if (empty($row[$key.'_stime'])) {
			$cmp_stime="0000-00-00 00:00:00";
		}
		else {
			$cmp_stime=$row[$key.'_stime'];
		}
		if (empty($row[$key.'_etime'])) {
			$cmp_etime="9999-12-31 23:59:59";
		}
		else {
			$cmp_etime=$row[$key.'_etime'];
		}
		
		// If start time is same, warning only
		if ($stime==$cmp_stime) {
			// Warning: already in database
			$warning_msg=$name." code=\"".$code."\"";
			// 1st owner
			if (!empty($owners[0])) {
				$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
			}
			// 2nd owner
			if (!empty($owners[1])) {
				$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
			}
			// 3rd owner
			if (!empty($owners[2])) {
				$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
			}
			$warning_msg.=" startTime=\"".$stime."\"";
			array_push($warnings, $warning_msg);
		}
		else {
			// No error = only if end time strictly before compared start time OR start time strictly after compared end time
			if (strcmp($stime, $cmp_etime)<=0 && strcmp($etime, $cmp_stime)>=0) {
				$error="&lt;".$name." code=\"".$code."\" owner1=\"".$owners[0]['code']."\"&gt;, the timeframe [".$stime.", ".$etime."] overlaps with existing data in database [".$cmp_stime.", ".$cmp_etime."]";
				return FALSE;
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check existence of an object in the DB, with no possible time overlap
* version:2 --> add $guest_table and $guest_code
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_timeframe2($name, $key, $code, $stime, $etime, $owners, $guest_table, $guest_code, &$error) {
	global $warnings;
	// Format times
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	if (empty($etime)) {
		$etime="9999-12-31 23:59:59";
	}
	
	// If already in database, send a warning
	$rows=v1_get_id_times2($key, $code, $owners, $guest_table, $guest_code);
	
	foreach ($rows as $row) {
		// Check time
		// Format times
		if (empty($row[$key.'_stime'])) {
			$cmp_stime="0000-00-00 00:00:00";
		}else {
			$cmp_stime=$row[$key.'_stime'];
		}
		if (empty($row[$key.'_etime'])) {
			$cmp_etime="9999-12-31 23:59:59";
		}else {
			$cmp_etime=$row[$key.'_etime'];
		}
		
		// If start time is same, warning only
		if ($stime==$cmp_stime) {
			// Warning: already in database
			$warning_msg=$name." code=\"".$code."\"";
			// 1st owner
			if (!empty($owners[0])) {
				$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
			}
			// 2nd owner
			if (!empty($owners[1])) {
				$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
			}
			// 3rd owner
			if (!empty($owners[2])) {
				$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
			}
			$warning_msg.=" startTime=\"".$stime."\"";
			array_push($warnings, $warning_msg);
		}
		else {
			// No error = only if end time strictly before compared start time OR start time strictly after compared end time
			if (strcmp($stime, $cmp_etime)<=0 && strcmp($etime, $cmp_stime)>=0) {
				$error="&lt;".$name." code=\"".$code."\" owner1=\"".$owners[0]['code']."\"&gt;, the timeframe [".$stime.", ".$etime."] overlaps with existing data in database [".$cmp_stime.", ".$cmp_etime."]";
				return FALSE;
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check existence of an object in the DB, with no possible time overlap
* version:2 --> add $guest_table and $guest_code
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_timeframe3($name, $key, $code, $stime, $etime, $owners, $guest_table, $guest_code, $gguest_table, $gguest_code, &$error) {
	global $warnings;
	// Format times
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	if (empty($etime)) {
		$etime="9999-12-31 23:59:59";
	}
	
	// If already in database, send a warning
	$rows=v1_get_id_times3($key, $code, $owners, $guest_table, $guest_code, $gguest_table, $gguest_code);
	
	foreach ($rows as $row) {
		// Check time
		// Format times
		if (empty($row[$key.'_stime'])) {
			$cmp_stime="0000-00-00 00:00:00";
		}else {
			$cmp_stime=$row[$key.'_stime'];
		}
		if (empty($row[$key.'_etime'])) {
			$cmp_etime="9999-12-31 23:59:59";
		}else {
			$cmp_etime=$row[$key.'_etime'];
		}
		
		// If start time is same, warning only
		if ($stime==$cmp_stime) {
			// Warning: already in database
			$warning_msg=$name." code=\"".$code."\"";
			// 1st owner
			if (!empty($owners[0])) {
				$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
			}
			// 2nd owner
			if (!empty($owners[1])) {
				$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
			}
			// 3rd owner
			if (!empty($owners[2])) {
				$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
			}
			$warning_msg.=" startTime=\"".$stime."\"";
			array_push($warnings, $warning_msg);
		}
		else {
			// No error = only if end time strictly before compared start time OR start time strictly after compared end time
			if (strcmp($stime, $cmp_etime)<=0 && strcmp($etime, $cmp_stime)>=0) {
				$error="&lt;".$name." code=\"".$code."\" owner1=\"".$owners[0]['code']."\"&gt;, the timeframe [".$stime.", ".$etime."] overlaps with existing data in database [".$cmp_stime.", ".$cmp_etime."]";
				return FALSE;
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check existence of an object in the DB, with no possible time overlap
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_check_db_cn($name, $key, $code, $stime, $etime, $owners, &$error) {
	
	global $warnings;
	
	// Format times
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	if (empty($etime)) {
		$etime="9999-12-31 23:59:59";
	}

	// If already in database, send a warning
	$rows=v1_get_id_cn($key, $code, $owners);  // Get cn_id, cn_stime, cn_etime from this function 
	
	
	foreach ($rows as $row) {
		// Check time

		// Format times
		if (empty($row['cn_stime'])) {
			$cmp_stime="0000-00-00 00:00:00";
		}
		else {
			$cmp_stime=$row['cn_stime'];
		}
		if (empty($row['cn_etime'])) {
	
			$cmp_etime="9999-12-31 23:59:59";
		}
		else {
			$cmp_etime=$row['cn_etime'];
		}
		
		// If start time is same, warning only
		if ($stime==$cmp_stime) {
			// Warning: already in database
			$warning_msg=$name." code=\"".$code."\"";
			// 1st owner
			if (!empty($owners[0])) {
				$warning_msg.=" owner1=\"".$owners[0]['code']."\"";
			}
			// 2nd owner
			if (!empty($owners[1])) {
				$warning_msg.=" owner2=\"".$owners[1]['code']."\"";
			}
			// 3rd owner
			if (!empty($owners[2])) {
				$warning_msg.=" owner3=\"".$owners[2]['code']."\"";
			}
			$warning_msg.=" startTime=\"".$stime."\"";
			array_push($warnings, $warning_msg);
		}
		else {
			// No error = only if end time strictly before compared start time OR start time strictly after compared end time
			if (strcmp($stime, $cmp_etime)<=0 && strcmp($etime, $cmp_stime)>=0) {
				$error="&lt;".$name." code=\"".$code."\" owner1=\"".$owners[0]['code']."\"&gt;, the timeframe [".$stime.", ".$etime."] overlaps with existing data in database [".$cmp_stime.", ".$cmp_etime."]";
				return FALSE;
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check that the time RSAM-SSAM objects are correct
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkRSAM-SSAM' instruction from automaton file
* 			- $class: the RSAM-SSAM class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v1_check_rsam_ssam($object, $sam_stime, $sam_stime_unc, $sam_etime, $sam_etime_unc, $interval, $interval_unc, &$error) {
	
	// Get RSAM and SSAM data
	$elements=$object['value'];
	$l_elements=count($elements);
	$rsam_found=FALSE;
	$ssam_found=FALSE;
	for ($i=0; $i<$l_elements; $i++) {
		$element=$elements[$i];
		
		if ($element['tag']=="RSAM") {
			$rsam_found=TRUE;
			$rsam_stime=array();
			$rsam_stime_unc=array();
			
			// Loop on elements
			$rsam_data=$element['value'];
			$l_rsam_data=count($rsam_data);
			
			for ($j=0; $j<$l_rsam_data; $j++) {
				$rsam_datum=$rsam_data[$j];
				
				// Get start time
				$rsm_stime=xml_get_ele($rsam_datum, "STARTTIME");
				$rsm_stime_unc=xml_get_ele($rsam_datum, "STARTTIMEUNC");
				
				// Store
				$rsam_stime[$j]=$rsm_stime;
				$rsam_stime_unc[$j]=$rsm_stime_unc;
			}
		}
		
		if ($element['tag']=="SSAM") {
			$ssam_found=TRUE;
			$ssam_stime=array();
			$ssam_stime_unc=array();
			$ssam_lowf=array();
			$ssam_highf=array();
			
			// Loop on elements
			$ssam_data=$element['value'];
			$l_ssam_data=count($ssam_data);
			
			for ($j=0; $j<$l_ssam_data; $j++) {
				$ssam_datum=$ssam_data[$j];
				
				// Get start time, low and high frequency
				$ssm_stime=xml_get_ele($ssam_datum, "STARTTIME");
				$ssm_stime_unc=xml_get_ele($ssam_datum, "STARTTIMEUNC");
				$ssm_lowf=xml_get_ele($ssam_datum, "LOWFREQ");
				$ssm_highf=xml_get_ele($ssam_datum, "HIGHFREQ");
				
				// Store
				$ssam_stime[$j]=$ssm_stime;
				$ssam_stime_unc[$j]=$ssm_stime_unc;
				$ssam_lowf[$j]=$ssm_lowf;
				$ssam_highf[$j]=$ssm_highf;
			}
		}
	}
	
	// If no data was found, nothing to check
	if (!$rsam_found && !$ssam_found) {
		return TRUE;
	}
	
	// Datetime functions
	require_once "php/funcs/datetime_funcs.php";
	
	// Calculate minimum and maximum open time for RSAM-SSAM
	if ($sam_stime_unc==NULL) {
		$min_open_time=$sam_stime;
		$max_open_time=$sam_stime;
	}
	else {
		if (!datetime_get_min_max($sam_stime, $sam_stime_unc, $min_open_time, $max_open_time, $local_error)) {
			// Error
			$error=array();
			$error['code']=1222;
			$error['message']="Error when trying to calculate minimum and maximum open time for RSAM-SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Calculate min end time and max end time for RSAM-SSAM
	if ($sam_etime_unc==NULL) {
		$min_close_time=$sam_etime;
		$max_close_time=$sam_etime;
	}
	else {
		if (!datetime_get_min_max($sam_etime, $sam_etime_unc, $min_close_time, $max_close_time, $local_error)) {
			// Error
			$error=array();
			$error['code']=1222;
			$error['message']="Error when trying to calculate minimum and maximum end time for RSAM-SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Calculate int_min and int_max
	if ($interval_unc==NULL) {
		$interval_min=$interval;
		$interval_max=$interval;
	}
	else {
		$interval_min=$interval-$interval_unc;
		$interval_max=$interval+$interval_unc;
	}
	
	// If RSAM found, check it
	if ($rsam_found) {
		// Check RSAM
		
		// Check RSAM first start date
		
		// Sort RSAM array by start date
		if (!array_multisort($rsam_stime, $rsam_stime_unc)) {
			// Server error
			$error=array();
			$error['code']=3407;
			$error['message']="Error when trying to sort dates of RSAM data";
			return FALSE;
		}
		
		// Calculate minimum and maximum start time for RSAM
		if ($rsam_stime_unc[0]==NULL) {
			$min_rsam_stime=$rsam_stime[0];
			$max_rsam_stime=$rsam_stime[0];
		}
		else {
			if (!datetime_get_min_max($rsam_stime[0], $rsam_stime_unc[0], $min_rsam_stime, $max_rsam_stime, $local_error)) {
				// Error
				$error=array();
				$error['code']=1224;
				$error['message']="Error when trying to calculate minimum and maximum start time for RSAM: ".$local_error;
				return FALSE;
			}
		}
		
		// If max_rsam_stime < min_open_time => error
		if (!datetime_date_before_date($max_rsam_stime, $min_open_time, $is_before, $local_error)) {
			// Error
			$error=array();
			$error['code']=1231;
			$error['message']="Error when trying to compare start time for RSAM: ".$local_error;
			return FALSE;
		}
		if ($is_before==0) {
			// Error
			$error=array();
			$error['code']=2;
			$error['message']="'RSAM' start time is earlier than 'RSAM-SSAM': ".$max_rsam_stime." < ".$min_open_time;
			return FALSE;
		}
		
		// Check intervals between each RSAM time
		
		// 1st time - calculate t1_min and t1_max
		if ($rsam_stime_unc[0]==NULL) {
			$t1_min=$rsam_stime[0];
			$t1_max=$rsam_stime[0];
		}
		else {
			if (!datetime_get_min_max($rsam_stime[0], $rsam_stime_unc[0], $t1_min, $t1_max, $local_error)) {
				// Error
				$error=array();
				$error['code']=1227;
				$error['message']="Error when trying to calculate minimum and maximum start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		// Calculate last time
		if ($rsam_stime_unc[$l_rsam_data-1]==NULL) {
			$t2_min=$rsam_stime[$l_rsam_data-1];
			$t2_max=$rsam_stime[$l_rsam_data-1];
		}
		else {
			if (!datetime_get_min_max($rsam_stime[$l_rsam_data-1], $rsam_stime_unc[$l_rsam_data-1], $t2_min, $t2_max, $local_error)) {
				// Error
				$error=array();
				$error['code']=1228;
				$error['message']="Error when trying to calculate minimum and maximum start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		// Check RSAM end time
		
		// Calculate min end time and max end time for RSAM
		if (!datetime_add_seconds($t2_min, $interval_min, $min_rsam_etime, $local_error)) {
			// Error
			$error=array();
			$error['code']=1233;
			$error['message']="Error when trying to calculate minimum end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if (!datetime_add_seconds($t2_max, $interval_max, $max_rsam_etime, $local_error)) {
			// Error
			$error=array();
			$error['code']=1234;
			$error['message']="Error when trying to calculate maximum end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		
		// If min_rsam_etime > max_close_time => error
		if (!datetime_date_before_date($min_rsam_etime, $max_close_time, $is_before, $local_error)) {
			// Error
			$error=array();
			$error['code']=1231;
			$error['message']="Error when trying to compare end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==2) {
			// Error
			$error=array();
			$error['code']=2;
			$error['message']="'RSAM' end time is later than 'RSAM-SSAM': ".$max_rsam_etime." > ".$max_close_time;
			$l_errors++;
			return FALSE;
		}
	}
	
	// If SSAM found, check it
	if ($ssam_found) {
		// Check SSAM
		
		// Sort SSAM array by start date and low frequency
		if (!array_multisort($ssam_stime, $ssam_lowf, $ssam_stime_unc, $ssam_highf)) {
			// Server error
			$error=array();
			$error['code']=3408;
			$error['message']="Error when trying to sort dates and low frequency of SSAM data";
			$l_errors++;
			return FALSE;
		}
		
		// Check first date of SSAM
		
		// Calculate minimum and maximum start time for SSAM
		if ($ssam_stime_unc[0]==NULL) {
			$min_ssam_stime=$ssam_stime[0];
			$max_ssam_stime=$ssam_stime[0];
		}
		else {
			if (!datetime_get_min_max($ssam_stime[0], $ssam_stime_unc[0], $min_ssam_stime, $max_ssam_stime, $local_error)) {
				// Error
				$error=array();
				$error['code']=1224;
				$error['message']="Error when trying to calculate minimum and maximum start time for SSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		// If max_ssam_stime < min_open_time => error
		if (!datetime_date_before_date($max_ssam_stime, $min_open_time, $is_before, $local_error)) {
			// Error
			$error=array();
			$error['code']=1231;
			$error['message']="Error when trying to compare start time for SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==0) {
			// Error
			$error=array();
			$error['code']=2;
			$error['message']="'SSAM' start time is earlier than 'RSAM-SSAM': ".$max_ssam_stime." < ".$min_open_time;
			$l_errors++;
			return FALSE;
		}
		
		// Check intervals between each SSAM time
		
		// 1st time - calculate t1_min and t1_max
		if ($ssam_stime_unc[0]==NULL) {
			$t1_min=$ssam_stime[0];
			$t1_max=$ssam_stime[0];
		}
		else {
			if (!datetime_get_min_max($ssam_stime[0], $ssam_stime_unc[0], $t1_min, $t1_max, $local_error)) {
				// Error
				$error=array();
				$error['code']=1227;
				$error['message']="Error when trying to calculate minimum and maximum start time for SSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		$stime1=$ssam_stime[0];
		$highf1=$ssam_highf[0];
		
		// Minimum low frequency and maximum high frequency
		$min_low_freq=$ssam_lowf[0];
		$max_high_freq=NULL;
		
		// Calculate last time
		if ($ssam_stime_unc[$l_ssam_data-1]==NULL) {
			$t2_min=$ssam_stime[$l_ssam_data-1];
			$t2_max=$ssam_stime[$l_ssam_data-1];
		}
		else {
			if (!datetime_get_min_max($ssam_stime[$l_ssam_data-1], $ssam_stime_unc[$l_ssam_data-1], $t2_min, $t2_max, $local_error)) {
				// Error
				$error=array();
				$error['code']=1228;
				$error['message']="Error when trying to calculate minimum and maximum last time for SSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		// Check SSAM end time
		
		// Calculate min end time and max end time for SSAM
		if (!datetime_add_seconds($t2_min, $interval_min, $min_ssam_etime, $local_error)) {
			// Error
			$error=array();
			$error['code']=1233;
			$error['message']="Error when trying to calculate minimum end time for SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if (!datetime_add_seconds($t2_max, $interval_max, $max_ssam_etime, $local_error)) {
			// Error
			$error=array();
			$error['code']=1234;
			$error['message']="Error when trying to calculate maximum end time for SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		
		// If min_ssam_etime > max_close_time => error
		if (!datetime_date_before_date($min_ssam_etime, $max_close_time, $is_before, $local_error)) {
			// Error
			$error=array();
			$error['code']=1231;
			$error['message']="Error when trying to compare end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==2) {
			// Error
			$error=array();
			$error['code']=2;
			$error['message']="'SSAM' end time is later than 'RSAM-SSAM': ".$max_ssam_etime." > ".$max_close_time;
			$l_errors++;
			return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to record the important informations of an object in session
* Returns nothing
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_record_obj($key, $code, $data) {
	
	global $checked_data;
	global $xml_id_cnt;
	
	if (!isset($checked_data[$key])) {
		$checked_data[$key]=array();
	}
	
	if (!isset($checked_data[$key][$code])) {
		$checked_data[$key][$code]=array();
	}
	
	// XML ID
	$data['xml_id']=$xml_id_cnt;
	$xml_id_cnt++;
	
	array_push($checked_data[$key][$code], $data);
	
}

/******************************************************************************************************
* Function to get the owners of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* 			- $developer: a boolean to tell whether the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* Output:	- $owners: an array of owners ID
* 				- $error: an error message and its code
******************************************************************************************************/
function v1_get_owners($object, &$error) {

	// XML functions
	require_once "php/funcs/xml_funcs.php";
	// DB functions
	require_once "php/funcs/db_funcs.php";
	// Static list of owners.. to reset owners-array when first called
	static $owners_list=array();
	
	// Global list of general owners
	global $gen_owners, $developer, $user_upload;
	
	// Prepare result
	$owners=array();
	$error=array();
	
	// Array of attributes name
	$owner_att_names=array("OWNER1", "OWNER2", "OWNER3");
	
	// Get owners
	foreach ($owner_att_names as $owner_att_name) {
		$code=xml_get_att($object, $owner_att_name);
		if (!empty($code)) {
			$owner=array();
			$owner['code']=$code;
			$found=FALSE;
			// Check if code was already searched before
			foreach ($owners_list as $owner_listed) {
				if ($code!=$owner_listed['code']) {
					continue;
				}
				// Get ID
				$id=$owner_listed['id'];
				$owner['id']=$id;
				$found=TRUE;
				break;
			}
			// If not found in list, query DB
			if (!$found) {
				$id=db_get_cc_id($code);
				if (empty($id)) {
					$error['code']=9;
					$error['message']="There is no owner with such code: \"".$code."\"";
					return FALSE;
				}
				$owner['id']=$id;
				// Add to list of owners
				array_push($owners_list, $owner);
			}
			// Add to owners array
			array_push($owners, $owner);
		}
	}

	// If loader is not a developer, check permission to upload data for these owners
	if (!$developer && !empty($owners)) {
		// Local variables
		$found=array();
		foreach ($owners as $owner) {
			array_push($found, FALSE);
		}
		// Loop on array of users who permitted user to upload data for them
		for ($i=0; $i<count($user_upload['id']); $i++) {
			// For each owner
			foreach ($owners as $key => $owner) {
				if ($user_upload['id'][$i]==$owner) {
					$found[$key]=TRUE;
				}
			}
		}
		// Check owners were found
		foreach ($found as $key => $found_owner) {
			// Check boolean
			if (!$found_owner) {
				$error['code']=3;
				$error['message']="You do not have the rights to upload for '".$owners[$key]."'. If you wish to be granted this permission, please contact them directly.";
				return FALSE;
			}
		}
	}
	
	// Store owners in list
	array_unshift($gen_owners, $owners);
	
	return TRUE;
}

/******************************************************************************************************
* Function to store the final owners of an object
* Returns FALSE if no owner found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
******************************************************************************************************/
function v1_set_owners(&$object) {
	
	// Global list of general owners
	global $gen_owners;
	
	// Loop on owners
	foreach ($gen_owners as $owners) {
		if (!empty($owners)) {
			$object['results']['owners']=$owners;
			return TRUE;
		}
	}
	
	return FALSE;
}

/******************************************************************************************************
* Function to get the vd_id of an object
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $object: a WOVOML object
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_get_vd_id($object, &$error) {
	
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// DB functions
	require_once "php/funcs/db_funcs.php";
	
	// Static list of volcanoes
	static $volcanoes_list=array();
	
	// Global list of general vd_ids
	global $gen_vd_ids;
	
	// Prepare result
	$vd_id=NULL;
	
	$vd_code=xml_get_att($object, "VOLCANO");
	if (!empty($vd_code)) {
		$found=FALSE;
		// Check if code was already searched before
		foreach ($volcanoes_list as $volcano_listed) {
			if ($vd_code!=$volcano_listed['code']) {
				continue;
			}
			// Get ID
			$vd_id=$volcano_listed['id'];
			$found=TRUE;
			break;
		}
		// If not found in list
		if (!$found) {
			$vd_id=db_get_vd_id($vd_code);
			if (empty($vd_id)) {
				$error['code']=9;
				$error['message']="There is no volcano with such CAVW number: \"".$vd_code."\"";
				return FALSE;
			}
			// Add to list of volcanoes
			$volcano=array();
			$volcano['code']=$vd_code;
			$volcano['id']=$vd_id;
			array_push($volcanoes_list, $volcano);
		}
	}
	
	// Store vd_id in list
	array_unshift($gen_vd_ids, $vd_id);
	
	return TRUE;
}

/******************************************************************************************************
* Function to store the final vd_id of an object
* Returns FALSE if no vd_id found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
******************************************************************************************************/
function v1_set_vd_id(&$object) {
	
	// Global list of general vd_ids
	global $gen_vd_ids;
	
	// Prepare result
	$object['results']['vd_id']=NULL;
	
	// Loop on vd_ids
	foreach ($gen_vd_ids as $vd_id) {
		if (!empty($vd_id)) {
			$object['results']['vd_id']=$vd_id;
			return TRUE;
		}
	}
	
	return FALSE;
}

/******************************************************************************************************
* Function to get the eruption code of an object
* Returns nothing
* Input:	- $object: a WOVOML object
******************************************************************************************************/
function v1_get_eruption($object) {
	
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// Global list of eruptions
	global $gen_eruptions;
	
	// Get code
	$ed_code=xml_get_att($object, "ERUPTION");

	// Store eruption in list
	array_unshift($gen_eruptions, $ed_code);
}

/******************************************************************************************************
* Function to store the final ed_id of an object
* Returns FALSE if no ed_id found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_set_eruption(&$object, $ed_xxx_name, $ed_xxx_code, $ed_xxx_stime, $ed_xxx_stime_is_bc, $ed_xxx_etime, $ed_xxx_etime_is_bc, $vd_id, &$error) {
	
	// Global list of eruptions
	global $gen_eruptions;
	global $checked_data;
	
	// Static list of eruptions
	static $eruptions_list=array();
	
	// Prepare result
	$object['results']['ed_id']=NULL;
	$eruption_found=array();
	
	// Get owners
	$owners=$object['results']['owners'];
	
	// Loop on eruption codes
	foreach ($gen_eruptions as $gen_eruption) {
		if (!empty($gen_eruption)) {
			// Initialize booleans
			$found_list=FALSE;
			$found_db=FALSE;
			
			// Find in list
			foreach ($eruptions_list as $eruption_listed) {
				// Check code
				if ($gen_eruption!=$eruption_listed['code']) {
					continue;
				}
				// Same code found
				else {
					// Check owners
					$found_owner=FALSE;
					foreach ($owners as $owner) {
						foreach ($eruption_listed['owners'] as $cmp_owner) {
							if ($owner['id']==$cmp_owner['id']) {
								// Owner found
								$found_owner=TRUE;
								break;
							}
						}
						if (!$found_owner) {
							continue;
						}
					}
					if (!$found_owner) {
						continue;
					}
				}
				
				// Get information
				$eruption_found=$eruption_listed;
				$found_list=TRUE;
				break;
			}
			
			// If not found in list
			if (!$found_list) {
				// Search in DB
				$ed=db_get_eruption($gen_eruption, $owners);
				
				// Format
				if (!empty($ed)) {
					$found_db=TRUE;
					$eruption_found=array();
					$eruption_found['id']=$ed['ed_id'];
					$eruption_found['code']=$gen_eruption;
					$eruption_found['owners']=array();
					$eruption_found['owners'][0]['id']=$ed['cc_id'];
					$eruption_found['owners'][1]['id']=$ed['cc_id2'];
					$eruption_found['owners'][2]['id']=$ed['cc_id3'];
					$eruption_found['vd_id']=$ed['vd_id'];
					if (empty($ed['ed_stime_bc'])) {
						$eruption_found['stime']=$ed['ed_stime'];
						$eruption_found['stime_is_bc']=FALSE;
					}
					else {
						$eruption_found['stime']=$ed['ed_stime_bc'].substr($ed['ed_stime'], 4);
						$eruption_found['stime_is_bc']=TRUE;
					}
					if (empty($ed['ed_etime_bc'])) {
						$eruption_found['etime']=$ed['ed_etime'];
						$eruption_found['etime_is_bc']=FALSE;
					}
					else {
						$eruption_found['etime']=$ed['ed_etime_bc'].substr($ed['ed_etime'], 4);
						$eruption_found['etime_is_bc']=TRUE;
					}
				}
			}
				
			// If not found in DB either
			if (!$found_list && !$found_db) {
				// Search in XML
				if (isset($checked_data['ed'][$gen_eruption])) {
					$eruptions=$checked_data['ed'][$gen_eruption];
					// Loop on eruptions
					foreach ($eruptions as $eruption) {
						// Check owners
						$found_owner=FALSE;
						foreach ($owners as $owner) {
							foreach ($eruption['owners'] as $cmp_owner) {
								if ($owner['id']==$cmp_owner['id']) {
									// Owner found
									$found_owner=TRUE;
									break;
								}
							}
							if (!$found_owner) {
								continue;
							}
						}
						if (!$found_owner) {
							continue;
						}
						
						// Get eruption information
						$eruption_found=$eruption;
						$eruption_found['id']="@".$eruption['xml_id'];
						$eruption_found['code']=$gen_eruption;
						break;
					}
				}
				else {
					$error=array();
					$error['code']=9;
					$error['message']="There is no eruption with such code: \"".$gen_eruption."\"";
					return FALSE;
				}
			}
			
			if (!empty($eruption_found)) {
				break;
			}
		}
	}

	// If no eruption found, return a NULL value - later maybe considered as missing information
	if (empty($eruption_found)) {
		$object['results']['ed_id']=NULL;
		return TRUE;
	}
	
	// Check vd_id
	if (!empty($vd_id)) {
		if ($vd_id!=$eruption_found['vd_id']) {
			$error=array();
			$error['code']=2;
			$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, eruption and volcano do not match";
			return FALSE;
		}
	}
	else {
		$object['results']['vd_id']=$eruption_found['vd_id'];
	}
	
	// Check time inclusion (time included in eruption)
	// Eruption start time < Phase start time
	if (!empty($eruption_found['stime']) && !empty($ed_xxx_stime)) {
		if ($eruption_found['stime_is_bc'] && $ed_xxx_stime_is_bc) {
			if (strcmp($eruption_found['stime'], $ed_xxx_stime)<0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, start time (".$ed_xxx_stime.") should be later than eruption start time (".$eruption_found['stime'].")";
				return FALSE;
			}
		}
		else {
			if (strcmp($eruption_found['stime'], $ed_xxx_stime)>0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, start time (".$ed_xxx_stime.") should be later than eruption start time (".$eruption_found['stime'].")";
				return FALSE;
			}
		}
	}
	// Eruption start time < Phase end time
	if (!empty($eruption_found['stime']) && !empty($ed_xxx_etime)) {
		if ($eruption_found['stime_is_bc'] && $ed_xxx_etime_is_bc) {
			if (strcmp($eruption_found['stime'], $ed_xxx_etime)<0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, end time (".$ed_xxx_etime.") should be later than eruption start time (".$eruption_found['stime'].")";
				return FALSE;
			}
		}
		else {
			if (strcmp($eruption_found['stime'], $ed_xxx_etime)>0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, start time (".$ed_xxx_etime.") should be earlier than eruption start time (".$eruption_found['stime'].")";
				return FALSE;
			}
		}
	}
	// Phase start time < Eruption end time
	if (!empty($ed_xxx_stime) && !empty($eruption_found['etime'])) {
		if ($ed_xxx_stime_is_bc && $eruption_found['etime_is_bc']) {
			if (strcmp($ed_xxx_stime, $eruption_found['etime'])<0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, start time (".$ed_xxx_stime.") should be earlier than eruption end time (".$eruption_found['etime'].")";
				return FALSE;
			}
		}
		else {
			if (strcmp($ed_xxx_stime, $eruption_found['etime'])>0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, start time (".$ed_xxx_stime.") should be earlier than eruption end time (".$eruption_found['etime'].")";
				return FALSE;
			}
		}
	}
	// Phase end time < Eruption end time
	if (!empty($ed_xxx_etime) && !empty($eruption_found['etime'])) {
		if ($ed_xxx_etime_is_bc && $eruption_found['etime_is_bc']) {
			if (strcmp($ed_xxx_etime, $eruption_found['etime'])<0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, end time (".$ed_xxx_etime.") should be earlier than eruption end time (".$eruption_found['etime'].")";
				return FALSE;
			}
		}
		else {
			if (strcmp($ed_xxx_etime, $eruption_found['etime'])>0) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, end time (".$ed_xxx_etime.") should be earlier than eruption end time (".$eruption_found['etime'].")";
				return FALSE;
			}
		}
	}

	// If not from list, add to list of eruptions
	if (!$found_list) {
		array_push($eruptions_list, $eruption_found);
	}
	
	$object['results']['ed_id']=$eruption_found['id'];
	return TRUE;
}

/******************************************************************************************************
* Function to get the eruption code of an object
* Returns nothing
* Input:	- $object: a WOVOML object
******************************************************************************************************/
function v1_get_data($object, $att_name, &$global_var) {
	
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// Get code
	$code=xml_get_att($object, $att_name);

	// Store eruption in list
	array_unshift($global_var, $code);
}

/******************************************************************************************************
* Function to store the final ed_id of an object
* Returns FALSE if no ed_id found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_set_data(&$object, $name, $key, $global_var, &$error) {
	
	// Global list of eruptions
	global $checked_data;
	
	// Static list of data
	static $data_list=array();
	
	// Prepare result
	$object['results'][$key.'_id']=NULL;
	$data_found=array();
	
	// Get owners
	$owners=$object['results']['owners'];
	
	// Loop on eruption codes
	foreach ($global_var as $gen_code) {
		if (!empty($gen_code)) {
			// Initialize booleans
			$found_list=FALSE;
			$found_db=FALSE;
			
			// Find in list
			foreach ($data_list as $data_listed) {
				// Check code
				if ($gen_code!=$data_listed['code']) {
					continue;
				}
				// Same code found
				else {
					// Check owners
					$found_owner=FALSE;
					foreach ($owners as $owner) {
						foreach ($data_listed['owners'] as $cmp_owner) {
							if ($owner['id']==$cmp_owner['id']) {
								// Owner found
								$found_owner=TRUE;
								break;
							}
						}
						if (!$found_owner) {
							continue;
						}
					}
					if (!$found_owner) {
						continue;
					}
				}
				
				// Get information
				$data_found=$data_listed;
				$found_list=TRUE;
				break;
			}
			
			// If not found in list
			if (!$found_list) {
				// Search in DB
				$data=db_get_data($key, $gen_code, $owners);
				
				// Format
				if (!empty($data)) {
					$found_db=TRUE;
					$data_found=array();
					$data_found['id']=$data[$key.'_id'];
					$data_found['code']=$gen_code;
					$data_found['owners']=array();
					$data_found['owners'][0]['id']=$data['cc_id'];
					$data_found['owners'][1]['id']=$data['cc_id2'];
					$data_found['owners'][2]['id']=$data['cc_id3'];
				}
			}
			
			// If not found in DB either
			if (!$found_list && !$found_db) {
				// Search in XML
				if (isset($checked_data[$key][$gen_code])) {
					$data=$checked_data[$key][$gen_code];
					// Loop on eruptions
					foreach ($data as $datum) {
						// Check owners
						$found_owner=FALSE;
						foreach ($owners as $owner) {
							foreach ($datum['owners'] as $cmp_owner) {
								if ($owner['id']==$cmp_owner['id']) {
									// Owner found
									$found_owner=TRUE;
									break;
								}
							}
							if (!$found_owner) {
								continue;
							}
						}
						if (!$found_owner) {
							continue;
						}
						
						// Get eruption information
						$data_found=$datum;
						$data_found['id']="@".$datum['xml_id'];
						$data_found['code']=$gen_code;
						break;
					}
				}
				else {
					$error=array();
					$error['code']=9;
					$error['message']="There is no ".$name." with such code: \"".$gen_code."\"";
					return FALSE;
				}
			}
			
			if (!empty($data_found)) {
				break;
			}
		}
	}

	// If no eruption found, return a NULL value - later maybe considered as missing information
	if (empty($data_found)) {
		$object['results'][$key.'_id']=NULL;
		return TRUE;
	}
	
	// If not from list, add to list of eruptions
	if (!$found_list) {
		array_push($data_list, $data_found);
	}
	
	$object['results'][$key.'_id']=$data_found['id'];
	return TRUE;
}

/******************************************************************************************************
* Function to get the phase code of an object
* Returns nothing
* Input:	- $object: a WOVOML object
******************************************************************************************************/
function v1_get_phase($object) {
	
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// Global list of eruptions
	global $gen_phases;
	
	// Get code
	$ed_phs_code=xml_get_att($object, "PHASE");

	// Store eruption in list
	array_unshift($gen_phases, $ed_phs_code);
}

/******************************************************************************************************
* Function to store the final ed_phs_id of an object
* Returns FALSE if an error was found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_set_phase(&$object, $ed_xxx_name, $ed_xxx_code, $ed_xxx_time, $ed_id, $vd_id, &$error) {
	
	// Global list of eruptions
	global $gen_phases;
	global $checked_data;
	
	// Static list of eruptions
	static $phases_list=array();
	
	// Prepare result
	$object['results']['ed_phs_id']=NULL;
	$phase_found=array();
	
	// Get owners
	$owners=$object['results']['owners'];
	
	// Loop on eruption codes
	foreach ($gen_phases as $gen_phase) {
		if (!empty($gen_phase)) {
			// Initialize booleans
			$found_list=FALSE;
			$found_db=FALSE;
			
			// Find in list
			foreach ($phases_list as $phase_listed) {
				// Check code
				if ($gen_phase!=$phase_listed['code']) {
					continue;
				}
				// Same code found
				else {
					// Check owners
					$found_owner=FALSE;
					foreach ($owners as $owner) {
						foreach ($phase_listed['owners'] as $cmp_owner) {
							if ($owner['id']==$cmp_owner['id']) {
								// Owner found
								$found_owner=TRUE;
								break;
							}
						}
						if (!$found_owner) {
							continue;
						}
					}
					if (!$found_owner) {
						continue;
					}
				}
				
				// Get information
				$phase_found=$phase_listed;
				$found_list=TRUE;
				break;
			}
			
			// If not found in list
			if (!$found_list) {
				// Search in DB
				$ed_phs=db_get_phase($gen_phase, $owners);
				
				// Format
				if (!empty($ed_phs)) {
					$found_db=TRUE;
					$phase_found=array();
					$phase_found['id']=$ed_phs['ed_phs_id'];
					$phase_found['ed_id']=$ed_phs['ed_id'];
					$phase_found['stime']=$ed_phs['ed_phs_stime'];
					$phase_found['code']=$gen_phase;
					$phase_found['owners']=array();
					$phase_found['owners'][0]['id']=$ed_phs['cc_id'];
					$phase_found['owners'][1]['id']=$ed_phs['cc_id2'];
					$phase_found['owners'][2]['id']=$ed_phs['cc_id3'];
				}
			}
				
			// If not found in DB either
			if (!$found_list && !$found_db) {
				// Search in XML
				if (isset($checked_data['ed_phs'][$gen_phase])) {
					$phases=$checked_data['ed_phs'][$gen_phase];
					// Loop on phases
					foreach ($phases as $phase) {
						// Check owners
						$found_owner=FALSE;
						foreach ($owners as $owner) {
							foreach ($phase['owners'] as $cmp_owner) {
								if ($owner['id']==$cmp_owner['id']) {
									// Owner found
									$found_owner=TRUE;
									break;
								}
							}
							if (!$found_owner) {
								continue;
							}
						}
						if (!$found_owner) {
							continue;
						}
						
						// Get phase information
						$phase_found=$phase;
						$phase_found['id']="@".$phase['xml_id'];
						$phase_found['code']=$gen_phase;
						break;
					}
				}
				else {
					$error=array();
					$error['code']=9;
					$error['message']="There is no phase with such code: \"".$gen_phase."\"";
					return FALSE;
				}
			}
			
			if (!empty($phase_found)) {
				break;
			}
		}
	}
	
	// If no phase found, return a NULL value - later maybe considered as missing information
	if (empty($phase_found)) {
		$object['results']['ed_phs_id']=NULL;
		return TRUE;
	}
	
	// Check ed_id and vd_id
	if (!empty($phase_found['ed_id'])) {
		// Check ed_id
		if (!empty($ed_id)) {
			if ($ed_id!=$phase_found['ed_id']) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, phase and eruption do not match";
				return FALSE;
			}
		}
		else {
			$object['results']['ed_id']=$phase_found['ed_id'];
		}
		
		// Get information from phase's ed_id
		$vd_id_found=NULL;
		if (substr($phase_found['ed_id'], 0, 1)!="@") {
			// Find in DB
			// Connect to DB
			require "php/include/db_connect.php";
			
			// Create SQL query
			$sql="SELECT vd_id FROM ed WHERE ed_id='".mysql_real_escape_string($phase_found['ed_id'])."'";
			
			// Query DB
			$result=mysql_query($sql) or die(mysql_error());
			
			// Get result
			$results=mysql_fetch_array($result);
			
			$vd_id_found=$results['vd_id'];
		}
		else {
			// Find in XML
			foreach ($checked_data['ed'] as $checked_ed) {
				foreach ($checked_ed as $eruption) {
					if ($eruption['xml_id']!=substr($phase_found['ed_id'], 1)) {
						continue;
					}
					// Compare vd_id
					$vd_id_found=$eruption['vd_id'];
					break;
				}
				if (!empty($vd_id_found)) {
					break;
				}
			}
		}
		
		// Check vd_id
		if (!empty($vd_id)) {
			// Compare vd_id
			if ($vd_id!=$vd_id_found) {
				$error=array();
				$error['code']=2;
				$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, phase and volcano do not match";
				return FALSE;
			}	
		}
		else {
			$object['results']['vd_id']=$vd_id_found;
		}
	}
	
	// Check time (issue time < phase start time)
	if (!empty($ed_xxx_time) && !empty($phase_found['stime'])) {
		if (strcmp($ed_xxx_time, $phase_found['stime'])>0) {
			$error=array();
			$error['code']=2;
			$error['message']="In &lt;".$ed_xxx_name." code=\"".$ed_xxx_code."\"&gt;, issue time (".$ed_xxx_time.") should be earlier than Phase start time (".$phase_found['stime'].")";
			return FALSE;
		}
	}
	
	// If not from list, add to list of eruptions
	if (!$found_list) {
		array_push($phases_list, $phase_found);
	}
	
	$object['results']['ed_phs_id']=$phase_found['id'];
	return TRUE;
}

/******************************************************************************************************
* Function to get the eruption code of an object
* Returns nothing
* Input:	- $object: a WOVOML object
******************************************************************************************************/
function v1_get_ms($object, $att_name, &$global_var) {
	
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// Get code
	$code=xml_get_att($object, $att_name);

	// Store monitoring system in list
	array_unshift($global_var, $code);
}

/******************************************************************************************************
* Function to store the final ed_id of an object
* Returns FALSE if no ed_id found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_set_ms(&$object, $obj_name, $obj_code, $obj_stime, $obj_etime, $target_name, $target_key, $checked_key, $parent_key, $parent_id, $global_var, &$error) {
	
	// Global data
	global $checked_data;
	
	// Static list of eruptions
	static $ms_list=array();
	
	// Prepare result
	$object['results'][$target_key.'_id']=NULL;
	$ms_found=array();
	$search_code=NULL;
	
	// Format time
	if (empty($obj_stime)) {
		$obj_stime="0000-00-00 00:00:00";
	}
	if (empty($obj_etime)) {
		$obj_etime="9999-12-31 23:59:59";
	}
	
	// Get owners
	$owners=$object['results']['owners'];
	
	// Loop on general ms codes
	foreach ($global_var as $gen_code) {
		if (!empty($gen_code)) {
			$search_code=$gen_code;
			// Search in list
			foreach ($ms_list[$target_key] as $ms_listed) {
				// Check code
				if ($gen_code!=$ms_listed['code']) {
					continue;
				}
				// Same code found
				else {
					// Check owners
					$found_owner=FALSE;
					foreach ($owners as $owner) {
						foreach ($ms_listed['owners'] as $cmp_owner) {
							if ($owner['id']==$cmp_owner['id']) {
								// Possible link found (check times later)
								array_push($ms_found, $ms_listed);
								$found_owner=TRUE;
								break;
							}
						}
						if ($found_owner) {
							break;
						}
					}
				}
			}

			
			// Search in DB
			if ($checked_key=="dn" || $checked_key=="gn" || $checked_key=="hn" || $checked_key=="fn" || $checked_key=="tn" || $checked_key=="mn") {    
				$ms_rows=db_get_cn($gen_code, $checked_key, $parent_key, $owners);
			}
			else {
				$ms_rows=db_get_ms($gen_code, $target_key, $parent_key, $owners);
			}
			
			// Format
			if (!empty($ms_rows)) {
				foreach ($ms_rows as $ms_row) {
					$ms_to_check=array();
					$ms_to_check['id']=$ms_row[$target_key.'_id'];
					if ($parent_key!=NULL) {
						$ms_to_check[$parent_key.'_id']=$ms_row[$parent_key.'_id'];
					}
					// Format time
					if (empty($ms_row[$target_key.'_stime'])) {
						$ms_to_check['stime']="0000-00-00 00:00:00";
					}
					else {
						$ms_to_check['stime']=$ms_row[$target_key.'_stime'];
					}
					if (empty($ms_row[$target_key.'_etime'])) {
						$ms_to_check['etime']="9999-12-31 23:59:59";
					}
					else {
						$ms_to_check['etime']=$ms_row[$target_key.'_etime'];
					}
					$ms_to_check['code']=$gen_code;
					$ms_to_check['owners']=array();
					$ms_to_check['owners'][0]['id']=$ms_row['cc_id'];
					$ms_to_check['owners'][1]['id']=$ms_row['cc_id2'];
					$ms_to_check['owners'][2]['id']=$ms_row['cc_id3'];
					array_push($ms_found, $ms_to_check);
				}
			}
				
			// Search in XML
			if (isset($checked_data[$checked_key][$gen_code])) {
				$ms_data=$checked_data[$checked_key][$gen_code];
				// Loop on ms
				foreach ($ms_data as $ms) {
					// Check owners
					$found_owner=FALSE;
					foreach ($owners as $owner) {
						foreach ($ms['owners'] as $cmp_owner) {
							if ($owner['id']==$cmp_owner['id']) {
								// Owner found
								$ms['id']="@".$ms['xml_id'];
								$ms['code']=$gen_code;
								// Format time
								if (empty($ms['stime'])) {
									$ms['stime']="0000-00-00 00:00:00";
								}
								else {
									$ms['stime']=$ms['stime'];
								}
								if (empty($ms['etime'])) {
									$ms['etime']="9999-12-31 23:59:59";
								}
								else {
									$ms['etime']=$ms['etime'];
								}
								array_push($ms_found, $ms);
								$found_owner=TRUE;
								break;
							}
						}
						if ($found_owner) {
							break;
						}
					}
				}
			}
			
			if (empty($ms_found)) {
				$error=array();
				$error['code']=9;
				$error['message']="There is no ".$target_name." with such code: \"".$gen_code."\"";
				return FALSE;
			}
			
			break;
		}
	}

	// No ms code was given, return a NULL value - later maybe considered as missing information
	if (empty($ms_found)) {
		$object['results'][$target_key.'_id']=NULL;
		return TRUE;
	}
	
	$ms_selected=array();
	$selected=FALSE;
	// Loop on ms found
	foreach ($ms_found as $ms) {
		// Check time inclusion
		// Parent start time < Object start time
		if (!empty($ms['stime']) && !empty($obj_stime)) {
			if (strcmp($ms['stime'], $obj_stime)>0) {
				continue;
			}
		}
		// Object end time < Parent end time
		if (!empty($obj_etime) && !empty($ms['etime'])) {
			if (strcmp($obj_etime, $ms['etime'])>0) {
				continue;
			}
		}
		$ms_selected=$ms;
		$selected=TRUE;
		break;
	}
	
	if (!$selected) {
		$error=array();
		$error['code']=2;
		$error['message']="For &lt;".$obj_name." code=\"".$obj_code."\"&gt;, no ".$target_name." (code=\"".$search_code."\") was found to have a timeframe including [".$obj_stime.", ".$obj_etime."]";
		return FALSE;
	}

	
	// Check parent_id
	if (!empty($parent_id) && !empty($ms_selected[$parent_table_name.'_id'])) {
		if ($parent_id!=$ms_selected[$parent_table_name.'_id']) {
			$error=array();
			$error['code']=2;
			$error['message']="In &lt;".$obj_name." code=\"".$obj_code."\"&gt;, ".$target_name." and ".$parent_name." do not match";
			return FALSE;
		}
	}
	else {
		if (!empty($ms_selected[$parent_table_name.'_id'])) {
			$object['results'][$parent_key]=$ms_selected[$parent_table_name.'_id'];
		}
	}
	
	// If not from list, add to list of ms
	if (!isset($ms_selected['list'])) {
		$ms_selected['list']=TRUE;
		array_push($ms_list[$target_key], $ms_selected);
	}
	
	$object['results'][$target_key.'_id']=$ms_selected['id'];
	return TRUE;
}


/******************************************************************************************************
* Function to store the final ed_id of an object
* Returns FALSE if no ed_id found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_check_station_volcano($xs_key, $xs_id, $xs_code, $vd_id) {
	
	// Global data
	global $checked_data;
	
	// Static list of eruptions
	static $xs_list=array();
	
	// Local variables
	if ($xs_key=="s") {
		$xn_key="s";
	}
	else {
		$xn_key="c";
	}
	
	// Search in list
	if (isset($xs_list[$xs_id])) {
		// Compare volcanoes
		foreach ($xs_list[$xs_id] as $vd_id_cmp) {
			if ($vd_id_cmp==$vd_id) {
				return TRUE;
			}
		}
		// Volcano and station do not match
		return FALSE;
	}
	
	// If xs is in XML, get xn_id
	if (substr($xs_id, 0, 1)=="@") {
		$xs_id_xml=substr($xs_id, 1);
		// Search with xs_code
		$xs_data=$checked_data[$xs_key."s"][$xs_code];
		// Loop on xs
		foreach ($xs_data as $xs) {
			// Check ids
			if ($xs['xml_id']==$xs_id_xml) {
				// Found
				$xn_id=$xs[$xn_key.'n_id'];
				$xn_code=$xs[$xn_key.'n_code'];
				break;
			}
		}
	}
	// xs is in DB, query for xn_id
	else {
		// Connect to DB
		require "php/include/db_connect.php";
		
		// Create SQL query
		$sql="SELECT ".$xn_key."n_id FROM ".$xs_key."s WHERE ".$xs_key."s_id='".$xs_id."'";
		
		// Query DB
		$result=mysql_query($sql) or die(mysql_error());
		
		// Get result
		$results=mysql_fetch_array($result);
		
		$xn_id=$results[$xn_key.'n_id'];
	}
	
	// If xn is in XML
	if (substr($xn_id, 0, 1)=="@") {
		$xn_id_xml=substr($xn_id, 1);
		// Search with xn_code
		$xn_data=$checked_data[$xs_key."n"][$xn_code];
		// Loop on xn
		foreach ($xn_data as $xn) {
			// Check ids
			if ($xn['xml_id']==$xn_id_xml) {
				// Found
				$vd_ids=$xn['vd_ids'];
				break;
			}
		}
	}
	// xs is in DB, query for xn_id
	else {
		// Connect to DB
		require "php/include/db_connect.php";
		
		// Create SQL query
		$sql="SELECT vd_id FROM ".$xn_key."n WHERE ".$xn_key."n_id='".$xn_id."'";
		
		// Query DB
		$result=mysql_query($sql) or die(mysql_error());
		
		// Get result
		$results=mysql_fetch_array($result);
		
		$vd_id=$results['vd_id'];
		$vd_ids=array();
		array_push($vd_ids, $vd_id);
		
		if (empty($vd_id)) {
			// Query jj_volnet
			$sql="SELECT vd_id FROM jj_volnet WHERE jj_net_id='".$xn_id."' AND jj_net_flag='".strtoupper($xn_key)."'";
			
			// Query DB
			$result=mysql_query($sql) or die(mysql_error());
			
			// Get result
			$vd_ids=array();
			while ($results=mysql_fetch_array($result)) {
				$vd_id=$results['vd_id'];
				array_push($vd_ids, $vd_id);
			}
		}
	}
	
	// Add to xs_list
	$xs_list[$xs_id]=$vd_ids;
	
	// Compare volcanoes
	foreach ($vd_ids as $vd_id_cmp) {
		if ($vd_id_cmp==$vd_id) {
			return TRUE;
		}
	}
	// Volcano and station do not match
	return FALSE;
	
}

/******************************************************************************************************
* Function to store the final ed_id of an object
* Returns FALSE if no ed_id found, TRUE otherwise
* InOutput:	- $object: a WOVOML object
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_set_ms_data(&$object, $obj_name, $obj_code, $obj_stime, $obj_etime, $target_name, $table_name, $target_key, $checked_key, $parent_name, $parent_table_name, $parent_key, $parent_id, $global_var, &$error) {
	
	// Global data
	global $checked_data;
	
	// Static list of eruptions
	static $ms_list=array();
	
	// Prepare result
	$object['results'][$target_key]=NULL;
	$ms_found=array();
	$search_code=NULL;
	
	// Format time
	if (empty($obj_stime)) {
		$obj_stime="0000-00-00 00:00:00";
	}
	if (empty($obj_etime)) {
		$obj_etime="9999-12-31 23:59:59";
	}
	
	// Get owners
	$owners=$object['results']['owners'];
	
	// Loop on general ms codes
	foreach ($global_var as $gen_code) {
		if (!empty($gen_code)) {
			$search_code=$gen_code;
			// Search in list
			foreach ($ms_list[$table_name] as $ms_listed) {
				// Check code
				if ($gen_code!=$ms_listed['code']) {
					continue;
				}
				// Same code found
				else {
					// Check owners
					$found_owner=FALSE;
					foreach ($owners as $owner) {
						foreach ($ms_listed['owners'] as $cmp_owner) {
							if ($owner['id']==$cmp_owner['id']) {
								// Possible link found (check times later)
								array_push($ms_found, $ms_listed);
								$found_owner=TRUE;
								break;
							}
						}
						if ($found_owner) {
							break;
						}
					}
				}
			}
			
			// Search in DB
			if ($checked_key=="dn" || $checked_key=="gn" || $checked_key=="hn" || $checked_key=="fn" || $checked_key=="tn" || $checked_key=="mn") {  
				$ms_rows=db_get_cn($gen_code, $checked_key, $parent_table_name, $owners);
			}
			else {
				$ms_rows=db_get_ms($gen_code, $table_name, $parent_table_name, $owners);
			}
			// Format
			if (!empty($ms_rows)) {
				foreach ($ms_rows as $ms_row) {
					$ms_to_check=array();
					$ms_to_check['id']=$ms_row[$table_name.'_id'];
					// Parent
					if ($parent_table_name!=NULL) {
						$ms_to_check[$parent_table_name.'_id']=$ms_row[$parent_table_name.'_id'];
					}
					// Format time
					if (empty($ms_row[$table_name.'_stime'])) {
						$ms_to_check['stime']="0000-00-00 00:00:00";
					}
					else {
						$ms_to_check['stime']=$ms_row[$table_name.'_stime'];
					}
					if (empty($ms_row[$table_name.'_etime'])) {
						$ms_to_check['etime']="9999-12-31 23:59:59";
					}
					else {
						$ms_to_check['etime']=$ms_row[$table_name.'_etime'];
					}
					$ms_to_check['code']=$gen_code;
					$ms_to_check['owners']=array();
					$ms_to_check['owners'][0]['id']=$ms_row['cc_id'];
					$ms_to_check['owners'][1]['id']=$ms_row['cc_id2'];
					$ms_to_check['owners'][2]['id']=$ms_row['cc_id3'];
					array_push($ms_found, $ms_to_check);
				}
			}
				
			// Search in XML
			if (isset($checked_data[$checked_key][$gen_code])) {
				$ms_data=$checked_data[$checked_key][$gen_code];
				// Loop on ms
				foreach ($ms_data as $ms) {
					// Check owners
					$found_owner=FALSE;
					foreach ($owners as $owner) {
						foreach ($ms['owners'] as $cmp_owner) {
							if ($owner['id']==$cmp_owner['id']) {
								$ms_to_check=array();
								// Owner found
								$ms_to_check['id']="@".$ms['xml_id'];
								$ms_to_check['code']=$gen_code;
								// Parent
								if ($parent_table_name!=NULL) {
									$ms_to_check[$parent_table_name.'_id']=$ms[$parent_table_name.'_id'];
								}
								// Format time
								if (empty($ms['stime'])) {
									$ms_to_check['stime']="0000-00-00 00:00:00";
								}
								else {
									$ms_to_check['stime']=$ms['stime'];
								}
								if (empty($ms['etime'])) {
									$ms_to_check['etime']="9999-12-31 23:59:59";
								}
								else {
									$ms_to_check['etime']=$ms['etime'];
								}
								array_push($ms_found, $ms_to_check);
								$found_owner=TRUE;
								break;
							}
						}
						if ($found_owner) {
							break;
						}
					}
				}
			}
			
			if (empty($ms_found)) {
				$error=array();
				$error['code']=9;
				$error['message']="There is no ".$target_name." with such code: \"".$gen_code."\"";
				return FALSE;
			}
			
			break;
		}
	}

	// No ms code was given, return a NULL value - later maybe considered as missing information
	if (empty($ms_found)) {
		$object['results'][$target_key]=NULL;
		return TRUE;
	}
	
	$ms_selected=array();
	$selected=FALSE;
	// Loop on ms found
	foreach ($ms_found as $ms) {
		// Check time inclusion
		// Parent start time < Object start time
		if (!empty($ms['stime']) && !empty($obj_stime)) {
			if (strcmp($ms['stime'], $obj_stime)>0) {
				continue;
			}
		}
		// Object end time < Parent end time
		if (!empty($obj_etime) && !empty($ms['etime'])) {
			if (strcmp($obj_etime, $ms['etime'])>0) {
				continue;
			}
		}
		$ms_selected=$ms;
		$selected=TRUE;
		break;
	}
	
	if (!$selected) {
		$error=array();
		$error['code']=2;
		$error['message']="For &lt;".$obj_name." code=\"".$obj_code."\"&gt;, no ".$target_name." (code=\"".$search_code."\") was found to have a timeframe including [".$obj_stime.", ".$obj_etime."]";
		return FALSE;
	}
	
	// Check parent_id
	if (!empty($parent_id) && !empty($ms_selected[$parent_table_name.'_id'])) {
		if ($parent_id!=$ms_selected[$parent_table_name.'_id']) {
			$error=array();
			$error['code']=2;
			$error['message']="In &lt;".$obj_name." code=\"".$obj_code."\"&gt;, ".$target_name." and ".$parent_name." do not match";
			return FALSE;
		}
	}
	else {
		if (!empty($ms_selected[$parent_table_name.'_id'])) {
			$object['results'][$parent_key]=$ms_selected[$parent_table_name.'_id'];
		}
	}
	
	// If not from list, add to list of ms
	if (!isset($ms_selected['list'])) {
		$ms_selected['list']=TRUE;
		array_push($ms_list[$table_name], $ms_selected);
	}
	
	$object['results'][$target_key]=$ms_selected['id'];
	return TRUE;
}

/******************************************************************************************************
* Function to get the publish date of an object
* Returns nothing
* Input:	- $object: a WOVOML object
******************************************************************************************************/
function v1_get_pubdate($object) {
	
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// Global list of general publish dates
	global $gen_pubdates;
	
	$pubdate=xml_get_att($object, "PUBDATE");
	
	// Store pubdate in list
	array_unshift($gen_pubdates, $pubdate);
	
}

/******************************************************************************************************
* Function to store the final publish date of an object
* Returns nothing
* Input:	- $data_time: the data time(s)
* 			- $current_time: the current time
* InOutput:	- $object: a WOVOML object
******************************************************************************************************/
function v1_set_pubdate($data_time, $current_time, &$object) {
	
	// Global list of general publish dates
	global $gen_pubdates;
	
	// Prepare result
	$selected_pubdate=NULL;
	
	// Loop on local pubdates
	foreach ($gen_pubdates as $local_pubdate) {
		if (!empty($local_pubdate)) {
			$selected_pubdate=$local_pubdate;
			break;
		}
	}
	
	// Calculate final publish date (2 years after data)
	$object['results']['pubdate']=v1_calculate_pubdate($selected_pubdate, $data_time, $current_time);
	
}

/******************************************************************************************************
* Function to store the final B.C date of an object
* Returns nothing
* Input:	- $data_time: the data time(s)
* 			- $current_time: the current time
* InOutput:	- $object: a WOVOML object
******************************************************************************************************/
function v1_set_bc_date($time, $time_name, $bc_name, &$object) {
	
	// Find next "-"
	$pos=strpos($time, "-", 1);
	
	// Get B.C date
	$bc_date=substr($time, 0, $pos);
	
	// Prepare final date
	$final_date="0000".substr($time, $pos);
	
	// Store
	$object['results'][$time_name]=$final_date;
	$object['results'][$bc_name]=$bc_date;
	
}

/******************************************************************************************************
* Function to do get the microseconds from a datetime string; function used for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $inst: the array of the 'function' instruction from the automaton file
* 			- $l_inst: the length of the array of the function instruction
* 			- $class: the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value: the processed value
******************************************************************************************************/
function v1_set_msec($time_name, $msec_name, $time, &$object) {
	
	// Find "." from the end of the string
	$last_point_pos=strrpos($time, ".");
	if ($last_point_pos===FALSE) {
		// Return NULL value for result
		$object['results'][$time_name]=$time;
		$object['results'][$msec_name]=NULL;
		return;
	}
	// Cut the end of the string (including ".") and this is the value to return
	$object['results'][$time_name]=substr($time, 0, $last_point_pos);
	$object['results'][$msec_name]=substr($time, $last_point_pos);
}

/******************************************************************************************************
* Function to calculate the final publish date of an object
* Returns the calculated publish date
* Input:	- $local_pubdate: the publish date stated by the user
* 			- $data_time: the data time(s)
* 			- $current_time: the current time
******************************************************************************************************/
function v1_calculate_pubdate($local_pubdate, $data_time, $current_time) {
	
	// Loop on data time
	$selected_time=NULL;
	foreach ($data_time as $time) {
		if (empty($time)) {
			continue;
		}
		$selected_time=$time;
		break;
	}
	
	// If no data time
	if (empty($selected_time)) {
		// Select current time
		$selected_time=$current_time;
	}
	
	// Calculate maximum publish date: add 2 years to selected time
	$selected_time=str_replace(" ", "T", $selected_time);
	$cd=strtotime($selected_time);
	$max_pubdate=date('Y-m-d H:i:s', mktime(date('H',$cd), date('i',$cd), date('s',$cd), date('m',$cd), date('d',$cd), date('Y',$cd)+2));
	
	// If no publish date was defined by user
	if ($local_pubdate==NULL) {
		// Return max publish date
		return $max_pubdate;
	}
	
	// Return user publish date
	return $local_pubdate;
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id($table, $code, $owners) {
	// Connect to DB
	include "php/include/db_connect.php";
	
	// If parameters are empty
	if (empty($table) || empty($code) || empty($owners)) {
		return NULL;
	}
	
	$table_name=mysql_real_escape_string($table);
	
	// Create SQL query
	$sql="SELECT ".$table_name."_id FROM ".$table_name." WHERE ".$table_name."_code='".mysql_real_escape_string($code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);
	return $row[$table.'_id'];
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_sd_evn($code, $sn_id, $sd_evn_tech, $owners) {
	
	// If parameters are empty
	if (empty($code) || empty($sn_id) || empty($sd_evn_tech) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	include "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT sd_evn_id FROM sd_evn WHERE sd_evn_code='".mysql_real_escape_string($code)."' AND sn_id='".mysql_real_escape_string($sn_id)."' AND sd_evn_tech='".mysql_real_escape_string($sd_evn_tech)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);
	return $row['sd_evn_id'];
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_species($table, $code, $type, $waterfree, $owners) {

	// Connect to DB
	include "php/include/db_connect.php";
	
	// If parameters are empty
	if (empty($table) || empty($code) || empty($type) || empty($owners)) {
		return NULL;
	}
	
	$table_name=mysql_real_escape_string($table);
	
	// Create SQL query
	$sql="SELECT ".$table_name."_id FROM ".$table_name." WHERE ".$table_name."_code='".mysql_real_escape_string($code)."' AND ";
	if ($table_name=="hd") {
		$sql.=$table_name."_comp_species='".mysql_real_escape_string($type)."' AND ";	
	}
	else {
		$sql.=$table_name."_species='".mysql_real_escape_string($type)."' AND ";	
	}
	if (!empty($waterfree)) {
		$sql.=$table_name."_waterfree_flag='".mysql_real_escape_string($waterfree)."' AND ";
	}
	$sql.="(";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);
	return $row[$table.'_id'];
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_insarpixel($dd_sar_id, $number) {
	
	// If parameters are empty
	if (empty($dd_sar_id) || empty($number)) {
		return NULL;
	}
	
	// Connect to DB
	include "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT dd_srd_id FROM dd_srd WHERE dd_sar_id='".mysql_real_escape_string($dd_sar_id)."' AND dd_srd_numb='".mysql_real_escape_string($number)."'";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);
	
	return $row['dd_srd_id'];
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_ms($table, $code, $stime, $owners) {

	// Connect to DB
	include "php/include/db_connect.php";
	
	// If parameters are empty
	if (empty($table) || empty($code) || empty($owners)) {
		return NULL;
	}
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	$table_name=mysql_real_escape_string($table);
	

	// Create SQL query
	$sql="SELECT ".$table_name."_id FROM ".$table_name." WHERE ".$table_name."_code='".mysql_real_escape_string($code)."' AND ".$table_name."_stime='".mysql_real_escape_string($stime)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);
	return $row[$table.'_id'];
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_cn_stime($table, $code, $stime, $owners) {
	
	// If parameters are empty
	if (empty($table) || empty($code) || empty($owners)) {
		return NULL;
	}
	if (empty($stime)) {
		$stime="0000-00-00 00:00:00";
	}
	
	$type=NULL;
	switch ($table) {
		case "dn":
			$type="Deformation";
			break;
		case "gn":
			$type="Gas";
			break;
		case "hn":
			$type="Hydrologic";
			break;
		case "fn":
			$type="Fields";
			break;
		case "tn":
			$type="Thermal";
			break;
		case "mn":         
			$type="Meteo";
			break;			
	}
	
	// Connect to DB
	include "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT cn_id FROM cn WHERE cn_code='".mysql_real_escape_string($code)."' AND cn_type='".$type."' AND cn_stime='".mysql_real_escape_string($stime)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);

	return $row['cn_id']; 
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_times($table, $code, $owners) {
	
	// If parameters are empty
	if (empty($table) || empty($code) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	include "php/include/db_connect.php";
	
	$table_name=mysql_real_escape_string($table);
	
	// Create SQL query
	$sql="SELECT ".$table_name."_id, ".$table_name."_stime, ".$table_name."_etime FROM ".$table_name." WHERE ".$table_name."_code='".mysql_real_escape_string($code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=array();
	while ($row=mysql_fetch_array($result)) {
		array_push($results, $row);
	}
	
	return $results;
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* version 2: add --> $guest_table and $guest_code 
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_times2($table, $code, $owners, $guest_table, $guest_code) {
	// If parameters are empty
	if (empty($table) || empty($code) || empty($owners)) {
		return NULL;}
	// Connect to DB
	include "php/include/db_connect.php";

	$table_name=mysql_real_escape_string($table);
	$guest_table_name=mysql_real_escape_string($guest_table);
	
	// Create SQL query.. revised from former script: now include parent table/ network table
	$sql="SELECT ".$table_name."_id, ".$table_name."_stime, ".$table_name."_etime FROM ".$table_name." a,"	.$guest_table_name. " b  WHERE a."	.$table_name	."_code='".mysql_real_escape_string($code)."' AND a.".$guest_table_name."_id=b.".$guest_table_name."_id AND b.".$guest_table_name."_code='".mysql_real_escape_string($guest_code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="a.cc_id='".mysql_real_escape_string($owner['id'])."' OR a.cc_id2='".mysql_real_escape_string($owner['id'])."' OR a.cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=array();
	while ($row=mysql_fetch_array($result)) {
		array_push($results, $row);
	}
	
	return $results;
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* version 2: add --> $guest_table and $guest_code 
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_times3($table, $code, $owners, $guest_table, $guest_code, $gguest_table, $gguest_code) {
	// If parameters are empty
	if (empty($table) || empty($code) || empty($owners)) {
		return NULL;}
	// Connect to DB
	include "php/include/db_connect.php";

	$table_name=mysql_real_escape_string($table);
	$guest_table_name=mysql_real_escape_string($guest_table);
	$gguest_table_name=mysql_real_escape_string($gguest_table);
	
	// Create SQL query.. revised from former script: now include parent table/ network table
	$sql="SELECT ".$table_name."_id, ".$table_name."_stime, ".$table_name."_etime FROM ".$table_name." a,"	.$guest_table_name. " b,"	.$gguest_table_name. " c  WHERE a."	.$table_name	."_code='".mysql_real_escape_string($code)."' AND a.".$guest_table_name."_id=b.".$guest_table_name."_id AND b.".$guest_table_name."_code='".mysql_real_escape_string($guest_code)."' AND b.".$gguest_table_name."_id=c.".$gguest_table_name."_id AND c.".$gguest_table_name."_code='".mysql_real_escape_string($gguest_code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="a.cc_id='".mysql_real_escape_string($owner['id'])."' OR a.cc_id2='".mysql_real_escape_string($owner['id'])."' OR a.cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=array();
	while ($row=mysql_fetch_array($result)) {
		array_push($results, $row);
	}
	
	return $results;
	
}

/******************************************************************************************************
* Function to get the ID for a certain code in a certain table
* Returns the ID
* Input:	- $table: the table name in the database
* 			- $code: the code to search
* 			- $owners: an array of owners
******************************************************************************************************/
function v1_get_id_cn($table, $code, $owners) {
	
	// If parameters are empty
	if (empty($table) || empty($code) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	include "php/include/db_connect.php";
	
	$type=NULL;
	switch ($table) {
		case "dn":
			$type="Deformation";
			break;
		case "gn":
			$type="Gas";
			break;
		case "hn":
			$type="Hydrologic";
			break;
		case "fn":
			$type="Fields";
			break;
		case "tn":
			$type="Thermal";
			break;
		case "mn":      
			$type="Meteo";
			break;			
	}	
	// Create SQL query
	$sql="SELECT cn_id, cn_stime, cn_etime FROM cn WHERE cn_code='".mysql_real_escape_string($code)."' AND cn_type='".$type."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=array();
	while ($row=mysql_fetch_array($result)) {
		array_push($results, $row);
	}
	
	return $results;
	
}

/******************************************************************************************************
* Function to insert data in the database and record undo file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $undo_file_pointer: a pointer to the undo file
* 			- $insert_table: the name of the table in database
* 			- $field_name: an array of field names
* 			- $field_value: an array of field values
* 			- $upload_to_db: a boolean whether database should be uploaded (or whether it's a test)
* Output:	- $last_insert_id: the row ID just inserted
* 			- $error: an error message and its code
******************************************************************************************************/
function v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, &$last_insert_id, &$error) {
	
	// DB functions
	require_once "php/funcs/db_funcs.php";
	
	// Send query to database
	$last_insert_id=0;
	$local_error="";
	if (!db_insert($insert_table, $field_name, $field_value, !$upload_to_db, $last_insert_id, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$error=array();
				$error['code']=1020;
				$error['message']=$local_error." to db_insert()";
				break;
			default:
				$error=array();
				$error['code']=4008;
				$error['message']=$local_error;
		}
		return FALSE;
	}
	
	// Write undowovoml file (if that was not a simulation)
	if ($upload_to_db) {
		$undo_instruction=
		"\n\t<delete>".
		"\n\t\t<table>".$insert_table."</table>".
		"\n\t\t<where>".
		"\n\t\t\t<field>".$insert_table."_id</field>".
		"\n\t\t\t<value>".$last_insert_id."</value>".
		"\n\t\t</where>".
		"\n\t</delete>";
		if (!fwrite($undo_file_pointer, $undo_instruction)) {
			// Error
			$error=array();
			$error['code']=2022;
			$error['message']="An error occurred when trying to write undo file";
			return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to update data in the database and record undo file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $undo_file_pointer: a pointer to the undo file
* 			- $update_table: the name of the table in database
* 			- $field_name: an array of field names
* 			- $field_value: an array of field values
* 			- $where_field_name: an array of field names for WHERE conditions
* 			- $where_field_value: an array of field values for WHERE conditions
* 			- $upload_to_db: a boolean whether database should be uploaded (or whether it's a test)
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, &$error) {
	
	// DB functions
	require_once "php/funcs/db_funcs.php";
	
	// Store old values in "undowovoml" before updating them (if not a simulation)
	if ($upload_to_db) {
		// Send "SELECT" query to database
		$select_field_value=array();
		$local_error="";
		if (!db_select($update_table, $field_name, $where_field_name, $where_field_value, $select_field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$error=array();
					$error['code']=1024;
					$error['message']=$local_error." to db_select()";
					break;
				default:
					$error=array();
					$error['code']=4009;
					$error['message']=$local_error;
			}
			return FALSE;
		}
		$l_field_value=count($select_field_value);
		if ($l_field_value>1) {
			// Only 1 result should be found
			$error=array();
			$error['code']=1881;
			$error['message']="Multiple rows in the '".$update_table."' table correspond to ";
			// Loop on values
			$l_where_field_name=count($where_field_name);
			for ($i=0; $i<$l_where_field_name; $i++) {
				if ($i==0) {
					$error['message'].=$where_field_name[$i]."='".$where_field_value[$i]."'";
					continue;
				}
				$error['message'].=", ".$where_field_name[$i]."='".$where_field_value[$i]."'";
			}
		}
		// Store old values
		$undo_instruction=
		"\n\t<update>".
		"\n\t\t<table>".$update_table."</table>";
		// Fields
		$cnt_fields=count($field_name);
		for ($i=0; $i<$cnt_fields; $i++) {
			$undo_instruction.=
			"\n\t\t<field>".$field_name[$i]."</field>".
			"\n\t\t<value>".$select_field_value[0][$i]."</value>";
		}
		// Where conditions
		$l_where_field_name=count($where_field_name);
		$undo_instruction.=
		"\n\t\t<where>";
		for ($i=0; $i<$l_where_field_name; $i++) {
			$undo_instruction.=
			"\n\t\t\t<field>".$where_field_name[$i]."</field>".
			"\n\t\t\t<value>".$where_field_value[$i]."</value>";
		}
		$undo_instruction.=
		"\n\t\t</where>".
		"\n\t</update>";
		if (!fwrite($undo_file_pointer, $undo_instruction)) {
			// Error
			$error=array();
			$error['code']=2022;
			$error['message']="An error occurred when trying to write undo file";
			return FALSE;
		}
	}
	
	// Send query to database
	$local_error="";
	if (!db_update($update_table, $field_name, $field_value, $where_field_name, $where_field_value, !$upload_to_db, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$error=array();
				$error['code']=1028;
				$error['message']=$local_error." to db_update()";
				break;
			default:
				$error=array();
				$error['code']=4010;
				$error['message']=$local_error;
		}
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to update data in the database and record undo file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $undo_file_pointer: a pointer to the undo file
* 			- $delete_table: the name of the table in database
* 			- $select_field_name: an array of field names
* 			- $where_field_name: an array of field names
* 			- $where_field_value: an array of field values
* 			- $upload_to_db: a boolean whether database should be deleted (or whether it's a test)
* Output:	- $error: an error message and its code
******************************************************************************************************/
function v1_delete($undo_file_pointer, $delete_table, $select_field_name, $where_field_name, $where_field_value, $logical, $upload_to_db, &$error) {
	
	// DB functions
	require_once "php/funcs/db_funcs.php";
	
	// Store old values in "undowovoml" before deleting them (if not a simulation)
	if ($upload_to_db) {
		// Send "SELECT" query to database
		$select_field_value=array();
		$local_error="";
		if (!db_select($delete_table, $select_field_name, $where_field_name, $where_field_value, $select_field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$error=array();
					$error['code']=1024;
					$error['message']=$local_error." to db_select()";
					break;
				default:
					$error=array();
					$error['code']=4009;
					$error['message']=$local_error;
			}
			return FALSE;
		}
		$l_field_value=count($select_field_value);
		// Store records which are going to be deleted
		$undo_instruction="";
		for ($i=0; $i<$l_field_value; $i++) {
			$undo_instruction.=
			"\n\t<insert>".
			"\n\t\t<table>".$delete_table."</table>";
			// Fields
			for ($j=0; $j<$l_parameters-2; $j++) {
				$undo_instruction.=
				"\n\t\t<field>".$select_field_name[$j]."</field>".
				"\n\t\t<value>".$select_field_value[$i][$j]."</value>";
			}
			$undo_instruction.=
			"\n\t</insert>";
		}
		if (fwrite($undo_file_pointer, $undo_instruction)===FALSE) {
			// Error
			$error=array();
			$error['code']=2024;
			$error['message']="An error occurred when trying to write undo file";
			return FALSE;
		}
	}
	
	// Send query to database
	$local_error="";
	if (!db_delete($delete_table, $where_field_name, $where_field_value, $logical, !$upload_to_db, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$error=array();
				$error['code']=1028;
				$error['message']=$local_error." to db_delete()";
				break;
			case "Error in logical operators given":
				$error=array();
				$error['code']=1029;
				$error['message']=$local_error." to db_delete()";
				break;
			default:
				$error=array();
				$error['code']=4010;
				$error['message']=$local_error;
		}
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get station's start time and end time by checking station name "ss_name"
******************************************************************************************************/
function v1_get_code($gen_stations) {

	// Connect to DB
	include "php/include/db_connect.php";
	
	$sql="select ss.ss_stime,ss.ss_etime from ss where ss.ss_name='{$gen_stations[0]}'";

	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row;
}
?>