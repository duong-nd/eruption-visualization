<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_fd_mag_mag_obj, "CODE");

// Get owners
$owners=$da_fd_mag_mag_obj['results']['owners'];

// Prepare link to fs_id
if (substr($da_fd_mag_mag_obj['results']['fs_id'], 0, 1)=="@") {
	$fs_id=$db_ids[substr($da_fd_mag_mag_obj['results']['fs_id'], 1)];
}
else {
	$fs_id=$da_fd_mag_mag_obj['results']['fs_id'];
}

// Prepare link to fs_id_ref
if (substr($da_fd_mag_mag_obj['results']['fs_id_ref'], 0, 1)=="@") {
	$fs_id_ref=$db_ids[substr($da_fd_mag_mag_obj['results']['fs_id_ref'], 1)];
}
else {
	$fs_id_ref=$da_fd_mag_mag_obj['results']['fs_id_ref'];
}

// Prepare link to fi_id
if (substr($da_fd_mag_mag_obj['results']['fi_id'], 0, 1)=="@") {
	$fi_id=$db_ids[substr($da_fd_mag_mag_obj['results']['fi_id'], 1)];
}
else {
	$fi_id=$da_fd_mag_mag_obj['results']['fi_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("fd_mag", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="fd_mag";
	$field_name=array();
	$field_name[0]="fd_mag_code";
	$field_name[1]="fd_mag_time";
	$field_name[2]="fd_mag_time_unc";
	$field_name[3]="fd_mag_f";
	$field_name[4]="fd_mag_ferr";
	$field_name[5]="fd_mag_compx";
	$field_name[6]="fd_mag_errx";
	$field_name[7]="fd_mag_compy";
	$field_name[8]="fd_mag_erry";
	$field_name[9]="fd_mag_compz";
	$field_name[10]="fd_mag_errz";
	$field_name[11]="fd_mag_highpass";
	$field_name[12]="fd_mag_lowpass";
	$field_name[13]="fd_mag_ori";             	
	$field_name[14]="fd_mag_com";
	$field_name[15]="fs_id";
	$field_name[16]="fs_id_ref";
	$field_name[17]="fi_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="fd_mag_pubdate";
	$field_name[22]="cc_id_load";
	$field_name[23]="fd_mag_loaddate";
	$field_name[24]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_fd_mag_mag_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_fd_mag_mag_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_fd_mag_mag_obj, "F");
	$field_value[4]=xml_get_ele($da_fd_mag_mag_obj, "FUNC");
	$field_value[5]=xml_get_ele($da_fd_mag_mag_obj, "X");
	$field_value[6]=xml_get_ele($da_fd_mag_mag_obj, "XUNC");
	$field_value[7]=xml_get_ele($da_fd_mag_mag_obj, "Y");
	$field_value[8]=xml_get_ele($da_fd_mag_mag_obj, "YUNC");
	$field_value[9]=xml_get_ele($da_fd_mag_mag_obj, "Z");
	$field_value[10]=xml_get_ele($da_fd_mag_mag_obj, "ZUNC");
	$field_value[11]=xml_get_ele($da_fd_mag_mag_obj, "HIGHPASS");
	$field_value[12]=xml_get_ele($da_fd_mag_mag_obj, "LOWPASS");
	$field_value[13]=xml_get_ele($da_fd_mag_mag_obj, "ORGDIGITIZE");   	
	$field_value[14]=xml_get_ele($da_fd_mag_mag_obj, "COMMENTS");
	$field_value[15]=$fs_id;
	$field_value[16]=$fs_id_ref;
	$field_value[17]=$fi_id;
	$field_value[18]=$da_fd_mag_mag_obj['results']['owners'][0]['id'];
	$field_value[19]=$da_fd_mag_mag_obj['results']['owners'][1]['id'];
	$field_value[20]=$da_fd_mag_mag_obj['results']['owners'][2]['id'];
	$field_value[21]=$da_fd_mag_mag_obj['results']['pubdate'];
	$field_value[22]=$cc_id_load;
	$field_value[23]=$current_time;
	$field_value[24]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_fd_mag_mag_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="fd_mag";
	$field_name=array();
	$field_name[0]="fd_mag_pubdate";
	$field_name[1]="fd_mag_time";
	$field_name[2]="fd_mag_time_unc";
	$field_name[3]="fd_mag_f";
	$field_name[4]="fd_mag_ferr";
	$field_name[5]="fd_mag_compx";
	$field_name[6]="fd_mag_errx";
	$field_name[7]="fd_mag_compy";
	$field_name[8]="fd_mag_erry";
	$field_name[9]="fd_mag_compz";
	$field_name[10]="fd_mag_errz";
	$field_name[11]="fd_mag_highpass";
	$field_name[12]="fd_mag_lowpass";
	$field_name[13]="fd_mag_ori";             
	$field_name[14]="fd_mag_com";
	$field_name[15]="fs_id";
	$field_name[16]="fs_id_ref";
	$field_name[17]="fi_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_fd_mag_mag_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_fd_mag_mag_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_fd_mag_mag_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_fd_mag_mag_obj, "F");
	$field_value[4]=xml_get_ele($da_fd_mag_mag_obj, "FUNC");
	$field_value[5]=xml_get_ele($da_fd_mag_mag_obj, "X");
	$field_value[6]=xml_get_ele($da_fd_mag_mag_obj, "XUNC");
	$field_value[7]=xml_get_ele($da_fd_mag_mag_obj, "Y");
	$field_value[8]=xml_get_ele($da_fd_mag_mag_obj, "YUNC");
	$field_value[9]=xml_get_ele($da_fd_mag_mag_obj, "Z");
	$field_value[10]=xml_get_ele($da_fd_mag_mag_obj, "ZUNC");
	$field_value[11]=xml_get_ele($da_fd_mag_mag_obj, "HIGHPASS");
	$field_value[12]=xml_get_ele($da_fd_mag_mag_obj, "LOWPASS");
	$field_value[13]=xml_get_ele($da_fd_mag_mag_obj, "ORGDIGITIZE");   	
	$field_value[14]=xml_get_ele($da_fd_mag_mag_obj, "COMMENTS");
	$field_value[15]=$fs_id;
	$field_value[16]=$fs_id_ref;
	$field_value[17]=$fi_id;
	$field_value[18]=$da_fd_mag_mag_obj['results']['owners'][0]['id'];
	$field_value[19]=$da_fd_mag_mag_obj['results']['owners'][1]['id'];
	$field_value[20]=$da_fd_mag_mag_obj['results']['owners'][2]['id'];
	$field_value[21]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="fd_mag_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_fd_mag_mag_obj['id']=$id;
	array_push($db_ids, $id);
}

?>