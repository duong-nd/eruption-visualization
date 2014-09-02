<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_fd_mgv_mgv_obj, "CODE");

// Get owners
$owners=$da_fd_mgv_mgv_obj['results']['owners'];

// Prepare link to fs_id
if (substr($da_fd_mgv_mgv_obj['results']['fs_id'], 0, 1)=="@") {
	$fs_id=$db_ids[substr($da_fd_mgv_mgv_obj['results']['fs_id'], 1)];
}
else {
	$fs_id=$da_fd_mgv_mgv_obj['results']['fs_id'];
}

// Prepare link to fi_id
if (substr($da_fd_mgv_mgv_obj['results']['fi_id'], 0, 1)=="@") {
	$fi_id=$db_ids[substr($da_fd_mgv_mgv_obj['results']['fi_id'], 1)];
}
else {
	$fi_id=$da_fd_mgv_mgv_obj['results']['fi_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("fd_mgv", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="fd_mgv";
	$field_name=array();
	$field_name[0]="fd_mgv_code";
	$field_name[1]="fd_mgv_time";
	$field_name[2]="fd_mgv_time_unc";
	$field_name[3]="fd_mgv_dec";
	$field_name[4]="fd_mgv_incl";
	$field_name[5]="fd_mgv_ori";		
	$field_name[6]="fd_mgv_com";
	$field_name[7]="fs_id";
	$field_name[8]="fi_id";
	$field_name[9]="cc_id";
	$field_name[10]="cc_id2";
	$field_name[11]="cc_id3";
	$field_name[12]="fd_mgv_pubdate";
	$field_name[13]="cc_id_load";
	$field_name[14]="fd_mgv_loaddate";
	$field_name[15]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_fd_mgv_mgv_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_fd_mgv_mgv_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_fd_mgv_mgv_obj, "DECLINATION");
	$field_value[4]=xml_get_ele($da_fd_mgv_mgv_obj, "INCLINATION");
	$field_value[5]=xml_get_ele($da_fd_mgv_mgv_obj, "ORGDIGITIZE");   
	$field_value[6]=xml_get_ele($da_fd_mgv_mgv_obj, "COMMENTS");
	$field_value[7]=$fs_id;
	$field_value[8]=$fi_id;
	$field_value[9]=$da_fd_mgv_mgv_obj['results']['owners'][0]['id'];
	$field_value[10]=$da_fd_mgv_mgv_obj['results']['owners'][1]['id'];
	$field_value[11]=$da_fd_mgv_mgv_obj['results']['owners'][2]['id'];
	$field_value[12]=$da_fd_mgv_mgv_obj['results']['pubdate'];
	$field_value[13]=$cc_id_load;
	$field_value[14]=$current_time;
	$field_value[15]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_fd_mgv_mgv_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="fd_mgv";
	$field_name=array();
	$field_name[0]="fd_mgv_pubdate";
	$field_name[1]="fd_mgv_time";
	$field_name[2]="fd_mgv_time_unc";
	$field_name[3]="fd_mgv_dec";
	$field_name[4]="fd_mgv_incl";
	$field_name[5]="fd_mgv_ori";	 		
	$field_name[6]="fd_mgv_com";
	$field_name[7]="fs_id";
	$field_name[8]="fi_id";
	$field_name[9]="cc_id";
	$field_name[10]="cc_id2";
	$field_name[11]="cc_id3";
	$field_name[12]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_fd_mgv_mgv_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_fd_mgv_mgv_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_fd_mgv_mgv_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_fd_mgv_mgv_obj, "DECLINATION");
	$field_value[4]=xml_get_ele($da_fd_mgv_mgv_obj, "INCLINATION");
	$field_value[5]=xml_get_ele($da_fd_mgv_mgv_obj, "ORGDIGITIZE");   	
	$field_value[6]=xml_get_ele($da_fd_mgv_mgv_obj, "COMMENTS");
	$field_value[7]=$fs_id;
	$field_value[8]=$fi_id;
	$field_value[9]=$da_fd_mgv_mgv_obj['results']['owners'][0]['id'];
	$field_value[10]=$da_fd_mgv_mgv_obj['results']['owners'][1]['id'];
	$field_value[11]=$da_fd_mgv_mgv_obj['results']['owners'][2]['id'];
	$field_value[12]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="fd_mgv_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_fd_mgv_mgv_obj['id']=$id;
	array_push($db_ids, $id);
}

?>