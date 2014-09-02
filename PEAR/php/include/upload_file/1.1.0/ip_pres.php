<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ip_pres_obj, "CODE");

// Get owners
$owners=$ip_pres_obj['results']['owners'];

// INSERT or UPDATE?
$id=v1_get_id("ip_pres", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ip_pres";
	$field_name=array();
	$field_name[0]="ip_pres_code";
	$field_name[1]="ip_pres_time";
	$field_name[2]="ip_pres_time_unc";
	$field_name[3]="ip_pres_start";
	$field_name[4]="ip_pres_start_unc";
	$field_name[5]="ip_pres_end";
	$field_name[6]="ip_pres_end_unc";
	$field_name[7]="ip_pres_gas";
	$field_name[8]="ip_pres_tec";
	$field_name[9]="ip_pres_ori";      
	$field_name[10]="ip_pres_com";
	$field_name[11]="vd_id";
	$field_name[12]="cc_id";
	$field_name[13]="cc_id2";
	$field_name[14]="cc_id3";
	$field_name[15]="ip_pres_pubdate";
	$field_name[16]="cc_id_load";
	$field_name[17]="ip_pres_loaddate";
	$field_name[18]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ip_pres_obj, "INFERTIME");
	$field_value[2]=xml_get_ele($ip_pres_obj, "INFERTIMEUNC");
	$field_value[3]=xml_get_ele($ip_pres_obj, "STARTTIME");
	$field_value[4]=xml_get_ele($ip_pres_obj, "STARTTIMEUNC");
	$field_value[5]=xml_get_ele($ip_pres_obj, "ENDTIME");
	$field_value[6]=xml_get_ele($ip_pres_obj, "ENDTIMEUNC");
	$field_value[7]=xml_get_ele($ip_pres_obj, "GASINDUCED");
	$field_value[8]=xml_get_ele($ip_pres_obj, "TECTINDUCED");
	$field_value[9]=xml_get_ele($ip_pres_obj, "ORGDIGITIZE");	  
	$field_value[10]=xml_get_ele($ip_pres_obj, "COMMENTS");
	$field_value[11]=$ip_pres_obj['results']['vd_id'];
	$field_value[12]=$ip_pres_obj['results']['owners'][0]['id'];
	$field_value[13]=$ip_pres_obj['results']['owners'][1]['id'];
	$field_value[14]=$ip_pres_obj['results']['owners'][2]['id'];
	$field_value[15]=$ip_pres_obj['results']['pubdate'];
	$field_value[16]=$cc_id_load;
	$field_value[17]=$current_time;
	$field_value[18]=$cb_ids;
	
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
	$update_table="ip_pres";
	$field_name=array();
	$field_name=array();
	$field_name[0]="ip_pres_pubdate";
	$field_name[1]="ip_pres_time";
	$field_name[2]="ip_pres_time_unc";
	$field_name[3]="ip_pres_start";
	$field_name[4]="ip_pres_start_unc";
	$field_name[5]="ip_pres_end";
	$field_name[6]="ip_pres_end_unc";
	$field_name[7]="ip_pres_gas";
	$field_name[8]="ip_pres_tec";
	$field_name[9]="ip_pres_ori";        
	$field_name[10]="ip_pres_com";
	$field_name[11]="vd_id";
	$field_name[12]="cc_id";
	$field_name[13]="cc_id2";
	$field_name[14]="cc_id3";
	$field_name[15]="cb_ids";
	$field_value=array();
	$field_value[0]=$ip_pres_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ip_pres_obj, "INFERTIME");
	$field_value[2]=xml_get_ele($ip_pres_obj, "INFERTIMEUNC");
	$field_value[3]=xml_get_ele($ip_pres_obj, "STARTTIME");
	$field_value[4]=xml_get_ele($ip_pres_obj, "STARTTIMEUNC");
	$field_value[5]=xml_get_ele($ip_pres_obj, "ENDTIME");
	$field_value[6]=xml_get_ele($ip_pres_obj, "ENDTIMEUNC");
	$field_value[7]=xml_get_ele($ip_pres_obj, "GASINDUCED");
	$field_value[8]=xml_get_ele($ip_pres_obj, "TECTINDUCED");
	$field_value[9]=xml_get_ele($ip_pres_obj, "ORGDIGITIZE");	   
	$field_value[10]=xml_get_ele($ip_pres_obj, "COMMENTS");
	$field_value[11]=$ip_pres_obj['results']['vd_id'];
	$field_value[12]=$ip_pres_obj['results']['owners'][0]['id'];
	$field_value[13]=$ip_pres_obj['results']['owners'][1]['id'];
	$field_value[14]=$ip_pres_obj['results']['owners'][2]['id'];
	$field_value[15]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ip_pres_id";
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