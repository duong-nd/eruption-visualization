<?php

/******************************************************************************************************
*
* Package of functions doing operations on original observatory files
*
* ori_to_wovoml: Main function for translating original observatory file to WOVOML
*
******************************************************************************************************/

/******************************************************************************************************
* Main function for translating original observatory file to WOVOML
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $ori_file: the original file containing observatory data to be translated into wovoml
* 			- $cc_id_load: the loader ID (pointing on 'cc_id' in 'cc' table in the database)
* InOutput:	- $wovoml_file: a wovoml file on the server
* Output:	- $error: an error message
******************************************************************************************************/
function ori_to_wovoml($ori_file, $obs_id, $datatype, $cc_id_load, $current_time, &$wovoml_file, &$error) {
	
	// Depending on observatory and type of file
	switch ($obs_id) {
		case 202:
			// PBO
			// Depending on file type
			switch ($datatype) {
				case "Strain":
					// Strain (XML)
					if (!pbo_strain_to_wovoml($ori_file, $cc_id_load, $wovoml_file, $error)) {
						return FALSE;
					}
					break;
				default:
					// Not available
					$error="1- This observatory doesn't have any scripts for translating original file to WOVOML yet";
					return FALSE;
			}
			break;
		default:
			// Not available
			$error="1- This observatory doesn't have any scripts for translating original file to WOVOML yet";
			return FALSE;
	}
	
	return TRUE;
}

/******************************************************************************************************
* Main function for translating original observatory file to WOVOML
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $ori_file: the original file containing observatory data to be translated into wovoml
* 			- $cc_id_load: the loader ID (pointing on 'cc_id' in 'cc' table in the database)
* InOutput:	- $wovoml_file: a wovoml file on the server
* Output:	- $error: an error message
******************************************************************************************************/
function pbo_strain_to_wovoml($ori_file, $cc_id_load, &$wovoml_file, &$error) {
	
	require_once "php/funcs/xml_funcs.php";
	
	// Parse original XML file (and check if it is well-formed)
	$xml_array=array();
	$local_error=0;
	if (!xml_parse_v2($ori_file, $xml_array, $local_error)) {
		switch ($local_error) {
			case 1:
				$error="2- An error occurred when trying to open the XML file";
				break;
			case 2:
				$error="2- An error occurred when trying to read the XML file";
				break;
			case 3:
				$error="2- An error occurred when trying to close the XML file";
				break;
			case 4:
				$error="9- The XML file is not well-formed";
				break;
			default:
				$error="1- An unknown error occurred when parsing the XML file";
		}
		return FALSE;
	}
	
	// It is well-formed
	
	// Check that it's a "strain_xml"
	$strain_xml=$xml_array[0];
	if ($strain_xml['tag']!="STRAIN_XML") {
		// This is not a "strain_xml" file
		$error="9- This is not a \"strain_xml\" as expected";
		return FALSE;
	}
	
	// Create WOVOML file
	$wovoml_handler=fopen($wovoml_file, 'w');
	// If an error occurred
	if (!$wovoml_handler) {
		$error="2- Error when trying to create WOVOML file";
		return FALSE;
	}
	
	// Write header
	$header="<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n<wovoml version=\"1.0\" xmlns=\"http://www.wovodat.org\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.wovodat.org WOVOdatV1.xsd\">\n";
	// If an error occurred
	if (!fwrite($wovoml_handler, $header)) {
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	
	// Get station code (station_information.dot_number -> TiltStrainInstrument.stationCode)
	$inst_info=$strain_xml['value'][0];
	$station_information=$inst_info['value'][0];
	$dot_number=$station_information['value'][3];
	if ($dot_number['tag']!="DOT_NUMBER") {
		// Unknown format: 'dot_number' not found
		$error="9- Unknown format: 'dot_number' not found";
		return FALSE;
	}
	$station_code=trim($dot_number['value'][0]);
	
	// Get and check instrument type (station_information.itype -> TiltStrainInstrument.type -- must be BSM_, otherwise error)
	$itype=$station_information['value'][5];
	if ($itype['tag']!="ITYPE") {
		// Unknown format: 'itype' not found
		$error="9- Unknown format: 'itype' not found";
		return FALSE;
	}
	$itype_value=trim($itype['value'][0]);
	if ($itype_value!="BSM_") {
		// Unknown format: system can only treat data from BSM instrument
		$error="9- Unknown format: system can only treat data from BSM instrument";
		return FALSE;
	}
	$instrument_type="Borehole Strainmeter";
	
	// Get and check owner code (station_information.institution must be PBO_UNAVCO, otherwise error)
	$institution=$station_information['value'][7];
	if ($institution['tag']!="INSTITUTION") {
		// Unknown format: 'institution' not found
		$error="9- Unknown format: 'institution' not found";
		return FALSE;
	}
	$institution_value=trim($institution['value'][0]);
	if ($institution_value!="PBO_UNAVCO") {
		// Unknown format: system can only treat data from PBO_UNAVCO institution
		$error="9- Unknown format: system can only treat data from PBO_UNAVCO institution";
		return FALSE;
	}
	$owner_code="PBO";
	
	// First sensor
	$sensor_information=$inst_info['value'][1];
	$sensor1_response=$sensor_information['value'][0];
	// Get instrument code ('station_information.itype'_'sensor_response.datalogger_serial_number' -> TiltStrainInstrument.code + Strain.instrumentCode
	$datalogger_serial_number=$sensor1_response['value'][13];
	if ($datalogger_serial_number['tag']!="DATALOGGER_SERIAL_NUMBER") {
		// Unknown format: 'datalogger_serial_number' not found
		$error="9- Unknown format: 'datalogger_serial_number' not found";
		return FALSE;
	}
	$datalogger_serial_number_value=trim($datalogger_serial_number['value'][0]);
	$instrument_code=$itype_value.$datalogger_serial_number_value;
	// Get instrument name ("Serial number: "sensor_response.datalogger_serial_number"; Model: "sensor_response.datalogger_model"; Manufacturer: "sensor_response.datalogger_manufacturer -> TiltStrainInstrument.name)
	$datalogger_manufacturer=$sensor1_response['value'][12];
	if ($datalogger_manufacturer['tag']!="DATALOGGER_MANUFACTURER") {
		// Unknown format: 'datalogger_manufacturer' not found
		$error="9- Unknown format: 'datalogger_manufacturer' not found";
		return FALSE;
	}
	$datalogger_manufacturer_value=trim($datalogger_manufacturer['value'][0]);
	$datalogger_model=$sensor1_response['value'][14];
	if ($datalogger_model['tag']!="DATALOGGER_MODEL") {
		// Unknown format: 'datalogger_model' not found
		$error="9- Unknown format: 'datalogger_model' not found";
		return FALSE;
	}
	$datalogger_model_value=trim($datalogger_model['value'][0]);
	$instrument_name="Serial number: ".$datalogger_serial_number_value."; Model: ".$datalogger_model_value."; Manufacturer: ".$datalogger_manufacturer_value;
	// Get instrument depth (sensor_response.depth -> TiltStrainInstrument.depth)
	$sensor1_depth=$sensor1_response['value'][5];
	if ($sensor1_depth['tag']!="DEPTH") {
		// Unknown format: 'sensor_start_date' not found
		$error="9- Unknown format: 'depth' not found";
		return FALSE;
	}
	if ($sensor1_depth['attributes']['UNITS']!="m") {
		// Unknown format: system can only treat sensor with 'm' units for depth
		$error="9- Unknown format: system can only treat sensor with 'm' units for depth";
		return FALSE;
	}
	$instrument_depth=trim($sensor1_depth['value'][0]);
	
	// 4 first sensors
	$sensor2_response=$sensor_information['value'][1];
	$sensor3_response=$sensor_information['value'][2];
	$sensor4_response=$sensor_information['value'][3];
	// Get instrument start time (max(sensor_response.sensor_start_date) -> TiltStrainInstrument.startTime)
	$sensor1_start_date=$sensor1_response['value'][0];
	if ($sensor1_start_date['tag']!="SENSOR_START_DATE") {
		// Unknown format: 'sensor_start_date' not found
		$error="9- Unknown format: 'sensor_start_date' not found";
		return FALSE;
	}
	$sensor1_start_date_value=trim($sensor1_start_date['value'][0]);
	// Component 2
	$sensor2_start_date=$sensor2_response['value'][0];
	if ($sensor2_start_date['tag']!="SENSOR_START_DATE") {
		// Unknown format: 'sensor_start_date' not found
		$error="9- Unknown format: 'sensor_start_date' not found";
		return FALSE;
	}
	$sensor2_start_date_value=trim($sensor2_start_date['value'][0]);
	$sensor3_start_date=$sensor3_response['value'][0];
	if ($sensor3_start_date['tag']!="SENSOR_START_DATE") {
		// Unknown format: 'sensor_start_date' not found
		$error="9- Unknown format: 'sensor_start_date' not found";
		return FALSE;
	}
	$sensor3_start_date_value=trim($sensor3_start_date['value'][0]);
	$sensor4_start_date=$sensor4_response['value'][0];
	if ($sensor4_start_date['tag']!="SENSOR_START_DATE") {
		// Unknown format: 'sensor_start_date' not found
		$error="9- Unknown format: 'sensor_start_date' not found";
		return FALSE;
	}
	$sensor4_start_date_value=trim($sensor4_start_date['value'][0]);
	$max_sensor_start_date=max($sensor1_start_date_value, $sensor2_start_date_value, $sensor3_start_date_value, $sensor4_start_date_value);
	$instrument_start_time=substr_replace($max_sensor_start_date, ' ', 10, 1);
	// For each sensor (n=1,4): check direction (must be "east_of_north") and units (must be "degrees"), get component direction (sensor_response(n).orientation -> TiltStrainInstrument.direction(n))
	$sensor1_orientation=$sensor1_response['value'][6];
	if ($sensor1_orientation['tag']!="ORIENTATION") {
		// Unknown format: 'orientation' not found
		$error="9- Unknown format: 'orientation' not found";
		return FALSE;
	}
	if ($sensor1_orientation['attributes']['DIRECTION']!="east_of_north") {
		// Unknown format: system can only treat sensor with 'east of north' direction
		$error="9- Unknown format: system can only treat sensor with 'east of north' direction";
		return FALSE;
	}
	if ($sensor1_orientation['attributes']['UNITS']!="degrees") {
		// Unknown format: system can only treat sensor with 'degrees' units
		$error="9- Unknown format: system can only treat sensor with 'degrees' units";
		return FALSE;
	}
	$sensor1_orientation_value=floatval(trim($sensor1_orientation['value'][0]));
	if ($sensor1_orientation_value<0 || $sensor1_orientation_value>360) {
		// Unknown format: system can only treat sensors which orientation ranges from 0 to 360
		$error="9- Unknown format: system can only treat sensors which orientation ranges from 0 to 360";
		return FALSE;
	}
	$sensor2_orientation=$sensor2_response['value'][6];
	if ($sensor2_orientation['tag']!="ORIENTATION") {
		// Unknown format: 'orientation' not found
		$error="9- Unknown format: 'orientation' not found";
		return FALSE;
	}
	if ($sensor2_orientation['attributes']['DIRECTION']!="east_of_north") {
		// Unknown format: system can only treat sensor with 'east of north' direction
		$error="9- Unknown format: system can only treat sensor with 'east of north' direction";
		return FALSE;
	}
	if ($sensor2_orientation['attributes']['UNITS']!="degrees") {
		// Unknown format: system can only treat sensor with 'degrees' units
		$error="9- Unknown format: system can only treat sensor with 'degrees' units";
		return FALSE;
	}
	$sensor2_orientation_value=floatval(trim($sensor2_orientation['value'][0]));
	if ($sensor2_orientation_value<0 || $sensor2_orientation_value>360) {
		// Unknown format: system can only treat sensors which orientation ranges from 0 to 360
		$error="9- Unknown format: system can only treat sensors which orientation ranges from 0 to 360";
		return FALSE;
	}
	$sensor3_orientation=$sensor3_response['value'][6];
	if ($sensor3_orientation['tag']!="ORIENTATION") {
		// Unknown format: 'orientation' not found
		$error="9- Unknown format: 'orientation' not found";
		return FALSE;
	}
	if ($sensor3_orientation['attributes']['DIRECTION']!="east_of_north") {
		// Unknown format: system can only treat sensor with 'east of north' direction
		$error="9- Unknown format: system can only treat sensor with 'east of north' direction";
		return FALSE;
	}
	if ($sensor3_orientation['attributes']['UNITS']!="degrees") {
		// Unknown format: system can only treat sensor with 'degrees' units
		$error="9- Unknown format: system can only treat sensor with 'degrees' units";
		return FALSE;
	}
	$sensor3_orientation_value=floatval(trim($sensor3_orientation['value'][0]));
	if ($sensor3_orientation_value<0 || $sensor3_orientation_value>360) {
		// Unknown format: system can only treat sensors which orientation ranges from 0 to 360
		$error="9- Unknown format: system can only treat sensors which orientation ranges from 0 to 360";
		return FALSE;
	}
	$sensor4_orientation=$sensor4_response['value'][6];
	if ($sensor4_orientation['tag']!="ORIENTATION") {
		// Unknown format: 'orientation' not found
		$error="9- Unknown format: 'orientation' not found";
		return FALSE;
	}
	if ($sensor4_orientation['attributes']['DIRECTION']!="east_of_north") {
		// Unknown format: system can only treat sensor with 'east of north' direction
		$error="9- Unknown format: system can only treat sensor with 'east of north' direction";
		return FALSE;
	}
	if ($sensor4_orientation['attributes']['UNITS']!="degrees") {
		// Unknown format: system can only treat sensor with 'degrees' units
		$error="9- Unknown format: system can only treat sensor with 'degrees' units";
		return FALSE;
	}
	$sensor4_orientation_value=floatval(trim($sensor4_orientation['value'][0]));
	if ($sensor4_orientation_value<0 || $sensor4_orientation_value>360) {
		// Unknown format: system can only treat sensors which orientation ranges from 0 to 360
		$error="9- Unknown format: system can only treat sensors which orientation ranges from 0 to 360";
		return FALSE;
	}
	
	// Write loading information
	$wovoml_line="\t<LoadingInfo>\n\t\t<ownerCode>".$owner_code."</ownerCode>\n\t</LoadingInfo>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	// Write monitoring system in WOVOML
	$wovoml_line="\t<MonitoringSystem>\n\t\t<TiltStrainInstrument code=\"".$instrument_code."\">\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<stationCode>".$station_code."</stationCode>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<name>".$instrument_name."</name>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<depth>".$instrument_depth."</depth>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<direction1>".$sensor1_orientation_value."</direction1>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<direction2>".$sensor2_orientation_value."</direction2>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<direction3>".$sensor3_orientation_value."</direction3>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<direction4>".$sensor4_orientation_value."</direction4>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t\t<startTime>".$instrument_start_time."</startTime>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	$wovoml_line="\t\t</TiltStrainInstrument>\n\t</MonitoringSystem>\n\t<Data>\n\t\t<Deformation>\n";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	
	// Data
	$data=$strain_xml['value'][1]['value'];
	// Number of obs elements
	$n_data=count($data);
	// Check that number of obs elements is a multiple of 7
	if ($n_data%7!=0) {
		// Unknown format: system can only treat data with a specific number of data: 'gage0', 'gage1', etc.
		$error="9- Unknown format: system can only treat data with a specific number of data: 'gage0', 'gage1', etc.";
		return FALSE;
	}
	// Get file version
	$v=$data[0]['value'][10];
	if ($v['tag']!="V") {
		// Unknown format: 'v' not found
		$error="9- Unknown format: 'v' not found";
		return FALSE;
	}
	$v_value=trim($v['value'][0]);
	
	// Loop on data
	$i=0;
	while (TRUE) {
		// Check that there are more data to be treated
		if ($i>=$n_data) {
			// No more data
			break;
		}
		
		// New data
		$is_complete=FALSE;
		$is_valid=TRUE;
		
		// Component 1
		$obs_gage0=$data[$i];
		if ($obs_gage0['tag']!="OBS") {
			// Unknown format: 'obs' not found
			$error="9- Unknown format: 'obs' not found";
			return FALSE;
		}
		if ($obs_gage0['attributes']['STRAIN']!="gage0") {
			// Unknown format: system can only treat data with a specific order: 'gage0' was not found
			$error="9- Unknown format: system can only treat data with a specific order: 'gage0' was not found";
			return FALSE;
		}
		// Get strain measurement time (obs.date -> Strain.measTime)
		$strain_time=$obs_gage0['value'][0];
		if ($strain_time['tag']!="DATE") {
			// Unknown format: 'date' not found
			$error="9- Unknown format: 'date' not found";
			return FALSE;
		}
		$strain_time_value=trim($strain_time['value'][0]);
		$strain_time_value=substr_replace($strain_time_value, ' ', 10, 1);
		// Get quality of strain value (obs.s_q)
		$s_q=$obs_gage0['value'][5];
		if ($s_q['tag']!="S_Q") {
			// Unknown format: 's_q' not found
			$error="9- Unknown format: 's_q' not found";
			return FALSE;
		}
		$s_q_value=trim($s_q['value'][0]);
		// Check quality of strain value: discard data if obs.s_q = m or b (keep if g, i or p)
		switch ($s_q_value) {
			case "g":
			case "i":
			case "p":
				// Keep
				break;
			case "m":
			case "b":
				// Skip
				$is_valid=FALSE;
				break;
			default:
				// Unknown format: system can only treat data with quality: g, i, p, m and b
				$error="9- Unknown format: system can only treat data with quality: g, i, p, m and b";
				return FALSE;
		}
		// If unvalid data
		if (!$is_valid) {
			// Continue with next data
			$i+=7;
			continue;
		}
		// Get strain for component 1 (obs.s -> -Strain.component1)
		$s_gage0=$obs_gage0['value'][3];
		if ($s_gage0['tag']!="S") {
			// Unknown format: 's' not found
			$error="9- Unknown format: 's' not found";
			return FALSE;
		}
		$component1=floatval(trim($s_gage0['value'][0]))*(-1);
		// Create data code ('obs.date'_'obs.v' -> Strain.code)
		$strain_code=substr($strain_time_value, 0, 4).substr($strain_time_value, 5, 2).substr($strain_time_value, 8, 2).substr($strain_time_value, 11, 2).substr($strain_time_value, 14, 2).substr($strain_time_value, 17, 2)."_".$v_value;
		
		// Component 2
		$obs_gage1=$data[$i+1];
		if ($obs_gage1['tag']!="OBS") {
			// Unknown format: 'obs' not found
			$error="9- Unknown format: 'obs' not found";
			return FALSE;
		}
		if ($obs_gage1['attributes']['STRAIN']!="gage1") {
			// Unknown format: system can only treat data with a specific order: 'gage1' was not found
			$error="9- Unknown format: system can only treat data with a specific order: 'gage1' was not found";
			return FALSE;
		}
		// Check measurement time (obs.date -> Strain.measTime)
		$strain_time_check=$obs_gage1['value'][0];
		if ($strain_time_check['tag']!="DATE") {
			// Unknown format: 'date' not found
			$error="9- Unknown format: 'date' not found";
			return FALSE;
		}
		$strain_time_check_value=trim($strain_time_check['value'][0]);
		$strain_time_check_value=substr_replace($strain_time_check_value, ' ', 10, 1);
		if ($strain_time_check_value!=$strain_time_value) {
			// Unknown format: 'date' of 2 consecutive obs elements were different
			$error="9- Unknown format: 'date' of 2 consecutive obs elements were different";
			return FALSE;
		}
		// Get quality of strain value (obs.s_q)
		$s_q=$obs_gage1['value'][5];
		if ($s_q['tag']!="S_Q") {
			// Unknown format: 's_q' not found
			$error="9- Unknown format: 's_q' not found";
			return FALSE;
		}
		$s_q_value=trim($s_q['value'][0]);
		// Check quality of strain value: discard data if obs.s_q = m or b (keep if g, i or p)
		switch ($s_q_value) {
			case "g":
			case "i":
			case "p":
				// Keep
				break;
			case "m":
			case "b":
				// Skip
				$is_valid=FALSE;
				break;
			default:
				// Unknown format: system can only treat data with quality: g, i, p, m and b
				$error="9- Unknown format: system can only treat data with quality: g, i, p, m and b";
				return FALSE;
		}
		// If unvalid data
		if (!$is_valid) {
			// Continue with next data
			$i+=7;
			continue;
		}
		// Get strain for component 2 (obs.s -> -Strain.component2)
		$s_gage1=$obs_gage1['value'][3];
		if ($s_gage1['tag']!="S") {
			// Unknown format: 's' not found
			$error="9- Unknown format: 's' not found";
			return FALSE;
		}
		$component2=floatval(trim($s_gage1['value'][0]))*(-1);
		
		// Component 3
		$obs_gage2=$data[$i+2];
		if ($obs_gage2['tag']!="OBS") {
			// Unknown format: 'obs' not found
			$error="9- Unknown format: 'obs' not found";
			return FALSE;
		}
		if ($obs_gage2['attributes']['STRAIN']!="gage2") {
			// Unknown format: system can only treat data with a specific order: 'gage2' was not found
			$error="9- Unknown format: system can only treat data with a specific order: 'gage2' was not found";
			return FALSE;
		}
		// Check measurement time (obs.date -> Strain.measTime)
		$strain_time_check=$obs_gage2['value'][0];
		if ($strain_time_check['tag']!="DATE") {
			// Unknown format: 'date' not found
			$error="9- Unknown format: 'date' not found";
			return FALSE;
		}
		$strain_time_check_value=trim($strain_time_check['value'][0]);
		$strain_time_check_value=substr_replace($strain_time_check_value, ' ', 10, 1);
		if ($strain_time_check_value!=$strain_time_value) {
			// Unknown format: 'date' of 2 consecutive obs elements were different
			$error="9- Unknown format: 'date' of 2 consecutive obs elements were different";
			return FALSE;
		}
		// Get quality of strain value (obs.s_q)
		$s_q=$obs_gage2['value'][5];
		if ($s_q['tag']!="S_Q") {
			// Unknown format: 's_q' not found
			$error="9- Unknown format: 's_q' not found";
			return FALSE;
		}
		$s_q_value=trim($s_q['value'][0]);
		// Check quality of strain value: discard data if obs.s_q = m or b (keep if g, i or p)
		switch ($s_q_value) {
			case "g":
			case "i":
			case "p":
				// Keep
				break;
			case "m":
			case "b":
				// Skip
				$is_valid=FALSE;
				break;
			default:
				// Unknown format: system can only treat data with quality: g, i, p, m and b
				$error="9- Unknown format: system can only treat data with quality: g, i, p, m and b";
				return FALSE;
		}
		// If unvalid data
		if (!$is_valid) {
			// Continue with next data
			$i+=7;
			continue;
		}
		// Get strain for component 3 (obs.s -> -Strain.component3)
		$s_gage2=$obs_gage2['value'][3];
		if ($s_gage2['tag']!="S") {
			// Unknown format: 's' not found
			$error="9- Unknown format: 's' not found";
			return FALSE;
		}
		$component3=floatval(trim($s_gage2['value'][0]))*(-1);
		
		// Component 4
		$obs_gage3=$data[$i+3];
		if ($obs_gage3['tag']!="OBS") {
			// Unknown format: 'obs' not found
			$error="9- Unknown format: 'obs' not found";
			return FALSE;
		}
		if ($obs_gage3['attributes']['STRAIN']!="gage3") {
			// Unknown format: system can only treat data with a specific order: 'gage3' was not found
			$error="9- Unknown format: system can only treat data with a specific order: 'gage3' was not found";
			return FALSE;
		}
		// Check measurement time (obs.date -> Strain.measTime)
		$strain_time_check=$obs_gage3['value'][0];
		if ($strain_time_check['tag']!="DATE") {
			// Unknown format: 'date' not found
			$error="9- Unknown format: 'date' not found";
			return FALSE;
		}
		$strain_time_check_value=trim($strain_time_check['value'][0]);
		$strain_time_check_value=substr_replace($strain_time_check_value, ' ', 10, 1);
		if ($strain_time_check_value!=$strain_time_value) {
			// Unknown format: 'date' of 2 consecutive obs elements were different
			$error="9- Unknown format: 'date' of 2 consecutive obs elements were different";
			return FALSE;
		}
		// Get quality of strain value (obs.s_q)
		$s_q=$obs_gage3['value'][5];
		if ($s_q['tag']!="S_Q") {
			// Unknown format: 's_q' not found
			$error="9- Unknown format: 's_q' not found";
			return FALSE;
		}
		$s_q_value=trim($s_q['value'][0]);
		// Check quality of strain value: discard data if obs.s_q = m or b (keep if g, i or p)
		switch ($s_q_value) {
			case "g":
			case "i":
			case "p":
				// Keep
				break;
			case "m":
			case "b":
				// Skip
				$is_valid=FALSE;
				break;
			default:
				// Unknown format: system can only treat data with quality: g, i, p, m and b
				$error="9- Unknown format: system can only treat data with quality: g, i, p, m and b";
				return FALSE;
		}
		// If unvalid data
		if (!$is_valid) {
			// Continue with next data
			$i+=7;
			continue;
		}
		// Get strain for component 4 (obs.s -> -Strain.component4)
		$s_gage3=$obs_gage3['value'][3];
		if ($s_gage3['tag']!="S") {
			// Unknown format: 's' not found
			$error="9- Unknown format: 's' not found";
			return FALSE;
		}
		$component4=floatval(trim($s_gage3['value'][0]))*(-1);
		
		// Shear strain on axis 1
		$obs_eee_m_enn=$data[$i+5];	// Eee+Enn skipped
		if ($obs_eee_m_enn['tag']!="OBS") {
			// Unknown format: 'obs' not found
			$error="9- Unknown format: 'obs' not found";
			return FALSE;
		}
		if ($obs_eee_m_enn['attributes']['STRAIN']!="Eee-Enn") {
			// Unknown format: system can only treat data with a specific order: 'Eee-Enn' was not found
			$error="9- Unknown format: system can only treat data with a specific order: 'Eee-Enn' was not found";
			return FALSE;
		}
		// Check measurement time (obs.date -> Strain.measTime)
		$strain_time_check=$obs_eee_m_enn['value'][0];
		if ($strain_time_check['tag']!="DATE") {
			// Unknown format: 'date' not found
			$error="9- Unknown format: 'date' not found";
			return FALSE;
		}
		$strain_time_check_value=trim($strain_time_check['value'][0]);
		$strain_time_check_value=substr_replace($strain_time_check_value, ' ', 10, 1);
		if ($strain_time_check_value!=$strain_time_value) {
			// Unknown format: 'date' of 2 consecutive obs elements were different
			$error="9- Unknown format: 'date' of 2 consecutive obs elements were different";
			return FALSE;
		}
		// Get quality of strain value (obs.s_q)
		$s_q=$obs_eee_m_enn['value'][5];
		if ($s_q['tag']!="S_Q") {
			// Unknown format: 's_q' not found
			$error="9- Unknown format: 's_q' not found";
			return FALSE;
		}
		$s_q_value=trim($s_q['value'][0]);
		// Check quality of strain value: discard data if obs.s_q = m or b (keep if g, i or p)
		switch ($s_q_value) {
			case "g":
			case "i":
			case "p":
				// Keep
				break;
			case "m":
			case "b":
				// Skip
				$is_valid=FALSE;
				break;
			default:
				// Unknown format: system can only treat data with quality: g, i, p, m and b
				$error="9- Unknown format: system can only treat data with quality: g, i, p, m and b";
				return FALSE;
		}
		// If unvalid data
		if (!$is_valid) {
			// Continue with next data
			$i+=7;
			continue;
		}
		// Get shear strain for axis 1 (obs.s -> -Strain.shearStrainAxis1)
		$s_eee_m_enn=$obs_eee_m_enn['value'][3];
		if ($s_eee_m_enn['tag']!="S") {
			// Unknown format: 's' not found
			$error="9- Unknown format: 's' not found";
			return FALSE;
		}
		$strain_axis1=floatval(trim($s_eee_m_enn['value'][0]))*(-1);
		
		// Shear strain on axis 2
		$obs_2ene=$data[$i+6];
		if ($obs_2ene['tag']!="OBS") {
			// Unknown format: 'obs' not found
			$error="9- Unknown format: 'obs' not found";
			return FALSE;
		}
		if ($obs_2ene['attributes']['STRAIN']!="2Ene") {
			// Unknown format: system can only treat data with a specific order: '2Ene' was not found
			$error="9- Unknown format: system can only treat data with a specific order: '2Ene' was not found";
			return FALSE;
		}
		// Check measurement time (obs.date -> Strain.measTime)
		$strain_time_check=$obs_2ene['value'][0];
		if ($strain_time_check['tag']!="DATE") {
			// Unknown format: 'date' not found
			$error="9- Unknown format: 'date' not found";
			return FALSE;
		}
		$strain_time_check_value=trim($strain_time_check['value'][0]);
		$strain_time_check_value=substr_replace($strain_time_check_value, ' ', 10, 1);
		if ($strain_time_check_value!=$strain_time_value) {
			// Unknown format: 'date' of 2 consecutive obs elements were different
			$error="9- Unknown format: 'date' of 2 consecutive obs elements were different";
			return FALSE;
		}
		// Get quality of strain value (obs.s_q)
		$s_q=$obs_2ene['value'][5];
		if ($s_q['tag']!="S_Q") {
			// Unknown format: 's_q' not found
			$error="9- Unknown format: 's_q' not found";
			return FALSE;
		}
		$s_q_value=trim($s_q['value'][0]);
		// Check quality of strain value: discard data if obs.s_q = m or b (keep if g, i or p)
		switch ($s_q_value) {
			case "g":
			case "i":
			case "p":
				// Keep
				break;
			case "m":
			case "b":
				// Skip
				$is_valid=FALSE;
				break;
			default:
				// Unknown format: system can only treat data with quality: g, i, p, m and b
				$error="9- Unknown format: system can only treat data with quality: g, i, p, m and b";
				return FALSE;
		}
		// If unvalid data
		if (!$is_valid) {
			// Continue with next data
			$i+=7;
			continue;
		}
		// Get shear strain for axis 2 (obs.s -> -Strain.shearStrainAxis2)
		$s_2ene=$obs_2ene['value'][3];
		if ($s_2ene['tag']!="S") {
			// Unknown format: 's' not found
			$error="9- Unknown format: 's' not found";
			return FALSE;
		}
		$strain_axis2=floatval(trim($s_2ene['value'][0]))*(-1);
		
		// Write strain data
		$wovoml_line="\t\t\t<Strain code=\"".$strain_code."\">\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<instrumentCode>".$instrument_code."</instrumentCode>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<measTime>".$strain_time_value."</measTime>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<component1>".$component1."</component1>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<component2>".$component2."</component2>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<component3>".$component3."</component3>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<component4>".$component4."</component4>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<shearStrainAxis1>".$strain_axis1."</shearStrainAxis1>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t\t<shearStrainAxis2>".$strain_axis2."</shearStrainAxis2>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		$wovoml_line="\t\t\t</Strain>\n";
		if (!fwrite($wovoml_handler, $wovoml_line)) {
			// Error when trying to write WOVOML file
			$error="2- Error when trying to write WOVOML file";
			return FALSE;
		}
		
		// Reloop for treating next data
		$i+=7;
	}
	
	// Finish writing WOVOML
	$wovoml_line="\t\t</Deformation>\n\t</Data>\n</wovoml>";
	if (!fwrite($wovoml_handler, $wovoml_line)) {
		// Error when trying to write WOVOML file
		$error="2- Error when trying to write WOVOML file";
		return FALSE;
	}
	
	// Close WOVOML
	if (!fclose($wovoml_handler)) {
		// Error when trying to close WOVOML file
		$error="2- Error when trying to close WOVOML file";
		return FALSE;
	}

	return TRUE;
}

?>