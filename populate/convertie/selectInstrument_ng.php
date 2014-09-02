<?php
require_once "php/include/get_root.php";           // Get root url
include "php/include/db_connect.php";             

$volca=trim($_GET['volcan']);  			    	    // Get valcano name
$stationdisplay=trim($_GET['stationdisplay']);      //get SeismicStation or GasStation etc
$networkdisplay=trim($_GET['networkdisplay']);      // get network type what the user chooses
$stationdis=trim($_GET['stationcheck']);            // get station type what the user chooses
$instrucomponent=trim($_GET['instrucomponent']);    // get instrument type what the user chooses
$kilometer=trim($_GET['kilometer']);   		        // get kilo meter value

if($stationdisplay == "SeismicNetwork" || $stationdisplay == "SeismicStation" || $stationdisplay == "SeismicInstrument" || $stationdisplay == "SeismicComponent"){
	$stationvalue = "Seismic";

}
else if($stationdisplay == "DeformationNetwork" || $stationdisplay == "DeformationStation" || $stationdisplay == "DeformationInstrument_General" || $stationdisplay == "DeformationInstrument_Tilt/Strain"){
	$stationvalue = "Deformation";

}
else if($stationdisplay == "GasNetwork" || $stationdisplay == "GasStation" || $stationdisplay == "GasInstrument"){
	$stationvalue = "GAS";
}
else if($stationdisplay == "HydrologicNetwork" || $stationdisplay == "HydrologicStation" || $stationdisplay == "HydrologicInstrument"){
	$stationvalue = "Hydrologic";
}
else if($stationdisplay == "ThermalNetwork" || $stationdisplay == "ThermalStation" || $stationdisplay == "ThermalInstrument" ){
	$stationvalue = "Thermal";
}
else if($stationdisplay == "FieldsNetwork" || $stationdisplay == "FieldsStation" || $stationdisplay == "FieldsInstrument"){

	$stationvalue = "Fields";
}
else if($stationdisplay == "MeteorologicalNetwork" || $stationdisplay == "MeteorologicalStation" || $stationdisplay == "MeteorologicalInstrument"){

	$stationvalue = "Meteo";
}

if($stationdisplay == "DeformationInstrument_General") {	
	$nettype="ds";
	$latlon="ds_n";     // ds_nlat & ds_nlon
	$inst_type="di_gen";
	$stationvalue="Deformation";
}elseif($stationdisplay == "DeformationInstrument_Tilt/Strain"){
	$nettype="ds";   
	$latlon="ds_n";     // ds_nlat & ds_nlon
	$inst_type="di_tlt";
	$stationvalue="Deformation";
}elseif($stationdisplay=="GasInstrument" ) {	
	$nettype="gs";
	$latlon="gs_";    // gs_lat & gs_lon
	$stationvalue="GAS";
}elseif($stationdisplay=="HydrologicInstrument" ) {
	$nettype="hs";
	$latlon="hs_";      // hs_lat & hs_lon
	$stationvalue="Hydrologic";
}elseif($stationdisplay=="ThermalInstrument") {	
	$nettype="ts";
	$latlon="ts_";   // ts_lat & ts_lon
	$stationvalue="Thermal";
}elseif($stationdisplay=="FieldsInstrument" ) {	
	$nettype="fs";
	$latlon="fs_";    // fs_lat & fs_lon
	$stationvalue="Fields";
}elseif($stationdisplay=="MeteorologicalInstrument" ) {	
	$nettype="ms";
	$latlon="ms_";       // ms_lat & ms_lon
	$stationvalue="Meteo";
}

if($stationdis == 'check1' && $instrucomponent='noinstru1'){  // Get Network

	if($stationdisplay == "SeismicInstrument" || $stationdisplay=="SeismicComponent"){

		$result = mysql_query("SELECT a.sn_name	FROM sn a, vd b	WHERE a.vd_id=b.vd_id and b.vd_name='$volca'") or die(mysql_error());
	
		if (! mysql_num_rows($result)){      
	
			$result= mysql_query("SELECT a.sn_name	FROM sn a, vd b, jj_volnet c WHERE  c.jj_net_flag='S' and c.jj_net_id=a.sn_id and c.vd_id=b.vd_id and b.vd_name='$volca'")or die(mysql_error());
	
		}  
	}  
	else{

		$result = mysql_query("SELECT a.cn_name	FROM cn a, vd b	WHERE  a.vd_id=b.vd_id and b.vd_name='$volca' and a.cn_type='$stationvalue'") or die(mysql_error()); 
	
		if (! mysql_num_rows($result)){     
			$result= mysql_query("SELECT a.cn_name FROM cn a, vd b, jj_volnet c WHERE  c.jj_net_flag='C' and c.jj_net_id=a.cn_id and c.vd_id=b.vd_id and b.vd_name='$volca' and a.cn_type='$stationvalue'")or die(mysql_error());
		}	
	}

		$data=array('Choose Network'); 

		if($result){	     // To avoid showing mysql error on webpage if no result
		
			while($row=mysql_fetch_array($result))
				$data[]=$row[0];    
		}
		
		if(isset($data[1])){       
			
			echo "<span id='pnet'>Network: </span><br/>";
			echo "<select name='network' id='network' style='width:180px' class='required'>";
			
			for($i=0;$i<sizeof($data);$i++){   
				
				if($data[$i] == 'Choose Network'){
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
			echo "<h1 class='nonetworkerror2' style='width:300px;color: #777777;font-size:12px;font-weight: bold;font-family: lucida, sans-serif;'>No Network for this instrument!<br/> Please create a network first <br/>from a drop down box !</h1>";		
		}
		
}

else if($stationdis == 'check2' && $instrucomponent='noinstru2'){  // Get Station


		if($stationdisplay == "SeismicInstrument" || $stationdisplay=="SeismicComponent"){  
		
			if($kilometer == "nokilometer"){
				$result = mysql_query("select s.ss_name from ss as s,sn as n,vd where s.sn_id = n.sn_id and n.vd_id = vd.vd_id and vd.vd_name='$volca' and n.sn_name='$networkdisplay'") or die(mysql_error());
			}
			else{
				if($kilometer != "all"){
			
					$sql= "select ss.ss_name FROM jj_volnet as j, ss, cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = ss.sn_id and cc.cc_id=ss.cc_id and vd.vd_id=vf.vd_id and vd.vd_name= '$volca' and j.jj_net_flag = 'S'  and (sqrt(power(vf.vd_inf_slat - ss.ss_lat, 2) + power(vf.vd_inf_slon - ss.ss_lon, 2))*100)<= '$kilometer'";
					
					$result=mysql_query($sql);
				}
				else{
					$result= mysql_query("select ss.ss_name FROM jj_volnet as j, ss, cc, vd_inf as vf, vd WHERE j.vd_id =vf.vd_id and j.jj_net_id = ss.sn_id and cc.cc_id=ss.cc_id and vd.vd_id=vf.vd_id and vd.vd_name= '$volca' and j.jj_net_flag = 'S'") or die(mysql_error());
				}
			}
		}
		else{

			if($kilometer == "nokilometer"){		
				$result=mysql_query("select s.".$nettype."_name from $nettype as s, cn, vd where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and vd.vd_name = '$volca' and cn.cn_type='$stationvalue' and cn.cn_name='$networkdisplay'");
			}
			else{
				if($kilometer != "all"){
					
					$sql="select s.".$nettype."_name from $nettype as s, jj_volnet as j, vd, vd_inf as d where s.cn_id = j.jj_net_id and j.vd_id = vd.vd_id and vd.vd_id = d.vd_id and vd.vd_name = '$volca' and j.jj_net_flag='C' and (sqrt(power(d.vd_inf_slat - s.".$latlon."lat, 2) + power(d.vd_inf_slon - s.".$latlon."lon, 2))*100)< '$kilometer'";

					$result=mysql_query($sql);
				}
				else{
					$sql="select s.".$nettype."_name from $nettype as s, jj_volnet as j, vd, vd_inf as d where s.cn_id = j.jj_net_id and j.vd_id = vd.vd_id and vd.vd_id = d.vd_id and vd.vd_name = '$volca' and j.jj_net_flag='C'";
					$result=mysql_query($sql);
				
				}
			}	
		}	 

		$data=array('Choose Station');
	
		if($result){	     // To avoid showing mysql error on webpage if no result

			while($row=mysql_fetch_array($result))
				$data[]=$row[0]; 
		}
		
		if(isset($data[1])){ 
			
			echo "<span id='pstat'>Station: </span><br/>";
			echo"<select name='station' id='station'  style='width:180px;' class='required'>";

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
		}else{  
			echo "<h1 class='nostationerror' style='width:300px;color: #777777;font-size:12px;font-weight: bold;'>No station for this network you have chosen!Please create station first to install new instrument!</h1>";	
		
		}
	
}
else if($instrucomponent='noinstru3'){    // Get Instrument

	if($stationdisplay == 'SeismicComponent') {
		
		$result = mysql_query("select si.si_name from si,sn,ss,vd where si.ss_id = ss.ss_id and sn.sn_id = ss.sn_id and sn.vd_id = vd.vd_id and vd.vd_name= '$volca' and sn.sn_name= '$networkdisplay' and ss.ss_name = '$stationdis'") or die(mysql_error());
			

		if (! mysql_num_rows($result)){ 
			if($kilometer != "all"){
			
				$result = mysql_query("select distinct si.si_name FROM jj_volnet as j, ss, si,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = ss.sn_id and cc.cc_id=ss.cc_id and vd.vd_id=vf.vd_id and ss.ss_id= si.ss_id and vd.vd_name= '$volca' and j.jj_net_flag = 'S' and (sqrt(power(vf.vd_inf_slat - ss.ss_lat, 2) + power(vf.vd_inf_slon - ss.ss_lon, 2))*100)<= '$kilometer'") or die(mysql_error());
			
			}
			else{
				$result = mysql_query("select distinct si.si_name FROM jj_volnet as j, ss, si,cc, vd_inf as vf, vd 
				WHERE j.vd_id =vf.vd_id and j.jj_net_id = ss.sn_id and cc.cc_id=ss.cc_id and vd.vd_id=vf.vd_id and ss.ss_id= si.ss_id and vd.vd_name= '$volca' and j.jj_net_flag = 'S'") or die(mysql_error());
		
			}
		}

		$data=array('Choose Instrument'); // creat array with value first 

		if($result){	     // To avoid showing mysql error on webpage if no result

			while($row=mysql_fetch_array($result))
				$data[]=$row[0]; 
		}

		if(isset($data[1])){   
 			echo "<span id='pinst'>Instrument: </span><br/>";
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
		}else{
			echo "<h1 class='noinstrumenterror' style='width:300px;color: #777777;font-size:12px;font-weight: bold;'>No Instrument for this station you have chosen! Please upload instrument first to upload component!</h1>";	
		}
	}
}
?>