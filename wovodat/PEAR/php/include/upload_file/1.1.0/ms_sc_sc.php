<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_sc_sc_obj, "CODE");

// Get owners
$owners=$ms_sc_sc_obj['results']['owners'];

// Prepare link to si_id
if (substr($ms_sc_sc_obj['results']['si_id'], 0, 1)=="@") {
	$si_id=$db_ids[substr($ms_sc_sc_obj['results']['si_id'], 1)];
}
else {
	$si_id=$ms_sc_sc_obj['results']['si_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("si_cmp", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="si_cmp";
	$field_name=array();
	$field_name[0]="si_cmp_code";
	$field_name[1]="si_cmp_name";
	$field_name[2]="si_cmp_type";
	$field_name[3]="si_cmp_com";
	$field_name[4]="si_cmp_resp";
	$field_name[5]="si_cmp_samp";
	$field_name[6]="si_cmp_band";
	$field_name[7]="si_cmp_icode";
	$field_name[8]="si_cmp_orient";
	$field_name[9]="si_cmp_sens";
	$field_name[10]="si_cmp_depth";
	$field_name[11]="si_id";
	$field_name[12]="cc_id";
	$field_name[13]="cc_id2";
	$field_name[14]="cc_id3";
	$field_name[15]="si_cmp_pubdate";
	$field_name[16]="cc_id_load";
	$field_name[17]="si_cmp_loaddate";
	$field_name[18]="cb_ids";
	$field_name[19]="si_cmp_ori";	           	
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_sc_sc_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_sc_sc_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_sc_sc_obj, "COMMENTS");
	$field_value[4]=xml_get_ele($ms_sc_sc_obj, "RESPDESC");
	$field_value[5]=xml_get_ele($ms_sc_sc_obj, "SAMPLERATE");
	$field_value[6]=xml_get_ele($ms_sc_sc_obj, "SEEDBANDCODE");
	$field_value[7]=xml_get_ele($ms_sc_sc_obj, "SEEDINSTCODE");
	$field_value[8]=xml_get_ele($ms_sc_sc_obj, "SEEDORIENTCODE");
	$field_value[9]=xml_get_ele($ms_sc_sc_obj, "SENSITIVITY");
	$field_value[10]=xml_get_ele($ms_sc_sc_obj, "DEPTH");
	$field_value[11]=$si_id;
	$field_value[12]=$ms_sc_sc_obj['results']['owners'][0]['id'];
	$field_value[13]=$ms_sc_sc_obj['results']['owners'][1]['id'];
	$field_value[14]=$ms_sc_sc_obj['results']['owners'][2]['id'];
	$field_value[15]=$ms_sc_sc_obj['results']['pubdate'];
	$field_value[16]=$cc_id_load;
	$field_value[17]=$current_time;
	$field_value[18]=$cb_ids;
	$field_value[19]=xml_get_ele($ms_sc_sc_obj,  "ORGDIGITIZE");	          
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_sc_sc_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="si_cmp";
	$field_name=array();
	$field_name[0]="si_cmp_pubdate";
	$field_name[1]="si_cmp_name";
	$field_name[2]="si_cmp_type";
	$field_name[3]="si_cmp_com";
	$field_name[4]="si_cmp_resp";
	$field_name[5]="si_cmp_samp";
	$field_name[6]="si_cmp_band";
	$field_name[7]="si_cmp_icode";
	$field_name[8]="si_cmp_orient";
	$field_name[9]="si_cmp_sens";
	$field_name[10]="si_cmp_depth";
	$field_name[11]="si_id";
	$field_name[12]="cc_id";
	$field_name[13]="cc_id2";
	$field_name[14]="cc_id3";
	$field_name[15]="cb_ids";
	$field_name[16]="si_cmp_ori";	           
	$field_value=array();
	$field_value[0]=$ms_sc_sc_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_sc_sc_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_sc_sc_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_sc_sc_obj, "COMMENTS");
	$field_value[4]=xml_get_ele($ms_sc_sc_obj, "RESPDESC");
	$field_value[5]=xml_get_ele($ms_sc_sc_obj, "SAMPLERATE");
	$field_value[6]=xml_get_ele($ms_sc_sc_obj, "SEEDBANDCODE");
	$field_value[7]=xml_get_ele($ms_sc_sc_obj, "SEEDINSTCODE");
	$field_value[8]=xml_get_ele($ms_sc_sc_obj, "SEEDORIENTCODE");
	$field_value[9]=xml_get_ele($ms_sc_sc_obj, "SENSITIVITY");
	$field_value[10]=xml_get_ele($ms_sc_sc_obj, "DEPTH");
	$field_value[11]=$si_id;
	$field_value[12]=$ms_sc_sc_obj['results']['owners'][0]['id'];
	$field_value[13]=$ms_sc_sc_obj['results']['owners'][1]['id'];
	$field_value[14]=$ms_sc_sc_obj['results']['owners'][2]['id'];
	$field_value[15]=$cb_ids;
	$field_value[16]=xml_get_ele($ms_sc_sc_obj,  "ORGDIGITIZE");	          	
	$where_field_name=array();
	$where_field_name[0]="si_cmp_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_sc_sc_obj['id']=$id;
	array_push($db_ids, $id);
}

?>