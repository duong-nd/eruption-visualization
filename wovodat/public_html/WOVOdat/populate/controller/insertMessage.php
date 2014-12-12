<?php
session_start();
	
include "../view/commonInsert_v.php";

if(!isset($_SESSION['login'])) {
	header('Location: '.$url_root.'login_required.php');
}

showCommonHeader();   			        //Show html header 

$result=$_GET['result'];

if($result != 'false'){
	showSuccessfulMessage();		   //Show sucessful message
}else{
	showUnsuccessfulMessage();         //Show Unsucessful message
}


showCommonFooter();            		   //Show html footer
?>