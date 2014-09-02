<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_cs_obj, "CODE");

// Get owners
$owners=$ms_cs_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_cs_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("cs", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="cs";
	$field_name=array();
	$field_name[0]="cs_code";
	$field_name[1]="cs_type";
	$field_name[2]="cs_name";
	$field_name[3]="cs_stime";
	$field_name[4]="cs_stime_unc";
	$field_name[5]="cs_etime";
	$field_name[6]="cs_etime_unc";
	$field_name[7]="cs_desc";
	$field_name[8]="cs_ori";	     
	$field_name[9]="cs_com";
	$field_name[10]="cc_id";
	$field_name[11]="cc_id2";
	$field_name[12]="cc_id3";
	$field_name[13]="cs_loaddate";
	$field_name[14]="cs_pubdate";
	$field_name[15]="cc_id_load";
	$field_name[16]="cb_ids";	
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]="A";
	$field_value[2]=xml_get_ele($ms_cs_obj, "NAME");
	$field_value[3]=$stime;
	$field_value[4]=xml_get_ele($ms_cs_obj, "STARTTIMEUNC");
	$field_value[5]=xml_get_ele($ms_cs_obj, "ENDTIME");
	$field_value[6]=xml_get_ele($ms_cs_obj, "ENDTIMEUNC");
	$field_value[7]=xml_get_ele($ms_cs_obj, "DESCRIPTION");
	$field_value[8]=xml_get_ele($ms_cs_obj, "ORGDIGITIZE");	  
	$field_value[9]=xml_get_ele($ms_cs_obj, "COMMENTS");	
	$field_value[10]=$ms_cs_obj['results']['owners'][0]['id'];
	$field_value[11]=$ms_cs_obj['results']['owners'][1]['id'];
	$field_value[12]=$ms_cs_obj['results']['owners'][2]['id'];
	$field_value[13]=$current_time;
	$field_value[14]=$ms_cs_obj['results']['pubdate'];
	$field_value[15]=$cc_id_load;
	$field_value[16]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_cs_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="cs";
	$field_name=array();
	$field_name[0]="cs_pubdate";
	$field_name[1]="cs_name";
	$field_name[2]="cs_stime_unc";
	$field_name[3]="cs_etime";
	$field_name[4]="cs_etime_unc";
	$field_name[5]="cs_desc";
	$field_name[6]="cs_ori";	   
	$field_name[7]="cs_com";	
	$field_name[8]="cc_id";
	$field_name[9]="cc_id2";
	$field_name[10]="cc_id3";
	$field_name[11]="cb_ids";	
	$field_value=array();
	$field_value[0]=$ms_cs_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_cs_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_cs_obj, "STARTTIMEUNC");
	$field_value[3]=xml_get_ele($ms_cs_obj, "ENDTIME");
	$field_value[4]=xml_get_ele($ms_cs_obj, "ENDTIMEUNC");
	$field_value[5]=xml_get_ele($ms_cs_obj, "DESCRIPTION");
	$field_value[6]=xml_get_ele($ms_cs_obj, "ORGDIGITIZE");	   
	$field_value[7]=xml_get_ele($ms_cs_obj, "COMMENTS");	
	$field_value[8]=$ms_cs_obj['results']['owners'][0]['id'];
	$field_value[9]=$ms_cs_obj['results']['owners'][1]['id'];
	$field_value[10]=$ms_cs_obj['results']['owners'][2]['id'];
	$field_value[11]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="cs_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_cs_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_cs_obj['value'] as &$ms_cs_ele) {
	switch ($ms_cs_ele['tag']) {
		case "GASINSTRUMENT":
			$ms_cs_gi_obj=&$ms_cs_ele;
			include "ms_cs_gi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "THERMALINSTRUMENT":
			$ms_cs_ti_obj=&$ms_cs_ele;
			include "ms_cs_ti.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>