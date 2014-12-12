<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Get code
$code=xml_get_att($da_sd_evn_evn_obj, "CODE");

// Get owners
$owners=$da_sd_evn_evn_obj['results']['owners'];

// Get location technique
$sd_evn_tech=xml_get_ele($da_sd_evn_evn_obj, "LOCATECHNIQUE");

// Prepare link to sn_id
if (substr($da_sd_evn_evn_obj['results']['sn_id'], 0, 1)=="@") {
	$sn_id=$db_ids[substr($da_sd_evn_evn_obj['results']['sn_id'], 1)];
}
else {
	$sn_id=$da_sd_evn_evn_obj['results']['sn_id'];
}

// INSERT or UPDATE?
$id=v1_get_id_sd_evn($code, $sn_id, $sd_evn_tech, $owners);

// If ID is NULL, INSERT
if ($id==NULL) {
	
	// Prepare variables
	$insert_table="sd_evn";
	$field_name=array();
	$field_name[0]="sd_evn_code";
	$field_name[1]="sd_evn_arch";
	$field_name[2]="sd_evn_time";
	$field_name[3]="sd_evn_timecsec";
	$field_name[4]="sd_evn_time_unc";
	$field_name[5]="sd_evn_timecsec_unc";
	$field_name[6]="sd_evn_dur";
	$field_name[7]="sd_evn_dur_unc";
	$field_name[8]="sd_evn_tech";
	$field_name[9]="sd_evn_picks";
	$field_name[10]="sd_evn_elat";
	$field_name[11]="sd_evn_elon";
	$field_name[12]="sd_evn_edep";
	$field_name[13]="sd_evn_fixdep";
	$field_name[14]="sd_evn_nst";
	$field_name[15]="sd_evn_nph";
	$field_name[16]="sd_evn_gp";
	$field_name[17]="sd_evn_dcs";
	$field_name[18]="sd_evn_rms";
	$field_name[19]="sd_evn_herr";
	$field_name[20]="sd_evn_xerr";
	$field_name[21]="sd_evn_yerr";
	$field_name[22]="sd_evn_derr";
	$field_name[23]="sd_evn_locqual";
	$field_name[24]="sd_evn_pmag";
	$field_name[25]="sd_evn_pmag_type";
	$field_name[26]="sd_evn_smag";
	$field_name[27]="sd_evn_smag_type";
	$field_name[28]="sd_evn_eqtype";
	$field_name[29]="sd_evn_mtscale";
	$field_name[30]="sd_evn_mxx";
	$field_name[31]="sd_evn_mxy";
	$field_name[32]="sd_evn_mxz";
	$field_name[33]="sd_evn_myy";
	$field_name[34]="sd_evn_myz";
	$field_name[35]="sd_evn_mzz";
	$field_name[36]="sd_evn_strk1";
	$field_name[37]="sd_evn_strk1_err";
	$field_name[38]="sd_evn_dip1";
	$field_name[39]="sd_evn_dip1_err";
	$field_name[40]="sd_evn_rak1";
	$field_name[41]="sd_evn_rak1_err";
	$field_name[42]="sd_evn_strk2";
	$field_name[43]="sd_evn_strk2_err";
	$field_name[44]="sd_evn_dip2";
	$field_name[45]="sd_evn_dip2_err";
	$field_name[46]="sd_evn_rak2";
	$field_name[47]="sd_evn_rak2_err";
	$field_name[48]="sd_evn_samp";
	$field_name[49]="sn_id";
	$field_name[50]="cc_id";
	$field_name[51]="cc_id2";
	$field_name[52]="cc_id3";
	$field_name[53]="sd_evn_pubdate";
	$field_name[54]="cc_id_load";
	$field_name[55]="sd_evn_loaddate";
	$field_name[56]="sd_evn_foc";            
	$field_name[57]="sd_evn_ori";	        
	$field_name[58]="sd_evn_com";
	$field_name[59]="cb_ids";
	$field_value=array();
	$field_value[0]=$code;
	$field_value[1]=xml_get_ele($da_sd_evn_evn_obj, "SEISMOARCHIVE");
	$field_value[2]=$da_sd_evn_evn_obj['results']['sd_evn_time'];
	$field_value[3]=xml_get_ele($da_sd_evn_evn_obj, "ORIGINTIMECSEC");      
	$field_value[4]=$da_sd_evn_evn_obj['results']['sd_evn_time_unc'];
	$field_value[5]=xml_get_ele($da_sd_evn_evn_obj, "ORIGINTIMECSECUNC");		
	$field_value[6]=xml_get_ele($da_sd_evn_evn_obj, "DURATION");
	$field_value[7]=xml_get_ele($da_sd_evn_evn_obj, "DURATIONUNC");
	$field_value[8]=$sd_evn_tech;
	$field_value[9]=xml_get_ele($da_sd_evn_evn_obj, "PICKSDETERMINATION");
	$field_value[10]=xml_get_ele($da_sd_evn_evn_obj, "LAT");
	$field_value[11]=xml_get_ele($da_sd_evn_evn_obj, "LON");
	$field_value[12]=xml_get_ele($da_sd_evn_evn_obj, "DEPTH");
	$field_value[13]=xml_get_ele($da_sd_evn_evn_obj, "FIXEDDEPTH");
	$field_value[14]=xml_get_ele($da_sd_evn_evn_obj, "NUMBEROFSTATIONS");
	$field_value[15]=xml_get_ele($da_sd_evn_evn_obj, "NUMBEROFPHASES");
	$field_value[16]=xml_get_ele($da_sd_evn_evn_obj, "LARGESTAZIMUTHGAP");
	$field_value[17]=xml_get_ele($da_sd_evn_evn_obj, "DISTCLOSESTSTATION");
	$field_value[18]=xml_get_ele($da_sd_evn_evn_obj, "TRAVELTIMERMS");
	$field_value[19]=xml_get_ele($da_sd_evn_evn_obj, "HORIZLOCAERR");
	$field_value[20]=xml_get_ele($da_sd_evn_evn_obj, "MAXLONERR");
	$field_value[21]=xml_get_ele($da_sd_evn_evn_obj, "MAXLATERR");
	$field_value[22]=xml_get_ele($da_sd_evn_evn_obj, "DEPTHERR");
	$field_value[23]=xml_get_ele($da_sd_evn_evn_obj, "LOCAQUALITY");
	$field_value[24]=xml_get_ele($da_sd_evn_evn_obj, "PRIMMAGNITUDE");
	$field_value[25]=xml_get_ele($da_sd_evn_evn_obj, "PRIMMAGNITUDETYPE");
	$field_value[26]=xml_get_ele($da_sd_evn_evn_obj, "SECMAGNITUDE");
	$field_value[27]=xml_get_ele($da_sd_evn_evn_obj, "SECMAGNITUDETYPE");
	$field_value[28]=xml_get_ele($da_sd_evn_evn_obj, "EARTHQUAKETYPE");
	$field_value[29]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORSCALE");
	$field_value[30]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORXX");
	$field_value[31]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORXY");
	$field_value[32]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORXZ");
	$field_value[33]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORYY");
	$field_value[34]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORYZ");
	$field_value[35]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORZZ");
	$field_value[36]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE1");
	$field_value[37]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE1UNC");
	$field_value[38]=xml_get_ele($da_sd_evn_evn_obj, "DIP1");
	$field_value[39]=xml_get_ele($da_sd_evn_evn_obj, "DIP1UNC");
	$field_value[40]=xml_get_ele($da_sd_evn_evn_obj, "RAKE1");
	$field_value[41]=xml_get_ele($da_sd_evn_evn_obj, "RAKE1UNC");
	$field_value[42]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE2");
	$field_value[43]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE2UNC");
	$field_value[44]=xml_get_ele($da_sd_evn_evn_obj, "DIP2");
	$field_value[45]=xml_get_ele($da_sd_evn_evn_obj, "DIP2UNC");
	$field_value[46]=xml_get_ele($da_sd_evn_evn_obj, "RAKE2");
	$field_value[47]=xml_get_ele($da_sd_evn_evn_obj, "RAKE2UNC");
	$field_value[48]=xml_get_ele($da_sd_evn_evn_obj, "SAMPLERATE");
	$field_value[49]=$sn_id;
	$field_value[50]=$da_sd_evn_evn_obj['results']['owners'][0]['id'];
	$field_value[51]=$da_sd_evn_evn_obj['results']['owners'][1]['id'];
	$field_value[52]=$da_sd_evn_evn_obj['results']['owners'][2]['id'];
	$field_value[53]=$da_sd_evn_evn_obj['results']['pubdate'];
	$field_value[54]=$cc_id_load;
	$field_value[55]=$current_time;
	$field_value[56]=xml_get_ele($da_sd_evn_evn_obj, "FOCALPLANESOL"); 
	$field_value[57]=xml_get_ele($da_sd_evn_evn_obj, "ORGDIGITIZE");	
	$field_value[58]=xml_get_ele($da_sd_evn_evn_obj, "COMMENTS");
	$field_value[59]=$cb_ids;
	
	// INSERT values into database and write UNDO file
	if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_sd_evn_evn_obj['id']=$last_insert_id;
	array_push($db_ids, $last_insert_id);
}
// Else, UPDATE
else {
	
	// Prepare variables
	$update_table="sd_evn";
	$field_name=array();
	$field_name[0]="sd_evn_pubdate";
	$field_name[1]="sd_evn_arch";
	$field_name[2]="sd_evn_time";
	$field_name[3]="sd_evn_timecsec";
	$field_name[4]="sd_evn_time_unc";
	$field_name[5]="sd_evn_timecsec_unc";
	$field_name[6]="sd_evn_dur";
	$field_name[7]="sd_evn_dur_unc";
	$field_name[8]="sd_evn_picks";
	$field_name[9]="sd_evn_elat";
	$field_name[10]="sd_evn_elon";
	$field_name[11]="sd_evn_edep";
	$field_name[12]="sd_evn_fixdep";
	$field_name[13]="sd_evn_nst";
	$field_name[14]="sd_evn_nph";
	$field_name[15]="sd_evn_gp";
	$field_name[16]="sd_evn_dcs";
	$field_name[17]="sd_evn_rms";
	$field_name[18]="sd_evn_herr";
	$field_name[19]="sd_evn_xerr";
	$field_name[20]="sd_evn_yerr";
	$field_name[21]="sd_evn_derr";
	$field_name[22]="sd_evn_locqual";
	$field_name[23]="sd_evn_pmag";
	$field_name[24]="sd_evn_pmag_type";
	$field_name[25]="sd_evn_smag";
	$field_name[26]="sd_evn_smag_type";
	$field_name[27]="sd_evn_eqtype";
	$field_name[28]="sd_evn_mtscale";
	$field_name[29]="sd_evn_mxx";
	$field_name[30]="sd_evn_mxy";
	$field_name[31]="sd_evn_mxz";
	$field_name[32]="sd_evn_myy";
	$field_name[33]="sd_evn_myz";
	$field_name[34]="sd_evn_mzz";
	$field_name[35]="sd_evn_strk1";
	$field_name[36]="sd_evn_strk1_err";
	$field_name[37]="sd_evn_dip1";
	$field_name[38]="sd_evn_dip1_err";
	$field_name[39]="sd_evn_rak1";
	$field_name[40]="sd_evn_rak1_err";
	$field_name[41]="sd_evn_strk2";
	$field_name[42]="sd_evn_strk2_err";
	$field_name[43]="sd_evn_dip2";
	$field_name[44]="sd_evn_dip2_err";
	$field_name[45]="sd_evn_rak2";
	$field_name[46]="sd_evn_rak2_err";
	$field_name[47]="sd_evn_samp";
	$field_name[48]="cc_id";
	$field_name[49]="cc_id2";
	$field_name[50]="cc_id3";
	$field_name[51]="sd_evn_foc";           
	$field_name[52]="sd_evn_ori";	         	
	$field_name[53]="sd_evn_com";
	$field_name[54]="cb_ids";
	$field_value=array();
	$field_value[0]=$da_sd_evn_evn_obj['results']['pubdate'];
	$field_value[1]=xml_get_ele($da_sd_evn_evn_obj, "SEISMOARCHIVE");
	$field_value[2]=$da_sd_evn_evn_obj['results']['sd_evn_time'];
	$field_value[3]=xml_get_ele($da_sd_evn_evn_obj, "ORIGINTIMECSEC");      
	$field_value[4]=$da_sd_evn_evn_obj['results']['sd_evn_time_unc'];	
	$field_value[5]=xml_get_ele($da_sd_evn_evn_obj, "ORIGINTIMECSECUNC");		
	$field_value[6]=xml_get_ele($da_sd_evn_evn_obj, "DURATION");
	$field_value[7]=xml_get_ele($da_sd_evn_evn_obj, "DURATIONUNC");
	$field_value[8]=xml_get_ele($da_sd_evn_evn_obj, "PICKSDETERMINATION");
	$field_value[9]=xml_get_ele($da_sd_evn_evn_obj, "LAT");
	$field_value[10]=xml_get_ele($da_sd_evn_evn_obj, "LON");
	$field_value[11]=xml_get_ele($da_sd_evn_evn_obj, "DEPTH");
	$field_value[12]=xml_get_ele($da_sd_evn_evn_obj, "FIXEDDEPTH");
	$field_value[13]=xml_get_ele($da_sd_evn_evn_obj, "NUMBEROFSTATIONS");
	$field_value[14]=xml_get_ele($da_sd_evn_evn_obj, "NUMBEROFPHASES");
	$field_value[15]=xml_get_ele($da_sd_evn_evn_obj, "LARGESTAZIMUTHGAP");
	$field_value[16]=xml_get_ele($da_sd_evn_evn_obj, "DISTCLOSESTSTATION");
	$field_value[17]=xml_get_ele($da_sd_evn_evn_obj, "TRAVELTIMERMS");
	$field_value[18]=xml_get_ele($da_sd_evn_evn_obj, "HORIZLOCAERR");
	$field_value[19]=xml_get_ele($da_sd_evn_evn_obj, "MAXLONERR");
	$field_value[20]=xml_get_ele($da_sd_evn_evn_obj, "MAXLATERR");
	$field_value[21]=xml_get_ele($da_sd_evn_evn_obj, "DEPTHERR");
	$field_value[22]=xml_get_ele($da_sd_evn_evn_obj, "LOCAQUALITY");
	$field_value[23]=xml_get_ele($da_sd_evn_evn_obj, "PRIMMAGNITUDE");
	$field_value[24]=xml_get_ele($da_sd_evn_evn_obj, "PRIMMAGNITUDETYPE");
	$field_value[25]=xml_get_ele($da_sd_evn_evn_obj, "SECMAGNITUDE");
	$field_value[26]=xml_get_ele($da_sd_evn_evn_obj, "SECMAGNITUDETYPE");
	$field_value[27]=xml_get_ele($da_sd_evn_evn_obj, "EARTHQUAKETYPE");
	$field_value[28]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORSCALE");
	$field_value[29]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORXX");
	$field_value[30]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORXY");
	$field_value[31]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORXZ");
	$field_value[32]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORYY");
	$field_value[33]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORYZ");
	$field_value[34]=xml_get_ele($da_sd_evn_evn_obj, "MOMENTTENSORZZ");
	$field_value[35]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE1");
	$field_value[36]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE1UNC");
	$field_value[37]=xml_get_ele($da_sd_evn_evn_obj, "DIP1");
	$field_value[38]=xml_get_ele($da_sd_evn_evn_obj, "DIP1UNC");
	$field_value[39]=xml_get_ele($da_sd_evn_evn_obj, "RAKE1");
	$field_value[40]=xml_get_ele($da_sd_evn_evn_obj, "RAKE1UNC");
	$field_value[41]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE2");
	$field_value[42]=xml_get_ele($da_sd_evn_evn_obj, "STRIKE2UNC");
	$field_value[43]=xml_get_ele($da_sd_evn_evn_obj, "DIP2");
	$field_value[44]=xml_get_ele($da_sd_evn_evn_obj, "DIP2UNC");
	$field_value[45]=xml_get_ele($da_sd_evn_evn_obj, "RAKE2");
	$field_value[46]=xml_get_ele($da_sd_evn_evn_obj, "RAKE2UNC");
	$field_value[47]=xml_get_ele($da_sd_evn_evn_obj, "SAMPLERATE");
	$field_value[48]=$da_sd_evn_evn_obj['results']['owners'][0]['id'];
	$field_value[49]=$da_sd_evn_evn_obj['results']['owners'][1]['id'];
	$field_value[50]=$da_sd_evn_evn_obj['results']['owners'][2]['id'];
	$field_value[51]=xml_get_ele($da_sd_evn_evn_obj, "FOCALPLANESOL");  
	$field_value[52]=xml_get_ele($da_sd_evn_evn_obj, "ORGDIGITIZE");		
	$field_value[53]=xml_get_ele($da_sd_evn_evn_obj, "COMMENTS");
	$field_value[54]=$cb_ids;
	$where_field_name=array();
	$where_field_name[0]="sd_evn_id";
	$where_field_value=array();
	$where_field_value[0]=$id;
	
	// UPDATE values in database and write UNDO file
	if (!v1_update($undo_file_pointer, $update_table, $field_name, $field_value, $where_field_name, $where_field_value, $upload_to_db, $error)) {
		$errors[$l_errors]=$error;
		$l_errors++;
		return FALSE;
	}
	
	// Store ID
	$da_sd_evn_evn_obj['id']=$id;
	array_push($db_ids, $id);
}

?>