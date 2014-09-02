<?php
/******************************************************************************************************
* Checks what data are available for a given list of stations (i.e. on the selected volcano)
******************************************************************************************************/
// Connect to database
include 'php/include/db_connect_view.php';
$staplot = $_REQUEST['staplot'];
$divnum = $_REQUEST['divnum'];

// Get stations
session_start();
$ss_obj=$_SESSION['ss_obj'];
$ds_obj=$_SESSION['ds_obj'];
$gs_obj=$_SESSION['gs_obj'];
$hs_obj=$_SESSION['hs_obj'];
$fs_obj=$_SESSION['fs_obj'];
$ts_obj=$_SESSION['ts_obj'];

if($staplot==1){
// Count seismic data
$sd_sam_cnt=0;
$sd_ivl_cnt=0;
foreach ($ss_obj as $ss) {
	// Count RSAM-SSAM data
	$sd_sam_cnt+=mysql_result(mysql_query("SELECT COUNT(sd_sam_id) FROM sd_sam WHERE ss_id='".$ss->ss_id."'"),0);
	// Count interval data
	$sd_ivl_cnt+=mysql_result(mysql_query("SELECT COUNT(sd_ivl_id) FROM sd_ivl WHERE ss_id='".$ss->ss_id."' OR sn_id=(SELECT sn_id FROM ss WHERE ss_id='".$ss->ss_id."')"),0);
}
$sd_cnt=$sd_sam_cnt+$sd_ivl_cnt;
}

elseif($staplot==2){
// Count deformation data
$dd_edm_cnt=0;
$dd_lev_cnt=0;
$dd_gps_cnt=0;
$dd_gpv_cnt=0;
$dd_tlt_cnt=0;
$dd_str_cnt=0;

foreach ($ds_obj as $ds) {
	// Count GPS vector data
	$dd_gpv_cnt+=mysql_result(mysql_query("SELECT COUNT(dd_gpv_id) FROM dd_gpv WHERE ds_id='".$ds->ds_id."' OR di_gen_id=(SELECT di_gen_id FROM di_gen WHERE ds_id='".$ds->ds_id."')"),0);
	
	// Count GPS data
	$dd_gps_cnt+=mysql_result(mysql_query("SELECT COUNT(dd_gps_id) FROM dd_gps WHERE ds_id='".$ds->ds_id."' OR di_gen_id=(SELECT di_gen_id FROM di_gen WHERE ds_id='".$ds->ds_id."')"),0);
		
	// Count EDM data
	$dd_edm_cnt+=mysql_result(mysql_query("SELECT COUNT(dd_edm_id) FROM dd_edm WHERE ds_id1='".$ds->ds_id."' OR di_gen_id=(SELECT di_gen_id FROM di_gen WHERE ds_id='".$ds->ds_id."')"),0);

	// Count leveling data
	$dd_lev_cnt+=mysql_result(mysql_query("SELECT COUNT(dd_lev_id) FROM dd_lev WHERE ds_id_ref='".$ds->ds_id."' OR di_gen_id=(SELECT di_gen_id FROM di_gen WHERE ds_id='".$ds->ds_id."')"),0);
	// Count tilt data
	$dd_tlt_cnt+=mysql_result(mysql_query("SELECT COUNT(dd_tlt_id) FROM dd_tlt WHERE ds_id='".$ds->ds_id."' OR di_tlt_id=(SELECT di_tlt_id FROM di_tlt WHERE ds_id='".$ds->ds_id."')"),0);
	// Count strain data
	$dd_str_cnt+=mysql_result(mysql_query("SELECT COUNT(dd_str_id) FROM dd_str WHERE ds_id='".$ds->ds_id."' OR di_tlt_id=(SELECT di_tlt_id FROM di_tlt WHERE ds_id='".$ds->ds_id."')"),0);
}
$dd_cnt=$dd_edm_cnt+$dd_lev_cnt+$dd_gps_cnt+$dd_gpv_cnt+$dd_tlt_cnt+$dd_str_cnt;
}

elseif($staplot==3){
// Count hydrologic data
$hd_cnt=0;
foreach ($hs_obj as $hs) {
	// Count hydrologic data
	$hd_cnt+=mysql_result(mysql_query("SELECT COUNT(hd_id) FROM hd WHERE hs_id='".$hs->hs_id."' OR hi_id=(SELECT hi_id FROM hi WHERE hs_id='".$hs->hs_id."')"),0);
}
}

elseif($staplot==4){
// Count thermal data
$td_cnt=0;
foreach ($ts_obj as $ts) {
	// Count thermal data
	$td_cnt+=mysql_result(mysql_query("SELECT COUNT(td_id) FROM td WHERE ts_id='".$ts->ts_id."' OR ti_id=(SELECT ti_id FROM ti WHERE ts_id='".$ts->ts_id."')"),0);
}
}

elseif($staplot==5){
// Count gas data
$gd_smp_cnt=0;
$gd_plu_cnt=0;
$gd_sol_cnt=0;
foreach ($gs_obj as $gs) {
	// Count directly sampled gas data
	$gd_smp_cnt+=mysql_result(mysql_query("SELECT COUNT(gd_id) FROM gd WHERE gs_id='".$gs->gs_id."' OR gi_id=(SELECT gi_id FROM gi WHERE gs_id='".$gs->gs_id."')"),0);
	// Count plume data
	$gd_plu_cnt+=mysql_result(mysql_query("SELECT COUNT(gd_plu_id) FROM gd_plu WHERE gs_id='".$gs->gs_id."' OR gi_id=(SELECT gi_id FROM gi WHERE gs_id='".$gs->gs_id."')"),0);
	// Count soil efflux data
	$gd_sol_cnt+=mysql_result(mysql_query("SELECT COUNT(gd_sol_id) FROM gd_sol WHERE gs_id='".$gs->gs_id."' OR gi_id=(SELECT gi_id FROM gi WHERE gs_id='".$gs->gs_id."')"),0);
}
$gd_cnt=$gd_smp_cnt+$gd_plu_cnt+$gd_sol_cnt;
}

elseif($staplot==7){
// Count fields data
$fd_cnt=0;
}

// Count total data
$data_cnt=$dd_cnt+$gd_cnt+$hd_cnt+$fd_cnt+$td_cnt+$sd_cnt;

if($staplot==1){$statype="Seismic"; $stacnt=$sd_cnt;}
elseif($staplot==2){$statype="Deformation"; $stacnt=$dd_cnt;}
elseif($staplot==3){$statype="Hydrologic"; $stacnt=$hd_cnt;}
elseif($staplot==4){$statype="Thermal"; $stacnt=$td_cnt;}
elseif($staplot==5){$statype="Gas"; $stacnt=$gd_cnt;}
elseif($staplot==6){$statype="Fields"; $stacnt=$fd_cnt;}
elseif($staplot==7){$statype="";}


// If no data

if ($staplot!=0 && $staplot!=7){
if ($stacnt==0) {
	echo "<div class='ui-state-highlight' style='width:60%; align:center; margin-top: 2px; margin-bottom: 2px'><center><b>".$statype." "."</b>-- data: not available</center></div>";
}else{

// Open list of data
echo <<<STRING
					<table><tr>
					<td><p><b>$statype</b>:</p></td>
STRING;
					
	echo "<td><select id='dataType".$divnum."' onchange='changedDataType(".$divnum.");' style='font-size:9px;width:140px; margin-top:2px'>";

echo <<<STRING
						<option value=""></option>
STRING;

// If there are deformation data
if ($dd_cnt!=0) {
	// Open group
	echo <<<STRING
						<optgroup label="Deformation">
STRING;
	
	// If there are EDM data
	if ($dd_edm_cnt!=0) {
		echo <<<STRING
							<option value="dd_edm">EDM</option>
STRING;
	}
	
	// If there are GPS data
	if ($dd_gps_cnt!=0) {
		echo <<<STRING
							<option value="dd_gps">GPS</option>
STRING;
	}
	
	// If there are GPS vector data
	if ($dd_gpv_cnt!=0) {
		echo <<<STRING
							<option value="dd_gpv">GPS vector</option>
STRING;
	}
	
	// If there are leveling data
	if ($dd_lev_cnt!=0) {
		echo <<<STRING
							<option value="dd_lev">Leveling</option>
STRING;
	}
	
	// If there are strain data
	if ($dd_str_cnt!=0) {
		echo <<<STRING
							<option value="dd_str">Strain</option>
STRING;
	}
	
	// If there are tilt data
	if ($dd_tlt_cnt!=0) {
		echo <<<STRING
							<option value="dd_tlt">Tilt</option>
STRING;
	}
	
	// Close group
	echo <<<STRING
						</optgroup>
STRING;
}

// If there are fields data
if ($fd_cnt!=0) {
	// Open group
	echo <<<STRING
						<optgroup label="Fields">
STRING;
	
	// Close group
	echo <<<STRING
						</optgroup>
STRING;
}

// If there are gas data
if ($gd_cnt!=0) {
	// Open group
	echo <<<STRING
						<optgroup label="Gas">
STRING;
	
	// If there are directly sampled gas data
	if ($gd_smp_cnt!=0) {
		echo <<<STRING
							<option value="gd">Directly sampled</option>
STRING;
	}
	
	// If there are plume data
	if ($gd_plu_cnt!=0) {
		echo <<<STRING
							<option value="gd_plu">Plume</option>
STRING;
	}
	
	// If there are soil efflux data
	if ($gd_sol_cnt!=0) {
		echo <<<STRING
							<option value="gd_sol">Soil efflux</option>
STRING;
	}
	
	// Close group
	echo <<<STRING
						</optgroup>
STRING;
}

// If there are hydrologic data
if ($hd_cnt!=0) {
	// Open group
	echo <<<STRING
						<optgroup label="Hydrologic">
STRING;

	// If there are hydrologic data
	if ($hd_cnt!=0) {
		echo <<<STRING
							<option value="hd">Directly sampled</option>
STRING;
	}
	
	// Close group
	echo <<<STRING
						</optgroup>
STRING;
}

// If there are seismic data
if ($sd_cnt!=0) {
	// Open group
	echo <<<STRING
						<optgroup label="Seismic">
STRING;
	
	// If there are interval data
	if ($sd_ivl_cnt!=0) {
		echo <<<STRING
							<option value="sd_ivl">Interval</option>
STRING;
	}
	
	// If there are RSAM-SSAM data
	if ($sd_sam_cnt!=0) {
		echo <<<STRING
							<option value="sd_sam">RSAM-SSAM</option>
STRING;
		echo <<<STRING
							<option value="sd_rsm">RSAM</option>
STRING;
		echo <<<STRING
							<option value="sd_ssm">SSAM</option>
STRING;
	}
	
	// Close group
	echo <<<STRING
						</optgroup>
STRING;
}

// If there are thermal data
if ($td_cnt!=0) {
	// Open group
	echo <<<STRING
						<optgroup label="Thermal">
STRING;
	
	// If there are thermal data
	if ($td_cnt!=0) {
		echo <<<STRING
							<option value="td">Thermal data</option>
STRING;
	}
	
	// Close group
	echo <<<STRING
						</optgroup>
STRING;
}

// Close list of data
echo <<<STRING
					</select></td>
					</tr></table>
STRING;
}
}

// Disconnect from database
mysql_close($link);

?>