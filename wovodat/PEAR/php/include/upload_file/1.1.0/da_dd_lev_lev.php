<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_dd_lev_lev_obj, "CODE");

// Get owners
$owners=$da_dd_lev_lev_obj['results']['owners'];

// Prepare link to ds_id_ref
if (substr($da_dd_lev_lev_obj['results']['ds_id_ref'], 0, 1)=="@") {
	$ds_id_ref=$db_ids[substr($da_dd_lev_lev_obj['results']['ds_id_ref'], 1)];
}
else {
	$ds_id_ref=$da_dd_lev_lev_obj['results']['ds_id_ref'];
}

// Prepare link to ds_id1
if (substr($da_dd_lev_lev_obj['results']['ds_id1'], 0, 1)=="@") {
	$ds_id1=$db_ids[substr($da_dd_lev_lev_obj['results']['ds_id1'], 1)];
}
else {
	$ds_id1=$da_dd_lev_lev_obj['results']['ds_id1'];
}

// Prepare link to ds_id2
if (substr($da_dd_lev_lev_obj['results']['ds_id2'], 0, 1)=="@") {
	$ds_id2=$db_ids[substr($da_dd_lev_lev_obj['results']['ds_id2'], 1)];
}
else {
	$ds_id2=$da_dd_lev_lev_obj['results']['ds_id2'];
}

// Prepare link to di_gen_id
if (substr($da_dd_lev_lev_obj['results']['di_gen_id'], 0, 1)=="@") {
	$di_gen_id=$db_ids[substr($da_dd_lev_lev_obj['results']['di_gen_id'], 1)];
}
else {
	$di_gen_id=$da_dd_lev_lev_obj['results']['di_gen_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("dd_lev", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="dd_lev";
	$field_name=array();
	$field_name[0]="dd_lev_code";
	$field_name[1]="dd_lev_ord";
	$field_name[2]="dd_lev_class";
	$field_name[3]="dd_lev_time";
	$field_name[4]="dd_lev_time_unc";
	$field_name[5]="dd_lev_delev";
	$field_name[6]="dd_lev_herr";  
	$field_name[7]="dd_lev_ori";      
	$field_name[8]="dd_lev_com";
	$field_name[9]="ds_id_ref";
	$field_name[10]="ds_id1";
	$field_name[11]="ds_id2";
	$field_name[12]="di_gen_id";
	$field_name[13]="cc_id";
	$field_name[14]="cc_id2";
	$field_name[15]="cc_id3";
	$field_name[16]="dd_lev_pubdate";
	$field_name[17]="cc_id_load";
	$field_name[18]="dd_lev_loaddate";
	$field_name[19]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_dd_lev_lev_obj, "ORDER");
	$field_value[2]=xml_get_ele($da_dd_lev_lev_obj, "CLASS");
	$field_value[3]=xml_get_ele($da_dd_lev_lev_obj, "MEASTIME");
	$field_value[4]=xml_get_ele($da_dd_lev_lev_obj, "MEASTIMEUNC");
	$field_value[5]=xml_get_ele($da_dd_lev_lev_obj, "ELEVCHANGE");
	$field_value[6]=xml_get_ele($da_dd_lev_lev_obj, "ELEVCHANGEUNC");
	$field_value[7]=xml_get_ele($da_dd_lev_lev_obj, "ORGDIGITIZE");  	
	$field_value[8]=xml_get_ele($da_dd_lev_lev_obj, "COMMENTS");
	$field_value[9]=$ds_id_ref;
	$field_value[10]=$ds_id1;
	$field_value[11]=$ds_id2;
	$field_value[12]=$di_gen_id;
	$field_value[13]=$da_dd_lev_lev_obj['results']['owners'][0]['id'];
	$field_value[14]=$da_dd_lev_lev_obj['results']['owners'][1]['id'];
	$field_value[15]=$da_dd_lev_lev_obj['results']['owners'][2]['id'];
	$field_value[16]=$da_dd_lev_lev_obj['results']['pubdate'];
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
	$da_dd_lev_lev_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="dd_lev";
	$field_name=array();
	$field_name[0]="dd_lev_pubdate";
	$field_name[1]="dd_lev_ord";
	$field_name[2]="dd_lev_class";
	$field_name[3]="dd_lev_time";
	$field_name[4]="dd_lev_time_unc";
	$field_name[5]="dd_lev_delev";
	$field_name[6]="dd_lev_herr";
	$field_name[7]="dd_lev_ori";      	
	$field_name[8]="dd_lev_com";
	$field_name[9]="ds_id_ref";
	$field_name[10]="ds_id1";
	$field_name[11]="ds_id2";
	$field_name[12]="di_gen_id";
	$field_name[13]="cc_id";
	$field_name[14]="cc_id2";
	$field_name[15]="cc_id3";
	$field_name[16]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_dd_lev_lev_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_dd_lev_lev_obj, "ORDER");
	$field_value[2]=xml_get_ele($da_dd_lev_lev_obj, "CLASS");
	$field_value[3]=xml_get_ele($da_dd_lev_lev_obj, "MEASTIME");
	$field_value[4]=xml_get_ele($da_dd_lev_lev_obj, "MEASTIMEUNC");
	$field_value[5]=xml_get_ele($da_dd_lev_lev_obj, "ELEVCHANGE");
	$field_value[6]=xml_get_ele($da_dd_lev_lev_obj, "ELEVCHANGEUNC");
	$field_value[7]=xml_get_ele($da_dd_lev_lev_obj, "ORGDIGITIZE");    	
	$field_value[8]=xml_get_ele($da_dd_lev_lev_obj, "COMMENTS");
	$field_value[9]=$ds_id_ref;
	$field_value[10]=$ds_id1;
	$field_value[11]=$ds_id2;
	$field_value[12]=$di_gen_id;
	$field_value[13]=$da_dd_lev_lev_obj['results']['owners'][0]['id'];
	$field_value[14]=$da_dd_lev_lev_obj['results']['owners'][1]['id'];
	$field_value[15]=$da_dd_lev_lev_obj['results']['owners'][2]['id'];
	$field_value[16]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="dd_lev_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_lev_lev_obj['id']=$id;
	array_push($db_ids, $id);
}

?>