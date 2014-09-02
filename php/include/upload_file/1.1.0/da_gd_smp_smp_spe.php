<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get type
$type=xml_get_att($da_gd_smp_smp_spe_obj, "TYPE");
$waterfree=xml_get_att($da_gd_smp_smp_spe_obj, "WATERFREE");

// INSERT or UPDATE?
$id=v1_get_id_species("gd", $code, $type, $waterfree, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="gd";
	$field_name=array();
	$field_name[0]="gd_code";
	$field_name[1]="gd_time";
	$field_name[2]="gd_time_unc";
	$field_name[3]="gd_gtemp";
	$field_name[4]="gd_bp";
	$field_name[5]="gd_flow";
	$field_name[6]="gd_species";
	$field_name[7]="gd_waterfree_flag";
	$field_name[8]="gd_units";
	$field_name[9]="gd_concentration";
	$field_name[10]="gd_concentration_err";
	$field_name[11]="gd_recalc";
	$field_name[12]="gd_envir";
	$field_name[13]="gd_submin"; 
	$field_name[14]="gd_ori"; 	
	$field_name[15]="gd_com";
	$field_name[16]="gs_id";
	$field_name[17]="gi_id";
	$field_name[18]="cc_id";
	$field_name[19]="cc_id2";
	$field_name[20]="cc_id3";
	$field_name[21]="gd_pubdate";
	$field_name[22]="cc_id_load";
	$field_name[23]="gd_loaddate";
	$field_name[24]="cb_ids";	
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_gd_smp_smp_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_gd_smp_smp_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_gd_smp_smp_obj, "TEMPERATURE");
	$field_value[4]=xml_get_ele($da_gd_smp_smp_obj, "ATMOSPRESS");
	$field_value[5]=xml_get_ele($da_gd_smp_smp_obj, "EMISSIONRATE");
	$field_value[6]=$type;
	$field_value[7]=$waterfree;
	$field_value[8]=xml_get_ele($da_gd_smp_smp_spe_obj, "UNITS");
	$field_value[9]=xml_get_ele($da_gd_smp_smp_spe_obj, "CONCENTRATION");
	$field_value[10]=xml_get_ele($da_gd_smp_smp_spe_obj, "CONCENTRATIONUNC");
	$field_value[11]=xml_get_ele($da_gd_smp_smp_spe_obj, "RECALCULATED");
	$field_value[12]=xml_get_ele($da_gd_smp_smp_obj, "ENVIRONFACTORS");
	$field_value[13]=xml_get_ele($da_gd_smp_smp_obj, "SUBLIMATEMINERALS");
	$field_value[14]=xml_get_ele($da_gd_smp_smp_obj, "ORGDIGITIZE");	
	$field_value[15]=xml_get_ele($da_gd_smp_smp_obj, "COMMENTS");
	$field_value[16]=$gs_id;
	$field_value[17]=$gi_id;
	$field_value[18]=$da_gd_smp_smp_obj['results']['owners'][0]['id'];
	$field_value[19]=$da_gd_smp_smp_obj['results']['owners'][1]['id'];
	$field_value[20]=$da_gd_smp_smp_obj['results']['owners'][2]['id'];
	$field_value[21]=$da_gd_smp_smp_obj['results']['pubdate'];
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
	$da_gd_smp_smp_spe_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="gd";
	$field_name=array();
	$field_name[0]="gd_pubdate";
	$field_name[1]="gd_time";
	$field_name[2]="gd_time_unc";
	$field_name[3]="gd_gtemp";
	$field_name[4]="gd_bp";
	$field_name[5]="gd_flow";
	$field_name[6]="gd_units";
	$field_name[7]="gd_concentration";
	$field_name[8]="gd_concentration_err";
	$field_name[9]="gd_recalc";
	$field_name[10]="gd_envir";
	$field_name[11]="gd_submin";
	$field_name[12]="gd_ori";	  
	$field_name[13]="gd_com";
	$field_name[14]="gs_id";
	$field_name[15]="gi_id";
	$field_name[16]="cc_id";
	$field_name[17]="cc_id2";
	$field_name[18]="cc_id3";
	$field_name[19]="cb_ids";	
	$field_value=array();
	$field_value[0]=$da_gd_smp_smp_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_gd_smp_smp_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_gd_smp_smp_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_gd_smp_smp_obj, "TEMPERATURE");
	$field_value[4]=xml_get_ele($da_gd_smp_smp_obj, "ATMOSPRESS");
	$field_value[5]=xml_get_ele($da_gd_smp_smp_obj, "EMISSIONRATE");
	$field_value[6]=xml_get_ele($da_gd_smp_smp_spe_obj, "UNITS");
	$field_value[7]=xml_get_ele($da_gd_smp_smp_spe_obj, "CONCENTRATION");
	$field_value[8]=xml_get_ele($da_gd_smp_smp_spe_obj, "CONCENTRATIONUNC");
	$field_value[9]=xml_get_ele($da_gd_smp_smp_spe_obj, "RECALCULATED");
	$field_value[10]=xml_get_ele($da_gd_smp_smp_obj, "ENVIRONFACTORS");
	$field_value[11]=xml_get_ele($da_gd_smp_smp_obj, "SUBLIMATEMINERALS");
	$field_value[12]=xml_get_ele($da_gd_smp_smp_obj, "ORGDIGITIZE");	
	$field_value[13]=xml_get_ele($da_gd_smp_smp_obj, "COMMENTS");
	$field_value[14]=$gs_id;
	$field_value[15]=$gi_id;
	$field_value[16]=$da_gd_smp_smp_obj['results']['owners'][0]['id'];
	$field_value[17]=$da_gd_smp_smp_obj['results']['owners'][1]['id'];
	$field_value[18]=$da_gd_smp_smp_obj['results']['owners'][2]['id'];
	$field_value[19]=$cb_ids;	
	$where_field_name=array();
	$where_field_name[0]="gd_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_gd_smp_smp_spe_obj['id']=$id;
	array_push($db_ids, $id);
}

?>