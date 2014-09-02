<?php
require_once "php/include/get_root.php";	 // Get root url
include "php/include/db_connect.php";        


$volca=trim($_GET["volcan"]);      				   // get valcano name
$stationdisplay=trim($_GET["stationdisplay"]);     //get SeismicNetwork or GasNetwork etc
$stationvalue=trim($_GET["stationvalue"]);  	   // get 'Sesimic' / 'Gas' etc


if($stationdisplay == "EventDataFromNetwork" || $stationdisplay=="SeismicTremor" || $stationdisplay=="IntervalSwarmData"){

	$result = mysql_query("SELECT a.sn_name	FROM sn a, vd b	WHERE  a.vd_id=b.vd_id and b.vd_name='$volca'") or die(mysql_error());
	
	if (! mysql_num_rows($result)){      
		$result= mysql_query("SELECT a.sn_name	FROM sn a, vd b, jj_volnet c WHERE  c.jj_net_flag='S' and c.jj_net_id=a.sn_id and c.vd_id=b.vd_id and b.vd_name='$volca'")or die(mysql_error());
	}

}

	$data=array('Choose Network'); // creat array with value first

	if($result){	     
		while($row=mysql_fetch_array($result))
			$data[]=htmlentities($row[0], ENT_COMPAT, "cp1252"); 
	}
	
	
	if(isset($data[1])){ 
		echo"<div class='spaceid' style='width:1%;'>&nbsp;</div>";
		echo "<span id='id_net_stat_text'>Network: </span>";
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
	}else{
		echo "<h1 class='nonetworkerror' style='width:300px;color: #777777;font-size:12px;font-weight: bold;font-family: lucida, sans-serif;'>No Network for this volcano you have chosen!<br/> Please create a network first!</h1>";
	}			

?>