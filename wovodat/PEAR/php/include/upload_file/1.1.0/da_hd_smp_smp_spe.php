<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get type
$type=xml_get_att($da_hd_smp_smp_spe_obj, "TYPE");

// INSERT or UPDATE?
$id=v1_get_id_species("hd", $code, $type, NULL, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="hd";
	$field_name=array();
	$field_name[0]="hd_code";
	$field_name[1]="hd_time";
	$field_name[2]="hd_time_unc";
	$field_name[3]="hd_temp";
	$field_name[4]="hd_welev";
	$field_name[5]="hd_wdepth";
	$field_name[6]="hd_dwlev";
	$field_name[7]="hd_bp";
	$field_name[8]="hd_sdisc";
	$field_name[9]="hd_prec";
	$field_name[10]="hd_dprec";
	$field_name[11]="hd_tprec";
	$field_name[12]="hd_ph";
	$field_name[13]="hd_ph_err";
	$field_name[14]="hd_cond";
	$field_name[15]="hd_cond_err";
	$field_name[16]="hd_comp_species";
	$field_name[17]="hd_comp_units";
	$field_name[18]="hd_comp_content";
	$field_name[19]="hd_comp_content_err";
	$field_name[20]="hd_atemp";         
	$field_name[21]="hd_tds";            	
	$field_name[22]="hd_ori";	       
	$field_name[23]="hd_com";
	$field_name[24]="hs_id";
	$field_name[25]="hi_id";
	$field_name[26]="cc_id";
	$field_name[27]="cc_id2";
	$field_name[28]="cc_id3";
	$field_name[29]="hd_pubdate";
	$field_name[30]="cc_id_load";
	$field_name[31]="hd_loaddate";
	$field_name[32]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_hd_smp_smp_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_hd_smp_smp_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_hd_smp_smp_obj, "TEMPERATURE");
	$field_value[4]=xml_get_ele($da_hd_smp_smp_obj, "ELEV");
	$field_value[5]=xml_get_ele($da_hd_smp_smp_obj, "DEPTH");
	$field_value[6]=xml_get_ele($da_hd_smp_smp_obj, "WATERLEVELCHANGE");
	$field_value[7]=xml_get_ele($da_hd_smp_smp_obj, "ATMOSPRESS");
	$field_value[8]=xml_get_ele($da_hd_smp_smp_obj, "SPRINGDISCHRATE");
	$field_value[9]=xml_get_ele($da_hd_smp_smp_obj, "PRECIPITATION");
	$field_value[10]=xml_get_ele($da_hd_smp_smp_obj, "DAILYPRECIPITATION");
	$field_value[11]=xml_get_ele($da_hd_smp_smp_obj, "PRECIPITATIONTYPE");
	$field_value[12]=xml_get_ele($da_hd_smp_smp_obj, "PH");
	$field_value[13]=xml_get_ele($da_hd_smp_smp_obj, "PHUNC");
	$field_value[14]=xml_get_ele($da_hd_smp_smp_obj, "CONDUCTIVITY");
	$field_value[15]=xml_get_ele($da_hd_smp_smp_obj, "CONDUCTIVITYUNC");
	$field_value[16]=$type;
	$field_value[17]=xml_get_ele($da_hd_smp_smp_spe_obj, "UNITS");     
	$field_value[18]=xml_get_ele($da_hd_smp_smp_spe_obj, "CONTENT");
	$field_value[19]=xml_get_ele($da_hd_smp_smp_spe_obj, "CONTENTUNC");
	$field_value[20]=xml_get_ele($da_hd_smp_smp_obj, "AIRTEMP");	           
	$field_value[21]=xml_get_ele($da_hd_smp_smp_obj, "TOTALDISOLVEDSOLID");     
	$field_value[22]=xml_get_ele($da_hd_smp_smp_obj, "ORGDIGITIZE");           
	$field_value[23]=xml_get_ele($da_hd_smp_smp_obj, "COMMENTS");
	$field_value[24]=$hs_id;
	$field_value[25]=$hi_id;
	$field_value[26]=$da_hd_smp_smp_obj['results']['owners'][0]['id'];
	$field_value[27]=$da_hd_smp_smp_obj['results']['owners'][1]['id'];
	$field_value[28]=$da_hd_smp_smp_obj['results']['owners'][2]['id'];
	$field_value[29]=$da_hd_smp_smp_obj['results']['pubdate'];
	$field_value[30]=$cc_id_load;
	$field_value[31]=$current_time;
	$field_value[32]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_hd_smp_smp_spe_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="hd";
	$field_name=array();
	$field_name[0]="hd_pubdate";
	$field_name[1]="hd_time";
	$field_name[2]="hd_time_unc";
	$field_name[3]="hd_temp";
	$field_name[4]="hd_welev";
	$field_name[5]="hd_wdepth";
	$field_name[6]="hd_dwlev";
	$field_name[7]="hd_bp";
	$field_name[8]="hd_sdisc";
	$field_name[9]="hd_prec";
	$field_name[10]="hd_dprec";
	$field_name[11]="hd_tprec";
	$field_name[12]="hd_ph";
	$field_name[13]="hd_ph_err";
	$field_name[14]="hd_cond";
	$field_name[15]="hd_cond_err";
	$field_name[16]="hd_comp_units";
	$field_name[17]="hd_comp_content";
	$field_name[18]="hd_comp_content_err";
	$field_name[19]="hd_atemp";          
	$field_name[20]="hd_tds";           
	$field_name[21]="hd_ori";	          
	$field_name[22]="hd_com";
	$field_name[23]="hs_id";
	$field_name[24]="hi_id";
	$field_name[25]="cc_id";
	$field_name[26]="cc_id2";
	$field_name[27]="cc_id3";
	$field_name[28]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_hd_smp_smp_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_hd_smp_smp_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_hd_smp_smp_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_hd_smp_smp_obj, "TEMPERATURE");
	$field_value[4]=xml_get_ele($da_hd_smp_smp_obj, "ELEV");
	$field_value[5]=xml_get_ele($da_hd_smp_smp_obj, "DEPTH");
	$field_value[6]=xml_get_ele($da_hd_smp_smp_obj, "WATERLEVELCHANGE");
	$field_value[7]=xml_get_ele($da_hd_smp_smp_obj, "ATMOSPRESS");
	$field_value[8]=xml_get_ele($da_hd_smp_smp_obj, "SPRINGDISCHRATE");
	$field_value[9]=xml_get_ele($da_hd_smp_smp_obj, "PRECIPITATION");
	$field_value[10]=xml_get_ele($da_hd_smp_smp_obj, "DAILYPRECIPITATION");
	$field_value[11]=xml_get_ele($da_hd_smp_smp_obj, "PRECIPITATIONTYPE");
	$field_value[12]=xml_get_ele($da_hd_smp_smp_obj, "PH");
	$field_value[13]=xml_get_ele($da_hd_smp_smp_obj, "PHUNC");
	$field_value[14]=xml_get_ele($da_hd_smp_smp_obj, "CONDUCTIVITY");
	$field_value[15]=xml_get_ele($da_hd_smp_smp_obj, "CONDUCTIVITYUNC");
	$field_value[16]=xml_get_ele($da_hd_smp_smp_spe_obj, "UNITS");
	$field_value[17]=xml_get_ele($da_hd_smp_smp_spe_obj, "CONTENT");
	$field_value[18]=xml_get_ele($da_hd_smp_smp_spe_obj, "CONTENTUNC");
	$field_value[19]=xml_get_ele($da_hd_smp_smp_obj, "AIRTEMP");	            	
	$field_value[20]=xml_get_ele($da_hd_smp_smp_obj, "TOTALDISOLVEDSOLID");     	
	$field_value[21]=xml_get_ele($da_hd_smp_smp_obj, "ORGDIGITIZE");            		
	$field_value[22]=xml_get_ele($da_hd_smp_smp_obj, "COMMENTS");
	$field_value[23]=$hs_id;
	$field_value[24]=$hi_id;
	$field_value[25]=$da_hd_smp_smp_obj['results']['owners'][0]['id'];
	$field_value[26]=$da_hd_smp_smp_obj['results']['owners'][1]['id'];
	$field_value[27]=$da_hd_smp_smp_obj['results']['owners'][2]['id'];
	$field_value[28]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="hd_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_hd_smp_smp_spe_obj['id']=$id;
	array_push($db_ids, $id);
}

?>