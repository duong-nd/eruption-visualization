<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_ms_ms_mi_obj, "CODE");

// Get owners
$owners=$ms_ms_ms_mi_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_ms_ms_mi_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("mi", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="mi";
	$field_name=array();
	$field_name[0]="mi_code";
	$field_name[1]="mi_name";
	$field_name[2]="mi_type";
	$field_name[3]="mi_units";
	$field_name[4]="mi_res";
	$field_name[5]="mi_stime";
	$field_name[6]="mi_stime_unc";
	$field_name[7]="mi_etime";
	$field_name[8]="mi_etime_unc";
	$field_name[9]="mi_desc";
	$field_name[10]="mi_ori";
	$field_name[11]="mi_com";	
	$field_name[12]="ms_id";
	$field_name[13]="cc_id";
	$field_name[14]="cc_id2";
	$field_name[15]="cc_id3";
	$field_name[16]="mi_pubdate";
	$field_name[17]="cc_id_load";
	$field_name[18]="mi_loaddate";
	$field_name[19]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_ms_ms_mi_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_ms_ms_mi_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_ms_ms_mi_obj, "UNITS");
	$field_value[4]=xml_get_ele($ms_ms_ms_mi_obj, "RESOLUTION");
	$field_value[5]=$stime;
	$field_value[6]=xml_get_ele($ms_ms_ms_mi_obj, "STARTTIMEUNC");
	$field_value[7]=xml_get_ele($ms_ms_ms_mi_obj, "ENDTIME");
	$field_value[8]=xml_get_ele($ms_ms_ms_mi_obj, "ENDTIMEUNC");
	$field_value[9]=xml_get_ele($ms_ms_ms_mi_obj, "DESCRIPTION");
	$field_value[10]=xml_get_ele($ms_ms_ms_mi_obj, "ORGDIGITIZE");
	$field_value[11]=xml_get_ele($ms_ms_ms_mi_obj, "COMMENTS");	
	$field_value[12]=$ms_ms_ms_obj['id'];
	$field_value[13]=$ms_ms_ms_mi_obj['results']['owners'][0]['id'];
	$field_value[14]=$ms_ms_ms_mi_obj['results']['owners'][1]['id'];
	$field_value[15]=$ms_ms_ms_mi_obj['results']['owners'][2]['id'];
	$field_value[16]=$ms_ms_ms_mi_obj['results']['pubdate'];
	$field_value[17]=$cc_id_load;
	$field_value[18]=$current_time;
	$field_value[19]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_ms_ms_mi_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="mi";
	$field_name=array();
	$field_name[0]="mi_pubdate";
	$field_name[1]="mi_name";
	$field_name[2]="mi_type";
	$field_name[3]="mi_units";
	$field_name[4]="mi_res";
	$field_name[5]="ms_id";
	$field_name[6]="mi_stime_unc";
	$field_name[7]="mi_etime";
	$field_name[8]="mi_etime_unc";
	$field_name[9]="mi_desc";
	$field_name[10]="mi_ori";
	$field_name[11]="mi_com";	
	$field_name[12]="cc_id";
	$field_name[13]="cc_id2";
	$field_name[14]="cc_id3";
	$field_name[15]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_ms_ms_mi_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_ms_ms_mi_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_ms_ms_mi_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_ms_ms_mi_obj, "UNITS");
	$field_value[4]=xml_get_ele($ms_ms_ms_mi_obj, "RESOLUTION");
	$field_value[5]=$ms_ms_ms_obj['id'];
	$field_value[6]=xml_get_ele($ms_ms_ms_mi_obj, "STARTTIMEUNC");
	$field_value[7]=xml_get_ele($ms_ms_ms_mi_obj, "ENDTIME");
	$field_value[8]=xml_get_ele($ms_ms_ms_mi_obj, "ENDTIMEUNC");
	$field_value[9]=xml_get_ele($ms_ms_ms_mi_obj, "DESCRIPTION");
	$field_value[10]=xml_get_ele($ms_ms_ms_mi_obj, "ORGDIGITIZE");
	$field_value[11]=xml_get_ele($ms_ms_ms_mi_obj, "COMMENTS");	
	$field_value[12]=$ms_ms_ms_mi_obj['results']['owners'][0]['id'];
	$field_value[13]=$ms_ms_ms_mi_obj['results']['owners'][1]['id'];
	$field_value[14]=$ms_ms_ms_mi_obj['results']['owners'][2]['id'];
	$field_value[15]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="mi_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_ms_ms_mi_obj['id']=$id;
	array_push($db_ids, $id);
}

?>