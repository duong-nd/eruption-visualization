<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");


// Get code
$code=xml_get_att($da_td_img_img_obj, "CODE");

// Get owners
$owners=$da_td_img_img_obj['results']['owners'];

// Prepare link to ts_id
if (substr($da_td_img_img_obj['results']['ts_id'], 0, 1)=="@") {
	$ts_id=$db_ids[substr($da_td_img_img_obj['results']['ts_id'], 1)];
}
else {
	$ts_id=$da_td_img_img_obj['results']['ts_id'];
}



// Prepare link to cs_id
if (substr($da_td_img_img_obj['results']['cs_id'], 0, 1)=="@") {
	$cs_id=$db_ids[substr($da_td_img_img_obj['results']['cs_id'], 1)];
}
else {
	$cs_id=$da_td_img_img_obj['results']['cs_id'];
}

// Prepare link to ti_id
if (substr($da_td_img_img_obj['results']['ti_id'], 0, 1)=="@") {
	$ti_id=$db_ids[substr($da_td_img_img_obj['results']['ti_id'], 1)];
}
else {
	$ti_id=$da_td_img_img_obj['results']['ti_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("td_img", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="td_img";
	$field_name=array();
	$field_name[0]="td_img_code";
	$field_name[1]="td_img_iplat";
	$field_name[2]="td_img_ialt";
	$field_name[3]="td_img_ilat";
	$field_name[4]="td_img_ilon";
	$field_name[5]="td_img_idatum";
	$field_name[6]="td_img_desc";
	$field_name[7]="td_img_time";
	$field_name[8]="td_img_time_unc";
	$field_name[9]="td_img_bname";
	$field_name[10]="td_img_hbwave";
	$field_name[11]="td_img_lbwave";
	$field_name[12]="td_img_path";         
	$field_name[13]="td_img_psize";
	$field_name[14]="td_img_maxrad";
	$field_name[15]="td_img_maxrrad";
	$field_name[16]="td_img_maxtemp";
	$field_name[17]="td_img_totrad";
	$field_name[18]="td_img_maxflux";
	$field_name[19]="td_img_ntres";
	$field_name[20]="td_img_atmcorr";
	$field_name[21]="td_img_thmcorr";
	$field_name[22]="td_img_ortho";
	$field_name[23]="td_img_ori";          
	$field_name[24]="td_img_com";
	$field_name[25]="vd_id";
	$field_name[26]="cs_id";
	$field_name[27]="ts_id";
	$field_name[28]="ti_id";
	$field_name[29]="cc_id";
	$field_name[30]="cc_id2";
	$field_name[31]="cc_id3";
	$field_name[32]="td_img_pubdate";
	$field_name[33]="cc_id_load";
	$field_name[34]="td_img_loaddate";
	$field_name[35]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_td_img_img_obj, "INSTPLATFORM");
	$field_value[2]=xml_get_ele($da_td_img_img_obj, "INSTALT");
	$field_value[3]=xml_get_ele($da_td_img_img_obj, "INSTLAT");
	$field_value[4]=xml_get_ele($da_td_img_img_obj, "INSTLON");
	$field_value[5]=xml_get_ele($da_td_img_img_obj, "DATUM");
	$field_value[6]=xml_get_ele($da_td_img_img_obj, "DESCRIPTION");
	$field_value[7]=xml_get_ele($da_td_img_img_obj, "TIME");
	$field_value[8]=xml_get_ele($da_td_img_img_obj, "TIMEUNC");
	$field_value[9]=xml_get_ele($da_td_img_img_obj, "BANDNAME");
	$field_value[10]=xml_get_ele($da_td_img_img_obj, "HIGHBANDWAVELENGTH");
	$field_value[11]=xml_get_ele($da_td_img_img_obj, "LOWBANDWAVELENGTH");
	$field_value[12]=xml_get_ele($da_td_img_img_obj, "IMAGEPATH");          
	$field_value[13]=xml_get_ele($da_td_img_img_obj, "PIXELSIZE");
	$field_value[14]=xml_get_ele($da_td_img_img_obj, "MAXRADIANCE");
	$field_value[15]=xml_get_ele($da_td_img_img_obj, "MAXRELATIVERADIANCE");
	$field_value[16]=xml_get_ele($da_td_img_img_obj, "HOTTESTPIXELTEMP");
	$field_value[17]=xml_get_ele($da_td_img_img_obj, "TOTRADIANCE");
	$field_value[18]=xml_get_ele($da_td_img_img_obj, "MAXHEATFLUX");
	$field_value[19]=xml_get_ele($da_td_img_img_obj, "NOMINALTEMPRES");
	$field_value[20]=xml_get_ele($da_td_img_img_obj, "ATMOSCORRECTION");
	$field_value[21]=xml_get_ele($da_td_img_img_obj, "THERMCORRECTION");
	$field_value[22]=xml_get_ele($da_td_img_img_obj, "ORTHORECPROC");
	$field_value[23]=xml_get_ele($da_td_img_img_obj, "ORGDIGITIZE");         
	$field_value[24]=xml_get_ele($da_td_img_img_obj, "COMMENTS");
	$field_value[25]=$da_td_img_img_obj['results']['vd_id'];
	$field_value[26]=$cs_id;
	$field_value[27]=$ts_id;
	$field_value[28]=$ti_id;
	$field_value[29]=$da_td_img_img_obj['results']['owners'][0]['id'];
	$field_value[30]=$da_td_img_img_obj['results']['owners'][1]['id'];
	$field_value[31]=$da_td_img_img_obj['results']['owners'][2]['id'];
	$field_value[32]=$da_td_img_img_obj['results']['pubdate'];
	$field_value[33]=$cc_id_load;
	$field_value[34]=$current_time;
	$field_value[35]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_td_img_img_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="td_img";
	$field_name=array();
	$field_name[0]="td_img_pubdate";
	$field_name[1]="td_img_iplat";
	$field_name[2]="td_img_ialt";	
	$field_name[3]="td_img_ilat";
	$field_name[4]="td_img_ilon";
	$field_name[5]="td_img_idatum";
	$field_name[6]="td_img_desc";
	$field_name[7]="td_img_time";
	$field_name[8]="td_img_time_unc";
	$field_name[9]="td_img_bname";
	$field_name[10]="td_img_hbwave";
	$field_name[11]="td_img_lbwave";
	$field_name[12]="td_img_path";                
	$field_name[13]="td_img_psize";
	$field_name[14]="td_img_maxrad";
	$field_name[15]="td_img_maxrrad";
	$field_name[16]="td_img_maxtemp";
	$field_name[17]="td_img_totrad";
	$field_name[18]="td_img_maxflux";
	$field_name[19]="td_img_ntres";
	$field_name[20]="td_img_atmcorr";
	$field_name[21]="td_img_thmcorr";
	$field_name[22]="td_img_ortho";
	$field_name[23]="td_img_ori";              
	$field_name[24]="td_img_com";
	$field_name[25]="vd_id";
	$field_name[26]="cs_id";
	$field_name[27]="ts_id";
	$field_name[28]="ti_id";
	$field_name[29]="cc_id";
	$field_name[30]="cc_id2";
	$field_name[31]="cc_id3";
	$field_name[32]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_td_img_img_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_td_img_img_obj, "INSTPLATFORM");
	$field_value[2]=xml_get_ele($da_td_img_img_obj, "INSTALT");	
	$field_value[3]=xml_get_ele($da_td_img_img_obj, "INSTLAT");
	$field_value[4]=xml_get_ele($da_td_img_img_obj, "INSTLON");
	$field_value[5]=xml_get_ele($da_td_img_img_obj, "DATUM");
	$field_value[6]=xml_get_ele($da_td_img_img_obj, "DESCRIPTION");
	$field_value[7]=xml_get_ele($da_td_img_img_obj, "TIME");
	$field_value[8]=xml_get_ele($da_td_img_img_obj, "TIMEUNC");
	$field_value[9]=xml_get_ele($da_td_img_img_obj, "BANDNAME");
	$field_value[10]=xml_get_ele($da_td_img_img_obj, "HIGHBANDWAVELENGTH");
	$field_value[11]=xml_get_ele($da_td_img_img_obj, "LOWBANDWAVELENGTH");
	$field_value[12]=xml_get_ele($da_td_img_img_obj, "IMAGEPATH");          
	$field_value[13]=xml_get_ele($da_td_img_img_obj, "PIXELSIZE");
	$field_value[14]=xml_get_ele($da_td_img_img_obj, "MAXRADIANCE");
	$field_value[15]=xml_get_ele($da_td_img_img_obj, "MAXRELATIVERADIANCE");
	$field_value[16]=xml_get_ele($da_td_img_img_obj, "HOTTESTPIXELTEMP");
	$field_value[17]=xml_get_ele($da_td_img_img_obj, "TOTRADIANCE");
	$field_value[18]=xml_get_ele($da_td_img_img_obj, "MAXHEATFLUX");
	$field_value[19]=xml_get_ele($da_td_img_img_obj, "NOMINALTEMPRES");
	$field_value[20]=xml_get_ele($da_td_img_img_obj, "ATMOSCORRECTION");
	$field_value[21]=xml_get_ele($da_td_img_img_obj, "THERMCORRECTION");
	$field_value[22]=xml_get_ele($da_td_img_img_obj, "ORTHORECPROC");
	$field_value[23]=xml_get_ele($da_td_img_img_obj, "ORGDIGITIZE");          	
	$field_value[24]=xml_get_ele($da_td_img_img_obj, "COMMENTS");
	$field_value[25]=$da_td_img_img_obj['results']['vd_id'];
	$field_value[26]=$cs_id;
	$field_value[27]=$ts_id;
	$field_value[28]=$ti_id;
	$field_value[29]=$da_td_img_img_obj['results']['owners'][0]['id'];
	$field_value[30]=$da_td_img_img_obj['results']['owners'][1]['id'];
	$field_value[31]=$da_td_img_img_obj['results']['owners'][2]['id'];
	$field_value[32]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="td_img_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_td_img_img_obj['id']=$id;
	array_push($db_ids, $id);
}

// Upload children
foreach ($da_td_img_img_obj['value'] as &$da_td_img_img_ele) {
	switch ($da_td_img_img_ele['tag']) {
		case "THERMALPIXELS":
			$da_td_pix_obj=&$da_td_img_img_ele;
			include "da_td_pix.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>