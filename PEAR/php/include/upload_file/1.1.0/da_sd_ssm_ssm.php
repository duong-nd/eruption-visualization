<?php

// Prepare variables
$insert_table="sd_ssm";
$field_name=array();
$field_name[0]="sd_ssm_count";
$field_name[1]="sd_ssm_calib";
$field_name[2]="sd_ssm_stime";
$field_name[3]="sd_ssm_stime_unc";
$field_name[4]="sd_ssm_lowf";
$field_name[5]="sd_ssm_highf";
$field_name[6]="sd_sam_id";
$field_name[7]="cc_id_load";
$field_name[8]="sd_ssm_loaddate";
$field_name[9]="sd_ssm_com";            
$field_value=array();
$field_value[0]=xml_get_ele($da_sd_ssm_ssm_obj, "CNT");
$field_value[1]=xml_get_ele($da_sd_ssm_ssm_obj, "CALIBRATION");
$field_value[2]=xml_get_ele($da_sd_ssm_ssm_obj, "STARTTIME");
$field_value[3]=xml_get_ele($da_sd_ssm_ssm_obj, "STARTTIMEUNC");
$field_value[4]=xml_get_ele($da_sd_ssm_ssm_obj, "LOWFREQ");
$field_value[5]=xml_get_ele($da_sd_ssm_ssm_obj, "HIGHFREQ");
$field_value[6]=$da_sd_sam_sam_obj['id'];
$field_value[7]=$cc_id_load;
$field_value[8]=$current_time;
$field_value[9]=xml_get_ele($da_sd_ssm_ssm_obj, "COMMENTS");  
// INSERT values into database and write UNDO file
if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

?>