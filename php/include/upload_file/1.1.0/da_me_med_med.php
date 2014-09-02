<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");



// Get code  
$code=xml_get_att($da_me_med_med_obj, "CODE");

// Get owners
$owners=$da_me_med_med_obj['results']['owners'];

// Prepare link to ms_id
if (substr($da_me_med_med_obj['results']['ms_id'], 0, 1)=="@") {
	$ms_id=$db_ids[substr($da_me_med_med_obj['results']['ms_id'], 1)];
}
else {
	$ms_id=$da_me_med_med_obj['results']['ms_id'];
}

// Prepare link to mi_id
if (substr($da_me_med_med_obj['results']['mi_id'], 0, 1)=="@") {
	$mi_id=$db_ids[substr($da_me_med_med_obj['results']['mi_id'], 1)];
}
else {
	$mi_id=$da_me_med_med_obj['results']['mi_id'];
}


// INSERT or UPDATE?
$id=v1_get_id("med", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="med";
	$field_name=array();
	$field_name[0]="med_code";
	$field_name[1]="med_time";
	$field_name[2]="med_time_unc";
	$field_name[3]="med_temp";
	$field_name[4]="med_stemp";
	$field_name[5]="med_bp";
	$field_name[6]="med_prec";
	$field_name[7]="med_tprec";
	$field_name[8]="med_hd";
	$field_name[9]="med_wind";
	$field_name[10]="med_wsmin";           
	$field_name[11]="med_wsmax";	       
	$field_name[12]="med_wdir";
	$field_name[13]="med_clc";           
	$field_name[14]="med_ori";
	$field_name[15]="med_com";
	$field_name[16]="ms_id";
	$field_name[17]="mi_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="med_pubdate";
	$field_name[22]="cc_id_load";
	$field_name[23]="med_loaddate";
	$field_name[24]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_me_med_med_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_me_med_med_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_me_med_med_obj, "AIRTEMP");
	$field_value[4]=xml_get_ele($da_me_med_med_obj, "SOILTEMP");
	$field_value[5]=xml_get_ele($da_me_med_med_obj, "BAROPRESS");
	$field_value[6]=xml_get_ele($da_me_med_med_obj, "DAILYPRECIPITATION");
	$field_value[7]=xml_get_ele($da_me_med_med_obj, "PRECIPITATIONTYPE");
	$field_value[8]=xml_get_ele($da_me_med_med_obj, "HUMIDITY");
	$field_value[9]=xml_get_ele($da_me_med_med_obj, "WINDSPEED");
	$field_value[10]=xml_get_ele($da_me_med_med_obj, "MINWINDSPEED");    
	$field_value[11]=xml_get_ele($da_me_med_med_obj, "MAXWINDSPEED");    
	$field_value[12]=xml_get_ele($da_me_med_med_obj, "WINDDIRECTION");
	$field_value[13]=xml_get_ele($da_me_med_med_obj, "CLOUDCOVERAGE"); 
	$field_value[14]=xml_get_ele($da_me_med_med_obj, "ORGDIGITIZE");    
	$field_value[15]=xml_get_ele($da_me_med_med_obj, "COMMENTS");
	$field_value[16]=$ms_id;
	$field_value[17]=$mi_id;
	$field_value[18]=$da_me_med_med_obj['results']['owners'][0]['id'];
	$field_value[19]=$da_me_med_med_obj['results']['owners'][1]['id'];
	$field_value[20]=$da_me_med_med_obj['results']['owners'][2]['id'];
	$field_value[21]=$da_me_med_med_obj['results']['pubdate'];
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
	$da_me_med_med_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {

	// Prepare variables
	$update_table="med";
	$field_name=array();
	$field_name[0]="med_pubdate";
	$field_name[1]="med_time";
	$field_name[2]="med_time_unc";
	$field_name[3]="med_temp";
	$field_name[4]="med_stemp";
	$field_name[5]="med_bp";
	$field_name[6]="med_prec";
	$field_name[7]="med_tprec";
	$field_name[8]="med_hd";
	$field_name[9]="med_wind";
	$field_name[10]="med_wsmin";           
	$field_name[11]="med_wsmax";	     	
	$field_name[12]="med_wdir";
	$field_name[13]="med_clc";           
	$field_name[14]="med_ori";
	$field_name[15]="med_com";
	$field_name[16]="ms_id";
	$field_name[17]="mi_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_me_med_med_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_me_med_med_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_me_med_med_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_me_med_med_obj, "AIRTEMP");
	$field_value[4]=xml_get_ele($da_me_med_med_obj, "SOILTEMP");
	$field_value[5]=xml_get_ele($da_me_med_med_obj, "BAROPRESS");
	$field_value[6]=xml_get_ele($da_me_med_med_obj, "DAILYPRECIPITATION");
	$field_value[7]=xml_get_ele($da_me_med_med_obj, "PRECIPITATIONTYPE");
	$field_value[8]=xml_get_ele($da_me_med_med_obj, "HUMIDITY");
	$field_value[9]=xml_get_ele($da_me_med_med_obj, "WINDSPEED");
	$field_value[10]=xml_get_ele($da_me_med_med_obj, "MINWINDSPEED");    
	$field_value[11]=xml_get_ele($da_me_med_med_obj, "MAXWINDSPEED");  	
	$field_value[12]=xml_get_ele($da_me_med_med_obj, "WINDDIRECTION");
	$field_value[13]=xml_get_ele($da_me_med_med_obj, "CLOUDCOVERAGE"); 
	$field_value[14]=xml_get_ele($da_me_med_med_obj, "ORGDIGITIZE");    
	$field_value[15]=xml_get_ele($da_me_med_med_obj, "COMMENTS");	
	$field_value[16]=$ms_id;
	$field_value[17]=$mi_id;
	$field_value[18]=$da_me_med_med_obj['results']['owners'][0]['id'];
	$field_value[19]=$da_me_med_med_obj['results']['owners'][1]['id'];
	$field_value[20]=$da_me_med_med_obj['results']['owners'][2]['id'];
	$field_value[21]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="med_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_me_med_med_obj['id']=$id;
	array_push($db_ids, $id);
}

?>