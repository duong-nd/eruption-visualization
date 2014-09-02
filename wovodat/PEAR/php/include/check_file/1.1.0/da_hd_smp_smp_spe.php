<?php

// vvv Set variables
$da_hd_smp_smp_spe_key="hd_smp_spe";
$da_hd_smp_smp_spe_name="HydrologicSpecies";

// ^^^ Get type
$type=xml_get_att($da_hd_smp_smp_spe_obj, "TYPE");

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_hd_smp_smp_spe_obj['results']['owners'];
if (!v1_check_dupli_species($da_hd_smp_smp_name, $da_hd_smp_smp_spe_name, $da_hd_smp_smp_spe_key, $code, $type, NULL, $final_owners, $dupli_error)) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']=$dupli_error;
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// vvv Record object
$data=array();
$data['owners']=$final_owners;
$data['type']=$type;
v1_record_obj($da_hd_smp_smp_spe_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_species($da_hd_smp_smp_name, $da_hd_smp_smp_spe_name, $da_hd_smp_smp_spe_key, $code, $type, NULL, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_hd_smp_smp_spe_key])) {
	$data_list[$da_hd_smp_smp_spe_key]=array();
	$data_list[$da_hd_smp_smp_spe_key]['name']="Sampled hydrologic species";
	$data_list[$da_hd_smp_smp_spe_key]['number']=0;
	$data_list[$da_hd_smp_smp_spe_key]['sets']=array();
}
$data_list[$da_hd_smp_smp_spe_key]['number']++;

?>