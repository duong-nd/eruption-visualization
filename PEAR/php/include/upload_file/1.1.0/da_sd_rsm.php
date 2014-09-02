<?php

// DELETE RSAM
$delete_table="sd_rsm";
$field_name=array();
$field_name[0]="sd_sam_id";
$field_name[1]="sd_rsm_count";
$field_name[2]="sd_rsm_calib";
$field_name[3]="sd_rsm_stime";
$field_name[4]="sd_rsm_stime_unc";
$field_name[5]="cc_id_load";
$field_name[6]="sd_rsm_loaddate";
$field_name[7]="sd_rsm_com";           
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
foreach ($da_sd_rsm_obj['value'] as &$da_sd_rsm_ele) {
	switch ($da_sd_rsm_ele['tag']) {
		case "RSAMDATA":
			$da_sd_rsm_rsm_obj=&$da_sd_rsm_ele;
			include "da_sd_rsm_rsm.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>