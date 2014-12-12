<?php

/******************************************************************************************************
*
* Package of functions doing operations on files
*
* file_upload: Function to upload a file on the server
* file_record: Function to record upload history of file in the database
*
******************************************************************************************************/

/******************************************************************************************************
* Function to upload a file on the server
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $input: the name of the input (type="file")
* 			- $dir: the target directory where file should be uploaded
* 			- $file_name: the target file name
* Output:	- $error: an error message
******************************************************************************************************/
function file_upload($input, $dir, $file_name, &$error) {
	// Initialize error message
	$error="";
	
	// Security
	if ($input=="" || $dir=="" || $file_name=="") {
		$error="Error in parameters given";
		return FALSE;
	}
	
	// Check input
	if (!isset($_FILES[$input])) {
		$error="File could not be found";
		return FALSE;
	}
	
	// Directory exists
	if (!file_exists($dir)) {
		$error="Destination directory doesn't exist";
		return FALSE;
	}
	
	// Set destination file + path
	$destination_file_path=$dir."/".$file_name;
	
	// Move the file to the server
	if (!move_uploaded_file($_FILES[$input]["tmp_name"], $destination_file_path)) {
		$error="File could not be moved to the server";
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to record upload history of file in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $file_name: the file name
* 			- $upload_type: I=In database, N=Not in database, U=Undone, T=Temporary, W=translated to WOVOML, F=Failed
* 			- $comment: a comment or error message
* 			- $load_time: the time this file was loaded
* 			- $cc_id_load: the loader ID
* InOutput:	- $errors: an error message
******************************************************************************************************/
function file_record($file_name, $upload_type, $comment, $load_time, $cc_id_load, &$errors) {
	// Initialize error message
	$errors="";
	
	// Security
	if ($file_name=="") {
		$errors="Error in parameters given";
		return FALSE;
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Insert values into cu (C15. Upload history) table
	$insert_table_name="cu";
	$insert_field_name=array();
	$insert_field_value=array();
	$insert_field_name[0]="cu_file";
	$insert_field_value[0]=$file_name;
	$insert_field_name[1]="cu_type";
	$insert_field_value[1]=$upload_type;
	$insert_field_name[2]="cu_loaddate";
	$insert_field_value[2]=$load_time;
	$insert_field_name[3]="cc_id_load";
	$insert_field_value[3]=$cc_id_load;
	$insert_field_name[4]="cu_com";
	$insert_field_value[4]=$comment;
	$cu_id=0;
	$insert_errors="";
	if (!db_insert($insert_table_name, $insert_field_name, $insert_field_value, FALSE, $cu_id, $insert_errors)) {
		// Database error
		switch ($insert_errors) {
			case "Error in the parameters given":
				$errors=$insert_errors." to db_insert()";
				return FALSE;
			default:
				$errors=$insert_errors;
				return FALSE;
		}
	}
	
	return TRUE;
}

?>