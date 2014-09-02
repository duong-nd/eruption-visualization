<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($ms_sn_obj, "CODE");

// Get owners
$owners=$ms_sn_obj['results']['owners'];

// Get start time
$stime=xml_get_ele($ms_sn_obj, "STARTTIME");

// Get volcanoes
$vd_ids=$ms_sn_obj['results']['vd_ids'];
$vd_ids_cnt=count($vd_ids);

// INSERT or UPDATE?
$id=v1_get_id_ms("sn", $code, $stime, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="sn";
	$field_name=array();
	$field_name[0]="sn_code";
	$field_name[1]="sn_name";
	$field_name[2]="sn_vmodel";	
	$field_name[3]="sn_vmodel_detail";
	$field_name[4]="sn_zerokm";
	$field_name[5]="sn_fdepth_flag";
	$field_name[6]="sn_fdepth";
	$field_name[7]="sn_stime";
	$field_name[8]="sn_stime_unc";
	$field_name[9]="sn_etime";
	$field_name[10]="sn_etime_unc";	
	$field_name[11]="sn_tot";
	$field_name[12]="sn_bb";
	$field_name[13]="sn_smp";
	$field_name[14]="sn_digital";
	$field_name[15]="sn_analog";
	$field_name[16]="sn_tcomp";
	$field_name[17]="sn_micro";
	$field_name[18]="sn_desc";
	$field_name[19]="sn_utc";
	$field_name[20]="sn_ori";           
	$field_name[21]="sn_com";          		
	$field_name[22]="cc_id";
	$field_name[23]="cc_id2";
	$field_name[24]="cc_id3";
	$field_name[25]="sn_pubdate";
	$field_name[26]="cc_id_load";
	$field_name[27]="sn_loaddate";
	$field_name[28]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($ms_sn_obj, "NAME");
	$field_value[2]=xml_get_ele($ms_sn_obj, "VELOCITYMODEL");
	$field_value[3]=xml_get_ele($ms_sn_obj, "VELOCITYMODELDETAIL");	 	
	$field_value[4]=xml_get_ele($ms_sn_obj, "ZERODEPTH");
	$field_value[5]=xml_get_ele($ms_sn_obj, "FIXEDDEPTH");
	$field_value[6]=xml_get_ele($ms_sn_obj, "FIXEDDEPTHDESC");
	$field_value[7]=$stime;
	$field_value[8]=xml_get_ele($ms_sn_obj, "STARTTIMEUNC");
	$field_value[9]=xml_get_ele($ms_sn_obj, "ENDTIME");
	$field_value[10]=xml_get_ele($ms_sn_obj, "ENDTIMEUNC");	
	$field_value[11]=xml_get_ele($ms_sn_obj, "NUMBEROFSEISMO");
	$field_value[12]=xml_get_ele($ms_sn_obj, "NUMBEROFBBSEISMO");
	$field_value[13]=xml_get_ele($ms_sn_obj, "NUMBEROFSMPSEISMO");
	$field_value[14]=xml_get_ele($ms_sn_obj, "NUMBEROFDIGISEISMO");
	$field_value[15]=xml_get_ele($ms_sn_obj, "NUMBEROFANASEISMO");
	$field_value[16]=xml_get_ele($ms_sn_obj, "NUMBEROF3COMPSEISMO");
	$field_value[17]=xml_get_ele($ms_sn_obj, "NUMBEROFMICRO");
	$field_value[18]=xml_get_ele($ms_sn_obj, "DESCRIPTION");	
	$field_value[19]=xml_get_ele($ms_sn_obj, "DIFFUTC");
	$field_value[20]=xml_get_ele($ms_sn_obj, "ORGDIGITIZE");	          	
	$field_value[21]=xml_get_ele($ms_sn_obj, "COMMENTS");	            
	$field_value[22]=$ms_sn_obj['results']['owners'][0]['id'];
	$field_value[23]=$ms_sn_obj['results']['owners'][1]['id'];
	$field_value[24]=$ms_sn_obj['results']['owners'][2]['id'];
	$field_value[25]=$ms_sn_obj['results']['pubdate'];
	$field_value[26]=$cc_id_load;
	$field_value[27]=$current_time;
	$field_value[28]=$cb_ids;
	if ($vd_ids_cnt==1) {
		$field_name[29]="vd_id";
		$field_value[29]=$vd_ids[0];
	}
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_sn_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="sn";
	$field_name=array();
	$field_name[0]="sn_pubdate";
	$field_name[1]="sn_name";
	$field_name[2]="sn_vmodel";
	$field_name[3]="sn_vmodel_detail"; 
	$field_name[4]="sn_zerokm";
	$field_name[5]="sn_fdepth_flag";
	$field_name[6]="sn_fdepth";
	$field_name[7]="sn_stime_unc";
	$field_name[8]="sn_etime";
	$field_name[9]="sn_etime_unc";	
	$field_name[10]="sn_tot";
	$field_name[11]="sn_bb";
	$field_name[12]="sn_smp";
	$field_name[13]="sn_digital";
	$field_name[14]="sn_analog";
	$field_name[15]="sn_tcomp";
	$field_name[16]="sn_micro";
	$field_name[17]="sn_desc";
	$field_name[18]="sn_utc";
	$field_name[19]="sn_ori";           	
	$field_name[20]="sn_com";           	
	$field_name[21]="vd_id";
	$field_name[22]="cc_id";
	$field_name[23]="cc_id2";
	$field_name[24]="cc_id3";
	$field_name[25]="cb_ids";
	$field_value=array();
	$field_value[0]=$ms_sn_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($ms_sn_obj, "NAME");                 
	$field_value[2]=xml_get_ele($ms_sn_obj, "VELOCITYMODEL");
	$field_value[3]=xml_get_ele($ms_sn_obj, "VELOCITYMODELDETAIL");	    
	$field_value[4]=xml_get_ele($ms_sn_obj, "ZERODEPTH");
	$field_value[5]=xml_get_ele($ms_sn_obj, "FIXEDDEPTH");
	$field_value[6]=xml_get_ele($ms_sn_obj, "FIXEDDEPTHDESC");
	$field_value[7]=xml_get_ele($ms_sn_obj, "STARTTIMEUNC");
	$field_value[8]=xml_get_ele($ms_sn_obj, "ENDTIME");
	$field_value[9]=xml_get_ele($ms_sn_obj, "ENDTIMEUNC");	
	$field_value[10]=xml_get_ele($ms_sn_obj, "NUMBEROFSEISMO");
	$field_value[11]=xml_get_ele($ms_sn_obj, "NUMBEROFBBSEISMO");
	$field_value[12]=xml_get_ele($ms_sn_obj, "NUMBEROFSMPSEISMO");
	$field_value[13]=xml_get_ele($ms_sn_obj, "NUMBEROFDIGISEISMO");
	$field_value[14]=xml_get_ele($ms_sn_obj, "NUMBEROFANASEISMO");
	$field_value[15]=xml_get_ele($ms_sn_obj, "NUMBEROF3COMPSEISMO");
	$field_value[16]=xml_get_ele($ms_sn_obj, "NUMBEROFMICRO");
	$field_value[17]=xml_get_ele($ms_sn_obj, "DESCRIPTION");	
	$field_value[18]=xml_get_ele($ms_sn_obj, "DIFFUTC");
	$field_value[19]=xml_get_ele($ms_sn_obj, "ORGDIGITIZE");	     
	$field_value[20]=xml_get_ele($ms_sn_obj, "COMMENTS");	        
	
	if ($vd_ids_cnt==1) {
		$field_value[21]=$vd_ids[0];
	}
	else {
		$field_value[21]="0";
	}	
	$field_value[22]=$ms_sn_obj['results']['owners'][0]['id'];
	$field_value[23]=$ms_sn_obj['results']['owners'][1]['id'];
	$field_value[24]=$ms_sn_obj['results']['owners'][2]['id'];
	$field_value[25]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="sn_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$ms_sn_obj['id']=$id;
	array_push($db_ids, $id);
	
	// DELETE data in jj_volnet
	$delete_table="jj_volnet";
	$field_name=array();
	$field_name[0]="jj_net_flag";
	$field_name[1]="jj_net_id";
	$field_name[2]="vd_id";
	$field_name[3]="cc_id_load";
	$field_name[4]="jj_volnet_loaddate";
	$where_field_name=array();
	$where_field_name[0]="jj_net_flag";
	$where_field_name[1]="jj_net_id";
	$where_field_value=array();
	$where_field_value[0]="S";
	$where_field_value[1]=$id;
	$logical=array();
	$logical[0]="AND";
	if (!v1_delete($undo_file_pointer, $delete_table, $field_name, $where_field_name, $where_field_value, $logical, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
}

// Volcanoes
if ($vd_ids_cnt>1) {
	foreach ($vd_ids as $vd_id) {
		// INSERT into jj_volnet
		$field_name=array();
		$field_name[0]="jj_net_flag";
		$field_name[1]="jj_net_id";
		$field_name[2]="vd_id";
		$field_name[3]="cc_id_load";
		$field_name[4]="jj_volnet_loaddate";
		$field_value=array();
		$field_value[0]="S";
		$field_value[1]=$ms_sn_obj['id'];
		$field_value[2]=$vd_id;
		$field_value[3]=$cc_id_load;
		$field_value[4]=$current_time;
		if (!v1_insert($undo_file_pointer, "jj_volnet", $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
			$errors[$l_errors]=$error;
			$l_errors++;
			return FALSE;
		}
	}
}

// Upload children
foreach ($ms_sn_obj['value'] as &$ms_sn_ele) {
	switch ($ms_sn_ele['tag']) {
		case "SEISMICSTATION":
			$ms_sn_ss_obj=&$ms_sn_ele;
			include "ms_sn_ss.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>