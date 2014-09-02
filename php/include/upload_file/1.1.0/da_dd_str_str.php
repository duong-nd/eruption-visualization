<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_dd_str_str_obj, "CODE");

// Get owners
$owners=$da_dd_str_str_obj['results']['owners'];

// Prepare link to ds_id
if (substr($da_dd_str_str_obj['results']['ds_id'], 0, 1)=="@") {
	$ds_id=$db_ids[substr($da_dd_str_str_obj['results']['ds_id'], 1)];
}
else {
	$ds_id=$da_dd_str_str_obj['results']['ds_id'];
}

// Prepare link to di_tlt_id
if (substr($da_dd_str_str_obj['results']['di_tlt_id'], 0, 1)=="@") {
	$di_tlt_id=$db_ids[substr($da_dd_str_str_obj['results']['di_tlt_id'], 1)];
}
else {
	$di_tlt_id=$da_dd_str_str_obj['results']['di_tlt_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("dd_str", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="dd_str";
	$field_name=array();
	$field_name[0]="dd_str_code";
	$field_name[1]="dd_str_time";
	$field_name[2]="dd_str_time_unc";
	$field_name[3]="dd_str_comp1";
	$field_name[4]="dd_str_err1";
	$field_name[5]="dd_str_comp2";
	$field_name[6]="dd_str_err2";
	$field_name[7]="dd_str_comp3";
	$field_name[8]="dd_str_err3";
	$field_name[9]="dd_str_comp4";
	$field_name[10]="dd_str_err4";
	$field_name[11]="dd_str_vdstr";
	$field_name[12]="dd_str_vdstr_err";
	$field_name[13]="dd_str_sstr_ax1";
	$field_name[14]="dd_str_stderr1";
	$field_name[15]="dd_str_azi_ax1";
	$field_name[16]="dd_str_sstr_ax2";
	$field_name[17]="dd_str_stderr2";
	$field_name[18]="dd_str_azi_ax2";
	$field_name[19]="dd_str_sstr_ax3";
	$field_name[20]="dd_str_stderr3";
	$field_name[21]="dd_str_azi_ax3";
	$field_name[22]="dd_str_pmin";
	$field_name[23]="dd_str_pminerr";
	$field_name[24]="dd_str_pmax";
	$field_name[25]="dd_str_pmaxerr";
	$field_name[26]="dd_str_pmin_dir";
	$field_name[27]="dd_str_pmin_direrr";
	$field_name[28]="dd_str_pmax_dir";
	$field_name[29]="dd_str_pmax_direrr";
	$field_name[30]="dd_str_ori";            
	$field_name[31]="dd_str_com";
	$field_name[32]="ds_id";
	$field_name[33]="di_tlt_id";
	$field_name[34]="cc_id";
	$field_name[35]="cc_id2";
	$field_name[36]="cc_id3";
	$field_name[37]="dd_str_pubdate";
	$field_name[38]="cc_id_load";
	$field_name[39]="dd_str_loaddate";
	$field_name[40]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_dd_str_str_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_dd_str_str_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_dd_str_str_obj, "COMPONENT1");
	$field_value[4]=xml_get_ele($da_dd_str_str_obj, "COMPONENT1UNC");
	$field_value[5]=xml_get_ele($da_dd_str_str_obj, "COMPONENT2");
	$field_value[6]=xml_get_ele($da_dd_str_str_obj, "COMPONENT2UNC");
	$field_value[7]=xml_get_ele($da_dd_str_str_obj, "COMPONENT3");
	$field_value[8]=xml_get_ele($da_dd_str_str_obj, "COMPONENT3UNC");
	$field_value[9]=xml_get_ele($da_dd_str_str_obj, "COMPONENT4");
	$field_value[10]=xml_get_ele($da_dd_str_str_obj, "COMPONENT4UNC");
	$field_value[11]=xml_get_ele($da_dd_str_str_obj, "VOLUMETRICSTRAIN");
	$field_value[12]=xml_get_ele($da_dd_str_str_obj, "VOLUMETRICSTRAINUNC");
	$field_value[13]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS1");
	$field_value[14]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS1UNC");
	$field_value[15]=xml_get_ele($da_dd_str_str_obj, "AZIMUTHAXIS1");
	$field_value[16]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS2");
	$field_value[17]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS2UNC");
	$field_value[18]=xml_get_ele($da_dd_str_str_obj, "AZIMUTHAXIS2");
	$field_value[19]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS3");
	$field_value[20]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS3UNC");
	$field_value[21]=xml_get_ele($da_dd_str_str_obj, "AZIMUTHAXIS3");
	$field_value[22]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAIN");
	$field_value[23]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAINUNC");
	$field_value[24]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAIN");
	$field_value[25]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAINUNC");
	$field_value[26]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAINDIR");
	$field_value[27]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAINDIRUNC");
	$field_value[28]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAINDIR");
	$field_value[29]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAINDIRUNC");
	$field_value[30]=xml_get_ele($da_dd_str_str_obj, "ORGDIGITIZE");  
	$field_value[31]=xml_get_ele($da_dd_str_str_obj, "COMMENTS");
	$field_value[32]=$ds_id;
	$field_value[33]=$di_tlt_id;
	$field_value[34]=$da_dd_str_str_obj['results']['owners'][0]['id'];
	$field_value[35]=$da_dd_str_str_obj['results']['owners'][1]['id'];
	$field_value[36]=$da_dd_str_str_obj['results']['owners'][2]['id'];
	$field_value[37]=$da_dd_str_str_obj['results']['pubdate'];
	$field_value[38]=$cc_id_load;
	$field_value[39]=$current_time;
	$field_value[40]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_str_str_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="dd_str";
	$field_name=array();
	$field_name[0]="dd_str_pubdate";
	$field_name[1]="dd_str_time";
	$field_name[2]="dd_str_time_unc";
	$field_name[3]="dd_str_comp1";
	$field_name[4]="dd_str_err1";
	$field_name[5]="dd_str_comp2";
	$field_name[6]="dd_str_err2";
	$field_name[7]="dd_str_comp3";
	$field_name[8]="dd_str_err3";
	$field_name[9]="dd_str_comp4";
	$field_name[10]="dd_str_err4";
	$field_name[11]="dd_str_vdstr";
	$field_name[12]="dd_str_vdstr_err";
	$field_name[13]="dd_str_sstr_ax1";
	$field_name[14]="dd_str_stderr1";
	$field_name[15]="dd_str_azi_ax1";
	$field_name[16]="dd_str_sstr_ax2";
	$field_name[17]="dd_str_stderr2";
	$field_name[18]="dd_str_azi_ax2";
	$field_name[19]="dd_str_sstr_ax3";
	$field_name[20]="dd_str_stderr3";
	$field_name[21]="dd_str_azi_ax3";
	$field_name[22]="dd_str_pmin";
	$field_name[23]="dd_str_pminerr";
	$field_name[24]="dd_str_pmax";
	$field_name[25]="dd_str_pmaxerr";
	$field_name[26]="dd_str_pmin_dir";
	$field_name[27]="dd_str_pmin_direrr";
	$field_name[28]="dd_str_pmax_dir";
	$field_name[29]="dd_str_pmax_direrr";
	$field_name[30]="dd_str_ori";             
	$field_name[31]="dd_str_com";
	$field_name[32]="ds_id";
	$field_name[33]="di_tlt_id";
	$field_name[34]="cc_id";
	$field_name[35]="cc_id2";
	$field_name[36]="cc_id3";
	$field_name[37]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_dd_str_str_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_dd_str_str_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_dd_str_str_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_dd_str_str_obj, "COMPONENT1");
	$field_value[4]=xml_get_ele($da_dd_str_str_obj, "COMPONENT1UNC");
	$field_value[5]=xml_get_ele($da_dd_str_str_obj, "COMPONENT2");
	$field_value[6]=xml_get_ele($da_dd_str_str_obj, "COMPONENT2UNC");
	$field_value[7]=xml_get_ele($da_dd_str_str_obj, "COMPONENT3");
	$field_value[8]=xml_get_ele($da_dd_str_str_obj, "COMPONENT3UNC");
	$field_value[9]=xml_get_ele($da_dd_str_str_obj, "COMPONENT4");
	$field_value[10]=xml_get_ele($da_dd_str_str_obj, "COMPONENT4UNC");
	$field_value[11]=xml_get_ele($da_dd_str_str_obj, "VOLUMETRICSTRAIN");
	$field_value[12]=xml_get_ele($da_dd_str_str_obj, "VOLUMETRICSTRAINUNC");
	$field_value[13]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS1");
	$field_value[14]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS1UNC");
	$field_value[15]=xml_get_ele($da_dd_str_str_obj, "AZIMUTHAXIS1");
	$field_value[16]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS2");
	$field_value[17]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS2UNC");
	$field_value[18]=xml_get_ele($da_dd_str_str_obj, "AZIMUTHAXIS2");
	$field_value[19]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS3");
	$field_value[20]=xml_get_ele($da_dd_str_str_obj, "SHEARSTRAINAXIS3UNC");
	$field_value[21]=xml_get_ele($da_dd_str_str_obj, "AZIMUTHAXIS3");
	$field_value[22]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAIN");
	$field_value[23]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAINUNC");
	$field_value[24]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAIN");
	$field_value[25]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAINUNC");
	$field_value[26]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAINDIR");
	$field_value[27]=xml_get_ele($da_dd_str_str_obj, "MINPRINCIPALSTRAINDIRUNC");
	$field_value[28]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAINDIR");
	$field_value[29]=xml_get_ele($da_dd_str_str_obj, "MAXPRINCIPALSTRAINDIRUNC");
	$field_value[30]=xml_get_ele($da_dd_str_str_obj, "ORGDIGITIZE");  
	$field_value[31]=xml_get_ele($da_dd_str_str_obj, "COMMENTS");
	$field_value[32]=$ds_id;
	$field_value[33]=$di_tlt_id;
	$field_value[34]=$da_dd_str_str_obj['results']['owners'][0]['id'];
	$field_value[35]=$da_dd_str_str_obj['results']['owners'][1]['id'];
	$field_value[36]=$da_dd_str_str_obj['results']['owners'][2]['id'];
	$field_value[37]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="dd_str_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_str_str_obj['id']=$id;
	array_push($db_ids, $id);
}

?>