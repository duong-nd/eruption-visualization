<?php

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Increment data count
if (!isset($data_list['gd_plu'])) {
	$data_list['gd_plu']=array();
	$data_list['gd_plu']['name']="Plume";
	$data_list['gd_plu']['number']=0;
	$data_list['gd_plu']['sets']=array();
}
$data_list['gd_plu']['number']++;

// Loop on elements - Get values to display
$plume_elements=$gd_element['value'];
$instrument_code=NULL;
$station_code=NULL;
$units=NULL;
$meas_time=NULL;
$height=NULL;
$co2=NULL;
$so2=NULL;
$h2s=NULL;
$hcl=NULL;
$hf=NULL;
$co=NULL;
foreach ($plume_elements as $plume_element) {
	
	// Instrument code
	if ($plume_element['tag']=="INSTRUMENTCODE") {
		$instrument_code=$plume_element['value'][0];
		continue;
	}
	
	// Instrument station code
	if ($plume_element['tag']=="STATIONCODE") {
		$station_code=$plume_element['value'][0];
		continue;
	}
	
	// Units
	if (empty($units)) {
		if ($plume_element['tag']=="UNITS") {
			$units=$plume_element['value'][0];
			continue;
		}
	}
	
	// Height
	if ($plume_element['tag']=="HEIGHT") {
		$height=$plume_element['value'][0];
		continue;
	}
	
	// Measurement time (round to day)
	if ($plume_element['tag']=="MEASTIME") {
		$temp_time=$plume_element['value'][0];
		if (!datetime_round_day($temp_time, $meas_time, $local_error)) {
			$_SESSION['errors']=array();
			$_SESSION['errors'][0]=array();
			$_SESSION['errors'][0]['code']=1380;
			$_SESSION['errors'][0]['message']="Error when rounding data to day: ".$temp_time."[get_data/data_g_directlysampled.php]";
			$_SESSION['l_errors']=1;
			
			// Redirect to system error page
			header('Location: '.$url_root.'system_error.php');
			exit();
		}
		continue;
	}
	
	// CO2
	if ($plume_element['tag']=="CO2EMISSIONRATE") {
		$co2=$plume_element['value'][0];
		continue;
	}
	
	// SO2
	if ($plume_element['tag']=="SO2EMISSIONRATE") {
		$so2=$plume_element['value'][0];
		continue;
	}
	
	// H2S
	if ($plume_element['tag']=="H2SEMISSIONRATE") {
		$h2s=$plume_element['value'][0];
		continue;
	}
	
	// HCl
	if ($plume_element['tag']=="HCLEMISSIONRATE") {
		$hcl=$plume_element['value'][0];
		continue;
	}
	
	// HF
	if ($plume_element['tag']=="HFEMISSIONRATE") {
		$hf=$plume_element['value'][0];
		continue;
	}
	
	// CO
	if ($plume_element['tag']=="COEMISSIONRATE") {
		$co=$plume_element['value'][0];
		continue;
	}
	
}

// According to instrument or station code, different set of data
$new_set=TRUE;
foreach ($data_list['gd_plu']['sets'] as &$gd_plu_set) {
	// Case 1: instrument code was declared
	if (!empty($instrument_code)) {
		// Compare with set's key
		if ($gd_plu_set['keys'][0]['name']=='instrument code' && $gd_plu_set['keys'][0]['value']==$instrument_code) {
			// Add values to this set
			$gd_plu_set['values'][$meas_time]['height']=$height;
			$gd_plu_set['values'][$meas_time]['co2']=$co2;
			$gd_plu_set['values'][$meas_time]['so2']=$so2;
			$gd_plu_set['values'][$meas_time]['h2s']=$h2s;
			$gd_plu_set['values'][$meas_time]['hcl']=$hcl;
			$gd_plu_set['values'][$meas_time]['hf']=$hf;
			$gd_plu_set['values'][$meas_time]['co']=$co;
			
			// Units
			if (empty($gd_plu_set['units']) && !empty($units)) {
				$gd_plu_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_plu_set['min']) < 0) {
				$gd_plu_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_plu_set['max']) > 0) {
				$gd_plu_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 2: station code was declared
	elseif (!empty($station_code)) {
		// Compare with set's key
		if ($gd_plu_set['keys'][0]['name']=='station code' && $gd_plu_set['keys'][0]['value']==$station_code) {
			// Add values to this set
			$gd_plu_set['values'][$meas_time]['height']=$height;
			$gd_plu_set['values'][$meas_time]['co2']=$co2;
			$gd_plu_set['values'][$meas_time]['so2']=$so2;
			$gd_plu_set['values'][$meas_time]['h2s']=$h2s;
			$gd_plu_set['values'][$meas_time]['hcl']=$hcl;
			$gd_plu_set['values'][$meas_time]['hf']=$hf;
			$gd_plu_set['values'][$meas_time]['co']=$co;
			
			// Units
			if (empty($gd_plu_set['units']) && !empty($units)) {
				$gd_plu_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_plu_set['min']) < 0) {
				$gd_plu_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_plu_set['max']) > 0) {
				$gd_plu_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 3: none was declared
	else {
		// If set has no key
		if ($gd_plu_set['keys'][0]['name']==NULL && $gd_plu_set['keys'][0]['value']==NULL) {
			// Add values to this set
			$gd_plu_set['values'][$meas_time]['height']=$height;
			$gd_plu_set['values'][$meas_time]['co2']=$co2;
			$gd_plu_set['values'][$meas_time]['so2']=$so2;
			$gd_plu_set['values'][$meas_time]['h2s']=$h2s;
			$gd_plu_set['values'][$meas_time]['hcl']=$hcl;
			$gd_plu_set['values'][$meas_time]['hf']=$hf;
			$gd_plu_set['values'][$meas_time]['co']=$co;
			
			// Units
			if (empty($gd_plu_set['units']) && !empty($units)) {
				$gd_plu_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_plu_set['min']) < 0) {
				$gd_plu_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_plu_set['max']) > 0) {
				$gd_plu_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
}

// If must add a new set
if ($new_set) {
	// Create set
	$cnt_set=count($data_list['gd_plu']['sets']);
	$data_list['gd_plu']['sets'][$cnt_set]=array();
	
	// Keys
	$data_list['gd_plu']['sets'][$cnt_set]['keys']=array();
	$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]=array();
	// Case 1: instrument code given
	if (!empty($instrument_code)) {
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['name']="instrument code";
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['value']=$instrument_code;
	}
	// Case 2: station code given
	elseif (!empty($station_code)) {
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['name']="station code";
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['value']=$station_code;
	}
	// Case 3: none given
	else {
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['name']=NULL;
		$data_list['gd_plu']['sets'][$cnt_set]['keys'][0]['value']=NULL;
	}
	
	// Values
	$data_list['gd_plu']['sets'][$cnt_set]['values']=array();
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['height']=$height;
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['co2']=$co2;
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['so2']=$so2;
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['h2s']=$h2s;
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['hcl']=$hcl;
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['hf']=$hf;
	$data_list['gd_plu']['sets'][$cnt_set]['values'][$meas_time]['co']=$co;
	
	// Units
	$data_list['gd_plu']['sets'][$cnt_set]['units']=$units;
	
	// Min and max
	$data_list['gd_plu']['sets'][$cnt_set]['min']=$meas_time;
	$data_list['gd_plu']['sets'][$cnt_set]['max']=$meas_time;
}

?>