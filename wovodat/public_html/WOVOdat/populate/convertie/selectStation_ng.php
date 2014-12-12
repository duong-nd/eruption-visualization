<?php
require_once "php/include/get_root.php";    // Get root url
include "php/include/db_connect.php";       

	
if(!isset($_GET['airplane_sate'])){     

	$volca=trim($_GET['volcan']);  			    	   // Get valcano name
	$stationdisplay=trim($_GET['stationdisplay']);    //get SeismicStation or MeteorologicalStation etc
	$networkdisplay=trim($_GET['networkdisplay']);    // get network type what the user chooses

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
		$inst_type="di_gen";
	}elseif($stationdisplay == "DeformationInstrument_Tilt/Strain"){
		$nettype="ds";
		$inst_type="di_tlt";
	}elseif($stationdisplay=="GasInstrument" ) {	
		$nettype="gs";
	}elseif($stationdisplay=="HydrologicInstrument" ) {	
		$nettype="hs";
	}elseif($stationdisplay=="ThermalInstrument") {	
		$nettype="ts";
	}elseif($stationdisplay=="FieldsInstrument" ) {	
		$nettype="fs";
	}elseif($stationdisplay=="MeteorologicalInstrument" ) {	
		$nettype="ms";
	}

	if($stationdisplay == "SeismicInstrument" || $stationdisplay == "SeismicComponent"){  

		$result = mysql_query("select s.ss_name from ss as s,sn as n,vd where s.sn_id = n.sn_id and n.vd_id = vd.vd_id and vd.vd_name='$volca' and n.sn_name='$networkdisplay'") or die(mysql_error());

	}else{	
		$sql="select s.".$nettype."_name from $nettype as s, cn, vd where s.cn_id = cn.cn_id and cn.vd_id = vd.vd_id and vd.vd_name = '$volca' and cn.cn_type='$stationvalue' and cn.cn_name='$networkdisplay'";
		$result = mysql_query($sql);
		
	}	 

		$row=mysql_fetch_array($result);
		
		if(!$row){   // false means no data result
			echo "false";
		}else{
			echo "true";
		}
}
else{  


	$airplane_sate=trim($_GET['airplane_sate']); 

	$sql="select cs_name from cs where cs.cs_type='$airplane_sate'";
	$result = mysql_query($sql);

	$data=array('...'); 

	if($result){	     

		while($row=mysql_fetch_array($result))
			$data[]=$row[0]; 
	}

	echo"<div style='width:10%;padding-top:10px;'></div>";


	if(isset($data[1])){ 	
		
		if($airplane_sate == 'A'){
			echo "<span id='id_air_sat_select'>Choose Airplane: </span>";
			echo"<select name='airplane' id='airplane' style='width:180px;' class='required'>";			
		}else if($airplane_sate == 'S'){
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
?>