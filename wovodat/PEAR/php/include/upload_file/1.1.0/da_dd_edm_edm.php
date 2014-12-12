<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_dd_edm_edm_obj, "CODE");

// Get owners
$owners=$da_dd_edm_edm_obj['results']['owners'];

// Prepare link to ds_id1
if (substr($da_dd_edm_edm_obj['results']['ds_id1'], 0, 1)=="@") {
	$ds_id1=$db_ids[substr($da_dd_edm_edm_obj['results']['ds_id1'], 1)];
}
else {
	$ds_id1=$da_dd_edm_edm_obj['results']['ds_id1'];
}

// Prepare link to ds_id2
if (substr($da_dd_edm_edm_obj['results']['ds_id2'], 0, 1)=="@") {
	$ds_id2=$db_ids[substr($da_dd_edm_edm_obj['results']['ds_id2'], 1)];
}
else {
	$ds_id2=$da_dd_edm_edm_obj['results']['ds_id2'];
}

// Prepare link to di_gen_id
if (substr($da_dd_edm_edm_obj['results']['di_gen_id'], 0, 1)=="@") {
	$di_gen_id=$db_ids[substr($da_dd_edm_edm_obj['results']['di_gen_id'], 1)];
}
else {
	$di_gen_id=$da_dd_edm_edm_obj['results']['di_gen_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("dd_edm", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="dd_edm";
	$field_name=array();
	$field_name[0]="dd_edm_code";
	$field_name[1]="dd_edm_time";
	$field_name[2]="dd_edm_time_unc";
	$field_name[3]="dd_edm_line";
	$field_name[4]="dd_edm_cerr";
	$field_name[5]="dd_edm_serr";
	$field_name[6]="dd_edm_ori";   
	$field_name[7]="dd_edm_com";   	
	$field_name[8]="ds_id1";
	$field_name[9]="ds_id2";
	$field_name[10]="di_gen_id";
	$field_name[11]="cc_id";
	$field_name[12]="cc_id2";
	$field_name[13]="cc_id3";
	$field_name[14]="dd_edm_pubdate";
	$field_name[15]="cc_id_load";
	$field_name[16]="dd_edm_loaddate";
	$field_name[17]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_dd_edm_edm_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_dd_edm_edm_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_dd_edm_edm_obj, "LINELENGTH");
	$field_value[4]=xml_get_ele($da_dd_edm_edm_obj, "CONSTANTERR");
	$field_value[5]=xml_get_ele($da_dd_edm_edm_obj, "SCALEERR");
	$field_value[6]=xml_get_ele($da_dd_edm_edm_obj, "ORGDIGITIZE");  	
	$field_value[7]=xml_get_ele($da_dd_edm_edm_obj, "COMMENTS");	 	
	$field_value[8]=$ds_id1;
	$field_value[9]=$ds_id2;
	$field_value[10]=$di_gen_id;
	$field_value[11]=$da_dd_edm_edm_obj['results']['owners'][0]['id'];
	$field_value[12]=$da_dd_edm_edm_obj['results']['owners'][1]['id'];
	$field_value[13]=$da_dd_edm_edm_obj['results']['owners'][2]['id'];
	$field_value[14]=$da_dd_edm_edm_obj['results']['pubdate'];
	$field_value[15]=$cc_id_load;
	$field_value[16]=$current_time;
	$field_value[17]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_edm_edm_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="dd_edm";
	$field_name=array();
	$field_name[0]="dd_edm_pubdate";
	$field_name[1]="dd_edm_time";
	$field_name[2]="dd_edm_time_unc";
	$field_name[3]="dd_edm_line";
	$field_name[4]="dd_edm_cerr";
	$field_name[5]="dd_edm_serr";
	$field_name[6]="dd_edm_ori";   
	$field_name[7]="dd_edm_com";  	
	$field_name[8]="ds_id1";
	$field_name[9]="ds_id2";
	$field_name[10]="di_gen_id";
	$field_name[11]="cc_id";
	$field_name[12]="cc_id2";
	$field_name[13]="cc_id3";
	$field_name[14]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_dd_edm_edm_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_dd_edm_edm_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_dd_edm_edm_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_dd_edm_edm_obj, "LINELENGTH");
	$field_value[4]=xml_get_ele($da_dd_edm_edm_obj, "CONSTANTERR");
	$field_value[5]=xml_get_ele($da_dd_edm_edm_obj, "SCALEERR");
	$field_value[6]=xml_get_ele($da_dd_edm_edm_obj, "ORGDIGITIZE");  
	$field_value[7]=xml_get_ele($da_dd_edm_edm_obj, "COMMENTS");		
	$field_value[8]=$ds_id1;
	$field_value[9]=$ds_id2;
	$field_value[10]=$di_gen_id;
	$field_value[11]=$da_dd_edm_edm_obj['results']['owners'][0]['id'];
	$field_value[12]=$da_dd_edm_edm_obj['results']['owners'][1]['id'];
	$field_value[13]=$da_dd_edm_edm_obj['results']['owners'][2]['id'];
	$field_value[14]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="dd_edm_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_edm_edm_obj['id']=$id;
	array_push($db_ids, $id);
}

?>