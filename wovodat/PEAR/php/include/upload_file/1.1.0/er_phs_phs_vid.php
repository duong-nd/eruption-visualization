<?php

// Get code
$code=xml_get_att($er_phs_phs_vid_obj, "CODE");

// Get owners
$owners=$er_phs_phs_vid_obj['results']['owners'];

// INSERT or UPDATE?
$id=v1_get_id("ed_vid", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ed_vid";
	$field_name=array();
	$field_name[0]="ed_vid_code";
	$field_name[1]="ed_vid_link";
	$field_name[2]="ed_vid_stime";
	$field_name[3]="ed_vid_stime_unc";
	$field_name[4]="ed_vid_length";
	$field_name[5]="ed_vid_desc";
	$field_name[6]="ed_vid_com";
	$field_name[7]="ed_id";
	$field_name[8]="vd_id";
	$field_name[9]="cc_id";
	$field_name[10]="cc_id2";
	$field_name[11]="cc_id3";
	$field_name[12]="ed_vid_pubdate";
	$field_name[13]="cc_id_load";
	$field_name[14]="ed_vid_loaddate";
	$field_name[15]="ed_phs_id";
	$field_name[16]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($er_phs_phs_vid_obj, "LINK");
	$field_value[2]=xml_get_ele($er_phs_phs_vid_obj, "STARTTIME");
	$field_value[3]=xml_get_ele($er_phs_phs_vid_obj, "STARTTIMEUNC");
	$field_value[4]=xml_get_ele($er_phs_phs_vid_obj, "LENGTH");
	$field_value[5]=xml_get_ele($er_phs_phs_vid_obj, "DESCRIPTION");
	$field_value[6]=xml_get_ele($er_phs_phs_vid_obj, "COMMENTS");
	$field_value[7]=$ed_id;
	$field_value[8]=$er_phs_phs_vid_obj['results']['vd_id'];
	$field_value[9]=$er_phs_phs_vid_obj['results']['owners'][0]['id'];
	$field_value[10]=$er_phs_phs_vid_obj['results']['owners'][1]['id'];
	$field_value[11]=$er_phs_phs_vid_obj['results']['owners'][2]['id'];
	$field_value[12]=$er_phs_phs_vid_obj['results']['pubdate'];
	$field_value[13]=$cc_id_load;
	$field_value[14]=$current_time;
	$field_value[15]=$er_phs_phs_obj['id'];
	$field_value[16]=$cb_ids;
	
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
	$update_table="ed_vid";
	$field_name=array();
	$field_name[0]="ed_vid_pubdate";
	$field_name[1]="ed_vid_link";
	$field_name[2]="ed_vid_stime";
	$field_name[3]="ed_vid_stime_unc";
	$field_name[4]="ed_vid_length";
	$field_name[5]="ed_vid_desc";
	$field_name[6]="ed_vid_com";
	$field_name[7]="ed_id";
	$field_name[8]="vd_id";
	$field_name[9]="cc_id";
	$field_name[10]="cc_id2";
	$field_name[11]="cc_id3";
	$field_name[12]="ed_phs_id";
	$field_name[13]="cb_ids";
	$field_value=array();
	$field_value[0]=$er_phs_phs_vid_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($er_phs_phs_vid_obj, "LINK");
	$field_value[2]=xml_get_ele($er_phs_phs_vid_obj, "STARTTIME");
	$field_value[3]=xml_get_ele($er_phs_phs_vid_obj, "STARTTIMEUNC");
	$field_value[4]=xml_get_ele($er_phs_phs_vid_obj, "LENGTH");
	$field_value[5]=xml_get_ele($er_phs_phs_vid_obj, "DESCRIPTION");
	$field_value[6]=xml_get_ele($er_phs_phs_vid_obj, "COMMENTS");
	$field_value[7]=$ed_id;
	$field_value[8]=$er_phs_phs_vid_obj['results']['vd_id'];
	$field_value[9]=$er_phs_phs_vid_obj['results']['owners'][0]['id'];
	$field_value[10]=$er_phs_phs_vid_obj['results']['owners'][1]['id'];
	$field_value[11]=$er_phs_phs_vid_obj['results']['owners'][2]['id'];
	$field_value[12]=$er_phs_phs_obj['id'];
	$field_value[13]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ed_vid_id";
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