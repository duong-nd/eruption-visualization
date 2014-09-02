<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_si_si_obj, "CODE");

// Get owners
$owners=$ms_si_si_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_si_si_obj, "STARTTIME");

// Prepare link to ss_id
if (substr($ms_si_si_obj['results']['ss_id'], 0, 1)=="@") {
	$ss_id=$db_ids[substr($ms_si_si_obj['results']['ss_id'], 1)];
}
else {
	$ss_id=$ms_si_si_obj['results']['ss_id'];
}

// INSERT or UPDATE?
$id=v1_get_id_ms("si", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="si";
	$field_name=array();
	$field_name[0]="si_code";
	$field_name[1]="si_name";
	$field_name[2]="si_type";
	$field_name[3]="si_com";
	$field_name[4]="si_range";
	$field_name[5]="si_igain";
	$field_name[6]="si_filter";
	$field_name[7]="si_ncomp";
	$field_name[8]="si_resp";
	$field_name[9]="si_stime";
	$field_name[10]="si_stime_unc";
	$field_name[11]="si_etime";
	$field_name[12]="si_etime_unc";
	$field_name[13]="ss_id";
	$field_name[14]="cc_id";
	$field_name[15]="cc_id2";
	$field_name[16]="cc_id3";
	$field_name[17]="si_pubdate";
	$field_name[18]="cc_id_load";
	$field_name[19]="si_loaddate";
	$field_name[20]="cb_ids";
	$field_name[21]="si_ori";           	 
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_si_si_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_si_si_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_si_si_obj, "COMMENTS");
	$field_value[4]=xml_get_ele($ms_si_si_obj, "DYNAMICRANGE");
	$field_value[5]=xml_get_ele($ms_si_si_obj, "GAIN");
	$field_value[6]=xml_get_ele($ms_si_si_obj, "FILTERS");
	$field_value[7]=xml_get_ele($ms_si_si_obj, "NUMBEROFCOMP");
	$field_value[8]=xml_get_ele($ms_si_si_obj, "RESPOVERVIEW");
	$field_value[9]=$stime;
	$field_value[10]=xml_get_ele($ms_si_si_obj, "STARTTIMEUNC");
	$field_value[11]=xml_get_ele($ms_si_si_obj, "ENDTIME");
	$field_value[12]=xml_get_ele($ms_si_si_obj, "ENDTIMEUNC");
	$field_value[13]=$ss_id;
	$field_value[14]=$ms_si_si_obj['results']['owners'][0]['id'];
	$field_value[15]=$ms_si_si_obj['results']['owners'][1]['id'];
	$field_value[16]=$ms_si_si_obj['results']['owners'][2]['id'];
	$field_value[17]=$ms_si_si_obj['results']['pubdate'];
	$field_value[18]=$cc_id_load;
	$field_value[19]=$current_time;
	$field_value[20]=$cb_ids;
	$field_value[21]=xml_get_ele($ms_si_si_obj, "ORGDIGITIZE");	         	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_si_si_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="si";
	$field_name=array();
	$field_name[0]="si_pubdate";
	$field_name[1]="si_name";
	$field_name[2]="si_type";
	$field_name[3]="si_com";
	$field_name[4]="si_range";
	$field_name[5]="si_igain";
	$field_name[6]="si_filter";
	$field_name[7]="si_ncomp";
	$field_name[8]="si_resp";
	$field_name[9]="ss_id";
	$field_name[10]="si_stime_unc";
	$field_name[11]="si_etime";
	$field_name[12]="si_etime_unc";
	$field_name[13]="cc_id";
	$field_name[14]="cc_id2";
	$field_name[15]="cc_id3";
	$field_name[16]="cb_ids";
	$field_name[17]="si_ori";            
	$field_value=array();
	$field_value[0]=$ms_si_si_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_si_si_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_si_si_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_si_si_obj, "COMMENTS");
	$field_value[4]=xml_get_ele($ms_si_si_obj, "DYNAMICRANGE");
	$field_value[5]=xml_get_ele($ms_si_si_obj, "GAIN");
	$field_value[6]=xml_get_ele($ms_si_si_obj, "FILTERS");
	$field_value[7]=xml_get_ele($ms_si_si_obj, "NUMBEROFCOMP");
	$field_value[8]=xml_get_ele($ms_si_si_obj, "RESPOVERVIEW");
	$field_value[9]=$ss_id;
	$field_value[10]=xml_get_ele($ms_si_si_obj, "STARTTIMEUNC");
	$field_value[11]=xml_get_ele($ms_si_si_obj, "ENDTIME");
	$field_value[12]=xml_get_ele($ms_si_si_obj, "ENDTIMEUNC");
	$field_value[13]=$ms_si_si_obj['results']['owners'][0]['id'];
	$field_value[14]=$ms_si_si_obj['results']['owners'][1]['id'];
	$field_value[15]=$ms_si_si_obj['results']['owners'][2]['id'];
	$field_value[16]=$cb_ids;
	$field_value[17]=xml_get_ele($ms_si_si_obj, "ORGDIGITIZE");	         	
	$where_field_name=array();
	$where_field_name[0]="si_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_si_si_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($ms_si_si_obj['value'] as &$ms_si_si_ele) {
	switch ($ms_si_si_ele['tag']) {
		case "SEISMICCOMPONENT":
			$ms_si_si_sc_obj=&$ms_si_si_ele;
			include "ms_si_si_sc.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>