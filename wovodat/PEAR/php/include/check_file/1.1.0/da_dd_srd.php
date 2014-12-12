<?php

// -- CHECK DATA --

// ^^^ Get number of rows
$n_rows=xml_get_ele($da_dd_sar_sar_obj, "NUMBOFROWS");

// ^^^ Get number of columns
$n_cols=xml_get_ele($da_dd_sar_sar_obj, "NUMBOFCOLS");

// ^^^ Get number of pixels
$n_pixels=count($da_dd_srd_obj['value']);

// ^^^ Get theoritical number of pixels
$n_theo_pixels=$n_rows*$n_cols;

// ### Check number of pixels
if ($n_pixels!=$n_theo_pixels) {
	// Error
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=2;
	$errors[$l_errors]['message']="In &lt;".$da_dd_sar_sar_name." code=\"".$code."\"&gt;, the number of &lt;InSARPixel&gt; elements is not equal to ( &lt;numbOfRows&gt; * &lt;numbOfCols&gt; )";
	$l_errors++;
	return FALSE;
}

// -- CHECK CHILDREN --

$pixels_listed=array();
// ### Check children
foreach ($da_dd_srd_obj['value'] as &$da_dd_srd_ele) {
	switch ($da_dd_srd_ele['tag']) {
		case "INSARPIXEL":
			$da_dd_srd_srd_obj=&$da_dd_srd_ele;
			include "da_dd_srd_srd.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}
unset($pixels_listed);

?>