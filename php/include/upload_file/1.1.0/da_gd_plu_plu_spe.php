<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get type
$type=xml_get_att($da_gd_plu_plu_spe_obj, "TYPE");

// INSERT or UPDATE?
$id=v1_get_id_species("gd_plu", $code, $type, NULL, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="gd_plu";
	$field_name=array();
	$field_name[0]="gd_plu_code";
	$field_name[1]="gd_plu_lat";
	$field_name[2]="gd_plu_lon";
	$field_name[3]="gd_plu_height";
	$field_name[4]="gd_plu_hdet";
	$field_name[5]="gd_plu_time";
	$field_name[6]="gd_plu_time_unc";
	$field_name[7]="gd_plu_species";
	$field_name[8]="gd_plu_units";
	$field_name[9]="gd_plu_emit";
	$field_name[10]="gd_plu_emit_err";
	$field_name[11]="gd_plu_recalc";
	$field_name[12]="gd_plu_wind";
	$field_name[13]="gd_plu_wsmin";	   
	$field_name[14]="gd_plu_wsmax";	   
	$field_name[15]="gd_plu_wdir";	           
	$field_name[16]="gd_plu_weth";
	$field_name[17]="gd_plu_ori";	  
	$field_name[18]="gd_plu_com";
	$field_name[19]="cs_id";	      
	$field_name[20]="gs_id";
	$field_name[21]="gi_id";
	$field_name[22]="vd_id";
	$field_name[23]="cc_id";
	$field_name[24]="cc_id2";
	$field_name[25]="cc_id3";
	$field_name[26]="gd_plu_pubdate";
	$field_name[27]="cc_id_load";
	$field_name[28]="gd_plu_loaddate";
	$field_name[29]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_gd_plu_plu_obj, "LAT");
	$field_value[2]=xml_get_ele($da_gd_plu_plu_obj, "LON");
	$field_value[3]=xml_get_ele($da_gd_plu_plu_obj, "HEIGHT");
	$field_value[4]=xml_get_ele($da_gd_plu_plu_obj, "HEIGHTDETERMINATION");
	$field_value[5]=xml_get_ele($da_gd_plu_plu_obj, "MEASTIME");
	$field_value[6]=xml_get_ele($da_gd_plu_plu_obj, "MEASTIMEUNC");
	$field_value[7]=$type;
	$field_value[8]=xml_get_ele($da_gd_plu_plu_spe_obj, "UNITS");
	$field_value[9]=xml_get_ele($da_gd_plu_plu_spe_obj, "EMISSIONRATE");
	$field_value[10]=xml_get_ele($da_gd_plu_plu_spe_obj, "EMISSIONRATEUNC");
	$field_value[11]=xml_get_ele($da_gd_plu_plu_spe_obj, "RECALCULATED");
	$field_value[12]=xml_get_ele($da_gd_plu_plu_obj, "WINDSPEED");
	$field_value[13]=xml_get_ele($da_gd_plu_plu_obj, "MINWINDSPEED");	 
	$field_value[14]=xml_get_ele($da_gd_plu_plu_obj, "MAXWINDSPEED");	  	
	$field_value[15]=xml_get_ele($da_gd_plu_plu_obj, "WINDDIRECTION");	  
	$field_value[16]=xml_get_ele($da_gd_plu_plu_obj, "WEATHERNOTES");
	$field_value[17]=xml_get_ele($da_gd_plu_plu_obj, "ORGDIGITIZE");	 
	$field_value[18]=xml_get_ele($da_gd_plu_plu_obj, "COMMENTS");
	$field_value[19]=$cs_id;	                                       
	$field_value[20]=$gs_id;
	$field_value[21]=$gi_id;
	$field_value[22]=$da_gd_plu_plu_obj['results']['vd_id'];
	$field_value[23]=$da_gd_plu_plu_obj['results']['owners'][0]['id'];
	$field_value[24]=$da_gd_plu_plu_obj['results']['owners'][1]['id'];
	$field_value[25]=$da_gd_plu_plu_obj['results']['owners'][2]['id'];
	$field_value[26]=$da_gd_plu_plu_obj['results']['pubdate'];
	$field_value[27]=$cc_id_load;
	$field_value[28]=$current_time;
	$field_value[29]=$cb_ids;	

	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_gd_plu_plu_spe_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="gd_plu";
	$field_name=array();
	$field_name[0]="gd_plu_pubdate";
	$field_name[1]="gd_plu_lat";
	$field_name[2]="gd_plu_lon";
	$field_name[3]="gd_plu_height";
	$field_name[4]="gd_plu_hdet";
	$field_name[5]="gd_plu_time";
	$field_name[6]="gd_plu_time_unc";
	$field_name[7]="vd_id";
	$field_name[8]="gd_plu_units";
	$field_name[9]="gd_plu_emit";
	$field_name[10]="gd_plu_emit_err";
	$field_name[11]="gd_plu_recalc";
	$field_name[12]="gd_plu_wind";
	$field_name[13]="gd_plu_wsmin";	  
	$field_name[14]="gd_plu_wsmax";	  
	$field_name[15]="gd_plu_wdir";	 
	$field_name[16]="gd_plu_weth";
	$field_name[17]="gd_plu_ori";	 
	$field_name[18]="gd_plu_com";
	$field_name[19]="cs_id";	     
	$field_name[20]="gs_id";
	$field_name[21]="gi_id";
	$field_name[22]="cc_id";
	$field_name[23]="cc_id2";
	$field_name[24]="cc_id3";
	$field_name[25]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_gd_plu_plu_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_gd_plu_plu_obj, "LAT");
	$field_value[2]=xml_get_ele($da_gd_plu_plu_obj, "LON");
	$field_value[3]=xml_get_ele($da_gd_plu_plu_obj, "HEIGHT");
	$field_value[4]=xml_get_ele($da_gd_plu_plu_obj, "HEIGHTDETERMINATION");
	$field_value[5]=xml_get_ele($da_gd_plu_plu_obj, "MEASTIME");
	$field_value[6]=xml_get_ele($da_gd_plu_plu_obj, "MEASTIMEUNC");
	$field_value[7]=$da_gd_plu_plu_obj['results']['vd_id'];
	$field_value[8]=xml_get_ele($da_gd_plu_plu_spe_obj, "UNITS");
	$field_value[9]=xml_get_ele($da_gd_plu_plu_spe_obj, "EMISSIONRATE");
	$field_value[10]=xml_get_ele($da_gd_plu_plu_spe_obj, "EMISSIONRATEUNC");
	$field_value[11]=xml_get_ele($da_gd_plu_plu_spe_obj, "RECALCULATED");
	$field_value[12]=xml_get_ele($da_gd_plu_plu_obj, "WINDSPEED");
	$field_value[13]=xml_get_ele($da_gd_plu_plu_obj, "MINWINDSPEED");	  
	$field_value[14]=xml_get_ele($da_gd_plu_plu_obj, "MAXWINDSPEED");	 	
	$field_value[15]=xml_get_ele($da_gd_plu_plu_obj, "WINDDIRECTION");	
	$field_value[16]=xml_get_ele($da_gd_plu_plu_obj, "WEATHERNOTES");
	$field_value[17]=xml_get_ele($da_gd_plu_plu_obj, "ORGDIGITIZE");	 	
	$field_value[18]=xml_get_ele($da_gd_plu_plu_obj, "COMMENTS");
	$field_value[19]=$cs_id;				
	$field_value[20]=$gs_id;
	$field_value[21]=$gi_id;
	$field_value[22]=$da_gd_plu_plu_obj['results']['owners'][0]['id'];
	$field_value[23]=$da_gd_plu_plu_obj['results']['owners'][1]['id'];
	$field_value[24]=$da_gd_plu_plu_obj['results']['owners'][2]['id'];
	$field_value[25]=$cb_ids;	
	$where_field_name=array();
	$where_field_name[0]="gd_plu_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_gd_plu_plu_spe_obj['id']=$id;
	array_push($db_ids, $id);
}

?>