<?php

// Include PEAR DB package
require_once("DB.php");

function db_connect(){
	if(true) {
		$dbUser = "wovodatuser";
		$dbPass = "wovodatpassword";
		$dbHost = "localhost";
		$dbName = "wovodat";
		$dbType = "mysql";
	} else {
		$dbUser = "wovodat_view";
		$dbPass = "+00World";
		$dbHost = "wovodat.org:3307";
		$dbName = "wovodat";
		$dbType = "mysql";
	}
	$dsn = "$dbType://$dbUser:$dbPass@$dbHost/$dbName";
	
	$conn = DB::connect($dsn);
	if (DB::isError($conn)){
        	die($conn->getMessage());
	}
	return $conn;
}

?>
