<?php

function dd_gpv_to_wovoml($mysql_result, &$wovoml_array) {
	// Initialize variables
	$wovoml_array=array();
	$cc_codes=array();
	$ds_codes=array();
	$di_gen_codes=array();
	
	// WOVOML
	$wovoml_array['wovoml version="1.001" xmlns="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.wovodat.org WOVOdatV1.xsd"']=array();
	$wovoml=&$wovoml_array['wovoml version="1.001" xmlns="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.wovodat.org WOVOdatV1.xsd"'];
	// Loading info
	$wovoml['LoadingInfo']=array();
	$loadinginfo=&$wovoml['LoadingInfo'];
	$first_row=mysql_fetch_object($mysql_result);
	$cc_code=mysql_result(mysql_query("SELECT cc_code FROM cc WHERE cc_id='".$first_row->cc_id."'"),0);
	$cc_codes[$first_row->cc_id]=$cc_code;
	$loadinginfo['ownerCode']=$cc_code;
	// Data
	$wovoml['Data']=array();
	$data=&$wovoml['Data'];
	// Deformation
	$data['Deformation']=array();
	$deformation=&$data['Deformation'];
	// Loop on results
	mysql_data_seek($mysql_result, 0);
	while ($row=mysql_fetch_object($mysql_result)) {
		// GPS vector
		$deformation['GPSVector code='.$row->dd_gpv_code]=array();
		$gps_vector=&$deformation['GPSVector code='.$row->dd_gpv_code];
		
		// Station code - or - Instrument code
		if (!empty($row->di_gen_id)) {
			// Check already encountered di_gen
			if (isset($di_gen_codes[$row->di_gen_id])) {
				$gps_vector['instrumentCode']=$di_gen_codes[$row->di_gen_id];
			}
			else {
				$di_gen_code=mysql_result(mysql_query("SELECT di_gen_code FROM di_gen WHERE di_gen_id='".$row->di_gen_id."'"),0);
				$di_gen_codes[$row->di_gen_id]=$di_gen_code;
				$gps_vector['instrumentCode']=$di_gen_code;
			}
		}
		else {
			// Check already encountered ds
			if (isset($ds_codes[$row->ds_id])) {
				$gps_vector['stationCode']=$ds_codes[$row->ds_id];
			}
			else {
				$ds_code=mysql_result(mysql_query("SELECT ds_code FROM ds WHERE ds_id='".$row->ds_id."'"),0);
				$ds_codes[$row->ds_id]=$ds_code;
				$gps_vector['stationCode']=$ds_code;
			}
		}
		
		// Start time
		$gps_vector['startTime']=$row->dd_gpv_stime;
		
		// Start time uncertainty
		if (!empty($row->dd_gpv_stime_unc)) {
			$gps_vector['startTimeUnc']=$row->dd_gpv_stime_unc;
		}
		
		// End time
		if (!empty($row->dd_gpv_etime)) {
			$gps_vector['endTime']=$row->dd_gpv_etime;
		}
		
		// End time uncertainty
		if (!empty($row->dd_gpv_etime_unc)) {
			$gps_vector['endTimeUnc']=$row->dd_gpv_etime_unc;
		}
		
		// Magnitude
		if (!empty($row->dd_gpv_dmag)) {
			$gps_vector['magnitude']=$row->dd_gpv_dmag;
		}
		
		// Azimuth
		if (!empty($row->dd_gpv_daz)) {
			$gps_vector['azimuth']=$row->dd_gpv_daz;
		}
		
		// Inclination
		if (!empty($row->dd_gpv_vincl)) {
			$gps_vector['inclination']=$row->dd_gpv_vincl;
		}
		
		// North displacement
		if (!empty($row->dd_gpv_N)) {
			$gps_vector['northDispl']=$row->dd_gpv_N;
		}
		
		// North displacement error
		if (!empty($row->dd_gpv_dnerr)) {
			$gps_vector['northDisplErr']=$row->dd_gpv_dnerr;
		}
		
		// East displacement
		if (!empty($row->dd_gpv_E)) {
			$gps_vector['eastDispl']=$row->dd_gpv_E;
		}
		
		// East displacement error
		if (!empty($row->dd_gpv_deerr)) {
			$gps_vector['eastDisplErr']=$row->dd_gpv_deerr;
		}
		
		// Vertical displacement
		if (!empty($row->dd_gpv_vert)) {
			$gps_vector['vertDispl']=$row->dd_gpv_vert;
		}
		
		// Vertical displacement error
		if (!empty($row->dd_gpv_dverr)) {
			$gps_vector['vertDisplErr']=$row->dd_gpv_dverr;
		}
		
		// Comments
		if (!empty($row->dd_gpv_com)) {
			$gps_vector['comments']=$row->dd_gpv_com;
		}
		
		// Owner code
		if (!empty($row->cc_id)) {
			// Check already encountered cc
			if (isset($cc_codes[$row->cc_id])) {
				$gps_vector['ownerCode']=$cc_codes[$row->cc_id];
			}
			else {
				$cc_code=mysql_result(mysql_query("SELECT cc_code FROM cc WHERE cc_id='".$row->cc_id."'"),0);
				$cc_codes[$row->cc_id]=$cc_code;
				$gps_vector['ownerCode']=$cc_code;
			}
		}
	}
}

?>