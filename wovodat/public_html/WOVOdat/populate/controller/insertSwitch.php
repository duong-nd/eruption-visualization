<?php
session_start();
	
include "../view/commonInsert_v.php";
include "../convertie/model/commonInsertForm_m.php";
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])) {
	header('Location: '.$url_root.'login_required.php');
}


$i="";
$field_value = array();



if(isset($_POST['vd_inf_cavw'])){

	if($_POST['vd_inf_etime'] == "" || $_POST['vd_inf_etime'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['vd_inf_etime'] = getEndTime($_POST['vd_inf_etime']);
	}
	
	if($_POST['vd_inf_pubdate'] == "" || $_POST['vd_inf_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['vd_inf_pubdate'] = getPubDate($_POST['vd_inf_pubdate'],$_POST['vd_inf_stime']);
	}

	if($_POST['vd_inf_loaddate'] == ""){
		$_POST['vd_inf_loaddate'] = getTodayDate();
	}
	
// this will be active after new vd_inf table is active.	
//$field_name= array('vd_id','vd_inf_cavw','vd_inf_status','vd_inf_desc','vd_inf_slat','vd_inf_slon','vd_inf_selev','vd_inf_type','vd_inf_country','vd_inf_subreg','vd_inf_loc','vd_inf_rtype','vd_inf_evol','vd_inf_numcald','vd_inf_lcald_dia','vd_inf_ycald_lat','vd_inf_ycald_lon','vd_inf_stime','vd_inf_stime_unc','vd_inf_etime','vd_inf_etime_unc','vd_inf_com','cc_id','vd_inf_loaddate','vd_inf_pubdate','cc_id_load');

	$field_name= array('vd_id','vd_inf_cavw','vd_inf_status','vd_inf_desc','vd_inf_slat','vd_inf_slon','vd_inf_selev','vd_inf_type','vd_inf_loc','vd_inf_rtype','vd_inf_evol','vd_inf_numcald','vd_inf_lcald_dia','vd_inf_ycald_lat','vd_inf_ycald_lon','vd_inf_stime','vd_inf_stime_unc','vd_inf_etime','vd_inf_etime_unc','vd_inf_com','cc_id','vd_inf_loaddate','vd_inf_pubdate','cc_id_load');
	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='vd_inf',$field_name,$field_value);
}


if(isset($_POST['vd_cavw'])){

	
	if($_POST['vd_pubdate'] == "" || $_POST['vd_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['vd_pubdate'] = "0000-00-00 00:00:00";
	}

	if($_POST['vd_loaddate'] == ""){
		$_POST['vd_loaddate'] = getTodayDate();
	}
	
//// this will be active after new vd_inf table is active.	
//	$field_name= array('vd_cavw','vd_num','vd_name','vd_name2','vd_tzone','vd_mcont','vd_com','cc_id','cc_id2','cc_id3','cc_id4','cc_id5','vd_loaddate','vd_pubdate','cc_id_load');

	$field_name= array('vd_cavw','vd_name','vd_name2','vd_tzone','vd_mcont','vd_com','cc_id','cc_id2','cc_id3','cc_id4','cc_id5','vd_loaddate','vd_pubdate','cc_id_load');

	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 
	}

	$result =insertTable($table_name='vd',$field_name,$field_value);
}


if(isset($_POST['vd_mag_loaddate'])){


	if($_POST['vd_mag_pubdate'] == "" || $_POST['vd_mag_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['vd_mag_pubdate'] = "0000-00-00 00:00:00";
	}

	if($_POST['vd_mag_loaddate'] == ""){
		$_POST['vd_mag_loaddate'] = getTodayDate();
	}
	
	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	
	$field_name= array('vd_id','vd_mag_lvz_dia','vd_mag_lvz_vol','vd_mag_tlvz','vd_mag_lerup_vol','vd_mag_drock','vd_mag_orock','vd_mag_orock2','vd_mag_orock3','vd_mag_minsio2','vd_mag_maxsio2','vd_mag_com','cc_id','vd_mag_loaddate','vd_mag_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='vd_mag',$field_name,$field_value);
}



if(isset($_POST['vd_tec_loaddate'])){

	if($_POST['vd_tec_pubdate'] == "" || $_POST['vd_tec_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['vd_tec_pubdate'] = "0000-00-00 00:00:00";
	}

	if($_POST['vd_tec_loaddate'] == ""){
		$_POST['vd_tec_loaddate'] = getTodayDate();
	}
	
	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	
	$field_name= array('vd_id','vd_tec_desc','vd_tec_strslip','vd_tec_ext','vd_tec_conv','vd_tec_travhs','vd_tec_com','cc_id','vd_tec_loaddate','vd_tec_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){
		
		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='vd_tec',$field_name,$field_value);
}



if(isset($_POST['cc_code'])){

	if($_POST['cc_loaddate'] == ""){
		$_POST['cc_loaddate'] = getTodayDate();
	}
	
	
	$field_name= array('cc_code','cc_code2','cc_fname','cc_lname','cc_obs','cc_add1','cc_add2','cc_city','cc_state','cc_country','cc_post','cc_url','cc_email','cc_phone','cc_phone2','cc_fax','cc_com','cc_loaddate');

	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 
	}

	$result =insertTable($table_name='cc',$field_name,$field_value);
}



if(isset($_POST['cb_auth'])){

	if($_POST['cb_loaddate'] == ""){
		$_POST['cb_loaddate'] = getTodayDate();
	}
	
	
	$field_name= array('cb_auth','cb_year','cb_title','cb_journ','cb_vol','cb_pub','cb_page','cb_doi','cb_isbn','cb_url','cb_labadr','cb_keywords','cb_com','cb_loaddate','cc_id_load');

	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 
	}

	$result =insertTable($table_name='cb',$field_name,$field_value);
}


if(isset($_POST['co_code'])){

	if($_POST['co_etime'] == ""){
		$_POST['co_etime'] = getEndTime($_POST['co_etime']);
	}
	
	if($_POST['co_pubdate'] == ""){
		$_POST['co_pubdate'] = getPubDate($_POST['co_pubdate'],$_POST['co_stime']);
	}
	
	if($_POST['co_loaddate'] == ""){
		$_POST['co_loaddate'] = getTodayDate();
	}


	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	

	$field_name= array('co_code','vd_id','co_observe','co_stime','co_stime_unc','co_etime','co_etime_unc','co_com','cc_id','cc_id2','cc_id3','co_loaddate','co_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='co',$field_name,$field_value);
}


if(isset($_POST['ip_hyd_code'])){
	
	
	if($_POST['ip_hyd_end'] == "" || $_POST['ip_hyd_end'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_hyd_end'] = getEndTime($_POST['ip_hyd_end']);
	}
	
	if($_POST['ip_hyd_pubdate'] == "" || $_POST['ip_hyd_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_hyd_pubdate'] = getPubDate($_POST['ip_hyd_pubdate'],$_POST['ip_hyd_start']);
	}
	
	if($_POST['ip_hyd_loaddate'] == ""){
		$_POST['ip_hyd_loaddate'] = getTodayDate();
	}


	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	

	$field_name= array('ip_hyd_code','vd_id','ip_hyd_time','ip_hyd_time_unc','ip_hyd_start','ip_hyd_start_unc','ip_hyd_end','ip_hyd_end_unc','ip_hyd_gwater','ip_hyd_ipor','ip_hyd_edef','ip_hyd_hfrac','ip_hyd_btrem','ip_hyd_abgas','ip_hyd_species','ip_hyd_chim','ip_hyd_ori','ip_hyd_com','cc_id','cc_id2','cc_id3','ip_hyd_loaddate','ip_hyd_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='ip_hyd',$field_name,$field_value);
}


if(isset($_POST['ip_mag_code'])){
	
	
	if($_POST['ip_mag_end'] == "" || $_POST['ip_mag_end'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_mag_end'] = getEndTime($_POST['ip_mag_end']);
	}
	
	if($_POST['ip_mag_pubdate'] == "" || $_POST['ip_mag_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_mag_pubdate'] = getPubDate($_POST['ip_mag_pubdate'],$_POST['ip_mag_start']);
	}
	
	if($_POST['ip_mag_loaddate'] == ""){
		$_POST['ip_mag_loaddate'] = getTodayDate();
	}


	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	

	$field_name= array('ip_mag_code','vd_id','ip_mag_time','ip_mag_time_unc','ip_mag_start','ip_mag_start_unc','ip_mag_end','ip_mag_end_unc','ip_mag_deepsupp','ip_mag_asc','ip_mag_convb','ip_mag_conva','ip_mag_mix','ip_mag_dike','ip_mag_pipe','ip_mag_sill','ip_mag_ori','ip_mag_com','cc_id','cc_id2','cc_id3','ip_mag_loaddate','ip_mag_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='ip_mag',$field_name,$field_value);
}


if(isset($_POST['ip_pres_code'])){
	
	
	if($_POST['ip_pres_end'] == "" || $_POST['ip_pres_end'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_pres_end'] = getEndTime($_POST['ip_pres_end']);
	}
	
	if($_POST['ip_pres_pubdate'] == "" || $_POST['ip_pres_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_pres_pubdate'] = getPubDate($_POST['ip_pres_pubdate'],$_POST['ip_pres_start']);
	}
	
	if($_POST['ip_pres_loaddate'] == ""){
		$_POST['ip_pres_loaddate'] = getTodayDate();
	}


	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	

	$field_name= array('ip_pres_code','vd_id','ip_pres_time','ip_pres_time_unc','ip_pres_start','ip_pres_start_unc','ip_pres_end','ip_pres_end_unc','ip_pres_gas','ip_pres_tec','ip_pres_ori','ip_pres_com','cc_id','cc_id2','cc_id3','ip_pres_loaddate','ip_pres_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='ip_pres',$field_name,$field_value);
}


if(isset($_POST['ip_sat_code'])){
	
	
	if($_POST['ip_sat_end'] == "" || $_POST['ip_sat_end'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_sat_end'] = getEndTime($_POST['ip_sat_end']);
	}
	
	if($_POST['ip_sat_pubdate'] == "" || $_POST['ip_sat_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_sat_pubdate'] = getPubDate($_POST['ip_sat_pubdate'],$_POST['ip_sat_start']);
	}
	
	if($_POST['ip_sat_loaddate'] == ""){
		$_POST['ip_sat_loaddate'] = getTodayDate();
	}


	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	

	$field_name= array('ip_sat_code','vd_id','ip_sat_time','ip_sat_time_unc','ip_sat_start','ip_sat_start_unc','ip_sat_end','ip_sat_end_unc','ip_sat_co2','ip_sat_h2o','ip_sat_decomp','ip_sat_dfo2','ip_sat_add','ip_sat_xtl','ip_sat_ves','ip_sat_deves','ip_sat_degas','ip_sat_ori','ip_sat_com','cc_id','cc_id2','cc_id3','ip_sat_loaddate','ip_sat_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='ip_sat',$field_name,$field_value);
}


if(isset($_POST['ip_tec_code'])){
	
	
	if($_POST['ip_tec_end'] == "" || $_POST['ip_tec_end'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_tec_end'] = getEndTime($_POST['ip_tec_end']);
	}
	
	if($_POST['ip_tec_pubdate'] == "" || $_POST['ip_tec_pubdate'] == "YYYY-MM-DD HH:MM:SS" ){
		$_POST['ip_tec_pubdate'] = getPubDate($_POST['ip_tec_pubdate'],$_POST['ip_tec_start']);
	}
	
	if($_POST['ip_tec_loaddate'] == ""){
		$_POST['ip_tec_loaddate'] = getTodayDate();
	}


	if(isset($_POST['cb_ids'])){
		$totalSize = sizeof($_POST['cb_ids']);
		$cbId = "";
		for($i=0; $i< $totalSize ;$i++){
			$cbId  .= $_POST['cb_ids'][$i];
			if ($i < ($totalSize-1))	
				$cbId .= ",";
		}
		$_POST['cb_ids'] = $cbId;
	}else{
		$_POST['cb_ids'] = "";
	
	}
	

	$field_name= array('ip_tec_code','vd_id','ip_tec_time','ip_tec_time_unc','ip_tec_start','ip_tec_start_unc','ip_tec_end','ip_tec_end_unc','ip_tec_change','ip_tec_sstress','ip_tec_dstrain','ip_tec_fault','ip_tec_seq','ip_tec_press','ip_tec_depress','ip_tec_hppress','ip_tec_etide','ip_tec_atmp','ip_tec_ori','ip_tec_com','cc_id','cc_id2','cc_id3','ip_tec_loaddate','ip_tec_pubdate','cc_id_load','cb_ids');

	
	for ($i=0; $i < (sizeof($_POST)-1) ; $i++){

		$field_value[$i] = trim($_POST[$field_name[$i]]); 

	}

	$result = insertTable($table_name='ip_tec',$field_name,$field_value);
}

if($result){
	header("Location:insertMessage.php?result=".$result);	   //Show sucessful message
	exit();
}else{
	header("Location:insertMessage.php?result=false");	   //Show sucessful message
	exit();
}




?>