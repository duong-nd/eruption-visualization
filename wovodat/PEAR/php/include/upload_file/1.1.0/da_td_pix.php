<?php

// DELETE pixels related to this image
$delete_table="td_pix";
$field_name=array();
$field_name[0]="td_img_id";
$field_name[1]="td_pix_lat";
$field_name[2]="td_pix_lon";
$field_name[3]="td_pix_elev";
$field_name[4]="td_pix_rad";
$field_name[5]="td_pix_flux";
$field_name[6]="td_pix_temp";
$field_name[7]="cc_id_load";
$field_name[8]="td_pix_loaddate";
$field_name[9]="td_pix_com";        
$where_field_name=array();
$where_field_name[0]="td_img_id";
$where_field_value=array();
$where_field_value[0]=$id;
$logical=array();
if (!v1_delete($undo_file_pointer, $delete_table, $field_name, $where_field_name, $where_field_value, $logical, $upload_to_db, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

// Upload children
foreach ($da_td_pix_obj['value'] as &$da_td_pix_ele) {
	switch ($da_td_pix_ele['tag']) {
		case "THERMALPIXEL":
			$da_td_pix_pix_obj=&$da_td_pix_ele;
			include "da_td_pix_pix.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

?>