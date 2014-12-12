<?php

// Get code
$code=xml_get_att($er_phs_phs_for_obj, "CODE");

// Get owners
$owners=$er_phs_phs_for_obj['results']['owners'];

// INSERT or UPDATE?
$id=v1_get_id("ed_for", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ed_for";
	$field_name=array();
	$field_name[0]="ed_for_code";
	$field_name[1]="ed_for_desc";
	$field_name[2]="ed_for_open";
	$field_name[3]="ed_for_open_unc";
	$field_name[4]="ed_for_close";
	$field_name[5]="ed_for_close_unc";
	$field_name[6]="ed_for_time";
	$field_name[7]="ed_for_time_unc";
	$field_name[8]="ed_for_tsucc";
	$field_name[9]="ed_for_msucc";
	$field_name[10]="ed_for_com";
	$field_name[11]="ed_phs_id";
	$field_name[12]="vd_id";
	$field_name[13]="cc_id";
	$field_name[14]="cc_id2";
	$field_name[15]="cc_id3";
	$field_name[16]="ed_for_pubdate";
	$field_name[17]="cc_id_load";
	$field_name[18]="ed_for_loaddate";
	$field_name[19]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($er_phs_phs_for_obj, "DESCRIPTION");
	$field_value[2]=xml_get_ele($er_phs_phs_for_obj, "EARLIESTSTARTTIME");
	$field_value[3]=xml_get_ele($er_phs_phs_for_obj, "EARLIESTSTARTTIMEUNC");
	$field_value[4]=xml_get_ele($er_phs_phs_for_obj, "LATESTSTARTTIME");
	$field_value[5]=xml_get_ele($er_phs_phs_for_obj, "LATESTSTARTTIMEUNC");
	$field_value[6]=xml_get_ele($er_phs_phs_for_obj, "ISSUETIME");
	$field_value[7]=xml_get_ele($er_phs_phs_for_obj, "ISSUETIMEUNC");
	$field_value[8]=xml_get_ele($er_phs_phs_for_obj, "TIMESUCCESS");
	$field_value[9]=xml_get_ele($er_phs_phs_for_obj, "MAGNISUCCESS");
	$field_value[10]=xml_get_ele($er_phs_phs_for_obj, "COMMENTS");
	$field_value[11]=$er_phs_phs_obj['id'];
	$field_value[12]=$er_phs_phs_for_obj['results']['vd_id'];
	$field_value[13]=$er_phs_phs_for_obj['results']['owners'][0]['id'];
	$field_value[14]=$er_phs_phs_for_obj['results']['owners'][1]['id'];
	$field_value[15]=$er_phs_phs_for_obj['results']['owners'][2]['id'];
	$field_value[16]=$er_phs_phs_for_obj['results']['pubdate'];
	$field_value[17]=$cc_id_load;
	$field_value[18]=$current_time;
	$field_value[19]=$cb_ids;
	
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
	$update_table="ed_for";
	$field_name=array();
	$field_name[0]="ed_for_pubdate";
	$field_name[1]="ed_for_desc";
	$field_name[2]="ed_for_open";
	$field_name[3]="ed_for_open_unc";
	$field_name[4]="ed_for_close";
	$field_name[5]="ed_for_close_unc";
	$field_name[6]="ed_for_time";
	$field_name[7]="ed_for_time_unc";
	$field_name[8]="ed_for_tsucc";
	$field_name[9]="ed_for_msucc";
	$field_name[10]="ed_for_com";
	$field_name[11]="ed_phs_id";
	$field_name[12]="vd_id";
	$field_name[13]="cc_id";
	$field_name[14]="cc_id2";
	$field_name[15]="cc_id3";
	$field_name[16]="cb_ids";
	$field_value=array();
	$field_value[0]=$er_phs_phs_for_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($er_phs_phs_for_obj, "DESCRIPTION");
	$field_value[2]=xml_get_ele($er_phs_phs_for_obj, "EARLIESTSTARTTIME");
	$field_value[3]=xml_get_ele($er_phs_phs_for_obj, "EARLIESTSTARTTIMEUNC");
	$field_value[4]=xml_get_ele($er_phs_phs_for_obj, "LATESTSTARTTIME");
	$field_value[5]=xml_get_ele($er_phs_phs_for_obj, "LATESTSTARTTIMEUNC");
	$field_value[6]=xml_get_ele($er_phs_phs_for_obj, "ISSUETIME");
	$field_value[7]=xml_get_ele($er_phs_phs_for_obj, "ISSUETIMEUNC");
	$field_value[8]=xml_get_ele($er_phs_phs_for_obj, "TIMESUCCESS");
	$field_value[9]=xml_get_ele($er_phs_phs_for_obj, "MAGNISUCCESS");
	$field_value[10]=xml_get_ele($er_phs_phs_for_obj, "COMMENTS");
	$field_value[11]=$er_phs_phs_obj['id'];
	$field_value[12]=$er_phs_phs_for_obj['results']['vd_id'];
	$field_value[13]=$er_phs_phs_for_obj['results']['owners'][0]['id'];
	$field_value[14]=$er_phs_phs_for_obj['results']['owners'][1]['id'];
	$field_value[15]=$er_phs_phs_for_obj['results']['owners'][2]['id'];
	$field_value[16]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ed_for_id";
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