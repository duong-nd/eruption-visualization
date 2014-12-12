<?php

// Database functions
require_once("php/funcs/db_funcs.php");

// XML functions
require_once("php/funcs/xml_funcs.php");

// WOVOML 1.* functions
require_once("php/funcs/v1_funcs.php");

// Create "undo file" (if not a simulation)
if ($upload_to_db) {
	$undo_file_pointer=fopen($undo_file, "w");
	// If error when creating file
	if (!$undo_file_pointer) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2555;
		$errors[$l_errors]['message']="An error occurred when trying to create an undo file: ".$undo_file;
		$l_errors++;
		return FALSE;
	}
}

// Initialize variables
$select=array();
$db_ids=array();
$wovoml=&$xml_array[0]['value'];

// Start to write undowovoml file (if not a simulation)
if ($upload_to_db) {
	$line="<undowovoml>";
	if (!fwrite($undo_file_pointer, $line)) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2020;
		$errors[$l_errors]['message']="An error occurred when trying to write undo file";
		$l_errors++;
		return FALSE;
	}
}

// Loop on classes under <wovoml>
foreach ($wovoml as &$wovoml_ele) {
	switch ($wovoml_ele['tag']) {
		case "OBSERVATIONS":
			$ob_obj=&$wovoml_ele;
			include "ob.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "INFERREDPROCESSES":
			$ip_obj=&$wovoml_ele;
			include "ip.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "ERUPTIONS":
			$er_obj=&$wovoml_ele;
			include "er.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "MONITORINGSYSTEMS":
			$ms_obj=&$wovoml_ele;
			include "ms.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		case "DATA":
			$da_obj=&$wovoml_ele;
			include "da.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
	}
}

// Finish to write undowovoml file (if not a simulation)
if ($upload_to_db) {
	$line="\n</undowovoml>";
	if (!fwrite($undo_file_pointer, $line)) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2021;
		$errors[$l_errors]['message']="An error occurred when trying to write undo file";
		$l_errors++;
		return FALSE;
	}
}
	
// Close undo file (if not a simulation)
if ($upload_to_db) {
	if (!fclose($undo_file_pointer)) {
		// Error when closing file
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2556;
		$errors[$l_errors]['message']="An error occurred when trying to close undo file '".$undo_file."'";
		$l_errors++;
		return FALSE;
	}
}

?>