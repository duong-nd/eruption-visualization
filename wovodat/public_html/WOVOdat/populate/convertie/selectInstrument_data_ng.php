<?php
require_once "php/include/get_root.php";    // Get root url
include "php/include/db_connect.php";       
	
	
$volca=trim($_GET['volcan']);  			    	   // Get valcano name
$stationdisplay=trim($_GET['stationdisplay']);    //Get SeismicStation or GasStation etc
$stationname=trim($_GET['staname']);               // Get station name OR satellite name

if(isset($_GET['satellitetype'])) {	      

	$satellitetype=trim($_GET['satellitetype']);      // Get Satellite type like 'A' or 'S'
	$stationdisplay_backup = $stationdisplay;//just swipe to new var bcoz $stationdisplay needs for another checking
	$stationdisplay= "Plume_thermal_Satellite";//my own creat variable to link to(plume->gi & cs)OR(thermal->ti & cs) 
}		

	
if($stationdisplay == "ElectronicTiltData" || $stationdisplay == "TiltVectorData" || $stationdisplay == "StrainMeterData" ){
	
	if($stationdisplay == "TiltVectorData" || $stationdisplay == "ElectronicTiltData"){   // di_tlt_type='TILT' 
		
		$sql ="select distinct di.di_tlt_name from ds as s, cn, vd, di_tlt as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and cn.cn_type='Deformation' and di.di_tlt_type='TILT' and vd.vd_name = '$volca' and s.ds_name ='$stationname' ";		
		$result = mysql_query($sql);
	}else if($stationdisplay == "StrainMeterData"){    //di.di_tlt_type='Strain'
		
		$sql ="select distinct di.di_tlt_name from ds as s, cn, vd, di_tlt as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and cn.cn_type='Deformation' and di.di_tlt_type='Strain' and vd.vd_name = '$volca' and s.ds_name ='$stationname' ";		
		$result = mysql_query($sql);
	}	
}
else if($stationdisplay == "EDMData" || $stationdisplay == "AngleData" || $stationdisplay == "GPSData" ||$stationdisplay == "GPSVectors"){


	if($stationdisplay == "EDMData"){
		$sql="select distinct di.di_gen_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='EDM' OR di.di_gen_type ='EDM Reflector' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types') and s.ds_name='$stationname'";
		$result = mysql_query($sql);	
	}else if($stationdisplay == "AngleData"){
		$sql="select distinct di.di_gen_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='Angle' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types' and s.ds_name='$stationname')";
		$result = mysql_query($sql);
	}else if($stationdisplay == "GPSData" || $stationdisplay == "GPSVectors" ){
		$sql="select distinct di.di_gen_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='GPS' OR di.di_gen_type = 'CGPS' and s.ds_name='$stationname')";
		$result = mysql_query($sql);
	}
}
else if($stationdisplay == "DirectlySampledGas" || $stationdisplay == "SoilEffluxData" || $stationdisplay == "PlumeData"){

	$sql="select distinct gi.gi_name from gs, cn, vd,gi where gs.cn_id = cn.cn_id and vd.vd_id = cn.vd_id and gs.gs_id= gi.gs_id and vd.vd_name = '$volca' and cn.cn_type='Gas' and gs.gs_name='$stationname'";
	$result = mysql_query($sql);
}
else if($stationdisplay == "HydrologicData"){

	$sql="select distinct hi.hi_name from hs,cn,vd,hi where hs.cn_id= cn.cn_id and cn.vd_id= vd.vd_id and vd.vd_name='$volca' and cn.cn_type='Hydrologic' and hs.hs_id= hi.hs_id and hs.hs_name= '$stationname'";
	$result = mysql_query($sql);
}
else if($stationdisplay == "MagneticFieldsData" || $stationdisplay == "MagnetorVectorData" || $stationdisplay == "ElectricFieldsData" || $stationdisplay == "GravityData"){

	$sql="select distinct fi.fi_name from fs,cn,vd,fi where cn.cn_id= fs.cn_id and vd.vd_id= cn.vd_id 
	and vd.vd_name='$volca' and cn.cn_type ='Fields' and fs.fs_id= fi.fs_id and fs.fs_name ='$stationname'";
	$result = mysql_query($sql);
}
else if($stationdisplay == "GroundBasedThermalData" || $stationdisplay=="ThermalImage and ThermalImageData"){

	$sql="select distinct ti.ti_name from ts,cn,vd,ti where cn.cn_id= ts.cn_id and vd.vd_id= cn.vd_id 
	and vd.vd_name='$volca' and cn.cn_type ='Thermal' and ts.ts_id= ti.ts_id and ts.ts_name='$stationname'";

	$result = mysql_query($sql);
}
else if($stationdisplay == "Plume_thermal_Satellite"){      // Insar doesnt need to show instrument drop down

	if($stationdisplay_backup == "PlumeData"){ 
		$sql="select distinct gi.gi_name from gi,cs where gi.cs_id = cs.cs_id and cs.cs_type='$satellitetype' and cs.cs_name='$stationname'";
	}
	elseif($stationdisplay_backup == "ThermalImage and ThermalImageData") {
		$sql="select distinct ti.ti_name from ti, cs where ti.cs_id= cs.cs_id and cs.cs_type='$satellitetype' and cs.cs_name='$stationname'";	
	
	}
	$result = mysql_query($sql);
}
else if($stationdisplay == "MeteorologicalData"){

	$sql="select distinct mi.mi_name from ms,cn,vd,mi where ms.cn_id= cn.cn_id and cn.vd_id= vd.vd_id and vd.vd_name='$volca' and cn.cn_type='Meteo' and ms.ms_id= mi.ms_id and ms.ms_name= '$stationname'";
	$result = mysql_query($sql);
}



	$data=array('Choose Instrument'); // creat array with value first 

	if($result){	     // To avoid showing mysql error on webpage if no result

		while($row=mysql_fetch_array($result))
			$data[]=$row[0]; // Note: $row[0]
	}
	
	if($stationdisplay == "AngleData" || $stationdisplay == "GPSData"){
		echo"<div class='space4' style='width:10%;padding-top:20px;'></div>";	
	}else if($stationdisplay == "InSARImage and InSARData" ){
		echo"<div class='space5' style='width:10%;margin-top:-5px;'></div>";	
	}else{
		echo"<div style='width:10%;padding-top:10px;'></div>";	
	}
	
	if(isset($data[2])){   // Note: only show  instrument more than one instrument

		echo "<span id='id_inst_text'>Instrument: </span>";
		echo"<select name='instrument' id='instrument' style='width:180px;' class='required'>";
		
		for($i=0;$i<sizeof($data);$i++){
			if($data[$i] == 'Choose Instrument'){
				$selected = " selected='true' ";
			}else{	
				$selected ="";
			}	

			if($i == 0){	 
				echo "<option value='' $selected > {$data[$i]}  </option>";
			}
			else{
				echo "<option value='{$data[$i]}' $selected > {$data[$i]}  </option>";
			}
			
		}	
		echo "</select>";
		
	}
	else if(isset($data[1])){  // don't show if only one instrument. Hide it by using "display:none" 
		echo"<select name='instrument' id='instrument' style='width:180px; display:none'>";
		echo "<option value='{$data[1]}' type='hidden'></option>";
		echo "</select>";
	
	}else{
		echo "<h1 class='noinstrumenterror' style='width:300px;color: #777777;font-size:12px;font-weight: bold;'>No Instrument for this station you have chosen! Please upload instrument first to upload data!</h1>";	
	}

?>