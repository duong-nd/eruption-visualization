<?php
require_once "php/include/get_root.php";    // Get root url
include "php/include/db_connect.php"; 

	
$volca=trim($_GET['volcan']);  			    	   // Get valcano name
$stationdisplay=trim($_GET['stationdisplay']);    //get SeismicStation or GasStation etc
$kilometer=trim($_GET['kilometer']);   		        // get kilo meter value

if(isset($_GET['satellitetype'])) {	      

	$plume_satellite_type=trim($_GET['satellitetype']);      // Get Satellite type
	$stationdisplay_backup = $stationdisplay;//just swipe to new var bcoz $stationdisplay needs for another checking
	$stationdisplay= "Plume_thermal_insar_Satellite"; //my own creat variable to link to (plume & cs) OR (thermal & cs) OR (Insar & cs)table
}	
	
	
if($stationdisplay == "EventDataFromSingleStation" || $stationdisplay=="SeismicTremor" || $stationdisplay=="IntervalSwarmData" || $stationdisplay == "RSAMData" || $stationdisplay =="SSAMData" || $stationdisplay=="RepresentativeWaveform"){  

	
	if($kilometer == "nokilometer"){
		$result = mysql_query("select distinct s.ss_name from ss as s,sn as n,vd where s.sn_id = n.sn_id and n.vd_id = vd.vd_id and vd.vd_name='$volca'") or die(mysql_error());
	}
	else{
		if($kilometer != "all"){
	
			$result= mysql_query("select distinct ss.ss_name FROM jj_volnet as j, ss, cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = ss.sn_id and cc.cc_id=ss.cc_id and vd.vd_id=vf.vd_id and vd.vd_name= '$volca' and j.jj_net_flag = 'S'  and (sqrt(power(vf.vd_inf_slat - ss.ss_lat, 2) + power(vf.vd_inf_slon - ss.ss_lon, 2))*100)<= '$kilometer'") or die(mysql_error());
		}
		else{
			$result= mysql_query("select distinct ss.ss_name FROM jj_volnet as j, ss, cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = ss.sn_id and cc.cc_id=ss.cc_id and vd.vd_id=vf.vd_id and vd.vd_name= '$volca' and j.jj_net_flag = 'S'") or die(mysql_error());
		}
	}	
	
}
else if($stationdisplay == "ElectronicTiltData" || $stationdisplay == "TiltVectorData" || $stationdisplay == "StrainMeterData" ){

	
	if($kilometer == "nokilometer"){
	
		if($stationdisplay == "TiltVectorData" || $stationdisplay == "ElectronicTiltData"){   // di_tlt_type='TILT' 
		$sql ="select distinct s.ds_name from ds as s, cn, vd, di_tlt as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and cn.cn_type='Deformation' and di.di_tlt_type='TILT' and vd.vd_name = '$volca'";	

		$result = mysql_query($sql);		
		}else if($stationdisplay == "StrainMeterData"){    //di.di_tlt_type='Strain'
			$sql ="select distinct s.ds_name from ds as s, cn, vd, di_tlt as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and cn.cn_type='Deformation' and di.di_tlt_type='Strain' and vd.vd_name = '$volca'";		
			$result = mysql_query($sql);		
		}
	}
	else{
		if($kilometer != "all"){
			if($stationdisplay == "TiltVectorData" || $stationdisplay == "ElectronicTiltData"){ // di_tlt_type='TILT' 
	
				$result= mysql_query("select distinct s.ds_name FROM jj_volnet as j, ds as s,di_tlt as di,cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and di.di_tlt_type='TILT' and (sqrt(power(vf.vd_inf_slat - s.ds_nlat, 2) + power(vf.vd_inf_slon - s.ds_nlon, 2))*100)< '$kilometer'") or die(mysql_error());
				
			}else if($stationdisplay == "StrainMeterData"){    //di.di_tlt_type='Strain'
				
				$result= mysql_query("select distinct s.ds_name FROM jj_volnet as j, ds as s,di_tlt as di,cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and di.di_tlt_type='Strain' and (sqrt(power(vf.vd_inf_slat - s.ds_nlat, 2) + power(vf.vd_inf_slon - s.ds_nlon, 2))*100)< '$kilometer'") or die(mysql_error());			
			
			}
		}
		else{
		
			if($stationdisplay == "TiltVectorData" || $stationdisplay == "ElectronicTiltData"){ // di_tlt_type='TILT'
			
				$result= mysql_query("select distinct s.ds_name FROM jj_volnet as j, ds as s,di_tlt as di,cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and di.di_tlt_type='TILT'") or die(mysql_error());		
		
			}else if($stationdisplay == "StrainMeterData"){    //di.di_tlt_type='Strain'
				$result= mysql_query("select distinct s.ds_name FROM jj_volnet as j, ds as s,di_tlt as di,cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and di.di_tlt_type='Strain'") or die(mysql_error());

			}
		}
	}	
}
else if($stationdisplay == "EDMData" || $stationdisplay == "AngleData" || $stationdisplay == "GPSData" ||$stationdisplay == "GPSVectors"){

	if($kilometer == "nokilometer"){  // link to cn 
		if($stationdisplay == "EDMData"){
			$sql="select distinct s.ds_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='EDM' OR di.di_gen_type ='EDM Reflector' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
			$result = mysql_query($sql);	
		}else if($stationdisplay == "AngleData"){
			$sql="select distinct s.ds_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='Angle' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
			$result = mysql_query($sql);
		}else if($stationdisplay == "GPSData" || $stationdisplay == "GPSVectors" ){
			$sql="select distinct s.ds_name from ds as s, cn, vd, di_gen as di where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and s.ds_id= di.ds_id and vd.vd_name = '$volca' and cn.cn_type='Deformation' and (di.di_gen_type ='GPS' OR di.di_gen_type = 'CGPS')";
			$result = mysql_query($sql);
		}
	}
	else{          // link to jj_volnet with kilometer
		if($kilometer != "all"){
			if($stationdisplay == "EDMData"){
		
				$sql= "select distinct s.ds_name FROM jj_volnet as j, ds as s,di_gen as di,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (di.di_gen_type ='EDM' OR di.di_gen_type ='EDM Reflector' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types') and (sqrt(power(vf.vd_inf_slat - s.ds_nlat, 2) + power(vf.vd_inf_slon - s.ds_nlon, 2))*100)< '$kilometer'";
				$result = mysql_query($sql);		
		
			}else if($stationdisplay == "AngleData"){
				$sql= "select distinct s.ds_name FROM jj_volnet as j, ds as s,di_gen as di,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (di.di_gen_type ='Angle' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types') and (sqrt(power(vf.vd_inf_slat - s.ds_nlat, 2) + power(vf.vd_inf_slon - s.ds_nlon, 2))*100)< '$kilometer'";
				$result = mysql_query($sql);			
		
			}else if($stationdisplay == "GPSData" || $stationdisplay == "GPSVectors"){
				$sql= "select distinct s.ds_name FROM jj_volnet as j, ds as s,di_gen as di,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (di.di_gen_type ='GPS' OR di.di_gen_type = 'CGPS') and (sqrt(power(vf.vd_inf_slat - s.ds_nlat, 2) + power(vf.vd_inf_slon - s.ds_nlon, 2))*100)< '$kilometer'";
				$result = mysql_query($sql);			
			}		
		}
		else{   // link to jj_volnet without kilometer
			if($stationdisplay == "EDMData"){
				$sql= "select distinct s.ds_name FROM jj_volnet as j, ds as s,di_gen as di,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (di.di_gen_type ='EDM' OR di.di_gen_type ='EDM Reflector' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
				$result = mysql_query($sql);
			}else if($stationdisplay == "AngleData"){
				$sql= "select distinct s.ds_name FROM jj_volnet as j, ds as s,di_gen as di,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (di.di_gen_type ='Angle' OR di.di_gen_type ='Total_Station' OR di.di_gen_type ='Other_di_gen types')";
				$result = mysql_query($sql);		
		
			}else if($stationdisplay == "GPSData" || $stationdisplay == "GPSVectors" ){
				$sql= "select distinct s.ds_name FROM jj_volnet as j, ds as s,di_gen as di,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and s.ds_id= di.ds_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (di.di_gen_type ='GPS' OR di.di_gen_type = 'CGPS')";
				$result = mysql_query($sql);			
			}
		}
	}
}
else if($stationdisplay == "DirectlySampledGas" || $stationdisplay == "SoilEffluxData" || $stationdisplay == "PlumeData"){
	
	
	if($kilometer == "nokilometer"){  // link to cn 
		$sql="select distinct gs.gs_name from gs, cn, vd where gs.cn_id = cn.cn_id and vd.vd_id = cn.vd_id and vd.vd_name = '$volca' and cn.cn_type='Gas'";
		$result = mysql_query($sql);
	}
	else{
		if($kilometer != "all"){   // link to jj_volnet
				
			$sql= "select distinct s.ds_name FROM jj_volnet as j, gs as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (sqrt(power(vf.vd_inf_slat - s.gs_lat, 2) + power(vf.vd_inf_slon - s.gs_lon, 2))*100)< '$kilometer'";          
			$result = mysql_query($sql);
		}
		else{
			$sql= "select distinct s.ds_name FROM jj_volnet as j, gs as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C'";
			$result = mysql_query($sql);		
		}
	}	
}
else if($stationdisplay == "Plume_thermal_insar_Satellite"){ // This var is created by myself. Not table name 

	if($stationdisplay_backup == "PlumeData"){
		$sql="select distinct cs.cs_name from gi,cs where gi.cs_id = cs.cs_id and cs.cs_type='$plume_satellite_type'";
	}
	else if($stationdisplay_backup == "InSARImage and InSARData"){
		$sql="select distinct cs.cs_name from cs where cs.cs_type='$plume_satellite_type'";
	}
	else if($stationdisplay_backup == "ThermalImage and ThermalImageData"){
		$sql="select distinct cs.cs_name from ti,cs where ti.cs_id= cs.cs_id and cs.cs_type='$plume_satellite_type'";
	}
	$result = mysql_query($sql);
	
}
else if($stationdisplay == "HydrologicData"){

	if($kilometer == "nokilometer"){
		$sql="select distinct hs.hs_name from hs,cn,vd where hs.cn_id= cn.cn_id and cn.vd_id= vd.vd_id and vd.vd_name='$volca' and cn.cn_type='Hydrologic'";
		$result = mysql_query($sql);
	}
	else{
		if($kilometer != "all"){
		
			$sql= "select distinct hs.hs_name FROM jj_volnet as j, hs as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (sqrt(power(vf.vd_inf_slat - s.hs_lat, 2) + power(vf.vd_inf_slon - s.hs_lon, 2))*100)< '$kilometer'";       
			$result = mysql_query($sql);
		}
		else{
		
			$sql= "select distinct hs.hs_name FROM jj_volnet as j, hs as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C'";
			$result = mysql_query($sql);
		}
	}	
	
}
else if($stationdisplay == "MagneticFieldsData" || $stationdisplay == "MagnetorVectorData" || $stationdisplay == "ElectricFieldsData" || $stationdisplay == "GravityData"){

	if($kilometer == "nokilometer"){
		$sql="select distinct fs.fs_name from fs,cn,vd where cn.cn_id= fs.cn_id and vd.vd_id= cn.vd_id 
		and vd.vd_name='$volca' and cn.cn_type ='Fields'";
		$result = mysql_query($sql);
	}
	else{
		if($kilometer != "all"){
		
			$sql= "select distinct fs.fs_name FROM jj_volnet as j, fs as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (sqrt(power(vf.vd_inf_slat - s.fs_lat, 2) + power(vf.vd_inf_slon - s.fs_lon, 2))*100)< '$kilometer'";   
			$result = mysql_query($sql);
		}
		else{
		
			$sql= "select distinct fs.fs_name FROM jj_volnet as j, fs as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C'";
			$result = mysql_query($sql);
		}
	}	
}
else if($stationdisplay == "GroundBasedThermalData" || $stationdisplay=="ThermalImage and ThermalImageData"){

	if($kilometer == "nokilometer"){
		$sql="select distinct ts.ts_name from ts,cn,vd where cn.cn_id= ts.cn_id and vd.vd_id= cn.vd_id and vd.vd_name='$volca' and cn.cn_type ='Thermal'";
		$result = mysql_query($sql);
	}
	else{
		if($kilometer != "all"){
		
			$sql= "select distinct ts.ts_name FROM jj_volnet as j, ts as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (sqrt(power(vf.vd_inf_slat - s.ts_lat, 2) + power(vf.vd_inf_slon - s.ts_lon, 2))*100)< '$kilometer'";         
			$result = mysql_query($sql);
		}
		else{
		
			$sql= "select distinct ts.ts_name FROM jj_volnet as j, ts as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C'";
			$result = mysql_query($sql);
		}
	}			
}
else if($stationdisplay == "MeteorologicalData"){

	if($kilometer == "nokilometer"){
		$sql="select distinct ms.ms_name from ms,cn,vd where ms.cn_id= cn.cn_id and cn.vd_id= vd.vd_id and vd.vd_name='$volca' and cn.cn_type='Meteo'";
		$result = mysql_query($sql);
	}
	else{
		if($kilometer != "all"){
		
			$sql= "select distinct ms.ms_name FROM jj_volnet as j, ms as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C' and (sqrt(power(vf.vd_inf_slat - s.ms_lat, 2) + power(vf.vd_inf_slon - s.ms_lon, 2))*100)< '$kilometer'";
			$result = mysql_query($sql);
		}
		else{
		
			$sql= "select distinct ms.ms_name FROM jj_volnet as j, ms as s,cc, vd_inf as vf, vd 
			WHERE j.vd_id =vf.vd_id and j.jj_net_id = s.cn_id and cc.cc_id= s.cc_id and vd.vd_id=vf.vd_id and vd.vd_name='$volca' and j.jj_net_flag = 'C'";
			$result = mysql_query($sql);
		}
	}	
	
}


if(isset($plume_satellite_type)){

	$data=array('...'); 
	
	
	if($result){	     

		while($row=mysql_fetch_array($result))
			$data[]=$row[0]; 
	}


	echo"<div style='width:10%;padding-top:10px;'></div>";
	
	if(isset($data[1])){ 	
		
		if($plume_satellite_type == 'A'){
			echo "<span id='id_air_sat_select'>Choose Airplane: </span>";
			echo"<select name='airplane' id='airplane' style='width:180px;' class='required'>";			
		}else if($plume_satellite_type == 'S'){
			echo "<span id='id_air_sat_select'>Choose Satellite: </span>";
			echo"<select name='satellite' id='satellite' style='width:180px;' class='required'>";
		}	
	
		for($i=0;$i<sizeof($data);$i++){
			if($data[$i] == '...'){         
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
	else{
		
		echo "<h1 class='nosatelliteerror' style='width:300px;color: #777777;font-size:12px;font-weight: bold;font-family: lucida, sans-serif;'>No Airborne for this volcano you have chosen!<br/> Please create an airborne first!</h1>";	
	}	

}
else{
	if(isset($_GET['gpsStation2']) || isset($_GET['gpsStation3'])){
		$data=array('Choose Station','No Reference Station'); 
	}else{
		$data=array('Choose Station'); 
	}
	
	if($result){	    

		while($row=mysql_fetch_array($result))
			$data[]=$row[0];
	}
	
	if($kilometer != 'nokilometer'){
		echo"<div style='width:10%;margin-top:-15px;'></div>";
		echo"<div style='width:10%;padding-top:25px;'></div>";
	}
	
	if(isset($data[1])){ 
	
		if(isset($_GET['station2'])){
			echo"<div class='spaceclass2' style='width:10%;padding-top:15px;'></div>";
			echo "<span id='id_net_stat_text2'>Mirror/Reflector Station: </span>";
			echo"<select name='stat2' id='stat2' style='width:180px;' class='required'>";
		}else if(isset($_GET['station3'])){
			echo"<div class='spaceclass3' style='width:10%;padding-top:15px;'></div>";
			echo "<span id='id_net_stat_text3'>Mirror/Reflector Station2: </span>";
			echo"<select name='stat3' id='stat3' style='width:180px;' class='required'>";		
		}else if(isset($_GET['gpsStation2'])){
			echo"<div class='spaceclass6' style='width:10%;padding-top:15px;'></div>";
			echo "<span id='id_net_stat_text4'>Reference Station: </span>";
			echo"<select name='gpsStat2' id='gpsStat2' style='width:180px;'>";		
		}else if(isset($_GET['gpsStation3'])){
			echo"<div class='spaceclass7' style='width:10%;padding-top:15px;'></div>";
			echo "<span id='id_net_stat_text5'>Reference Station2: </span>";
			echo"<select name='gpsStat3' id='gpsStat3' style='width:180px;'>";		
		}else{
			if($kilometer == 'nokilometer'){
				echo"<div style='width:10%;padding-top:15px;'></div>";
			}	
			echo "<span id='id_net_stat_text'>Station: </span>";
			echo"<select name='stat' id='stat' style='width:180px;' class='required'>";
		
		}


		for($i=0;$i<sizeof($data);$i++){
			if($data[$i] == 'Choose Station'){
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
	else{
		echo "<h1 id='nostation' class='nostationerror' style='width:300px;color: #777777;font-size:12px;font-weight: bold;font-family: lucida, sans-serif;'>No station for this volcano you have chosen!<br/> Please create a station first!</h1>";	
	}
	
}		

?>