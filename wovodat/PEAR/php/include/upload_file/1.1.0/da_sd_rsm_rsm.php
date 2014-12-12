<?php

// Prepare variables
$insert_table="sd_rsm";
$field_name=array();
$field_name[0]="sd_rsm_count";
$field_name[1]="sd_rsm_calib";
$field_name[2]="sd_rsm_stime";
$field_name[3]="sd_rsm_stime_unc";
$field_name[4]="sd_sam_id";
$field_name[5]="cc_id_load";
$field_name[6]="sd_rsm_loaddate";
$field_name[7]="sd_rsm_com";            	
$field_value=array();
$field_value[0]=xml_get_ele($da_sd_rsm_rsm_obj, "CNT");
$field_value[1]=xml_get_ele($da_sd_rsm_rsm_obj, "CALIBRATION");
$field_value[2]=xml_get_ele($da_sd_rsm_rsm_obj, "STARTTIME");
$field_value[3]=xml_get_ele($da_sd_rsm_rsm_obj, "STARTTIMEUNC");
$field_value[4]=$da_sd_sam_sam_obj['id'];
$field_value[5]=$cc_id_load;
$field_value[6]=$current_time;
$field_value[7]=xml_get_ele($da_sd_rsm_rsm_obj, "COMMENTS");  
// INSERT values into database and write UNDO file
if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

?>