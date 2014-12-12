<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_sd_ivl_ivl_obj, "CODE");

// Get owners
$owners=$da_sd_ivl_ivl_obj['results']['owners'];

// Prepare link to sn_id
if (substr($da_sd_ivl_ivl_obj['results']['sn_id'], 0, 1)=="@") {
	$sn_id=$db_ids[substr($da_sd_ivl_ivl_obj['results']['sn_id'], 1)];
}
else {
	$sn_id=$da_sd_ivl_ivl_obj['results']['sn_id'];
}

// Prepare link to ss_id
if (substr($da_sd_ivl_ivl_obj['results']['ss_id'], 0, 1)=="@") {
	$ss_id=$db_ids[substr($da_sd_ivl_ivl_obj['results']['ss_id'], 1)];
}
else {
	$ss_id=$da_sd_ivl_ivl_obj['results']['ss_id'];
}

// INSERT or UPDATE?
$id=v1_get_id("sd_ivl", $code, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="sd_ivl";
	$field_name=array();
	$field_name[0]="sd_ivl_code";
	$field_name[1]="sd_ivl_eqtype";
	$field_name[2]="sd_ivl_hdist";
	$field_name[3]="sd_ivl_avgdepth";
	$field_name[4]="sd_ivl_vdispers";
	$field_name[5]="sd_ivl_hmigr_hyp";
	$field_name[6]="sd_ivl_vmigr_hyp";
	$field_name[7]="sd_ivl_patt";
	$field_name[8]="sd_ivl_data";
	$field_name[9]="sd_ivl_picks";
	$field_name[10]="sd_ivl_nrec";
	$field_name[11]="sd_ivl_nfelt";
	$field_name[12]="sd_ivl_felt_stime";
	$field_name[13]="sd_ivl_felt_stime_unc";
	$field_name[14]="sd_ivl_felt_etime";
	$field_name[15]="sd_ivl_felt_etime_unc";
	$field_name[16]="sd_ivl_etot";
	$field_name[17]="sd_ivl_etot_stime";
	$field_name[18]="sd_ivl_etot_stime_unc";
	$field_name[19]="sd_ivl_etot_etime";
	$field_name[20]="sd_ivl_etot_etime_unc";
	$field_name[21]="sd_ivl_stime";
	$field_name[22]="sd_ivl_stime_unc";
	$field_name[23]="sd_ivl_etime";
	$field_name[24]="sd_ivl_etime_unc";
	$field_name[25]="sd_ivl_fmin";         		         
	$field_name[26]="sd_ivl_fmax";        	
	$field_name[27]="sd_ivl_amin";          	
	$field_name[28]="sd_ivl_amax";         	
	$field_name[29]="sd_ivl_desc";
	$field_name[30]="sd_ivl_ori";       	
	$field_name[31]="sd_ivl_com";          	
	$field_name[32]="sn_id";
	$field_name[33]="ss_id";
	$field_name[34]="cc_id";
	$field_name[35]="cc_id2";
	$field_name[36]="cc_id3";
	$field_name[37]="sd_ivl_pubdate";
	$field_name[38]="cc_id_load";
	$field_name[39]="sd_ivl_loaddate";
	$field_name[40]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_sd_ivl_ivl_obj, "EARTHQUAKETYPE");
	$field_value[2]=xml_get_ele($da_sd_ivl_ivl_obj, "HDISTSUMMIT");
	$field_value[3]=xml_get_ele($da_sd_ivl_ivl_obj, "MEANDEPTH");
	$field_value[4]=xml_get_ele($da_sd_ivl_ivl_obj, "VERTICALDISP");
	$field_value[5]=xml_get_ele($da_sd_ivl_ivl_obj, "HYPOCENTERHMIGR");
	$field_value[6]=xml_get_ele($da_sd_ivl_ivl_obj, "HYPOCENTERVMIGR");
	$field_value[7]=xml_get_ele($da_sd_ivl_ivl_obj, "TEMPORALPATTERN");
	$field_value[8]=xml_get_ele($da_sd_ivl_ivl_obj, "DATATYPE");
	$field_value[9]=xml_get_ele($da_sd_ivl_ivl_obj, "PICKSDETERMINATION");
	$field_value[10]=xml_get_ele($da_sd_ivl_ivl_obj, "NUMBOFRECEQ");
	$field_value[11]=xml_get_ele($da_sd_ivl_ivl_obj, "NUMBOFFELTEQ");
	$field_value[12]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTSTARTTIME");
	$field_value[13]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTSTARTTIMEUNC");
	$field_value[14]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTENDTIME");
	$field_value[15]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTENDTIMEUNC");
	$field_value[16]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYRELEASE");
	$field_value[17]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASSTARTTIME");
	$field_value[18]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASSTARTTIMEUNC");
	$field_value[19]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASENDTIME");
	$field_value[20]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASENDTIMEUNC");
	$field_value[21]=xml_get_ele($da_sd_ivl_ivl_obj, "STARTTIME");
	$field_value[22]=xml_get_ele($da_sd_ivl_ivl_obj, "STARTTIMEUNC");
	$field_value[23]=xml_get_ele($da_sd_ivl_ivl_obj, "ENDTIME");
	$field_value[24]=xml_get_ele($da_sd_ivl_ivl_obj, "ENDTIMEUNC");
	$field_value[25]=xml_get_ele($da_sd_ivl_ivl_obj, "MINFREQUENCY");        
	$field_value[26]=xml_get_ele($da_sd_ivl_ivl_obj, "MAXFREQUENCY");          
	$field_value[27]=xml_get_ele($da_sd_ivl_ivl_obj, "MINAMPLITUDE");          	
	$field_value[28]=xml_get_ele($da_sd_ivl_ivl_obj, "MAXAMPLITUDE");         		
	$field_value[29]=xml_get_ele($da_sd_ivl_ivl_obj, "DESCRIPTION");
	$field_value[30]=xml_get_ele($da_sd_ivl_ivl_obj, "ORGDIGITIZE");         	
	$field_value[31]=xml_get_ele($da_sd_ivl_ivl_obj, "COMMENTS");	        	
	$field_value[32]=$sn_id;
	$field_value[33]=$ss_id;
	$field_value[34]=$da_sd_ivl_ivl_obj['results']['owners'][0]['id'];
	$field_value[35]=$da_sd_ivl_ivl_obj['results']['owners'][1]['id'];
	$field_value[36]=$da_sd_ivl_ivl_obj['results']['owners'][2]['id'];
	$field_value[37]=$da_sd_ivl_ivl_obj['results']['pubdate'];
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
	$da_sd_ivl_ivl_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="sd_ivl";
	$field_name=array();
	$field_name[0]="sd_ivl_pubdate";
	$field_name[1]="sd_ivl_eqtype";
	$field_name[2]="sd_ivl_hdist";
	$field_name[3]="sd_ivl_avgdepth";
	$field_name[4]="sd_ivl_vdispers";
	$field_name[5]="sd_ivl_hmigr_hyp";
	$field_name[6]="sd_ivl_vmigr_hyp";
	$field_name[7]="sd_ivl_patt";
	$field_name[8]="sd_ivl_data";
	$field_name[9]="sd_ivl_picks";
	$field_name[10]="sd_ivl_nrec";
	$field_name[11]="sd_ivl_nfelt";
	$field_name[12]="sd_ivl_felt_stime";
	$field_name[13]="sd_ivl_felt_stime_unc";
	$field_name[14]="sd_ivl_felt_etime";
	$field_name[15]="sd_ivl_felt_etime_unc";
	$field_name[16]="sd_ivl_etot";
	$field_name[17]="sd_ivl_etot_stime";
	$field_name[18]="sd_ivl_etot_stime_unc";
	$field_name[19]="sd_ivl_etot_etime";
	$field_name[20]="sd_ivl_etot_etime_unc";
	$field_name[21]="sd_ivl_stime";
	$field_name[22]="sd_ivl_stime_unc";
	$field_name[23]="sd_ivl_etime";
	$field_name[24]="sd_ivl_etime_unc";
	$field_name[25]="sd_ivl_fmin";            
	$field_name[26]="sd_ivl_fmax";          	
	$field_name[27]="sd_ivl_amin";         
	$field_name[28]="sd_ivl_amax";          	
	$field_name[29]="sd_ivl_desc";
	$field_name[30]="sd_ivl_ori";          
	$field_name[31]="sd_ivl_com";          
	$field_name[32]="sn_id";
	$field_name[33]="ss_id";
	$field_name[34]="cc_id";
	$field_name[35]="cc_id2";
	$field_name[36]="cc_id3";
	$field_name[37]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_sd_ivl_ivl_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_sd_ivl_ivl_obj, "EARTHQUAKETYPE");
	$field_value[2]=xml_get_ele($da_sd_ivl_ivl_obj, "HDISTSUMMIT");
	$field_value[3]=xml_get_ele($da_sd_ivl_ivl_obj, "MEANDEPTH");
	$field_value[4]=xml_get_ele($da_sd_ivl_ivl_obj, "VERTICALDISP");
	$field_value[5]=xml_get_ele($da_sd_ivl_ivl_obj, "HYPOCENTERHMIGR");
	$field_value[6]=xml_get_ele($da_sd_ivl_ivl_obj, "HYPOCENTERVMIGR");
	$field_value[7]=xml_get_ele($da_sd_ivl_ivl_obj, "TEMPORALPATTERN");
	$field_value[8]=xml_get_ele($da_sd_ivl_ivl_obj, "DATATYPE");
	$field_value[9]=xml_get_ele($da_sd_ivl_ivl_obj, "PICKSDETERMINATION");
	$field_value[10]=xml_get_ele($da_sd_ivl_ivl_obj, "NUMBOFRECEQ");
	$field_value[11]=xml_get_ele($da_sd_ivl_ivl_obj, "NUMBOFFELTEQ");
	$field_value[12]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTSTARTTIME");
	$field_value[13]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTSTARTTIMEUNC");
	$field_value[14]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTENDTIME");
	$field_value[15]=xml_get_ele($da_sd_ivl_ivl_obj, "FELTEQCNTENDTIMEUNC");
	$field_value[16]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYRELEASE");
	$field_value[17]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASSTARTTIME");
	$field_value[18]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASSTARTTIMEUNC");
	$field_value[19]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASENDTIME");
	$field_value[20]=xml_get_ele($da_sd_ivl_ivl_obj, "ENERGYMEASENDTIMEUNC");
	$field_value[21]=xml_get_ele($da_sd_ivl_ivl_obj, "STARTTIME");
	$field_value[22]=xml_get_ele($da_sd_ivl_ivl_obj, "STARTTIMEUNC");
	$field_value[23]=xml_get_ele($da_sd_ivl_ivl_obj, "ENDTIME");
	$field_value[24]=xml_get_ele($da_sd_ivl_ivl_obj, "ENDTIMEUNC");
	$field_value[25]=xml_get_ele($da_sd_ivl_ivl_obj, "MINFREQUENCY");          
	$field_value[26]=xml_get_ele($da_sd_ivl_ivl_obj, "MAXFREQUENCY");          
	$field_value[27]=xml_get_ele($da_sd_ivl_ivl_obj, "MINAMPLITUDE");          
	$field_value[28]=xml_get_ele($da_sd_ivl_ivl_obj, "MAXAMPLITUDE");          		
	$field_value[29]=xml_get_ele($da_sd_ivl_ivl_obj, "DESCRIPTION");
	$field_value[30]=xml_get_ele($da_sd_ivl_ivl_obj, "ORGDIGITIZE");          
	$field_value[31]=xml_get_ele($da_sd_ivl_ivl_obj, "COMMENTS");	         	
	$field_value[32]=$sn_id;
	$field_value[33]=$ss_id;
	$field_value[34]=$da_sd_ivl_ivl_obj['results']['owners'][0]['id'];
	$field_value[35]=$da_sd_ivl_ivl_obj['results']['owners'][1]['id'];
	$field_value[36]=$da_sd_ivl_ivl_obj['results']['owners'][2]['id'];
	$field_value[37]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="sd_ivl_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_sd_ivl_ivl_obj['id']=$id;
	array_push($db_ids, $id);
}

?>