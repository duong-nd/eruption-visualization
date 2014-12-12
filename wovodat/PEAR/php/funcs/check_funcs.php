<?php

/******************************************************************************************************
*
* Package of functions for checking tables
*
* check_link: Function for checking that a link is correct
* check_link_include1: Function for checking a link with time inclusion (time included in a time frame)
* check_link_include2: Function for checking a link with time inclusion (time frame included in another one)
* check_value: Function for checking that the value of a field at a certain record is correct
*
******************************************************************************************************/

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_link($link_value, $link_name, $table_linked, $field_linked, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($link_value) || empty($link_name) || empty($table_linked) || empty($field_linked)) {
		return;
	}
	
	// Check link (unique)
	$count_table_name=$table_linked;
	$count_field_name=array();
	$count_field_name[0]=$field_linked;
	$count_field_value=array();
	$count_field_value[0]=$link_value;
	$num=0;
	$errors="";
	if (!db_count($count_table_name, $count_field_name, $count_field_value, $num, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1039;
				$_SESSION['errors'][0]['message']=$errors." // check_link -> db_count";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4011;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
	if ($num!=1) {
		// No or many results
		array_push($msgs, $row_id." - Incorrect link  to ".$table_linked.".".$field_linked.": ".$link_name."=".$link_value);
	}
	
}

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_unique($table_name, $code, $cc_id, $cc_id2, $cc_id3, $row_id, &$msgs) {
	// Check necessary variables
	if (empty($code) || empty($cc_id)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect_view.php";
	
	// Create SQL query
	$sql="SELECT ".$table_name."_id FROM ".$table_name." WHERE ".$table_name."_code='".mysql_real_escape_string($code)."' AND (cc_id='".$cc_id."' OR cc_id2='".$cc_id."' OR cc_id3='".$cc_id."'";
	
	// cc_id2
	if (!empty($cc_id2)) {
		$sql.=" OR cc_id='".$cc_id2."' OR cc_id2='".$cc_id2."' OR cc_id3='".$cc_id2."'";
	}
	
	// cc_id3
	if (!empty($cc_id3)) {
		$sql.=" OR cc_id='".$cc_id3."' OR cc_id2='".$cc_id3."' OR cc_id3='".$cc_id3."'";
	}
	
	// Finish SQL query
	$sql.=") LIMIT 2";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result 1
	$row=mysql_fetch_array($result);
	if ($row[$table_name."_id"]!=$row_id) {
		array_push($msgs, $row_id." - Duplicated data with row ".$row[$table_name."_id"]);
		return;
	}
	
	// Get result 2
	if (($row=mysql_fetch_array($result))!==FALSE) {
		array_push($msgs, $row_id." - Duplicated data with row ".$row[$table_name."_id"]);
	}
	
}

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_unique_species($table_name, $code, $species, $waterfree, $cc_id, $cc_id2, $cc_id3, $row_id, &$msgs) {
	// Check necessary variables
	if (empty($code) || empty($cc_id) || empty($species)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect_view.php";
	
	if ($table_name=="hd") {
		$species_field="hd_comp_species";
	}
	else {
		$species_field=$table_name."_species";
	}
	
	// Create SQL query
	$sql="SELECT ".$table_name."_id FROM ".$table_name." WHERE ".$table_name."_code='".mysql_real_escape_string($code)."' 
	AND ".$species_field."='".mysql_real_escape_string($species)."' ";
	if (!empty($waterfree)) {
	$sql.="AND ".$table_name."_waterfree_flag='".mysql_real_escape_string($waterfree)."' ";
	}
	$sql.="AND (cc_id='".$cc_id."' OR cc_id2='".$cc_id."' OR cc_id3='".$cc_id."'";
	
	// cc_id2
	if (!empty($cc_id2)) {
		$sql.=" OR cc_id='".$cc_id2."' OR cc_id2='".$cc_id2."' OR cc_id3='".$cc_id2."'";
	}
	
	// cc_id3
	if (!empty($cc_id3)) {
		$sql.=" OR cc_id='".$cc_id3."' OR cc_id2='".$cc_id3."' OR cc_id3='".$cc_id3."'";
	}
	
	// Finish SQL query
	$sql.=") LIMIT 2";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result 1
	$row=mysql_fetch_array($result);
	if ($row[$table_name."_id"]!=$row_id) {
		array_push($msgs, $row_id." - Duplicated data with row ".$row[$table_name."_id"]);
		return;
	}
	
	// Get result 2
	if (($row=mysql_fetch_array($result))!==FALSE) {
		array_push($msgs, $row_id." - Duplicated data with row ".$row[$table_name."_id"]);
	}
	
}

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_unique_time($table_name, $code, $cc_id, $cc_id2, $cc_id3, $stime, $etime, $row_id, &$msgs) {
	// Check necessary variables
	if (empty($code) || empty($cc_id) || empty($stime) || empty($etime)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect_view.php";
	
	// Create SQL query
	$sql="SELECT ".$table_name."_id FROM ".$table_name." WHERE ".$table_name."_code='".mysql_real_escape_string($code)."' 
	AND ".$table_name."_stime <= '".$etime."' 
	AND ".$table_name."_etime >= '".$stime."' 
	AND (cc_id='".$cc_id."' OR cc_id2='".$cc_id."' OR cc_id3='".$cc_id."'";
	
	// cc_id2
	if (!empty($cc_id2)) {
		$sql.=" OR cc_id='".$cc_id2."' OR cc_id2='".$cc_id2."' OR cc_id3='".$cc_id2."'";
	}
	
	// cc_id3
	if (!empty($cc_id3)) {
		$sql.=" OR cc_id='".$cc_id3."' OR cc_id2='".$cc_id3."' OR cc_id3='".$cc_id3."'";
	}
	
	// Finish SQL query
	$sql.=") LIMIT 2";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result 1
	$row=mysql_fetch_array($result);
	if ($row[$table_name."_id"]!=$row_id) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row[$table_name."_id"]);
		return;
	}
	
	// Get result 2
	if (($row=mysql_fetch_array($result))!==FALSE) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row[$table_name."_id"]);
	}
	
}

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_unique_vd($vd_id, $stime, $etime, $row_id, &$msgs) {
	// Check necessary variables
	if (empty($vd_id) || empty($stime) || empty($etime)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect_view.php";
	
	// Create SQL query
	$sql="SELECT vd_inf_id FROM vd_inf WHERE vd_id='".$vd_id."'
	AND vd_inf_stime <= '".$etime."' 
	AND vd_inf_etime >= '".$stime."' 
	LIMIT 2";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result 1
	$row=mysql_fetch_array($result);
	if ($row["vd_inf_id"]!=$row_id) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row["vd_inf_id"]);
		return;
	}
	
	// Get result 2
	if (($row=mysql_fetch_array($result))!==FALSE) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row["vd_inf_id"]);
	}
	
}

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_unique_cn($type, $code, $cc_id, $cc_id2, $cc_id3, $stime, $etime, $row_id, &$msgs) {
	// Check necessary variables
	if (empty($code) || empty($cc_id) || empty($stime) || empty($etime)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect_view.php";
	
	// Create SQL query
	$sql="SELECT cn_id FROM cn WHERE cn_code='".mysql_real_escape_string($code)."' 
	AND cn_type = '".mysql_real_escape_string($type)."' 
	AND cn_stime <= '".$etime."' 
	AND cn_etime >= '".$stime."' 
	AND (cc_id='".$cc_id."' OR cc_id2='".$cc_id."' OR cc_id3='".$cc_id."'";
	
	// cc_id2
	if (!empty($cc_id2)) {
		$sql.=" OR cc_id='".$cc_id2."' OR cc_id2='".$cc_id2."' OR cc_id3='".$cc_id2."'";
	}
	
	// cc_id3
	if (!empty($cc_id3)) {
		$sql.=" OR cc_id='".$cc_id3."' OR cc_id2='".$cc_id3."' OR cc_id3='".$cc_id3."'";
	}
	
	// Finish SQL query
	$sql.=") LIMIT 2";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result 1
	$row=mysql_fetch_array($result);
	if ($row["cn_id"]!=$row_id) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row["cn_id"]);
		return;
	}
	
	// Get result 2
	if (($row=mysql_fetch_array($result))!==FALSE) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row["cn_id"]);
	}
	
}

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_unique_sn($vmodel, $code, $cc_id, $cc_id2, $cc_id3, $stime, $etime, $row_id, &$msgs) {
	// Check necessary variables
	if (empty($code) || empty($cc_id) || empty($stime) || empty($etime) || empty($vmodel)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect_view.php";
	
	// Create SQL query
	$sql="SELECT sn_id FROM sn WHERE sn_code='".mysql_real_escape_string($code)."' 
	AND sn_vmodel = '".mysql_real_escape_string($vmodel)."' 
	AND sn_stime <= '".$etime."' 
	AND sn_etime >= '".$stime."' 
	AND (cc_id='".$cc_id."' OR cc_id2='".$cc_id."' OR cc_id3='".$cc_id."'";
	
	// cc_id2
	if (!empty($cc_id2)) {
		$sql.=" OR cc_id='".$cc_id2."' OR cc_id2='".$cc_id2."' OR cc_id3='".$cc_id2."'";
	}
	
	// cc_id3
	if (!empty($cc_id3)) {
		$sql.=" OR cc_id='".$cc_id3."' OR cc_id2='".$cc_id3."' OR cc_id3='".$cc_id3."'";
	}
	
	// Finish SQL query
	$sql.=") LIMIT 2";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result 1
	$row=mysql_fetch_array($result);
	if ($row["sn_id"]!=$row_id) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row["sn_id"]);
		return;
	}
	
	// Get result 2
	if (($row=mysql_fetch_array($result))!==FALSE) {
		array_push($msgs, $row_id." - Overlapping/duplicated data with row ".$row["sn_id"]);
	}
	
}

/******************************************************************************************************
* Function for checking that a link is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_unique_sd_evn($code, $sn_id, $tech, $cc_id, $cc_id2, $cc_id3, $row_id, &$msgs) {
	// Check necessary variables
	if (empty($code) || empty($cc_id) || empty($sn_id) || empty($tech)) {
		return;
	}
	
	// Connect to DB
	include "php/include/db_connect_view.php";
	
	// Create SQL query
	$sql="SELECT sd_evn_id FROM sd_evn WHERE sd_evn_code='".mysql_real_escape_string($code)."' 
	AND sn_id = '".$sn_id."' 
	AND sd_evn_tech = '".mysql_real_escape_string($tech)."' 
	AND (cc_id='".$cc_id."' OR cc_id2='".$cc_id."' OR cc_id3='".$cc_id."'";
	
	// cc_id2
	if (!empty($cc_id2)) {
		$sql.=" OR cc_id='".$cc_id2."' OR cc_id2='".$cc_id2."' OR cc_id3='".$cc_id2."'";
	}
	
	// cc_id3
	if (!empty($cc_id3)) {
		$sql.=" OR cc_id='".$cc_id3."' OR cc_id2='".$cc_id3."' OR cc_id3='".$cc_id3."'";
	}
	
	// Finish SQL query
	$sql.=") LIMIT 2";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result 1
	$row=mysql_fetch_array($result);
	if ($row["sd_evn_id"]!=$row_id) {
		array_push($msgs, $row_id." - Duplicated data with row ".$row["sd_evn_id"]);
		return;
	}
	
	// Get result 2
	if (($row=mysql_fetch_array($result))!==FALSE) {
		array_push($msgs, $row_id." - Duplicated data with row ".$row["sd_evn_id"]);
	}
	
}

/******************************************************************************************************
* Function for checking a link with time inclusion (time included in a time frame)
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $field_stime: the name of the field containing start time - e.g.: xx_stime
* 			- $field_stime_unc: the name of the field containing start time uncertainty - e.g.: xx_stime_unc
* 			- $field_etime: the name of the field containing end time - e.g.: xx_etime
* 			- $field_etime_unc: the name of the field containing end time uncertainty - e.g.: xx_etime_unc
* 			- $time_name: the name of the field containing time
* 			- $time: the time
* 			- $time_unc: the time uncertainty
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_link_include1($link_value, $link_name, $table_linked, $field_linked, $field_stime, $field_etime, $time_name, $time, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Datetime functions
	require_once "php/funcs/datetime_funcs.php";
	
	// Required values
	if (empty($time) || empty($link_value) || empty($link_name) || empty($table_linked) || empty($field_linked) || empty($field_stime) || empty($field_etime)) {
		return;
	}
	
	// Check link (unique)
	$count_table_name=$table_linked;
	$count_field_name=array();
	$count_field_name[0]=$field_linked;
	$count_field_value=array();
	$count_field_value[0]=$link_value;
	$num=0;
	$errors="";
	if (!db_count($count_table_name, $count_field_name, $count_field_value, $num, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1039;
				$_SESSION['errors'][0]['message']=$errors." // check_link -> db_count";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4011;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
	if ($num!=1) {
		// No or many results
		array_push($msgs, $row_id." - Incorrect link  to ".$table_linked.".".$field_linked.": ".$link_name."=".$link_value);
		return;
	}
	
	// Get start time and end time
	$query_sql="SELECT ".$field_stime.", ".$field_etime." FROM ".$table_linked." WHERE ".$field_linked."=".$link_value." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_link_include1 -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	$open_time=$query_results[0][$field_stime];
	$close_time=$query_results[0][$field_etime];
	
	// Compare: open time < time < close time
	if (strcmp($open_time, $time) > 0 || strcmp($time, $close_time) > 0) {
		array_push($msgs, $row_id." - Incorrect time inclusion: ".$time_name."=".$time." is not included in time frame of ".$link_name."=".$link_value);
	}
	
}

/******************************************************************************************************
* Function for checking a link with time inclusion (time included in a time frame)
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $linked_time: the name of the field containing start time - e.g.: xx_stime
* 			- $linked_time_unc: the name of the field containing start time uncertainty - e.g.: xx_stime_unc
* 			- $time_name: the name of the field containing time
* 			- $time: the time
* 			- $time_unc: the time uncertainty
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_link_before($link_value, $link_name, $table_linked, $field_linked, $linked_time, $time_name, $time, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Datetime functions
	require_once "php/funcs/datetime_funcs.php";
	
	// Required values
	if (empty($time) || empty($link_value) || empty($link_name) || empty($table_linked) || empty($field_linked) || empty($linked_time)) {
		return;
	}
	
	// Check link (unique)
	$count_table_name=$table_linked;
	$count_field_name=array();
	$count_field_name[0]=$field_linked;
	$count_field_value=array();
	$count_field_value[0]=$link_value;
	$num=0;
	$errors="";
	if (!db_count($count_table_name, $count_field_name, $count_field_value, $num, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1039;
				$_SESSION['errors'][0]['message']=$errors." // check_link_before -> db_count";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4011;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
	if ($num!=1) {
		// No or many results
		array_push($msgs, $row_id." - Incorrect link  to ".$table_linked.".".$field_linked.": ".$link_name."=".$link_value);
		return;
	}
	
	// Get link time
	$query_sql="SELECT ".$linked_time." FROM ".$table_linked." WHERE ".$field_linked."=".$link_value." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_link_before -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Get link time
	$linked_time_value=$query_results[0][$linked_time];
	
	// Compare: time <= linked time
	if (strcmp($time, $linked_time_value) > 0) {
		array_push($msgs, $row_id." - Time condition: ".$time_name."=".$time." is after time of ".$link_name."=".$link_value);
	}
	
}

/******************************************************************************************************
* Function for checking a link with time inclusion (time frame included in another one)
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: cc_id_load=3
* 			- $link_name: the name of the link - e.g.: cc_id_load
* 			- $table_linked: the name of the table linked - e.g.: cc
* 			- $field_linked: the name of the field linked - e.g.: cc_id
* 			- $field_stime: the name of the field containing start time - e.g.: xx_stime
* 			- $field_stime_unc: the name of the field containing start time uncertainty - e.g.: xx_stime_unc
* 			- $field_etime: the name of the field containing end time - e.g.: xx_etime
* 			- $field_etime_unc: the name of the field containing end time uncertainty - e.g.: xx_etime_unc
* 			- $stime_name: the name of the field containing start time
* 			- $stime: the start time
* 			- $stime_unc: the start time uncertainty
* 			- $etime_name: the name of the field containing end time
* 			- $etime: the end time
* 			- $etime_unc: the end time uncertainty
* 			- $row_id: the id of the row
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_link_include2($link_value, $link_name, $table_linked, $field_linked, $field_stime, $field_etime, $stime_name, $stime, $etime_name, $etime, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Datetime functions
	require_once "php/funcs/datetime_funcs.php";
	
	// Required values
	if (empty($stime) || empty($etime) || empty($link_value) || empty($link_name) || empty($table_linked) || empty($field_linked) || empty($field_stime) || empty($field_etime)) {
		return;
	}
	
	// Check link (unique)
	$count_table_name=$table_linked;
	$count_field_name=array();
	$count_field_name[0]=$field_linked;
	$count_field_value=array();
	$count_field_value[0]=$link_value;
	$num=0;
	$errors="";
	if (!db_count($count_table_name, $count_field_name, $count_field_value, $num, $errors)) {
		// Database error
		switch ($errors) {
			case "Error in the parameters given":
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=1039;
				$_SESSION['errors'][0]['message']=$errors." // check_link -> db_count";
				$_SESSION['l_errors']=1;
				// Redirect user to system error page
				header('Location: '.$url_root.'system_error.php');
				exit();
			default:
				$_SESSION['errors'][0]=array();
				$_SESSION['errors'][0]['code']=4011;
				$_SESSION['errors'][0]['message']=$errors;
				$_SESSION['l_errors']=1;
				// Redirect user to database error page
				header('Location: '.$url_root.'db_error.php');
				exit();
		}
	}
	if ($num!=1) {
		// No or many results
		array_push($msgs, $row_id." - Incorrect link  to ".$table_linked.".".$field_linked.": ".$link_name."=".$link_value);
		return;
	}
	
	// Get start time and end time
	$query_sql="SELECT ".$field_stime.", ".$field_etime." FROM ".$table_linked." WHERE ".$field_linked."=".$link_value." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_link_include2 -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Calculate min open and max close time
	$open_time=$query_results[0][$field_stime];
	$close_time=$query_results[0][$field_etime];
	
	// Compare: open time <= start time & end time <= close time
	if (strcmp($open_time, $stime) > 0 || strcmp($etime, $close_time) > 0) {
		array_push($msgs, $row_id." - Incorrect time inclusion: [".$stime_name."=".$stime.", ".$etime_name."=".$etime."] is not included in time frame of ".$link_name."=".$link_value);
	}
	
}

/******************************************************************************************************
* Function for checking that the value of a field at a certain record is correct
* Returns nothing
* Input:	- $link_value: the value of the link - e.g.: ds_id=28
* 			- $link_name: the name of the link - e.g.: ds_id
* 			- $field_linked: the name of the field linked - e.g.: ds_id
* 			- $from_table_name: the name of the table where link is to be checked - e.g.: di_gen
* 			- $from_field_name: the name of the ID field - e.g.: di_gen_id
* 			- $from_field_value: the value of the ID - e.g.: di_gen_id=57
* 			- $row_id: the id of the row of data
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_value($field_value, $field_name, $from_field_name, $from_table_name, $from_id_name, $from_id_value, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($field_value) || empty($field_name) || empty($from_field_name) || empty($from_table_name) || empty($from_id_name) || empty($from_id_value)) {
		return;
	}
	
	// Check link
	$query_sql="SELECT ".$from_field_name." FROM ".$from_table_name." WHERE ".$from_id_name."=".$from_id_value." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_link_double -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	if (empty($query_results)) {
		return;
	}
	
	// Check value
	$returned_value=$query_results[0][$from_field_name];
	
	if (empty($returned_value)) {
		return;
	}
	
	if ($returned_value!=$field_value) {
		array_push($msgs, $row_id." - Incorrect value (".$field_name."=".$field_value."): ".$from_field_name."=".$returned_value." at table ".$from_table_name." where ".$from_id_name."=".$from_id_value);
		return;
	}
	
}

/******************************************************************************************************
* Function for checking that the value of a field at the linked record of a certain record is correct
* Returns nothing
* Input:	- $field_value: the value to be checked - e.g.: vd_id=28
* 			- $field_name: the name of the field in the original table - e.g.: vd_id
* 			- $select_field_name1: the name of the 1st field to select - e.g.: ed_id
* 			- $from_table_name1: the name of the 1st table to select - e.g.: ed_phs
* 			- $where_name1: the name of the ID field for the 1st table - e.g.: ed_phs_id
* 			- $where_value1: the value of the ID for the 1st table - e.g.: ed_phs_id=33
* 			- $select_field_name2: the name of the 2nd field to select - e.g.: vd_id
* 			- $from_table_name1: the name of the 2nd table to select - e.g.: ed
* 			- $where_name1: the name of the ID field for the 2nd table - e.g.: ed_id
* 			- $row_id: the id of the row of data
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_value2($field_value, $field_name, $select_field_name1, $from_table_name1, $where_name1, $where_value1, $select_field_name2, $from_table_name2, $where_name2, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($field_value) || empty($field_name) || empty($select_field_name1) || empty($from_table_name1) || empty($where_name1) || empty($where_value1) || empty($select_field_name2) || empty($from_table_name2) || empty($where_name2)) {
		return;
	}
	
	// Get 1st value
	$query_sql="SELECT ".$select_field_name1." FROM ".$from_table_name1." WHERE ".$where_name1."=".$where_value1." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_value2 -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	if (empty($query_results)) {
		return;
	}
	
	// Get value
	$select_field_value1=$query_results[0][$select_field_name1];
	
	if (empty($select_field_value1)) {
		return;
	}
	
	// Get 2nd value
	$query_sql="SELECT ".$select_field_name2." FROM ".$from_table_name2." WHERE ".$where_name2."=".$select_field_value1." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_value2 -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	if (empty($query_results)) {
		return;
	}
	
	// Get value
	$returned_value=$query_results[0][$select_field_name2];
	
	if (empty($returned_value)) {
		return;
	}
	
	if ($returned_value!=$field_value) {
		array_push($msgs, $row_id." - Incorrect value (".$field_name."=".$field_value."): ".$select_field_name2."=".$returned_value." at table ".$from_table_name2." where ".$where_name1."=".$where_value1);
		return;
	}
	
}

/******************************************************************************************************
* Function for checking that the value of a volcano ID is correct
* Returns nothing
* Input:	- $vd_id: the value of vd_id - e.g.: vd_id=34
* 			- $from_table: the name of the original table - e.g.: di_gen
* 			- $id_name: the name of the original table ID - e.g.: di_gen_id
* 			- $id_value: the value of the original ID - e.g.: di_gen_id=65
* 			- $field_id_name: the name of the station ID field - e.g.: ds_id
* 			- $network_type: the network type (C = Common, S = Seismic)
* 			- $row_id: the id of the row of data
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_vd_id($vd_id, $from_table, $id_name, $id_value, $field_id_name, $network_type, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($vd_id) || empty($from_table) || empty($id_name) || empty($id_value) || empty($field_id_name) || empty($network_type)) {
		return;
	}
	
	// SELECT ds_id FROM di_gen WHERE di_gen_id=di_gen_id
	$query_sql="SELECT ".$field_id_name." FROM ".$from_table." WHERE ".$id_name."=".$id_value." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_vd_id -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	if (empty($query_results)) {
		return;
	}
	$station_id=$query_results[0][$field_id_name];
	
	// SELECT cn_id FROM ds WHERE ds_id=ds_id
	if ($network_type=='C') {
		$network_table='cn';
	}
	elseif ($network_type=='S') {
		$network_table='sn';
	}
	else {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']="Wrong parameter given: network_type=".$network_type;
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	$network_id_name=$network_table."_id";
	$query_sql="SELECT ".$network_id_name." FROM ".substr($field_id_name, 0, 2)." WHERE ".$field_id_name."=".$station_id." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_vd_id -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	if (empty($query_results)) {
		return;
	}
	$network_id=$query_results[0][$network_id_name];
	
	// SELECT vd_id FROM cn WHERE cn_id=cn_id
	$query_sql="SELECT vd_id FROM ".$network_table." WHERE ".$network_id_name."=".$network_id." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_vd_id -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	if (!empty($query_results)) {
		// Check value of vd_id
		if ($query_results[0]['vd_id']!=0 && $vd_id!=$query_results[0]['vd_id']) {
			array_push($msgs, $row_id." - Incorrect value (vd_id=".$vd_id."): ".$id_name.".".$field_id_name.".".$network_id_name.".vd_id=".$query_results[0]['vd_id']);
		}
		return;
	}
	
	// No result, SELECT vd_id FROM jj_volnet WHERE cn_id=cn_id AND jj_net_flag=C
	$query_sql="SELECT vd_id FROM jj_volnet WHERE ".$network_id_name."=".$network_id." AND jj_net_flag=".$network_type;
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_vd_id -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	if (empty($query_results)) {
		array_push($msgs, $row_id." - Incorrect value (vd_id=".$vd_id."): ".$id_name." does not link to such volcano");
		return;
	}
	
	// Loop on results
	$vd_id_found=FALSE;
	foreach ($query_results as $row) {
		if ($row['vd_id']==$vd_id) {
			$vd_id_found=TRUE;
			break;
		}
	}
	
	// If vd_id was not found
	if (!$vd_id_found) {
		array_push($msgs, $row_id." - Incorrect value (vd_id=".$vd_id."): ".$id_name." does not link to such volcano");
	}
	
}

/******************************************************************************************************
* Function for checking that the value of a volcano ID is correct
* Returns nothing
* Input:	- $vd_id: the value of vd_id - e.g.: vd_id=34
* 			- $from_table: the name of the original table - e.g.: ts
* 			- $id_name: the name of the original table ID - e.g.: ts_id
* 			- $id_value: the value of the original ID - e.g.: ts_id=65
* 			- $network_type: the network type (C = Common, S = Seismic)
* 			- $row_id: the id of the row of data
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_vd_id_sta($vd_id, $from_table, $id_name, $id_value, $network_type, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($vd_id) || empty($from_table) || empty($id_name) || empty($id_value) || empty($network_type)) {
		return;
	}
	
	// SELECT cn_id FROM ts WHERE ts_id=ts_id
	if ($network_type=='C') {
		$network_table='cn';
	}
	elseif ($network_type=='S') {
		$network_table='sn';
	}
	else {
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']="Wrong parameter given: network_type=".$network_type;
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	$network_id_name=$network_table."_id";
	$query_sql="SELECT ".$network_id_name." FROM ".$from_table." WHERE ".$id_name."=".$id_value." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_vd_id_sta -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	if (empty($query_results)) {
		return;
	}
	$network_id=$query_results[0][$network_id_name];
	
	// SELECT vd_id FROM cn WHERE cn_id=cn_id
	$query_sql="SELECT vd_id FROM ".$network_table." WHERE ".$network_id_name."=".$network_id." LIMIT 1";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_vd_id_sta -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	if (!empty($query_results)) {
		// Check value of vd_id
		if ($query_results[0]['vd_id']!=0 && $vd_id!=$query_results[0]['vd_id']) {
			array_push($msgs, $row_id." - Incorrect value (vd_id=".$vd_id."): ".$id_name.".".$network_id_name.".vd_id=".$query_results[0]['vd_id']);
		}
		return;
	}
	
	// No result, SELECT vd_id FROM jj_volnet WHERE cn_id=cn_id AND jj_net_flag=C
	$query_sql="SELECT vd_id FROM jj_volnet WHERE ".$network_id_name."=".$network_id." AND jj_net_flag=".$network_type;
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_vd_id_sta -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	if (empty($query_results)) {
		array_push($msgs, $row_id." - Incorrect value (vd_id=".$vd_id."): ".$id_name." does not link to such volcano");
		return;
	}
	
	// Loop on results
	$vd_id_found=FALSE;
	foreach ($query_results as $row) {
		if ($row['vd_id']==$vd_id) {
			$vd_id_found=TRUE;
			break;
		}
	}
	
	// If vd_id was not found
	if (!$vd_id_found) {
		array_push($msgs, $row_id." - Incorrect value (vd_id=".$vd_id."): ".$id_name." does not link to such volcano");
	}
	
}

/******************************************************************************************************
* Function for checking that the value of a volcano ID is correct
* Returns nothing
* Input:	- $cb_ids: an array of cb_ids - e.g.: cb_ids=[17, 90, 13]
* 			- $row_id: the id of the row of data
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_cb_ids($cb_ids, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($cb_ids)) {
		return;
	}
	
	// Explode cb_ids to array
	$cb_ids_array=explode(",", $cb_ids);
	
	// Loop on cb_ids_array
	foreach ($cb_ids_array as $cb_id) {
		// SELECT cb_id FROM cb WHERE cb_id=cb_id
		$query_sql="SELECT cb_id FROM cb WHERE cb_id='".$cb_id."' LIMIT 1";
		$query_results=array();
		$query_error="";
		if (!db_sql($query_sql, $query_results, $query_error)) {
			// Database error
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1120;
			$_SESSION['errors'][0]['message']=$query_error." [check_cb_ids -> db_sql(query_sql=$query_sql)]";
			$_SESSION['l_errors']=1;
			// Redirect user to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		if (empty($query_results)) {
			array_push($msgs, $row_id." - Incorrect value (cb_id=".$cb_id."): unexisting bibliographic information for that cb_id");
			return;
		}
	}
	
}

/******************************************************************************************************
* Function for checking that the value of a volcano ID is correct
* Returns nothing
* Input:	- $dd_sar_id: the ID of the InSAR image - e.g.: dd_sar_id=26
* 			- $dd_sar_nrows: the number of rows for the InSAR image - e.g.: dd_sar_nrows=768
* 			- $dd_sar_ncols: the number of columns for the InSAR image - e.g.: dd_sar_ncols=1024
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_insar_pix($dd_sar_id, $dd_sar_nrows, $dd_sar_ncols, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($dd_sar_id) || empty($dd_sar_nrows) || empty($dd_sar_ncols)) {
		return;
	}
	
	$row_id=$dd_sar_id;
	
	// Select all pixels linking to this image: SELECT dd_srd_numb FROM dd_srd WHERE dd_sar_id=dd_sar_id
	$query_sql="SELECT dd_srd_numb FROM dd_srd WHERE dd_sar_id=".$dd_sar_id;
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_insar_pix -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	// Number of pixels expected = number of rows x number of columns
	$number_of_pixels=$dd_sar_nrows*$dd_sar_ncols;
	
	// Check number of pixels
	if (count($query_results)!=$number_of_pixels) {
		array_push($msgs, $row_id." - Incorrect number of InSAR pixels: expected is ".$number_of_pixels." but found ".count($query_results));
		return;
	}
	
	// Check order of numbers
	$pixel_numbers=array();
	for ($i=1; $i<=$number_of_pixels; $i++) {
		$pixel_numbers[$i]=FALSE;
	}
	foreach ($query_results as $row) {
		$pixel_number=$row['dd_srd_numb'];
		
		// Check that pixel number is in range
		if ($pixel_number<1) {
			array_push($msgs, $row_id." - Incorrect InSAR pixel number: dd_srd_numb=".$pixel_number." < 1");
			return;
		}
		if ($pixel_number>$number_of_pixels) {
			array_push($msgs, $row_id." - Incorrect InSAR pixel number: dd_srd_numb=".$pixel_number." > number_of_pixels=".$number_of_pixels);
			return;
		}
		
		// Check that pixel number was not yet encountered
		if ($pixel_numbers[$pixel_number]) {
			// Already found
			array_push($msgs, $row_id." - Incorrect InSAR pixel numbers: dd_srd_numb=".$pixel_number." was encountered twice");
			return;
		}
		
		// Set flag for this pixel number as TRUE
		$pixel_numbers[$pixel_number]=TRUE;
	}
	
}

/******************************************************************************************************
* Function for checking that the value of a volcano ID is correct
* Returns nothing
* Input:	- $dd_sar_id: the ID of the InSAR image - e.g.: dd_sar_id=26
* 			- $dd_sar_nrows: the number of rows for the InSAR image - e.g.: dd_sar_nrows=768
* 			- $dd_sar_ncols: the number of columns for the InSAR image - e.g.: dd_sar_ncols=1024
* InOutput:	- $msgs: an array of error messages
******************************************************************************************************/
function check_rsam_ssam($stime, $etime, $int, $row_id, &$msgs) {
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Check necessary variables
	if (empty($stime) || empty($int) || empty($row_id)) {
		return;
	}
	
	// Select all RSAM data related to this set
	$query_sql="SELECT sd_rsm_stime FROM sd_rsm WHERE sd_sam_id=".$row_id." ORDER BY sd_rsm_stime";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_rsam_ssam -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	$first_row=TRUE;
	// Loop on RSAM data
	foreach ($query_results as $row) {
		// Get RSAM start time
		$rsam_stime=$row['sd_rsm_stime'];
		
		// First row
		if ($first_row) {
			// Check time order: sd_sam_stime <= sd_rsm_stime
			if (!empty($stime) && !empty($rsam_stime)) {
				if (strcmp($stime, $rsam_stime) > 0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: sd_rsm_stime=".$rsam_stime." < sd_sam_stime=".$stime);
				}
			}
			$first_row=FALSE;
		}
		else {
			// Check time order: sd_rsm_stime <= sd_sam_etime
			if (!empty($rsam_stime) && !empty($etime)) {
				if (strcmp($rsam_stime, $etime) > 0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: sd_rsm_stime=".$rsam_stime." > sd_sam_etime=".$etime);
				}
			}
		}
	}
	
	// Select all SSAM data related to this set
	$query_sql="SELECT sd_ssm_stime FROM sd_ssm WHERE sd_sam_id=".$row_id." ORDER BY sd_ssm_stime";
	$query_results=array();
	$query_error="";
	if (!db_sql($query_sql, $query_results, $query_error)) {
		// Database error
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1120;
		$_SESSION['errors'][0]['message']=$query_error." [check_rsam_ssam -> db_sql(query_sql=$query_sql)]";
		$_SESSION['l_errors']=1;
		// Redirect user to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
	}
	
	$first_row=TRUE;
	// Loop on SSAM data
	foreach ($query_results as $row) {
		// Get SSAM start time
		$ssam_stime=$row['sd_ssm_stime'];
		
		// First row
		if ($first_row) {
			// Check time order: sd_sam_stime <= sd_ssm_stime
			if (!empty($stime) && !empty($ssam_stime)) {
				if (strcmp($stime, $ssam_stime) > 0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: sd_ssm_stime=".$ssam_stime." < sd_sam_stime=".$stime);
				}
			}
			$first_row=FALSE;
		}
		else {
			// Check time order: sd_ssm_stime <= sd_sam_etime
			if (!empty($ssam_stime) && !empty($etime)) {
				if (strcmp($ssam_stime, $etime) > 0) {
					array_push($msgs, $row_id." - Incorrect time inclusion: sd_ssm_stime=".$ssam_stime." > sd_sam_etime=".$etime);
				}
			}
		}
	}
	
}

?>