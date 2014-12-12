<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_ss_ss_obj, "CODE");

// Get owners
$owners=$ms_ss_ss_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_ss_ss_obj, "STARTTIME");

// Prepare link to sn_id
if (substr($ms_ss_ss_obj['results']['sn_id'], 0, 1)=="@") {
	$sn_id=$db_ids[substr($ms_ss_ss_obj['results']['sn_id'], 1)];
}
else {
	$sn_id=$ms_ss_ss_obj['results']['sn_id'];
}

// INSERT or UPDATE?
$id=v1_get_id_ms("ss", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ss";
	$field_name=array();
	$field_name[0]="ss_code";
	$field_name[1]="ss_name";
	$field_name[2]="ss_desc";
	$field_name[3]="ss_com";
	$field_name[4]="ss_depth";
	$field_name[5]="ss_instr_type";
	$field_name[6]="ss_sgain";
	$field_name[7]="ss_lat";
	$field_name[8]="ss_lon";
	$field_name[9]="ss_elev";
	$field_name[10]="ss_stime";
	$field_name[11]="ss_stime_unc";
	$field_name[12]="ss_etime";
	$field_name[13]="ss_etime_unc";
	$field_name[14]="ss_utc";
	$field_name[15]="ss_ori";	       
	$field_name[16]="sn_id";
	$field_name[17]="cc_id";
	$field_name[18]="cc_id2";
	$field_name[19]="cc_id3";
	$field_name[20]="ss_pubdate";
	$field_name[21]="cc_id_load";
	$field_name[22]="ss_loaddate";
	$field_name[23]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_ss_ss_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_ss_ss_obj, "DESCRIPTION");
	$field_value[3]=xml_get_ele($ms_ss_ss_obj, "COMMENTS");
	$field_value[4]=xml_get_ele($ms_ss_ss_obj, "INSTDEPTH");
	$field_value[5]=xml_get_ele($ms_ss_ss_obj, "INSTTYPE");
	$field_value[6]=xml_get_ele($ms_ss_ss_obj, "SYSTEMGAIN");
	$field_value[7]=xml_get_ele($ms_ss_ss_obj, "LAT");
	$field_value[8]=xml_get_ele($ms_ss_ss_obj, "LON");
	$field_value[9]=xml_get_ele($ms_ss_ss_obj, "ELEV");
	$field_value[10]=$stime;
	$field_value[11]=xml_get_ele($ms_ss_ss_obj, "STARTTIMEUNC");
	$field_value[12]=xml_get_ele($ms_ss_ss_obj, "ENDTIME");
	$field_value[13]=xml_get_ele($ms_ss_ss_obj, "ENDTIMEUNC");
	$field_value[14]=xml_get_ele($ms_ss_ss_obj, "DIFFUTC");
	$field_value[15]=xml_get_ele($ms_ss_ss_obj, "ORGDIGITIZE");	         
	$field_value[16]=$sn_id;
	$field_value[17]=$ms_ss_ss_obj['results']['owners'][0]['id'];
	$field_value[18]=$ms_ss_ss_obj['results']['owners'][1]['id'];
	$field_value[19]=$ms_ss_ss_obj['results']['owners'][2]['id'];
	$field_value[20]=$ms_ss_ss_obj['results']['pubdate'];
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
	$ms_ss_ss_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="ss";
	$field_name=array();
	$field_name[0]="ss_pubdate";
	$field_name[1]="ss_name";
	$field_name[2]="ss_desc";
	$field_name[3]="ss_com";
	$field_name[4]="ss_depth";
	$field_name[5]="ss_instr_type";
	$field_name[6]="ss_sgain";
	$field_name[7]="ss_lat";
	$field_name[8]="ss_lon";
	$field_name[9]="ss_elev";
	$field_name[10]="sn_id";
	$field_name[11]="ss_stime_unc";
	$field_name[12]="ss_etime";
	$field_name[13]="ss_etime_unc";
	$field_name[14]="ss_utc";
	$field_name[15]="ss_ori";	     
	$field_name[16]="cc_id";
	$field_name[17]="cc_id2";
	$field_name[18]="cc_id3";
	$field_name[19]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_ss_ss_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_ss_ss_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_ss_ss_obj, "DESCRIPTION");
	$field_value[3]=xml_get_ele($ms_ss_ss_obj, "COMMENTS");
	$field_value[4]=xml_get_ele($ms_ss_ss_obj, "INSTDEPTH");
	$field_value[5]=xml_get_ele($ms_ss_ss_obj, "INSTTYPE");
	$field_value[6]=xml_get_ele($ms_ss_ss_obj, "SYSTEMGAIN");
	$field_value[7]=xml_get_ele($ms_ss_ss_obj, "LAT");
	$field_value[8]=xml_get_ele($ms_ss_ss_obj, "LON");
	$field_value[9]=xml_get_ele($ms_ss_ss_obj, "ELEV");
	$field_value[10]=$sn_id;
	$field_value[11]=xml_get_ele($ms_ss_ss_obj, "STARTTIMEUNC");
	$field_value[12]=xml_get_ele($ms_ss_ss_obj, "ENDTIME");
	$field_value[13]=xml_get_ele($ms_ss_ss_obj, "ENDTIMEUNC");
	$field_value[14]=xml_get_ele($ms_ss_ss_obj, "DIFFUTC");
	$field_value[15]=xml_get_ele($ms_ss_ss_obj, "ORGDIGITIZE");	      
	$field_value[16]=$ms_ss_ss_obj['results']['owners'][0]['id'];
	$field_value[17]=$ms_ss_ss_obj['results']['owners'][1]['id'];
	$field_value[18]=$ms_ss_ss_obj['results']['owners'][2]['id'];
	$field_value[19]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ss_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_ss_ss_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_ss_ss_obj['value'] as &$ms_ss_ss_ele) {
	switch ($ms_ss_ss_ele['tag']) {
		case "SEISMICINSTRUMENT":
			$ms_ss_ss_si_obj=&$ms_ss_ss_ele;
			include "ms_ss_ss_si.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>