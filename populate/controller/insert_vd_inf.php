<?php
session_start();

include "../view/commonInsert_v.php";
include "../view/insert_vd_inf_v.php";
include "../convertie/model/commonInsertForm_m.php";
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])) {
	header('Location: '.$url_root.'login_required.php');
}

showCommonHeader();   			    //Show html header 
showCssExternalJs();				//Get Css and external js link 

$vol=getVolList();    			    //Get volcano list
$obs=getCcList();      				//Get observatory list

showUpdateTableList($vol,$obs);     //Show vd_inf form


showCommonFooter();            		//Show html footer


?>