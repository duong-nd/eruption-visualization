<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($er_ed_obj, "CODE");

// Get owners
$owners=$er_ed_obj['results']['owners'];

// INSERT or UPDATE?
$id=v1_get_id("ed", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ed";
	$field_name=array();
	$field_name[0]="ed_code";
	$field_name[1]="ed_name";
	$field_name[2]="ed_nar";
	$field_name[3]="ed_stime";
	$field_name[4]="ed_stime_bc";
	$field_name[5]="ed_stime_unc";
	$field_name[6]="ed_etime";
	$field_name[7]="ed_etime_bc";
	$field_name[8]="ed_etime_unc";
	$field_name[9]="ed_climax";
	$field_name[10]="ed_climax_bc";
	$field_name[11]="ed_climax_unc";
	$field_name[12]="ed_com";
	$field_name[13]="vd_id";
	$field_name[14]="cc_id";
	$field_name[15]="cc_id2";
	$field_name[16]="cc_id3";
	$field_name[17]="ed_pubdate";
	$field_name[18]="cc_id_load";
	$field_name[19]="ed_loaddate";
	$field_name[20]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($er_ed_obj, "NAME");
	$field_value[2]=xml_get_ele($er_ed_obj, "NARRATIVE");
	$field_value[3]=$er_ed_obj['results']['ed_stime'];
	$field_value[4]=$er_ed_obj['results']['ed_stime_bc'];
	$field_value[5]=xml_get_ele($er_ed_obj, "STARTTIMEUNC");
	$field_value[6]=$er_ed_obj['results']['ed_etime'];
	$field_value[7]=$er_ed_obj['results']['ed_etime_bc'];
	$field_value[8]=xml_get_ele($er_ed_obj, "ENDTIMEUNC");
	$field_value[9]=$er_ed_obj['results']['ed_climax'];
	$field_value[10]=$er_ed_obj['results']['ed_climax_bc'];
	$field_value[11]=xml_get_ele($er_ed_obj, "CLIMAXTIMEUNC");
	$field_value[12]=xml_get_ele($er_ed_obj, "COMMENTS");
	$field_value[13]=$er_ed_obj['results']['vd_id'];
	$field_value[14]=$er_ed_obj['results']['owners'][0]['id'];
	$field_value[15]=$er_ed_obj['results']['owners'][1]['id'];
	$field_value[16]=$er_ed_obj['results']['owners'][2]['id'];
	$field_value[17]=$er_ed_obj['results']['pubdate'];
	$field_value[18]=$cc_id_load;
	$field_value[19]=$current_time;
	$field_value[20]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$er_ed_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="ed";
	$field_name=array();
	$field_name[0]="ed_pubdate";
	$field_name[1]="ed_name";
	$field_name[2]="ed_nar";
	$field_name[3]="ed_stime";
	$field_name[4]="ed_stime_bc";
	$field_name[5]="ed_stime_unc";
	$field_name[6]="ed_etime";
	$field_name[7]="ed_etime_bc";
	$field_name[8]="ed_etime_unc";
	$field_name[9]="ed_climax";
	$field_name[10]="ed_climax_bc";
	$field_name[11]="ed_climax_unc";
	$field_name[12]="ed_com";
	$field_name[13]="vd_id";
	$field_name[14]="cc_id";
	$field_name[15]="cc_id2";
	$field_name[16]="cc_id3";
	$field_name[17]="cb_ids";
	$field_value=array();
	$field_value[0]=$er_ed_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($er_ed_obj, "NAME");
	$field_value[2]=xml_get_ele($er_ed_obj, "NARRATIVE");
	$field_value[3]=$er_ed_obj['results']['ed_stime'];
	$field_value[4]=$er_ed_obj['results']['ed_stime_bc'];
	$field_value[5]=xml_get_ele($er_ed_obj, "STARTTIMEUNC");
	$field_value[6]=$er_ed_obj['results']['ed_etime'];
	$field_value[7]=$er_ed_obj['results']['ed_etime_bc'];
	$field_value[8]=xml_get_ele($er_ed_obj, "ENDTIMEUNC");
	$field_value[9]=$er_ed_obj['results']['ed_climax'];
	$field_value[10]=$er_ed_obj['results']['ed_climax_bc'];
	$field_value[11]=xml_get_ele($er_ed_obj, "CLIMAXTIMEUNC");
	$field_value[12]=xml_get_ele($er_ed_obj, "COMMENTS");
	$field_value[13]=$er_ed_obj['results']['vd_id'];
	$field_value[14]=$er_ed_obj['results']['owners'][0]['id'];
	$field_value[15]=$er_ed_obj['results']['owners'][1]['id'];
	$field_value[16]=$er_ed_obj['results']['owners'][2]['id'];
	$field_value[17]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ed_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$er_ed_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($er_ed_obj['value'] as &$er_ed_ele) {
	switch ($er_ed_ele['tag']) {
		case "VIDEO":
			$er_ed_vid_obj=&$er_ed_ele;
			include "er_ed_vid.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "PHASE":
			$er_ed_phs_obj=&$er_ed_ele;
			include "er_ed_phs.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>