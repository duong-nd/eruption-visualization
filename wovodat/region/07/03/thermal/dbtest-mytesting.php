<?
//require_once("DB.php");
	
	include "DB.php";
	
	$dbUser = "root";
	$dbPass = "nang";
	$dbHost = "localhost";
	$dbName = "katotec";
	$dbType = "mysql";
	$dsn = "$dbType://$dbUser:$dbPass@$dbHost/$dbName";
	$conn = @DB::connect($dsn);
	if (@DB::isError($conn)){
        	die($conn->getMessage());
	}else{
		echo "OK to proceed";
	}	
?>
