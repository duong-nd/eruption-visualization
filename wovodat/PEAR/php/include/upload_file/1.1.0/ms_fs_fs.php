<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_fs_fs_obj, "CODE");

// Get owners
$owners=$ms_fs_fs_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_fs_fs_obj, "STARTTIME");

// Prepare link to cn_id
if (substr($ms_fs_fs_obj['results']['cn_id'], 0, 1)=="@") {
	$cn_id=$db_ids[substr($ms_fs_fs_obj['results']['cn_id'], 1)];
}
else {
	$cn_id=$ms_fs_fs_obj['results']['cn_id'];
}

// INSERT or UPDATE?
$id=v1_get_id_ms("fs", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="fs";
	$field_name=array();
	$field_name[0]="fs_code";
	$field_name[1]="fs_name";
	$field_name[2]="cn_id";
	$field_name[3]="fs_inst";
	$field_name[4]="fs_lat";
	$field_name[5]="fs_lon";
	$field_name[6]="fs_elev";
	$field_name[7]="fs_stime";
	$field_name[8]="fs_stime_unc";
	$field_name[9]="fs_etime";
	$field_name[10]="fs_etime_unc";
	$field_name[11]="fs_utc";
	$field_name[12]="fs_desc";
	$field_name[13]="fs_ori";     
	$field_name[14]="fs_com";	 
	$field_name[15]="cc_id";
	$field_name[16]="cc_id2";
	$field_name[17]="cc_id3";
	$field_name[18]="fs_pubdate";
	$field_name[19]="cc_id_load";
	$field_name[20]="fs_loaddate";
	$field_name[21]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_fs_fs_obj, "NAME");
	$field_value[2]=$cn_id;
	$field_value[3]=xml_get_ele($ms_fs_fs_obj, "PERMINST");
	$field_value[4]=xml_get_ele($ms_fs_fs_obj, "LAT");
	$field_value[5]=xml_get_ele($ms_fs_fs_obj, "LON");
	$field_value[6]=xml_get_ele($ms_fs_fs_obj, "ELEV");
	$field_value[7]=$stime;
	$field_value[8]=xml_get_ele($ms_fs_fs_obj, "STARTTIMEUNC");
	$field_value[9]=xml_get_ele($ms_fs_fs_obj, "ENDTIME");
	$field_value[10]=xml_get_ele($ms_fs_fs_obj, "ENDTIMEUNC");
	$field_value[11]=xml_get_ele($ms_fs_fs_obj, "DIFFUTC");
	$field_value[12]=xml_get_ele($ms_fs_fs_obj, "DESCRIPTION");
	$field_value[13]=xml_get_ele($ms_fs_fs_obj, "ORGDIGITIZE");   
	$field_value[14]=xml_get_ele($ms_fs_fs_obj, "COMMENTS");      
	$field_value[15]=$ms_fs_fs_obj['results']['owners'][0]['id'];
	$field_value[16]=$ms_fs_fs_obj['results']['owners'][1]['id'];
	$field_value[17]=$ms_fs_fs_obj['results']['owners'][2]['id'];
	$field_value[18]=$ms_fs_fs_obj['results']['pubdate'];
	$field_value[19]=$cc_id_load;
	$field_value[20]=$current_time;
	$field_value[21]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_fs_fs_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="fs";
	$field_name=array();
	$field_name[0]="fs_pubdate";
	$field_name[1]="fs_name";
	$field_name[2]="cn_id";
	$field_name[3]="fs_inst";
	$field_name[4]="fs_lat";
	$field_name[5]="fs_lon";
	$field_name[6]="fs_elev";
	$field_name[7]="fs_desc";
	$field_name[8]="fs_stime_unc";
	$field_name[9]="fs_etime";
	$field_name[10]="fs_etime_unc";
	$field_name[11]="fs_utc";
	$field_name[12]="fs_ori";    
	$field_name[13]="fs_com";	  
	$field_name[14]="cc_id";
	$field_name[15]="cc_id2";
	$field_name[16]="cc_id3";
	$field_name[17]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_fs_fs_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_fs_fs_obj, "NAME");
	$field_value[2]=$cn_id;
	$field_value[3]=xml_get_ele($ms_fs_fs_obj, "PERMINST");
	$field_value[4]=xml_get_ele($ms_fs_fs_obj, "LAT");
	$field_value[5]=xml_get_ele($ms_fs_fs_obj, "LON");
	$field_value[6]=xml_get_ele($ms_fs_fs_obj, "ELEV");
	$field_value[7]=xml_get_ele($ms_fs_fs_obj, "DESCRIPTION");
	$field_value[8]=xml_get_ele($ms_fs_fs_obj, "STARTTIMEUNC");
	$field_value[9]=xml_get_ele($ms_fs_fs_obj, "ENDTIME");
	$field_value[10]=xml_get_ele($ms_fs_fs_obj, "ENDTIMEUNC");
	$field_value[11]=xml_get_ele($ms_fs_fs_obj, "DIFFUTC");
	$field_value[12]=xml_get_ele($ms_fs_fs_obj, "ORGDIGITIZE");   
	$field_value[13]=xml_get_ele($ms_fs_fs_obj, "COMMENTS");     
	$field_value[14]=$ms_fs_fs_obj['results']['owners'][0]['id'];
	$field_value[15]=$ms_fs_fs_obj['results']['owners'][1]['id'];
	$field_value[16]=$ms_fs_fs_obj['results']['owners'][2]['id'];
	$field_value[17]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="fs_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_fs_fs_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_fs_fs_obj['value'] as &$ms_fs_fs_ele) {
	switch ($ms_fs_fs_ele['tag']) {
		case "FIELDSINSTRUMENT":
			$ms_fs_fs_fi_obj=&$ms_fs_fs_ele;
			include "ms_fs_fs_fi.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>