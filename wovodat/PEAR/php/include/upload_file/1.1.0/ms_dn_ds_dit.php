<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_dn_ds_dit_obj, "CODE");

// Get owners
$owners=$ms_dn_ds_dit_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_dn_ds_dit_obj, "STARTTIME");

// INSERT or UPDATE?
$id=v1_get_id_ms("di_tlt", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="di_tlt";
	$field_name=array();
	$field_name[0]="di_tlt_code";
	$field_name[1]="di_tlt_name";
	$field_name[2]="di_tlt_type";
	$field_name[3]="di_tlt_depth";
	$field_name[4]="di_tlt_units";
	$field_name[5]="di_tlt_res";
	$field_name[6]="di_tlt_dir1";
	$field_name[7]="di_tlt_dir2";
	$field_name[8]="di_tlt_dir3";
	$field_name[9]="di_tlt_dir4";
	$field_name[10]="di_tlt_econv1";
	$field_name[11]="di_tlt_econv2";
	$field_name[12]="di_tlt_econv3";
	$field_name[13]="di_tlt_econv4";
	$field_name[14]="di_tlt_stime";
	$field_name[15]="di_tlt_stime_unc";
	$field_name[16]="di_tlt_etime";
	$field_name[17]="di_tlt_etime_unc";
	$field_name[18]="di_tlt_ori";        
	$field_name[19]="di_tlt_com";
	$field_name[20]="ds_id";
	$field_name[21]="cc_id";
	$field_name[22]="cc_id2";
	$field_name[23]="cc_id3";
	$field_name[24]="di_tlt_pubdate";
	$field_name[25]="cc_id_load";
	$field_name[26]="di_tlt_loaddate";
	$field_name[27]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_dn_ds_dit_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_dn_ds_dit_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_dn_ds_dit_obj, "DEPTH");
	$field_value[4]=xml_get_ele($ms_dn_ds_dit_obj, "UNITS");
	$field_value[5]=xml_get_ele($ms_dn_ds_dit_obj, "RESOLUTION");
	$field_value[6]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION1");
	$field_value[7]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION2");
	$field_value[8]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION3");
	$field_value[9]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION4");
	$field_value[10]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV1");
	$field_value[11]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV2");
	$field_value[12]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV3");
	$field_value[13]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV4");
	$field_value[14]=$stime;
	$field_value[15]=xml_get_ele($ms_dn_ds_dit_obj, "STARTTIMEUNC");
	$field_value[16]=xml_get_ele($ms_dn_ds_dit_obj, "ENDTIME");
	$field_value[17]=xml_get_ele($ms_dn_ds_dit_obj, "ENDTIMEUNC");
	$field_value[18]=xml_get_ele($ms_dn_ds_dit_obj, "ORGDIGITIZE");   
	$field_value[19]=xml_get_ele($ms_dn_ds_dit_obj, "COMMENTS");
	$field_value[20]=$ms_dn_ds_obj['id'];
	$field_value[21]=$ms_dn_ds_dit_obj['results']['owners'][0]['id'];
	$field_value[22]=$ms_dn_ds_dit_obj['results']['owners'][1]['id'];
	$field_value[23]=$ms_dn_ds_dit_obj['results']['owners'][2]['id'];
	$field_value[24]=$ms_dn_ds_dit_obj['results']['pubdate'];
	$field_value[25]=$cc_id_load;
	$field_value[26]=$current_time;
	$field_value[27]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_dn_ds_dit_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="di_tlt";
	$field_name=array();
	$field_name[0]="di_tlt_pubdate";
	$field_name[1]="di_tlt_name";
	$field_name[2]="di_tlt_type";
	$field_name[3]="di_tlt_depth";
	$field_name[4]="di_tlt_units";
	$field_name[5]="di_tlt_res";
	$field_name[6]="di_tlt_dir1";
	$field_name[7]="di_tlt_dir2";
	$field_name[8]="di_tlt_dir3";
	$field_name[9]="di_tlt_dir4";
	$field_name[10]="di_tlt_econv1";
	$field_name[11]="di_tlt_econv2";
	$field_name[12]="di_tlt_econv3";
	$field_name[13]="di_tlt_econv4";
	$field_name[14]="ds_id";
	$field_name[15]="di_tlt_stime_unc";
	$field_name[16]="di_tlt_etime";
	$field_name[17]="di_tlt_etime_unc";
	$field_name[18]="di_tlt_ori";         		
	$field_name[19]="di_tlt_com";
	$field_name[20]="cc_id";
	$field_name[21]="cc_id2";
	$field_name[22]="cc_id3";
	$field_name[23]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_dn_ds_dit_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_dn_ds_dit_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_dn_ds_dit_obj, "TYPE");
	$field_value[3]=xml_get_ele($ms_dn_ds_dit_obj, "DEPTH");
	$field_value[4]=xml_get_ele($ms_dn_ds_dit_obj, "UNITS");
	$field_value[5]=xml_get_ele($ms_dn_ds_dit_obj, "RESOLUTION");
	$field_value[6]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION1");
	$field_value[7]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION2");
	$field_value[8]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION3");
	$field_value[9]=xml_get_ele($ms_dn_ds_dit_obj, "DIRECTION4");
	$field_value[10]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV1");
	$field_value[11]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV2");
	$field_value[12]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV3");
	$field_value[13]=xml_get_ele($ms_dn_ds_dit_obj, "ELECTROCONV4");
	$field_value[14]=$ms_dn_ds_obj['id'];
	$field_value[15]=xml_get_ele($ms_dn_ds_dit_obj, "STARTTIMEUNC");
	$field_value[16]=xml_get_ele($ms_dn_ds_dit_obj, "ENDTIME");
	$field_value[17]=xml_get_ele($ms_dn_ds_dit_obj, "ENDTIMEUNC");
	$field_value[18]=xml_get_ele($ms_dn_ds_dit_obj, "ORGDIGITIZE");   
	$field_value[19]=xml_get_ele($ms_dn_ds_dit_obj, "COMMENTS");
	$field_value[20]=$ms_dn_ds_dit_obj['results']['owners'][0]['id'];
	$field_value[21]=$ms_dn_ds_dit_obj['results']['owners'][1]['id'];
	$field_value[22]=$ms_dn_ds_dit_obj['results']['owners'][2]['id'];
	$field_value[23]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="di_tlt_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_dn_ds_dit_obj['id']=$id;
	array_push($db_ids, $id);
}

?>