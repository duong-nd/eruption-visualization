<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_gd_sol_sol_obj, "CODE");

// Get owners
$owners=$da_gd_sol_sol_obj['results']['owners'];

// Prepare link to gs_id
if (substr($da_gd_sol_sol_obj['results']['gs_id'], 0, 1)=="@") {
	$gs_id=$db_ids[substr($da_gd_sol_sol_obj['results']['gs_id'], 1)];
}
else {
	$gs_id=$da_gd_sol_sol_obj['results']['gs_id'];
}

// Prepare link to gi_id
if (substr($da_gd_sol_sol_obj['results']['gi_id'], 0, 1)=="@") {
	$gi_id=$db_ids[substr($da_gd_sol_sol_obj['results']['gi_id'], 1)];
}
else {
	$gi_id=$da_gd_sol_sol_obj['results']['gi_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("gd_sol", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="gd_sol";
	$field_name=array();
	$field_name[0]="gd_sol_code";
	$field_name[1]="gd_sol_time";
	$field_name[2]="gd_sol_time_unc";
	$field_name[3]="gd_sol_species";
	$field_name[4]="gd_sol_tflux";
	$field_name[5]="gd_sol_flux_err";
	$field_name[6]="gd_sol_pts";
	$field_name[7]="gd_sol_area";
	$field_name[8]="gd_sol_high";
	$field_name[9]="gd_sol_htemp";  		
	$field_name[10]="gd_sol_units";	
	$field_name[11]="gd_sol_ori";    
	$field_name[12]="gd_sol_com";
	$field_name[13]="gs_id";
	$field_name[14]="gi_id";
	$field_name[15]="cc_id";
	$field_name[16]="cc_id2";
	$field_name[17]="cc_id3";
	$field_name[18]="gd_sol_pubdate";
	$field_name[19]="cc_id_load";
	$field_name[20]="gd_sol_loaddate";
	$field_name[21]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_gd_sol_sol_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_gd_sol_sol_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_gd_sol_sol_obj, "SPECIES");
	$field_value[4]=xml_get_ele($da_gd_sol_sol_obj, "TOTALFLUX");
	$field_value[5]=xml_get_ele($da_gd_sol_sol_obj, "TOTALFLUXUNC");
	$field_value[6]=xml_get_ele($da_gd_sol_sol_obj, "NUMBEROFPOINTS");
	$field_value[7]=xml_get_ele($da_gd_sol_sol_obj, "AREA");
	$field_value[8]=xml_get_ele($da_gd_sol_sol_obj, "HIGHESTFLUX");
	$field_value[9]=xml_get_ele($da_gd_sol_sol_obj, "HIGHESTTEMP"); 
	$field_value[10]=xml_get_ele($da_gd_sol_sol_obj, "REPORTEDUNITS");	 
	$field_value[11]=xml_get_ele($da_gd_sol_sol_obj, "ORGDIGITIZE");	 
	$field_value[12]=xml_get_ele($da_gd_sol_sol_obj, "COMMENTS");
	$field_value[13]=$gs_id;
	$field_value[14]=$gi_id;
	$field_value[15]=$da_gd_sol_sol_obj['results']['owners'][0]['id'];
	$field_value[16]=$da_gd_sol_sol_obj['results']['owners'][1]['id'];
	$field_value[17]=$da_gd_sol_sol_obj['results']['owners'][2]['id'];
	$field_value[18]=$da_gd_sol_sol_obj['results']['pubdate'];
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
	$da_gd_sol_sol_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="gd_sol";
	$field_name=array();
	$field_name[0]="gd_sol_pubdate";
	$field_name[1]="gd_sol_time";
	$field_name[2]="gd_sol_time_unc";
	$field_name[3]="gd_sol_species";
	$field_name[4]="gd_sol_tflux";
	$field_name[5]="gd_sol_flux_err";
	$field_name[6]="gd_sol_pts";
	$field_name[7]="gd_sol_area";
	$field_name[8]="gd_sol_high";
	$field_name[9]="gd_sol_htemp";
	$field_name[10]="gd_sol_units";	
	$field_name[11]="gd_sol_ori";   
	$field_name[12]="gd_sol_com";
	$field_name[13]="gs_id";
	$field_name[14]="gi_id";
	$field_name[15]="cc_id";
	$field_name[16]="cc_id2";
	$field_name[17]="cc_id3";
	$field_name[18]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_gd_sol_sol_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_gd_sol_sol_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_gd_sol_sol_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_gd_sol_sol_obj, "SPECIES");
	$field_value[4]=xml_get_ele($da_gd_sol_sol_obj, "TOTALFLUX");
	$field_value[5]=xml_get_ele($da_gd_sol_sol_obj, "TOTALFLUXUNC");
	$field_value[6]=xml_get_ele($da_gd_sol_sol_obj, "NUMBEROFPOINTS");
	$field_value[7]=xml_get_ele($da_gd_sol_sol_obj, "AREA");
	$field_value[8]=xml_get_ele($da_gd_sol_sol_obj, "HIGHESTFLUX");
	$field_value[9]=xml_get_ele($da_gd_sol_sol_obj, "HIGHESTTEMP");
	$field_value[10]=xml_get_ele($da_gd_sol_sol_obj, "REPORTEDUNITS");	
	$field_value[11]=xml_get_ele($da_gd_sol_sol_obj, "ORGDIGITIZE");	 
	$field_value[12]=xml_get_ele($da_gd_sol_sol_obj, "COMMENTS");
	$field_value[13]=$gs_id;
	$field_value[14]=$gi_id;
	$field_value[15]=$da_gd_sol_sol_obj['results']['owners'][0]['id'];
	$field_value[16]=$da_gd_sol_sol_obj['results']['owners'][1]['id'];
	$field_value[17]=$da_gd_sol_sol_obj['results']['owners'][2]['id'];
	$field_value[18]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="gd_sol_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_gd_sol_sol_obj['id']=$id;
	array_push($db_ids, $id);
}

?>