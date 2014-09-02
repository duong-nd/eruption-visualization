<?php

/******************************************************************************************************
*
* Package of functions doing operations on XML files
*
* xml_parse_v1: Function to parse an XML file (first version, by Jacopo Selva)
* xml_parse_v2: Function to parse an XML file (second version, by Alex Baguet)
* xml_validate: Function to validate an XML file against an XSD file
* libxml_display_errors: Function to display validation errors
* libxml_display_error: Function to display one validation error
* xml_get_att: Function to get the value of an attribute
* xml_get_ele: Function to get the value of an element
*
******************************************************************************************************/

/******************************************************************************************************
* Function to parse an XML file (first version)
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $file: the XML file to be parsed
* Output:	- $params: an array containing the information contained in the XML file
* 			- $errors: a number corresponding to an error
******************************************************************************************************/
function xml_parse_v1($file, &$params, &$errors) {
	//Initialize error message
	$errors=0;

	// If XML file cannot be open for reading, display error message
	if (!($fp = fopen($file, "r"))) {
		// Error when opening file
		$errors=1;
		return FALSE;
	}

	// Read file and store data in $data
	$data=fread($fp, filesize($file));
	if (!$data) {
		// Error when reading file
		$errors=2;
		return FALSE;
	}
	// Close file
	if (!fclose($fp)) {
		// Error when closing file
		$errors=3;
		return FALSE;
	}
	
	// Create XML parser
	$xml_parser = xml_parser_create();
	// Parse XML data into $vals (array)
	if (xml_parse_into_struct($xml_parser, $data, $vals)==0) {
		$errors=4;
		return FALSE;
	}
	// Destroy XML parser
	xml_parser_free($xml_parser);

	// $level array is needed for parsing
	$level = array();
	// Loop on $vals elements
	foreach ($vals as $xml_elem) {
		// If the element type is 'open'
		if ($xml_elem['type'] == 'open') {
			// If there is an attribute
			if (array_key_exists('attributes',$xml_elem)) {
				// In $level array, at the line corresponding to the element level (1, 2... , m), store "tag(code)"
				$level[$xml_elem['level']] = $xml_elem['tag'] . "(" . $xml_elem['attributes']["CODE"] . ")";
			}
			else {
				// In $level array, at the line corresponding to the element level, store "tag"
				$level[$xml_elem['level']] = $xml_elem['tag'];
			}
		}
		// If the element type is 'complete'
		if ($xml_elem['type'] == 'complete') {
			// Initialize counter for levels 
			$start_level = 1;
			// Create a string which will be php code
			$php_stmt = '$params';
			// Loop while level is less than the current element's level
			while($start_level < $xml_elem['level']) {
				// Add "[$level[$start_level]]" to php code
				  $php_stmt .= '[$level['.$start_level.']]';
				  $start_level++;
			}
			// Php code is now: "$params[$level[1]]...[$level][$level-1][$xml_elem['tag']] = $xml_elem['value'];"
			$php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
			// Evaluate and execute php code: in $params array, at the line corresponding to 'tag(code)', column corresponding to 2nd 'tag(code)', etc... store value of element
			eval($php_stmt);
		}
	}
	return TRUE;
}

/******************************************************************************************************
* Function to parse an XML file (second version)
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $file: the XML file to be parsed
* Output:	- $xml_array: an array containing the information contained in the XML file
* 				- $errors: a number corresponding to an error
******************************************************************************************************/
function xml_parse_v2($file, &$xml_array, &$errors) {
	// Initialize error message
	$errors=0;

	// If XML file cannot be open for reading, display error message
	if (!($fp = fopen($file, "r"))) {
		// Error when opening file
		$errors=1;
		return FALSE;
	}

	// Read file and store it as a string in $xml_string
	$xml_string = fread($fp, filesize($file));
	if (!$xml_string) {
		// Error when reading file
		$errors=2;
		return FALSE;
	}
	
	// Close file
	if (!(fclose($fp))) {
		// Error when closing file
		$errors=3;
		return FALSE;
	}
	
	// Create XML parser
	$xml_parser=xml_parser_create();
	// Parse XML data into $vals (array)
	if (xml_parse_into_struct($xml_parser, $xml_string, $raw_xml_array)==0) {
		// XML is not well-formed
		$errors=4;
		return FALSE;
	}
	// Destroy XML parser
	xml_parser_free($xml_parser);
	
	// Initialize variables
	$levels=array();
	$levels[0]=0;
	
	// Loop on $raw_xml_array elements
	for ($i=0; $i<count($raw_xml_array); $i++) {
		// If the element type is 'open'
		if ($raw_xml_array[$i]['type'] == 'open') {
			// Initialize variables
			$php_code="";
			$nlevel=count($levels);
			// Store as next element
			for ($j=0; $j<$nlevel; $j++) {
				// Get where element shall be stored
				if ($j==0) {
					$php_code.='$xml_array['.$levels[$j].']';
				}
				else {
					$php_code.='[\'value\']['.$levels[$j].']';
				}
			}
			// Finish PHP code
			$php_code1=$php_code.'=$raw_xml_array['.$i.'];';
			eval($php_code1);
			// Add new level
			$levels[$nlevel]=0;
			// Prepare array of values
			$php_code2=$php_code.'[\'value\']=array();';
			eval($php_code2);
			continue;
		}
		
		// If the element type is 'complete'
		if ($raw_xml_array[$i]['type'] == 'complete') {
			// Initialize variables
			$php_code="";
			$nlevel=count($levels);
			// Store as next element
			for ($j=0; $j<$nlevel; $j++) {
				// Get where element shall be stored
				if ($j==0) {
					$php_code.='$xml_array['.$levels[$j].']';
				}
				else {
					$php_code.='[\'value\']['.$levels[$j].']';
				}
			}
			// Finish PHP code
			$php_code1=$php_code.'=$raw_xml_array['.$i.'];';
			eval($php_code1);
			// Change value into array
			if (isset($raw_xml_array[$i]['value'])) {
				$element_value=$raw_xml_array[$i]['value'];
			}
			else {
				$element_value=NULL;
			}
			$php_code2=$php_code.'[\'value\']=array();';
			eval($php_code2);
			$php_code3=$php_code.'[\'value\'][0]=$element_value;';
			eval($php_code3);
			// Increment last level count
			$levels[$nlevel-1]++;
			continue;
		}
		
		// If the element type is 'cdata'
		if ($raw_xml_array[$i]['type'] == 'cdata') {
			// If CDATA is empty, continue
			if (trim($raw_xml_array[$i]['value']) == "") {
				continue;
			}
			
			// Initialize variables
			$php_code="";
			$nlevel=count($levels);
			// Store as next element
			for ($j=0; $j<$nlevel; $j++) {
				// Get where element shall be stored
				if ($j==0) {
					$php_code.='$xml_array['.$levels[$j].']';
				}
				else {
					$php_code.='[\'value\']['.$levels[$j].']';
				}
			}
			// Finish PHP code
			$php_code1=$php_code.'=$raw_xml_array['.$i.'][\'value\'];';
			eval($php_code1);
			// Increment last level count
			$levels[$nlevel-1]++;
			continue;
		}
		
		// If the element type is 'close'
		if ($raw_xml_array[$i]['type'] == 'close') {
			// Initialize variables
			$nlevel=count($levels);
			// Remove last level
			unset($levels[$nlevel-1]);
			// Increment 2nd last level count
			$levels[$nlevel-2]++;
			continue;
		}
	}
	return TRUE;
}

/******************************************************************************************************
* Function to validate an XML file against an XSD file
* Returns an error message (empty if no error occurred)
* Input:	- $xml_file: the XML file to be validated
* 			- $xml_schema: the XSD file to be used for validation
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function xml_validate($xml_file, $xml_schema, &$errors, &$l_errors) {
	// Initialize error message
	$errors=array();
	$l_errors=0;
	
	// Enable user error handling
	libxml_use_internal_errors(true);

	$xml=new DOMDocument();
	$xml->preserveWhiteSpace=false;
	$xml->formatOutput=true;
	$xml->load($xml_file);

	if (!$xml->schemaValidate($xml_schema)) {
		libxml_display_errors($errors, $l_errors);
		return FALSE;
	}

	return TRUE;
}

/******************************************************************************************************
* Function to display validation errors
* Returns nothing
* InOutput:	- $errors: an array of error messages
* 			- $l_errors: the length of the array of error messages
******************************************************************************************************/
function libxml_display_errors(&$errors, &$l_errors) {
	// Get errors
	$libxml_errors=libxml_get_errors();
	
	// For each error
	foreach ($libxml_errors as $libxml_error) {
		// Case on error level
		switch ($libxml_error->level) {
			case LIBXML_ERR_WARNING:
				// Warning
				$errors[$l_errors]="Warning $libxml_error->code: ";
				break;
			case LIBXML_ERR_ERROR:
				// Error
				$errors[$l_errors]="Error $libxml_error->code: ";
				break;
			case LIBXML_ERR_FATAL:
				// Fatal
				$errors[$l_errors]="Fatal $libxml_error->code: ";
				break;
		}
		
		// Add error message + line
		$errors[$l_errors].=trim($libxml_error->message)." on line $libxml_error->line.";
		
		// Prepare next message
		$l_errors++;
	}
	
	// Erase errors
	libxml_clear_errors();
}

/******************************************************************************************************
* Function to get the value of an attribute
* Returns attribute value
* Input:	- $object: the XML object (as PHP array)
* 			- $att_name: the attribute name
******************************************************************************************************/
function xml_get_att($object, $att_name) {
	
	// If parameters are empty
	if (empty($object) || empty($att_name)) {
		return NULL;
	}
	
	// Get attribute value
	if (!isset($object['attributes'][$att_name])) {
		return NULL;
	}
	
	return preg_replace('/\s+/', ' ', trim($object['attributes'][$att_name]));
}

/******************************************************************************************************
* Function to get the value of an element (1st encountered)
* Returns element value
* Input:	- $object: the XML object (as PHP array)
* 			- $ele_name: the element name
******************************************************************************************************/
function xml_get_ele($object, $ele_name) {
	
	// If parameters are empty
	if (empty($object) || empty($ele_name)) {
		return NULL;
	}
	
	// Loop on elements
	foreach ($object['value'] as $element) {
		if ($element['tag']!=$ele_name) {
			continue;
		}
		// Element found
		return preg_replace('/\s+/', ' ', trim($element['value'][0]));
	}
	
	// Not found
	return NULL;
}

?>