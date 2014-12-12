<?php

// Get data (xml_array)
$xml_array=$_SESSION['upload']['xml_array'];

// Get wovoml version
$version=$_SESSION['upload']['version'];
// Include file for processing file according to its version
switch ($version) {
	case "0.1":
		// Set base string to include
		$include_root="php/include/get_data/0.1/";
		include "php/include/get_data/0.1/wovoml.php";
		break;
	case "0.2":
		$include_root="php/include/get_data/0.2/";
		include "php/include/get_data/0.2/wovoml.php";
		break;
	case "1.1.0":
		// Get list of data
		$data_list=$_SESSION['upload']['data_list'];
		break;
	default:
		$_SESSION['errors']=array();
		$_SESSION['errors'][0]=array();
		$_SESSION['errors'][0]['code']=1443;
		$_SESSION['errors'][0]['message']="WOVOML version is unknown [get_data/wovoml.php]";
		$_SESSION['l_errors']=1;
		
		// Redirect to system error page
		header('Location: '.$url_root.'system_error.php');
		exit();
}

?>