<?php

	/**
	*	initiate database
	*/

	define("_SECURITY", true);
	
	require_once 'Config/Configuration.php';
	require_once 'Include/Database.php';
	require_once 'Include/Routing.php';
	require_once 'Include/Loader.php';

	$db = Loader::loadDatabase();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	

	Loader::loadRepository();
	Loader::loadUtility();
	Loader::loadController();
	Loader::loadRouting();
	Loader::loadController();

	Loader::setJSONHeader();
	sleep(1);
	echo json_encode(Routing::route());