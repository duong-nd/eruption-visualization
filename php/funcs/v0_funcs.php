<?php

/******************************************************************************************************
*
* Package of functions doing operations for WOVOML version 0.* files
*
* v0_check: Main function for checking data contained in a WOVOML version 0.* file
* v0_upload: Main function for uploading to WOVOdat data contained in a WOVOML version 0.* file
* v0_get_header: Function to get information contained in header (LoadingInfo) of a WOVOML version 0.* file
* v0_check_data: Function to check data in a WOVOML version 0.* file
* v0_check_data_list: Function to check data in a list
* v0_check_data_class_group: Function to check data in a class with type 'group'
* v0_check_data_class_simple_loc: Function to check data in a class with type 'simple' or 'listOfClasses'
* v0_check_link: Function to check a link
* v0_check_owner_code: Function to check a link towards a contact
* v0_check_volcano_code: Function to check a link towards a volcano
* v0_check_link_simple: Function to check a simple link
* v0_check_link_simple_xml: Function to find a simple referenced object in same WOVOML file
* v0_check_link_before: Function to check a link with 'before' conditions on time
* v0_check_link_before_xml: Function to find a referenced object with 'before' conditions on time in same WOVOML file
* v0_check_link_include: Function to check a link with 'include1' and 'include2' conditions on time
* v0_check_link_include_xml: Function to find a referenced object with 'include1' and 'include2' conditions on time in same WOVOML file
* v0_check_time: Function to check a time element of a class
* v0_check_time_order: Function to check that the time of an element is indeed earlier than the time of a parent's element
* v0_check_time_before: Function to check that the time of an element is indeed earlier than the time of a parent's element
* v0_check_time_include: Function to check that the time of an element is indeed included within the timeframe of parent's elements
* v0_check_time_rsam_ssam: Function to check that the time RSAM-SSAM objects are correct
* v0_check_value: Function to check the relationship between values of elements in a class
* v0_check_pixels: Function to check the pixels of a list
* v0_prepare_data: Function to do a 'prepareData' instruction contained in a WOVOML version 0.* file
* v0_prepare_pubdate: Function to do get the publish date; function used for uploading data contained in a WOVOML version 0.* file
* v0_prepare_pubdate_no_limit: Function to do get the publish date; function used for uploading data contained in a WOVOML version 0.* file
* v0_prepare_microseconds: Function to do get the microseconds from a datetime string; function used for uploading data contained in a WOVOML version 0.* file
* v0_prepare_event_flag: Function to do get the event flag; function used for uploading data contained in a WOVOML version 0.* file
* v0_ul_data: Function to upload to WOVOdat data contained in a WOVOML version 0.* file
* v0_ul_class_simple: Function to upload to WOVOdat data contained in a class with type 'simple'
* v0_ul_class_loc: Function to upload to WOVOdat data contained in a class with type 'listOfClasses'
* v0_ul_class_group: Function to upload to WOVOdat data contained in a class with type 'group'
* v0_ul_list: Function to upload to WOVOdat data contained in a list of a WOVOML version 0.* file
* v0_ul_instructions: Function to do the instructions from the automaton for uploading data contained in a WOVOML version 0.* file
* v0_ul_insert: Function to do an 'insert' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* v0_ul_select: Function to do a 'select' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* v0_ul_update: Function to do an 'update' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* v0_ul_delete: Function to do a 'delete' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* v0_ul_check: Function to do a 'check' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* v0_ul_get_general: Function to get a 'general' value contained in a WOVOML version 0.* file
* v0_ul_get_parent: Function to get the current value or the one of a parent of an element contained in a WOVOML version 0.* file
* v0_ul_get_element: Function to get the value of an element contained in a WOVOML version 0.* file
* v0_ul_get_select: Function to get a previously selected value from WOVOdat
* v0_ul_get_attribute: Function to get the value of the attribute of an element contained in a WOVOML version 0.* file
* v0_ul_get_result: Function to get a previously "calculated" value
*
******************************************************************************************************/

/******************************************************************************************************
* Main function for checking data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_file: the XML file containing data to be uploaded to the database
* 			- $version: the version (0.*) of the WOVOML file
* 			- $current_time: the time the file was uploaded
* 			- $developer: a boolean to tell if the loader is a developer (TRUE = developer)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* 			- $check_pubdate: a boolean for checking publish dates or not (TRUE = check publish dates)
* InOutput:	- $xml_array: an array of WOVOML values
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check($xml_file, $version, $current_time, $developer, $user_upload, $check_pubdate, &$xml_array, &$warnings, &$errors, &$l_errors) {
	
	// XML functions
	require_once "php/funcs/xml_funcs.php";
	
	// Depending on WOVOML version, get different schema
	switch ($version) {
		case "0.1":
		case "0.2":
			// Check if XML file is valid against schema and display possible errors
			$xml_schema='/home/wovodat/PEAR/php/auto/wovoml-wovodat/'.$version.'/WOVOML_schema.xsd';
			break;
		default:
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=6;
			$errors[$l_errors]['message']="Error on attribute 'version' of 'wovoml' element. This is not a correct version.";
			$l_errors++;
			return FALSE;
	}
	
	// Check if XML file is valid against schema and display possible errors
	$local_errors=array();
	$l_local_errors=0;
	if (!xml_validate($xml_file, $xml_schema, $local_errors, $l_local_errors)) {
		for ($i=0; $i<$l_local_errors; $i++) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=6;
			$errors[$l_errors]['message']=$local_errors[$i];
			$l_errors++;
		}
		return FALSE;
	}
	
	// Get header's information
	$load_info=$xml_array[0]['value'][0];
	// cc_id
	$_SESSION['upload']['gen_cc_id']=NULL;
	$gen_cc_id=&$_SESSION['upload']['gen_cc_id'];
	// cc_code
	$_SESSION['upload']['gen_cc_code']=NULL;
	$gen_cc_code=&$_SESSION['upload']['gen_cc_code'];
	// vd_id
	$_SESSION['upload']['gen_vd_id']=NULL;
	$gen_vd_id=&$_SESSION['upload']['gen_vd_id'];
	// vd_code
	$_SESSION['upload']['gen_vd_code']=NULL;
	$gen_vd_code=&$_SESSION['upload']['gen_vd_code'];
	// gen_pub_date
	$_SESSION['upload']['gen_pub_date']=NULL;
	$gen_pub_date=&$_SESSION['upload']['gen_pub_date'];
	// Get header's information
	if (!v0_get_header($load_info, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $errors, $l_errors)) {
		return FALSE;
	}
	
	// If loader is not a developer
	if (!$developer) {
		// Check permission for general owner
		// Local variable
		$found=FALSE;
		// Loop on array of users who permitted user to upload data for them
		for ($i=0; $i<count($user_upload['id']); $i++) {
			if ($gen_cc_id!=$user_upload['id'][$i]) {
				continue;
			}
			// User found in the list
			$found=TRUE;
			break;
		}
		// Check boolean
		if (!$found) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=3;
			$errors[$l_errors]['message']="You do not have the rights to upload for the owner with code '".$gen_cc_code."'. If you wish to be granted this permission, please contact them directly.";
			$l_errors++;
			return FALSE;
		}
	}
	
	// Depending on WOVOML version, get different automaton file
	switch ($version) {
		case "0.1":
		case "0.2":
			// Automaton file: WOVOML to WOVOdat
			$auto_file="/home/wovodat/PEAR/php/auto/wovoml-wovodat/".$version."/WOVOMLToWOVOdat.xml";
			break;
		default:
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=6;
			$errors[$l_errors]['message']="Error on attribute 'version' of 'wovoml' element. This is not a correct version.";
			$l_errors++;
			return FALSE;
	}
	
	// Parse automaton
	$_SESSION['upload']['auto_array']=array();
	$auto_array=&$_SESSION['upload']['auto_array'];
	$local_errors=0;
	if (!xml_parse_v2($auto_file, $auto_array, $local_errors)) {
		switch ($local_errors) {
			case 1:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2666;
				$errors[$l_errors]['message']="An error occurred when trying to open WOVOMLToWOVOdat.xml automaton file";
				$l_errors++;
				break;
			case 2:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2667;
				$errors[$l_errors]['message']="An error occurred when trying to read WOVOMLToWOVOdat.xml automaton file";
				$l_errors++;
				break;
			case 3:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2668;
				$errors[$l_errors]['message']="An error occurred when trying to close WOVOMLToWOVOdat.xml automaton file";
				$l_errors++;
				break;
			case 4:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1668;
				$errors[$l_errors]['message']="WOVOMLToWOVOdat.xml automaton file is not well-formed";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1669;
				$errors[$l_errors]['message']="An error occurred when parsing WOVOMLToWOVOdat.xml automaton file";
				$l_errors++;
		}
		return FALSE;
	}
	
	// Check data
	if (!v0_check_data($auto_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, $xml_array, $warnings, $errors, $l_errors)) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Main function for uploading to WOVOdat data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_array: an array containing data from a WOVOML version 0.* file
* 			- $undo_file: the file which is going to contain information for possible undo of upload
* 			- $cc_id_load: the loader ID (pointing on 'cc_id' in 'cc' table in the database)
* 			- $current_time: the time the file was uploaded
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_upload($xml_array, $undo_file, $cc_id_load, $current_time, $cb_ids, $upload_to_db, &$errors, &$l_errors) {
	
	// Get variables stored in session
	$gen_cc_id=$_SESSION['upload']['gen_cc_id'];
	$gen_vd_id=$_SESSION['upload']['gen_vd_id'];
	$gen_pub_date=$_SESSION['upload']['gen_pub_date'];
	$auto_array=$_SESSION['upload']['auto_array'];
	
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
	
	// Upload data
	if (!v0_ul_data($xml_array, $auto_array, $undo_file_pointer, $gen_vd_id, $gen_cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $errors, $l_errors)) {
		return FALSE;
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
	
	return TRUE;
}

/******************************************************************************************************
* Function to check if there is any duplicated data in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $load_info: loading info class from a WOVOML version 0.* file
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $gen_cc_id: the general owner ID (cc_id)
* 			- $gen_cc_code: the general owner code (cc_code)
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $gen_vd_code: the general volcano CAVW number (vd_inf_cavw)
* 			- $gen_pub_date: the general publish date
******************************************************************************************************/
function v0_get_header($load_info, &$gen_cc_id, &$gen_cc_code, &$gen_vd_id, &$gen_vd_code, &$gen_pub_date, &$errors, &$l_errors) {
	
	// Security
	if ($load_info['tag']!="LOADINGINFO") {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1500;
		$errors[$l_errors]['message']="Wrong parameter given to v0_get_header";
		$l_errors++;
	}
	
	// Local variables
	$load_info_elements=$load_info['value'];
	$l_load_info_elements=count($load_info_elements);
	
	// Loop on elements
	for ($i=0; $i<$l_load_info_elements; $i++) {
		if ($load_info_elements[$i]['tag']=="OWNERCODE") {
			// Owner code found
			$gen_cc_code=$load_info_elements[$i]['value'][0];
		}
		if ($load_info_elements[$i]['tag']=="VOLCANOCODE") {
			// Volcano code found
			$gen_vd_code=$load_info_elements[$i]['value'][0];
		}
		if ($load_info_elements[$i]['tag']=="PUBDATE") {
			// Publish date found
			$gen_pub_date=$load_info_elements[$i]['value'][0];
		}
	}
	
	// Database functions
	require_once "php/funcs/db_funcs.php";
	
	// Get general owner cc_id
	if ($gen_cc_code!=NULL) {
		// Get cc_id
		$table_name='cc';
		$field_name=array();
		$field_value=array();
		$field_name[0]='cc_id';
		$where_field_name=array();
		$where_field_comp=array();
		$where_field_value=array();
		$where_logical=array();
		$where_field_name[0]='cc_code';
		$where_field_comp[0]='=';
		$where_field_value[0]=$gen_cc_code;
		$where_logical[0]='OR';
		$where_field_name[1]='cc_code2';
		$where_field_comp[1]='=';
		$where_field_value[1]=$gen_cc_code;
		$local_error="";
		if (!db_select_ext($table_name, $field_name, $where_field_name, $where_field_comp, $where_field_value, $where_logical, $field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1003;
					$errors[$l_errors]['message']=$local_error." to db_select()";
					$l_errors++;
					break;
				default:
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=4000;
					$errors[$l_errors]['message']=$local_error;
					$l_errors++;
			}
			return FALSE;
		}
		$l_field_value=count($field_value);
		if ($l_field_value>1) {
			// Only 1 result should be found
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1096;
			$errors[$l_errors]['message']="Multiple rows in the cc table correspond to this cc_code: '".$gen_cc_code."'";
			$l_errors++;
			return FALSE;
		}
		elseif ($l_field_value==0) {
			// Only 1 result should be found
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=9;
			$errors[$l_errors]['message']="ownerCode with value '".$gen_cc_code."' from 'LoadingInfo' class could not be found in the database";
			$l_errors++;
			return FALSE;
		}
		$gen_cc_id=$field_value[0][0];
	}
	
	// Get general vd_id
	if ($gen_vd_code!=NULL) {
		$field_name=array();
		$where_field_name=array();
		$where_field_value=array();
		$field_value=array();
		$field_name[0]='vd_id';
		$where_field_name[0]='vd_inf_cavw';
		$where_field_value[0]=$gen_vd_code;
		$local_error="";
		if (!db_select('vd_inf', $field_name, $where_field_name, $where_field_value, $field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1015;
					$errors[$l_errors]['message']=$local_error." to db_select()";
					$l_errors++;
					break;
				default:
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=4006;
					$errors[$l_errors]['message']=$local_error;
					$l_errors++;
			}
			return FALSE;
		}
		$l_field_value=count($field_value);
		if ($l_field_value>1) {
			// Only 1 result should be found
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1099;
			$errors[$l_errors]['message']="Multiple rows in the vd_inf table correspond to this CAVW number: '".$gen_vd_code."'";
			$l_errors++;
			return FALSE;
		}
		elseif ($l_field_value==0) {
			// Only 1 result should be found
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=9;
			$errors[$l_errors]['message']="volcanoCode with value '".$gen_vd_code."' from 'LoadingInfo' class could not be found in the database";
			$l_errors++;
			return FALSE;
		}
		$gen_vd_id=$field_value[0][0];
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check data in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $auto: an array containing the automaton values
* 			- $gen_cc_id: the general owner ID
* 			- $gen_cc_code: the general owner code
* 			- $gen_vd_id: the general volcano ID
* 			- $gen_vd_code: the general volcano code
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the time of upload
* 			- $check_pubdate: a boolean for checking publish dates or not (TRUE = check publish dates)
* InOutput:	- $wovoml: an array of WOVOML values
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_data($auto, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, &$wovoml, &$warnings, &$errors, &$l_errors) {
	// Get session variables
	// Answer by user to specify reference
	if (!isset($_SESSION['upload']['answer'])) {
		$_SESSION['upload']['answer']=NULL;
	}
	$answer=&$_SESSION['upload']['answer'];
	// Array of flags to know which classes were already checked
	if (!isset($_SESSION['upload']['checked'])) {
		$_SESSION['upload']['checked']=array();
	}
	$checked=&$_SESSION['upload']['checked'];
	// Array of classes already checked
	if (!isset($_SESSION['upload']['wovoml_classes'])) {
		$_SESSION['upload']['wovoml_classes']=array();
	}
	$wovoml_classes=&$_SESSION['upload']['wovoml_classes'];
	
	// Object counter
	$cnt_obj=0;
	
	// Loop on each class of wovoml... except loading info
	$classes=&$wovoml[0]['value'];
	$l_classes=count($classes);
	$auto_classes=$auto[0]['value'];
	$l_auto_classes=count($auto_classes);
	for ($i=1; $i<$l_classes; $i++) {
		// If already checked, continue
		if (isset($checked[$cnt_obj]) && $checked[$cnt_obj]==TRUE) {
			$cnt_obj++;
			continue;
		}
		
		// Local variable
		$class=&$classes[$i];
		$class_name=$class['tag'];
		
		// Find automaton instructions for this class
		for ($j=0; $j<$l_auto_classes; $j++) {
			// Local variables
			$auto_class=$auto_classes[$j];
			
			// If not the right class, continue
			if (strtoupper($auto_class['attributes']['NAME'])!=$class_name) {
				continue;
			}
			
			// Get type of class
			if ($auto_class['tag']=="LIST") {
				// Call v0_check_data_list
				if (!v0_check_data_list($auto_class, $class, $developer, $user_upload, $answer, $errors, $l_errors)) {
					return FALSE;
				}
			}
			else {
				switch ($auto_class['attributes']['TYPE']) {
					case "simple":
					case "listOfClasses":
						// Call v0_check_data_class_simple_loc
						if (!v0_check_data_class_simple_loc($auto_class, NULL, $cnt_obj, $wovoml, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, $class, $checked, $wovoml_classes, $answer, $warnings, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case "group":
						// Call v0_check_data_class_group
						if (!v0_check_data_class_group($auto_class, $cnt_obj, $wovoml, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, $class, $checked, $wovoml_classes, $answer, $warnings, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					default:
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1399;
						$errors[$l_errors]['message']="A type of class in WOVOMLToWOVOdat.xml could not be recognized: ".$auto_class['attributes']['TYPE'];
						$l_errors++;
						return FALSE;
				}
			}
			break;
		}
		
		// Flag: class already checked
		$checked[$cnt_obj]=TRUE;
		$class['xml_id']=$cnt_obj;
		$cnt_obj++;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check data in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $elements: elements of a class from a WOVOML version 0.* file
* 			- $gen_cc_id: the general owner ID (cc_id)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_data_list($auto_list, $list, $developer, $user_upload, &$answer, &$errors, &$l_errors) {
	// Get elements of list
	$elements=$list['value'];
	$l_elements=count($elements);
	
	// Get "check data" instructions
	$check_data=$auto_list['value'][0];
	if ($check_data['tag']!="CHECKDATA") {
		// Error: the 1st instruction of a list in WOVOMLToWOVOdat.xml should be "checkData"
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1400;
		$errors[$l_errors]['message']="The first instruction of a list in WOVOMLToWOVOdat.xml was not 'checkData' but '".$check_data['tag']."'";
		$l_errors++;
		return FALSE;
	}
	$instructions=$check_data['value'];
	$l_instructions=count($instructions);
	
	// Loop on elements of list
	for ($i=0; $i<$l_elements; $i++) {
		// Local variable
		$element=$elements[$i];
		
		// Loop on instructions
		for ($j=0; $j<$l_instructions; $j++) {
			// Local variable
			$instruction=$instructions[$j];
			
			// Call corresponding function
			switch ($instruction['tag']) {
				case "CHECKLINK":
					if (!v0_check_link($instruction, TRUE, NULL, NULL, NULL, NULL, NULL, $developer, $user_upload, $element, $answer, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Error: an instruction in checkData could not be recognized
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1401;
					$errors[$l_errors]['message']="An instruction in checkData could not be recognized: ".$instruction['tag'];
					$l_errors++;
					return FALSE;
			}
		}
		
		// Check duplication of element in the list
		for ($j=0; $j<$i; $j++) {
			if ($element['value']==$elements[$j]['value']) {
				// Error: duplication
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=7;
				$errors[$l_errors]['message']="Element '".$element['tag']."' with value '".$element['value']."' was found to be duplicated in list '".$list['tag']."'";
				$l_errors++;
				return FALSE;
			}
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check data in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $elements: elements of a class from a WOVOML version 0.* file
* 			- $gen_cc_id: the general owner ID (cc_id)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_data_class_group($auto_class, $cnt_class, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, &$class, &$checked, &$wovoml_classes, &$answer, &$warnings, &$errors, &$l_errors) {
	// Get elements of class
	$elements=&$class['value'];
	$l_elements=count($elements);
	// Get elements of auto_class
	$auto_elements=$auto_class['value'];
	$l_auto_elements=count($auto_elements);
	
	// Object counter
	$cnt_obj=0;
	
	// Loop on elements
	for ($i=0; $i<$l_elements; $i++) {
		// If already checked, continue
		$cnt_tot=$cnt_class.".".$cnt_obj;
		if (isset($checked[$cnt_tot]) && $checked[$cnt_tot]==TRUE) {
			$cnt_obj++;
			continue;
		}
		
		// Local variable
		$element=&$elements[$i];
		$element_name=$element['tag'];
		
		// Find automaton instructions for this class
		for ($j=0; $j<$l_auto_elements; $j++) {
			// Local variables
			$auto_element=$auto_elements[$j];
			
			// If not the right class, continue
			if (strtoupper($auto_element['attributes']['NAME'])!=$element_name) {
				continue;
			}
			
			// Get type of class
			if ($auto_element['tag']=="LIST") {
				// Call v0_check_data_list
				if (!v0_check_data_list($auto_element, $element, $developer, $user_upload, $answer, $errors, $l_errors)) {
					return FALSE;
				}
			}
			else {
				switch ($auto_element['attributes']['TYPE']) {
					case "simple":
					case "listOfClasses":
						// Call v0_check_data_class_simple_loc
						if (!v0_check_data_class_simple_loc($auto_element, $class, $cnt_tot, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, $element, $checked, $wovoml_classes, $answer, $warnings, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case "group":
						// Call v0_check_data_class_group
						if (!v0_check_data_class_group($auto_element, $cnt_tot, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, $element, $checked, $wovoml_classes, $answer, $warnings, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					default:
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1399;
						$errors[$l_errors]['message']="A type of class in WOVOMLToWOVOdat.xml could not be recognized: ".$auto_element['attributes']['TYPE'];
						$l_errors++;
						return FALSE;
				}
			}
			break;
		}
		
		// Flag: class already checked
		$checked[$cnt_tot]=TRUE;
		$element['xml_id']=$cnt_tot;
		$cnt_obj++;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check data in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $elements: elements of a class from a WOVOML version 0.* file
* 			- $gen_cc_id: the general owner ID (cc_id)
* 			- $user_upload: an array of name and id of users for whom the loader can upload data
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_data_class_simple_loc($auto_class, $parent, $cnt_class, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, &$class, &$checked, &$wovoml_classes, &$answer, &$warnings, &$errors, &$l_errors) {
	// Get elements of class
	$elements=&$class['value'];
	$l_elements=count($elements);
	// Get elements of auto_class
	$auto_elements=$auto_class['value'];
	$l_auto_elements=count($auto_elements);
	
	// Get "checkData" instructions
	$check_data=$auto_class['value'][0];
	if ($check_data['tag']!="CHECKDATA") {
		// Error: the 1st instruction of a list in WOVOMLToWOVOdat.xml should be "checkData"
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1400;
		$errors[$l_errors]['message']="The first instruction of a list in WOVOMLToWOVOdat.xml was not 'checkData' but '".$check_data['tag']."'";
		$l_errors++;
		return FALSE;
	}
	$instructions=$check_data['value'];
	
	// If there is no instruction
	if (!is_array($instructions[0])) {
		$l_instructions=0;
	}
	else {
		$l_instructions=count($instructions);
	}
	
	// If class is "SeismicNetwork"
	$is_reference=FALSE;
	if ($class['tag']=="SEISMICNETWORK") {
		// Check if this is a reference
		$is_reference=TRUE;
		for ($i=0; $i<$l_elements; $i++) {
			if ($elements[$i]['type']=="complete") {
				$is_reference=FALSE;
				break;
			}
		}
	}
	
	// If not a reference
	if (!$is_reference) {
		// Loop on checkData instructions
		for ($i=0; $i<$l_instructions; $i++) {
			// Local variable
			$instruction=$instructions[$i];
			
			// Depending on instruction
			switch ($instruction['tag']) {
				case "CHECKLINK":
					// Call v0_check_link
					if (!v0_check_link($instruction, FALSE, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $developer, $user_upload, $class, $answer, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "CHECKTIME":
					// Call v0_check_time
					if (!v0_check_time($instruction, $class, $parent, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "CHECKVALUE":
					// Call v0_check_value
					if (!v0_check_value($instruction, $class, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "CHECKPIXELS":
					// Call v0_check_pixels
					if (!v0_check_pixels($instruction, $class, $parent, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "PREPAREDATA":
					// Call v0_prepare_data
					if (!v0_prepare_data($instruction, $gen_pub_date, $current_time, $check_pubdate, $class, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1403;
					$errors[$l_errors]['message']="An instruction from checkData in WOVOMLToWOVOdat.xml could not be recognized: ".$instruction['tag'];
					$l_errors++;
					return FALSE;
			}
		}
		
		// Check duplication (if not "listOfClasses")
		if ($auto_class['attributes']['TYPE']=="simple") {
			// Get "loadData" instruction
			$load_data=$auto_class['value'][1];
			if ($load_data['tag']!="LOADDATA") {
				// Error: the 2nd instruction of a list in WOVOMLToWOVOdat.xml should be "loadData"
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1404;
				$errors[$l_errors]['message']="The second instruction of a class in WOVOMLToWOVOdat.xml was not 'loadData' but '".$load_data['tag']."'";
				$l_errors++;
				return FALSE;
			}
			$instructions=$load_data['value'];
			$l_instructions=count($instructions);
			
			// Local variable
			$temp_class=array();
			
			// Find "check" instruction
			for ($i=0; $i<$l_instructions; $i++) {
				// Local variable
				$instruction=$instructions[$i];
				
				if ($instruction['tag']!="CHECK") {
					continue;
				}
				
				// "check" instruction found
				$parameters=$instruction['value'];
				$l_parameters=count($parameters);
				
				// Loop on parameters
				for ($j=2; $j<$l_parameters; $j+=2) {
					// Local variables
					$parameter_name=$parameters[$j]['value'][0];
					
					// Depending on the first character of the parameter name, we have to call different functions
					switch (substr($parameter_name, 0, 1)) {
						case '!':
							// General element
							if (!v0_ul_get_general($parameter_name, $gen_vd_id, $gen_cc_id, $gen_pub_date, $current_time, NULL, NULL, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '*':
							// Local element
							if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '/':
							// Attribute
							if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '#':
							// Function result
							if (!v0_ul_get_result($parameter_name, $class, NULL, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						default:
							// Static value
							$parameter_value=$parameter_name;
					}
					
					// If a NULL value was returned
					if ($parameter_value==NULL) {
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1779;
						$errors[$l_errors]['message']="A necessary element for checking uniqueness was not found: ".$parameter_name." in class ".$class['tag']." with code '".$class['attributes']['CODE']."'";
						$l_errors++;
						return FALSE;
					}
					
					// Store name and value
					$temp_class[$parameter_name]=$parameter_value;
				}
				
				// Send a warning if these data are already in DB
				if (!v0_check_db($instruction, $class, $full_xml_array, $gen_vd_id, $gen_cc_id, $gen_pub_date, $current_time, $warnings, $errors, $l_errors)) {
					return FALSE;
				}
				
				// Exit loop on instructions
				break;
			}
			
			// Check values with other classes
			$checked_classes=&$wovoml_classes[$class['tag']];
			$l_checked_classes=0;
			if ($checked_classes!=NULL) {
				// Loop on checked classes
				$l_checked_classes=count($checked_classes);
				for ($j=0; $j<$l_checked_classes; $j++) {
					$checked_class=$checked_classes[$j];
					
					// Compare values
					$different=FALSE;
					foreach ($checked_class as $param_name => $param_value) {
						if ($param_value!=$temp_class[$param_name]) {
							$different=TRUE;
							break;
						}
					}
					
					// If classes are not different (duplicated)
					if (!$different) {
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=7;
						$errors[$l_errors]['message']="Object '".$class['tag']."' with ";
						// Loop on parameters
						$first_param=TRUE;
						foreach ($temp_class as $param_name => $param_value) {
							// Skip parameters starting with "#"
							if (substr($param_name, 0, 1)=="#") {
								continue;
							}
							if ($first_param) {
								$errors[$l_errors]['message'].=substr($param_name, 1)."='".$param_value."'";
								$first_param=FALSE;
								continue;
							}
							$errors[$l_errors]['message'].=", ".substr($param_name, 1)."='".$param_value."'";
						}
						$errors[$l_errors]['message'].=" was found to be duplicated";
						$l_errors++;
						return FALSE;
					}
				}
			}
			
			// Store values
			$checked_classes[$l_checked_classes]=$temp_class;
		}
	}
	
	// Object counter
	$cnt_obj=0;
	
	// Loop on elements
	for ($i=0; $i<$l_elements; $i++) {
		// If already checked, continue
		$cnt_tot=$cnt_class.".".$cnt_obj;
		if (isset($checked[$cnt_tot])) {
			$cnt_obj++;
			continue;
		}
		
		// Local variable
		$element=&$elements[$i];
		$element_name=$element['tag'];
		
		// Find automaton instructions for this class
		for ($j=2; $j<$l_auto_elements; $j++) {
			// Local variables
			$auto_element=$auto_elements[$j];
			
			// If not the right class, continue
			if (strtoupper($auto_element['attributes']['NAME'])!=$element_name) {
				continue;
			}
			
			// Get type of class
			if ($auto_element['tag']=="LIST") {
				// Call v0_check_data_list
				if (!v0_check_data_list($auto_element, $element, $developer, $user_upload, $answer, $errors, $l_errors)) {
					return FALSE;
				}
			}
			else {
				switch ($auto_element['attributes']['TYPE']) {
					case "simple":
					case "listOfClasses":
						// Call v0_check_data_class_simple_loc
						if (!v0_check_data_class_simple_loc($auto_element, $class, $cnt_tot, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, $element, $checked, $wovoml_classes, $answer, $warnings, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case "group":
						// Call v0_check_data_class_group
						if (!v0_check_data_class_group($auto_element, $cnt_tot, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $gen_pub_date, $current_time, $check_pubdate, $developer, $user_upload, $element, $checked, $wovoml_classes, $answer, $warnings, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					default:
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1399;
						$errors[$l_errors]['message']="A type of class in WOVOMLToWOVOdat.xml could not be recognized: ".$auto_element['attributes']['TYPE'];
						$l_errors++;
						return FALSE;
				}
			}
			break;
		}
		
		// Flag: class already checked
		$checked[$cnt_tot]=TRUE;
		$element['xml_id']=$cnt_tot;
		$cnt_obj++;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'check' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'check' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* InOutput:	- $warnings: an array of warning messages
*			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_db($instruction, $class, $full_xml_array, $gen_vd_id, $gen_cc_id, $gen_pub_date, $current_time, &$warnings, &$errors, &$l_errors) {
	// Local variables
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Get first parameter (table)
	if ($parameters[0]['tag']!="TABLE") {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1440;
		$errors[$l_errors]['message']="The 1st element of a 'check' instruction was not 'table'";
		$l_errors++;
		return FALSE;
	}
	$select_table=$parameters[0]['value'][0];
	
	$select_where_field_name=array();
	$select_where_field_value=array();
	// Loop on fields and values
	for ($i=1; $i<$l_parameters; $i+=2) {
		// Local variables
		$field=$parameters[$i];
		if ($field['tag']!="FIELD") {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1441;
			$errors[$l_errors]['message']="The (2n)-th element of a 'check' instruction was not 'field'";
			$l_errors++;
			return FALSE;
		}
		$value=$parameters[$i+1];
		if ($value['tag']!="VALUE") {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1442;
			$errors[$l_errors]['message']="The (2n+1)-th element of a 'check' instruction was not 'value'";
			$l_errors++;
			return FALSE;
		}
		$parameter_name=$value['value'][0];
		
		// Depending on the first character of the parameter name, we have to call different functions
		switch (substr($parameter_name, 0, 1)) {
			case '!':
				// General element
				if (!v0_ul_get_general($parameter_name, $gen_vd_id, $gen_cc_id, $gen_pub_date, $current_time, NULL, NULL, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent -- not uploaded yet, so skip
				return TRUE;
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, $full_xml_array, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1443;
			$errors[$l_errors]['message']="A necessary element for a 'check' instruction was not found";
			$l_errors++;
			return FALSE;
		}
		
		// Store in arrays
		$select_where_field_name[($i-1)/2]=$field['value'][0];
		$select_where_field_value[($i-1)/2]=$parameter_value;
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Query database
	$select_field_name=array();
	$select_field_value=array();
	$select_field_name[0]=$select_table."_id";
	$local_error="";
	if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1024;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4009;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_select_field_value=count($select_field_value);
	if ($l_select_field_value>1) {
		// Only 0 or 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1111;
		$errors[$l_errors]['message']="Multiple rows in the ".$select_table." table were found with ";
		// Loop on fields
		$l_fields=count($select_where_field_name);
		for ($i=0; $i<$l_fields; $i++) {
			// Local variables
			$field_name=$select_where_field_name[$i];
			$field_value=$select_where_field_value[$i];
			if ($i==0) {
				$errors[$l_errors]['message'].=$field_name."='".$field_value."'";
				continue;
			}
			$errors[$l_errors]['message'].=", ".$field_name."='".$field_value."'";
		}
		$l_errors++;
	}
	// Get result
	if (isset($select_field_value[0][0])) {
		$warning_msg=$class['tag']." data (";
		$l_fields=count($select_where_field_name);
		for ($i=0; $i<$l_fields; $i++) {
			// Local variables
			$field_name=$select_where_field_name[$i];
			$field_value=$select_where_field_value[$i];
			if ($i==0) {
				$warning_msg.=$field_name."='".$field_value."'";
				continue;
			}
			$warning_msg.=", ".$field_name."='".$field_value."'";
		}
		$warning_msg.=")";
		array_push($warnings, $warning_msg);
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check a link
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkLink' instruction from automaton file
* 			- $is_list: a boolean to tell whether the checked element comes from a list or a class
* 			- $full_xml_array: array containing all data from WOVOML file
* 			- $gen_cc_id: the general owner ID
* 			- $gen_cc_code: the general owner code
* 			- $gen_vd_id: the general volcano ID
* 			- $gen_vd_code: the general volcano code
* InOutput:	- $class: the class for which the instruction is being done OR the element of the list for which the instruction is being done
* 			- $answer: the answer from the user if they were asked about a choice already
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_link($instruction, $is_list, $full_xml_array, $gen_cc_id, $gen_cc_code, $gen_vd_id, $gen_vd_code, $developer, $user_upload, &$class, &$answer, &$errors, &$l_errors) {
	// Get target name
	$target=$instruction['attributes']['TARGET'];
	
	// If link was already set, continue
	if (isset($class['results'][$target])) {
		return TRUE;
	}
	
	// Depending on type of instruction
	switch ($instruction['attributes']['TYPE']) {
		case "ownerCode":
			// Call v0_check_owner_code
			if (!v0_check_owner_code($instruction, $class, $gen_cc_id, $gen_cc_code, $developer, $user_upload, $result, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "volcanoCode":
			// Call v0_check_volcano_code
			if (!v0_check_volcano_code($instruction, $class, $gen_vd_id, $gen_vd_code, $result, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "simple":
			// Call v0_check_link_simple
			if (!v0_check_link_simple($instruction, $class, $is_list, $full_xml_array, $answer, $result, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "include1":
		case "include2":
			// Call v0_check_link_include
			if (!v0_check_link_include($instruction, $class, $full_xml_array, $answer, $result, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "before":
			// Call v0_check_link_before
			if (!v0_check_link_before($instruction, $class, $full_xml_array, $answer, $result, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1405;
			$errors[$l_errors]['message']="A type of 'checkLink' instruction in WOVOMLToWOVOdat.xml could not be recognized: ".$instruction['attributes']['TYPE'];
			$l_errors++;
			return FALSE;
	}
	
	// Store returned value
	if (!$is_list) {
		$class['results'][$target]=$result;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check a link towards a contact
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkLink' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $gen_cc_id: the general owner ID
* 			- $gen_cc_code: the general owner code
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result: the owner ID
******************************************************************************************************/
function v0_check_owner_code($instruction, $class, $gen_cc_id, $gen_cc_code, $developer, $user_upload, &$result, &$errors, &$l_errors) {
	// Get name
	$parameter_name=$instruction['attributes']['NAME'];
	
	// Get value of name
	switch (substr($parameter_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$parameter_value=$parameter_name;
	}
	
	// If a NULL value was returned
	if ($parameter_value==NULL) {
		// Return gen_cc_id
		$result=$gen_cc_id;
		return TRUE;
	}
	
	// Compare local owner code with general owner code
	if ($parameter_value==$gen_cc_code) {
		// Return gen_cc_id
		$result=$gen_cc_id;
		return TRUE;
	}
	
	// Different owner code, get cc_id from DB
	$table_name='cc';
	$field_name=array();
	$field_value=array();
	$field_name[0]='cc_id';
	$where_field_name=array();
	$where_field_comp=array();
	$where_field_value=array();
	$where_logical=array();
	$where_field_name[0]='cc_code';
	$where_field_comp[0]='=';
	$where_field_value[0]=$parameter_value;
	$where_logical[0]='OR';
	$where_field_name[1]='cc_code2';
	$where_field_comp[1]='=';
	$where_field_value[1]=$parameter_value;
	$local_error="";
	if (!db_select_ext($table_name, $field_name, $where_field_name, $where_field_comp, $where_field_value, $where_logical, $field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1412;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4100;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_field_value=count($field_value);
	if ($l_field_value>1) {
		// Only 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1411;
		$errors[$l_errors]['message']="Multiple rows in the cc table correspond to this cc_code: '".$parameter_value."'";
		$l_errors++;
		return FALSE;
	}
	elseif ($l_field_value==0) {
		// Only 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=9;
		$errors[$l_errors]['message']="ownerCode with value '".$parameter_value."' from '".$class['tag']."' class with code '".$class['attributes']['CODE']."' could not be found in the database";
		$l_errors++;
		return FALSE;
	}
	$cc_id=$field_value[0][0];
	
	// If loader is not a developer
	if (!$developer) {
		// Check permission
		$found=FALSE;
		// Loop on array of users who permitted user to upload data for them
		for ($i=0; $i<count($user_upload); $i++) {
			if ($cc_id==$user_upload['id'][$i]) {
				// User found in the list
				$found=TRUE;
				break;
			}
		}
		// Check boolean
		if (!$found) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=3;
			$errors[$l_errors]['message']="You do not have the rights to upload for owner with code '".$elements[$i]['value'][0]."'. If you wish to be granted this permission, please contact them directly.";
			$l_errors++;
			return FALSE;
		}
	}
	
	// Return cc_id
	$result=$cc_id;
	
	return TRUE;
}

/******************************************************************************************************
* Function to check a link towards a volcano
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkLink' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $gen_vd_id: the general volcano ID
* 			- $gen_vd_code: the general volcano code
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result: the volcano ID
******************************************************************************************************/
function v0_check_volcano_code($instruction, $class, $gen_vd_id, $gen_vd_code, &$result, &$errors, &$l_errors) {
	// Get name
	$parameter_name=$instruction['attributes']['NAME'];
	
	// Get value of name
	switch (substr($parameter_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$parameter_value=$parameter_name;
	}
	
	// If a NULL value was returned
	if ($parameter_value==NULL) {
		// Return gen_vd_id
		$result=$gen_vd_id;
		return TRUE;
	}
	
	// Compare local owner code with general owner code
	if ($parameter_value==$gen_vd_code) {
		// Return gen_vd_id
		$result=$gen_vd_id;
		return TRUE;
	}
	
	// Different volcano code, get vd_id from DB
	$field_name=array();
	$field_value=array();
	$where_field_name=array();
	$where_field_value=array();
	$field_name[0]='vd_id';
	$where_field_name[0]='vd_inf_cavw';
	$where_field_value[0]=$parameter_value;
	$local_error="";
	if (!db_select('vd_inf', $field_name, $where_field_name, $where_field_value, $field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1413;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4101;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_field_value=count($field_value);
	if ($l_field_value>1) {
		// Only 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1414;
		$errors[$l_errors]['message']="Multiple rows in the vd table correspond to this CAVW number: '".$parameter_value."'";
		$l_errors++;
		return FALSE;
	}
	elseif ($l_field_value==0) {
		// Only 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=9;
		$errors[$l_errors]['message']="volcanoCode with value '".$parameter_value."' from '".$class['tag']."' class with code '".$class['attributes']['CODE']."' could not be found in the database";
		$l_errors++;
		return FALSE;
	}
	$result=$field_value[0][0];
	
	return TRUE;
}

/******************************************************************************************************
* Function to check a simple link
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkLink' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $is_list: boolean to know whether the class is actually an element of list
* 			- $full_xml_array: array containing all data from WOVOML file
* InOutput:	- $answer: the answer from the user if they were asked about a choice already
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result: the reference ID
******************************************************************************************************/
function v0_check_link_simple($instruction, $class, $is_list, $full_xml_array, &$answer, &$result, &$errors, &$l_errors) {
	// Get main parameter name
	$main_parameter_name=$instruction['attributes']['NAME'];
	
	// Get link value
	if ($is_list) {
		// Element is part of a list
		$main_parameter_value=preg_replace('/\s+/', ' ', trim($class['value'][0]));
	}
	else {
		// Element is part of a class
		
		// Get value of name
		switch (substr($main_parameter_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($main_parameter_name, $class, $main_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($main_parameter_name, $class, $main_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// System error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1645;
				$errors[$l_errors]['message']="System trying to check reference for an element which is not an attribute or an element of a WOVOML class";
				$l_errors++;
				return FALSE;
		}
		
		// If a NULL value was returned
		if ($main_parameter_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
	}
	
	// Get choice
	$choice=$instruction['attributes']['CHOICE'];
	
	// Look in DB
	require_once "php/funcs/db_funcs.php";
	
	$db_instructions=$instruction['value'][0]['value'];
	$select_parameters=$db_instructions[0]['value'];
	$table_name=$select_parameters[1]['value'][0];
	$field_name=array();
	$field_value=array();
	$field_name[0]=$select_parameters[0]['value'][0];
	
	// Help fields names
	if ($choice=="yes") {
		$help_fields=$select_parameters[3]['value'];
		$l_help_fields=count($help_fields);
		$help_fields_names=array();
		for ($i=0; $i<$l_help_fields; $i++) {
			$field_name[$i+1]=$help_fields[$i]['value'][0];
			$help_fields_names[$i]=$help_fields[$i]['attributes']['NAME'];
		}
	}
	
	$where_field_name=array();
	$where_field_value=array();
	$where_parameters=$select_parameters[2]['value'];
	$l_where_parameters=count($where_parameters);
	for ($i=0; $i<$l_where_parameters; $i+=2) {
		// Get parameter name
		$parameter_name=$where_parameters[$i+1]['value'][0];
		
		// If this is main parameter, get its value and continue
		if ($parameter_name==$main_parameter_name) {
			$where_field_name[$i/2]=$where_parameters[$i]['value'][0];
			$where_field_value[$i/2]=$main_parameter_value;
			continue;
		}
		
		// Else, get value of parameter
		switch (substr($parameter_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, NULL, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		$where_field_name[$i/2]=$where_parameters[$i]['value'][0];
		$where_field_value[$i/2]=$parameter_value;
	}
	$local_error="";
	// Query database
	if (!db_select($table_name, $field_name, $where_field_name, $where_field_value, $field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1413;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4101;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_field_value=count($field_value);
	if ($l_field_value>1) {
		// If user has choice
		if ($choice=="yes") {
			// If user already gave his choice
			if ($answer!=NULL) {
				$result=$answer;
				$answer=NULL;
				return TRUE;
			}
			// Ask user
			// Get help fields values
			$help_fields_values=array();
			// Get ids
			$matches_ids=array();
			for ($i=0; $i<$l_field_value; $i++) {
				$matches_ids[$i]=$field_value[$i][0];
				for ($j=0; $j<$l_help_fields; $j++) {
					$help_fields_values[$i][$j]=$field_value[$i][$j+1];
				}
			}
			require_once "php/funcs/navi_funcs.php";
			ask_user("v0_funcs", $class['tag'], $class['attributes']['CODE'], substr($main_parameter_name, 1), $main_parameter_value, $help_fields_names, $help_fields_values, $l_help_fields, $matches_ids, $l_field_value);
		}
		else {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1416;
			$errors[$l_errors]['message']="Multiple rows in the '".$table_name."' table correspond to these criteria: ".$where_field_name[0]."='".$where_field_value[0]."'";
			$l_where_field_name=count($where_field_name);
			for ($i=1; $i<$l_where_field_name; $i++) {
				$errors[$l_errors]['message'].=", ".$where_field_name[$i]."='".$where_field_value[$i]."'";
			}
			$l_errors++;
			return FALSE;
		}
	}
	elseif ($l_field_value==1) {
		// Return result
		$result=$field_value[0][0];
		return TRUE;
	}
	
	// If there is no XML path possible
	if (!isset($instruction['value'][1])) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=9;
		$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' could not be found in database";
		$l_errors++;
		return FALSE;
	}
	
	// Look in XML
	$xml_instructions=$instruction['value'][1]['value'];
	$find_parameters=$xml_instructions[0]['value'];
	$where_params=$find_parameters[1]['value'];
	$l_where_params=count($where_params);
	$where_parameters=array();
	$where_values=array();
	for ($i=0; $i<$l_where_params; $i+=2) {
		$parameter_name=$where_params[$i+1]['value'][0];
		
		switch (substr($parameter_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, NULL, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		$where_parameters[$i/2]=$where_params[$i]['value'][0];
		$where_values[$i/2]=$parameter_value;
	}
	
	// Local variables
	$l_where_parameters=$l_where_params/2;
	
	// Get helping parameters (for the user to choose)
	$help_parameters_names=array();
	if ($choice=="yes") {
		$help_parameters=$find_parameters[2]['value'];
		$l_help_parameters=count($help_parameters);
		$help_parameters_display_names=array();
		for ($i=0; $i<$l_help_parameters; $i++) {
			$help_parameters_names[$i]=$help_parameters[$i]['value'][0];
			$help_parameters_display_names[$i]=$help_parameters[$i]['attributes']['NAME'];
		}
	}
	else {
		$l_help_parameters=0;
	}
	
	// Get XML paths
	$paths=$find_parameters[0]['value'];
	$l_paths=count($paths);
	$matches=array();
	$cnt_matches=0;
	
	// Loop on XML path
	for ($i=0; $i<$l_paths; $i++) {
		// Get XML path (automatically remove "wovoml/")
		$path=substr($paths[$i]['value'][0], 7);
		
		// Call function to look in XML
		if (!v0_check_link_simple_xml($path, $full_xml_array[0], $where_parameters, $l_where_parameters, $where_values, $help_parameters_names, $l_help_parameters, $matches, $cnt_matches, $errors, $l_errors)) {
			return FALSE;
		}
	}
	
	// Check output of function
	switch ($cnt_matches) {
		case 0:
			// Not found
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=9;
			$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' could neither be found in database nor in the XML file";
			$l_errors++;
			return FALSE;
			break;
		case 1:
			// Found once
			// Get ID and return TRUE
			$result=array();
			$result['type']="XML";
			$result['id']=$matches[0]['id'];
			break;
		default:
			// Found many times
			// If user has choice
			if ($choice=="yes") {
				// If user already gave his choice
				if ($answer!=NULL) {
					$result['type']="XML";
					$result['id']=$answer;
					$answer=NULL;
					return TRUE;
				}
				// Get help fields values
				$help_parameters_values=array();
				// Get ids
				$matches_ids=array();
				for ($i=0; $i<$cnt_matches; $i++) {
					$matches_ids[$i]=$matches[$i]['id'];
					$help_parameters_values[$i]=$matches[$i]['values'];
				}
				// Ask user
				require_once "php/funcs/navi_funcs.php";
				ask_user("v0_funcs", $class['tag'], $class['attributes']['CODE'], substr($main_parameter_name, 1), $main_parameter_value, $help_parameters_display_names, $help_parameters_values, $l_help_parameters, $matches_ids, $cnt_matches);
			}
			else {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1417;
				$errors[$l_errors]['message']="Multiple objects from the XML file correspond to these criteria: ".$where_parameters[0]."='".$where_field_value[0]."'";
				for ($i=1; $i<$l_where_parameters; $i++) {
					$errors[$l_errors]['message'].=", ".$where_parameters[$i]."='".$where_field_value[$i]."'";
				}
				$l_errors++;
				return FALSE;
			}
			break;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to find a simple referenced object in same WOVOML file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_path: the XML path to the classes which might be pointed by the link
* 			- $xml_class: the current XML class
* 			- $where_parameters: the names of parameters to be verified by the object
* 			- $l_where_parameters: the number of parameters to be verified by the object
* 			- $where_values: the values of parameters to be verified by the object
* 			- $help_parameters: additional parameters for a possible choice by the user later
* 			- $l_where_parameters: the number of additional parameters for a possible choice by the user later
* InOutput:	- $matches: array of matching objects
* 			- $cnt_matches: the count of matching objects so far
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_link_simple_xml($xml_path, $xml_class, $where_parameters, $l_where_parameters, $where_values, $help_parameters, $l_help_parameters, &$matches, &$cnt_matches, &$errors, &$l_errors) {
	// Parse xml path
	$slash_pos=strpos($xml_path, "/");
	
	// If it's the last element
	if ($slash_pos===FALSE) {
		// Look for element
		for ($i=0; $i<count($xml_class['value']); $i++) {
			// Initialize variables
			$xml_element=$xml_class['value'][$i];
			
			// Compare elements
			if (strtoupper($xml_path)!=$xml_element['tag']) {
				continue;
			}
			
			// It's the right class
			// Compare attributes & elements
			$match=TRUE;
			
			for ($j=0; $j<$l_where_parameters; $j++) {
				// Local variables
				$parameter_name=$where_parameters[$j];
				
				// Get parameter value
				switch (substr($parameter_name, 0, 1)) {
					case '*':
						// Local element
						if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case '/':
						// Attribute
						if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case '#':
						// Function result
						if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					default:
						// Static value
						$parameter_value=$parameter_name;
				}
				
				// Compare values
				if ($parameter_value!=$where_values[$j]) {
					$match=FALSE;
					break;
				}
			}
			
			// If it is a match
			if ($match) {
				// Get value for helping user to choose
				$help_values=array();
				
				for ($j=0; $j<$l_help_parameters; $j++) {
					// Local variables
					$parameter_name=$help_parameters[$j];
					
					// Get parameter value
					switch (substr($parameter_name, 0, 1)) {
						case '*':
							// Local element
							if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '/':
							// Attribute
							if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '#':
							// Function result
							if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						default:
							// Static value
							$parameter_value=$parameter_name;
					}
					
					// Store value
					$help_values[$j]=$parameter_value;
				}
				
				// Store ID and helping values
				$matches[$cnt_matches]=array();
				$matches[$cnt_matches]['id']=$xml_element['xml_id'];
				$matches[$cnt_matches]['values']=$help_values;
				
				$cnt_matches++;
			}
		}
		return TRUE;
	}
	
	// It's not the last element
	// Get element name
	$element=strtoupper(substr($xml_path, 0, $slash_pos));
	// Remaining XML path
	$rem_xml_path=substr($xml_path, $slash_pos+1);
	// Loop on array
	for ($i=0; $i<count($xml_class['value']); $i++) {
		// Initialize variables
		$xml_element=$xml_class['value'][$i];
		
		// Compare elements
		if ($element!=$xml_element['tag']) {
			continue;
		}
		
		// It's the right element
		if (!v0_check_link_simple_xml($rem_xml_path, $xml_element, $where_parameters, $l_where_parameters, $where_values, $help_parameters, $l_help_parameters, $matches, $cnt_matches, $errors, $l_errors)) {
			return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check a link with 'before' conditions on time
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkLink' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $full_xml_array: array containing all data from WOVOML file
* InOutput:	- $answer: the answer from the user if they were asked about a choice already
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result: the reference ID
******************************************************************************************************/
function v0_check_link_before($instruction, $class, $full_xml_array, &$answer, &$result, &$errors, &$l_errors) {
	// Get name
	$main_parameter_name=$instruction['attributes']['NAME'];
	
	// Get value of name
	switch (substr($main_parameter_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($main_parameter_name, $class, $main_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($main_parameter_name, $class, $main_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// System error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1645;
			$errors[$l_errors]['message']="System trying to check reference for an element which is not an attribute or an element of a WOVOML class";
			$l_errors++;
			return FALSE;
	}
	
	// If a NULL value was returned
	if ($main_parameter_value==NULL) {
		// Return a NULL value
		$result=NULL;
		return TRUE;
	}
	
	// Get choice
	$choice=$instruction['attributes']['CHOICE'];
	
	// Get minimum time before
	
	// Get time before
	$db_instructions=$instruction['value'][0]['value'];
	$time_before_parameters=$db_instructions[1]['value'];
	$time_name=$time_before_parameters[0]['value'][0];
	$time_unc_name=$time_before_parameters[1]['value'][0];
	
	// Get value of time
	switch (substr($time_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($time_name, $class, $time_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($time_name, $class, $time_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($time_name, $class, NULL, $time_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$time_value=$time_name;
	}
	
	// If a NULL value was returned
	if ($time_value==NULL) {
		// Return a NULL value
		$result=NULL;
		return TRUE;
	}
	
	// Get value of time uncertainty
	switch (substr($time_unc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($time_unc_name, $class, $time_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($time_unc_name, $class, $time_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($time_unc_name, $class, NULL, $time_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$time_unc_value=$time_unc_name;
	}
	
	// Calculate minimum time
	if ($time_unc_value==NULL) {
		$min_time=$time_value;
	}
	else {
		require_once "php/funcs/datetime_funcs.php";
		if (!datetime_substract_datetime($time_value, $time_unc_value, $min_time, $local_error)) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1513;
			$errors[$l_errors]['message']="Error when trying to calculate minimum time [v0_check_link_before] // ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Look in DB
	$select_parameters=$db_instructions[0]['value'];
	$table_name=$select_parameters[3]['value'][0];
	$field_name=array();
	$field_value=array();
	$field_name[0]=$select_parameters[0]['value'][0];
	$field_name[1]=$select_parameters[1]['value'][0];
	$field_name[2]=$select_parameters[2]['value'][0];
	
	// Help fields names
	if ($choice=="yes") {
		$help_fields=$db_instructions[2]['value'];
		$l_help_fields=count($help_fields);
		$help_fields_names=array();
		for ($i=0; $i<$l_help_fields; $i++) {
			$field_name[$i+3]=$help_fields[$i]['value'][0];
			$help_fields_names[$i]=$help_fields[$i]['attributes']['NAME'];
		}
	}
	
	$where_field_name=array();
	$where_field_value=array();
	$where_parameters=$select_parameters[4]['value'];
	$l_where_parameters=count($where_parameters);
	for ($i=0; $i<$l_where_parameters; $i+=2) {
		$parameter_name=$where_parameters[$i+1]['value'][0];
		switch (substr($parameter_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, NULL, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		$where_field_name[$i/2]=$where_parameters[$i]['value'][0];
		$where_field_value[$i/2]=$parameter_value;
	}
	$local_error="";
	if (!db_select($table_name, $field_name, $where_field_name, $where_field_value, $field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1413;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4101;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_field_value=count($field_value);
	
	// Select those for which the date is included
	$matches=array();
	$cnt_ok=0;
	if ($l_field_value!=0) {
		// Loop on possibilities
		for ($i=0; $i<$l_field_value; $i++) {
			$selected_item=$field_value[$i];
			
			// Get start time and end time of selected item
			$start_time=$selected_item[1];
			$start_time_unc=$selected_item[2];
			
			// Calculate maximum start time
			if ($start_time_unc==NULL || $start_time_unc=="") {
				$max_start_time=$start_time;
			}
			else {
				require_once "php/funcs/datetime_funcs.php";
				if (!datetime_add_datetime($start_time, $start_time_unc, $max_start_time, $local_error)) {
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1514;
					$errors[$l_errors]['message']="Error when trying to calculate minimum start time [v0_check_link_before] // ".$local_error;
					$l_errors++;
					return FALSE;
				}
			}
			
			// Compare times
			require_once "php/funcs/datetime_funcs.php";
			if (!datetime_date_before_date($min_time, $max_start_time, $is_before, $local_error)) {
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1516;
				$errors[$l_errors]['message']="Error when trying to compare dates [v0_check_link_before] // ".$local_error;
				$l_errors++;
				return FALSE;
			}
			if ($is_before!=2) {
				$matches[$cnt_ok]=$selected_item;
				$cnt_ok++;
			}
		}
	}
	
	// Check number of matching results
	if ($cnt_ok>1) {
		// If user has choice
		if ($choice=="yes") {
			// If user already gave his choice
			if ($answer!=NULL) {
				$result=$answer;
				$answer=NULL;
				return TRUE;
			}
			// Ask user
			// Get help fields values
			$help_fields_values=array();
			// Get ids
			$matches_ids=array();
			for ($i=0; $i<$cnt_ok; $i++) {
				$matches_ids[$i]=$matches[$i][0];
				for ($j=0; $j<$l_help_fields; $j++) {
					$help_fields_values[$i][$j]=$matches[$i][$j+3];
				}
			}
			require_once "php/funcs/navi_funcs.php";
			ask_user("v0_funcs", $class['tag'], $class['attributes']['CODE'], substr($main_parameter_name, 1), $main_parameter_value, $help_fields_names, $help_fields_values, $l_help_fields, $matches_ids, $cnt_ok);
		}
		else {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1416;
			$errors[$l_errors]['message']="Multiple rows in the '".$table_name."' table correspond to these criteria: ".$where_field_name[0]."='".$where_field_value[0]."'";
			$l_where_field_name=count($where_field_name);
			for ($i=1; $i<$l_where_field_name; $i++) {
				$errors[$l_errors]['message'].=", ".$where_field_name[$i]."='".$where_field_value[$i]."'";
			}
			$l_errors++;
			return FALSE;
		}
	}
	elseif ($cnt_ok==1) {
		// Return result
		$result=$matches[0][0];
		return TRUE;
	}
	
	// If there is no XML path possible
	if (!isset($instruction['value'][1])) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=9;
		if ($l_field_value==0) {
			$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could not be found in database";
		}
		else {
			$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could be found in database but time of object is not earlier than time of reference";
		}
		$l_errors++;
		return FALSE;
	}
	
	// Look in XML
	require_once "php/funcs/db_funcs.php";
	
	$xml_instructions=$instruction['value'][1]['value'];
	$find_parameters=$xml_instructions[0]['value'];
	
	// Where parameters
	$where_params=$find_parameters[5]['value'];
	$l_where_params=count($where_params);
	$where_parameters=array();
	$l_where_parameters=$l_where_params/2;
	$where_values=array();
	for ($i=0; $i<$l_where_params; $i+=2) {
		$parameter_name=$where_params[$i+1]['value'][0];
		
		switch (substr($parameter_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, NULL, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		$where_parameters[$i/2]=$where_params[$i]['value'][0];
		$where_values[$i/2]=$parameter_value;
	}
	
	// Start time, end time, uncertainties
	$time_parameters=array();
	for ($i=0; $i<2; $i++) {
		$time_parameters[$i]=$find_parameters[$i+1]['value'][0];
	}
	
	// Get helping parameters (for the user to choose)
	$help_parameters_names=array();
	if ($choice=="yes") {
		$help_parameters=$xml_instructions[2]['value'];
		$l_help_parameters=count($help_parameters);
		$help_parameters_display_names=array();
		for ($i=0; $i<$l_help_parameters; $i++) {
			$help_parameters_names[$i]=$help_parameters[$i]['value'][0];
			$help_parameters_display_names[$i]=$help_parameters[$i]['attributes']['NAME'];
		}
	}
	else {
		$l_help_parameters=0;
	}
	
	// Get XML paths
	$paths=$find_parameters[0]['value'];
	$l_paths=count($paths);
	$matches=array();
	$cnt_matches=0;
	$found_in_xml=FALSE;
	
	// Loop on XML path
	for ($i=0; $i<$l_paths; $i++) {
		// Get XML path (automatically remove "wovoml/")
		$path=substr($paths[$i]['value'][0], 7);
		
		// Call function to look in XML
		$matches=array();
		$l_matches=0;
		if (!v0_check_link_before_xml($path, $full_xml_array[0], $where_parameters, $l_where_parameters, $where_values, $time_parameters, $help_parameters_names, $l_help_parameters, $min_time, $found_in_xml, $matches, $cnt_matches, $errors, $l_errors)) {
			return FALSE;
		}
	}
	
	// Check output of function
	switch ($cnt_matches) {
		case 0:
			// Not found
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=9;
			if ($found_in_xml) {
				$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could be found in WOVOML file but time of object is not earlier than time of reference";
			}
			else {
				if ($l_field_value==0) {
					$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could neither be found in database nor in WOVOML file";
				}
				else {
					$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could be found in database but time of object is not earlier than time of reference";
				}
			}
			$l_errors++;
			return FALSE;
		case 1:
			// Found once
			// Get ID and return TRUE
			$result=array();
			$result['type']="XML";
			$result['id']=$matches[0]['id'];
			break;
		default:
			// Found many times
			// If user has choice
			if ($choice=="yes") {
				// If user already gave his choice
				if ($answer!=NULL) {
					$result['type']="XML";
					$result['id']=$answer;
					$answer=NULL;
					return TRUE;
				}
				// Get help fields values
				$help_parameters_values=array();
				// Get ids
				$matches_ids=array();
				for ($i=0; $i<$cnt_matches; $i++) {
					$matches_ids[$i]=$matches[$i]['id'];
					$help_parameters_values[$i]=$matches[$i]['values'];
				}
				// Ask user
				require_once "php/funcs/navi_funcs.php";
				ask_user("v0_funcs", $class['tag'], $class['attributes']['CODE'], substr($main_parameter_name, 1), $main_parameter_value, $help_parameters_display_names, $help_parameters_values, $l_help_parameters, $matches_ids, $cnt_matches);
			}
			else {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1417;
				$errors[$l_errors]['message']="Multiple objects from the XML file correspond to these criteria: ".$where_parameters[0]."='".$where_values[0]."'";
				for ($i=1; $i<$l_where_parameters; $i++) {
					$errors[$l_errors]['message'].=", ".$where_parameters[$i]."='".$where_values[$i]."'";
				}
				$l_errors++;
				return FALSE;
			}
			break;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to find a referenced object with 'before' conditions on time in same WOVOML file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_path: the XML path to the classes which might be pointed by the link
* 			- $xml_class: the current XML class
* 			- $where_parameters: the names of parameters to be verified by the object
* 			- $l_where_parameters: the number of parameters to be verified by the object
* 			- $where_values: the values of parameters to be verified by the object
* 			- $time_parameters: the name of time paramaters for verifying conditions on time
* 			- $min_time: the minimum time to be before minimum start time of object
* InOutput:	- $matches: array of matching objects
* 			- $cnt_matches: the count of matching objects so far
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_link_before_xml($xml_path, $xml_class, $where_parameters, $l_where_parameters, $where_values, $time_parameters, $help_parameters, $l_help_parameters, $min_time, &$found_in_xml, &$matches, &$cnt_matches, &$errors, &$l_errors) {
	// Parse xml path
	$slash_pos=strpos($xml_path, "/");
	
	// If it's the last element
	if ($slash_pos===FALSE) {
		// Look for element
		for ($i=0; $i<count($xml_class['value']); $i++) {
			// Initialize variables
			$xml_element=$xml_class['value'][$i];
			
			// Compare elements
			if (strtoupper($xml_path)!=$xml_element['tag']) {
				continue;
			}
			
			// It's the right class
			// Compare attributes & elements
			$match=TRUE;
			
			for ($j=0; $j<$l_where_parameters; $j++) {
				// Local variables
				$parameter_name=$where_parameters[$j];
				
				// Get parameter value
				switch (substr($parameter_name, 0, 1)) {
					case '*':
						// Local element
						if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case '/':
						// Attribute
						if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case '#':
						// Function result
						if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					default:
						// Static value
						$parameter_value=$parameter_name;
				}
				
				// Compare values
				if ($parameter_value!=$where_values[$j]) {
					$match=FALSE;
					break;
				}
			}
			
			// If it is a match
			if ($match) {
				if (!$found_in_xml) {
					$found_in_xml=TRUE;
				}
				
				// Check time
				$time_values=array();
				
				// Get time values
				for ($j=0; $j<2; $j++) {
					// Local variables
					$parameter_name=$time_parameters[$j];
					
					// Get parameter value
					switch (substr($parameter_name, 0, 1)) {
						case '*':
							// Local element
							if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '/':
							// Attribute
							if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '#':
							// Function result
							if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						default:
							// Static value
							$parameter_value=$parameter_name;
					}
					
					// Store value
					$time_values[$j]=$parameter_value;
				}
				
				// Maximum start time
				if ($time_values[1]==NULL) {
					$max_start_time=$time_values[0];
				}
				else {
					require_once "php/funcs/datetime_funcs.php";
					if (!datetime_add_datetime($time_values[0], $time_values[1], $max_start_time, $local_error)) {
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1514;
						$errors[$l_errors]['message']="Error when trying to calculate minimum start time [v0_check_link_before_xml] // ".$local_error;
						$l_errors++;
						return FALSE;
					}
				}
				
				// Compare time frames
				require_once "php/funcs/datetime_funcs.php";
				if (!datetime_date_before_date($min_time, $max_start_time, $is_before, $local_error)) {
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1516;
					$errors[$l_errors]['message']="Error when trying to compare dates [v0_check_link_before_xml] // ".$local_error;
					$l_errors++;
					return FALSE;
				}
				if ($is_before!=2) {
					// It's a match
					
					// Get value for helping user to choose
					$help_values=array();
					
					for ($j=0; $j<$l_help_parameters; $j++) {
						// Local variables
						$parameter_name=$help_parameters[$j];
						
						// Get parameter value
						switch (substr($parameter_name, 0, 1)) {
							case '*':
								// Local element
								if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
									return FALSE;
								}
								break;
							case '/':
								// Attribute
								if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
									return FALSE;
								}
								break;
							case '#':
								// Function result
								if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
									return FALSE;
								}
								break;
							default:
								// Static value
								$parameter_value=$parameter_name;
						}
						
						// Store value
						$help_values[$j]=$parameter_value;
					}
					
					// Store ID and helping values
					$matches[$cnt_matches]=array();
					$matches[$cnt_matches]['id']=$xml_element['xml_id'];
					$matches[$cnt_matches]['values']=$help_values;
					
					$cnt_matches++;
				}
			}
		}
		return TRUE;
	}
	
	// It's not the last element
	// Get element name
	$element=strtoupper(substr($xml_path, 0, $slash_pos));
	// Remaining XML path
	$rem_xml_path=substr($xml_path, $slash_pos+1);
	// Loop on array
	for ($i=0; $i<count($xml_class['value']); $i++) {
		// Initialize variables
		$xml_element=$xml_class['value'][$i];
		
		// Compare elements
		if ($element!=$xml_element['tag']) {
			continue;
		}
		
		// It's the right element
		if (!v0_check_link_before_xml($rem_xml_path, $xml_element, $where_parameters, $l_where_parameters, $where_values, $time_parameters, $help_parameters, $l_help_parameters, $min_time, $found_in_xml, $matches, $cnt_matches, $errors, $l_errors)) {
			return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check a link with 'include1' and 'include2' conditions on time
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkLink' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $full_xml_array: array containing all data from WOVOML file
* InOutput:	- $answer: the answer from the user if they were asked about a choice already
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result: the reference ID
******************************************************************************************************/
function v0_check_link_include($instruction, $class, $full_xml_array, &$answer, &$result, &$errors, &$l_errors) {
	// Get name
	$main_parameter_name=$instruction['attributes']['NAME'];
	
	// Get value of name
	switch (substr($main_parameter_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($main_parameter_name, $class, $main_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($main_parameter_name, $class, $main_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// System error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1645;
			$errors[$l_errors]['message']="System trying to check reference for an element which is not an attribute or an element of a WOVOML class";
			$l_errors++;
			return FALSE;
	}
	
	// If a NULL value was returned
	if ($main_parameter_value==NULL) {
		// Return a NULL value
		$result=NULL;
		return TRUE;
	}
	
	// Get choice
	$choice=$instruction['attributes']['CHOICE'];
	
	// Boolean on type
	$is_include1=$instruction['attributes']['TYPE']=="include1";
	
	// Get minimum and maximum time included
	if ($is_include1) {
		// Get time included
		$db_instructions=$instruction['value'][0]['value'];
		$time_inc_parameters=$db_instructions[1]['value'];
		$time_name=$time_inc_parameters[0]['value'][0];
		$time_unc_name=$time_inc_parameters[1]['value'][0];
		
		// Get value of time
		switch (substr($time_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($time_name, $class, $time_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($time_name, $class, $time_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($time_name, $class, NULL, $time_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$time_value=$time_name;
		}
		
		// If a NULL value was returned
		if ($time_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		// Get value of time uncertainty
		switch (substr($time_unc_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($time_unc_name, $class, $time_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($time_unc_name, $class, $time_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($time_unc_name, $class, NULL, $time_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$time_unc_value=$time_unc_name;
		}
		
		// Calculate minimum and maximum time
		if ($time_unc_value==NULL) {
			$min_time=$time_value;
			$max_time=$time_value;
		}
		else {
			require_once "php/funcs/datetime_funcs.php";
			if (!datetime_get_min_max($time_value, $time_unc_value, $min_time, $max_time, $local_error)) {
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1513;
				$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum time [v0_check_link_include] // ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
	}
	else {
		// Get timeframe included
		$db_instructions=$instruction['value'][0]['value'];
		$timeframe_inc_parameters=$db_instructions[1]['value'];
		$opentime_name=$timeframe_inc_parameters[0]['value'][0];
		$opentime_unc_name=$timeframe_inc_parameters[1]['value'][0];
		$closetime_name=$timeframe_inc_parameters[2]['value'][0];
		$closetime_unc_name=$timeframe_inc_parameters[3]['value'][0];
		
		// Get value of open time
		switch (substr($opentime_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($opentime_name, $class, $opentime_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($opentime_name, $class, $opentime_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($opentime_name, $class, NULL, $opentime_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$opentime_value=$opentime_name;
		}
		
		// If a NULL value was returned
		if ($opentime_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		// Get value of open time uncertainty
		switch (substr($opentime_unc_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($opentime_unc_name, $class, $opentime_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($opentime_unc_name, $class, $opentime_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($opentime_unc_name, $class, NULL, $opentime_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$opentime_unc_value=$opentime_unc_name;
		}
		
		// Get value of close time
		switch (substr($closetime_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($closetime_name, $class, $closetime_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($closetime_name, $class, $closetime_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($closetime_name, $class, NULL, $closetime_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$closetime_value=$closetime_name;
		}
		
		// If a NULL value was returned
		$closetime_is_present=FALSE;
		if ($closetime_value==NULL) {
			// Set to maximum close time
			$closetime_value="9999-12-31 23:59:59";
			$closetime_is_present=TRUE;
		}
		
		// Get value of close time uncertainty
		switch (substr($closetime_unc_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($closetime_unc_name, $class, $closetime_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($closetime_unc_name, $class, $closetime_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($closetime_unc_name, $class, NULL, $closetime_unc_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$closetime_unc_value=$closetime_unc_name;
		}
		
		// Calculate maximum open time
		if ($opentime_unc_value==NULL) {
			$min_time=$opentime_value;
		}
		else {
			require_once "php/funcs/datetime_funcs.php";
			if (!datetime_add_datetime($opentime_value, $opentime_unc_value, $min_time, $local_error)) {
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1513;
				$errors[$l_errors]['message']="Error when trying to calculate minimum open time [v0_check_link_include] // ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		// Calculate minimum close time
		if ($closetime_unc_value==NULL || $closetime_is_present) {
			$max_time=$closetime_value;
		}
		else {
			require_once "php/funcs/datetime_funcs.php";
			if (!datetime_substract_datetime($closetime_value, $closetime_unc_value, $max_time, $local_error)) {
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1513;
				$errors[$l_errors]['message']="Error when trying to calculate maximum close time [v0_check_link_include] // ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
	}
	
	// Look in DB
	require_once "php/funcs/db_funcs.php";
	
	$select_parameters=$db_instructions[0]['value'];
	$table_name=$select_parameters[5]['value'][0];
	$field_name=array();
	$field_value=array();
	$field_name[0]=$select_parameters[0]['value'][0];
	$field_name[1]=$select_parameters[1]['value'][0];
	$field_name[2]=$select_parameters[2]['value'][0];
	$field_name[3]=$select_parameters[3]['value'][0];
	$field_name[4]=$select_parameters[4]['value'][0];
	
	// Help fields names
	if ($choice=="yes") {
		$help_fields=$db_instructions[2]['value'];
		$l_help_fields=count($help_fields);
		$help_fields_names=array();
		for ($i=0; $i<$l_help_fields; $i++) {
			$field_name[$i+5]=$help_fields[$i]['value'][0];
			$help_fields_names[$i]=$help_fields[$i]['attributes']['NAME'];
		}
	}
	
	$where_field_name=array();
	$where_field_value=array();
	$where_parameters=$select_parameters[6]['value'];
	$l_where_parameters=count($where_parameters);
	for ($i=0; $i<$l_where_parameters; $i+=2) {
		$parameter_name=$where_parameters[$i+1]['value'][0];
		switch (substr($parameter_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, NULL, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		$where_field_name[$i/2]=$where_parameters[$i]['value'][0];
		$where_field_value[$i/2]=$parameter_value;
	}
	$local_error="";
	if (!db_select($table_name, $field_name, $where_field_name, $where_field_value, $field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1413;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4101;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_field_value=count($field_value);
	
	// Select those for which the date is included
	$matches=array();
	$cnt_ok=0;
	if ($l_field_value!=0) {
		// Loop on possibilities
		for ($i=0; $i<$l_field_value; $i++) {
			$selected_item=$field_value[$i];
			
			// Get start time and end time of selected item
			$start_time=$selected_item[1];
			$start_time_unc=$selected_item[2];
			$end_time=$selected_item[3];
			$end_time_unc=$selected_item[4];
			
			// Calculate minimum and maximum time frame
			// Minimum start time
			if ($start_time_unc==NULL || $start_time_unc=="") {
				$min_start_time=$start_time;
			}
			else {
				require_once "php/funcs/datetime_funcs.php";
				if (!datetime_substract_datetime($start_time, $start_time_unc, $min_start_time, $local_error)) {
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1514;
					$errors[$l_errors]['message']="Error when trying to calculate minimum start time [v0_check_link_include]// ".$local_error;
					$l_errors++;
					return FALSE;
				}
			}
			// Maximum end time
			if ($end_time==NULL || $end_time=="") {
				$max_end_time="9999-12-31 23:59:59";
			}
			else {
				if ($end_time_unc==NULL || $end_time_unc=="") {
					$max_end_time=$end_time;
				}
				else {
					require_once "php/funcs/datetime_funcs.php";
					if (!datetime_add_datetime($end_time, $end_time_unc, $max_end_time, $local_error)) {
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1515;
						$errors[$l_errors]['message']="Error when trying to calculate maximum end time [v0_check_link_include]// ".$local_error;
						$l_errors++;
						return FALSE;
					}
				}
			}
			
			// Compare time frames
			require_once "php/funcs/datetime_funcs.php";
			if (!datetime_dateframe_included($min_time, $max_time, $min_start_time, $max_end_time, $is_included, $local_error)) {
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1516;
				$errors[$l_errors]['message']="Error when trying to compare dates [v0_check_link_include] // ".$local_error;
				$l_errors++;
				return FALSE;
			}
			
			// Depending on type of condition, different interpretations
			if ($is_include1) {
				if ($is_included!=0) {
					$matches[$cnt_ok]=$selected_item;
					$cnt_ok++;
				}
			}
			else {
				if ($is_included==1) {
					$matches[$cnt_ok]=$selected_item;
					$cnt_ok++;
				}
			}
		}
	}
	
	// Check number of matching results
	if ($cnt_ok>1) {
		// If user has choice
		if ($choice=="yes") {
			// If user already gave his choice
			if ($answer!=NULL) {
				$result=$answer;
				$answer=NULL;
				return TRUE;
			}
			// Ask user
			// Get help fields values
			$help_fields_values=array();
			// Get ids
			$matches_ids=array();
			for ($i=0; $i<$cnt_ok; $i++) {
				$matches_ids[$i]=$matches[$i][0];
				for ($j=0; $j<$l_help_fields; $j++) {
					$help_fields_values[$i][$j]=$matches[$i][$j+5];
				}
			}
			require_once "php/funcs/navi_funcs.php";
			ask_user("v0_funcs", $class['tag'], $class['attributes']['CODE'], substr($main_parameter_name, 1), $main_parameter_value, $help_fields_names, $help_fields_values, $l_help_fields, $matches_ids, $cnt_ok);
		}
		else {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1416;
			$errors[$l_errors]['message']="Multiple rows in the '".$table_name."' table correspond to these criteria: ".$where_field_name[0]."='".$where_field_value[0]."'";
			$l_where_field_name=count($where_field_name);
			for ($i=1; $i<$l_where_field_name; $i++) {
				$errors[$l_errors]['message'].=", ".$where_field_name[$i]."='".$where_field_value[$i]."'";
			}
			$l_errors++;
			return FALSE;
		}
	}
	elseif ($cnt_ok==1) {
		// Return result
		$result=$matches[0][0];
		return TRUE;
	}
	
	// If there is no XML path possible
	if (!isset($instruction['value'][1])) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=9;
		if ($l_field_value==0) {
			$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could not be found in database";
		}
		else {
			$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could be found in database but time of object is not included in time of reference";
		}
		$l_errors++;
		return FALSE;
	}
	
	// Look in XML
	$xml_instructions=$instruction['value'][1]['value'];
	$find_parameters=$xml_instructions[0]['value'];
	
	// Where parameters
	$where_params=$find_parameters[5]['value'];
	$l_where_params=count($where_params);
	$where_parameters=array();
	$l_where_parameters=$l_where_params/2;
	$where_values=array();
	for ($i=0; $i<$l_where_params; $i+=2) {
		$parameter_name=$where_params[$i+1]['value'][0];
		
		switch (substr($parameter_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, NULL, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Return a NULL value
			$result=NULL;
			return TRUE;
		}
		
		$where_parameters[$i/2]=$where_params[$i]['value'][0];
		$where_values[$i/2]=$parameter_value;
	}
	
	// Start time, end time, uncertainties
	$time_parameters=array();
	for ($i=0; $i<4; $i++) {
		$time_parameters[$i]=$find_parameters[$i+1]['value'][0];
	}
	
	// Get helping parameters (for the user to choose)
	$help_parameters_names=array();
	if ($choice=="yes") {
		$help_parameters=$xml_instructions[2]['value'];
		$l_help_parameters=count($help_parameters);
		$help_parameters_display_names=array();
		for ($i=0; $i<$l_help_parameters; $i++) {
			$help_parameters_names[$i]=$help_parameters[$i]['value'][0];
			$help_parameters_display_names[$i]=$help_parameters[$i]['attributes']['NAME'];
		}
	}
	else {
		$l_help_parameters=0;
	}
	
	// Get XML paths
	$paths=$find_parameters[0]['value'];
	$l_paths=count($paths);
	$matches=array();
	$cnt_matches=0;
	$found_in_xml=FALSE;
	
	// Loop on XML path
	for ($i=0; $i<$l_paths; $i++) {
		// Get XML path (automatically remove "wovoml/")
		$path=substr($paths[$i]['value'][0], 7);
		
		// Call function to look in XML
		if (!v0_check_link_include_xml($is_include1, $path, $full_xml_array[0], $where_parameters, $l_where_parameters, $where_values, $time_parameters, $help_parameters_names, $l_help_parameters, $min_time, $max_time, $found_in_xml, $matches, $cnt_matches, $errors, $l_errors)) {
			return FALSE;
		}
	}
	
	// Check output of function
	switch ($cnt_matches) {
		case 0:
			// Not found
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=9;
			if ($found_in_xml) {
				$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could be found in WOVOML file but time of object is not included in time of reference";
			}
			else {
				if ($l_field_value==0) {
					$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could neither be found in database nor in WOVOML file";
				}
				else {
					$errors[$l_errors]['message']="Reference to element '".substr($main_parameter_name, 1)."' with value '".$main_parameter_value."' from object '".$class['tag']."' with code '".$class['attributes']['CODE']."' could be found in database but time of object is not included in time of reference";
				}
			}
			$l_errors++;
			return FALSE;
		case 1:
			// Found once
			// Get ID and return TRUE
			$result=array();
			$result['type']="XML";
			$result['id']=$matches[0]['id'];
			break;
		default:
			// Found many times
			// If user has choice
			if ($choice=="yes") {
				// If user already gave his choice
				if ($answer!=NULL) {
					$result['type']="XML";
					$result['id']=$answer;
					$answer=NULL;
					return TRUE;
				}
				// Get help fields values
				$help_parameters_values=array();
				// Get ids
				$matches_ids=array();
				for ($i=0; $i<$cnt_matches; $i++) {
					$matches_ids[$i]=$matches[$i]['id'];
					$help_parameters_values[$i]=$matches[$i]['values'];
				}
				// Ask user
				require_once "php/funcs/navi_funcs.php";
				ask_user("v0_funcs", $class['tag'], $class['attributes']['CODE'], substr($main_parameter_name, 1), $main_parameter_value, $help_parameters_display_names, $help_parameters_values, $l_help_parameters, $matches_ids, $cnt_matches);
			}
			else {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1417;
				$errors[$l_errors]['message']="Multiple objects from the XML file correspond to these criteria: ".substr($where_parameters[0], 1)."='".$where_values[0]."'";
				for ($i=1; $i<$l_where_parameters; $i++) {
					$errors[$l_errors]['message'].=", ".substr($where_parameters[$i], 1)."='".$where_values[$i]."'";
				}
				$l_errors++;
				return FALSE;
			}
			break;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to find a referenced object with 'include1' and 'include2' conditions on time in same WOVOML file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $is_include1: boolean to know whether type of condition is 'include1' or 'include2'
* 			- $xml_path: the XML path to the classes which might be pointed by the link
* 			- $xml_class: the current XML class
* 			- $where_parameters: the names of parameters to be verified by the object
* 			- $l_where_parameters: the number of parameters to be verified by the object
* 			- $where_values: the values of parameters to be verified by the object
* 			- $time_parameters: the name of time paramaters for verifying conditions on time
* 			- $min_time: the minimum time to be included in time frame of object
* 			- $max_time: the maximum time to be included in time frame of object
* InOutput:	- $matches: array of matching objects
* 			- $cnt_matches: the count of matching objects so far
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_link_include_xml($is_include1, $xml_path, $xml_class, $where_parameters, $l_where_parameters, $where_values, $time_parameters, $help_parameters, $l_help_parameters, $min_time, $max_time, &$found_in_xml, &$matches, &$cnt_matches, &$errors, &$l_errors) {
	// Parse xml path
	$slash_pos=strpos($xml_path, "/");
	
	// If it's the last element
	if ($slash_pos===FALSE) {
		// Look for element
		for ($i=0; $i<count($xml_class['value']); $i++) {
			// Initialize variables
			$xml_element=$xml_class['value'][$i];
			
			// Compare elements
			if (strtoupper($xml_path)!=$xml_element['tag']) {
				continue;
			}
			
			// It's the right class
			// Compare attributes & elements
			$match=TRUE;
			
			for ($j=0; $j<$l_where_parameters; $j++) {
				// Local variables
				$parameter_name=$where_parameters[$j];
				
				// Get parameter value
				switch (substr($parameter_name, 0, 1)) {
					case '*':
						// Local element
						if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case '/':
						// Attribute
						if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case '#':
						// Function result
						if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					default:
						// Static value
						$parameter_value=$parameter_name;
				}
				
				// Compare values
				if ($parameter_value!=$where_values[$j]) {
					$match=FALSE;
					break;
				}
			}
			
			// If it is a match
			if ($match) {
				if (!$found_in_xml) {
					$found_in_xml=TRUE;
				}
				
				// Check time
				$time_values=array();
				
				// Get time values
				for ($j=0; $j<4; $j++) {
					// Local variables
					$parameter_name=$time_parameters[$j];
					
					// Get parameter value
					switch (substr($parameter_name, 0, 1)) {
						case '*':
							// Local element
							if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '/':
							// Attribute
							if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						case '#':
							// Function result
							if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
								return FALSE;
							}
							break;
						default:
							// Static value
							$parameter_value=$parameter_name;
					}
					
					// Store value
					$time_values[$j]=$parameter_value;
				}
				
				// Minimum start time
				if ($time_values[1]==NULL) {
					$min_start_time=$time_values[0];
				}
				else {
					require_once "php/funcs/datetime_funcs.php";
					if (!datetime_substract_datetime($time_values[0], $time_values[1], $min_start_time, $local_error)) {
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1514;
						$errors[$l_errors]['message']="Error when trying to calculate minimum start time [v0_check_link_include_xml] // ".$local_error;
						$l_errors++;
						return FALSE;
					}
				}
				// Maximum end time
				if ($time_values[2]==NULL) {
					$max_end_time="9999-12-31 23:59:59";
				}
				else {
					if ($time_values[3]==NULL) {
						$max_end_time=$time_values[2];
					}
					else {
						require_once "php/funcs/datetime_funcs.php";
						if (!datetime_add_datetime($time_values[2], $time_values[3], $max_end_time, $local_error)) {
							$errors[$l_errors]=array();
							$errors[$l_errors]['code']=1515;
							$errors[$l_errors]['message']="Error when trying to calculate maximum end time [v0_check_link_include_xml] // ".$local_error;
							$l_errors++;
							return FALSE;
						}
					}
				}
				
				// Compare time frames
				require_once "php/funcs/datetime_funcs.php";
				if (!datetime_dateframe_included($min_time, $max_time, $min_start_time, $max_end_time, $is_included, $local_error)) {
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1516;
					$errors[$l_errors]['message']="Error when trying to compare dates [v0_check_link_include_xml] // ".$local_error;
					$l_errors++;
					return FALSE;
				}
				
				// Depending on conditions type, different interpretations
				if (($is_include1 && $is_included!=0) || (!$is_include1 && $is_included==1)) {
					// It's a match
					
					// Get value for helping user to choose
					$help_values=array();
					
					for ($j=0; $j<$l_help_parameters; $j++) {
						// Local variables
						$parameter_name=$help_parameters[$j];
						
						// Get parameter value
						switch (substr($parameter_name, 0, 1)) {
							case '*':
								// Local element
								if (!v0_ul_get_element($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
									return FALSE;
								}
								break;
							case '/':
								// Attribute
								if (!v0_ul_get_attribute($parameter_name, $xml_element, $parameter_value, $errors, $l_errors)) {
									return FALSE;
								}
								break;
							case '#':
								// Function result
								if (!v0_ul_get_result($parameter_name, $xml_element, NULL, $parameter_value, $errors, $l_errors)) {
									return FALSE;
								}
								break;
							default:
								// Static value
								$parameter_value=$parameter_name;
						}
						
						// Store value
						$help_values[$j]=$parameter_value;
					}
					
					// Store ID and helping values
					$matches[$cnt_matches]=array();
					$matches[$cnt_matches]['id']=$xml_element['xml_id'];
					$matches[$cnt_matches]['values']=$help_values;
					
					$cnt_matches++;
				}
			}
		}
		return TRUE;
	}
	
	// It's not the last element
	// Get element name
	$element=strtoupper(substr($xml_path, 0, $slash_pos));
	// Remaining XML path
	$rem_xml_path=substr($xml_path, $slash_pos+1);
	// Loop on array
	for ($i=0; $i<count($xml_class['value']); $i++) {
		// Initialize variables
		$xml_element=$xml_class['value'][$i];
		
		// Compare elements
		if ($element!=$xml_element['tag']) {
			continue;
		}
		
		// It's the right element
		if (!v0_check_link_include_xml($is_include1, $rem_xml_path, $xml_element, $where_parameters, $l_where_parameters, $where_values, $time_parameters, $help_parameters, $l_help_parameters, $min_time, $max_time, $found_in_xml, $matches, $cnt_matches, $errors, $l_errors)) {
			return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check a time element of a class
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkTime' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $parent: the parent of the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_time($instruction, $class, $parent, &$errors, &$l_errors) {
	// Depending on type of instruction
	switch ($instruction['attributes']['TYPE']) {
		case "order":
			// Call v0_check_time_order
			if (!v0_check_time_order($instruction, $class, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "before":
			// Call v0_check_time_before
			if (!v0_check_time_before($instruction, $class, $parent, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "include2":
			// Call v0_check_time_include
			if (!v0_check_time_include($instruction, $class, $parent, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case "RSAM-SSAM":
			// Call v0_check_time_rsam_ssam
			if (!v0_check_time_rsam_ssam($instruction, $class, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1440;
			$errors[$l_errors]['message']="A type of 'checkTime' instruction in WOVOMLToWOVOdat.xml could not be recognized: ".$instruction['attributes']['TYPE'];
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check that the time of an element is indeed earlier than the time of a parent's element
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkTime' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_time_order($instruction, $class, &$errors, &$l_errors) {
	// Get number of parameters
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	if ($l_parameters<2) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1614;
		$errors[$l_errors]['message']="'checkTime' with type 'order' should have at least 2 parameters: ".$class['tag'];
		$l_errors++;
		return FALSE;
	}
	
	// Get 1st parameter values
	$p1_name=$parameters[0]['value'][0];
	// Get value of 1st parameter
	switch (substr($p1_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($p1_name, $class, $p1_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($p1_name, $class, $p1_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($p1_name, $class, NULL, $p1_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$p1_value=$p1_name;
	}
	
	// If a NULL value was returned
	if ($p1_value==NULL) {
		// Cannot check
		return TRUE;
	}
	
	// Loop on parameters starting from 2nd
	for ($i=1; $i<$l_parameters; $i++) {
		// Get next parameter values
		$p2_name=$parameters[$i]['value'][0];
		// Get value of parameter
		switch (substr($p2_name, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($p2_name, $class, $p2_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($p2_name, $class, $p2_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($p2_name, $class, NULL, $p2_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$p2_value=$p2_name;
		}
		
		// If a NULL value was returned
		if ($p2_value==NULL) {
			// Check next parameter
			continue;
		}
		
		// Compare times
		require_once "php/funcs/datetime_funcs.php";
		if (!datetime_date_before_date($p1_value, $p2_value, $is_before, $local_error)) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1516;
			$errors[$l_errors]['message']="Error when trying to compare dates [v0_check_time_order] // ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==2) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="Element ".substr($p1_name, 1)." from class ".$class['tag']." with code '".$class['attributes']['CODE']."' is supposed to be earlier than element ".substr($p2_name, 1);
			$l_errors++;
			return FALSE;
		}
		
		// Reloop
		$p1_name=$p2_name;
		$p1_value=$p2_value;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check that the time of an element is indeed earlier than the time of a parent's element
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkTime' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $parent: the parent of the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_time_before($instruction, $class, $parent, &$errors, &$l_errors) {
	// Get time from parent
	$timeframe_params=$instruction['value'][0]['value'];
	$opentime_name=$timeframe_params[0]['value'][0];
	$opentime_unc_name=$timeframe_params[1]['value'][0];
	
	// Get value of open time
	switch (substr($opentime_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($opentime_name, $parent, $opentime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($opentime_name, $parent, $opentime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($opentime_name, $parent, NULL, $opentime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$opentime_value=$opentime_name;
	}
	
	// If a NULL value was returned
	if ($opentime_value==NULL) {
		// Cannot check
		return TRUE;
	}
	
	// Get value of open time uncertainty
	switch (substr($opentime_unc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($opentime_unc_name, $parent, $opentime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($opentime_unc_name, $parent, $opentime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($opentime_unc_name, $parent, NULL, $opentime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$opentime_unc_value=$opentime_unc_name;
	}
	
	// Get time from current
	$timebefore_params=$instruction['value'][1]['value'];
	$time_name=$timebefore_params[0]['value'][0];
	$time_unc_name=$timebefore_params[1]['value'][0];
	
	// Get value of open time
	switch (substr($time_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($time_name, $class, $time_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($time_name, $class, $time_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($time_name, $class, NULL, $time_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$time_value=$time_name;
	}
	
	// If a NULL value was returned
	if ($time_value==NULL) {
		// Cannot check
		return TRUE;
	}
	
	// Get value of open time uncertainty
	switch (substr($time_unc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($time_unc_name, $class, $time_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($time_unc_name, $class, $time_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($time_unc_name, $class, NULL, $time_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$time_unc_value=$time_unc_name;
	}
	
	// Calculate maximum open time
	if ($opentime_unc_value==NULL) {
		$max_opentime=$opentime_value;
	}
	else {
		require_once "php/funcs/datetime_funcs.php";
		if (!datetime_add_datetime($opentime_value, $opentime_unc_value, $max_opentime, $local_error)) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1514;
			$errors[$l_errors]['message']="Error when trying to calculate minimum start time [v0_check_time_before] // ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Calculate minimum time
	if ($time_unc_value==NULL) {
		$min_time=$time_value;
	}
	else {
		require_once "php/funcs/datetime_funcs.php";
		if (!datetime_substract_datetime($time_value, $time_unc_value, $min_time, $local_error)) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1514;
			$errors[$l_errors]['message']="Error when trying to calculate minimum start time [v0_check_time_before] // ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Compare times
	require_once "php/funcs/datetime_funcs.php";
	if (!datetime_date_before_date($min_time, $max_opentime, $is_before, $local_error)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1516;
		$errors[$l_errors]['message']="Error when trying to compare dates [v0_check_time_before] // ".$local_error;
		$l_errors++;
		return FALSE;
	}
	if ($is_before==2) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="Element ".substr($time_name, 1)." from class ".$class['tag']." is supposed to be earlier than element ".substr($opentime_name, 1)." from class ".$parent['tag'];
		$l_errors++;
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check that the time of an element is indeed included within the timeframe of parent's elements
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkTime' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $parent: the parent of the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_time_include($instruction, $class, $parent, &$errors, &$l_errors) {
	// Get timeframe from parent
	$timeframe_params=$instruction['value'][0]['value'];
	$opentime_name=$timeframe_params[0]['value'][0];
	$opentime_unc_name=$timeframe_params[1]['value'][0];
	$closetime_name=$timeframe_params[2]['value'][0];
	$closetime_unc_name=$timeframe_params[3]['value'][0];
	
	// Get value of open time
	switch (substr($opentime_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($opentime_name, $parent, $opentime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($opentime_name, $parent, $opentime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($opentime_name, $parent, NULL, $opentime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$opentime_value=$opentime_name;
	}
	
	// If a NULL value was returned
	if ($opentime_value==NULL) {
		// Cannot check
		return TRUE;
	}
	
	// Get value of open time uncertainty
	switch (substr($opentime_unc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($opentime_unc_name, $parent, $opentime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($opentime_unc_name, $parent, $opentime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($opentime_unc_name, $parent, NULL, $opentime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$opentime_unc_value=$opentime_unc_name;
	}
	
	// Get value of close time
	switch (substr($closetime_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($closetime_name, $parent, $closetime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($closetime_name, $parent, $closetime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($closetime_name, $parent, NULL, $closetime_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$closetime_value=$closetime_name;
	}
	
	// Get value of close time uncertainty
	switch (substr($closetime_unc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($closetime_unc_name, $parent, $closetime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($closetime_unc_name, $parent, $closetime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($closetime_unc_name, $parent, NULL, $closetime_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$closetime_unc_value=$closetime_unc_name;
	}
	
	// Get time from current
	$timeframe_inc_params=$instruction['value'][1]['value'];
	$opentime_inc_name=$timeframe_inc_params[0]['value'][0];
	$opentime_inc_unc_name=$timeframe_inc_params[1]['value'][0];
	$closetime_inc_name=$timeframe_inc_params[2]['value'][0];
	$closetime_inc_unc_name=$timeframe_inc_params[3]['value'][0];
	
	// Get value of open time included
	switch (substr($opentime_inc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($opentime_inc_name, $class, $opentime_inc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($opentime_inc_name, $class, $opentime_inc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($opentime_inc_name, $class, NULL, $opentime_inc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$opentime_inc_value=$opentime_inc_name;
	}
	
	// If a NULL value was returned
	if ($opentime_inc_value==NULL) {
		// Cannot check
		return TRUE;
	}
	
	// Get value of open time included uncertainty
	switch (substr($opentime_inc_unc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($opentime_inc_unc_name, $class, $opentime_inc_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($opentime_inc_unc_name, $class, $opentime_inc_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($opentime_inc_unc_name, $class, NULL, $opentime_inc_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$opentime_inc_unc_value=$opentime_inc_unc_name;
	}
	
	// Get value of close time included
	switch (substr($closetime_inc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($closetime_inc_name, $class, $closetime_inc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($closetime_inc_name, $class, $closetime_inc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($closetime_inc_name, $class, NULL, $closetime_inc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$closetime_inc_value=$closetime_inc_name;
	}
	
	// Get value of close time included uncertainty
	switch (substr($closetime_inc_unc_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($closetime_inc_unc_name, $class, $closetime_inc_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($closetime_inc_unc_name, $class, $closetime_inc_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($closetime_inc_unc_name, $class, NULL, $closetime_inc_unc_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$closetime_inc_unc_value=$closetime_inc_unc_name;
	}
	
	// Calculate minimum open time
	if ($opentime_unc_value==NULL) {
		$min_opentime=$opentime_value;
	}
	else {
		require_once "php/funcs/datetime_funcs.php";
		if (!datetime_substract_datetime($opentime_value, $opentime_unc_value, $min_opentime, $local_error)) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1514;
			$errors[$l_errors]['message']="Error when trying to calculate minimum open time [v0_check_time_include] // ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Calculate maximum close time
	if ($closetime_value==NULL) {
		$max_closetime="9999-12-31 23:59:59";
	}
	else {
		if ($closetime_unc_value==NULL) {
			$max_closetime=$closetime_value;
		}
		else {
			require_once "php/funcs/datetime_funcs.php";
			if (!datetime_add_datetime($closetime_value, $closetime_unc_value, $max_closetime, $local_error)) {
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1514;
				$errors[$l_errors]['message']="Error when trying to calculate maximum close time [v0_check_time_include] // ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
	}
	
	// Calculate maximum open time included
	if ($opentime_inc_unc_value==NULL) {
		$max_opentime_inc=$opentime_inc_value;
	}
	else {
		require_once "php/funcs/datetime_funcs.php";
		if (!datetime_add_datetime($opentime_inc_value, $opentime_inc_unc_value, $max_opentime_inc, $local_error)) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1514;
			$errors[$l_errors]['message']="Error when trying to calculate maximum open time included [v0_check_time_include] // ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Calculate minimum close time included
	if ($closetime_inc_value==NULL) {
		$min_closetime_inc="9999-12-31 23:59:59";
	}
	else {
		if ($closetime_inc_unc_value==NULL) {
			$min_closetime_inc=$closetime_inc_value;
		}
		else {
			require_once "php/funcs/datetime_funcs.php";
			if (!datetime_substract_datetime($closetime_inc_value, $closetime_inc_unc_value, $min_closetime_inc, $local_error)) {
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1514;
				$errors[$l_errors]['message']="Error when trying to calculate minimum close time included [v0_check_time_include] // ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
	}
	
	// Compare times
	require_once "php/funcs/datetime_funcs.php";
	if (!datetime_dateframe_included($max_opentime_inc, $min_closetime_inc, $min_opentime, $max_closetime, $is_included, $local_error)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1516;
		$errors[$l_errors]['message']="Error when trying to compare dates [v0_check_time_include] // ".$local_error;
		$l_errors++;
		return FALSE;
	}
	if ($is_included!=1) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="Timeframe defined by elements ".substr($opentime_inc_name, 1)." and ".substr($closetime_inc_name, 1)." from class ".$class['tag']." with code '".$class['attributes']['CODE']."' shall be included in timeframe defined by elements ".substr($opentime_name, 1)." and ".substr($closetime_name, 1)." from class ".$parent['tag']." with code '".$parent['attributes']['CODE']."'";
		$l_errors++;
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check that the time RSAM-SSAM objects are correct
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkRSAM-SSAM' instruction from automaton file
* 			- $class: the RSAM-SSAM class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_time_rsam_ssam($instruction, $class, &$errors, &$l_errors) {
	// Get parameters of instruction
	$parameters=$instruction['value'];
	
	if (count($parameters)!=10) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1406;
		$errors[$l_errors]['message']="A 'checkTime' instruction with type 'RSAM-SSAM' in WOVOMLToWOVOdat.xml had the wrong number of parameters: ".count($parameters);
		$l_errors++;
		return FALSE;
	}
	
	// Get name of parameters
	$start_time_name=$parameters[6]['value'][0];
	$start_time_unc_name=$parameters[7]['value'][0];
	$low_freq_name=$parameters[8]['value'][0];
	$high_freq_name=$parameters[9]['value'][0];
	
	// Get RSAM and SSAM data
	$elements=$class['value'];
	$l_elements=count($elements);
	$rsam_found=FALSE;
	$ssam_found=FALSE;
	for ($i=0; $i<$l_elements; $i++) {
		$element=$elements[$i];
		
		if ($element['tag']=="RSAM") {
			$rsam_found=TRUE;
			$rsam_stime=array();
			$rsam_stime_unc=array();
			
			// Loop on elements
			$rsam_details=$element['value'];
			$l_rsam_details=count($rsam_details);
			
			for ($j=0; $j<$l_rsam_details; $j++) {
				$rsam_detail=$rsam_details[$j];
				
				// Get start time and start time uncertainty
				if (!v0_ul_get_element($start_time_name, $rsam_detail, $start_time, $errors, $l_errors)) {
					return FALSE;
				}
				if (!v0_ul_get_element($start_time_unc_name, $rsam_detail, $start_time_unc, $errors, $l_errors)) {
					return FALSE;
				}
				
				// Store
				$rsam_stime[$j]=$start_time;
				$rsam_stime_unc[$j]=$start_time_unc;
			}
		}
		
		if ($element['tag']=="SSAM") {
			$ssam_found=TRUE;
			$ssam_stime=array();
			$ssam_stime_unc=array();
			$ssam_lowf=array();
			$ssam_highf=array();
			
			// Loop on elements
			$ssam_details=$element['value'];
			$l_ssam_details=count($ssam_details);
			
			for ($j=0; $j<$l_ssam_details; $j++) {
				$ssam_detail=$ssam_details[$j];
				
				// Get start time, start time uncertainty, low and high frequency
				if (!v0_ul_get_element($start_time_name, $ssam_detail, $start_time, $errors, $l_errors)) {
					return FALSE;
				}
				if (!v0_ul_get_element($start_time_unc_name, $ssam_detail, $start_time_unc, $errors, $l_errors)) {
					return FALSE;
				}
				if (!v0_ul_get_element($low_freq_name, $ssam_detail, $low_freq, $errors, $l_errors)) {
					return FALSE;
				}
				if (!v0_ul_get_element($high_freq_name, $ssam_detail, $high_freq, $errors, $l_errors)) {
					return FALSE;
				}
				
				// Store
				$ssam_stime[$j]=$start_time;
				$ssam_stime_unc[$j]=$start_time_unc;
				$ssam_lowf[$j]=$low_freq;
				$ssam_highf[$j]=$high_freq;
			}
		}
	}
	
	// If no data was found, nothing to check
	if (!$rsam_found && !$ssam_found) {
		return TRUE;
	}
	
	// Get RSAM-SSAM open time
	$open_time=NULL;
	if (!v0_ul_get_element($parameters[0]['value'][0], $class, $open_time, $errors, $l_errors)) {
		return FALSE;
	}
	if ($open_time==NULL) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1407;
		$errors[$l_errors]['message']="The open time ('".$parameters[0]['value'][0]."' element) was not specified for '".$class['tag']."' with code '".$parent['attributes']['CODE']."'";
		$l_errors++;
		return FALSE;
	}
	
	// Get RSAM-SSAM open time uncertainty
	$open_time_unc=NULL;
	if (!v0_ul_get_element($parameters[1]['value'][0], $class, $open_time_unc, $errors, $l_errors)) {
		return FALSE;
	}
	
	// Datetime functions
	require_once "php/funcs/datetime_funcs.php";
	
	// Calculate minimum and maximum open time for RSAM-SSAM
	if ($open_time_unc==NULL) {
		$min_open_time=$open_time;
		$max_open_time=$open_time;
	}
	else {
		if (!datetime_get_min_max($open_time, $open_time_unc, $min_open_time, $max_open_time, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1222;
			$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum open time for RSAM-SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Get RSAM-SSAM close time
	$close_time=NULL;
	if (!v0_ul_get_element($parameters[2]['value'][0], $class, $close_time, $errors, $l_errors)) {
		return FALSE;
	}
	if ($close_time==NULL) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1407;
		$errors[$l_errors]['message']="The end time ('".$parameters[2]['value'][0]."' element) was not specified for '".$class['tag']."' with code '".$parent['attributes']['CODE']."'";
		$l_errors++;
		return FALSE;
	}
	
	// Get RSAM-SSAM close time uncertainty
	$close_time_unc=NULL;
	if (!v0_ul_get_element($parameters[3]['value'][0], $class, $close_time_unc, $errors, $l_errors)) {
		return FALSE;
	}
	
	// Calculate min end time and max end time for RSAM-SSAM
	if ($close_time_unc==NULL) {
		$min_close_time=$close_time;
		$max_close_time=$close_time;
	}
	else {
		if (!datetime_get_min_max($close_time, $close_time_unc, $min_close_time, $max_close_time, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1222;
			$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum end time for RSAM-SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
	}
	
	// Get RSAM-SSAM interval
	$interval=NULL;
	if (!v0_ul_get_element($parameters[4]['value'][0], $class, $interval, $errors, $l_errors)) {
		return FALSE;
	}
	if ($interval==NULL) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1407;
		$errors[$l_errors]['message']="The time interval ('".$parameters[4]['value'][0]."' element) was not specified for '".$class['tag']."' with code '".$parent['attributes']['CODE']."'";
		$l_errors++;
		return FALSE;
	}
	
	// Get RSAM-SSAM interval uncertainty
	$interval_unc=NULL;
	if (!v0_ul_get_element($parameters[5]['value'][0], $class, $interval_unc, $errors, $l_errors)) {
		return FALSE;
	}
	
	// Calculate int_min and int_max
	if ($interval_unc==NULL) {
		$interval_min=$interval;
		$interval_max=$interval;
	}
	else {
		$interval_min=$interval-$interval_unc;
		$interval_max=$interval+$interval_unc;
	}
	
	// If RSAM found, check it
	if ($rsam_found) {
		// Check RSAM
		
		// Check RSAM first start date
		
		// Sort RSAM array by start date
		if (!array_multisort($rsam_stime, $rsam_stime_unc)) {
			// Server error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=3407;
			$errors[$l_errors]['message']="Error when trying to sort dates of RSAM data";
			$l_errors++;
			return FALSE;
		}
		
		// Calculate minimum and maximum start time for RSAM
		if ($rsam_stime_unc[0]==NULL) {
			$min_rsam_stime=$rsam_stime[0];
			$max_rsam_stime=$rsam_stime[0];
		}
		else {
			if (!datetime_get_min_max($rsam_stime[0], $rsam_stime_unc[0], $min_rsam_stime, $max_rsam_stime, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1224;
				$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		/* RELAX CHECK FIRST START TIME OF RSAM - START */
		
		// If max_rsam_stime < min_open_time => error
		if (!datetime_date_before_date($max_rsam_stime, $min_open_time, $is_before, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1231;
			$errors[$l_errors]['message']="Error when trying to compare start time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==0) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="'RSAM' data was found to have earlier date than what was stated for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$max_rsam_stime." (max_rsam_stime) < ".$min_open_time." (min_open_time)";
			$l_errors++;
			return FALSE;
		}
		
		/*
		// Check if RSAM start time frame is included in RSAM-SSAM start time frame
		if (!datetime_dateframe_included($min_rsam_stime, $max_rsam_stime, $min_open_time, $max_open_time, $is_included, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The start time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' and those given in 'RSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		if ($is_included==0) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The start time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' and those given in 'RSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		*/
		
		/* RELAX CHECK FIRST START TIME OF RSAM - END */
		
		// Check intervals between each RSAM time
		
		// 1st time - calculate t1_min and t1_max
		if ($rsam_stime_unc[0]==NULL) {
			$t1_min=$rsam_stime[0];
			$t1_max=$rsam_stime[0];
		}
		else {
			if (!datetime_get_min_max($rsam_stime[0], $rsam_stime_unc[0], $t1_min, $t1_max, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1227;
				$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		/* DO NOT CHECK INTERVALS - START
		// Loop on RSAM times starting from 2nd one
		for ($i=1; $i<$l_rsam_details; $i++) {
			// Calculate t2_min and t2_max
			if ($rsam_stime_unc[$i]==NULL) {
				$t2_min=$rsam_stime[$i];
				$t2_max=$rsam_stime[$i];
			}
			else {
				if (!datetime_get_min_max($rsam_stime[$i], $rsam_stime_unc[$i], $t2_min, $t2_max, $local_error)) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1228;
					$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum start time for RSAM: ".$local_error;
					$l_errors++;
					return FALSE;
				}
			}
			
			// Calculate t1_min + interval_min
			if (!datetime_add_seconds($t1_min, $interval_min, $theo_t2_max, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1229;
				$errors[$l_errors]['message']="Error when trying to calculate maximum theorical start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
			// If t1_min + interval_min > t2_max => error
			if (!datetime_date_before_date($theo_t2_max, $t2_max, $theo_is_before, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1231;
				$errors[$l_errors]['message']="Error when trying to compare maximum theorical start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
			if ($theo_is_before==2) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2;
				$errors[$l_errors]['message']="The start times given in 'RSAM' do not match with 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$t1_min." (t1_min) + ".$interval_min." (interval_min) > ".$t2_max." (t2_max)";
				$l_errors++;
				return FALSE;
			}
			
			// Calculate t1_max + interval_max
			if (!datetime_add_seconds($t1_max, $interval_max, $theo_t2_min, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1230;
				$errors[$l_errors]['message']="Error when trying to calculate minimum theorical start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
			// If t1_max + interval_max < t2_min => error
			if (!datetime_date_before_date($theo_t2_min, $t2_min, $theo_is_before, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1232;
				$errors[$l_errors]['message']="Error when trying to compare minimum theorical start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
			if ($theo_is_before==0) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2;
				$errors[$l_errors]['message']="The start times given in 'RSAM' do not match with 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$t1_max." (t1_max) + ".$interval_max." (interval_max) < ".$t2_min." (t2_min)";
				$l_errors++;
				return FALSE;
			}
			
			// Ready to reloop
			$t1_min=$t2_min;
			$t1_max=$t2_max;
		}
		DO NOT CHECK INTERVALS - END */
		/* CONSEQUENCES OF "DO NOT CHECK INTERVALS" - START */
		
		// Calculate last time
		if ($rsam_stime_unc[$l_rsam_details-1]==NULL) {
			$t2_min=$rsam_stime[$l_rsam_details-1];
			$t2_max=$rsam_stime[$l_rsam_details-1];
		}
		else {
			if (!datetime_get_min_max($rsam_stime[$l_rsam_details-1], $rsam_stime_unc[$l_rsam_details-1], $t2_min, $t2_max, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1228;
				$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum start time for RSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		/* CONSEQUENCES - END */
		
		// Check RSAM end time
		
		// Calculate min end time and max end time for RSAM
		if (!datetime_add_seconds($t2_min, $interval_min, $min_rsam_etime, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1233;
			$errors[$l_errors]['message']="Error when trying to calculate minimum end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if (!datetime_add_seconds($t2_max, $interval_max, $max_rsam_etime, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1234;
			$errors[$l_errors]['message']="Error when trying to calculate maximum end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		
		/* RELAX CHECK FIRST END TIME OF RSAM - START */
		
		// If min_rsam_etime > max_close_time => error
		if (!datetime_date_before_date($min_rsam_etime, $max_close_time, $is_before, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1231;
			$errors[$l_errors]['message']="Error when trying to compare end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==2) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="'RSAM' data was found to have later date than what was stated for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$min_rsam_etime." (min_rsam_etime) > ".$max_close_time." (max_close_time)";
			$l_errors++;
			return FALSE;
		}
		
		/*
		// Check if RSAM end time frame is included in RSAM-SSAM end time frame
		if (!datetime_dateframe_included($min_rsam_etime, $max_rsam_etime, $min_close_time, $max_close_time, $is_included, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The end time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' and those given in 'RSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		if ($is_included==0) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The end time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' and those given in 'RSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		*/
		
		/* RELAX CHECK FIRST END TIME OF RSAM - END */
		
	}
	
	// If SSAM found, check it
	if ($ssam_found) {
		// Check SSAM
		
		// Sort SSAM array by start date and low frequency
		if (!array_multisort($ssam_stime, $ssam_lowf, $ssam_stime_unc, $ssam_highf)) {
			// Server error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=3408;
			$errors[$l_errors]['message']="Error when trying to sort dates and low frequency of SSAM data";
			$l_errors++;
			return FALSE;
		}
		
		// Check first date of SSAM
		
		// Calculate minimum and maximum start time for SSAM
		if ($ssam_stime_unc[0]==NULL) {
			$min_ssam_stime=$ssam_stime[0];
			$max_ssam_stime=$ssam_stime[0];
		}
		else {
			if (!datetime_get_min_max($ssam_stime[0], $ssam_stime_unc[0], $min_ssam_stime, $max_ssam_stime, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1224;
				$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum start time for SSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		/* RELAX CHECK FIRST START TIME OF SSAM - START */
		
		// If max_ssam_stime < min_open_time => error
		if (!datetime_date_before_date($max_ssam_stime, $min_open_time, $is_before, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1231;
			$errors[$l_errors]['message']="Error when trying to compare start time for SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==0) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="'SSAM' data was found to have earlier date than what was stated for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$max_ssam_stime." (max_ssam_stime) < ".$min_open_time." (min_open_time)";
			$l_errors++;
			return FALSE;
		}
		
		/*
		// Check if SSAM start time frame is included in RSAM-SSAM start time frame
		if (!datetime_dateframe_included($min_ssam_stime, $max_ssam_stime, $min_open_time, $max_open_time, $is_included, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The start time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' and those given in 'SSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		if ($is_included==0) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The start time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' and those given in 'SSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		*/
		
		/* RELAX CHECK FIRST START TIME OF SSAM - END */
		
		// Check intervals between each SSAM time
		
		// 1st time - calculate t1_min and t1_max
		if ($ssam_stime_unc[0]==NULL) {
			$t1_min=$ssam_stime[0];
			$t1_max=$ssam_stime[0];
		}
		else {
			if (!datetime_get_min_max($ssam_stime[0], $ssam_stime_unc[0], $t1_min, $t1_max, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1227;
				$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum start time for SSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		$stime1=$ssam_stime[0];
		$highf1=$ssam_highf[0];
		
		// Minimum low frequency and maximum high frequency
		$min_low_freq=$ssam_lowf[0];
		$max_high_freq=NULL;
		
		/* DO NOT CHECK INTERVALS - START
		// Loop on SSAM times starting from 2nd one
		for ($i=1; $i<$l_ssam_details; $i++) {
			// Local variables
			$stime2=$ssam_stime[$i];
			$stime2_unc=$ssam_stime_unc[$i];
			$lowf2=$ssam_lowf[$i];
			$highf2=$ssam_highf[$i];
			
			// If start time is same
			if ($stime1==$stime2) {
				// Check frequency
				
				// If low frequency is different to the previous high frequency
				if ($lowf2!=$highf1) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=2;
					$errors[$l_errors]['message']="The frequencies given in 'SSAM' for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' are not continuous";
					$l_errors++;
					return FALSE;
				}
			}
			else {
				// Check time
				
				// Calculate t2_min and t2_max
				if ($stime2_unc==NULL) {
					$t2_min=$stime2;
					$t2_max=$stime2;
				}
				else {
					if (!datetime_get_min_max($stime2, $stime2_unc, $t2_min, $t2_max, $local_error)) {
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1228;
						$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum start time for SSAM: ".$local_error;
						$l_errors++;
						return FALSE;
					}
				}
				
				// Calculate t1_min + interval_min
				if (!datetime_add_seconds($t1_min, $interval_min, $theo_t2_max, $local_error)) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1229;
					$errors[$l_errors]['message']="Error when trying to calculate maximum theorical start time for SSAM: ".$local_error;
					$l_errors++;
					return FALSE;
				}
				// If t1_min + interval_min > t2_max => error
				if (!datetime_date_before_date($theo_t2_max, $t2_max, $theo_is_before, $local_error)) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1231;
					$errors[$l_errors]['message']="Error when trying to compare maximum theorical start time for SSAM: ".$local_error;
					$l_errors++;
					return FALSE;
				}
				if ($theo_is_before==2) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=2;
					$errors[$l_errors]['message']="The start times given in 'SSAM' do not match with 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$t1_min." (t1_min) + ".$interval_min." (interval_min) > ".$t2_max." (t2_max)";
					$l_errors++;
					return FALSE;
				}
				
				// Calculate t1_max + interval_max
				if (!datetime_add_seconds($t1_max, $interval_max, $theo_t2_min, $local_error)) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1230;
					$errors[$l_errors]['message']="Error when trying to calculate minimum theorical start time for SSAM: ".$local_error;
					$l_errors++;
					return FALSE;
				}
				// If t1_max + interval_max < t2_min => error
				if (!datetime_date_before_date($theo_t2_min, $t2_min, $theo_is_before, $local_error)) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1232;
					$errors[$l_errors]['message']="Error when trying to compare minimum theorical start time for SSAM: ".$local_error;
					$l_errors++;
					return FALSE;
				}
				if ($theo_is_before==0) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=2;
					$errors[$l_errors]['message']="The start times given in 'SSAM' do not match with 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$t1_max." (t1_max) + ".$interval_max." (interval_max) < ".$t2_min." (t2_min)";
					$l_errors++;
					return FALSE;
				}
				
				// Check low frequency value
				if ($lowf2!=$min_low_freq) {
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=2;
					$errors[$l_errors]['message']="The frequencies given in 'SSAM' for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' are not correct";
					$l_errors++;
					return FALSE;
				}
				
				// Check high frequency value
				if ($max_high_freq==NULL) {
					// Set max high frequency value
					$max_high_freq=$highf1;
				}
				else {
					// Check previous high frequency value
					if ($highf1!=$max_high_freq) {
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=2;
						$errors[$l_errors]['message']="The frequencies given in 'SSAM' for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' are not correct";
						$l_errors++;
						return FALSE;
					}
				}
				// Ready to reloop
				$t1_min=$t2_min;
				$t1_max=$t2_max;
				$stime1=$stime2;
			}
			// Ready to reloop
			$highf1=$highf2;
		}
		
		// Check last high frequency value
		if ($highf1!=$max_high_freq) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The frequencies given in 'SSAM' for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."' are not correct";
			$l_errors++;
			return FALSE;
		}
		DO NOT CHECK INTERVALS - END */
		/* CONSEQUENCES OF "DO NOT CHECK INTERVALS" - START */
		
		// Calculate last time
		if ($ssam_stime_unc[$l_ssam_details-1]==NULL) {
			$t2_min=$ssam_stime[$l_ssam_details-1];
			$t2_max=$ssam_stime[$l_ssam_details-1];
		}
		else {
			if (!datetime_get_min_max($ssam_stime[$l_ssam_details-1], $ssam_stime_unc[$l_ssam_details-1], $t2_min, $t2_max, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1228;
				$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum last time for SSAM: ".$local_error;
				$l_errors++;
				return FALSE;
			}
		}
		
		/* CONSEQUENCES - END */
		
		// Check SSAM end time
		
		// Calculate min end time and max end time for SSAM
		if (!datetime_add_seconds($t2_min, $interval_min, $min_ssam_etime, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1233;
			$errors[$l_errors]['message']="Error when trying to calculate minimum end time for SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if (!datetime_add_seconds($t2_max, $interval_max, $max_ssam_etime, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1234;
			$errors[$l_errors]['message']="Error when trying to calculate maximum end time for SSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		
		/* RELAX CHECK LAST END TIME OF SSAM - START */
		
		// If min_ssam_etime > max_close_time => error
		if (!datetime_date_before_date($min_ssam_etime, $max_close_time, $is_before, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1231;
			$errors[$l_errors]['message']="Error when trying to compare end time for RSAM: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		if ($is_before==2) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="'RSAM' data was found to have later date than what was stated for 'RSAM-SSAM' with code '".$class['attributes']['CODE']."': ".$min_ssam_etime." (min_ssam_etime) > ".$max_close_time." (max_close_time)";
			$l_errors++;
			return FALSE;
		}
		
		/*
		// Check if SSAM end time frame is included in RSAM-SSAM end time frame
		if (!datetime_dateframe_included($min_ssam_etime, $max_ssam_etime, $min_close_time, $max_close_time, $is_included, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The end time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']." and those given in 'SSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		if ($is_included==0) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The end time given for 'RSAM-SSAM' with code '".$class['attributes']['CODE']." and those given in 'SSAM' do not match";
			$l_errors++;
			return FALSE;
		}
		*/
		
		/* RELAX CHECK LAST END TIME OF SSAM - END */
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check the relationship between values of elements in a class
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkValue' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_value($instruction, $class, &$errors, &$l_errors) {
	// Get parameters
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Check number of parameters: 2
	if ($l_parameters!=2) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1406;
		$errors[$l_errors]['message']="A 'checkValue' instruction in WOVOMLToWOVOdat.xml had the wrong number of parameters for class '".$class['tag']."'";
		$l_errors++;
		return FALSE;
	}
	
	// Get parameter values
	
	// 1st parameter
	$p1_name=$parameters[0]['value'][0];
	
	// Depending on the first character of the parameter, we have to call different functions
	switch (substr($p1_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($p1_name, $class, $p1_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($p1_name, $class, $p1_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($p1_name, $class, NULL, $p1_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$p1_value=$p1_name;
	}
	
	// If a NULL value was returned
	if ($p1_value==NULL) {
		// Cannot check
		return TRUE;
	}
	
	// 2nd parameter
	$p2_name=$parameters[1]['value'][0];
	
	// Depending on the first character of the parameter, we have to call different functions
	switch (substr($p2_name, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($p2_name, $class, $p2_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($p2_name, $class, $p2_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($p2_name, $class, NULL, $p2_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$p2_value=$p2_name;
	}
	
	// If a NULL value was returned
	if ($p2_value==NULL) {
		// Cannot check
		return TRUE;
	}
	
	// Get type (float, integer...)
	switch ($instruction['attributes']['TYPE']) {
		case "float":
			$p1_value=floatval($p1_value);
			$p2_value=floatval($p2_value);
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1406;
			$errors[$l_errors]['message']="A 'checkValue' instruction in WOVOMLToWOVOdat.xml has an unknown type: ".$instruction['attributes']['TYPE'];
			$l_errors++;
			return FALSE;
	}
	
	// Get comparison type
	switch ($instruction['attributes']['COMPARISON']) {
		case "less_than":
			// Compare values
			if ($p1_value>=$p2_value) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2;
				$errors[$l_errors]['message']="Element '".substr($p1_name, 1)."' from class '".$class['tag']." is supposed to be strictly less than element '".substr($p2_name, 1)."': ".$p1_value." &ge; ".$p2_value;
				$l_errors++;
				return FALSE;
			}
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1406;
			$errors[$l_errors]['message']="A 'checkValue' instruction in WOVOMLToWOVOdat.xml has an unknown comparison type: ".$instruction['attributes']['COMPARISON'];
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check the pixels of a list
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'checkPixels' instruction from automaton file
* 			- $class: the class for which the instruction is being done
* 			- $parent: the parent of the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_check_pixels($instruction, $class, $parent, &$errors, &$l_errors) {
	// Get parameters of instruction
	$parameters=$instruction['value'];
	
	if (count($parameters)!=3) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1406;
		$errors[$l_errors]['message']="A '".$class['tag']."' instruction in WOVOMLToWOVOdat.xml had the wrong number of parameters: ".count($parameters);
		$l_errors++;
		return FALSE;
	}
	
	// Get number of rows
	$n_rows=NULL;
	if (!v0_ul_get_element($parameters[0]['value'][0], $parent, $n_rows, $errors, $l_errors)) {
		return FALSE;
	}
	if ($n_rows==NULL) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1407;
		$errors[$l_errors]['message']="The number of rows ('".$parameters[0]['value'][0]."' element) was not specified for '".$parent['tag']."' with code '".$parent['attributes']['CODE']."'";
		$l_errors++;
		return FALSE;
	}
	
	// Get number of columns
	$n_cols=NULL;
	if (!v0_ul_get_element($parameters[1]['value'][0], $parent, $n_cols, $errors, $l_errors)) {
		return FALSE;
	}
	if ($n_cols==NULL) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1408;
		$errors[$l_errors]['message']="The number of columns ('".$parameters[1]['value'][0]."' element) was not specified for '".$parent['tag']."' with code '".$parent['attributes']['CODE']."'";
		$l_errors++;
		return FALSE;
	}
	
	// Check number of pixels
	$pixels=$class['value'];
	$l_pixels=count($pixels);
	$number_of_pixels=$n_rows*$n_cols;
	if ($l_pixels!=$number_of_pixels) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=2;
		$errors[$l_errors]['message']="The number of '".$class['tag']."' elements do not correspond to (number of rows * number of columns) for '".$parent['tag']."' with code '".$parent['attributes']['CODE']."'";
		$l_errors++;
		return FALSE;
	}
	
	// Get name of parameter for pixel numbers
	$parameter_name=$parameters[2]['value'][0];
	
	// Prepare list of pixels encountered
	$pixels_listed=array();
	
	// Loop on pixels
	for ($i=0; $i<$l_pixels; $i++) {
		// Local variable
		$pixel=$pixels[$i];
		
		// Get pixel number
		if (!v0_ul_get_element($parameter_name, $pixel, $pixel_number, $errors, $l_errors)) {
			return FALSE;
		}
		
		// Check it's > 0 and <= number of pixels
		if ($pixel_number<1 || $pixel_number>$number_of_pixels) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2;
			$errors[$l_errors]['message']="The number of an '".$pixel['tag']."' element was ".$pixel_number." but it should be included between 1 and ".$number_of_pixels." (number of rows * number of columns)";
			$l_errors++;
			return FALSE;
		}
		
		// Check duplication
		if ($pixels_listed[$pixel_number]==TRUE) {
			// Error: duplication
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=7;
			$errors[$l_errors]['message']="Element '".$pixel['tag']."' with number '".$pixel_number."' was found to be duplicated for '".$parent['tag']."' with code '".$parent['attributes']['CODE']."'";
			$l_errors++;
			return FALSE;
		}
		
		$pixels_listed[$pixel_number]=TRUE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'prepareData' instruction contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'prepareData' instruction
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* InOutput:	- $class: the class for which the instruction is being done
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_prepare_data($instruction, $gen_pub_date, $current_time, $check_pubdate, &$class, &$errors, &$l_errors) {
	// Get parameters of instruction
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Depending on type of instruction
	switch ($instruction['attributes']['TYPE']) {
		case "pubDate":
			if ($check_pubdate) {
				// Get maximum publish date for a class of data
				if (!v0_prepare_pubdate($parameters, $l_parameters, $class, $gen_pub_date, $current_time, $result, $errors, $l_errors)) {
					return FALSE;
				}
			}
			else {
				// Don't check publish date, get local or general publish date or return NULL
				if (!v0_prepare_pubdate_no_limit($class, $gen_pub_date, $result, $errors, $l_errors)) {
					return FALSE;
				}
			}
			// Store returned value
			$target=$instruction['attributes']['TARGET'];
			$class['results'][$target]=$result;
			break;
		case "microseconds":
			// Call v0_prepare_microseconds
			if (!v0_prepare_microseconds($parameters, $l_parameters, $class, $result, $errors, $l_errors)) {
				return FALSE;
			}
			// Store returned value
			$target=$instruction['attributes']['TARGET'];
			$class['results'][$target]=$result;
			break;
		case "dateBC":
			// Call v0_prepare_datebc
			if (!v0_prepare_datebc($parameters, $l_parameters, $class, $result1, $result2, $errors, $l_errors)) {
				return FALSE;
			}
			// Store returned values
			$target1=$instruction['attributes']['TARGET1'];
			$class['results'][$target1]=$result1;
			$target2=$instruction['attributes']['TARGET2'];
			$class['results'][$target2]=$result2;
			break;
		case "event_flag":
			// Call v0_prepare_event_flag
			if (!v0_prepare_event_flag($parameters, $l_parameters, $class, $result, $errors, $l_errors)) {
				return FALSE;
			}
			// Store returned value
			$target=$instruction['attributes']['TARGET'];
			$class['results'][$target]=$result;
			break;
		case "combine_species":
			// Call v0_prepare_species
			if (!v0_prepare_species($parameters, $l_parameters, $class, $result1, $result2, $result3, $result4, $errors, $l_errors)) {
				return FALSE;
			}
			// Store returned values
			$target1=$instruction['attributes']['TARGET1'];
			$class['results'][$target1]=$result1;
			$target2=$instruction['attributes']['TARGET2'];
			if ($target2!="none") {
				$class['results'][$target2]=$result2;
			}
			$target3=$instruction['attributes']['TARGET3'];
			$class['results'][$target3]=$result3;
			$target4=$instruction['attributes']['TARGET4'];
			$class['results'][$target4]=$result4;
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1405;
			$errors[$l_errors]['message']="A type of prepareData instruction in WOVOMLToWOVOdat.xml could not be recognized: ".$instruction['attributes']['TYPE'];
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do get the publish date; function used for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $parameters: the parameters of the 'function' instruction from the automaton file
* 			- $l_parameters: the number of parameters
* 			- $class: the class for which the instruction is being done
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value: the processed value
******************************************************************************************************/
function v0_prepare_pubdate($parameters, $l_parameters, $class, $gen_pub_date, $current_time, &$result_value, &$errors, &$l_errors) {
	// Get parameters in function instruction and add 2 years
	$real_parameter_value=NULL;
	// Loop on parameters
	for ($i=0; $i<$l_parameters; $i++) {
		// If no parameter
		if ($i==0 && !is_array($parameters[0])) {
			break;
		}
		
		// Get parameter
		$parameter=$parameters[$i]['value'][0];
		
		// Depending on the first character of the parameter, we have to call different functions
		switch (substr($parameter, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter, $class, NULL, $real_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_parameter_value=$parameter;
		}
		
		// If a non NULL value was returned
		if ($real_parameter_value!=NULL) {
			// No need to go further
			break;
		}
	}
	
	// If all parameters were NULL
	if ($real_parameter_value==NULL) {
		// Get current date
		$real_parameter_value=$current_time;
	}
	
	// Calculate maximum publish date (= 2 years from "real parameter value")
	require_once "php/funcs/datetime_funcs.php";
	if (!datetime_add_datetime($real_parameter_value, "0002-00-00 00:00:00", $max_pubdate, $local_error)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1516;
		$errors[$l_errors]['message']="Error when adding a date [v0_prepare_pubdate] // ".$local_error;
		$l_errors++;
		return FALSE;
	}
	
	// Get local publish date
	$elements=$class['value'];
	$l_elements=count($elements);
	
	// Loop on elements
	$local_pubdate=NULL;
	for ($i=0; $i<$l_elements; $i++) {
		// Local variables
		$element=&$elements[$i];
		
		// Compare element name
		if ($element['tag']!="PUBDATE") {
			continue;
		}
		
		// Local pubdate found
		$local_pubdate=$element['value'][0];
			
		break;
	}
	
	// Get user publish date
	if ($local_pubdate==NULL) {
		// No local publish date
		$user_pubdate=$gen_pub_date; // may be NULL
	}
	else {
		// Use local publish date
		$user_pubdate=$local_pubdate;
	}
	
	// If no user publish date was defined
	if ($user_pubdate==NULL) {
		// Return max publish date
		$result_value=$max_pubdate;
		return TRUE;
	}
	
	// Compare user publish date with max publish date
	if (!datetime_date_before_date($user_pubdate, $max_pubdate, $is_before, $local_error)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1517;
		$errors[$l_errors]['message']="Error when comparing dates [v0_prepare_pubdate] // ".$local_error;
		$l_errors++;
		return FALSE;
	}
	
	// If the user publish date is bigger than max publish date
	if ($is_before==2) {
		// Return max publish date
		$result_value=$max_pubdate;
	}
	else {
		// Return user publish date
		$result_value=$user_pubdate;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do get the publish date; function used for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $class: the class for which the instruction is being done
* 			- $gen_pub_date: the general publish date
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value: the processed value
******************************************************************************************************/
function v0_prepare_pubdate_no_limit($class, $gen_pub_date, &$result_value, &$errors, &$l_errors) {
	// Get local publish date
	$real_parameter_value=NULL;
	if (!v0_ul_get_element("*pubDate", $class, $real_parameter_value, $errors, $l_errors)) {
		return FALSE;
	}
	
	// If local publish date was found, return it
	if ($real_parameter_value!=NULL) {
		$result_value=$real_parameter_value;
		return TRUE;
	}
	
	// Return general publish date (may be NULL)
	$result_value=$gen_pub_date;
	return TRUE;
}

/******************************************************************************************************
* Function to do get the microseconds from a datetime string; function used for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $inst: the array of the 'function' instruction from the automaton file
* 			- $l_inst: the length of the array of the function instruction
* 			- $class: the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value: the processed value
******************************************************************************************************/
function v0_prepare_microseconds($inst, $l_inst, $class, &$result_value, &$errors, &$l_errors) {
	// Check number of parameters
	if ($l_inst!=1) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1055;
		$errors[$l_errors]['message']="A 'get_microseconds' instruction has less or more than 1 parameter";
		$l_errors++;
		return FALSE;
	}
	
	// Get parameter
	$parameter=$inst[0]['value'][0];
	
	// Depending on the first character of the parameter, we have to call different functions
	switch (substr($parameter, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($parameter, $class, NULL, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$real_parameter_value=$parameter;
	}
	
	// If a NULL value was returned
	if ($real_parameter_value==NULL) {
		// Return NULL value for result
		$result_value=NULL;
		return TRUE;
	}
	
	// Find "." from the end of the string
	$last_point_pos=strrpos($real_parameter_value, ".");
	if ($last_point_pos===FALSE) {
		// Return NULL value for result
		$result_value=NULL;
		return TRUE;
	}
	// Cut the end of the string (including ".") and this is the value to return
	$result_value=substr($real_parameter_value, $last_point_pos);
	
	return TRUE;
}

/******************************************************************************************************
* Function to do get the publish date; function used for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $parameters: the parameters of the 'function' instruction from the automaton file
* 			- $l_parameters: the number of parameters
* 			- $class: the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value1: the 1st processed value
* 			- $result_value2: the 2nd processed value
******************************************************************************************************/
function v0_prepare_datebc($parameters, $l_parameters, $class, &$result_value1, &$result_value2, &$errors, &$l_errors) {
	// Get parameters in function instruction
	$real_parameter_value=NULL;
	
	// Check number of parameters
	if ($l_parameters!=1) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1526;
		$errors[$l_errors]['message']="Number of parameters for 'dateBC' function is not 1 but ".$l_parameters." for '".$class['tag']."' code=\"".$class['attributes']['CODE']."\"";
		$l_errors++;
		return FALSE;
	}
	
	// Get parameter
	$parameter=$parameters[0]['value'][0];
		
	// Depending on the first character of the parameter, we have to call different functions
	switch (substr($parameter, 0, 1)) {
		case '*':
			// Local element
			if (!v0_ul_get_element($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!v0_ul_get_attribute($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!v0_ul_get_result($parameter, $class, NULL, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Static value
			$real_parameter_value=$parameter;
	}
	
	// If a NULL value was returned
	if ($real_parameter_value==NULL) {
		// Return NULL
		$result_value1=NULL;
		$result_value2=NULL;
		return TRUE;
	}
	
	// Get year value
	$first_dash=strpos($real_parameter_value, "-");
	if ($first_dash==0) {
		$is_bc=TRUE;
		$first_dash=strpos($real_parameter_value, "-", 1);
		$year_str=substr($real_parameter_value, 1, $first_dash-1);
		if (!ctype_digit($year_str)) {
			$error="Date is not in correct ISO format (YYYY-MM-DD HH:MM:SS)";
			return FALSE;
		}
		$year_str="-".$year_str;
		$date_no_year=substr($real_parameter_value, $first_dash+1);
		$result_value1="0000-".$date_no_year;
		$result_value2=$year_str;
	}
	else {
		$result_value1=$real_parameter_value;
		$result_value2=NULL;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do get the event flag; function used for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $inst: the array of the 'function' instruction from the automaton file
* 			- $l_inst: the length of the array of the function instruction
* 			- $class: the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value: the processed value
******************************************************************************************************/
function v0_prepare_event_flag($inst, $l_inst, $class, &$result_value, &$errors, &$l_errors) {
	// Check number of parameters
	if ($l_inst==0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1055;
		$errors[$l_errors]['message']="A 'get_event_flag' instruction has less or more than 1 parameter";
		$l_errors++;
		return FALSE;
	}
	
	// Loop on parameters
	for ($i=0; $i<$l_inst; $i++) {
		$parameter=$inst[$i]['value'][0];
		
		$real_parameter_value=NULL;
		
		// Local element
		if (!v0_ul_get_element($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
			return FALSE;
		}
		
		// If a value was returned
		if ($real_parameter_value!=NULL) {
			if ($parameter=="*networkEventCode") {
				$result_value="N";
				return TRUE;
			}
			if ($parameter=="*singleStationEventCode") {
				$result_value="S";
				return TRUE;
			}
			if ($parameter=="*tremorCode") {
				$result_value="T";
				return TRUE;
			}
		}
	}
	
	// Value was not found
	$errors[$l_errors]=array();
	$errors[$l_errors]['code']=1529;
	$errors[$l_errors]['message']="An event flag could not be given";
	$l_errors++;
	return FALSE;
}

/******************************************************************************************************
* Function to do get the publish date; function used for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $parameters: the parameters of the 'function' instruction from the automaton file
* 			- $l_parameters: the number of parameters
* 			- $class: the class for which the instruction is being done
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value1: the 1st processed value
* 			- $result_value2: the 2nd processed value
* 			- $result_value3: the 3rd processed value
* 			- $result_value4: the 4th processed value
******************************************************************************************************/
function v0_prepare_species($parameters, $l_parameters, $class, &$result_value1, &$result_value2, &$result_value3, &$result_value4, &$errors, &$l_errors) {
	// Get parameters in function instruction
	$real_parameter_value=NULL;
	
	// Check number of parameters
	if ($l_parameters==0) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1526;
		$errors[$l_errors]['message']="No parameter for 'combine_species' function was found for '".$class['tag']."' code=\"".$class['attributes']['CODE']."\"";
		$l_errors++;
		return FALSE;
	}
	
	// Loop on parameters
	for ($i=0; $i<$l_parameters; $i++) {
		// Get parameter
		$parameter=$parameters[$i]['value'][0];
			
		// Depending on the first character of the parameter, we have to call different functions
		switch (substr($parameter, 0, 1)) {
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter, $class, NULL, $real_parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_parameter_value=$parameter;
		}
		
		// If a NULL value was returned, continue
		if ($real_parameter_value==NULL) {
			continue;
		}
		
		// A value was returned
		
		// Get value 1
		$result_value1=$parameters[$i]['attributes']['TARGET1'];
		
		// Get value 2
		$result_value2=$parameters[$i]['attributes']['TARGET2'];
		
		// Get value 3
		$result_value3=$real_parameter_value;
		
		// Get value 4
		$parameter=$parameters[$i]['attributes']['TARGET4'];
		
		if ($parameter=="none") {
			$result_value4=NULL;
		}
		else {
			// Depending on the first character of the parameter, we have to call different functions
			switch (substr($parameter, 0, 1)) {
				case '*':
					// Local element
					if (!v0_ul_get_element($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '/':
					// Attribute
					if (!v0_ul_get_attribute($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '#':
					// Function result
					if (!v0_ul_get_result($parameter, $class, NULL, $real_parameter_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Static value
					$real_parameter_value=$parameter;
			}
			$result_value4=$real_parameter_value;
		}
		
		break;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to upload to WOVOdat data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_array: an array containing data from a WOVOML version 0.* file
* 			- $auto_array: the array of automaton file
* 			- $undo_file: the file to contain information for possible undo
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* 			- $check_pubdate: a boolean for checking publish dates or not
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_data($xml_array, $auto_array, $undo_file, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, &$errors, &$l_errors) {
	// Initialize variables
	$parents_id=array();
	$select=array();
	$wovoml=&$xml_array[0]['value'];
	$l_wovoml=count($wovoml);
	$auto_classes=$auto_array[0]['value'];
	$l_auto_classes=count($auto_classes);
	
	// Start to write undowovoml file (if not a simulation)
	if ($upload_to_db) {
		$line="<undowovoml>";
		if (!fwrite($undo_file, $line)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2020;
			$errors[$l_errors]['message']="An error occurred when trying to write undo file";
			$l_errors++;
			return FALSE;
		}
	}
	
	// Loop on classes under wovoml tag (except the 1st: loading information)
	for ($i=1; $i<$l_wovoml; $i++) {
		// Initialize variable
		$class=&$wovoml[$i];
		$class_name=$class['tag'];
		
		// Find automaton instructions for this class
		for ($j=0; $j<$l_auto_classes; $j++) {
			// Local variables
			$auto_class=$auto_classes[$j];
			
			// If not the right class, continue
			if (strtoupper($auto_class['attributes']['NAME'])!=$class_name) {
				continue;
			}
			
			// Get type of class
			switch ($auto_class['attributes']['TYPE']) {
				case "simple":
					// Call v0_ul_class_simple
					if (!v0_ul_class_simple($auto_class, $undo_file, $xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $class, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "listOfClasses":
					// Call v0_ul_class_loc
					if (!v0_ul_class_loc($auto_class, $undo_file, $xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $class, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "group":
					// Call v0_ul_class_group
					if (!v0_ul_class_group($auto_class, $undo_file, $xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $class, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1399;
					$errors[$l_errors]['message']="A type of class in WOVOMLToWOVOdat.xml could not be recognized: ".$auto_class['attributes']['TYPE'];
					$l_errors++;
					return FALSE;
			}
			break;
		}
	}
		
	// Finish to write undowovoml file (if not a simulation)
	if ($upload_to_db) {
		$line="\n</undowovoml>";
		if (!fwrite($undo_file, $line)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2021;
			$errors[$l_errors]['message']="An error occurred when trying to write undo file";
			$l_errors++;
			return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to upload to WOVOdat data contained in a class of a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $auto_class: the corresponding class from the automaton file
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* 			- $check_pubdate: a boolean for checking publish dates or not
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $select: an array of the selected values
* 			- $class: the array of a class from a WOVOML version 0.* file
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_class_simple($auto_class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, &$parents_id, &$select, &$class, &$errors, &$l_errors) {
	// Local variables
	$elements=&$class['value'];
	$l_elements=count($elements);
	// 'class' instructions
	$instructions=$auto_class['value'];
	$l_instructions=count($instructions);
	// 'loadData' instructions
	$loaddata_instructions=$instructions[1]['value'];
	$l_loaddata_instructions=count($loaddata_instructions);
	
	// New row in parents_id array
	$l_parents_id=count($parents_id);
	$parents_id[$l_parents_id]=NULL;
	
	// If class is "SeismicNetwork"
	$is_reference=FALSE;
	if ($class['tag']=="SEISMICNETWORK") {
		// Check if this is a reference
		$is_reference=TRUE;
		for ($i=0; $i<$l_elements; $i++) {
			if ($elements[$i]['type']=="complete") {
				$is_reference=FALSE;
				break;
			}
		}
	}
	
	// If it is not a reference
	if (!$is_reference) {
		$check_done=FALSE;
		// Loop on instructions
		for ($i=0; $i<$l_loaddata_instructions; $i++) {
			// Local variables
			$loaddata_instruction=$loaddata_instructions[$i];
			
			// Depending on instruction
			switch ($loaddata_instruction['tag']) {
				case "SELECT":
					// Select
					if (!v0_ul_select($loaddata_instruction, $class, FALSE, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $parents_id, $select, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "CHECK":
					// Check
					$selected_id=NULL;
					if (!v0_ul_check($loaddata_instruction, $class, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $parents_id, $select, $selected_id, $errors, $l_errors)) {
						return FALSE;
					}
					$check_done=TRUE;
					$check_index=$i;
					break;
				default:
					// Nothing
			}
			
			if ($check_done) {
				break;
			}
		}
		
		// If check returned nothing, upload data
		if ($selected_id==NULL) {
			// Local variables
			$instruction=$loaddata_instructions[$check_index+1];
			// Boolean
			$upload=TRUE;
		}
		// Else change data
		else {
			// Local variables
			$instruction=$loaddata_instructions[$check_index+2];
			// Store ID in parents array
			$parents_id[$l_parents_id]=$selected_id;
			// Boolean
			$upload=FALSE;
		}
		
		// Do instructions
		if (!v0_ul_instructions($class, $instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, FALSE, $upload_to_db, $select, $parents_id, $errors, $l_errors)) {
			return FALSE;
		}
	}
	else {
		// Get startTime of SeismicStation
		$child_elements=$elements[0]['value'];
		$l_child_elements=count($child_elements);
		for ($i=0; $i<$l_child_elements; $i++) {
			if ($child_elements[$i]['tag']=='STARTTIME') {
				// Start time found
				$station_time=$child_elements[$i]['value'][0];
			}
			if ($child_elements[$i]['tag']=='STARTTIMEUNC') {
				// Start time uncertainty found
				$station_time_unc=$child_elements[$i]['value'][0];
			}
		}
		
		// Calculate minimum and maximum station time
		require_once "php/funcs/datetime_funcs.php";
		
		if (!datetime_get_min_max($station_time, $station_time_unc, $min_station_time, $max_station_time, $local_error)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1222;
			$errors[$l_errors]['message']="Error when trying to calculate minimum and maximum seismic station time: ".$local_error;
			$l_errors++;
			return FALSE;
		}
		
		// Database functions
		require_once "php/funcs/db_funcs.php";
		
		// Get ID of SeismicNetwork
		$network_id=NULL;
		$select_table="sn";
		$select_field_name=array();
		$select_field_value=array();
		$select_field_name[0]="sn_id";
		$select_field_name[1]="sn_stime";
		$select_field_name[2]="sn_stime_unc";
		$select_field_name[3]="sn_etime";
		$select_field_name[4]="sn_etime_unc";
		$select_where_field_name=array();
		$select_where_field_value=array();
		$select_where_field_name[0]="sn_code";
		$select_where_field_value[0]=$class['attributes']['CODE'];
		$select_where_field_name[1]="cc_id";
		$select_where_field_value[1]=$cc_id;
		$local_error="";
		if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1324;
					$errors[$l_errors]['message']=$local_error." to db_select()";
					$l_errors++;
					break;
				default:
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=4309;
					$errors[$l_errors]['message']=$local_error;
					$l_errors++;
			}
			return FALSE;
		}
		// Get results
		$l_select_field_value=count($select_field_value);
		if ($l_select_field_value==0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1325;
			$errors[$l_errors]['message']="Error when trying to select a monitoring system: none was selected";
			$l_errors++;
			return FALSE;
		}
		
		// Loop on monitoring systems selected
		for ($i=0; $i<$l_select_field_value; $i++) {
			// Get start time and end time of monitoring system
			$start_time=$select_field_value[$i][1];
			$start_time_unc=$select_field_value[$i][2];
			$end_time=$select_field_value[$i][3];
			$end_time_unc=$select_field_value[$i][4];
			
			// Calculate minimum start time
			if (!datetime_substract_datetime($start_time, $start_time_unc, $min_start_time, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1234;
				$errors[$l_errors]['message']="Error when trying to calculate minimum start time of seismic network: ".$local_error;
				$l_errors++;
				return FALSE;
			}
			
			// Calculate maximum end time
			if (!datetime_add_datetime($end_time, $end_time_unc, $max_end_time, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1234;
				$errors[$l_errors]['message']="Error when trying to calculate maximum end time of seismic network: ".$local_error;
				$l_errors++;
				return FALSE;
			}
			
			// Check if station start time frame is included in network time frame
			if (!datetime_dateframe_included($min_station_time, $max_station_time, $min_start_time, $max_end_time, $is_included, $local_error)) {
				// Error
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1543;
				$errors[$l_errors]['message']="Error when trying to compare station time and network time";
				$l_errors++;
				return FALSE;
			}
			if ($is_included==0) {
				continue;
			}
			
			// Get ID of this monitoring system
			$network_id=$select_field_value[$i][0];
			break;
		}
		
		// Monitoring system not found
		if ($network_id==NULL) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1326;
			$errors[$l_errors]['message']="Error when trying to select a monitoring system: none matched the selection";
			$l_errors++;
			return FALSE;
		}
		
		// Boolean
		$upload=FALSE;
		
		// Store ID
		$parents_id[$l_parents_id]=$network_id;
	}
	
	// Loop on class elements
	for ($i=0; $i<$l_elements; $i++) {
		$element=&$elements[$i];
		
		// If it's not a class
		if ($element['type']!='open') {
			continue;
		}
		
		$class_name=$element['tag'];
		
		// It's a class or a list - find it in the automaton
		for ($j=2; $j<$l_instructions; $j++) {
			// Initialize variable
			$instruction=$instructions[$j];
			
			// Compare name
			if (strtoupper($instruction['attributes']['NAME'])!=$class_name) {
				continue;
			}
			
			// Get type of class
			if ($instruction['tag']=="LIST") {
				// Call v0_ul_list
				if (!v0_ul_list($element, $instruction, $upload, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $errors, $l_errors)) {
					return FALSE;
				}
			}
			else {
				switch ($instruction['attributes']['TYPE']) {
					case "simple":
						// Call v0_ul_class_simple
						if (!v0_ul_class_simple($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case "listOfClasses":
						// Call v0_ul_class_loc
						if (!v0_ul_class_loc($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					case "group":
						// Call v0_ul_class_group
						if (!v0_ul_class_group($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
							return FALSE;
						}
						break;
					default:
						// Error
						$errors[$l_errors]=array();
						$errors[$l_errors]['code']=1398;
						$errors[$l_errors]['message']="A type of class in WOVOMLToWOVOdat.xml could not be recognized: ".$instruction['attributes']['TYPE'];
						$l_errors++;
						return FALSE;
				}
			}
			break;
		}
	}
	
	// Store DB ID of this object
	$class['db_id']=$parents_id[$l_parents_id];
	
	// Remove last row from parents_id array
	unset($parents_id[$l_parents_id]);
	
	return TRUE;
}

/******************************************************************************************************
* Function to upload to WOVOdat data contained in a class of a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $auto_class: the corresponding class from the automaton file
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* 			- $check_pubdate: a boolean for checking publish dates or not
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $select: an array of the selected values
* 			- $class: the array of a class from a WOVOML version 0.* file
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_class_loc($auto_class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, &$parents_id, &$select, &$class, &$errors, &$l_errors) {
	// Local variables
	$elements=&$class['value'];
	$l_elements=count($elements);
	// 'class' instructions
	$instructions=$auto_class['value'];
	$l_instructions=count($instructions);
	// 'loadData' instructions
	$loaddata_instructions=$instructions[1]['value'];
	$l_loaddata_instructions=count($loaddata_instructions);
	
	// New row in parents_id array
	$l_parents_id=count($parents_id);
	$parents_id[$l_parents_id]=NULL;
	
	// Do 'delete' instruction
	$delete_inst=$loaddata_instructions[0];
	if (!v0_ul_delete($delete_inst, $class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $select, $parents_id, $upload_to_db, $errors, $l_errors)) {
		return FALSE;
	}
	
	// Loop on class elements
	for ($i=0; $i<$l_elements; $i++) {
		$element=&$elements[$i];
		
		// If it's not a class
		if ($element['type']!='open') {
			continue;
		}
		
		$class_name=$element['tag'];
		
		// It's a class or a list - find it in the automaton
		for ($j=2; $j<$l_instructions; $j++) {
			// Initialize variable
			$instruction=$instructions[$j];
			
			// Compare name
			if (strtoupper($instruction['attributes']['NAME'])!=$class_name) {
				continue;
			}
			
			// Get type of class
			switch ($instruction['attributes']['TYPE']) {
				case "simple":
					// Call v0_ul_class_simple
					if (!v0_ul_class_simple($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "listOfClasses":
					// Call v0_ul_class_loc
					if (!v0_ul_class_loc($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "group":
					// Call v0_ul_class_group
					if (!v0_ul_class_group($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1398;
					$errors[$l_errors]['message']="A type of class in WOVOMLToWOVOdat.xml could not be recognized: ".$instruction['attributes']['TYPE'];
					$l_errors++;
					return FALSE;
			}
			break;
		}
	}
	
	// Store DB ID of this object
	$class['db_id']=$parents_id[$l_parents_id];
	
	// Remove last row from parents_id array
	unset($parents_id[$l_parents_id]);
	
	return TRUE;
}

/******************************************************************************************************
* Function to upload to WOVOdat data contained in a class of a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $auto_class: the corresponding class from the automaton file
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* 			- $check_pubdate: a boolean for checking publish dates or not
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $select: an array of the selected values
* 			- $class: the array of a class from a WOVOML version 0.* file
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_class_group($auto_class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, &$parents_id, &$select, &$class, &$errors, &$l_errors) {
	// Local variables
	$elements=&$class['value'];
	$l_elements=count($elements);
	// 'class' instructions
	$instructions=$auto_class['value'];
	$l_instructions=count($instructions);
	
	// New row in parents_id array
	$l_parents_id=count($parents_id);
	$parents_id[$l_parents_id]=NULL;
	
	// Loop on class elements
	for ($i=0; $i<$l_elements; $i++) {
		$element=&$elements[$i];
		
		// If it's not a class
		if ($element['type']!='open') {
			continue;
		}
		
		$class_name=$element['tag'];
		
		// It's a class or a list - find it in the automaton
		for ($j=0; $j<$l_instructions; $j++) {
			// Initialize variable
			$instruction=$instructions[$j];
			
			// Compare name
			if (strtoupper($instruction['attributes']['NAME'])!=$class_name) {
				continue;
			}
			
			// Get type of class
			switch ($instruction['attributes']['TYPE']) {
				case "simple":
					// Call v0_ul_class_simple
					if (!v0_ul_class_simple($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "listOfClasses":
					// Call v0_ul_class_loc
					if (!v0_ul_class_loc($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case "group":
					// Call v0_ul_class_group
					if (!v0_ul_class_group($instruction, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, $parents_id, $select, $element, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Error
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1398;
					$errors[$l_errors]['message']="A type of class in WOVOMLToWOVOdat.xml could not be recognized: ".$instruction['attributes']['TYPE'];
					$l_errors++;
					return FALSE;
			}
			break;
		}
	}
	
	// Store DB ID of this object
	$class['db_id']=$parents_id[$l_parents_id];
	
	// Remove last row from parents_id array
	unset($parents_id[$l_parents_id]);
	
	return TRUE;
}

/******************************************************************************************************
* Function to upload to WOVOdat data contained in a list of a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $list: the array of a list from a WOVOML version 0.* file
* 			- $auto_list: the list instruction from the automaton file
* 			- $parent_upload: a boolean whether the parent class was uploaded or changed
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* 			- $check_pubdate: a boolean for checking publish dates or not
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $select: an array of the selected values
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_list($list, $auto_list, $parent_upload, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $upload_to_db, &$parents_id, &$select, &$errors, &$l_errors) {
	// Initialize variables
	$elements=$list['value'];
	$l_elements=count($list['value']);
	// 'loadData' instructions
	$loaddata_instructions=$auto_list['value'][1]['value'];
	
	// If no element in list
	if ($l_elements==0) {
		return TRUE;
	}
	
	// New row in parents_id array
	$l_parents_id=count($parents_id);
	$parents_id[$l_parents_id]=NULL;
	
	// If parent was changed
	if (!$parent_upload) {
		// Do change instructions
		if (!v0_ul_instructions($list, $loaddata_instructions[0], $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, TRUE, $upload_to_db, $select, $parents_id, $errors, $l_errors)) {
			return FALSE;
		}
	}
	
	// If only one element
	if ($l_elements==1) {
		// Do 'one' instruction
		if (!v0_ul_instructions($elements[0], $loaddata_instructions[1], $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, TRUE, $upload_to_db, $select, $parents_id, $errors, $l_errors)) {
			return FALSE;
		}
	}
	else {
		// Loop on elements in the list
		for ($i=0; $i<$l_elements; $i++) {
			// Do 'many' instruction
			if (!v0_ul_instructions($elements[$i], $loaddata_instructions[2], $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, TRUE, $upload_to_db, $select, $parents_id, $errors, $l_errors)) {
				return FALSE;
			}
		}
	}
	
	// Remove last row in parents_id array
	unset($parents_id[$l_parents_id]);
	
	return TRUE;
}

/******************************************************************************************************
* Function to do the instructions from the automaton for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $class: the class for which the instructions are being done
* 			- $instructions_container: the container of instructions from the automaton file
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $list: a boolean to tell whether the instruction is for a list
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* 			- $check_pubdate: a boolean for checking publish dates or not
* InOutput:	- $select: an array of the selected values
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_instructions($class, $instructions_container, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $list, $upload_to_db, &$select, &$parents_id, &$errors, &$l_errors) {
	// Local variables
	$instructions=$instructions_container['value'];
	$l_instructions=count($instructions);
	
	// Loop on instructions
	for ($i=0; $i<$l_instructions; $i++) {
		// Initialize variables
		$instruction=$instructions[$i];
		
		// Switch case
		switch ($instruction['tag']) {
			case 'INSERT':
				if (!v0_ul_insert($instruction, $class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $select, $upload_to_db, $parents_id, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case 'SELECT':
				if (!v0_ul_select($instruction, $class, $list, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $parents_id, $select, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case 'UPDATE':
				if (!v0_ul_update($instruction, $class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $select, $parents_id, $upload_to_db, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case 'DELETE':
				if (!v0_ul_delete($instruction, $class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $select, $parents_id, $upload_to_db, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1018;
				$errors[$l_errors]['message']="An instruction in automaton file could not be recognized: ".$instruction['tag'];
				$l_errors++;
				return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do an 'insert' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'insert' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $select: an array of the selected values
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_insert($instruction, $class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $select, $upload_to_db, &$parents_id, &$errors, &$l_errors) {
	// Local variables
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Get table
	$table=$parameters[0];
	if ($table['tag']!='TABLE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1019;
		$errors[$l_errors]['message']="The first element of an insert instruction was not 'table' but '".$table['tag']."'";
		$l_errors++;
		return FALSE;
	}
	$insert_table=$table['value'][0];
	
	// Get fields and values
	$field_name=array();
	$field_value=array();
	$cnt_field=0;
	// Loop on (field, value) couples
	for ($i=1; $i<$l_parameters; $i+=2) {
		// Initialize variables
		$real_field_value=NULL;
		$temp_field_value=$parameters[$i+1]['value'][0];
		
		// Loop on possible values
		while (TRUE) {
			// Get position of "|"
			$pos=strpos($temp_field_value, "|");
			if ($pos===FALSE) {
				// "|" not found
				$find_field_value=$temp_field_value;
			}
			else {
				// "|" found
				$find_field_value=substr($temp_field_value, 0, $pos);
				$temp_field_value=substr($temp_field_value, $pos+1);
			}
			
			// Depending on the first character of the value, the meaning is different
			switch (substr($find_field_value, 0, 1)) {
				case '!':
					// General element
					if (!v0_ul_get_general($find_field_value, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '=':
					// Current or parent
					if (!v0_ul_get_parent($find_field_value, $parents_id, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '*':
					// Local element
					if (!v0_ul_get_element($find_field_value, $class, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '?':
					// Select value
					if (!v0_ul_get_select($find_field_value, $select, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '/':
					// Attribute
					if (!v0_ul_get_attribute($find_field_value, $class, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '#':
					// Function result
					if (!v0_ul_get_result($find_field_value, $class, $full_xml_array, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Static value
					$real_field_value=$find_field_value;
			}
			
			// If value is found or no more "|", go out from loop
			if ($real_field_value!=NULL || $pos===FALSE) {
				break;
			}
		}
		
		// If this element was not specified before
		if ($real_field_value==NULL) {
			continue;
		}
		
		// Enter field and value in array for calling db_insert later
		$field_name[$cnt_field]=$parameters[$i]['value'][0];
		$field_value[$cnt_field]=$real_field_value;
		$cnt_field++;
	}
	
	// Security check
	if ($cnt_field==0) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1280;
		$errors[$l_errors]['message']="An 'insert' instruction had no field";
		$l_errors++;
		return FALSE;
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Send query to database
	$last_insert_id=0;
	$local_error="";
	if (!db_insert($insert_table, $field_name, $field_value, !$upload_to_db, $last_insert_id, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1020;
				$errors[$l_errors]['message']=$local_error." to db_insert()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4008;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	
	// Store last insert ID in last row of parents_id
	$parents_id[count($parents_id)-1]=$last_insert_id;
	
	// Write undowovoml file (if that was not a simulation)
	if ($upload_to_db) {
		$undo_instruction=
		"\n\t<delete>".
		"\n\t\t<table>".$insert_table."</table>".
		"\n\t\t<where>".
		"\n\t\t\t<field>".$insert_table."_id</field>".
		"\n\t\t\t<value>".$last_insert_id."</value>".
		"\n\t\t</where>".
		"\n\t</delete>";
		if (!fwrite($undo_file, $undo_instruction)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2022;
			$errors[$l_errors]['message']="An error occurred when trying to write undo file";
			$l_errors++;
			return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'select' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'select' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $list: a boolean to tell whether the dataload is for a list
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* InOutput:	- $select: an array of the selected values
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_select($instruction, $class, $list, $fulll_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $parents_id, &$select, &$errors, &$l_errors) {
	// Local variables
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Check number of parameters
	if ($l_parameters!=3) {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1281;
		$errors[$l_errors]['message']="A 'select' instruction had the wrong number of parameters";
		$l_errors++;
		return FALSE;
	}
	
	// Get field
	$field=$parameters[0];
	if ($field['tag']!='FIELD') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1021;
		$errors[$l_errors]['message']="The first element of a 'select' instruction was not 'field'";
		$l_errors++;
		return FALSE;
	}
	$select_field=array();
	$select_field[0]=$field['value'][0];
	
	// Get table
	$table=$parameters[1];
	if ($table['tag']!='TABLE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1022;
		$errors[$l_errors]['message']="The second element of a 'select' instruction was not 'table'";
		$l_errors++;
		return FALSE;
	}
	$select_table=$table['value'][0];
	
	// Get where conditions
	$where=$parameters[2];
	if ($where['tag']!='WHERE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1023;
		$errors[$l_errors]['message']="The third element of a 'select' instruction was not 'where'";
		$l_errors++;
		return FALSE;
	}
	
	// Loop on where conditions
	$where_conditions=$where['value'];
	$l_where_conditions=count($where_conditions);
	$where_field_name=array();
	$where_field_value=array();
	// Each condition goes by 2 tags (field, value)
	for ($i=0; $i<$l_where_conditions; $i+=2) {
		// Initialize variables
		$where_field_name[$i/2]=$where_conditions[$i]['value'][0];
		$where_value=$where_conditions[$i+1]['value'][0];
		$real_where_value=NULL;
		
		// Depending on the first character of the value, the meaning is different
		switch (substr($where_value, 0, 1)) {
			case '!':
				// General element
				if (!v0_ul_get_general($where_value, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!v0_ul_get_parent($where_value, $parents_id, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if ($list) {
					$real_where_value=preg_replace('/\s+/', ' ', trim($class['value'][0]));
				}
				else {
					if (!v0_ul_get_element($where_value, $class, $real_where_value, $errors, $l_errors)) {
						return FALSE;
					}
				}
				break;
			case '?':
				// Select value
				if (!v0_ul_get_select($where_value, $select, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($where_value, $class, $full_xml_array, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_where_value=$where_value;
		}
		
		// Particular case: one element was not specified before
		if ($real_where_value==NULL || $real_where_value=="") {
			// Return NULL value for select
			// Get target field
			$target=$instruction['attributes']['TARGET'];
			// Send a NULL value
			$select[$target]=NULL;
			return TRUE;
		}
		
		// Enter value in array for calling db_select later
		$where_field_value[$i/2]=$real_where_value;
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Send query to database
	$field_value=array();
	$local_error="";
	if (!db_select($select_table, $select_field, $where_field_name, $where_field_value, $field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1024;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4009;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_field_value=count($field_value);
	if ($l_field_value>1) {
		// Only 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1101;
		$errors[$l_errors]['message']="Multiple rows in the '".$select_table."' table correspond to ";
		// Loop on values
		$l_where_field_name=count($where_field_name);
		for ($i=0; $i<$l_where_field_name; $i++) {
			if ($i==0) {
				$errors[$l_errors]['message'].=$where_field_name[$i]."='".$where_field_value[$i]."'";
				continue;
			}
			$errors[$l_errors]['message'].=", ".$where_field_name[$i]."='".$where_field_value[$i]."'";
		}
		$l_errors++;
	}
	
	// Get target field
	$target=$instruction['attributes']['TARGET'];
	// Send value
	$select[$target]=$field_value[0][0];
	
	return TRUE;
}

/******************************************************************************************************
* Function to do an 'update' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'update' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $select: an array of the selected values
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_update($instruction, $class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $select, $parents_id, $upload_to_db, &$errors, &$l_errors) {
	// Local variables
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Get table
	$table=$parameters[0];
	if ($table['tag']!='TABLE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1025;
		$errors[$l_errors]['message']="The first element of an 'update' instruction was not 'table'";
		$l_errors++;
		return FALSE;
	}
	$update_table=$table['value'][0];
	
	// Get fields and values
	$field_name=array();
	$field_value=array();
	$cnt_fields=0;
	// Loop on (field, value) couples
	for ($i=1; $i<$l_parameters-1; $i+=2) {
		// Initialize variables
		$real_field_value=NULL;
		$temp_field_value=$parameters[$i+1]['value'][0];
		
		// Loop on possible values
		while (TRUE) {
			// Get position of "|"
			$pos=strpos($temp_field_value, "|");
			if ($pos===FALSE) {
				// "|" not found
				$find_field_value=$temp_field_value;
			}
			else {
				// "|" found
				$find_field_value=substr($temp_field_value, 0, $pos);
				$temp_field_value=substr($temp_field_value, $pos+1);
			}
			
			// Depending on the first character of the value, the meaning is different
			switch (substr($find_field_value, 0, 1)) {
				case '!':
					// General element
					if (!v0_ul_get_general($find_field_value, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '=':
					// Current or parent
					if (!v0_ul_get_parent($find_field_value, $parents_id, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '*':
					// Local element
					if (!v0_ul_get_element($find_field_value, $class, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '?':
					// Select value
					if (!v0_ul_get_select($find_field_value, $select, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '/':
					// Attribute
					if (!v0_ul_get_attribute($find_field_value, $class, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				case '#':
					// Function result
					if (!v0_ul_get_result($find_field_value, $class, $full_xml_array, $real_field_value, $errors, $l_errors)) {
						return FALSE;
					}
					break;
				default:
					// Static value
					$real_field_value=$find_field_value;
			}
			
			// If value is found or no more "|", go out from loop
			if ($real_field_value!=NULL || $pos===FALSE) {
				break;
			}
		}
		
		// If this element was not specified before
		if ($real_field_value==NULL) {
			continue;
		}
		
		// Enter field and value in array for calling db_update later
		$field_name[$cnt_fields]=$parameters[$i]['value'][0];
		$field_value[$cnt_fields]=$real_field_value;
		$cnt_fields++;
	}
	
	// Security check
	if ($cnt_fields==0) {
		// No field to update, that's it
		return TRUE;
	}
	
	// Get where conditions
	$where=$parameters[$l_parameters-1];
	if ($where['tag']!='WHERE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1026;
		$errors[$l_errors]['message']="The last element of an 'update' instruction was not 'where'";
		$l_errors++;
		return FALSE;
	}
	
	// Loop on where conditions
	$where_conditions=$where['value'];
	$l_where_conditions=count($where_conditions);
	$where_field_name=array();
	$where_field_value=array();
	// Each condition goes by 2 tags (field, value)
	for ($i=0; $i<$l_where_conditions; $i+=2) {
		// Initialize variables
		$where_field_name[$i/2]=$where_conditions[$i]['value'][0];
		$where_value=$where_conditions[$i+1]['value'][0];
		$real_where_value=NULL;
		
		// Depending on the first character of the value, the meaning is different
		switch (substr($where_value, 0, 1)) {
			case '!':
				// General element
				if (!v0_ul_get_general($where_value, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!v0_ul_get_parent($where_value, $parents_id, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if (!v0_ul_get_element($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '?':
				// Select value
				if (!v0_ul_get_select($where_value, $select, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($where_value, $class, $full_xml_array, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_where_value=$where_value;
		}
		
		// If one element was not specified before
		if ($real_where_value==NULL) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1127;
			$errors[$l_errors]['message']="A 'where' condition in an 'update' statement could not be verified";
			$l_errors++;
			return FALSE;
		}
		
		// Enter value in array for calling db_update later
		$where_field_value[$i/2]=$real_where_value;
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Store old values in "undowovoml" before updating them (if not a simulation)
	if ($upload_to_db) {
		// Send "SELECT" query to database
		$select_field_value=array();
		$local_error="";
		if (!db_select($update_table, $field_name, $where_field_name, $where_field_value, $select_field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1024;
					$errors[$l_errors]['message']=$local_error." to db_select()";
					$l_errors++;
					break;
				default:
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=4009;
					$errors[$l_errors]['message']=$local_error;
					$l_errors++;
			}
			return FALSE;
		}
		$l_field_value=count($select_field_value);
		if ($l_field_value>1) {
			// Only 1 result should be found
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1881;
			$errors[$l_errors]['message']="Multiple rows in the '".$update_table."' table correspond to ";
			// Loop on values
			$l_where_field_name=count($where_field_name);
			for ($i=0; $i<$l_where_field_name; $i++) {
				if ($i==0) {
					$errors[$l_errors]['message'].=$where_field_name[$i]."='".$where_field_value[$i]."'";
					continue;
				}
				$errors[$l_errors]['message'].=", ".$where_field_name[$i]."='".$where_field_value[$i]."'";
			}
			$l_errors++;
		}
		// Store old values
		$undo_instruction=
		"\n\t<update>".
		"\n\t\t<table>".$update_table."</table>";
		// Fields
		for ($i=0; $i<$cnt_fields; $i++) {
			$undo_instruction.=
			"\n\t\t<field>".$field_name[$i]."</field>".
			"\n\t\t<value>".$select_field_value[0][$i]."</value>";
		}
		// Where conditions
		$l_where_field_name=count($where_field_name);
		$undo_instruction.=
		"\n\t\t<where>";
		for ($i=0; $i<$l_where_field_name; $i++) {
			$undo_instruction.=
			"\n\t\t\t<field>".$where_field_name[$i]."</field>".
			"\n\t\t\t<value>".$where_field_value[$i]."</value>";
		}
		$undo_instruction.=
		"\n\t\t</where>".
		"\n\t</update>";
		if (!fwrite($undo_file, $undo_instruction)) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2022;
			$errors[$l_errors]['message']="An error occurred when trying to write undo file";
			$l_errors++;
			return FALSE;
		}
	}
	
	// Send query to database
	$local_error="";
	if (!db_update($update_table, $field_name, $field_value, $where_field_name, $where_field_value, !$upload_to_db, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1028;
				$errors[$l_errors]['message']=$local_error." to db_update()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4010;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'delete' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'delete' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $undo_file: the file to contain information for possible undo
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $select: an array of the selected values
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_delete($instruction, $class, $undo_file, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $select, $parents_id, $upload_to_db, &$errors, &$l_errors) {
	// Local variables
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Get table
	$table=$parameters[0];
	if ($table['tag']!='TABLE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1025;
		$errors[$l_errors]['message']="The first element of a 'delete' instruction was not 'table'";
		$l_errors++;
		return FALSE;
	}
	$delete_table=$table['value'][0];
	
	// Get fields to be saved
	$select_field_name=array();
	// Loop on fields
	for ($i=1; $i<$l_parameters-1; $i++) {
		$select_field_name[$i-1]=$parameters[$i]['value'][0];
	}
	
	// Get where conditions
	$where=$parameters[$l_parameters-1];
	if ($where['tag']!='WHERE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1026;
		$errors[$l_errors]['message']="The last element of a 'delete' instruction was not 'where'";
		$l_errors++;
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
		// Initialize variables
		$where_field_name[$i/2]=$where_conditions[$i]['value'][0];
		$where_value=$where_conditions[$i+1]['value'][0];
		$real_where_value=NULL;
		
		// Depending on the first character of the value, the meaning is different
		switch (substr($where_value, 0, 1)) {
			case '!':
				// General element
				if (!v0_ul_get_general($where_value, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!v0_ul_get_parent($where_value, $parents_id, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if (!v0_ul_get_element($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '?':
				// Select value
				if (!v0_ul_get_select($where_value, $select, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($where_value, $class, $full_xml_array, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_where_value=$where_value;
		}
		
		// If one element was not specified before
		if ($real_where_value==NULL) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1027;
			$errors[$l_errors]['message']="A 'where' condition in an 'delete' statement could not be verified";
			$l_errors++;
			return FALSE;
		}
		
		// Enter value in array of where values
		$where_field_value[$i/2]=$real_where_value;
		if ($i!=0) {
			$logical[($i-2)/2]="AND";
		}
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Store old values in "undowovoml" before deleting them (if not a simulation)
	if ($upload_to_db) {
		// Send "SELECT" query to database
		$select_field_value=array();
		$local_error="";
		if (!db_select($delete_table, $select_field_name, $where_field_name, $where_field_value, $select_field_value, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1024;
					$errors[$l_errors]['message']=$local_error." to db_select()";
					$l_errors++;
					break;
				default:
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=4009;
					$errors[$l_errors]['message']=$local_error;
					$l_errors++;
			}
			return FALSE;
		}
		$l_field_value=count($select_field_value);
		// Store records which are going to be deleted
		$undo_instruction="";
		for ($i=0; $i<$l_field_value; $i++) {
			$undo_instruction.=
			"\n\t<insert>".
			"\n\t\t<table>".$delete_table."</table>";
			// Fields
			for ($j=0; $j<$l_parameters-2; $j++) {
				$undo_instruction.=
				"\n\t\t<field>".$select_field_name[$j]."</field>".
				"\n\t\t<value>".$select_field_value[$i][$j]."</value>";
			}
			$undo_instruction.=
			"\n\t</insert>";
		}
		if (fwrite($undo_file, $undo_instruction)===FALSE) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=2024;
			$errors[$l_errors]['message']="An error occurred when trying to write undo file";
			$l_errors++;
			return FALSE;
		}
	}
	
	// Send query to database
	$local_error="";
	if (!db_delete($delete_table, $where_field_name, $where_field_value, $logical, !$upload_to_db, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1028;
				$errors[$l_errors]['message']=$local_error." to db_delete()";
				$l_errors++;
				break;
			case "Error in logical operators given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1029;
				$errors[$l_errors]['message']=$local_error." to db_delete()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4010;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'check' instruction from the automaton for uploading data contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $instruction: the 'check' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $full_xml_array: array of all elements of the WOVOML file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
*			- $select: an array of the selected values
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $selected_id: the possible ID of this object (may be NULL)
******************************************************************************************************/
function v0_ul_check($instruction, $class, $full_xml_array, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $parents_id, $select, &$selected_id, &$errors, &$l_errors) {
	// Local variables
	$parameters=$instruction['value'];
	$l_parameters=count($parameters);
	
	// Get first parameter (table)
	if ($parameters[0]['tag']!="TABLE") {
		// Error
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1440;
		$errors[$l_errors]['message']="The 1st element of a 'check' instruction was not 'table'";
		$l_errors++;
		return FALSE;
	}
	$select_table=$parameters[0]['value'][0];
	
	$select_where_field_name=array();
	$select_where_field_value=array();
	// Loop on fields and values
	for ($i=1; $i<$l_parameters; $i+=2) {
		// Local variables
		$field=$parameters[$i];
		if ($field['tag']!="FIELD") {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1441;
			$errors[$l_errors]['message']="The (2n)-th element of a 'check' instruction was not 'field'";
			$l_errors++;
			return FALSE;
		}
		$value=$parameters[$i+1];
		if ($value['tag']!="VALUE") {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1442;
			$errors[$l_errors]['message']="The (2n+1)-th element of a 'check' instruction was not 'value'";
			$l_errors++;
			return FALSE;
		}
		$parameter_name=$value['value'][0];
		
		// Depending on the first character of the parameter name, we have to call different functions
		switch (substr($parameter_name, 0, 1)) {
			case '!':
				// General element
				if (!v0_ul_get_general($parameter_name, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!v0_ul_get_parent($parameter_name, $parents_id, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if (!v0_ul_get_element($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '?':
				// Select value
				if (!v0_ul_get_select($parameter_name, $select, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!v0_ul_get_attribute($parameter_name, $class, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!v0_ul_get_result($parameter_name, $class, $full_xml_array, $parameter_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$parameter_value=$parameter_name;
		}
		
		// If a NULL value was returned
		if ($parameter_value==NULL) {
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1443;
			$errors[$l_errors]['message']="A necessary element for a 'check' instruction was not found";
			$l_errors++;
			return FALSE;
		}
		
		// Store in arrays
		$select_where_field_name[($i-1)/2]=$field['value'][0];
		$select_where_field_value[($i-1)/2]=$parameter_value;
	}
	
	// Database functions
	require_once("php/funcs/db_funcs.php");
	
	// Query database
	$select_field_name=array();
	$select_field_value=array();
	$select_field_name[0]=$select_table."_id";
	$local_error="";
	if (!db_select($select_table, $select_field_name, $select_where_field_name, $select_where_field_value, $select_field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1024;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4009;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_select_field_value=count($select_field_value);
	if ($l_select_field_value>1) {
		// Only 0 or 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1111;
		$errors[$l_errors]['message']="Multiple rows in the ".$select_table." table were found with ";
		// Loop on fields
		$l_fields=count($select_where_field_name);
		for ($i=0; $i<$l_fields; $i++) {
			// Local variables
			$field_name=$select_where_field_name[$i];
			$field_value=$select_where_field_value[$i];
			if ($i==0) {
				$errors[$l_errors]['message'].=$field_name."='".$field_value."'";
				continue;
			}
			$errors[$l_errors]['message'].=", ".$field_name."='".$field_value."'";
		}
		$l_errors++;
	}
	// Get result
	if (!isset($select_field_value[0][0])) {
		$selected_id=NULL;
	}
	else {
		$selected_id=$select_field_value[0][0];
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get a 'general' value contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the 'general' value as found in the automaton file
* 			- $gen_vd_id: the general volcano ID (vd_id)
* 			- $cc_id: the general owner ID (cc_id)
* 			- $gen_pub_date: the general publish date
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* Output:	- $real_value: the requested 'general' value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_get_general($value, $gen_vd_id, $cc_id, $gen_pub_date, $current_time, $cc_id_load, $cb_ids, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '!'
	if (substr($value, 0, 1) != '!') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1029;
		$errors[$l_errors]['message']="The first character of the value given was not '!'";
		$l_errors++;
		return FALSE;
	}
	
	// Switch remaining of the string
	switch (substr($value, 1, (strlen($value)-1))) {
		case 'vd_id':
			// General volcano ID
			$real_value=$gen_vd_id;
			break;
		case 'cc_id':
			// General contact ID
			$real_value=$cc_id;
			break;
		case 'cc_id_load':
			// General loader ID
			$real_value=$cc_id_load;
			break;
		case 'pubdate':
			// General publish date
			$real_value=$gen_pub_date;
			break;
		case 'loaddate':
			// Current time
			$real_value=$current_time;
			break;
		case 'cb_ids':
			// Current time
			$real_value=$cb_ids;
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1030;
			$errors[$l_errors]['message']="A general value was not specified correctly: '".$value."'";
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the current value or the one of a parent of an element contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the 'parent' value as found in the automaton file
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* Output:	- $real_value: the requested 'parent' value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_get_parent($value, $parents_id, &$real_value, &$errors, &$l_errors) {
	// Initialize variables
	$l_value=strlen($value);
	
	// Security check: first character must be '='
	if (substr($value, 0, 1) != '=') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1031;
		$errors[$l_errors]['message']="The first character of the value given was not '='";
		$l_errors++;
		return FALSE;
	}
	
	// Switch remaining of the string
	switch (substr($value, 1, $l_value-2)) {
		case 'curren':
			// Current element - last row of parents_id
			$real_value=$parents_id[count($parents_id)-1];
			break;
		case 'parent':
			// Parent element - get last character
			$n_parent=intval(substr($value, -1, 1));
			$real_value=$parents_id[count($parents_id)-1-$n_parent];
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1032;
			$errors[$l_errors]['message']="A current/parent value was not specified correctly: '".$value."'";
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the value of an element contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the name of the element of which the value must be found
* 			- $class: the current class being uploaded
* Output:	- $real_value: the requested element value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_get_element($value, $class, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '*'
	if (substr($value, 0, 1) != '*') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1033;
		$errors[$l_errors]['message']="The first character of the value given was not '*': ".$value;
		$l_errors++;
		return FALSE;
	}
	
	// Get element name
	$element_name=strtoupper(substr($value, 1, strlen($value)-1));
	
	// Find element in class
	$found=FALSE;
	$elements=$class['value'];
	$l_elements=count($elements);
	for ($i=0; $i<$l_elements; $i++) {
		// Initialize variables
		$element=$elements[$i];
		
		// Compare names
		if ($element_name!=$element['tag']) {
			continue;
		}
		
		// The element was found
		$found=TRUE;
		$real_value=preg_replace('/\s+/', ' ', trim($element['value'][0]));
		break;
	}
	
	// If it was not found, return NULL value
	if (!$found || $real_value=="") {
		$real_value=NULL;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get a previously selected value from WOVOdat
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the name of the target of a previous selection
* 			- $select: an array of the selected values
* Output:	- $real_value: the requested value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_get_select($value, $select, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '?'
	if (substr($value, 0, 1) != '?') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1034;
		$errors[$l_errors]['message']="The first character of the value given was not '?'";
		$l_errors++;
		return FALSE;
	}
	
	// Get target name
	$target_name=substr($value, 1, strlen($value)-1);
	
	// Get target value
	if (!array_key_exists($target_name, $select)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1035;
		$errors[$l_errors]['message']="A select value was not specified correctly: '".$value."'";
		$l_errors++;
		return FALSE;
	}
	$real_value=$select[$target_name];
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the value of the attribute of an element contained in a WOVOML version 0.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the name of the attribute of which the value must be found
* 			- $class: the current class being uploaded
* Output:	- $real_value: the requested attribute value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_get_attribute($value, $class, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '/'
	if (substr($value, 0, 1) != '/') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1036;
		$errors[$l_errors]['message']="The first character of the value given was not '/'";
		$l_errors++;
		return FALSE;
	}
	
	// Get attribute name
	$attribute_name=strtoupper(substr($value, 1));
	
	// Get attributes of class
	if (!array_key_exists('attributes', $class)) {
		$real_value=NULL;
		return TRUE;
	}
	$class_att=$class['attributes'];
	// Find attribute
	if (!array_key_exists($attribute_name, $class_att)) {
		$real_value=NULL;
	}
	else {
		$real_value=$class_att[$attribute_name];
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the value of a result previously obtained through a 'function' instruction
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the name of the target
* 			- $class: the current class
* Output:	- $real_value: the requested value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function v0_ul_get_result($value, $class, $full_xml_array, &$real_value, &$errors, &$l_errors) {
	// Security check: first character must be '#'
	if (substr($value, 0, 1) != '#') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1056;
		$errors[$l_errors]['message']="The first character of the value given was not '#'";
		$l_errors++;
		return FALSE;
	}
	$value=substr($value, 1);
	
	if (!is_array($class['results'])) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1058;
		$errors[$l_errors]['message']="A class didn't have any result";
		$l_errors++;
		return FALSE;
	}
	
	// Get target value
	if (!array_key_exists($value, $class['results'])) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1057;
		$errors[$l_errors]['message']="A 'result' value was not specified correctly: '".$value."'";
		$l_errors++;
		return FALSE;
	}
	$real_value=$class['results'][$value];
	
	if (is_array($real_value)) {
		$xml_id=$real_value['id'];
		// Get first object
		$first_dot_pos=strpos($xml_id, ".");
		if ($first_dot_pos===FALSE) {
			// It was the first and last object to find
			$object_id=intval($xml_id);
			$real_value=$full_xml_array[0]['value'][$object_id+1]['db_id'];
			return TRUE;
		}
		$object_id=intval(substr($xml_id, 0, $first_dot_pos));
		$find_class=$full_xml_array[0]['value'][$object_id+1];
		$xml_id=substr($xml_id, $first_dot_pos+1);
		// Parse XML ID (e.g.: 0.1.1.0.2.3)
		while (TRUE) {
			$first_dot_pos=strpos($xml_id, ".");
			if ($first_dot_pos===FALSE) {
				// Last object to find
				$object_id=intval($xml_id);
				$real_value=$find_class['value'][$object_id]['db_id'];
				break;
			}
			// Not last object to find
			$object_id=intval(substr($xml_id, 0, $first_dot_pos));
			$find_class=$find_class['value'][$object_id];
			$xml_id=substr($xml_id, $first_dot_pos+1);
		}
	}
	
	return TRUE;
}

?>