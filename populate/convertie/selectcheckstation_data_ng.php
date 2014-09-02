<?php
require_once "php/include/login_check.php";  // Check login
require_once "php/include/get_root.php";    // Get root url
include "php/include/db_connect.php";  
	
	
	
$volca=trim($_GET['volcan']);  			    	   // Get valcano name
$stationdisplay=trim($_GET['stationdisplay']);    //get ElectronicTiltData or TiltVectorData, etc..


if($stationdisplay == "EventDataFromSingleStation" || $stationdisplay == "SeismicTremor" || $stationdisplay == "IntervalSwarmData" || $stationdisplay == "RSAMData" || $stationdisplay =="SSAMData" || $stationdisplay == "RepresentativeWaveform" ){  

	$result = mysql_query("select distinct s.ss_name from ss as s,sn as n,vd where s.sn_id = n.sn_id and n.vd_id = vd.vd_id and vd.vd_name='$volca'") or die(mysql_error());

}
else if($stationdisplay == "ElectronicTiltData" || $stationdisplay == "TiltVectorData" || $stationdisplay == "StrainMeterData" ){
	if($stationdisplay == "TiltVectorData" || $stationdisplay == "ElectronicTiltData"){   // di_tlt_type='TILT' 
		
		$sql ="select distinct s.ds_name from ds as s, cn, vd, di_tlt as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and cn.cn_type='Deformation' and di.di_tlt_type='TILT' and vd.vd_name = '$volca'";		
		$result = mysql_query($sql);
	
	}else if($stationdisplay == "StrainMeterData"){    //di.di_tlt_type='Strain'
	
		$sql ="select distinct s.ds_name from ds as s, cn, vd, di_tlt as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and cn.cn_type='Deformation' and di.di_tlt_type='Strain' and vd.vd_name = '$volca'";		
		$result = mysql_query($sql);
	}	
}	
else if($stationdisplay == "EDMData" || $stationdisplay == "AngleData" || $stationdisplay == "GPSData" ||$stationdisplay == "GPSVectors"){

	if($stationdisplay == "EDMData"){
		$sql="select s.ds_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='EDM' OR di.di_gen_type ='EDM Reflector' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
		$result = mysql_query($sql);	
	}else if($stationdisplay == "AngleData"){
		$sql="select s.ds_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='Angle' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
		$result = mysql_query($sql);
	}else if($stationdisplay == "GPSData" || $stationdisplay == "GPSVectors"){
		$sql="select s.ds_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='GPS' OR di.di_gen_type = 'CGPS')";
		$result = mysql_query($sql);
	}
}
else if($stationdisplay == "DirectlySampledGas" || $stationdisplay == "SoilEffluxData" || $stationdisplay == "PlumeData"){

	$sql="select distinct gs.gs_name from gs, cn, vd where gs.cn_id = cn.cn_id and vd.vd_id = cn.vd_id and vd.vd_name = '$volca' and cn.cn_type='Gas'";
	$result = mysql_query($sql);

}
else if($stationdisplay == "HydrologicData"){

	$sql="select distinct hs.hs_name from hs,cn,vd where hs.cn_id= cn.cn_id and cn.vd_id= vd.vd_id and vd.vd_name='$volca' and cn.cn_type='Hydrologic'";
	$result = mysql_query($sql);
}	
else if($stationdisplay == "MagneticFieldsData" || $stationdisplay == "MagnetorVectorData" || $stationdisplay == "ElectricFieldsData" || $stationdisplay == "GravityData"){

	$sql="select distinct fs.fs_name from fs,cn,vd where cn.cn_id= fs.cn_id and vd.vd_id= cn.vd_id 
	and vd.vd_name='$volca' and cn.cn_type ='Fields'";
	$result = mysql_query($sql);
}
else if($stationdisplay == "GroundBasedThermalData" || $stationdisplay=="ThermalImage and ThermalImageData"){

	$sql="select distinct ts.ts_name from ts,cn,vd where cn.cn_id= ts.cn_id and vd.vd_id= cn.vd_id 
	and vd.vd_name='$volca' and cn.cn_type ='Thermal'";
	$result = mysql_query($sql);
}
else if($stationdisplay == "MeteorologicalData"){

	$sql="select distinct ms.ms_name from ms,cn,vd where ms.cn_id= cn.cn_id and cn.vd_id= vd.vd_id and vd.vd_name='$volca' and cn.cn_type='Meteo'";
	$result = mysql_query($sql);
}	

	$row=mysql_fetch_array($result);
	
	if(!$row){   // false means no data result
		echo "false";
	}else{
		echo "true";
	}
?>