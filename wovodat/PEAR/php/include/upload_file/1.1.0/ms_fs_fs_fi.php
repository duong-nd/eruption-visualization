<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_fs_fs_fi_obj, "CODE");

// Get owners
$owners=$ms_fs_fs_fi_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_fs_fs_fi_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("fi", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="fi";
	$field_name=array();
	$field_name[0]="fi_code";
	$field_name[1]="fi_name";
	$field_name[2]="fi_type";
	$field_name[3]="fi_units";
	$field_name[4]="fi_res";
	$field_name[5]="fi_rate";
	$field_name[6]="fi_filter";
	$field_name[7]="fi_orient";
	$field_name[8]="fi_calc";
	$field_name[9]="fi_stime";
	$field_name[10]="fi_stime_unc";
	$field_name[11]="fi_etime";
	$field_name[12]="fi_etime_unc";
	$field_name[13]="fi_ori";              
	$field_name[14]="fi_com";
	$field_name[15]="fs_id";
	$field_name[16]="cc_id";
	$field_name[17]="cc_id2";
	$field_name[18]="cc_id3";
	$field_name[19]="fi_pubdate";
	$field_name[20]="cc_id_load";
	$field_name[21]="fi_loaddate";
	$field_name[22]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_fs_fs_fi_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_fs_fs_fi_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_fs_fs_fi_obj, "UNITS");
	$field_value[4]=xml_get_ele($ms_fs_fs_fi_obj, "RESOLUTION");
	$field_value[5]=xml_get_ele($ms_fs_fs_fi_obj, "SAMPLERATE");
	$field_value[6]=xml_get_ele($ms_fs_fs_fi_obj, "FILTERTYPE");
	$field_value[7]=xml_get_ele($ms_fs_fs_fi_obj, "ORIENTATION");
	$field_value[8]=xml_get_ele($ms_fs_fs_fi_obj, "CALCULATION");
	$field_value[9]=$stime;
	$field_value[10]=xml_get_ele($ms_fs_fs_fi_obj, "STARTTIMEUNC");
	$field_value[11]=xml_get_ele($ms_fs_fs_fi_obj, "ENDTIME");
	$field_value[12]=xml_get_ele($ms_fs_fs_fi_obj, "ENDTIMEUNC");
	$field_value[13]=xml_get_ele($ms_fs_fs_fi_obj, "ORGDIGITIZE");   
	$field_value[14]=xml_get_ele($ms_fs_fs_fi_obj, "COMMENTS");
	$field_value[15]=$ms_fs_fs_obj['id'];
	$field_value[16]=$ms_fs_fs_fi_obj['results']['owners'][0]['id'];
	$field_value[17]=$ms_fs_fs_fi_obj['results']['owners'][1]['id'];
	$field_value[18]=$ms_fs_fs_fi_obj['results']['owners'][2]['id'];
	$field_value[19]=$ms_fs_fs_fi_obj['results']['pubdate'];
	$field_value[20]=$cc_id_load;
	$field_value[21]=$current_time;
	$field_value[22]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_fs_fs_fi_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="fi";
	$field_name=array();
	$field_name[0]="fi_pubdate";
	$field_name[1]="fi_name";
	$field_name[2]="fi_type";
	$field_name[3]="fi_units";
	$field_name[4]="fi_res";
	$field_name[5]="fi_rate";
	$field_name[6]="fi_filter";
	$field_name[7]="fi_orient";
	$field_name[8]="fi_calc";
	$field_name[9]="fs_id";
	$field_name[10]="fi_stime_unc";
	$field_name[11]="fi_etime";
	$field_name[12]="fi_etime_unc";
	$field_name[13]="fi_ori";             
	$field_name[14]="fi_com";
	$field_name[15]="cc_id";
	$field_name[16]="cc_id2";
	$field_name[17]="cc_id3";
	$field_name[18]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_fs_fs_fi_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_fs_fs_fi_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_fs_fs_fi_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_fs_fs_fi_obj, "UNITS");
	$field_value[4]=xml_get_ele($ms_fs_fs_fi_obj, "RESOLUTION");
	$field_value[5]=xml_get_ele($ms_fs_fs_fi_obj, "SAMPLERATE");
	$field_value[6]=xml_get_ele($ms_fs_fs_fi_obj, "FILTERTYPE");
	$field_value[7]=xml_get_ele($ms_fs_fs_fi_obj, "ORIENTATION");
	$field_value[8]=xml_get_ele($ms_fs_fs_fi_obj, "CALCULATION");
	$field_value[9]=$ms_fs_fs_obj['id'];
	$field_value[10]=xml_get_ele($ms_fs_fs_fi_obj, "STARTTIMEUNC");
	$field_value[11]=xml_get_ele($ms_fs_fs_fi_obj, "ENDTIME");
	$field_value[12]=xml_get_ele($ms_fs_fs_fi_obj, "ENDTIMEUNC");
	$field_value[13]=xml_get_ele($ms_fs_fs_fi_obj, "ORGDIGITIZE");  	
	$field_value[14]=xml_get_ele($ms_fs_fs_fi_obj, "COMMENTS");
	$field_value[15]=$ms_fs_fs_fi_obj['results']['owners'][0]['id'];
	$field_value[16]=$ms_fs_fs_fi_obj['results']['owners'][1]['id'];
	$field_value[17]=$ms_fs_fs_fi_obj['results']['owners'][2]['id'];
	$field_value[18]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="fi_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_fs_fs_fi_obj['id']=$id;
	array_push($db_ids, $id);
}

?>