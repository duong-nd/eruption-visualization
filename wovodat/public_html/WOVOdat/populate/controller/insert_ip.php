<?php
session_start();
	
include "../view/commonInsert_v.php";

if($_GET['type'] == 'ip_hyd'){
	include "../view/insert_ip_hyd_v.php";
}
else if($_GET['type'] == 'ip_mag'){
	include "../view/insert_ip_mag_v.php";
}
else if($_GET['type'] == 'ip_pres'){
	include "../view/insert_ip_pres_v.php";
}
else if($_GET['type'] == 'ip_sat'){
	include "../view/insert_ip_sat_v.php";
}
else if($_GET['type'] == 'ip_tec'){
	include "../view/insert_ip_tec_v.php";
}

include "../convertie/model/commonInsertForm_m.php";
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])) {
	header('Location: '.$url_root.'login_required.php');
}

showCommonHeader();   			    //Show html header 
showCssExternalJs();				//Get Css and external js link

$vol=getVolList();    			    //Get volcano list
$obs=getCcList();      				//Get observatory list
$cbs=getCbList();                    //Get Bibliographic list

showUpdateTableList($vol,$obs,$cbs);  //Show co form

showCommonFooter();            		//Show html footer


?>