<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ip_mag_obj, "CODE");

// Get owners
$owners=$ip_mag_obj['results']['owners'];

// INSERT or UPDATE?
$id=v1_get_id("ip_mag", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ip_mag";
	$field_name=array();
	$field_name[0]="ip_mag_code";
	$field_name[1]="ip_mag_time";
	$field_name[2]="ip_mag_time_unc";
	$field_name[3]="ip_mag_start";
	$field_name[4]="ip_mag_start_unc";
	$field_name[5]="ip_mag_end";
	$field_name[6]="ip_mag_end_unc";
	$field_name[7]="ip_mag_deepsupp";
	$field_name[8]="ip_mag_asc";
	$field_name[9]="ip_mag_convb";
	$field_name[10]="ip_mag_conva";
	$field_name[11]="ip_mag_mix";
	$field_name[12]="ip_mag_dike";
	$field_name[13]="ip_mag_pipe";
	$field_name[14]="ip_mag_sill";
	$field_name[15]="ip_mag_ori";        
	$field_name[16]="ip_mag_com";
	$field_name[17]="vd_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="ip_mag_pubdate";
	$field_name[22]="cc_id_load";
	$field_name[23]="ip_mag_loaddate";
	$field_name[24]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ip_mag_obj, "INFERTIME");
	$field_value[2]=xml_get_ele($ip_mag_obj, "INFERTIMEUNC");
	$field_value[3]=xml_get_ele($ip_mag_obj, "STARTTIME");
	$field_value[4]=xml_get_ele($ip_mag_obj, "STARTTIMEUNC");
	$field_value[5]=xml_get_ele($ip_mag_obj, "ENDTIME");
	$field_value[6]=xml_get_ele($ip_mag_obj, "ENDTIMEUNC");
	$field_value[7]=xml_get_ele($ip_mag_obj, "DEEPSUPP");
	$field_value[8]=xml_get_ele($ip_mag_obj, "ASCENT");
	$field_value[9]=xml_get_ele($ip_mag_obj, "CONVECBELOW");
	$field_value[10]=xml_get_ele($ip_mag_obj, "CONVECABOVE");
	$field_value[11]=xml_get_ele($ip_mag_obj, "MAGMAMIX");
	$field_value[12]=xml_get_ele($ip_mag_obj, "DIKEINTRU");
	$field_value[13]=xml_get_ele($ip_mag_obj, "PIPEINTRU");
	$field_value[14]=xml_get_ele($ip_mag_obj, "SILLINTRU");
	$field_value[15]=xml_get_ele($ip_mag_obj, "ORGDIGITIZE");	  
	$field_value[16]=xml_get_ele($ip_mag_obj, "COMMENTS");
	$field_value[17]=$ip_mag_obj['results']['vd_id'];
	$field_value[18]=$ip_mag_obj['results']['owners'][0]['id'];
	$field_value[19]=$ip_mag_obj['results']['owners'][1]['id'];
	$field_value[20]=$ip_mag_obj['results']['owners'][2]['id'];
	$field_value[21]=$ip_mag_obj['results']['pubdate'];
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
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="ip_mag";
	$field_name=array();
	$field_name=array();
	$field_name[0]="ip_mag_pubdate";
	$field_name[1]="ip_mag_time";
	$field_name[2]="ip_mag_time_unc";
	$field_name[3]="ip_mag_start";
	$field_name[4]="ip_mag_start_unc";
	$field_name[5]="ip_mag_end";
	$field_name[6]="ip_mag_end_unc";
	$field_name[7]="ip_mag_deepsupp";
	$field_name[8]="ip_mag_asc";
	$field_name[9]="ip_mag_convb";
	$field_name[10]="ip_mag_conva";
	$field_name[11]="ip_mag_mix";
	$field_name[12]="ip_mag_dike";
	$field_name[13]="ip_mag_pipe";
	$field_name[14]="ip_mag_sill";
	$field_name[15]="ip_mag_ori";	   
	$field_name[16]="ip_mag_com";
	$field_name[17]="vd_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="cb_ids";
	$field_value=array();
	$field_value[0]=$ip_mag_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ip_mag_obj, "INFERTIME");
	$field_value[2]=xml_get_ele($ip_mag_obj, "INFERTIMEUNC");
	$field_value[3]=xml_get_ele($ip_mag_obj, "STARTTIME");
	$field_value[4]=xml_get_ele($ip_mag_obj, "STARTTIMEUNC");
	$field_value[5]=xml_get_ele($ip_mag_obj, "ENDTIME");
	$field_value[6]=xml_get_ele($ip_mag_obj, "ENDTIMEUNC");
	$field_value[7]=xml_get_ele($ip_mag_obj, "DEEPSUPP");
	$field_value[8]=xml_get_ele($ip_mag_obj, "ASCENT");
	$field_value[9]=xml_get_ele($ip_mag_obj, "CONVECBELOW");
	$field_value[10]=xml_get_ele($ip_mag_obj, "CONVECABOVE");
	$field_value[11]=xml_get_ele($ip_mag_obj, "MAGMAMIX");
	$field_value[12]=xml_get_ele($ip_mag_obj, "DIKEINTRU");
	$field_value[13]=xml_get_ele($ip_mag_obj, "PIPEINTRU");
	$field_value[14]=xml_get_ele($ip_mag_obj, "SILLINTRU");
	$field_value[15]=xml_get_ele($ip_mag_obj, "ORGDIGITIZE");	   
	$field_value[16]=xml_get_ele($ip_mag_obj, "COMMENTS");
	$field_value[17]=$ip_mag_obj['results']['vd_id'];
	$field_value[18]=$ip_mag_obj['results']['owners'][0]['id'];
	$field_value[19]=$ip_mag_obj['results']['owners'][1]['id'];
	$field_value[20]=$ip_mag_obj['results']['owners'][2]['id'];
	$field_value[21]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ip_mag_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	array_push($db_ids, $id);
}

?>