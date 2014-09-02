<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_dn_ds_obj, "CODE");

// Get owners
$owners=$ms_dn_ds_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_dn_ds_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("ds", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="ds";
	$field_name=array();
	$field_name[0]="ds_code";
	$field_name[1]="ds_name";
	$field_name[2]="ds_perm";
	$field_name[3]="ds_nlat";
	$field_name[4]="ds_nlon";
	$field_name[5]="ds_nelev";
	$field_name[6]="ds_herr_loc";
	$field_name[7]="ds_stime";
	$field_name[8]="ds_stime_unc";
	$field_name[9]="ds_etime";
	$field_name[10]="ds_etime_unc";
	$field_name[11]="ds_utc";
	$field_name[12]="ds_rflag";
	$field_name[13]="ds_desc";
	$field_name[14]="ds_ori";    
	$field_name[15]="ds_com";	 	
	$field_name[16]="cn_id";
	$field_name[17]="cc_id";
	$field_name[18]="cc_id2";
	$field_name[19]="cc_id3";
	$field_name[20]="ds_pubdate";
	$field_name[21]="cc_id_load";
	$field_name[22]="ds_loaddate";
	$field_name[23]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_dn_ds_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_dn_ds_obj, "PERMINST");
	$field_value[3]=xml_get_ele($ms_dn_ds_obj, "LAT");
	$field_value[4]=xml_get_ele($ms_dn_ds_obj, "LON");
	$field_value[5]=xml_get_ele($ms_dn_ds_obj, "ELEV");
	$field_value[6]=xml_get_ele($ms_dn_ds_obj, "HORIZPRECISION");
	$field_value[7]=$stime;
	$field_value[8]=xml_get_ele($ms_dn_ds_obj, "STARTTIMEUNC");
	$field_value[9]=xml_get_ele($ms_dn_ds_obj, "ENDTIME");
	$field_value[10]=xml_get_ele($ms_dn_ds_obj, "ENDTIMEUNC");
	$field_value[11]=xml_get_ele($ms_dn_ds_obj, "DIFFUTC");
	$field_value[12]=xml_get_ele($ms_dn_ds_obj, "REFSTATION");
	$field_value[13]=xml_get_ele($ms_dn_ds_obj, "DESCRIPTION");
	$field_value[14]=xml_get_ele($ms_dn_ds_obj, "ORGDIGITIZE");   
	$field_value[15]=xml_get_ele($ms_dn_ds_obj, "COMMENTS");     		
	$field_value[16]=$ms_dn_obj['id'];
	$field_value[17]=$ms_dn_ds_obj['results']['owners'][0]['id'];
	$field_value[18]=$ms_dn_ds_obj['results']['owners'][1]['id'];
	$field_value[19]=$ms_dn_ds_obj['results']['owners'][2]['id'];
	$field_value[20]=$ms_dn_ds_obj['results']['pubdate'];
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
	$ms_dn_ds_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="ds";
	$field_name=array();
	$field_name[0]="ds_pubdate";
	$field_name[1]="ds_name";
	$field_name[2]="ds_perm";
	$field_name[3]="ds_nlat";
	$field_name[4]="ds_nlon";
	$field_name[5]="ds_nelev";
	$field_name[6]="ds_herr_loc";
	$field_name[7]="cn_id";
	$field_name[8]="ds_stime_unc";
	$field_name[9]="ds_etime";
	$field_name[10]="ds_etime_unc";
	$field_name[11]="ds_utc";
	$field_name[12]="ds_rflag";
	$field_name[13]="ds_desc";
	$field_name[14]="ds_ori";   
	$field_name[15]="ds_com";	
	$field_name[16]="cc_id";
	$field_name[17]="cc_id2";
	$field_name[18]="cc_id3";
	$field_name[19]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_dn_ds_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_dn_ds_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_dn_ds_obj, "PERMINST");
	$field_value[3]=xml_get_ele($ms_dn_ds_obj, "LAT");
	$field_value[4]=xml_get_ele($ms_dn_ds_obj, "LON");
	$field_value[5]=xml_get_ele($ms_dn_ds_obj, "ELEV");
	$field_value[6]=xml_get_ele($ms_dn_ds_obj, "HORIZPRECISION");
	$field_value[7]=$ms_dn_obj['id'];
	$field_value[8]=xml_get_ele($ms_dn_ds_obj, "STARTTIMEUNC");
	$field_value[9]=xml_get_ele($ms_dn_ds_obj, "ENDTIME");
	$field_value[10]=xml_get_ele($ms_dn_ds_obj, "ENDTIMEUNC");
	$field_value[11]=xml_get_ele($ms_dn_ds_obj, "DIFFUTC");
	$field_value[12]=xml_get_ele($ms_dn_ds_obj, "REFSTATION");
	$field_value[13]=xml_get_ele($ms_dn_ds_obj, "DESCRIPTION");
	$field_value[14]=xml_get_ele($ms_dn_ds_obj, "ORGDIGITIZE");   		
	$field_value[15]=xml_get_ele($ms_dn_ds_obj, "COMMENTS");     	
	$field_value[16]=$ms_dn_ds_obj['results']['owners'][0]['id'];
	$field_value[17]=$ms_dn_ds_obj['results']['owners'][1]['id'];
	$field_value[18]=$ms_dn_ds_obj['results']['owners'][2]['id'];
	$field_value[19]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="ds_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_dn_ds_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_dn_ds_obj['value'] as &$ms_dn_ds_ele) {
	switch ($ms_dn_ds_ele['tag']) {
		case "DEFORMATIONINSTRUMENT":
			$ms_dn_ds_dig_obj=&$ms_dn_ds_ele;
			include "ms_dn_ds_dig.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "TILTSTRAININSTRUMENT":
			$ms_dn_ds_dit_obj=&$ms_dn_ds_ele;
			include "ms_dn_ds_dit.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>