<?php

// Prepare variables
$insert_table="td_pix";
$field_name=array();
$field_name[0]="td_pix_lat";
$field_name[1]="td_pix_lon";
$field_name[2]="td_pix_elev";
$field_name[3]="td_pix_rad";
$field_name[4]="td_pix_flux";
$field_name[5]="td_pix_temp";
$field_name[6]="td_img_id";
$field_name[7]="cc_id_load";
$field_name[8]="td_pix_loaddate";
$field_name[9]="td_pix_com";           
$field_value=array();
$field_value[0]=xml_get_ele($da_td_pix_pix_obj, "LAT");
$field_value[1]=xml_get_ele($da_td_pix_pix_obj, "LON");
$field_value[2]=xml_get_ele($da_td_pix_pix_obj, "ELEV");
$field_value[3]=xml_get_ele($da_td_pix_pix_obj, "RADIANCE");
$field_value[4]=xml_get_ele($da_td_pix_pix_obj, "HEATFLUX");
$field_value[5]=xml_get_ele($da_td_pix_pix_obj, "TEMPERATURE");
$field_value[6]=$da_td_img_img_obj['id'];
$field_value[7]=$cc_id_load;
$field_value[8]=$current_time;
$field_value[9]=xml_get_ele($da_td_pix_pix_obj, "COMMENTS");             
// INSERT values into database and write UNDO file
if (!v1_insert($undo_file_pointer, $insert_table, $field_name, $field_value, $upload_to_db, $last_insert_id, $error)) {
	$errors[$l_errors]=$error;
	$l_errors++;
	return FALSE;
}

?>