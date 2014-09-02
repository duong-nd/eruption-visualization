<?php

// Increment data count
if (!isset($data_list['dd_edm'])) {
	$data_list['dd_edm']=array();
	$data_list['dd_edm']['name']="EDM";
	$data_list['dd_edm']['number']=0;
	$data_list['dd_edm']['sets']=array();
}
$data_list['dd_edm']['number']++;

// Loop on elements - Get values to display
$edm_elements=$dd_element['value'];
$instrument_code=NULL;
$station_code=NULL;
$target_code=NULL;
$meas_time=NULL;
$line_length=NULL;
foreach ($edm_elements as $edm_element) {
	
	// Instrument code
	if ($edm_element['tag']=="INSTRUMENTCODE") {
		$instrument_code=$edm_element['value'][0];
		continue;
	}
	
	// Instrument station code
	if ($edm_element['tag']=="INSTSTATIONCODE") {
		$station_code=$edm_element['value'][0];
		continue;
	}
	
	// Target station code
	if ($edm_element['tag']=="TARGETSTATIONCODE") {
		$target_code=$edm_element['value'][0];
		continue;
	}
	
	// Measurement time
	if ($edm_element['tag']=="MEASTIME") {
		$meas_time=$edm_element['value'][0];
		continue;
	}
	
	// Line length
	if ($edm_element['tag']=="LINELENGTH") {
		$line_length=$edm_element['value'][0];
		continue;
	}
	
}

// According to couple {instCode - targetCode} or {stationCode - targetCode}, different set of data
$new_set=TRUE;
foreach ($data_list['dd_edm']['sets'] as &$edm_set) {
	// Case 1: instrument code was declared
	if (!empty($instrument_code)) {
		// Compare with set's key
		if ($edm_set['keys'][0]['name']=='instrument code' && $edm_set['keys'][0]['value']==$instrument_code) {
			// Compare target station code
			if ($edm_set['keys'][1]['value']==$target_code) {
				// Add values to this set
				$cnt_values=count($edm_set['values']);
				$edm_set['values'][$cnt_values]['x']=$meas_time;
				$edm_set['values'][$cnt_values]['y']=$line_length;
				$new_set=FALSE;
				break;
			}
		}
	}
	
	// Case 2: station code was declared
	if (!empty($station_code)) {
		// Compare with set's key
		if ($edm_set['keys'][0]['name']=='station code' && $edm_set['keys'][0]['value']==$station_code) {
			// Compare target station code
			if ($edm_set['keys'][1]['value']==$target_code) {
				// Add values to this set
				$cnt_values=count($edm_set['values']);
				$edm_set['values'][$cnt_values]['x']=$meas_time;
				$edm_set['values'][$cnt_values]['y']=$line_length;
				$new_set=FALSE;
				break;
			}
		}
	}
}

// If must add a new set
if ($new_set) {
	// Create set
	$cnt_set=count($data_list['dd_edm']['sets']);
	$data_list['dd_edm']['sets'][$cnt_set]=array();
	
	// Keys
	$data_list['dd_edm']['sets'][$cnt_set]['keys']=array();
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]=array();
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][1]=array();
	// If instrument code is empty
	if (empty($instrument_code)) {
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['name']="station code";
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['value']=$station_code;
	}
	else {
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['name']="instrument code";
		$data_list['dd_edm']['sets'][$cnt_set]['keys'][0]['value']=$instrument_code;
	}
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][1]['name']="target station code";
	$data_list['dd_edm']['sets'][$cnt_set]['keys'][1]['value']=$target_code;
	
	// Values
	$data_list['dd_edm']['sets'][$cnt_set]['values']=array();
	$data_list['dd_edm']['sets'][$cnt_set]['values'][0]=array();
	$data_list['dd_edm']['sets'][$cnt_set]['values'][0]['x']=$meas_time;
	$data_list['dd_edm']['sets'][$cnt_set]['values'][0]['y']=$line_length;
}

?>