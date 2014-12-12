<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");


// Get code
$code=xml_get_att($da_dd_sar_sar_obj, "CODE");

// Get owners
$owners=$da_dd_sar_sar_obj['results']['owners'];

// Prepare link to di_gen_id
if (substr($da_dd_sar_sar_obj['results']['di_gen_id'], 0, 1)=="@") {
	$di_gen_id=$db_ids[substr($da_dd_sar_sar_obj['results']['di_gen_id'], 1)];
}
else {
	$di_gen_id=$da_dd_sar_sar_obj['results']['di_gen_id'];
}


// Prepare link to cs_id    
if (substr($da_dd_sar_sar_obj['results']['cs_id'], 0, 1)=="@") {
	$cs_id=$db_ids[substr($da_dd_sar_sar_obj['results']['cs_id'], 1)];
}
else {
	$cs_id=$da_dd_sar_sar_obj['results']['cs_id'];
}

// Get satellites
$cs_ids=$da_dd_sar_sar_obj['results']['cs_id'];
$cs_ids_cnt=count($cs_ids);

// INSERT or UPDATE?
$id=v1_get_id("dd_sar", $code, $owners);



// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="dd_sar";
	$field_name=array();
	$field_name[0]="dd_sar_code";
	$field_name[1]="dd_sar_slat";
	$field_name[2]="dd_sar_slon";
	$field_name[3]="dd_sar_spos";
	$field_name[4]="dd_sar_rord";
	$field_name[5]="dd_sar_nrows";
	$field_name[6]="dd_sar_ncols";
	$field_name[7]="dd_sar_units";
	$field_name[8]="dd_sar_ndata";
	$field_name[9]="dd_sar_loc";
	$field_name[10]="dd_sar_pair";
	$field_name[11]="dd_sar_desc";
	$field_name[12]="dd_sar_dem";
	$field_name[13]="dd_sar_dord";
	$field_name[14]="dd_sar_img1_time";
	$field_name[15]="dd_sar_img1_time_unc";
	$field_name[16]="dd_sar_img2_time";
	$field_name[17]="dd_sar_img2_time_unc";
	$field_name[18]="dd_sar_pixsiz";
	$field_name[19]="dd_sar_spacing";
	$field_name[20]="dd_sar_lookang";
	$field_name[21]="dd_sar_limb";
	$field_name[22]="dd_sar_img_path";        	
	$field_name[23]="dd_sar_geotiff";        
	$field_name[24]="dd_sar_prometh";
	$field_name[25]="dd_sar_softwr";
	$field_name[26]="dd_sar_dem_qual";
	$field_name[27]="dd_sar_ori";            
	$field_name[28]="dd_sar_com";            
	$field_name[29]="di_gen_id";
	$field_name[30]="vd_id";
	$field_name[31]="cc_id";
	$field_name[32]="cc_id2";
	$field_name[33]="cc_id3";
	$field_name[34]="dd_sar_pubdate";
	$field_name[35]="cc_id_load";
	$field_name[36]="dd_sar_loaddate";
	$field_name[37]="cb_ids";
	$field_name[38]="cs_id";   
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_dd_sar_sar_obj, "STARTLAT");
	$field_value[2]=xml_get_ele($da_dd_sar_sar_obj, "STARTLON");
	$field_value[3]=xml_get_ele($da_dd_sar_sar_obj, "STARTPOSITION");
	$field_value[4]=xml_get_ele($da_dd_sar_sar_obj, "ROWORDER");
	$field_value[5]=xml_get_ele($da_dd_sar_sar_obj, "NUMBOFROWS");
	$field_value[6]=xml_get_ele($da_dd_sar_sar_obj, "NUMBOFCOLS");
	$field_value[7]=xml_get_ele($da_dd_sar_sar_obj, "UNITS");
	$field_value[8]=xml_get_ele($da_dd_sar_sar_obj, "NULLVALUE");
	$field_value[9]=xml_get_ele($da_dd_sar_sar_obj, "LOCATION");
	$field_value[10]=xml_get_ele($da_dd_sar_sar_obj, "PAIR");
	$field_value[11]=xml_get_ele($da_dd_sar_sar_obj, "DESCRIPTION");
	$field_value[12]=xml_get_ele($da_dd_sar_sar_obj, "DEM");
	$field_value[13]=xml_get_ele($da_dd_sar_sar_obj, "BYTESORDER");
	$field_value[14]=xml_get_ele($da_dd_sar_sar_obj, "IMG1TIME");
	$field_value[15]=xml_get_ele($da_dd_sar_sar_obj, "IMG1TIMEUNC");
	$field_value[16]=xml_get_ele($da_dd_sar_sar_obj, "IMG2TIME");
	$field_value[17]=xml_get_ele($da_dd_sar_sar_obj, "IMG2TIMEUNC");
	$field_value[18]=xml_get_ele($da_dd_sar_sar_obj, "METERSPIXELSIZE");
	$field_value[19]=xml_get_ele($da_dd_sar_sar_obj, "DEGREESPIXELSIZE");
	$field_value[20]=xml_get_ele($da_dd_sar_sar_obj, "LOOKANGLE");
	$field_value[21]=xml_get_ele($da_dd_sar_sar_obj, "LIMB");
	$field_value[22]=xml_get_ele($da_dd_sar_sar_obj, "IMAGEPATH");    		
	$field_value[23]=xml_get_ele($da_dd_sar_sar_obj, "GEOTIFF");      		
	$field_value[24]=xml_get_ele($da_dd_sar_sar_obj, "PROCESSMETHOD");
	$field_value[25]=xml_get_ele($da_dd_sar_sar_obj, "SOFTWARE");
	$field_value[26]=xml_get_ele($da_dd_sar_sar_obj, "DEMQUALITY");
	$field_value[27]=xml_get_ele($da_dd_sar_sar_obj, "ORGDIGITIZE");   	
	$field_value[28]=xml_get_ele($da_dd_sar_sar_obj, "COMMENTS");      		
	$field_value[29]=$di_gen_id;
	$field_value[30]=$da_dd_sar_sar_obj['results']['vd_id'];
	$field_value[31]=$da_dd_sar_sar_obj['results']['owners'][0]['id'];
	$field_value[32]=$da_dd_sar_sar_obj['results']['owners'][1]['id'];
	$field_value[33]=$da_dd_sar_sar_obj['results']['owners'][2]['id'];
	$field_value[34]=$da_dd_sar_sar_obj['results']['pubdate'];
	$field_value[35]=$cc_id_load;
	$field_value[36]=$current_time;
	$field_value[37]=$cb_ids;
	$field_value[38]=$cs_id;  
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}


	// Store ID
	$da_dd_sar_sar_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="dd_sar";
	$field_name=array();
	$field_name[0]="dd_sar_pubdate";
	$field_name[1]="dd_sar_slat";
	$field_name[2]="dd_sar_slon";
	$field_name[3]="dd_sar_spos";
	$field_name[4]="dd_sar_rord";
	$field_name[5]="dd_sar_nrows";
	$field_name[6]="dd_sar_ncols";
	$field_name[7]="dd_sar_units";
	$field_name[8]="dd_sar_ndata";
	$field_name[9]="dd_sar_loc";
	$field_name[10]="dd_sar_pair";
	$field_name[11]="dd_sar_desc";
	$field_name[12]="dd_sar_dem";
	$field_name[13]="dd_sar_dord";
	$field_name[14]="dd_sar_img1_time";
	$field_name[15]="dd_sar_img1_time_unc";
	$field_name[16]="dd_sar_img2_time";
	$field_name[17]="dd_sar_img2_time_unc";
	$field_name[18]="dd_sar_pixsiz";
	$field_name[19]="dd_sar_spacing";
	$field_name[20]="dd_sar_lookang";
	$field_name[21]="dd_sar_limb";
	$field_name[22]="dd_sar_img_path";        
	$field_name[23]="dd_sar_geotiff";        
	$field_name[24]="dd_sar_prometh";
	$field_name[25]="dd_sar_softwr";
	$field_name[26]="dd_sar_dem_qual";
	$field_name[27]="dd_sar_ori";            	
	$field_name[28]="dd_sar_com";         	
	$field_name[29]="di_gen_id";
	$field_name[30]="vd_id";
	$field_name[31]="cc_id";
	$field_name[32]="cc_id2";
	$field_name[33]="cc_id3";
	$field_name[34]="cb_ids";
	$field_name[35]="cs_id";  
	$field_value=array();
	$field_value[0]=$da_dd_sar_sar_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_dd_sar_sar_obj, "STARTLAT");
	$field_value[2]=xml_get_ele($da_dd_sar_sar_obj, "STARTLON");
	$field_value[3]=xml_get_ele($da_dd_sar_sar_obj, "STARTPOSITION");
	$field_value[4]=xml_get_ele($da_dd_sar_sar_obj, "ROWORDER");
	$field_value[5]=xml_get_ele($da_dd_sar_sar_obj, "NUMBOFROWS");
	$field_value[6]=xml_get_ele($da_dd_sar_sar_obj, "NUMBOFCOLS");
	$field_value[7]=xml_get_ele($da_dd_sar_sar_obj, "UNITS");
	$field_value[8]=xml_get_ele($da_dd_sar_sar_obj, "NULLVALUE");
	$field_value[9]=xml_get_ele($da_dd_sar_sar_obj, "LOCATION");
	$field_value[10]=xml_get_ele($da_dd_sar_sar_obj, "PAIR");
	$field_value[11]=xml_get_ele($da_dd_sar_sar_obj, "DESCRIPTION");
	$field_value[12]=xml_get_ele($da_dd_sar_sar_obj, "DEM");
	$field_value[13]=xml_get_ele($da_dd_sar_sar_obj, "BYTESORDER");
	$field_value[14]=xml_get_ele($da_dd_sar_sar_obj, "IMG1TIME");
	$field_value[15]=xml_get_ele($da_dd_sar_sar_obj, "IMG1TIMEUNC");
	$field_value[16]=xml_get_ele($da_dd_sar_sar_obj, "IMG2TIME");
	$field_value[17]=xml_get_ele($da_dd_sar_sar_obj, "IMG2TIMEUNC");
	$field_value[18]=xml_get_ele($da_dd_sar_sar_obj, "METERSPIXELSIZE");
	$field_value[19]=xml_get_ele($da_dd_sar_sar_obj, "DEGREESPIXELSIZE");
	$field_value[20]=xml_get_ele($da_dd_sar_sar_obj, "LOOKANGLE");
	$field_value[21]=xml_get_ele($da_dd_sar_sar_obj, "LIMB");
	$field_value[22]=xml_get_ele($da_dd_sar_sar_obj, "IMAGEPATH");     	
	$field_value[23]=xml_get_ele($da_dd_sar_sar_obj, "GEOTIFF");      	
	$field_value[24]=xml_get_ele($da_dd_sar_sar_obj, "PROCESSMETHOD");
	$field_value[25]=xml_get_ele($da_dd_sar_sar_obj, "SOFTWARE");
	$field_value[26]=xml_get_ele($da_dd_sar_sar_obj, "DEMQUALITY");
	$field_value[27]=xml_get_ele($da_dd_sar_sar_obj, "ORGDIGITIZE");   	
	$field_value[28]=xml_get_ele($da_dd_sar_sar_obj, "COMMENTS");      	
	$field_value[29]=$di_gen_id;
	$field_value[30]=$da_dd_sar_sar_obj['results']['vd_id'];
	$field_value[31]=$da_dd_sar_sar_obj['results']['owners'][0]['id'];
	$field_value[32]=$da_dd_sar_sar_obj['results']['owners'][1]['id'];
	$field_value[33]=$da_dd_sar_sar_obj['results']['owners'][2]['id'];
	$field_value[34]=$cb_ids;
	$field_value[35]=$cs_id;   
	$where_field_name=array();
	$where_field_name[0]="dd_sar_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_sar_sar_obj['id']=$id;
	array_push($db_ids, $id);
	
	// DELETE data in j_sarsat
	$delete_table="j_sarsat";
	$field_name=array();
	$field_name[0]="cs_id";
	$field_name[1]="dd_sar_id";
	$field_name[2]="cc_id_load";
	$field_name[3]="j_sarsat_loaddate";
	$where_field_name=array();
	$where_field_name[0]="dd_sar_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	$logical=array();
	if (!v1_delete($undo_file_pointer, $delete_table, $field_name, $where_field_name, $where_field_value, $logical, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
}

// Satellites
foreach ($cs_ids as $cs_id) {
	// INSERT into j_sarsat
	$field_name=array();
	$field_name[0]="cs_id";
	$field_name[1]="dd_sar_id";
	$field_name[2]="cc_id_load";
	$field_name[3]="jj_volnet_loaddate";
	$field_value=array();
	$field_value[0]=$cs_id;
	$field_value[1]=$da_dd_sar_sar_obj['id'];
	$field_value[2]=$cc_id_load;
	$field_value[3]=$current_time;
	if (!v1_insert($undo_file_pointer, "j_sarsat", $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
}

// Upload children
foreach ($da_dd_sar_sar_obj['value'] as &$da_dd_sar_sar_ele) {
	switch ($da_dd_sar_sar_ele['tag']) {
		case "INSARPIXELS":
			$da_dd_srd_obj=&$da_dd_sar_sar_ele;
			include "da_dd_srd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>