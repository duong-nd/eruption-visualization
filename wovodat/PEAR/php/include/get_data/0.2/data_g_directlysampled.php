<?php

// Increment data count
if (!isset($data_list['gd'])) {
	$data_list['gd']=array();
	$data_list['gd']['name']="Directly sampled gas data";
	$data_list['gd']['number']=0;
	$data_list['gd']['sets']=array();
}
$data_list['gd']['number']++;

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Loop on elements - Get values to display
$directlysampled_elements=$gd_element['value'];
$instrument_code=NULL;
$station_code=NULL;
$meas_time=NULL;
$temperature=NULL;
$atmos_press=NULL;
$emission_rate=NULL;
$units=NULL;
$species=NULL
$waterfree=NULL;
$concentration=NULL;
foreach ($directlysampled_elements as $directlysampled_element) {
	
	// Instrument code
	if ($directlysampled_element['tag']=="INSTRUMENTCODE") {
		$instrument_code=$directlysampled_element['value'][0];
		continue;
	}
	
	// Instrument station code
	if ($directlysampled_element['tag']=="STATIONCODE") {
		$station_code=$directlysampled_element['value'][0];
		continue;
	}
	
	// Measurement time (round to day)
	if ($directlysampled_element['tag']=="MEASTIME") {
		$temp_time=$directlysampled_element['value'][0];
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
	
	// Temperature
	if ($directlysampled_element['tag']=="TEMPERATURE") {
		$temperature=$directlysampled_element['value'][0];
		continue;
	}
	
	// Atmospheric pressure
	if ($directlysampled_element['tag']=="ATMOSPRESS") {
		$atmos_press=$directlysampled_element['value'][0];
		continue;
	}
	
	// Emission rate
	if ($directlysampled_element['tag']=="EMISSIONRATE") {
		$emission_rate=$directlysampled_element['value'][0];
		continue;
	}
	
	// Units
	if (empty($units)) {
		if ($directlysampled_element['tag']=="UNITS") {
			$units=$directlysampled_element['value'][0];
			continue;
		}
	}
	
	// Species
	if ($directlysampled_element['tag']=="SPECIES") {
		$species=$directlysampled_element['value'][0];
		continue;
	}
	
	// Waterfree
	if ($directlysampled_element['tag']=="WATERFREE") {
		$waterfree=$directlysampled_element['value'][0];
		continue;
	}
	
	// Concentration
	if ($directlysampled_element['tag']=="CONCENTRATION") {
		$concentration=$directlysampled_element['value'][0];
		continue;
	}
	
}

// Pre-process species
if ($species=="CO2" && $waterfree=="N") {
	$ultimate_species="co2";
}
elseif ($species=="CO2" && $waterfree=="Y") {
	$ultimate_species="co2wf";
}
elseif ($species=="SO2" && $waterfree=="N") {
	$ultimate_species="so2";
}
elseif ($species=="SO2" && $waterfree=="Y") {
	$ultimate_species="so2wf";
}
elseif ($species=="H2S" && $waterfree=="N") {
	$ultimate_species="h2s";
}
elseif ($species=="H2S" && $waterfree=="Y") {
	$ultimate_species="h2swf";
}
elseif ($species=="HCl" && $waterfree=="N") {
	$ultimate_species="hcl";
}
elseif ($species=="HCl" && $waterfree=="Y") {
	$ultimate_species="hclwf";
}
elseif ($species=="HF" && $waterfree=="N") {
	$ultimate_species="hf";
}
elseif ($species=="HF" && $waterfree=="Y") {
	$ultimate_species="hfwf";
}
elseif ($species=="CH4" && $waterfree=="N") {
	$ultimate_species="ch4";
}
elseif ($species=="CH4" && $waterfree=="Y") {
	$ultimate_species="ch4wf";
}
elseif ($species=="H2" && $waterfree=="N") {
	$ultimate_species="h2";
}
elseif ($species=="H2" && $waterfree=="Y") {
	$ultimate_species="h2wf";
}
elseif ($species=="CO" && $waterfree=="N") {
	$ultimate_species="co";
}
elseif ($species=="CO" && $waterfree=="Y") {
	$ultimate_species="cowf";
}
elseif ($species=="3He4He") {
	$ultimate_species="ele3he4he";
}
elseif ($species=="d13C") {
	$ultimate_species="delta13c";
}
elseif ($species=="d34S") {
	$ultimate_species="delta34s";
}
elseif ($species=="d18O") {
	$ultimate_species="delta18o";
}
elseif ($species=="dD") {
	$ultimate_species="deltad";
}

// According to instrument or station code, different set of data
$new_set=TRUE;
foreach ($data_list['gd']['sets'] as &$gd_set) {
	// Case 1: instrument code was declared
	if (!empty($instrument_code)) {
		// Compare with set's key
		if ($gd_set['keys'][0]['name']=='instrument code' && $gd_set['keys'][0]['value']==$instrument_code) {
			// Add values to this set
			$gd_set['values'][$meas_time]['temperature']=$temperature;
			$gd_set['values'][$meas_time]['atmos_press']=$atmos_press;
			$gd_set['values'][$meas_time]['emission_rate']=$emission_rate;
			$gd_set['values'][$meas_time][$ultimate_species]=$concentration;
			
			// Units
			if (empty($gd_set['units']) && !empty($units)) {
				$gd_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_set['min']) < 0) {
				$gd_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_set['max']) > 0) {
				$gd_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 2: station code was declared
	elseif (!empty($station_code)) {
		// Compare with set's key
		if ($gd_set['keys'][0]['name']=='station code' && $gd_set['keys'][0]['value']==$station_code) {
			// Add values to this set
			$gd_set['values'][$meas_time]['temperature']=$temperature;
			$gd_set['values'][$meas_time]['atmos_press']=$atmos_press;
			$gd_set['values'][$meas_time]['emission_rate']=$emission_rate;
			$gd_set['values'][$meas_time][$ultimate_species]=$concentration;
			
			// Units
			if (empty($gd_set['units']) && !empty($units)) {
				$gd_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_set['min']) < 0) {
				$gd_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_set['max']) > 0) {
				$gd_set['max']=$meas_time;
			}
			
			// No need to add a new set
			$new_set=FALSE;
			
			break;
		}
	}
	// Case 3: none was declared
	else {
		// If set has no key
		if ($gd_set['keys'][0]['name']==NULL && $gd_set['keys'][0]['value']==NULL) {
			// Add values to this set
			$gd_set['values'][$meas_time]['temperature']=$temperature;
			$gd_set['values'][$meas_time]['atmos_press']=$atmos_press;
			$gd_set['values'][$meas_time]['emission_rate']=$emission_rate;
			$gd_set['values'][$meas_time][$ultimate_species]=$concentration;
			
			// Units
			if (empty($gd_set['units']) && !empty($units)) {
				$gd_set['units']=$units;
			}
			
			// Compare min and max
			if (strcmp($meas_time, $gd_set['min']) < 0) {
				$gd_set['min']=$meas_time;
			}
			if (strcmp($meas_time, $gd_set['max']) > 0) {
				$gd_set['max']=$meas_time;
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
	$cnt_set=count($data_list['gd']['sets']);
	$data_list['gd']['sets'][$cnt_set]=array();
	
	// Keys
	$data_list['gd']['sets'][$cnt_set]['keys']=array();
	$data_list['gd']['sets'][$cnt_set]['keys'][0]=array();
	// Case 1: instrument code given
	if (!empty($instrument_code)) {
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['name']="instrument code";
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['value']=$instrument_code;
	}
	// Case 2: station code given
	elseif (!empty($station_code)) {
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['name']="station code";
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['value']=$station_code;
	}
	// Case 3: none given
	else {
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['name']=NULL;
		$data_list['gd']['sets'][$cnt_set]['keys'][0]['value']=NULL;
	}
	
	// Values
	$data_list['gd']['sets'][$cnt_set]['values']=array();
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['temperature']=$temperature;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['atmos_press']=$atmos_press;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['emission_rate']=$emission_rate;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time][$ultimate_species]=$concentration;
	
	// Units
	$data_list['gd']['sets'][$cnt_set]['units']=$units;
	
	// Min and max
	$data_list['gd']['sets'][$cnt_set]['min']=$meas_time;
	$data_list['gd']['sets'][$cnt_set]['max']=$meas_time;
}

?>