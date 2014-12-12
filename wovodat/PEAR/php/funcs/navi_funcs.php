<?php

/******************************************************************************************************
*
* Package of functions for the navigation on WOVOdat.org
*
* ask_user: Function to ask the user to specify a reference in a WOVOML file
*
******************************************************************************************************/

/******************************************************************************************************
* Function to ask the user to specify a reference in a WOVOML file
* Input:	- $origin: the function which called this function
* 			- $possibilities: the possibilities (array) for the user to choose
******************************************************************************************************/
function ask_user($origin, $from_class, $from_obj_id, $reference_name, $reference_value, $help_parameters_names, $help_parameters_values, $l_help_parameters, $matches_ids, $cnt_matches) {
	// Get root url
	require_once "php/include/get_root.php";
	
	// Save parameters in session variables
	$_SESSION['specify']=array();
	$_SESSION['specify']['origin']=$origin;
	$_SESSION['specify']['from_class']=$from_class;
	$_SESSION['specify']['from_obj_id']=$from_obj_id;
	$_SESSION['specify']['reference_name']=$reference_name;
	$_SESSION['specify']['reference_value']=$reference_value;
	$_SESSION['specify']['help_parameters_names']=$help_parameters_names;
	$_SESSION['specify']['help_parameters_values']=$help_parameters_values;
	$_SESSION['specify']['l_help_parameters']=$l_help_parameters;
	$_SESSION['specify']['matches_ids']=$matches_ids;
	$_SESSION['specify']['cnt_matches']=$cnt_matches;
	
	// Redirect to "specify reference" page
	header('Location: specify_reference.php');
	exit();
}

?>