<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ob_co_obj, "CODE");

// Get owners
$owners=$ob_co_obj['results']['owners'];

// INSERT or UPDATE?
$id=v1_get_id("co", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="co";
	$field_name=array();
	$field_name[0]="co_code";
	$field_name[1]="co_observe";
	$field_name[2]="co_stime";
	$field_name[3]="co_stime_unc";
	$field_name[4]="co_etime";
	$field_name[5]="co_etime_unc";  
	$field_name[6]="co_com";           
	$field_name[7]="vd_id";
	$field_name[8]="cc_id";
	$field_name[9]="cc_id2";
	$field_name[10]="cc_id3";
	$field_name[11]="co_pubdate";
	$field_name[12]="cc_id_load";
	$field_name[13]="co_loaddate";
	$field_name[14]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ob_co_obj, "DESCRIPTION");
	$field_value[2]=xml_get_ele($ob_co_obj, "STARTTIME");
	$field_value[3]=xml_get_ele($ob_co_obj, "STARTTIMEUNC");
	$field_value[4]=xml_get_ele($ob_co_obj, "ENDTIME");
	$field_value[5]=xml_get_ele($ob_co_obj, "ENDTIMEUNC");
	$field_value[6]=xml_get_ele($ob_co_obj, "COMMENTS");	     
	$field_value[7]=$ob_co_obj['results']['vd_id'];
	$field_value[8]=$ob_co_obj['results']['owners'][0]['id'];
	$field_value[9]=$ob_co_obj['results']['owners'][1]['id'];
	$field_value[10]=$ob_co_obj['results']['owners'][2]['id'];
	$field_value[11]=$ob_co_obj['results']['pubdate'];
	$field_value[12]=$cc_id_load;
	$field_value[13]=$current_time;
	$field_value[14]=$cb_ids;
	
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
	$update_table="co";
	$field_name=array();
	$field_name[0]="co_observe";
	$field_name[1]="co_stime";
	$field_name[2]="co_stime_unc";
	$field_name[3]="co_etime";
	$field_name[4]="co_etime_unc";
	$field_name[5]="co_com";          	
	$field_name[6]="vd_id";
	$field_name[7]="co_pubdate";
	$field_name[8]="cc_id";
	$field_name[9]="cc_id2";
	$field_name[10]="cc_id3";
	$field_name[11]="cb_ids";
	$field_value=array();
	$field_value[0]=xml_get_ele($ob_co_obj, "DESCRIPTION");
	$field_value[1]=xml_get_ele($ob_co_obj, "STARTTIME");
	$field_value[2]=xml_get_ele($ob_co_obj, "STARTTIMEUNC");
	$field_value[3]=xml_get_ele($ob_co_obj, "ENDTIME");
	$field_value[4]=xml_get_ele($ob_co_obj, "ENDTIMEUNC");
	$field_value[5]=xml_get_ele($ob_co_obj, "COMMENTS");	     
	$field_value[6]=$ob_co_obj['results']['vd_id'];
	$field_value[7]=$ob_co_obj['results']['pubdate'];
	$field_value[8]=$ob_co_obj['results']['owners'][0]['id'];
	$field_value[9]=$ob_co_obj['results']['owners'][1]['id'];
	$field_value[10]=$ob_co_obj['results']['owners'][2]['id'];
	$field_value[11]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="co_id";
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