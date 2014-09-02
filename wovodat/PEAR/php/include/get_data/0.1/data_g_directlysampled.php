<?php

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Increment data count
if (!isset($data_list['gd'])) {
	$data_list['gd']=array();
	$data_list['gd']['name']="Directly sampled gas data";
	$data_list['gd']['number']=0;
	$data_list['gd']['sets']=array();
}
$data_list['gd']['number']++;

// Loop on elements - Get values to display
$directlysampled_elements=$gd_element['value'];
$instrument_code=NULL;
$station_code=NULL;
$meas_time=NULL;
$temperature=NULL;
$atmos_press=NULL;
$emission_rate=NULL;
$units=NULL;
$co2=NULL;
$so2=NULL;
$h2s=NULL;
$hcl=NULL;
$hf=NULL;
$ch4=NULL;
$h2=NULL;
$co=NULL;
$co2wf=NULL;
$so2wf=NULL;
$h2swf=NULL;
$hclwf=NULL;
$hfwf=NULL;
$ch4wf=NULL;
$h2wf=NULL;
$cowf=NULL;
$ele3he4he=NULL;
$delta13c=NULL;
$delta34s=NULL;
$delta18o=NULL;
$deltad=NULL;
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
	
	// CO2
	if ($directlysampled_element['tag']=="CO2") {
		$co2=$directlysampled_element['value'][0];
		continue;
	}
	
	// SO2
	if ($directlysampled_element['tag']=="SO2") {
		$so2=$directlysampled_element['value'][0];
		continue;
	}
	
	// H2S
	if ($directlysampled_element['tag']=="H2S") {
		$h2s=$directlysampled_element['value'][0];
		continue;
	}
	
	// HCl
	if ($directlysampled_element['tag']=="HCL") {
		$hcl=$directlysampled_element['value'][0];
		continue;
	}
	
	// HF
	if ($directlysampled_element['tag']=="HF") {
		$hf=$directlysampled_element['value'][0];
		continue;
	}
	
	// CH4
	if ($directlysampled_element['tag']=="CH4") {
		$ch4=$directlysampled_element['value'][0];
		continue;
	}
	
	// H2
	if ($directlysampled_element['tag']=="H2") {
		$h2=$directlysampled_element['value'][0];
		continue;
	}
	
	// CO
	if ($directlysampled_element['tag']=="CO") {
		$co=$directlysampled_element['value'][0];
		continue;
	}
	
	// CO2 water free
	if ($directlysampled_element['tag']=="CO2WATERFREE") {
		$co2wf=$directlysampled_element['value'][0];
		continue;
	}
	
	// SO2 water free
	if ($directlysampled_element['tag']=="SO2WATERFREE") {
		$so2wf=$directlysampled_element['value'][0];
		continue;
	}
	
	// H2S water free
	if ($directlysampled_element['tag']=="H2SWATERFREE") {
		$h2swf=$directlysampled_element['value'][0];
		continue;
	}
	
	// HCl water free
	if ($directlysampled_element['tag']=="HCLWATERFREE") {
		$hclwf=$directlysampled_element['value'][0];
		continue;
	}
	
	// HF water free
	if ($directlysampled_element['tag']=="HFWATERFREE") {
		$hfwf=$directlysampled_element['value'][0];
		continue;
	}
	
	// CH4 water free
	if ($directlysampled_element['tag']=="CH4WATERFREE") {
		$ch4wf=$directlysampled_element['value'][0];
		continue;
	}
	
	// H2 water free
	if ($directlysampled_element['tag']=="H2WATERFREE") {
		$h2wf=$directlysampled_element['value'][0];
		continue;
	}
	
	// CO water free
	if ($directlysampled_element['tag']=="COWATERFREE") {
		$cowf=$directlysampled_element['value'][0];
		continue;
	}
	
	// 3He/4He
	if ($directlysampled_element['tag']=="ELE3HE4HE") {
		$ele3he4he=$directlysampled_element['value'][0];
		continue;
	}
	
	// Delta 13C
	if ($directlysampled_element['tag']=="DELTA13C") {
		$delta13c=$directlysampled_element['value'][0];
		continue;
	}
	
	// Delta 34S
	if ($directlysampled_element['tag']=="DELTA34S") {
		$delta34s=$directlysampled_element['value'][0];
		continue;
	}
	
	// Delta 18O
	if ($directlysampled_element['tag']=="DELTA18O") {
		$delta18o=$directlysampled_element['value'][0];
		continue;
	}
	
	// Delta D
	if ($directlysampled_element['tag']=="DELTAD") {
		$deltad=$directlysampled_element['value'][0];
		continue;
	}
	
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
			$gd_set['values'][$meas_time]['co2']=$co2;
			$gd_set['values'][$meas_time]['so2']=$so2;
			$gd_set['values'][$meas_time]['h2s']=$h2s;
			$gd_set['values'][$meas_time]['hcl']=$hcl;
			$gd_set['values'][$meas_time]['hf']=$hf;
			$gd_set['values'][$meas_time]['ch4']=$ch4;
			$gd_set['values'][$meas_time]['h2']=$h2;
			$gd_set['values'][$meas_time]['co']=$co;
			$gd_set['values'][$meas_time]['co2wf']=$co2wf;
			$gd_set['values'][$meas_time]['so2wf']=$so2wf;
			$gd_set['values'][$meas_time]['h2swf']=$h2swf;
			$gd_set['values'][$meas_time]['hclwf']=$hclwf;
			$gd_set['values'][$meas_time]['hfwf']=$hfwf;
			$gd_set['values'][$meas_time]['ch4wf']=$ch4wf;
			$gd_set['values'][$meas_time]['h2wf']=$h2wf;
			$gd_set['values'][$meas_time]['cowf']=$cowf;
			$gd_set['values'][$meas_time]['ele3he4he']=$ele3he4he;
			$gd_set['values'][$meas_time]['delta13c']=$delta13c;
			$gd_set['values'][$meas_time]['delta34s']=$delta34s;
			$gd_set['values'][$meas_time]['delta18o']=$delta18o;
			$gd_set['values'][$meas_time]['deltad']=$deltad;
			
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
			$gd_set['values'][$meas_time]['co2']=$co2;
			$gd_set['values'][$meas_time]['so2']=$so2;
			$gd_set['values'][$meas_time]['h2s']=$h2s;
			$gd_set['values'][$meas_time]['hcl']=$hcl;
			$gd_set['values'][$meas_time]['hf']=$hf;
			$gd_set['values'][$meas_time]['ch4']=$ch4;
			$gd_set['values'][$meas_time]['h2']=$h2;
			$gd_set['values'][$meas_time]['co']=$co;
			$gd_set['values'][$meas_time]['co2wf']=$co2wf;
			$gd_set['values'][$meas_time]['so2wf']=$so2wf;
			$gd_set['values'][$meas_time]['h2swf']=$h2swf;
			$gd_set['values'][$meas_time]['hclwf']=$hclwf;
			$gd_set['values'][$meas_time]['hfwf']=$hfwf;
			$gd_set['values'][$meas_time]['ch4wf']=$ch4wf;
			$gd_set['values'][$meas_time]['h2wf']=$h2wf;
			$gd_set['values'][$meas_time]['cowf']=$cowf;
			$gd_set['values'][$meas_time]['ele3he4he']=$ele3he4he;
			$gd_set['values'][$meas_time]['delta13c']=$delta13c;
			$gd_set['values'][$meas_time]['delta34s']=$delta34s;
			$gd_set['values'][$meas_time]['delta18o']=$delta18o;
			$gd_set['values'][$meas_time]['deltad']=$deltad;
			
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
			$gd_set['values'][$meas_time]['co2']=$co2;
			$gd_set['values'][$meas_time]['so2']=$so2;
			$gd_set['values'][$meas_time]['h2s']=$h2s;
			$gd_set['values'][$meas_time]['hcl']=$hcl;
			$gd_set['values'][$meas_time]['hf']=$hf;
			$gd_set['values'][$meas_time]['ch4']=$ch4;
			$gd_set['values'][$meas_time]['h2']=$h2;
			$gd_set['values'][$meas_time]['co']=$co;
			$gd_set['values'][$meas_time]['co2wf']=$co2wf;
			$gd_set['values'][$meas_time]['so2wf']=$so2wf;
			$gd_set['values'][$meas_time]['h2swf']=$h2swf;
			$gd_set['values'][$meas_time]['hclwf']=$hclwf;
			$gd_set['values'][$meas_time]['hfwf']=$hfwf;
			$gd_set['values'][$meas_time]['ch4wf']=$ch4wf;
			$gd_set['values'][$meas_time]['h2wf']=$h2wf;
			$gd_set['values'][$meas_time]['cowf']=$cowf;
			$gd_set['values'][$meas_time]['ele3he4he']=$ele3he4he;
			$gd_set['values'][$meas_time]['delta13c']=$delta13c;
			$gd_set['values'][$meas_time]['delta34s']=$delta34s;
			$gd_set['values'][$meas_time]['delta18o']=$delta18o;
			$gd_set['values'][$meas_time]['deltad']=$deltad;
			
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
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['co2']=$co2;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['so2']=$so2;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['h2s']=$h2s;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['hcl']=$hcl;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['hf']=$hf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['ch4']=$ch4;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['h2']=$h2;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['co']=$co;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['co2wf']=$co2wf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['so2wf']=$so2wf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['h2swf']=$h2swf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['hclwf']=$hclwf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['hfwf']=$hfwf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['ch4wf']=$ch4wf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['h2wf']=$h2wf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['cowf']=$cowf;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['ele3he4he']=$ele3he4he;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['delta13c']=$delta13c;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['delta34s']=$delta34s;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['delta18o']=$delta18o;
	$data_list['gd']['sets'][$cnt_set]['values'][$meas_time]['deltad']=$deltad;
	
	// Units
	$data_list['gd']['sets'][$cnt_set]['units']=$units;
	
	// Min and max
	$data_list['gd']['sets'][$cnt_set]['min']=$meas_time;
	$data_list['gd']['sets'][$cnt_set]['max']=$meas_time;
}

?>