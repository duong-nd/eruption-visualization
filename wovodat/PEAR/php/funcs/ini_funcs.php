<?php

/******************************************************************************************************
*
* Package of functions doing operations for WOVOdat initialization files (contacts & volcanoes)
*
* ini_upload: Main function for uploading initialization data from an XML file to WOVOdat
* ini_upload_data: Function to upload initialization data from an XML to WOVOdat using an automaton file
*
******************************************************************************************************/

/******************************************************************************************************
* Main function for uploading initialization data from an XML file to WOVOdat
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_file: the XML file containing data to be uploaded to the database
* 			- $cc_id_load: the loader ID (pointing on 'cc_id' in 'cc' table in the database)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* Output:	- $errors: an array of errors
* 			- $l_errors: the length of the array of errors
******************************************************************************************************/
function ini_upload($xml_file, $cc_id_load, $upload_to_db, &$errors, &$l_errors) {
	
	require_once("php/funcs/xml_funcs.php");
	
	// Initialize errors message
	$errors=array();

	// Parse XML file and check if it is well-formed
	$xml_data=array();
	$local_error=0;
	if (!xml_parse_v2($xml_file, $xml_data, $local_error)) {
		switch ($local_error) {
			case 1:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2012;
				$errors[$l_errors]['message']="An error occurred when trying to open the XML file";
				$l_errors++;
				break;
			case 2:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2013;
				$errors[$l_errors]['message']="An error occurred when trying to read the XML file";
				$l_errors++;
				break;
			case 3:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2014;
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
				$errors[$l_errors]['code']=1048;
				$errors[$l_errors]['message']="An error occurred when parsing the initialization XML file";
				$l_errors++;
		}
		return FALSE;
	}
	
	// Check if XML file is valid against schema and display possible errors
	$current_dir = getcwd();
	$xml_schema = $current_dir.'/wovoml/ini/schema/WOVOdatIni.xsd';
	$local_errors=array();
	$l_local_errors=0;
	if(!xml_validate($xml_file, $xml_schema, $local_errors, $l_local_errors)) {
		for ($i=0; $i<$l_local_errors; $i++) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=6;
			$errors[$l_errors]['message']=$local_errors[$i];
			$l_errors++;
		}
		return FALSE;
	}
	
	// Second level element
	$xml_data_2=$xml_data[0]['value'];
	
	// Check if these data were already uploaded in the database
	if (!ini_check_db($xml_data_2, $owner_code, $errors, $l_errors)) {
		return FALSE;
	}
	
	// Get current UTC time
	$current_time = date("Y-m-d H:i:s",(time() - date("Z")));
	
	// Check publish dates (and change them if needed)
	ini_check_pubdates($current_time, $xml_data_2);
	
	// Upload data
	if (!ini_ul_data($xml_data_2, $current_time, $cc_id_load, $upload_to_db, $errors, $l_errors)) {
		return FALSE;
	}
		
	return TRUE;
}

/******************************************************************************************************
* Function to check if the data contained in a class of a WOVOINIML version 1.* file were already uploaded to the database previously
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $xml_array: an array containing data from a WOVOML version 1.* file
* 			- $gen_owner_code: the general owner code (cc_code)
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_check_db($xml_array, $gen_owner_code, &$errors, &$l_errors) {
	
	require_once("php/funcs/db_funcs.php");
	
	// Initialize variables
	$has_errors=FALSE;
	
	// Loop on elements
	for ($i=0; $i<count($xml_array); $i++) {
		// Local variables
		$xml_element=$xml_array[$i];
		
		// If element name is volcano, continue
		if ($xml_element['tag']=='VOLCANO') {
			continue;
		}
		
		// Element is contact
		// Get cc_code (1st element)
		$cc_code_element=$xml_element['value'][0];
		
		// Security check
		if ($cc_code_element['tag']!='CC_CODE') {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1062;
			$errors[$l_errors]['message']="The first element of a 'contact' element was not 'cc_code'";
			$l_errors++;
			return FALSE;
		}
		
		$cc_code=$cc_code_element['value'][0];
		
		// Check if this code is already in the database
		$field_name=array();
		$field_value=array();
		$field_name[0]="cc_code";
		$field_value[0]=$cc_code;
		$cnt_db=0;
		$local_error="";
		if (!db_count("cc", $field_name, $field_value, $cnt_db, $local_error)) {
			switch ($local_error) {
				case "Error in the parameters given":
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=1063;
					$errors[$l_errors]['message']=$local_error." to db_count()";
					$l_errors++;
					break;
				default:
					$errors[$l_errors]=array();
					$errors[$l_errors]['code']=4021;
					$errors[$l_errors]['message']=$local_error;
					$l_errors++;
			}
			return FALSE;
		}
		if ($cnt_db!=0) {
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=8;
			$errors[$l_errors]['message']="Element 'contact' with 'cc_code'='".$cc_code."' already exists in the database";
			$l_errors++;
			$has_errors=TRUE;
		}
	}
		
	if ($has_errors) {
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to check if the publish dates are up to 2 years in a WOVOML version 1.* file, and if not, change them
* Input:	- $current_time: the current time
* InOutput:	- $xml_array: an array containing data from a WOVOML version 1.* file
******************************************************************************************************/
function ini_check_pubdates($current_time, &$xml_array) {
	
	// Calculate max publish date
	$current_year_str=substr($current_time, 0, 4);
	$current_year=intval($current_year_str);
	$current_month_str=substr($current_time, 5, 2);
	$current_month=intval($current_month_str);
	$current_day_str=substr($current_time, 8, 2);
	$current_day=intval($current_day_str);
	$max_year=$current_year+2;
	$max_year_str=strval($max_year);
	switch (strlen($max_year_str)) {
		case 1:
			$max_year_str="000".$max_year_str;
			break;
		case 2:
			$max_year_str="00".$max_year_str;
			break;
		case 3:
			$max_year_str="0".$max_year_str;
			break;
		default:
			// Nothing to do
	}
	// If current date is the 29th of February
	if ($current_month==2 && $current_day==29) {
		// Latest publish date is on the 1st of March, 2 from current time
		$max_month=3;
		$max_day=1;
		$max_date=$max_year_str."-03-01";
		$max_pubdate=substr_replace($current_time, $max_date, 0, 10);
	}
	else {
		// Latest publish date is 2 years from current time
		$max_month=$current_month;
		$max_day=$current_day;
		$max_pubdate=substr_replace($current_time, $max_year_str, 0, 4);
	}
	
	// Loop on elements
	for ($i=0; $i<count($xml_array); $i++) {
		// Local variables
		$xml_element=&$xml_array[$i];
		
		// If element name is volcano, continue
		if ($xml_element['tag']=='VOLCANO') {
			continue;
		}
		
		// Element is contact
		// Get last element (publish date)
		$xml_element_data=&$xml_element['value'];
		$pubdate_element=&$xml_element_data[count($xml_element_data)-1];
		
		$pubdate=&$pubdate_element['value'][0];
		$element_year_str=substr($pubdate, 0, 4);
		$element_year=intval($element_year_str);
		$element_month_str=substr($pubdate, 5, 2);
		$element_month=intval($element_month_str);
		$element_day_str=substr($pubdate, 8, 2);
		$element_day=intval($element_day_str);
		
		// If its value is more than 2 years from current time
		if ($element_year>$max_year || ($element_year==$max_year && $element_month>$max_month) || ($element_year==$max_year && $element_month==$max_month && $element_day>$max_day)) {
			// Change value to max publish date
			$pubdate=$max_pubdate;
		}
	}
	
}

/******************************************************************************************************
* Function to upload to WOVOdat data contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $wovoml: an array containing data from a WOVOML version 1.* file
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_data($wovoml, $current_time, $cc_id_load, $upload_to_db, &$errors, &$l_errors) {
	
	require_once("php/funcs/db_funcs.php");
	require_once("php/funcs/xml_funcs.php");
	
	// Initialize variables
	$parents_id=array();
	
	// Automaton file
	$auto_file="php/auto/wovoml-wovodat/ini/loadDataAutoIni.xml";
	
	// Parse automaton
	$auto_array=array();
	if (!xml_parse_v2($auto_file, $auto_array, $local_errors)) {
		switch ($local_error) {
			case 1:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2024;
				$errors[$l_errors]['message']="An error occurred when trying to open loadDataAutoIni.xml automaton file";
				$l_errors++;
				break;
			case 2:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2025;
				$errors[$l_errors]['message']="An error occurred when trying to read loadDataAutoIni.xml automaton file";
				$l_errors++;
				break;
			case 3:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=2026;
				$errors[$l_errors]['message']="An error occurred when trying to close loadDataAutoIni.xml automaton file";
				$l_errors++;
				break;
			case 4:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1064;
				$errors[$l_errors]['message']="loadDataAutoIni.xml automaton file is not well-formed";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1065;
				$errors[$l_errors]['message']="An error occurred when parsing loadDataAutoIni.xml automaton file";
				$l_errors++;
		}
		return FALSE;
	}
	
	// 2nd level array
	$auto_lev2_array=$auto_array[0]['value'];
	$l_auto_lev2_array=count($auto_lev2_array);
	
	// Get wovoiniml content
	$l_wovoml=count($wovoml);

	// Loop on classes under wovoiniml tag
	for ($i=0; $i<$l_wovoml; $i++) {
		// Initialize variable
		$class=$wovoml[$i];
		$class_name=$class['tag'];
		
		// Find class in automaton
		for ($j=0; $j<$l_auto_lev2_array; $j++) {
			// Initialize variables
			$auto_class=$auto_lev2_array[$j];
			
			// If it's not the class we are looking for, continue
			if (strtoupper($auto_class['attributes']['NAME'])!=$class_name) {
				continue;
			}
			
			// It's the same class
			if (!ini_ul_class($class, $auto_class['value'], $current_time, $cc_id_load, $upload_to_db, $parents_id, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to upload to WOVOdat data contained in a class of a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $class: the array of a class from a WOVOML version 1.* file
* 			- $class_inst_array: the instructions from the automaton file to be done for this class
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_class($class, $class_inst_array, $current_time, $cc_id_load, $upload_to_db, &$parents_id, &$errors, &$l_errors) {
	
	require_once("php/funcs/db_funcs.php");
	
	// Initialize variables
	$elements=$class['value'];
	$l_elements=count($elements);
	$l_class_inst_array=count($class_inst_array);
	
	// New row in parents_id array
	$parents_id[count($parents_id)]=NULL;
	
	// Find dataload instruction
	for ($j=0; $j<$l_class_inst_array; $j++) {
		// Initialize variable
		$class_inst=$class_inst_array[$j];
		
		if ($class_inst['tag']=='DATALOAD') {
			// Do data loading instructions
			if (!ini_ul_dataload($class_inst['value'], $class, $current_time, $cc_id_load, $upload_to_db, $parents_id, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		}
	}
	
	// Remove last row from parents_id array
	unset($parents_id[count($parents_id)-1]);
	
	return TRUE;
}

/******************************************************************************************************
* Function to do the instructions of a 'dataLoad' instruction from the automaton for uploading data contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $dataload_inst: the instructions from the automaton file
* 			- $class: the class for which the instructions are being done
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_dataload($dataload_inst, $class, $current_time, $cc_id_load, $upload_to_db, &$parents_id, &$errors, &$l_errors) {
	// Initialize variables
	$l_dataload_inst=count($dataload_inst);
	$select=array();
	$results=array();
	
	// Loop on instructions
	for ($i=0; $i<$l_dataload_inst; $i++) {
		// Initialize variables
		$inst=$dataload_inst[$i];
		
		// Switch case
		switch ($inst['tag']) {
			case 'INSERT':
				if (!ini_ul_insert($inst['value'], $class, $current_time, $cc_id_load, $select, $results, $upload_to_db, $parents_id, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case 'SELECT':
				if (!ini_ul_select($inst, $class, $current_time, $cc_id_load, $parents_id, $results, $select, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case 'UPDATE':
				if (!ini_ul_update($inst['value'], $class, $current_time, $cc_id_load, $select, $parents_id, $results, $upload_to_db, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case 'FUNCTION':
				if (!ini_ul_function($inst, $class, $current_time, $cc_id_load, $select, $parents_id, $results, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1066;
				$errors[$l_errors]['message']="An instruction inside a 'dataLoad' instruction should be either 'insert', 'select' or 'update'";
				$l_errors++;
				return FALSE;
		}
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do an 'insert' instruction from the automaton for uploading data contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $insert_inst: the 'insert' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $select: an array of the selected values
* 			- $results: an array of the result values
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_insert($insert_inst, $class, $current_time, $cc_id_load, $select, $results, $upload_to_db, &$parents_id, &$errors, &$l_errors) {
	
	require_once("php/funcs/db_funcs.php");
	
	// Initialize variables
	$l_insert_inst=count($insert_inst);
	
	// Get table
	$table=$insert_inst[0];
	if ($table['tag']!='TABLE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1067;
		$errors[$l_errors]['message']="The first element of an insert instruction was not 'table' but '".$table['tag']."'";
		$l_errors++;
		return FALSE;
	}
	$insert_table=$table['value'][0];
	
	// Get fields and values
	$field_name=array();
	$field_value=array();
	// Loop on (field, value) couples
	for ($i=1; $i<$l_insert_inst; $i+=2) {
		// Initialize variables
		$temp_field_value=$insert_inst[$i+1]['value'][0];
		$real_field_value=NULL;
		
		// Depending on the first character of the value, the meaning is different
		switch (substr($temp_field_value, 0, 1)) {
			case '!':
				// General element
				if (!ini_ul_get_general($temp_field_value, $current_time, $cc_id_load, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!ini_ul_get_parent($temp_field_value, $parents_id, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if (!ini_ul_get_element($temp_field_value, $class, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '?':
				// Select value
				if (!ini_ul_get_select($temp_field_value, $select, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!ini_ul_get_attribute($temp_field_value, $class, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!ini_ul_get_result($temp_field_value, $results, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_field_value=$temp_field_value;
		}
		
		// If this element was not specified before
		if ($real_field_value==NULL) {
			continue;
		}
		
		// Enter field and value in array for calling db_insert later
		$field_name[($i-1)/2]=$insert_inst[$i]['value'][0];
		$field_value[($i-1)/2]=$real_field_value;
	}
	
	// Send query to database
	$last_insert_id=0;
	$local_error="";
	if (!db_insert($insert_table, $field_name, $field_value, !$upload_to_db, $last_insert_id, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1068;
				$errors[$l_errors]['message']=$local_error." to db_insert()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4022;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	
	// Store last insert ID in last row of parents_id
	$parents_id[count($parents_id)-1]=$last_insert_id;
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'select' instruction from the automaton for uploading data contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $select_inst: the 'select' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $results: an array of the result values
* InOutput:	- $select: an array of the selected values
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_select($select_inst, $class, $current_time, $cc_id_load, $parents_id, $results, &$select, &$errors, &$l_errors) {
	
	require_once("php/funcs/db_funcs.php");
	
	// Initialize variables
	$select_inst_array=$select_inst['value'];
	$l_select_inst=count($select_inst_array);
	
	// Get field
	$field=$select_inst_array[0];
	if ($field['tag']!='FIELD') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1069;
		$errors[$l_errors]['message']="The first element of a 'select' instruction was not 'field'";
		$l_errors++;
		return FALSE;
	}
	$select_field=array();
	$select_field[0]=$field['value'][0];
	
	// Get table
	$table=$select_inst_array[1];
	if ($table['tag']!='TABLE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1070;
		$errors[$l_errors]['message']="The second element of a 'select' instruction was not 'table'";
		$l_errors++;
		return FALSE;
	}
	$select_table=$table['value'][0];
	
	// Get where conditions
	$where=$select_inst_array[2];
	if ($where['tag']!='WHERE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1071;
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
				if (!ini_ul_get_general($where_value, $current_time, $cc_id_load, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!ini_ul_get_parent($where_value, $parents_id, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if (!ini_ul_get_element($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '?':
				// Select value
				if (!ini_ul_get_select($where_value, $select, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!ini_ul_get_attribute($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!ini_ul_get_result($where_value, $results, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_where_value=$where_value;
		}
		
		// Particular case: one element was not specified before
		if ($real_where_value==NULL) {
			// Return NULL value for select
			// Get target field
			$target=$select_inst['attributes']['TARGET'];
			// Send a NULL value
			$select[$target]=NULL;
			return TRUE;
		}
		
		// Enter value in array for calling db_select later
		$where_field_value[$i/2]=$real_where_value;
	}
	
	// Send query to database
	$field_value=array();
	$local_error="";
	if (!db_select($select_table, $select_field, $where_field_name, $where_field_value, $field_value, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1072;
				$errors[$l_errors]['message']=$local_error." to db_select()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4023;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	$l_field_value=count($field_value);
	if ($l_field_value>1) {
		// Only 1 result should be found
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1095;
		$errors[$l_errors]['message']="Multiple rows in the ".$select_table." table correspond to a query";
		$l_errors++;
	}

	// Get target field
	$target=$select_inst['attributes']['TARGET'];
	// Send value
	$select[$target]=$field_value[0][0];
	
	return TRUE;
}

/******************************************************************************************************
* Function to do an 'update' instruction from the automaton for uploading data contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $update_inst: the 'update' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $select: an array of the selected values
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $results: an array of the result values
* 			- $upload_to_db: a boolean to tell whether data should be uploaded to database (if FALSE, considered as test)
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_update($update_inst, $class, $current_time, $cc_id_load, $select, $parents_id, $results, $upload_to_db, &$errors, &$l_errors) {
	
	require_once("php/funcs/db_funcs.php");
	
	// Initialize variables
	$l_update_inst=count($update_inst);
	
	// Get table
	$table=$update_inst[0];
	if ($table['tag']!='TABLE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1073;
		$errors[$l_errors]['message']="The first element of an 'update' instruction was not 'table'";
		$l_errors++;
		return FALSE;
	}
	$update_table=$table['value'][0];
	
	// Get fields and values
	$field_name=array();
	$field_value=array();
	$cnt_fv=0;
	// Loop on (field, value) couples
	for ($i=1; $i<$l_update_inst-1; $i+=2) {
		// Initialize variables
		$real_field_value=NULL;
		$temp_field_value=$update_inst[$i+1]['value'][0];
		
		// Depending on the first character of the value, the meaning is different
		switch (substr($temp_field_value, 0, 1)) {
			case '!':
				// General element
				if (!ini_ul_get_general($temp_field_value, $current_time, $cc_id_load, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!ini_ul_get_parent($temp_field_value, $parents_id, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if (!ini_ul_get_element($temp_field_value, $class, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '?':
				// Select value
				if (!ini_ul_get_select($temp_field_value, $select, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!ini_ul_get_attribute($temp_field_value, $class, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!ini_ul_get_result($temp_field_value, $results, $real_field_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			default:
				// Static value
				$real_field_value=$temp_field_value;
		}
		
		// If this element was not specified before
		if ($real_field_value==NULL) {
			continue;
		}
		
		// Enter field and value in array for calling db_update later
		$field_name[$cnt_fv]=$update_inst[$i]['value'][0];
		$field_value[$cnt_fv]=$real_field_value;
		$cnt_fv++;
	}
	
	// Get where conditions
	$where=$update_inst[$l_update_inst-1];
	if ($where['tag']!='WHERE') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1074;
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
				if (!ini_ul_get_general($where_value, $current_time, $cc_id_load, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '=':
				// Current or parent
				if (!ini_ul_get_parent($where_value, $parents_id, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '*':
				// Local element
				if (!ini_ul_get_element($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '?':
				// Select value
				if (!ini_ul_get_select($where_value, $select, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '/':
				// Attribute
				if (!ini_ul_get_attribute($where_value, $class, $real_where_value, $errors, $l_errors)) {
					return FALSE;
				}
				break;
			case '#':
				// Function result
				if (!ini_ul_get_result($where_value, $results, $real_where_value, $errors, $l_errors)) {
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
			$errors[$l_errors]['code']=1075;
			$errors[$l_errors]['message']="A 'where' condition in an 'update' statement could not be verified";
			$l_errors++;
			return FALSE;
		}
		
		// Enter value in array for calling db_update later
		$where_field_value[$i/2]=$real_where_value;
	}
	
	// Send query to database
	$local_error="";
	if (!db_update($update_table, $field_name, $field_value, $where_field_name, $where_field_value, !$upload_to_db, $local_error)) {
		switch ($local_error) {
			case "Error in the parameters given":
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=1076;
				$errors[$l_errors]['message']=$local_error." to db_update()";
				$l_errors++;
				break;
			default:
				$errors[$l_errors]=array();
				$errors[$l_errors]['code']=4024;
				$errors[$l_errors]['message']=$local_error;
				$l_errors++;
		}
		return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to do a 'function' instruction from the automaton for uploading data contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $function_inst: the 'function' instruction from the automaton file
* 			- $class: the class for which the instruction is being done
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $select: an array of the selected values
* InOutput:	- $results: an array of the result values
* 			- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_function($function_inst, $class, $current_time, $cc_id_load, $parents_id, $select, &$results, &$errors, &$l_errors) {
	
	require_once("php/funcs/db_funcs.php");
	
	// Initialize variables
	$function_inst_array=$function_inst['value'];
	$l_function_inst=count($function_inst_array);
	
	// Security check
	if (!array_key_exists('attributes', $function_inst)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1085;
		$errors[$l_errors]['message']="A 'function' instruction doesn't have attributes";
		$l_errors++;
		return FALSE;
	}
	// Get instruction attributes
	$function_inst_att=$function_inst['attributes'];
	// Security check
	if (!array_key_exists('NAME', $function_inst_att)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1086;
		$errors[$l_errors]['message']="A 'function' instruction doesn't have 'name' attribute";
		$l_errors++;
		return FALSE;
	}
	// Get function name
	$name=$function_inst_att['NAME'];
	// Security check
	if (!array_key_exists('TARGET', $function_inst_att)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1087;
		$errors[$l_errors]['message']="A 'function' instruction doesn't have 'target' attribute";
		$l_errors++;
		return FALSE;
	}
	// Get function target
	$target=$function_inst_att['TARGET'];
	
	// Depending on the name of the function, we call different functions
	switch ($name) {
		case "get_microseconds":
			// Get microseconds from a datetime
			if (!ini_ul_get_microseconds($function_inst_array, $l_function_inst, $class, $current_time, $cc_id_load, $parents_id, $select, $results, $result_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1088;
			$errors[$l_errors]['message']="A 'function' instruction doesn't have a correct 'name' attribute";
			$l_errors++;
			return FALSE;
	}
	
	// Send value
	$results[$target]=$result_value;
	
	return TRUE;
}

/******************************************************************************************************
* Function to do get the microseconds from a datetime string; function used for uploading data contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $inst: the array of the 'function' instruction from the automaton file
* 			- $l_inst: the length of the array of the function instruction
* 			- $class: the class for which the instruction is being done
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* 			- $select: an array of the selected values
* 			- $results: an array of the result values
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
* Output:	- $result_value: the processed value
******************************************************************************************************/
function ini_ul_get_microseconds($inst, $l_inst, $class, $current_time, $cc_id_load, $parents_id, $select, $results, &$result_value, &$errors, &$l_errors) {
	
	// Check number of parameters
	if ($l_inst!=1) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1089;
		$errors[$l_errors]['message']="A 'get_microseconds' instruction has less or more than 1 parameter";
		$l_errors++;
		return FALSE;
	}
	
	// Get parameter
	$parameter=$inst[0]['value'][0];
	
	// Depending on the first character of the parameter, we have to call different functions
	switch (substr($parameter, 0, 1)) {
		case '!':
			// General element
			if (!ini_ul_get_general($parameter, $current_time, $cc_id_load, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '=':
			// Current or parent
			if (!ini_ul_get_parent($parameter, $parents_id, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '*':
			// Local element
			if (!ini_ul_get_element($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '?':
			// Select value
			if (!ini_ul_get_select($parameter, $select, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '/':
			// Attribute
			if (!ini_ul_get_attribute($parameter, $class, $real_parameter_value, $errors, $l_errors)) {
				return FALSE;
			}
			break;
		case '#':
			// Function result
			if (!ini_ul_get_result($parameter, $results, $real_parameter_value, $errors, $l_errors)) {
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
	// Cut the end of the string (including ".") and this is the value to return
	$result_value=substr($real_parameter_value, $last_point_pos, strlen($real_parameter_value)-$last_point_pos);
	
	return TRUE;
}

/******************************************************************************************************
* Function to get a 'general' value contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the 'general' value as found in the automaton file
* 			- $current_time: the current time
* 			- $cc_id_load: the loader ID (pointing to 'cc_id' from the 'cc' table)
* Output:	- $real_value: the requested 'general' value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_get_general($value, $current_time, $cc_id_load, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '!'
	if (substr($value, 0, 1) != '!') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1077;
		$errors[$l_errors]['message']="The first character of the value given was not '!'";
		$l_errors++;
		return FALSE;
	}
	
	// Switch remaining of the string
	switch (substr($value, 1, (strlen($value)-1))) {
		case 'cc_id_load':
			// General loader ID
			$real_value=$cc_id_load;
			break;
		case 'loaddate':
			// Current time
			$real_value=$current_time;
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1078;
			$errors[$l_errors]['message']="A general value was not specified correctly: '".$value."'";
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the current value or the one of a parent of an element contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the 'parent' value as found in the automaton file
* 			- $parents_id: an array containing the IDs of the parents of the element being uploaded
* Output:	- $real_value: the requested 'parent' value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_get_parent($value, $parents_id, &$real_value, &$errors, &$l_errors) {
	// Initialize variables
	$l_value=strlen($value);
	
	// Security check: first character must be '='
	if (substr($value, 0, 1) != '=') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1079;
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
			$n_parent=intval(substr($value, $l_value-2, 1));
			$real_value=$parents_id[count($parents_id)-1-$n_parent];
			break;
		default:
			// Error
			$errors[$l_errors]=array();
			$errors[$l_errors]['code']=1080;
			$errors[$l_errors]['message']="A current/parent value was not specified correctly: '".$value."'";
			$l_errors++;
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the value of an element contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the name of the element of which the value must be found
* 			- $class: the current class being uploaded
* Output:	- $real_value: the requested element value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_get_element($value, $class, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '*'
	if (substr($value, 0, 1) != '*') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1081;
		$errors[$l_errors]['message']="The first character of the value given was not '*'";
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
		$real_value=$element['value'][0];
		break;
	}
	
	// If it was not found, return NULL value
	if (!$found) {
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
function ini_ul_get_select($value, $select, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '?'
	if (substr($value, 0, 1) != '?') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1082;
		$errors[$l_errors]['message']="The first character of the value given was not '?'";
		$l_errors++;
		return FALSE;
	}
	
	// Get target name
	$target_name=substr($value, 1, strlen($value)-1);
	
	// Get target value
	if (!array_key_exists($target_name, $select)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1083;
		$errors[$l_errors]['message']="A select value was not specified correctly: '".$value."'";
		$l_errors++;
		return FALSE;
	}
	$real_value=$select[$target_name];
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the value of the attribute of an element contained in a WOVOML version 1.* file
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $value: the name of the attribute of which the value must be found
* 			- $class: the current class being uploaded
* Output:	- $real_value: the requested attribute value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_get_attribute($value, $class, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '/'
	if (substr($value, 0, 1) != '/') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1084;
		$errors[$l_errors]['message']="The first character of the value given was not '/'";
		$l_errors++;
		return FALSE;
	}
	
	// Get attribute name
	$attribute_name=strtoupper(substr($value, 1, strlen($value)-1));
	
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
* Input:	- $value: the name of the target of a previous 'function' instruction
* 			- $function_results: an array of the results
* Output:	- $real_value: the requested value
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function ini_ul_get_result($value, $function_results, &$real_value, &$errors, &$l_errors) {
	
	// Security check: first character must be '#'
	if (substr($value, 0, 1) != '#') {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1090;
		$errors[$l_errors]['message']="The first character of the value given was not '#'";
		$l_errors++;
		return FALSE;
	}
	
	// Get target name
	$target_name=substr($value, 1, strlen($value)-1);
	
	// Get target value
	if (!array_key_exists($target_name, $function_results)) {
		$errors[$l_errors]=array();
		$errors[$l_errors]['code']=1091;
		$errors[$l_errors]['message']="A 'result' value was not specified correctly: '".$value."'";
		$l_errors++;
		return FALSE;
	}
	$real_value=$function_results[$target_name];
	
	return TRUE;
}

?>