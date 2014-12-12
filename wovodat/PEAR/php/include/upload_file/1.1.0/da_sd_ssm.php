<?php

// DELETE RSAM
$delete_table="sd_ssm";
$field_name=array();
$field_name[0]="sd_sam_id";
$field_name[1]="sd_ssm_count";
$field_name[2]="sd_ssm_calib";
$field_name[3]="sd_ssm_stime";
$field_name[4]="sd_ssm_stime_unc";
$field_name[5]="sd_ssm_lowf";
$field_name[6]="sd_ssm_highf";
$field_name[7]="cc_id_load";
$field_name[8]="sd_ssm_loaddate";
$field_name[9]="sd_ssm_com";             
$where_field_name=array();
$where_field_name[0]="sd_sam_id";
$where_field_value=array();
$where_field_value[0]=$id;
$logical=array();
if (!v1_delete($undo_file_pointer, $delete_table, $field_name, $where_field_name, $where_field_value, $logical, $upload_to_db, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// Upload children
foreach ($da_sd_ssm_obj['value'] as &$da_sd_ssm_ele) {
	switch ($da_sd_ssm_ele['tag']) {
		case "SSAMDATA":
			$da_sd_ssm_ssm_obj=&$da_sd_ssm_ele;
			include "da_sd_ssm_ssm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>