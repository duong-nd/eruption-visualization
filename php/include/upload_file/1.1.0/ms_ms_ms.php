<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code  
$code=xml_get_att($ms_ms_ms_obj, "CODE");

// Get owners
$owners=$ms_ms_ms_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_ms_ms_obj, "STARTTIME");

// Prepare link to cn_id
if (substr($ms_ms_ms_obj['results']['cn_id'], 0, 1)=="@") {
	$cn_id=$db_ids[substr($ms_ms_ms_obj['results']['cn_id'], 1)];
}
else {
	$cn_id=$ms_ms_ms_obj['results']['cn_id'];
}

// INSERT or UPDATE?
$id=v1_get_id_ms("ms", $code, $stime, $owners, $cn_id);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ms";
	
	$field_name=array();
	$field_name[0]="ms_code";
	$field_name[1]="ms_name";
	$field_name[2]="ms_type";
	$field_name[3]="ms_perm";
	$field_name[4]="ms_lat";
	$field_name[5]="ms_lon";
	$field_name[6]="ms_elev";
	$field_name[7]="ms_stime";
	$field_name[8]="ms_stime_unc";
	$field_name[9]="ms_etime";
	$field_name[10]="ms_etime_unc";
	$field_name[11]="ms_utc";
	$field_name[12]="ms_desc";
	$field_name[13]="ms_ori";
	$field_name[14]="ms_com";
	$field_name[15]="cn_id";	
	$field_name[16]="cc_id";
	$field_name[17]="cc_id2";
	$field_name[18]="cc_id3";
	$field_name[19]="ms_pubdate";
	$field_name[20]="cc_id_load";
	$field_name[21]="ms_loaddate";
	$field_name[22]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_ms_ms_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_ms_ms_obj, "WATERBODYTYPE");
	$field_value[3]=xml_get_ele($ms_ms_ms_obj, "PERMINST");
	$field_value[4]=xml_get_ele($ms_ms_ms_obj, "LAT");
	$field_value[5]=xml_get_ele($ms_ms_ms_obj, "LON");
	$field_value[6]=xml_get_ele($ms_ms_ms_obj, "ELEV");
	$field_value[7]=$stime;
	$field_value[8]=xml_get_ele($ms_ms_ms_obj, "STARTTIMEUNC");
	$field_value[9]=xml_get_ele($ms_ms_ms_obj, "ENDTIME");
	$field_value[10]=xml_get_ele($ms_ms_ms_obj, "ENDTIMEUNC");
	$field_value[11]=xml_get_ele($ms_ms_ms_obj, "DIFFUTC");
	$field_value[12]=xml_get_ele($ms_ms_ms_obj, "DESCRIPTION");
	$field_value[13]=xml_get_ele($ms_ms_ms_obj, "ORGDIGITIZE");
	$field_value[14]=xml_get_ele($ms_ms_ms_obj, "COMMENTS");	
	$field_value[15]=$cn_id;
	$field_value[16]=$ms_ms_ms_obj['results']['owners'][0]['id'];
	$field_value[17]=$ms_ms_ms_obj['results']['owners'][1]['id'];
	$field_value[18]=$ms_ms_ms_obj['results']['owners'][2]['id'];
	$field_value[19]=$ms_ms_ms_obj['results']['pubdate'];
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
	$ms_ms_ms_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="ms";
	$field_name=array();
	$field_name[0]="ms_pubdate";
	$field_name[1]="ms_name";
	$field_name[2]="ms_type";
	$field_name[3]="ms_perm";
	$field_name[4]="ms_lat";
	$field_name[5]="ms_lon";
	$field_name[6]="ms_elev";
	$field_name[7]="cn_id";
	$field_name[8]="ms_stime_unc";
	$field_name[9]="ms_etime";
	$field_name[10]="ms_etime_unc";
	$field_name[11]="ms_utc";
	$field_name[12]="ms_desc";
	$field_name[13]="ms_ori";
	$field_name[14]="ms_com";	
	$field_name[15]="cc_id";
	$field_name[16]="cc_id2";
	$field_name[17]="cc_id3";
	$field_name[18]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_ms_ms_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_ms_ms_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_ms_ms_obj, "WATERBODYTYPE");
	$field_value[3]=xml_get_ele($ms_ms_ms_obj, "PERMINST");
	$field_value[4]=xml_get_ele($ms_ms_ms_obj, "LAT");
	$field_value[5]=xml_get_ele($ms_ms_ms_obj, "LON");
	$field_value[6]=xml_get_ele($ms_ms_ms_obj, "ELEV");
	$field_value[7]=$cn_id;
	$field_value[8]=xml_get_ele($ms_ms_ms_obj, "STARTTIMEUNC");
	$field_value[9]=xml_get_ele($ms_ms_ms_obj, "ENDTIME");
	$field_value[10]=xml_get_ele($ms_ms_ms_obj, "ENDTIMEUNC");
	$field_value[11]=xml_get_ele($ms_ms_ms_obj, "DIFFUTC");
	$field_value[12]=xml_get_ele($ms_ms_ms_obj, "DESCRIPTION");
	$field_value[13]=xml_get_ele($ms_ms_ms_obj, "ORGDIGITIZE");
	$field_value[14]=xml_get_ele($ms_ms_ms_obj, "COMMENTS");	
	$field_value[15]=$ms_ms_ms_obj['results']['owners'][0]['id'];
	$field_value[16]=$ms_ms_ms_obj['results']['owners'][1]['id'];
	$field_value[17]=$ms_ms_ms_obj['results']['owners'][2]['id'];
	$field_value[18]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ms_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_ms_ms_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_ms_ms_obj['value'] as &$ms_ms_ms_ele) {
	switch ($ms_ms_ms_ele['tag']) {
		case "METEOINSTRUMENT":
			$ms_ms_ms_mi_obj=&$ms_ms_ms_ele;
			include "ms_ms_ms_mi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>