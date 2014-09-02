<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_dd_gps_gps_obj, "CODE");

// Get owners
$owners=$da_dd_gps_gps_obj['results']['owners'];

// Prepare link to ds_id
if (substr($da_dd_gps_gps_obj['results']['ds_id'], 0, 1)=="@") {
	$ds_id=$db_ids[substr($da_dd_gps_gps_obj['results']['ds_id'], 1)];
}
else {
	$ds_id=$da_dd_gps_gps_obj['results']['ds_id'];
}

// Prepare link to ds_id_ref1
if (substr($da_dd_gps_gps_obj['results']['ds_id_ref1'], 0, 1)=="@") {
	$ds_id_ref1=$db_ids[substr($da_dd_gps_gps_obj['results']['ds_id_ref1'], 1)];
}
else {
	$ds_id_ref1=$da_dd_gps_gps_obj['results']['ds_id_ref1'];
}

// Prepare link to ds_id_ref2
if (substr($da_dd_gps_gps_obj['results']['ds_id_ref2'], 0, 1)=="@") {
	$ds_id_ref2=$db_ids[substr($da_dd_gps_gps_obj['results']['ds_id_ref2'], 1)];
}
else {
	$ds_id_ref2=$da_dd_gps_gps_obj['results']['ds_id_ref2'];
}

// Prepare link to di_gen_id
if (substr($da_dd_gps_gps_obj['results']['di_gen_id'], 0, 1)=="@") {
	$di_gen_id=$db_ids[substr($da_dd_gps_gps_obj['results']['di_gen_id'], 1)];
}
else {
	$di_gen_id=$da_dd_gps_gps_obj['results']['di_gen_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("dd_gps", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="dd_gps";
	$field_name=array();
	$field_name[0]="dd_gps_code";
	$field_name[1]="dd_gps_time";
	$field_name[2]="dd_gps_time_unc";
	$field_name[3]="dd_gps_lat";
	$field_name[4]="dd_gps_lon";
	$field_name[5]="dd_gps_elev";
	$field_name[6]="dd_gps_nserr";
	$field_name[7]="dd_gps_ewerr";
	$field_name[8]="dd_gps_verr";
	$field_name[9]="dd_gps_software";
	$field_name[10]="dd_gps_orbits";
	$field_name[11]="dd_gps_dur";
	$field_name[12]="dd_gps_qual";
	$field_name[13]="dd_gps_ori";    	
	$field_name[14]="dd_gps_com";    	
	$field_name[15]="ds_id";
	$field_name[16]="ds_id_ref1";
	$field_name[17]="ds_id_ref2";
	$field_name[18]="di_gen_id";
	$field_name[19]="cc_id";
	$field_name[20]="cc_id2";
	$field_name[21]="cc_id3";
	$field_name[22]="dd_gps_pubdate";
	$field_name[23]="cc_id_load";
	$field_name[24]="dd_gps_loaddate";
	$field_name[25]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_dd_gps_gps_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_dd_gps_gps_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_dd_gps_gps_obj, "LAT");
	$field_value[4]=xml_get_ele($da_dd_gps_gps_obj, "LON");
	$field_value[5]=xml_get_ele($da_dd_gps_gps_obj, "ELEV");
	$field_value[6]=xml_get_ele($da_dd_gps_gps_obj, "N-SERR");
	$field_value[7]=xml_get_ele($da_dd_gps_gps_obj, "E-WERR");
	$field_value[8]=xml_get_ele($da_dd_gps_gps_obj, "VERTICALERR"); 
	$field_value[9]=xml_get_ele($da_dd_gps_gps_obj, "SOFTWARE");
	$field_value[10]=xml_get_ele($da_dd_gps_gps_obj, "ORBITS");
	$field_value[11]=xml_get_ele($da_dd_gps_gps_obj, "DURATION");
	$field_value[12]=xml_get_ele($da_dd_gps_gps_obj, "QUALITY");
	$field_value[13]=xml_get_ele($da_dd_gps_gps_obj, "ORGDIGITIZE");	 	
	$field_value[14]=xml_get_ele($da_dd_gps_gps_obj, "COMMENTS");	    	
	$field_value[15]=$ds_id;
	$field_value[16]=$ds_id_ref1;
	$field_value[17]=$ds_id_ref2;
	$field_value[18]=$di_gen_id;
	$field_value[19]=$da_dd_gps_gps_obj['results']['owners'][0]['id'];
	$field_value[20]=$da_dd_gps_gps_obj['results']['owners'][1]['id'];
	$field_value[21]=$da_dd_gps_gps_obj['results']['owners'][2]['id'];
	$field_value[22]=$da_dd_gps_gps_obj['results']['pubdate'];
	$field_value[23]=$cc_id_load;
	$field_value[24]=$current_time;
	$field_value[25]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_gps_gps_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="dd_gps";
	$field_name=array();
	$field_name[0]="dd_gps_pubdate";
	$field_name[1]="dd_gps_time";
	$field_name[2]="dd_gps_time_unc";
	$field_name[3]="dd_gps_lat";
	$field_name[4]="dd_gps_lon";
	$field_name[5]="dd_gps_elev";
	$field_name[6]="dd_gps_nserr";
	$field_name[7]="dd_gps_ewerr";
	$field_name[8]="dd_gps_verr";
	$field_name[9]="dd_gps_software";
	$field_name[10]="dd_gps_orbits";
	$field_name[11]="dd_gps_dur";
	$field_name[12]="dd_gps_qual";
	$field_name[13]="dd_gps_ori";     
	$field_name[14]="dd_gps_com";  		
	$field_name[15]="ds_id";
	$field_name[16]="ds_id_ref1";
	$field_name[17]="ds_id_ref2";
	$field_name[18]="di_gen_id";
	$field_name[19]="cc_id";
	$field_name[20]="cc_id2";
	$field_name[21]="cc_id3";
	$field_name[22]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_dd_gps_gps_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_dd_gps_gps_obj, "MEASTIME");
	$field_value[2]=xml_get_ele($da_dd_gps_gps_obj, "MEASTIMEUNC");
	$field_value[3]=xml_get_ele($da_dd_gps_gps_obj, "LAT");
	$field_value[4]=xml_get_ele($da_dd_gps_gps_obj, "LON");
	$field_value[5]=xml_get_ele($da_dd_gps_gps_obj, "ELEV");
	$field_value[6]=xml_get_ele($da_dd_gps_gps_obj, "N-SERR");
	$field_value[7]=xml_get_ele($da_dd_gps_gps_obj, "E-WERR");
	$field_value[8]=xml_get_ele($da_dd_gps_gps_obj, "VERTICALERR");
	$field_value[9]=xml_get_ele($da_dd_gps_gps_obj, "SOFTWARE");
	$field_value[10]=xml_get_ele($da_dd_gps_gps_obj, "ORBITS");
	$field_value[11]=xml_get_ele($da_dd_gps_gps_obj, "DURATION");
	$field_value[12]=xml_get_ele($da_dd_gps_gps_obj, "QUALITY");
	$field_value[13]=xml_get_ele($da_dd_gps_gps_obj, "ORGDIGITIZE");		
	$field_value[14]=xml_get_ele($da_dd_gps_gps_obj, "COMMENTS");	    	
	$field_value[15]=$ds_id;
	$field_value[16]=$ds_id_ref1;
	$field_value[17]=$ds_id_ref2;
	$field_value[18]=$di_gen_id;
	$field_value[19]=$da_dd_gps_gps_obj['results']['owners'][0]['id'];
	$field_value[20]=$da_dd_gps_gps_obj['results']['owners'][1]['id'];
	$field_value[21]=$da_dd_gps_gps_obj['results']['owners'][2]['id'];
	$field_value[22]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="dd_gps_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_dd_gps_gps_obj['id']=$id;
	array_push($db_ids, $id);
}

?>