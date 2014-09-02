<?php
session_start();
	
include "../view/commonInsert_v.php";
include "../view/insert_cb_v.php";
include "../convertie/model/commonInsertForm_m.php";
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])) {
	header('Location: '.$url_root.'login_required.php');
}

showCommonHeader();   			    //Show html header 
showCssExternalJs();				//Get Css and external js link

showUpdateTableList();              //Show cb form


showCommonFooter();            		//Show html footer


?>