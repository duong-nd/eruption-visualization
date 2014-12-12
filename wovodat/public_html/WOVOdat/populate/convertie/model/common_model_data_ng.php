<?php
include "php/include/db_connect.php";        

function getvollist($obs){
	global $link;

	$data=array();
	
	$sql="select vd_name from vd where (vd.cc_id = (select cc_id from cc where cc.cc_code = '$obs') || 
	vd.cc_id2 = (select cc_id from cc where cc.cc_code = '$obs') || vd.cc_id3 = (select cc_id from cc where cc.cc_code = '$obs') || vd.cc_id4 = (select cc_id from cc where cc.cc_code = '$obs')	
	|| vd.cc_id5 = (select cc_id from cc where cc.cc_code = '$obs')) order by vd_name ASC";

	$result = mysql_query($sql, $link);

	while ($row = mysql_fetch_array($result))
		$data[] = $row;
	
	return $data;
}


function getowner($obs){
	global $link;

	$sql="select cc.cc_code from cc where cc.cc_id='$obs'";

	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['cc_code'];
	
}


function getvolcode($vol){
	global $link;

	$sql="select vd.vd_cavw from vd where vd.vd_name='$vol'";

	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['vd_cavw'];

}


function getnetworkcode($network,$conv){    // All station xmls need network codes
	global $link;
 
	if($conv == 'EventDataFromNetwork' || $conv == 'SeismicTremor_Network' || $conv == 'SeismicIntervalSwarm_Network'){
		$sql="select distinct sn.sn_code as ncode from sn where sn.sn_name = '$network'";
	}
	else if($conv == 'DeformationStation'){
		$sql="select distinct cn.cn_code as ncode from cn where cn.cn_name = '$network' and cn.cn_type='Deformation'";
	}
	else if($conv == 'GasStation'){
		$sql="select distinct cn.cn_code as ncode from cn where cn.cn_name = '$network' and cn.cn_type='Gas'";	
	}else if($conv == 'HydrologicStation'){
		$sql="select distinct cn.cn_code as ncode from cn where cn.cn_name = '$network' and cn.cn_type='Hydrologic'";	
	}else if($conv == 'ThermalStation'){
		$sql="select distinct cn.cn_code as ncode from cn where cn.cn_name = '$network' and cn.cn_type='Thermal'";	
	}else if($conv == 'FieldsStation'){
		$sql="select distinct cn.cn_code as ncode from cn where cn.cn_name = '$network' and cn.cn_type='Fields'";	
	}else if($conv == 'MeteoStation'){
		$sql="select distinct cn.cn_code as ncode from cn where cn.cn_name = '$network' and cn.cn_type='Meteo'";	
	}
	
	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['ncode'];
}


function getstationcode($station,$conv){  // All Instruments xmls need station codes

	global $link;

	if($conv == 'EventDataFromSingleStation'  || $conv == 'SeismicTremor_Station' || $conv == 'SeismicIntervalSwarm_Station' || $conv=="RSAMData" || $conv=="SSAMData" || $conv == "RepresentativeWaveform"){
		$sql="select distinct ss.ss_code as scode from ss where ss.ss_name='$station'";
	}
	else if($conv == 'ElectronicTiltData' || $conv == 'TiltVectorData' || $conv == 'StrainMeterData' || $conv == 'GPSVectors'  || $conv == 'EDMData' || $conv == 'AngleData' || $conv == 'GPSData'){
		$sql="select distinct ds.ds_code as scode from ds where ds.ds_name='$station'";
	}
	else if($conv == 'DirectlySampledGas' || $conv == 'SoilEffluxData' || $conv == 'PlumeData'){
		$sql="select distinct gs.gs_code as scode from gs where gs.gs_name='$station'";	
	}else if($conv == "HydrologicData"){
		$sql="select distinct hs.hs_code as scode from hs where hs.hs_name='$station'";	
	}else if($conv == "MagneticFieldsData" || $conv == "MagnetorVectorData" || $conv == "ElectricFieldsData" || $conv == "GravityData"){
		$sql="select distinct fs.fs_code as scode from fs where fs.fs_name='$station'";	
	}else if($conv == 'GroundBasedThermalData' || $conv == "ThermalImage and ThermalImageData"){
		$sql="select distinct ts.ts_code as scode from ts where ts.ts_name='$station'";	
	}else if($conv == "MeteoData"){
		$sql="select distinct ms.ms_code as scode from ms where ms.ms_name='$station'";	
	}
	
	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['scode'];
}

function getstation2code($station2,$conv){  

	global $link;
 
	if($conv == 'EDMData' || $conv == 'AngleData' || $conv == 'GPSData'){
			$sql="select distinct ds.ds_code as scode from ds where ds.ds_name='$station2'";
		 
	 }else if($conv == "MagneticFieldsData" || $conv == "ElectricFieldsData" || $conv == "GravityData"){
			$sql="select distinct fs.fs_code as scode from fs where fs.fs_name='$station2'";	
	 }
 	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['scode'];
}

function getstation3code($station3,$conv){  //This function is only used by AngleData & GPSData

	global $link;

	$sql="select distinct ds.ds_code as scode from ds where ds.ds_name='$station3'";
		 
 	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['scode'];
}

 
function getinstrcode($instrument,$conv){

	global $link;

	if($conv == 'ElectronicTiltData' || $conv == 'TiltVectorData'){
		$sql="select distinct di_tlt.di_tlt_code as instrcode from di_tlt where di_tlt.di_tlt_name='$instrument' and di_tlt.di_tlt_type='TILT'";
	}else if($conv == 'StrainMeterData'){
		$sql="select distinct di_tlt.di_tlt_code as instrcode from di_tlt where di_tlt.di_tlt_name='$instrument' and di_tlt.di_tlt_type='Strain'";	
	}else if($conv == 'GPSVectors' || $conv == 'GPSData'){
		$sql="select distinct di.di_gen_code as instrcode from di_gen as di where di.di_gen_name='$instrument' and (di.di_gen_type ='GPS' OR di.di_gen_type = 'CGPS')";
	}else if($conv == 'EDMData'){
		$sql="select distinct di.di_gen_code as instrcode from di_gen as di where di.di_gen_name='$instrument' and (di.di_gen_type ='EDM' OR di.di_gen_type ='EDM Reflector' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
	}else if($conv == 'AngleData'){
		$sql="select distinct di.di_gen_code as instrcode from di_gen as di where di.di_gen_name='$instrument' and (di.di_gen_type ='Angle' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
	}else if($conv == 'DirectlySampledGas' || $conv == 'SoilEffluxData' || $conv == 'PlumeData'|| $conv =="plume_satellite_type"){
		$sql="select distinct gi.gi_code as instrcode from gi where gi.gi_name='$instrument'";	
		
	}else if($conv == "HydrologicData"){
		$sql="select distinct hi.hi_code as instrcode from hi where hi.hi_name='$instrument'";	
	}else if($conv == "MagneticFieldsData" || $conv == "MagnetorVectorData" || $conv == "ElectricFieldsData" || $conv == "GravityData"){
		$sql="select distinct fi.fi_code as instrcode from fi where fi.fi_name='$instrument'";	
	}else if($conv == 'GroundBasedThermalData' || $conv == "ThermalImage and ThermalImageData" || $conv == "ThermalImage_satellite_type"){
		$sql="select distinct ti.ti_code as instrcode from ti where ti.ti_name='$instrument'";	
	}else if($conv == "MeteoData"){
		$sql="select distinct mi.mi_code as instrcode from mi where mi.mi_name='$instrument'";	
	}
	
	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['instrcode'];
}	

function getsatellitecode($air_sat_name,$sat_type){
	global $link;
	
	$sql="select distinct cs.cs_code as satellitecode from cs where cs.cs_name='$air_sat_name' and cs.cs_type='$sat_type'";
	
	$result = mysql_query($sql, $link);
	$row= mysql_fetch_array($result);
	return $row['satellitecode'];
}

function geteventnet_eventstat_time($intensity_time){

	global $link;
	
	$data=array();
	
$sql="select e.sd_evn_time as time,ROUND(e.sd_evn_pmag,1) as mag,e.sd_evn_code as code,e.sd_evn_eqtype as type from sd_evn as e where e.sd_evn_time Between DATE_SUB('$intensity_time', INTERVAL 2 HOUR) and DATE_ADD('$intensity_time', INTERVAL 1 HOUR) 
Union
select s.sd_evs_time as time,CEILING(s.sd_evs_dur) as mag,s.sd_evs_code as code,s.sd_evs_id as type from sd_evs as s where s.sd_evs_time Between DATE_SUB('$intensity_time', INTERVAL 2 HOUR) and DATE_ADD('$intensity_time', INTERVAL 1 HOUR)";


	$result= mysql_query ($sql,$link);
	
	while($row=mysql_fetch_array($result))
		$data[]=$row;
	
	
	return $data; 

}  


?>