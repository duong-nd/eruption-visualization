<?php

// Datetime functions
require_once "php/funcs/datetime_funcs.php";

// Increment data count
if (!isset($data_list['sd_sam'])) {
	$data_list['sd_sam']=array();
	$data_list['sd_sam']['name']="RSAM-SSAM";
	$data_list['sd_sam']['number']=0;
	$data_list['sd_sam']['sets']=array();
}
$data_list['sd_sam']['number']++;

// Loop on elements - Get values to display
$sd_sam_elements=$sd_element['value'];
$station_code=NULL;
$cnt_interval=NULL;
$start_time=NULL;
$end_time=NULL;
$rsam=array();
$ssam=array();
foreach ($sd_sam_elements as $sd_sam_element) {
	
	// Station code
	if ($sd_sam_element['tag']=="STATIONCODE") {
		$station_code=$sd_sam_element['value'][0];
		continue;
	}
	
	// Count interval
	if ($sd_sam_element['tag']=="CNTINTERVAL") {
		$cnt_interval=$sd_sam_element['value'][0];
		continue;
	}
	
	// Start time
	if ($sd_sam_element['tag']=="STARTTIME") {
		$start_time=$sd_sam_element['value'][0];
		continue;
	}
	
	// End time
	if ($sd_sam_element['tag']=="ENDTIME") {
		$end_time=$sd_sam_element['value'][0];
		continue;
	}
	
	// RSAM
	if ($sd_sam_element['tag']=="RSAM") {
		// Loop on elements
		$rsam_elements=$sd_sam_element['value'];
		foreach ($rsam_elements as $rsam_element) {
			// RSAM data
			// Loop on elements
			$rsam_data_elements=$rsam_element['value'];
			$cnt=NULL;
			$meas_time=NULL;
			foreach ($rsam_data_elements as $rsam_data_element) {
				// Count
				if ($rsam_data_element['tag']=="CNT") {
					$cnt=$rsam_data_element['value'][0];
					continue;
				}
				// Measurement time (round to hour)
				if ($rsam_data_element['tag']=="STARTTIME") {
					$temp_time=$rsam_data_element['value'][0];
					if (!datetime_round_hour($temp_time, $meas_time, $local_error)) {
						$_SESSION['errors']=array();
						$_SESSION['errors'][0]=array();
						$_SESSION['errors'][0]['code']=1380;
						$_SESSION['errors'][0]['message']="Error when rounding data to hour: ".$temp_time."[get_data/data_s_rsamssam.php]";
						$_SESSION['l_errors']=1;
						
						// Redirect to system error page
						header('Location: '.$url_root.'system_error.php');
						exit();
					}
					continue;
				}
			}
			
			// Store count and time into array
			$rsam[$meas_time]=$cnt;
		}
		continue;
	}
	
	// SSAM - To be done
/*	if ($sd_sam_element['tag']=="SSAM") {
		// Loop on elements
		$ssam_elements=$sd_sam_element['value'];
		foreach ($ssam_elements as $ssam_element) {
			// RSAM data
			// Loop on elements
			$ssam_data_elements=$ssam_element['value'];
			$cnt=NULL;
			$high_freq=NULL;
			$meas_time=NULL;
			foreach ($ssam_data_elements as $ssam_data_element) {
				// Count
				if ($ssam_data_element['tag']=="CNT") {
					$cnt=$ssam_data_element['value'][0];
					continue;
				}
				// High frequency
				if ($ssam_data_element['tag']=="HIGHFREQ") {
					$high_freq=$ssam_data_element['value'][0];
					continue;
				}
				// Measurement time (round to hour)
				if ($ssam_data_element['tag']=="STARTTIME") {
					$temp_time=$ssam_data_element['value'][0];
					if (!datetime_round_hour($temp_time, $meas_time, $local_error)) {
						$_SESSION['errors']=array();
						$_SESSION['errors'][0]=array();
						$_SESSION['errors'][0]['code']=1380;
						$_SESSION['errors'][0]['message']="Error when rounding data to hour: ".$temp_time."[get_data/data_s_rsamssam.php]";
						$_SESSION['l_errors']=1;
						
						// Redirect to system error page
						header('Location: '.$url_root.'system_error.php');
						exit();
					}
					continue;
				}
			}
			
			// Store count, high frequency and time into array
			$ssam[$meas_time][$high_freq]=$cnt;
		}
	}*/
}

// Create set
$cnt_set=count($data_list['sd_sam']['sets']);
$data_list['sd_sam']['sets'][$cnt_set]=array();

// Keys
$data_list['sd_sam']['sets'][$cnt_set]['keys']=array();
$data_list['sd_sam']['sets'][$cnt_set]['keys'][0]=$station_code;
$data_list['sd_sam']['sets'][$cnt_set]['keys'][1]=$start_time;
$data_list['sd_sam']['sets'][$cnt_set]['keys'][2]=$end_time;

// Values
$data_list['sd_sam']['sets'][$cnt_set]['values']=array();
$data_list['sd_sam']['sets'][$cnt_set]['values']['rsam']=$rsam;
$data_list['sd_sam']['sets'][$cnt_set]['values']['ssam']=$ssam;

// Min and max
$data_list['sd_sam']['sets'][$cnt_set]['min']=$start_time;
if (!datetime_substract_seconds($end_time, $cnt_interval, $max_time, $local_error)) {
	$_SESSION['errors']=array();
	$_SESSION['errors'][0]=array();
	$_SESSION['errors'][0]['code']=1380;
	$_SESSION['errors'][0]['message']="Error when substracting seconds to get max_time: end_time=".$end_time.", cnt_interval=".$cnt_interval." [get_data/data_s_rsamssam.php]";
	$_SESSION['l_errors']=1;
	
	// Redirect to system error page
	header('Location: '.$url_root.'system_error.php');
	exit();
}
$data_list['sd_sam']['sets'][$cnt_set]['max']=$max_time;

?>