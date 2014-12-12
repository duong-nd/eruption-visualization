<?php

// vvv Set variables
$da_gd_smp_smp_spe_key="gd_smp_spe";
$da_gd_smp_smp_spe_name="GasSpecies";

// ^^^ Get type
$type=xml_get_att($da_gd_smp_smp_spe_obj, "TYPE");
$waterfree=xml_get_att($da_gd_smp_smp_spe_obj, "WATERFREE");

// -- CHECK DUPLICATION --

// ### Check duplication
$final_owners=$da_gd_smp_smp_spe_obj['results']['owners'];
if (!v1_check_dupli_species($da_gd_smp_smp_name, $da_gd_smp_smp_spe_name, $da_gd_smp_smp_spe_key, $code, $type, $waterfree, $final_owners, $dupli_error)) {
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
$data['waterfree']=$waterfree;
v1_record_obj($da_gd_smp_smp_spe_key, $code, $data);

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_species($da_gd_smp_smp_name, $da_gd_smp_smp_spe_name, $da_gd_smp_smp_spe_key, $code, $type, $waterfree, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_gd_smp_smp_spe_key])) {
	$data_list[$da_gd_smp_smp_spe_key]=array();
	$data_list[$da_gd_smp_smp_spe_key]['name']="Sampled gas species";
	$data_list[$da_gd_smp_smp_spe_key]['number']=0;
	$data_list[$da_gd_smp_smp_spe_key]['sets']=array();
}
$data_list[$da_gd_smp_smp_spe_key]['number']++;

// Get values for display
if (empty($units)) {
	$units=xml_get_ele($da_gd_smp_smp_spe_obj, "UNITS");
}
$species=xml_get_att($da_gd_smp_smp_spe_obj, "TYPE");
$waterfree=xml_get_att($da_gd_smp_smp_spe_obj, "WATERFREE");
$concentration=xml_get_ele($da_gd_smp_smp_spe_obj, "CONCENTRATION");
// Get "ultimate" species
if ($species=="CO2" && $waterfree=="N") {
	$ultimate_species="co2";
}
elseif ($species=="CO2" && $waterfree=="Y") {
	$ultimate_species="co2wf";
}
elseif ($species=="SO2" && $waterfree=="N") {
	$ultimate_species="so2";
}
elseif ($species=="SO2" && $waterfree=="Y") {
	$ultimate_species="so2wf";
}
elseif ($species=="H2S" && $waterfree=="N") {
	$ultimate_species="h2s";
}
elseif ($species=="H2S" && $waterfree=="Y") {
	$ultimate_species="h2swf";
}
elseif ($species=="HCl" && $waterfree=="N") {
	$ultimate_species="hcl";
}
elseif ($species=="HCl" && $waterfree=="Y") {
	$ultimate_species="hclwf";
}
elseif ($species=="HF" && $waterfree=="N") {
	$ultimate_species="hf";
}
elseif ($species=="HF" && $waterfree=="Y") {
	$ultimate_species="hfwf";
}
elseif ($species=="CH4" && $waterfree=="N") {
	$ultimate_species="ch4";
}
elseif ($species=="CH4" && $waterfree=="Y") {
	$ultimate_species="ch4wf";
}
elseif ($species=="H2" && $waterfree=="N") {
	$ultimate_species="h2";
}
elseif ($species=="H2" && $waterfree=="Y") {
	$ultimate_species="h2wf";
}
elseif ($species=="CO" && $waterfree=="N") {
	$ultimate_species="co";
}
elseif ($species=="CO" && $waterfree=="Y") {
	$ultimate_species="cowf";
}
elseif ($species=="3He4He") {
	$ultimate_species="ele3he4he";
}
elseif ($species=="d13C") {
	$ultimate_species="delta13c";
}
elseif ($species=="d34S") {
	$ultimate_species="delta34s";
}
elseif ($species=="d18O") {
	$ultimate_species="delta18o";
}
elseif ($species=="dD") {
	$ultimate_species="deltad";
}

$species_array[$ultimate_species]=$concentration;

?>