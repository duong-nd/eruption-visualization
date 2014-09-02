<?php
require_once "php/include/get_root.php";	 // Get root url
include "php/include/db_connect.php";      


$volca=trim($_GET["volcan"]);      				   // get valcano name
$stationdisplay=trim($_GET["stationdisplay"]);     //get SeismicNetwork or GasNetwork etc


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

if($stationdisplay=="SeismicStation"){
	$result = mysql_query("SELECT a.sn_name	FROM sn a, vd b	WHERE  a.vd_id=b.vd_id and b.vd_name='$volca'") or die(mysql_error());

	if (! mysql_num_rows($result)){      // if (false)
		$result= mysql_query("SELECT a.sn_name	FROM sn a, vd b, jj_volnet c WHERE  c.jj_net_flag='S' and c.jj_net_id=a.sn_id and c.vd_id=b.vd_id and b.vd_name='$volca'")or die(mysql_error());
	}
}
else if($stationdisplay=="DeformationStation" || $stationdisplay=="GasStation" || $stationdisplay=="HydrologicStation" || $stationdisplay=="ThermalStation" || $stationdisplay=="FieldsStation" || $stationdisplay == "MeteorologicalStation") {
	
	$result = mysql_query("SELECT a.cn_name	FROM cn a, vd b	WHERE  a.vd_id=b.vd_id and b.vd_name='$volca' and a.cn_type='$stationvalue'") or die(mysql_error()); 
	
	if (! mysql_num_rows($result)){      // if (false)
		$result= mysql_query("SELECT a.cn_name	FROM cn a, vd b, jj_volnet c WHERE  c.jj_net_flag='C' and c.jj_net_id=a.cn_id and c.vd_id=b.vd_id and b.vd_name='$volca' and a.cn_type='$stationvalue'")or die(mysql_error());
	}	
}


	$data=array('Choose Network'); // creat array with value first

	if($result){	     
		while($row=mysql_fetch_array($result))
			$data[]=htmlentities($row[0], ENT_COMPAT, "cp1252"); // sql select result is one so $row array is zero!
	}
	
	if(isset($data[1])){
	
		echo "<span id='pnet'>Network: </span>";
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
	
		echo "<h1 class='nonetworkerror' style='width:300px;color: #777777;font-size:12px;font-weight: bold;font-family: lucida, sans-serif;'>No Network for this Station!<br/> Please create a network first <br/>from a drop down box !</h1>";
	}
	
?>