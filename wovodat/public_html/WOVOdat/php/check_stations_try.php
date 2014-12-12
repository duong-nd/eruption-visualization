<?php
/******************************************************************************************************
* Displays list of station-types in the selected volcano
*******************************************************************************************************/
// Connect to database
include 'php/include/db_connect_view.php';
include '../populate/convertie/f2genfunc/funcgen_datetime.php';

// Get data type selected
	$vd_id=$_REQUEST['vd_id'];
	$vd_name=$_REQUEST['vd_name'];
	$vd_name=substr($vd_name,0,-9);
	
	if ($vd_id=="") {
	// No volcano selected
	exit();
	}
	
// Count stations
$sta_sei_cnt=0;
$sta_def_cnt=0;
$sta_hyd_cnt=0;
$sta_the_cnt=0;
$sta_gas_cnt=0;
$sta_fie_cnt=0;
$sta_oth_cnt=0;

// Seismic sta
	$getStations = mysql_query("select c.sn_id, c.ss_id  FROM sn a, ss c    where a.vd_id = '$vd_id'  and a.sn_id = c.sn_id") or die(mysql_error());
	if (! mysql_num_rows($getStations)) 
		$getStations = mysql_query("select a.jj_net_id, b.sn_id, c.sn_id, c.ss_id, c.ss_lat, c.ss_lon, c.ss_name FROM jj_volnet a, sn b, ss c where a.vd_id = '$vd_id' and a.jj_net_flag = 'S' and a.jj_net_id = b.sn_id and b.sn_id = c.sn_id") or die(mysql_error());
	$outputs .= "Seismic Stations : " . mysql_num_rows($getStations);
	$outputsnum .= "stations : ".mysql_num_rows($getStations);
	while ($getStations_arr = mysql_fetch_array($getStations)){
				$sta_sei_cnt++;
	}

// Deformation sta
	$getStations = mysql_query("select c.cn_id, c.ds_id, a.cn_pubdate from cn a, ds c where a.vd_id = '$vd_id' and a.cn_id = c.cn_id order by c.ds_name") or die(mysql_error());
	if (! mysql_num_rows($getStations))
		$getStations = mysql_query("select a.jj_net_id, c.cn_id, c.ds_id from jj_volnet a, cn b, ds c where a.vd_id = '$vd_id' and a.jj_net_flag = 'C' and a.jj_net_id = c.cn_id order by c.ds_name") or die(mysql_error());
	$outputd .= "Deformation Stations : " . mysql_num_rows($getStations);
	$outputdnum .= "stations : ".mysql_num_rows($getStations);
	while ($getStationd_arr = mysql_fetch_array($getStations)){
			$pubdate=$getStationd_arr[2]; $pubdateUnix=datetimeToUnix($pubdate);
			if($pubdate!="2011-12-01 06:00:00"){
			$sta_def_cnt++;}
	}

// Hydrologic sta
	$getStations = mysql_query("select c.cn_id, c.hs_id from cn a, hs c where a.vd_id = '$vd_id' and a.cn_id = c.cn_id") or die(mysql_error());
	if (! mysql_num_rows($getStations))
		$getStations = mysql_query("select a.jj_net_id, c.cn_id, c.hs_id, c.hs_lat, c.hs_lon, c.hs_name, c.hs_stime, c.hs_etime from jj_volnet a, hs c where a.vd_id = '$vd_id' and a.jj_net_flag = 'C' and a.jj_net_id = c.cn_id") or die(mysql_error());
	$outputh .= "Hydrologic stations : " . mysql_num_rows($getStations);
	$outputhnum .= "stations : ".mysql_num_rows($getStations);
	while ($getStation_obj = mysql_fetch_object($getStations)){
		$sta_hyd_cnt++;
	}

// Thermal sta
	$getStations = mysql_query("select c.cn_id, c.ts_id from cn a, ts c where a.vd_id = '$vd_id' and a.cn_id = c.cn_id") or die(mysql_error());
	if (! mysql_num_rows($getStations))
		$getStations = mysql_query("select a.jj_net_id, c.cn_id, c.ts_id, c.ts_lat, c.ts_lon, c.ts_name, c.ts_stime, c.ts_etime from jj_volnet a, ts c where a.vd_id = '$vd_id' and a.jj_net_flag = 'C' and a.jj_net_id = c.cn_id") or die(mysql_error());
	$outputt .= "Thermal stations : " . mysql_num_rows($getStations);
	$outputtnum .= "stations : ".mysql_num_rows($getStations);
	while ($getStation_obj = mysql_fetch_object($getStations)){
		$sta_the_cnt++;
	}
			
// Gas sta
	$getStations = mysql_query("select c.cn_id, c.gs_id from cn a, gs c where a.vd_id = '$vd_id' and a.cn_id = c.cn_id") or die(mysql_error());
	if (! mysql_num_rows($getStations))
		$getStations = mysql_query("select a.jj_net_id, c.cn_id, c.gs_id, c.gs_lat, c.gs_lon, c.gs_name, c.gs_stime, c.gs_etime from jj_volnet a, gs c where a.vd_id = '$vd_id' and a.jj_net_flag = 'C' and a.jj_net_id = c.cn_id") or die(mysql_error());
	$outputg .= "Gas stations : " . mysql_num_rows($getStations);
	$outputgnum .= "stations : ".mysql_num_rows($getStations);
	while ($getStation_obj = mysql_fetch_object($getStations)){
		$sta_gas_cnt++;
	}
				
$sta_cnt=$sta_sei_cnt+$sta_def_cnt;			

// If no data
if ($sta_cnt==0) {
?>
	<script type="text/javascript">	$("#reloadSta").hide("fast");	$("#removeSta").hide("fast"); $("#reloadEqk").hide("fast");</script>
<?php
// for volcano on which data is not available
	echo "<div style='width:100%; align:left;'><center>".$vd_name." - still populating</center></div>";
}else{
?>
	<script type="text/javascript">	$("#reloadSta").hide();	$("#removeSta").hide();</script>
	<script type="text/javascript">	$("#reloadSta").hide("fast");	$("#removeSta").hide("fast"); $("#reloadEqk").hide("fast");</script>
<?php
// for volcano on which data is available, but not yet published
	echo "<div style='width:100%; align:left;'><center> we are still populating data</center></div>";
	echo "<div style='width:100%; align:right;'>";

	
	if($sta_sei_cnt>=1) {
//		echo "<button id='reloadSei' style='font-size:9px;'>".$outputs."</button>";
?>
<script type="text/javascript">
	$("#reloadSei").button();
	$("#reloadSei").click(function() {
		$("#displayeq").show();			
		$("#reloadEqk").show();
		$("#temporal").hide("fast");						
		setupMap(1);
	});
</script>		
<?php
	}

	
	if($sta_def_cnt>=1) {
//		echo "<button id='reloadDef' style='font-size:9px;'>".$outputd."</button>";
?>
<script type="text/javascript">
	$("#reloadDef").button();
	$("#reloadDef").click(function() {
		$("#displayeq").hide();
		$("#temporal").hide("fast");						
 		setupMap(2);
	});
</script>		
<?php
	}
	if($sta_hyd_cnt>=1) {
//		echo "<button id='reloadHyd' style='font-size:9px;'>".$outputh."</button>";
?>
<script type="text/javascript">
	$("#reloadHyd").button();
	$("#reloadHyd").click(function() {
		$("#temporal").hide("fast");						
			setupMap(3);
	});
</script>		
<?php
	}
	if($sta_the_cnt>=1) {
//		echo "<button id='reloadThe' style='font-size:9px;'>".$outputt."</button>";
?>
<script type="text/javascript">
	$("#reloadThe").button();
	$("#reloadThe").click(function() {
		$("#temporal").hide("fast");						
			setupMap(4);
	});
</script>		
<?php
	}
	if($sta_gas_cnt>=1) {
//		echo "<button id='reloadGas' style='font-size:9px;'>".$outputg."</button>";
?>
<script type="text/javascript">
	$("#reloadGas").button();
	$("#reloadGas").click(function() {
		$("#temporal").hide("fast");						
			setupMap(5);
	});
</script>		
<?php
	}
	echo "</div>";
}

?>
