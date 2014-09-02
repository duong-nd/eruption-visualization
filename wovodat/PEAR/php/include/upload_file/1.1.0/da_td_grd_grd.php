<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_td_grd_grd_obj, "CODE");

// Get owners
$owners=$da_td_grd_grd_obj['results']['owners'];

// Prepare link to ts_id
if (substr($da_td_grd_grd_obj['results']['ts_id'], 0, 1)=="@") {
	$ts_id=$db_ids[substr($da_td_grd_grd_obj['results']['ts_id'], 1)];
}
else {
	$ts_id=$da_td_grd_grd_obj['results']['ts_id'];
}

// Prepare link to ti_id
if (substr($da_td_grd_grd_obj['results']['ti_id'], 0, 1)=="@") {
	$ti_id=$db_ids[substr($da_td_grd_grd_obj['results']['ti_id'], 1)];
}
else {
	$ti_id=$da_td_grd_grd_obj['results']['ti_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("td", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="td";
	$field_name=array();
	$field_name[0]="td_code";
	$field_name[1]="td_mtype";	
	$field_name[2]="td_time";
	$field_name[3]="td_time_unc";
	$field_name[4]="td_depth";
	$field_name[5]="td_distance";
	$field_name[6]="td_calc_flag";
	$field_name[7]="td_temp";
	$field_name[8]="td_terr";
	$field_name[9]="td_aarea";
	$field_name[10]="td_flux";
	$field_name[11]="td_ferr";
	$field_name[12]="td_bkgg";
	$field_name[13]="td_tcond";
	$field_name[14]="td_ori";                 
	$field_name[15]="td_com";
	$field_name[16]="ts_id";
	$field_name[17]="ti_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="td_pubdate";
	$field_name[22]="cc_id_load";
	$field_name[23]="td_loaddate";
	$field_name[24]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_td_grd_grd_obj, "MEASTYPE");	
	$field_value[2]=xml_get_ele($da_td_grd_grd_obj, "MEASTIME");
	$field_value[3]=xml_get_ele($da_td_grd_grd_obj, "MEASTIMEUNC");
	$field_value[4]=xml_get_ele($da_td_grd_grd_obj, "MEASDEPTH");
	$field_value[5]=xml_get_ele($da_td_grd_grd_obj, "DISTANCE");
	$field_value[6]=xml_get_ele($da_td_grd_grd_obj, "RECALCULATED");
	$field_value[7]=xml_get_ele($da_td_grd_grd_obj, "TEMPERATURE");
	$field_value[8]=xml_get_ele($da_td_grd_grd_obj, "TEMPERATUREUNC");
	$field_value[9]=xml_get_ele($da_td_grd_grd_obj, "AREA");
	$field_value[10]=xml_get_ele($da_td_grd_grd_obj, "HEATFLUX");
	$field_value[11]=xml_get_ele($da_td_grd_grd_obj, "HEATFLUXUNC");
	$field_value[12]=xml_get_ele($da_td_grd_grd_obj, "BGGEOTHERMGRADIENT");
	$field_value[13]=xml_get_ele($da_td_grd_grd_obj, "CONDUCTIVITY");
	$field_value[14]=xml_get_ele($da_td_grd_grd_obj, "ORGDIGITIZE");         
	$field_value[15]=xml_get_ele($da_td_grd_grd_obj, "COMMENTS");
	$field_value[16]=$ts_id;
	$field_value[17]=$ti_id;
	$field_value[18]=$da_td_grd_grd_obj['results']['owners'][0]['id'];
	$field_value[19]=$da_td_grd_grd_obj['results']['owners'][1]['id'];
	$field_value[20]=$da_td_grd_grd_obj['results']['owners'][2]['id'];
	$field_value[21]=$da_td_grd_grd_obj['results']['pubdate'];
	$field_value[22]=$cc_id_load;
	$field_value[23]=$current_time;
	$field_value[24]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_td_grd_grd_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="td";
	$field_name=array();
	$field_name[0]="td_pubdate";
	$field_name[1]="td_mtype";	
	$field_name[2]="td_time";
	$field_name[3]="td_time_unc";
	$field_name[4]="td_depth";
	$field_name[5]="td_distance";
	$field_name[6]="td_calc_flag";
	$field_name[7]="td_temp";
	$field_name[8]="td_terr";
	$field_name[9]="td_aarea";
	$field_name[10]="td_flux";
	$field_name[11]="td_ferr";
	$field_name[12]="td_bkgg";
	$field_name[13]="td_tcond";
	$field_name[14]="td_ori";                   
	$field_name[15]="td_com";
	$field_name[16]="ts_id";
	$field_name[17]="ti_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_td_grd_grd_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_td_grd_grd_obj, "MEASTYPE");	
	$field_value[2]=xml_get_ele($da_td_grd_grd_obj, "MEASTIME");
	$field_value[3]=xml_get_ele($da_td_grd_grd_obj, "MEASTIMEUNC");
	$field_value[4]=xml_get_ele($da_td_grd_grd_obj, "MEASDEPTH");
	$field_value[5]=xml_get_ele($da_td_grd_grd_obj, "DISTANCE");
	$field_value[6]=xml_get_ele($da_td_grd_grd_obj, "RECALCULATED");
	$field_value[7]=xml_get_ele($da_td_grd_grd_obj, "TEMPERATURE");
	$field_value[8]=xml_get_ele($da_td_grd_grd_obj, "TEMPERATUREUNC");
	$field_value[9]=xml_get_ele($da_td_grd_grd_obj, "AREA");
	$field_value[10]=xml_get_ele($da_td_grd_grd_obj, "HEATFLUX");
	$field_value[11]=xml_get_ele($da_td_grd_grd_obj, "HEATFLUXUNC");
	$field_value[12]=xml_get_ele($da_td_grd_grd_obj, "BGGEOTHERMGRADIENT");
	$field_value[13]=xml_get_ele($da_td_grd_grd_obj, "CONDUCTIVITY");
	$field_value[14]=xml_get_ele($da_td_grd_grd_obj, "ORGDIGITIZE");         
	$field_value[15]=xml_get_ele($da_td_grd_grd_obj, "COMMENTS");
	$field_value[16]=$ts_id;
	$field_value[17]=$ti_id;
	$field_value[18]=$da_td_grd_grd_obj['results']['owners'][0]['id'];
	$field_value[19]=$da_td_grd_grd_obj['results']['owners'][1]['id'];
	$field_value[20]=$da_td_grd_grd_obj['results']['owners'][2]['id'];
	$field_value[21]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="td_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_td_grd_grd_obj['id']=$id;
	array_push($db_ids, $id);
}

?>