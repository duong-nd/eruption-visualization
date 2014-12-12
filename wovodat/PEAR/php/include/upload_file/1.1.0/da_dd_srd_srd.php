<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$number=xml_get_att($da_dd_srd_srd_obj, "NUMBER");

// INSERT or UPDATE?
$id=v1_get_id_insarpixel($da_dd_sar_sar_obj['id'], $number);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="dd_srd";
	$field_name=array();
	$field_name[0]="dd_srd_numb";
	$field_name[1]="dd_srd_dchange";
	$field_name[2]="dd_srd_com";     
	$field_name[3]="dd_sar_id";
	$field_name[4]="cc_id_load";
	$field_name[5]="dd_srd_loaddate";
	$field_value=array();
	$field_value[0]=$number;
	$field_value[1]=xml_get_ele($da_dd_srd_srd_obj, "RANGEOFCHANGE");
	$field_value[2]=xml_get_ele($da_dd_srd_srd_obj, "COMMENTS");    
	$field_value[3]=$da_dd_sar_sar_obj['id'];
	$field_value[4]=$cc_id_load;
	$field_value[5]=$current_time;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_srd_srd_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="dd_srd";
	$field_name=array();
	$field_name[0]="dd_srd_dchange";
	$field_name[1]="dd_srd_com";    
	$field_value=array();
	$field_value[0]=xml_get_ele($da_dd_srd_srd_obj, "RANGEOFCHANGE");
	$field_value[1]=xml_get_ele($da_dd_srd_srd_obj, "COMMENTS");     	
	$where_field_name=array();
	$where_field_name[0]="dd_srd_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_srd_srd_obj['id']=$id;
	array_push($db_ids, $id);
}

?>