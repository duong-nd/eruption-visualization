<?php

/******************************************************************************************************
*
* Package of functions doing operations on WOVOML files
*
* wovoml_check: Main function for checking a WOVOML file (regardless the version)
* wovoml_upload: Main function for uploading (to WOVOdat DB) data contained in a WOVOML file (regardless the version) - no checking
* wovoml_undo: Main function for undo upload of data contained in a WOVOML file (regardless the version)
* wovoml_undo_insert: Function to do an 'insert' instruction from the automaton for undo upload of data
* wovoml_undo_update: Function to do an 'update' instruction from the automaton for undo upload of data
* wovoml_undo_delete: Function to do a 'delete' instruction from the automaton for undo upload of data
*
******************************************************************************************************/

/******************************************************************************************************
* Main function for checking a WOVOML file (regardless the version)
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_file: the XML file containing data to be uploaded to the database
* 			- $current_time: the time the file was uploaded
* 			- $developer: a boolean to tell if the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* 			- $check_pubdate: a boolean for checking publish dates or not
* Output:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function wovoml_check($xml_file, $current_time, $developer, $user_upload, $check_pubdate, &$warnings, &$errors, &$l_errors) {
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// Initialize errors message
	$errors=array();
	$l_errors=0;
	
	// Parse XML file and check if it is well-formed
	$_SESSION['upload']['xml_array']=array();
	$xml_array=&$_SESSION['upload']['xml_array'];
	
	$local_error=0;
	
	if (!xml_parse_v2($xml_file, $xml_array, $local_error)) {
		switch ($local_error) {
			case 1:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2000;
				$errors[$l_errors]['message']="An error occurred when trying to open the XML file";
				$l_errors++;
				break;
			case 2:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2001;
				$errors[$l_errors]['message']="An error occurred when trying to read the XML file";
				$l_errors++;
				break;
			case 3:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2002;
				$errors[$l_errors]['message']="An error occurred when trying to close the XML file";
				$l_errors++;
				break;
			case 4:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=5;
				$errors[$l_errors]['message']="The WOVOML file is not well-formed";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1001;
				$errors[$l_errors]['message']="An error occurred when parsing the WOVOML file";
				$l_errors++;
		}
		return FALSE;
	}
	
	// It is well-formed
	// Get version number
	$element=$xml_array[0];
	if ($element['tag']!="WOVOML") {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=6;
		$errors[$l_errors]['message']="Error on ".$element['tag'].". The root element must be 'wovoml'.";
		$l_errors++;
		return FALSE;
	}
	if (!array_key_exists('attributes', $element)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=6;
		$errors[$l_errors]['message']="Error on 'wovoml' element. Attribute 'version' is required.";
		$l_errors++;
		return FALSE;
	}
	$element_att=$element['attributes'];
	if (!array_key_exists('VERSION', $element_att)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=6;
		$errors[$l_errors]['message']="Error on 'wovoml' element. Attribute 'version' is required.";
		$l_errors++;
		return FALSE;
	}
	$version=$element_att['VERSION'];
	$_SESSION['upload']['version']=$version;
	
	// Depending on the version number, call the correct function to check data
	switch ($version) {
		case "0.1":
		case "0.2":
			// WOVOML version 0.* functions
			require_once "php/funcs/v0_funcs.php";
			// Check WOVOML
			if (!v0_check($xml_file, $version, $current_time, $developer, $user_upload, $check_pubdate, $xml_array, $warnings, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "1.1.0":
			include "php/include/check_file/1.1.0/wovoml.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		default:
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=6;
			$errors[$l_errors]['message']="Error on attribute 'version' of 'wovoml' element. This is not a correct version.";
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Main function for uploading (to WOVOdat DB) data contained in a WOVOML file (regardless the version) - no checking
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $undo_file: the file which is going to contain information for possible undo of upload
* 			- $cc_id_load: the loader ID (pointing on 'cc_id' in 'cc' table in the database)
* 			- $current_time: the time the file was uploaded
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* Output:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function wovoml_upload($undo_file, $cc_id_load, $current_time, $cb_ids, $upload_to_db, &$errors, &$l_errors) {
	
	// Get variables stored in session
	$xml_array=$_SESSION['upload']['xml_array'];
	$version=$_SESSION['upload']['version'];
	
	// Depending on the version number, call the correct function to upload data
	switch ($version) {
		case "0.1":
		case "0.2":
			// WOVOML version 0.* functions
			require_once "php/funcs/v0_funcs.php";
			// Upload WOVOML data
			if (!v0_upload($xml_array, $undo_file, $cc_id_load, $current_time, $cb_ids, $upload_to_db, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "1.1.0":
			include "php/include/upload_file/1.1.0/wovoml.php";
			if (!empty($errors)) {
				return FALSE;
			}
			break;
		default:
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=6;
			$errors[$l_errors]['message']="Error on attribute 'version' of 'wovoml' element. This is not a correct version.";
			$l_errors++;
			return FALSE;
	}
	
	unset($_SESSION['upload']);
	return TRUE;
}

/******************************************************************************************************
* Main function for undo upload of data contained in a WOVOML file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_file: the XML file containing information for undo upload of data to the database
* Output:	- $error: an error message
******************************************************************************************************/
function wovoml_undo($xml_file, &$error) {
	// Initialize error message
	$error="";

	// XML functions
	require_once("php/funcs/xml_funcs.php");
	
	// Parse XML file
	$xml_array=array();
	$local_error=0;
	
	if (!xml_parse_v2($xml_file, $xml_array, $local_error)) {
		switch ($local_error) {
			case 1:
				$error="2- An error occurred when trying to open the undowovoml file";
				break;
			case 2:
				$error="2- An error occurred when trying to read the undowovoml file";
				break;
			case 3:
				$error="2- An error occurred when trying to close the undowovoml file";
				break;
			case 4:
				$error="1- The undowovoml file is not well-formed";
				break;
			default:
				$error="1- An error occurred when parsing the undowovoml file";
		}
		return FALSE;
	}
	
	// Get instructions
	$instructions=$xml_array[0]['value'];

//	if (trim($instructions[0])=="") {    //??????????????
	if (!$instructions[0]) {
		$l_instructions=0;
	}
	else {
		$l_instructions=count($instructions);
	}

	
	// Loop on instructions
	for ($i=$l_instructions-1; $i>=0; $i--) {
		// Local variable
		$instruction=$instructions[$i];
		
		// Depending on the instruction, call the corresponding function
		switch ($instruction['tag']) {
			case "INSERT":
				$local_error="";
				if (!wovoml_undo_insert($instruction, $local_error)) {
					$error=$local_error." // wovoml_undo() - wovoml_undo_insert() 1";
					return FALSE;
				}
				break;
			case "UPDATE":
				$local_error="";
				if (!wovoml_undo_update($instruction, $local_error)) {
					$error=$local_error." // wovoml_undo() - wovoml_undo_update() 1";
					return FALSE;
				}
				break;
			case "DELETE":
				$local_error="";
				if (!wovoml_undo_delete($instruction, $local_error)) {
					$error=$local_error." // wovoml_undo() - wovoml_undo_delete() 1";
					return FALSE;
				}
				break;
			default:
				$error="1- Instruction in undowovoml file '".$xml_file."' could not be recognized: ".$instruction['tag'];
				return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do an 'insert' instruction from the automaton for undo upload of data
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'insert' instruction from the undowovoml file
* Output:	- $error: an error message
******************************************************************************************************/
function wovoml_undo_insert($instruction, &$error) {
	// Local variables
	$error="";
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Get table
	$table=$parameters[0];
	if ($table['tag']!='TABLE') {
		$error="1- The first element of an 'insert' instruction was not 'table' but '".$table['tag']."'";
		return FALSE;
	}
	$insert_table=$table['value'][0];
	
	// Get fields and values
	$field_name=array();
	$field_value=array();
	// Loop on (field, value) couples
	for ($i=1; $i<$l_parameters; $i+=2) {
		// Enter field and value in array for calling db_insert later
		$field_name[($i-1)/2]=$parameters[$i]['value'][0];
		$field_value[($i-1)/2]=$parameters[$i+1]['value'][0];
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Send query to database
	$last_insert_id=0;
	$local_error="";
	if (!db_insert($insert_table, $field_name, $field_value, FALSE, $last_insert_id, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$error="1- ".$local_error." // wovoml_undo_insert() - db_insert() 1";
				break;
			default:
				$error="4- ".$local_error." // wovoml_undo_insert() - db_insert() 2";
		}
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do an 'update' instruction from the automaton for undo upload of data
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'update' instruction from the undowovoml file
* Output:	- $error: an error message
******************************************************************************************************/
function wovoml_undo_update($instruction, &$error) {
	// Local variables
	$error="";
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Get table
	$table=$parameters[0];
	if ($table['tag']!='TABLE') {
		$error="1- The first element of an 'update' instruction was not 'table' but '".$table['tag']."'";
		return FALSE;
	}
	$update_table=$table['value'][0];
	
	// Get fields and values
	$field_name=array();
	$field_value=array();
	// Loop on (field, value) couples
	for ($i=1; $i<$l_parameters-1; $i+=2) {
		// Enter field name and value in array for calling db_update later
		$field_name[($i-1)/2]=$parameters[$i]['value'][0];
		$field_value[($i-1)/2]=$parameters[$i+1]['value'][0];
	}
	
	// Get where conditions
	$where=$parameters[$l_parameters-1];
	if ($where['tag']!='WHERE') {
		$error="1- The last element of an 'update' instruction was not 'where' but '".$where['tag']."'";
		return FALSE;
	}
	
	// Loop on where conditions
	$where_conditions=$where['value'];
	$l_where_conditions=count($where_conditions);
	$where_field_name=array();
	$where_field_value=array();
	// Each condition goes by 2 tags (field, value)
	for ($i=0; $i<$l_where_conditions; $i+=2) {
		// Enter field name and value in array for calling db_update later
		$where_field_name[$i/2]=$where_conditions[$i]['value'][0];
		$where_field_value[$i/2]=$where_conditions[$i+1]['value'][0];
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Send query to database
	$local_error="";
	if (!db_update($update_table, $field_name, $field_value, $where_field_name, $where_field_value, FALSE, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$error="1- ".$local_error." // wovoml_undo_update() - db_update() 1";
				break;
			default:
				$error="2- ".$local_error." // wovoml_undo_update() - db_update() 2";
		}
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'delete' instruction from the automaton for undo upload of data
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'delete' instruction from the undowovoml file
* Output:	- $error: an error message
******************************************************************************************************/
function wovoml_undo_delete($instruction, &$error) {
	// Local variables
	$error="";
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Check number of parameters
	if ($l_parameters!=2) {
		$error="1- A 'delete' instruction had more or less than 2 parameters";
		return FALSE;
	}
	
	// Get table
	$table=$parameters[0];
	if ($table['tag']!='TABLE') {
		$error="1- The first element of a 'delete' instruction was not 'table' but '".$table['tag']."'";
		return FALSE;
	}
	$delete_table=$table['value'][0];
	
	// Get where conditions
	$where=$parameters[1];
	if ($where['tag']!='WHERE') {
		$error="1- The last element of a 'delete' instruction was not 'where' but '".$where['tag']."'";
		return FALSE;
	}
	
	// Loop on where conditions
	$where_conditions=$where['value'];
	$l_where_conditions=count($where_conditions);
	$where_field_name=array();
	$where_field_value=array();
	$logical=array();
	// Each condition goes by 2 tags (field, value)
	for ($i=0; $i<$l_where_conditions; $i+=2) {
		// Enter value in array of where values
		$where_field_name[$i/2]=$where_conditions[$i]['value'][0];
		$where_field_value[$i/2]=$where_conditions[$i+1]['value'][0];
		if ($i!=0) {
			$logical[($i-2)/2]="AND";
		}
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Send query to database
	$local_error="";
	if (!db_delete($delete_table, $where_field_name, $where_field_value, $logical, FALSE, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$error="1- ".$local_error." // wovoml_undo_delete() - db_delete() 1";
				break;
			case "Error in logical operators given":
				$error="1- ".$local_error." // wovoml_undo_delete() - db_delete() 2";
				break;
			default:
				$error="4- ".$local_error." // wovoml_undo_delete() - db_delete() 3";
		}
		return FALSE;
	}
	
	return TRUE;
}

?>