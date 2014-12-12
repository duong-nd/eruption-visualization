<?php
session_start();

include "../view/commonInsert_v.php";
include "../view/insertForm_v.php";


if(!isset($_GET['type'])){    
header('Location: '.$url_root.'../home_populate.php');
exit();
}

showUpdateTableList();




?>