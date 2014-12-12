<?php

/******************************************************************************************************
*
* Package of functions doing operations for WOVOdat CSV initialization files (contacts)
*
* ini_csv_to_wovoml: Main function for translating CSV initialization contact to WOVOML
*
******************************************************************************************************/

/******************************************************************************************************
* Main function for translating CSV initialization contact to WOVOML
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $csv_file: the CSV file containing contact data to be translated into wovoml
* 			- $cc_id_load: the loader ID (pointing on 'cc_id' in 'cc' table in the database)
* InOutput:	- $wovoml_file: the output wovoml file
* Output:	- $error: an error message
******************************************************************************************************/
function ini_csv_to_wovoml($csv_file, $cc_id_load, &$wovoml_file, &$error) {
	
	// Initialize errors message
	$error="";

	// Get current UTC time
	$current_time=date("Y-m-d H:i:s",(time()-date("Z")));
	
	// Create new initialization WOVOML file
	$wovoml_handler=fopen($wovoml_file, 'w');
	// If an error occurred
	if (!$wovoml_handler) {
		$error="Error when trying to create initialization XML file";
		return FALSE;
	}
	
	// Write header (wovoiniml)
	$header="<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n<wovoiniml version=\"1.0\" xmlns=\"http://www.wovodat.org\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.wovodat.org WOVOdatIni.xsd\">\n";
	// If an error occurred
	if (!fwrite($wovoml_handler, $header)) {
		$error="Error when trying to write initialization XML file";
		return FALSE;
	}
	
	// Open CSV file
	$csv_handler=fopen($csv_file, 'r');
	// If an error occurred
	if (!$csv_handler) {
		$error="Error when trying to open initialization CSV file";
		return FALSE;
	}
	
	// Read 1st line (fields) - max length: 1500 (very large)
	$fields_array=fgetcsv($csv_handler, 1500);
	// If an error occurred
	if (!$fields_array) {
		$error="Error when trying to read initialization CSV file";
		return FALSE;
	}
	// Add prefix "cc_" to field names
	$l_fields_array=count($fields_array);
	for ($i=0; $i<$l_fields_array; $i++) {
		$fields_array[$i]="cc_".$fields_array[$i];
	}
	
	// Read rest of the CSV file line by line
	while (($data_array=fgetcsv($csv_handler, 1500)) !== FALSE) {
		// New contact element in WOVOINIML file
		$wovoml_line="\t<contact>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			$error="Error when trying to write initialization XML file";
			return FALSE;
		}
		
		// Loop on the number of fields
		for ($i=0; $i<$l_fields_array; $i++) {
			// Local variable
			$data=$data_array[$i];
			
			// If data is empty, continue
			if ($data=="") {
				continue;
			}
			
			// Replace special characters
			$data=htmlspecialchars($data);
			
			// New element
			$wovoml_line="\t\t<".$fields_array[$i].">".$data."</".$fields_array[$i].">\n";
			if (!fwrite($wovoml_handler, $wovoml_line)) {
				$error="Error when trying to write initialization XML file";
				return FALSE;
			}
		}
		
		// Add publish date (current time)
		$wovoml_line="\t\t<cc_pubdate>".$current_time."</cc_pubdate>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			$error="Error when trying to write initialization XML file";
			return FALSE;
		}
		
		// Close contact element
		$wovoml_line="\t</contact>\n";
		// If an error occurred
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			$error="Error when trying to write initialization XML file";
			return FALSE;
		}
	}
	
	// Close wovoiniml element
	$wovoml_line="</wovoiniml>";
	// If an error occurred
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		$error="Error when trying to write initialization XML file";
		return FALSE;
	}
	
	// Close CSV
	if (!fclose($csv_handler)) {
		$error="Error when trying to close initialization CSV file";
		return FALSE;
	}

	// Close WOVOML
	if (!fclose($wovoml_handler)) {
		$error="Error when trying to close initialization XML file";
		return FALSE;
	}

	return TRUE;
}

?>