<?php

// vvv Set variables
$da_dd_srd_srd_key="dd_srd";
$da_dd_srd_srd_name="InSARPixel";

// ^^^ Get number
$number=xml_get_att($da_dd_srd_srd_obj, "NUMBER");

// -- CHECK DATA --

// ### Check pixel number value: must be > 0 and <= number of pixels
if ($number<1 || $number>$n_pixels) {
	// Error
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=2;
	$errors[$l_errors]['message']="In &lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt;, the number of an &lt;InSARPixel&gt; was ".$number." but it should be included between 1 and ".$n_pixels." ( &lt;numbOfRows&gt; * &lt;numbOfCols&gt; )";
	$l_errors++;
	return FALSE;
}


// -- CHECK DUPLICATION --

// ### Check duplication
if ($pixels_listed[$number]==TRUE) {
	// Duplication found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=7;
	$errors[$l_errors]['message']="In &lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt;, &lt;".$da_dd_srd_srd_name." number=\"".$number."\"&gt; is duplicated";
	$l_errors++;
	return FALSE;
}

// -- RECORD OBJECT --

// vvv Record object
$pixels_listed[$number]=TRUE;

// -- CHECK DATABASE --

// ### Check existing data in database
v1_check_db_insarpixel($da_dd_sar_sar_name, $da_dd_srd_srd_name, $code, $number, $final_owners);

// -- PREPARE DISPLAY --

// Increment data count (for display)
if (!isset($data_list[$da_dd_srd_srd_key])) {
	$data_list[$da_dd_srd_srd_key]=array();
	$data_list[$da_dd_srd_srd_key]['name']="InSAR image pixels";
	$data_list[$da_dd_srd_srd_key]['number']=0;
	$data_list[$da_dd_srd_srd_key]['sets']=array();
}
$data_list[$da_dd_srd_srd_key]['number']++;

?>