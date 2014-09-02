<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_tn_ts_obj, "CODE");

// Get owners
$owners=$ms_tn_ts_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_tn_ts_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("ts", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ts";
	$field_name=array();
	$field_name[0]="ts_code";
	$field_name[1]="ts_name";
	$field_name[2]="ts_type";
	$field_name[3]="ts_ground";	
	$field_name[4]="ts_lat";
	$field_name[5]="ts_lon";
	$field_name[6]="ts_elev";
	$field_name[7]="ts_perm";
	$field_name[8]="ts_utc";	
	$field_name[9]="ts_stime";
	$field_name[10]="ts_stime_unc";
	$field_name[11]="ts_etime";
	$field_name[12]="ts_etime_unc";
	$field_name[13]="ts_desc";
	$field_name[14]="ts_ori";               
	$field_name[15]="ts_com";              	
	$field_name[16]="cn_id";
	$field_name[17]="cc_id";
	$field_name[18]="cc_id2";
	$field_name[19]="cc_id3";
	$field_name[20]="ts_pubdate";
	$field_name[21]="cc_id_load";
	$field_name[22]="ts_loaddate";
	$field_name[23]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_tn_ts_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_tn_ts_obj, "THERMALFEATTYPE");
	$field_value[3]=xml_get_ele($ms_tn_ts_obj, "GROUNDTYPE");	
	$field_value[4]=xml_get_ele($ms_tn_ts_obj, "LAT");
	$field_value[5]=xml_get_ele($ms_tn_ts_obj, "LON");
	$field_value[6]=xml_get_ele($ms_tn_ts_obj, "ELEV");
	$field_value[7]=xml_get_ele($ms_tn_ts_obj, "PERMINST");
	$field_value[8]=xml_get_ele($ms_tn_ts_obj, "DIFFUTC");	
	$field_value[9]=$stime;
	$field_value[10]=xml_get_ele($ms_tn_ts_obj, "STARTTIMEUNC");
	$field_value[11]=xml_get_ele($ms_tn_ts_obj, "ENDTIME");
	$field_value[12]=xml_get_ele($ms_tn_ts_obj, "ENDTIMEUNC");
	$field_value[13]=xml_get_ele($ms_tn_ts_obj, "DESCRIPTION");
	$field_value[14]=xml_get_ele($ms_tn_ts_obj, "ORGDIGITIZE");          
	$field_value[15]=xml_get_ele($ms_tn_ts_obj, "COMMENTS");	      	
	$field_value[16]=$ms_tn_obj['id'];
	$field_value[17]=$ms_tn_ts_obj['results']['owners'][0]['id'];
	$field_value[18]=$ms_tn_ts_obj['results']['owners'][1]['id'];
	$field_value[19]=$ms_tn_ts_obj['results']['owners'][2]['id'];
	$field_value[20]=$ms_tn_ts_obj['results']['pubdate'];
	$field_value[21]=$cc_id_load;
	$field_value[22]=$current_time;
	$field_value[23]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_tn_ts_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="ts";
	$field_name=array();
	$field_name[0]="ts_pubdate";
	$field_name[1]="ts_name";
	$field_name[2]="ts_type";
	$field_name[3]="ts_ground";	
	$field_name[4]="ts_lat";
	$field_name[5]="ts_lon";
	$field_name[6]="ts_elev";
	$field_name[7]="ts_perm";
	$field_name[8]="ts_utc";	
	$field_name[9]="ts_stime_unc";
	$field_name[10]="ts_etime";
	$field_name[11]="ts_etime_unc";
	$field_name[12]="ts_desc";
	$field_name[13]="ts_ori";               
	$field_name[14]="ts_com";              	
	$field_name[15]="cn_id";
	$field_name[16]="cc_id";
	$field_name[17]="cc_id2";
	$field_name[18]="cc_id3";
	$field_name[19]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_tn_ts_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_tn_ts_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_tn_ts_obj, "THERMALFEATTYPE");
	$field_value[3]=xml_get_ele($ms_tn_ts_obj, "GROUNDTYPE");	
	$field_value[4]=xml_get_ele($ms_tn_ts_obj, "LAT");
	$field_value[5]=xml_get_ele($ms_tn_ts_obj, "LON");
	$field_value[6]=xml_get_ele($ms_tn_ts_obj, "ELEV");
	$field_value[7]=xml_get_ele($ms_tn_ts_obj, "PERMINST");
	$field_value[8]=xml_get_ele($ms_tn_ts_obj, "DIFFUTC");	
	$field_value[9]=xml_get_ele($ms_tn_ts_obj, "STARTTIMEUNC");
	$field_value[10]=xml_get_ele($ms_tn_ts_obj, "ENDTIME");
	$field_value[11]=xml_get_ele($ms_tn_ts_obj, "ENDTIMEUNC");
	$field_value[12]=xml_get_ele($ms_tn_ts_obj, "DESCRIPTION");
	$field_value[13]=xml_get_ele($ms_tn_ts_obj, "ORGDIGITIZE");         	
	$field_value[14]=xml_get_ele($ms_tn_ts_obj, "COMMENTS");	         
	$field_value[15]=$ms_tn_obj['id'];
	$field_value[16]=$ms_tn_ts_obj['results']['owners'][0]['id'];
	$field_value[17]=$ms_tn_ts_obj['results']['owners'][1]['id'];
	$field_value[18]=$ms_tn_ts_obj['results']['owners'][2]['id'];
	$field_value[19]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ts_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_tn_ts_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_tn_ts_obj['value'] as &$ms_tn_ts_ele) {
	switch ($ms_tn_ts_ele['tag']) {
		case "THERMALINSTRUMENT":
			$ms_tn_ts_ti_obj=&$ms_tn_ts_ele;
			include "ms_tn_ts_ti.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>