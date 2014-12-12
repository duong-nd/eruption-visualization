<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_hn_hs_hi_obj, "CODE");

// Get owners
$owners=$ms_hn_hs_hi_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_hn_hs_hi_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("hi", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="hi";
	$field_name=array();
	$field_name[0]="hi_code";
	$field_name[1]="hi_name";
	$field_name[2]="hi_type";
	$field_name[3]="hi_units";
	$field_name[4]="hi_res";
	$field_name[5]="hi_meas";
	$field_name[6]="hi_stime";
	$field_name[7]="hi_stime_unc";
	$field_name[8]="hi_etime";
	$field_name[9]="hi_etime_unc";
	$field_name[10]="hi_desc";
	$field_name[11]="hi_ori";           
	$field_name[12]="hi_com";           
	$field_name[13]="hs_id";
	$field_name[14]="cc_id";
	$field_name[15]="cc_id2";
	$field_name[16]="cc_id3";
	$field_name[17]="hi_pubdate";
	$field_name[18]="cc_id_load";
	$field_name[19]="hi_loaddate";
	$field_name[20]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_hn_hs_hi_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_hn_hs_hi_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_hn_hs_hi_obj, "UNITS");
	$field_value[4]=xml_get_ele($ms_hn_hs_hi_obj, "RESOLUTION");
	$field_value[5]=xml_get_ele($ms_hn_hs_hi_obj, "PRESSUREMEASTYPE");
	$field_value[6]=$stime;
	$field_value[7]=xml_get_ele($ms_hn_hs_hi_obj, "STARTTIMEUNC");
	$field_value[8]=xml_get_ele($ms_hn_hs_hi_obj, "ENDTIME");
	$field_value[9]=xml_get_ele($ms_hn_hs_hi_obj, "ENDTIMEUNC");
	$field_value[10]=xml_get_ele($ms_hn_hs_hi_obj, "DESCRIPTION");     	
	$field_value[11]=xml_get_ele($ms_hn_hs_hi_obj, "ORGDIGITIZE");  	
	$field_value[12]=xml_get_ele($ms_hn_hs_hi_obj, "COMMENTS");	      
	$field_value[13]=$ms_hn_hs_obj['id'];
	$field_value[14]=$ms_hn_hs_hi_obj['results']['owners'][0]['id'];
	$field_value[15]=$ms_hn_hs_hi_obj['results']['owners'][1]['id'];
	$field_value[16]=$ms_hn_hs_hi_obj['results']['owners'][2]['id'];
	$field_value[17]=$ms_hn_hs_hi_obj['results']['pubdate'];
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
	$ms_hn_hs_hi_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="hi";
	$field_name=array();
	$field_name[0]="hi_pubdate";
	$field_name[1]="hi_name";
	$field_name[2]="hi_type";
	$field_name[3]="hi_units";
	$field_name[4]="hi_res";
	$field_name[5]="hi_meas";
	$field_name[6]="hs_id";
	$field_name[7]="hi_stime_unc";
	$field_name[8]="hi_etime";
	$field_name[9]="hi_etime_unc";
	$field_name[10]="hi_desc";
	$field_name[11]="hi_ori";           	
	$field_name[12]="hi_com";           		
	$field_name[13]="cc_id";
	$field_name[14]="cc_id2";
	$field_name[15]="cc_id3";
	$field_name[16]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_hn_hs_hi_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_hn_hs_hi_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_hn_hs_hi_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_hn_hs_hi_obj, "UNITS");
	$field_value[4]=xml_get_ele($ms_hn_hs_hi_obj, "RESOLUTION");
	$field_value[5]=xml_get_ele($ms_hn_hs_hi_obj, "PRESSUREMEASTYPE");
	$field_value[6]=$ms_hn_hs_obj['id'];
	$field_value[7]=xml_get_ele($ms_hn_hs_hi_obj, "STARTTIMEUNC");
	$field_value[8]=xml_get_ele($ms_hn_hs_hi_obj, "ENDTIME");
	$field_value[9]=xml_get_ele($ms_hn_hs_hi_obj, "ENDTIMEUNC");
	$field_value[10]=xml_get_ele($ms_hn_hs_hi_obj, "DESCRIPTION");     	
	$field_value[11]=xml_get_ele($ms_hn_hs_hi_obj, "ORGDIGITIZE");    	
	$field_value[12]=xml_get_ele($ms_hn_hs_hi_obj, "COMMENTS");	      
	$field_value[13]=$ms_hn_hs_hi_obj['results']['owners'][0]['id'];
	$field_value[14]=$ms_hn_hs_hi_obj['results']['owners'][1]['id'];
	$field_value[15]=$ms_hn_hs_hi_obj['results']['owners'][2]['id'];
	$field_value[16]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="hi_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_hn_hs_hi_obj['id']=$id;
	array_push($db_ids, $id);
}

?>