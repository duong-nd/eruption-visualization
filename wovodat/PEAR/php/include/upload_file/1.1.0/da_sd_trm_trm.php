<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_sd_trm_trm_obj, "CODE");

// Get owners
$owners=$da_sd_trm_trm_obj['results']['owners'];

// Prepare link to sn_id
if (substr($da_sd_trm_trm_obj['results']['sn_id'], 0, 1)=="@") {
	$sn_id=$db_ids[substr($da_sd_trm_trm_obj['results']['sn_id'], 1)];
}
else {
	$sn_id=$da_sd_trm_trm_obj['results']['sn_id'];
}

// Prepare link to ss_id
if (substr($da_sd_trm_trm_obj['results']['ss_id'], 0, 1)=="@") {
	$ss_id=$db_ids[substr($da_sd_trm_trm_obj['results']['ss_id'], 1)];
}
else {
	$ss_id=$da_sd_trm_trm_obj['results']['ss_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("sd_trm", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="sd_trm";
	$field_name=array();
	$field_name[0]="sd_trm_code";
	$field_name[1]="sd_trm_type";
	$field_name[2]="sd_trm_qdepth";
	$field_name[3]="sd_trm_domfreq1";
	$field_name[4]="sd_trm_domfreq2";
	$field_name[5]="sd_trm_maxamp";
	$field_name[6]="sd_trm_noise";
	$field_name[7]="sd_trm_reddis";
	$field_name[8]="sd_trm_rderr";
	$field_name[9]="sd_trm_visact";
	$field_name[10]="sd_trm_stime";
	$field_name[11]="sd_trm_stime_unc";
	$field_name[12]="sd_trm_etime";
	$field_name[13]="sd_trm_etime_unc";
	$field_name[14]="sd_trm_dur_day";
	$field_name[15]="sd_trm_dur_day_unc";
	$field_name[16]="sd_trm_ori";                 
	$field_name[17]="sd_trm_com";               
	$field_name[18]="sn_id";
	$field_name[19]="ss_id";
	$field_name[20]="cc_id";
	$field_name[21]="cc_id2";
	$field_name[22]="cc_id3";
	$field_name[23]="sd_trm_pubdate";
	$field_name[24]="cc_id_load";
	$field_name[25]="sd_trm_loaddate";
	$field_name[26]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_sd_trm_trm_obj, "TYPE");
	$field_value[2]=xml_get_ele($da_sd_trm_trm_obj, "QUALITATIVEDEPTH");
	$field_value[3]=xml_get_ele($da_sd_trm_trm_obj, "DOMINANTFREQ");
	$field_value[4]=xml_get_ele($da_sd_trm_trm_obj, "SECONDDOMINANTFREQ");
	$field_value[5]=xml_get_ele($da_sd_trm_trm_obj, "MAXAMPLITUDE");
	$field_value[6]=xml_get_ele($da_sd_trm_trm_obj, "BACKGROUNDNOISE");
	$field_value[7]=xml_get_ele($da_sd_trm_trm_obj, "REDUCEDDISP");
	$field_value[8]=xml_get_ele($da_sd_trm_trm_obj, "REDUCEDDISPUNC");
	$field_value[9]=xml_get_ele($da_sd_trm_trm_obj, "VISIBLEACTIVITY");
	$field_value[10]=xml_get_ele($da_sd_trm_trm_obj, "STARTTIME");
	$field_value[11]=xml_get_ele($da_sd_trm_trm_obj, "STARTTIMEUNC");
	$field_value[12]=xml_get_ele($da_sd_trm_trm_obj, "ENDTIME");
	$field_value[13]=xml_get_ele($da_sd_trm_trm_obj, "ENDTIMEUNC");
	$field_value[14]=xml_get_ele($da_sd_trm_trm_obj, "DURATIONPERDAY");
	$field_value[15]=xml_get_ele($da_sd_trm_trm_obj, "DURATIONPERDAYUNC");
	$field_value[16]=xml_get_ele($da_sd_trm_trm_obj, "ORGDIGITIZE");          	
	$field_value[17]=xml_get_ele($da_sd_trm_trm_obj, "COMMENTS");	          	
	$field_value[18]=$sn_id;
	$field_value[19]=$ss_id;
	$field_value[20]=$da_sd_trm_trm_obj['results']['owners'][0]['id'];
	$field_value[21]=$da_sd_trm_trm_obj['results']['owners'][1]['id'];
	$field_value[22]=$da_sd_trm_trm_obj['results']['owners'][2]['id'];
	$field_value[23]=$da_sd_trm_trm_obj['results']['pubdate'];
	$field_value[24]=$cc_id_load;
	$field_value[25]=$current_time;
	$field_value[26]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_sd_trm_trm_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="sd_trm";
	$field_name=array();
	$field_name[0]="sd_trm_pubdate";
	$field_name[1]="sd_trm_type";
	$field_name[2]="sd_trm_qdepth";
	$field_name[3]="sd_trm_domfreq1";
	$field_name[4]="sd_trm_domfreq2";
	$field_name[5]="sd_trm_maxamp";
	$field_name[6]="sd_trm_noise";
	$field_name[7]="sd_trm_reddis";
	$field_name[8]="sd_trm_rderr";
	$field_name[9]="sd_trm_visact";
	$field_name[10]="sd_trm_stime";
	$field_name[11]="sd_trm_stime_unc";
	$field_name[12]="sd_trm_etime";
	$field_name[13]="sd_trm_etime_unc";
	$field_name[14]="sd_trm_dur_day";
	$field_name[15]="sd_trm_dur_day_unc";
	$field_name[16]="sd_trm_ori";                
	$field_name[17]="sd_trm_com";                 		
	$field_name[18]="sn_id";
	$field_name[19]="ss_id";
	$field_name[20]="cc_id";
	$field_name[21]="cc_id2";
	$field_name[22]="cc_id3";
	$field_name[23]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_sd_trm_trm_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_sd_trm_trm_obj, "TYPE");
	$field_value[2]=xml_get_ele($da_sd_trm_trm_obj, "QUALITATIVEDEPTH");
	$field_value[3]=xml_get_ele($da_sd_trm_trm_obj, "DOMINANTFREQ");
	$field_value[4]=xml_get_ele($da_sd_trm_trm_obj, "SECONDDOMINANTFREQ");
	$field_value[5]=xml_get_ele($da_sd_trm_trm_obj, "MAXAMPLITUDE");
	$field_value[6]=xml_get_ele($da_sd_trm_trm_obj, "BACKGROUNDNOISE");
	$field_value[7]=xml_get_ele($da_sd_trm_trm_obj, "REDUCEDDISP");
	$field_value[8]=xml_get_ele($da_sd_trm_trm_obj, "REDUCEDDISPUNC");
	$field_value[9]=xml_get_ele($da_sd_trm_trm_obj, "VISIBLEACTIVITY");
	$field_value[10]=xml_get_ele($da_sd_trm_trm_obj, "STARTTIME");
	$field_value[11]=xml_get_ele($da_sd_trm_trm_obj, "STARTTIMEUNC");
	$field_value[12]=xml_get_ele($da_sd_trm_trm_obj, "ENDTIME");
	$field_value[13]=xml_get_ele($da_sd_trm_trm_obj, "ENDTIMEUNC");
	$field_value[14]=xml_get_ele($da_sd_trm_trm_obj, "DURATIONPERDAY");
	$field_value[15]=xml_get_ele($da_sd_trm_trm_obj, "DURATIONPERDAYUNC");
	$field_value[16]=xml_get_ele($da_sd_trm_trm_obj, "ORGDIGITIZE");          	
	$field_value[17]=xml_get_ele($da_sd_trm_trm_obj, "COMMENTS");	         		
	$field_value[18]=$sn_id;
	$field_value[19]=$ss_id;
	$field_value[20]=$da_sd_trm_trm_obj['results']['owners'][0]['id'];
	$field_value[21]=$da_sd_trm_trm_obj['results']['owners'][1]['id'];
	$field_value[22]=$da_sd_trm_trm_obj['results']['owners'][2]['id'];
	$field_value[23]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="sd_trm_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_sd_trm_trm_obj['id']=$id;
	array_push($db_ids, $id);
}

?>