<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_dd_tlt_tlt_obj, "CODE");

// Get owners
$owners=$da_dd_tlt_tlt_obj['results']['owners'];

// Prepare link to ds_id
if (substr($da_dd_tlt_tlt_obj['results']['ds_id'], 0, 1)=="@") {
	$ds_id=$db_ids[substr($da_dd_tlt_tlt_obj['results']['ds_id'], 1)];
}
else {
	$ds_id=$da_dd_tlt_tlt_obj['results']['ds_id'];
}

// Prepare link to di_tlt_id
if (substr($da_dd_tlt_tlt_obj['results']['di_tlt_id'], 0, 1)=="@") {
	$di_tlt_id=$db_ids[substr($da_dd_tlt_tlt_obj['results']['di_tlt_id'], 1)];
}
else {
	$di_tlt_id=$da_dd_tlt_tlt_obj['results']['di_tlt_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("dd_tlt", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="dd_tlt";
	$field_name=array();
	$field_name[0]="dd_tlt_code";
	$field_name[1]="dd_tlt_time";
	$field_name[2]="dd_tlt_timecsec";
	$field_name[3]="dd_tlt_time_unc";
	$field_name[4]="dd_tlt_timecsec_unc";
	$field_name[5]="dd_tlt_srate";
	$field_name[6]="dd_tlt1";
	$field_name[7]="dd_tlt_err1";
	$field_name[8]="dd_tlt2";
	$field_name[9]="dd_tlt_err2";
	$field_name[10]="dd_tlt_proc_flg";
	$field_name[11]="dd_tlt_temp";       
	$field_name[12]="dd_tlt_bat";         
	$field_name[13]="dd_tlt_ori";         
	$field_name[14]="dd_tlt_com";       
	$field_name[15]="ds_id";
	$field_name[16]="di_tlt_id";
	$field_name[17]="cc_id";
	$field_name[18]="cc_id2";
	$field_name[19]="cc_id3";
	$field_name[20]="dd_tlt_pubdate";
	$field_name[21]="cc_id_load";
	$field_name[22]="dd_tlt_loaddate";
	$field_name[23]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=$da_dd_tlt_tlt_obj['results']['dd_tlt_time'];
	$field_value[2]=xml_get_ele($da_dd_tlt_tlt_obj, "MEASTIMECSEC");	 
	$field_value[3]=$da_dd_tlt_tlt_obj['results']['dd_tlt_time_unc'];
	$field_value[4]=xml_get_ele($da_dd_tlt_tlt_obj, "MEASTIMECSECUNC");	 
	$field_value[5]=xml_get_ele($da_dd_tlt_tlt_obj, "SAMPLERATE");
	$field_value[6]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT1");
	$field_value[7]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT1UNC");
	$field_value[8]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT2");
	$field_value[9]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT2UNC");
	$field_value[10]=xml_get_ele($da_dd_tlt_tlt_obj, "PROCESSED");
	$field_value[11]=xml_get_ele($da_dd_tlt_tlt_obj, "TEMPERATURE");     
	$field_value[12]=xml_get_ele($da_dd_tlt_tlt_obj, "BATTERY");      
	$field_value[13]=xml_get_ele($da_dd_tlt_tlt_obj, "ORGDIGITIZE");    
	$field_value[14]=xml_get_ele($da_dd_tlt_tlt_obj, "COMMENTS");       
	$field_value[15]=$ds_id;
	$field_value[16]=$di_tlt_id;
	$field_value[17]=$da_dd_tlt_tlt_obj['results']['owners'][0]['id'];
	$field_value[18]=$da_dd_tlt_tlt_obj['results']['owners'][1]['id'];
	$field_value[19]=$da_dd_tlt_tlt_obj['results']['owners'][2]['id'];
	$field_value[20]=$da_dd_tlt_tlt_obj['results']['pubdate'];
	$field_value[21]=$cc_id_load;
	$field_value[22]=$current_time;
	$field_value[23]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_tlt_tlt_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="dd_tlt";
	$field_name=array();
	$field_name[0]="dd_tlt_pubdate";
	$field_name[1]="dd_tlt_time";
	$field_name[2]="dd_tlt_timecsec";
	$field_name[3]="dd_tlt_time_unc";
	$field_name[4]="dd_tlt_timecsec_unc";
	$field_name[5]="dd_tlt_srate";
	$field_name[6]="dd_tlt1";
	$field_name[7]="dd_tlt_err1";
	$field_name[8]="dd_tlt2";
	$field_name[9]="dd_tlt_err2";
	$field_name[10]="dd_tlt_proc_flg";
	$field_name[11]="dd_tlt_temp";      
	$field_name[12]="dd_tlt_bat";         
	$field_name[13]="dd_tlt_ori";        
	$field_name[14]="dd_tlt_com";         	
	$field_name[15]="ds_id";
	$field_name[16]="di_tlt_id";
	$field_name[17]="cc_id";
	$field_name[18]="cc_id2";
	$field_name[19]="cc_id3";
	$field_name[20]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_dd_tlt_tlt_obj['results']['pubdate'];
	$field_value[1]=$da_dd_tlt_tlt_obj['results']['dd_tlt_time'];
	$field_value[2]=xml_get_ele($da_dd_tlt_tlt_obj, "MEASTIMECSEC");	
	$field_value[3]=$da_dd_tlt_tlt_obj['results']['dd_tlt_time_unc'];
	$field_value[4]=xml_get_ele($da_dd_tlt_tlt_obj, "MEASTIMECSECUNC");	     
	$field_value[5]=xml_get_ele($da_dd_tlt_tlt_obj, "SAMPLERATE");
	$field_value[6]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT1");
	$field_value[7]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT1UNC");
	$field_value[8]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT2");
	$field_value[9]=xml_get_ele($da_dd_tlt_tlt_obj, "TILT2UNC");
	$field_value[10]=xml_get_ele($da_dd_tlt_tlt_obj, "PROCESSED");
	$field_value[11]=xml_get_ele($da_dd_tlt_tlt_obj, "TEMPERATURE");     
	$field_value[12]=xml_get_ele($da_dd_tlt_tlt_obj, "BATTERY");         
	$field_value[13]=xml_get_ele($da_dd_tlt_tlt_obj, "ORGDIGITIZE");  
	$field_value[14]=xml_get_ele($da_dd_tlt_tlt_obj, "COMMENTS");       
	$field_value[15]=$ds_id;
	$field_value[16]=$di_tlt_id;
	$field_value[17]=$da_dd_tlt_tlt_obj['results']['owners'][0]['id'];
	$field_value[18]=$da_dd_tlt_tlt_obj['results']['owners'][1]['id'];
	$field_value[19]=$da_dd_tlt_tlt_obj['results']['owners'][2]['id'];
	$field_value[20]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="dd_tlt_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_tlt_tlt_obj['id']=$id;
	array_push($db_ids, $id);
}

?>