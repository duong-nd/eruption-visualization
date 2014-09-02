<?php

/******************************************************************************************************
*
* Package of functions doing operations on the database
*
* db_sql: Function to make any SQL query to the database
* db_insert: Function to insert a new row of data into a table in the database
* db_update: Function to update a table in the database
* db_select: Function to select one or many fields from a table in the database
* db_select_ext: Extended function to select one or many fields from a table in the database
* db_search: Function to search one or many fields from a table in the database, using %LIKE% operator
* db_count: Function to count the number of rows corresponding to a 'SELECT' instruction from a table in the database
* db_delete: Function to delete a row from a table in the database
* db_delete_id: Function to delete a row from a table in the database and return ID deleted
* db_get_cc_id: Function to get the cc_id for a given cc_code
* db_get_vd_id: Function to get the vd_id for a given vd_code
*
******************************************************************************************************/

/******************************************************************************************************
* Function to select one or many fields from a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $sql_query: the sql query to be made
* Output:	- $results: an array containing the results of the query, if any
* 			- $errors: an error message
******************************************************************************************************/
function db_sql($sql_query, &$results, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Connect to database
	$conn=db_connect();

	// Process SQL query
	$sql=mb_convert_encoding($sql_query,"ISO-8859-1","UTF-8");
	$result=$conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Get result
	$results=array();
	$cnt_results=0;
	while($rs = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
		$results[$cnt_results]=$rs;
		$cnt_results++;
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to insert a new row of data into a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table into which the row of data will be inserted
* 			- $field_name: an array containing field names of the table to be inserted
* 			- $field_value: an array containing field values to be inserted
*			- $simul: a boolean to know whether data shall really be inserted
* Output:	- $last_insert_id: the ID (PRIMARY KEY) of the row of data inserted
* 				- $errors: an error message
******************************************************************************************************/
function db_insert($table_name, $field_name, $field_value, $simul, &$last_insert_id, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_field_value=count($field_value);
	if ($l_field_name!=0 && $l_field_name!=$l_field_value) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Connect to database
	$conn=db_connect();
	
	// Prepare SQL query
	// Insert into table
	$sql="INSERT INTO ".$conn->escapeSimple($table_name);
	// Fields
	if ($l_field_name!=0) {
		// First field
		$sql.=" (".$conn->escapeSimple($field_name[0]);
		// Other fields
		for ($i=1; $i<$l_field_name; $i++) {
			$sql.= ", ".$conn->escapeSimple($field_name[$i]);
		}
	$sql.=")";
	}
	// Values
	$sql.=" VALUES (";
	if ($l_field_value!=0) {
		// First value
		if ($field_value[0]=="" || $field_value[0]==NULL) {
			// If end time, default is "9999-12-31 23:59:59"
			if (substr($field_name[0], -5)=="etime") {
				$sql.="'9999-12-31 23:59:59'";
			}
			else {
				$sql.="NULL";
			}
		}
		else {
			$sql.="'".$conn->escapeSimple($field_value[0])."'";
		}
		// Other fields and values
		for ($i=1; $i<$l_field_value; $i++) {
			if ($field_value[$i]=="" || $field_value[$i]==NULL) {
				// If end time, default is "9999-12-31 23:59:59"
				if (substr($field_name[$i], -5)=="etime") {
					$sql.=", '9999-12-31 23:59:59'";
				}
				else {
					$sql.=", NULL";
				}
			}
			else {
				$sql.=", '".$conn->escapeSimple($field_value[$i])."'";
			}
		}
	}
	// Close values
	$sql.=")";
	
	if ($simul) {
		// Disconnect
		$conn->disconnect();
		
		$last_insert_id=63;
		return TRUE;
	}
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result = $conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Send SQL (last insert id) query
	$sql="SELECT LAST_INSERT_ID()";
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result = $conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Get result
	while($rs=$result->fetchRow(DB_FETCHMODE_ASSOC)) {
		$last_insert_id=$rs["LAST_INSERT_ID()"];
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to update a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table to be updated
* 			- $field_name: an array containing field names of the table to be updated
* 			- $field_value: an array containing field values to be updated
* 			- $where_field_name: an array containing field names of the table serving as reference
* 			- $where_field_value: an array containing field values serving as reference
*			- $simul: a boolean to know whether data shall really be updated
* Output:	- $errors: an error message
******************************************************************************************************/
function db_update($table_name, $field_name, $field_value, $where_field_name, $where_field_value, $simul, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_field_value=count($field_value);
	$l_where_field_name=count($where_field_name);
	$l_where_field_value=count($where_field_value);
	if ($l_where_field_name==0 || $l_where_field_name!=$l_where_field_value || $l_field_name==0 || $l_field_name!=$l_field_value) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Connect to database
	$conn=db_connect();
	
	// Prepare SQL query
	// Update table
	$sql="UPDATE ".$conn->escapeSimple($table_name);
	// 1st field
	if ($field_value[0]=="" || $field_value[0]==NULL) {
		$sql.=" SET ".$conn->escapeSimple($field_name[0])."=NULL";
	}
	else {
		$sql.=" SET ".$conn->escapeSimple($field_name[0])."='".$conn->escapeSimple($field_value[0])."'";
	}
	

	// Other fields
	for ($i=1; $i<$l_field_name; $i++) {
		if ($field_value[$i]=="" || $field_value[$i]==NULL) {
			if (substr($field_name[$i], -5)=="etime") {    
					$sql.=", ".$conn->escapeSimple($field_name[$i])."='9999-12-31 23:59:59'";
			}		
			else{
				$sql.=", ".$conn->escapeSimple($field_name[$i])."=NULL";
			}	
		}
		else {
			$sql.=", ".$conn->escapeSimple($field_name[$i])."='".$conn->escapeSimple($field_value[$i])."'";
		}
	}		

	
	// Start where conditions
	$sql.=" WHERE ".$conn->escapeSimple($where_field_name[0])."='".$conn->escapeSimple($where_field_value[0])."'";
	// Other where conditions
	for ($i=1; $i<$l_where_field_name; $i++) {
		$sql.=" AND ".$conn->escapeSimple($where_field_name[$i])."='".$conn->escapeSimple($where_field_value[$i])."'";
	}
	
	if ($simul) {
		// Disconnect
		$conn->disconnect();
		
		return TRUE;
	}
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result=$conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to select one or many fields from a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table where the selection is to be made
* 			- $field_name: an array containing field names of the table to be selected
* 			- $where_field_name: an array containing field names of the table serving as reference
* 			- $where_field_value: an array containing field values serving as reference
* Output:	- $field_value: an array containing the selected field values
* 			- $errors: an error message
******************************************************************************************************/
function db_select($table_name, $field_name, $where_field_name, $where_field_value, &$field_value, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_where_field_name=count($where_field_name);
	$l_where_field_value=count($where_field_value);
	if ($l_where_field_name!=$l_where_field_value || $l_field_name==0) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Connect to database
	$conn=db_connect();

	// Prepare SQL query
	// Select fields
	$sql="SELECT ".$conn->escapeSimple($field_name[0]);
	// Other fields to select
	if ($l_field_name>=1) {
		// Loop on fields
		for ($i=1; $i<$l_field_name; $i++) {
			$sql.=", ".$conn->escapeSimple($field_name[$i]);
		}
	}
	// From table
	$sql.=" FROM ".$conn->escapeSimple($table_name);
	// Start where conditions
	if ($l_where_field_name!=0) {
		$sql.=" WHERE ".$conn->escapeSimple($where_field_name[0])."='".$conn->escapeSimple($where_field_value[0])."'";
	}
	// Other where conditions
	if ($l_where_field_name>=1) {
		// Loop on conditions
		for ($i=1; $i<$l_where_field_name; $i++) {
			$sql.=" AND ".$conn->escapeSimple($where_field_name[$i])."='".$conn->escapeSimple($where_field_value[$i])."'";
		}
	}
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result=$conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Get result
	$field_value=array();
	// Number of results
	$j=0;
	while($rs = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
		// Initialize variable
		$field_value[$j]=array();
		
		// Loop on fields
		for ($i=0; $i<$l_field_name; $i++) {
			$field_value[$j][$i]=$rs[$field_name[$i]];
		}
		
		// Prepare to reloop
		$j++;
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Extended function to select one or many fields from a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table where the selection is to be made
* 			- $field_name: an array containing field names of the table to be selected
* 			- $where_field_name: an array containing field names of the table serving as reference
* 			- $where_field_comp: an array containing field comparative operators (=, <>, >, <, >=, <=, BETWEEN, LIKE, IN)
* 			- $where_field_value: an array containing field values serving as reference
* 			- $where_logical: an array containing logical connectors between where conditions (AND, OR)
* Output:	- $field_value: an array containing the selected field values
* 			- $errors: an error message
******************************************************************************************************/
function db_select_ext($table_name, $field_name, $where_field_name, $where_field_comp, $where_field_value, $where_logical, &$field_value, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_where_field_name=count($where_field_name);
	$l_where_field_comp=count($where_field_comp);
	$l_where_field_value=count($where_field_value);
	$l_where_logical=count($where_logical);
	if ($l_where_field_name!=$l_where_field_comp || $l_where_field_name!=$l_where_field_value || $l_where_field_name!=$l_where_logical+1 || $l_field_name==0) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Connect to database
	$conn=db_connect();

	// Prepare SQL query
	// Select fields
	$sql="SELECT ".$conn->escapeSimple($field_name[0]);
	// Other fields to select
	if ($l_field_name>=1) {
		// Loop on fields
		for ($i=1; $i<$l_field_name; $i++) {
			$sql.=", ".$conn->escapeSimple($field_name[$i]);
		}
	}
	// From table
	$sql.=" FROM ".$conn->escapeSimple($table_name);
	// Start where conditions
	if ($l_where_field_name!=0) {
		$sql.=" WHERE ".$conn->escapeSimple($where_field_name[0])." ".$where_field_comp[0]." '".$conn->escapeSimple($where_field_value[0])."'";
	}
	// Other where conditions
	if ($l_where_field_name>=1) {
		// Loop on conditions
		for ($i=1; $i<$l_where_field_name; $i++) {
			$sql.=" ".$where_logical[$i-1]." ".$conn->escapeSimple($where_field_name[$i])." ".$where_field_comp[$i]." '".$conn->escapeSimple($where_field_value[$i])."'";
		}
	}
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result=$conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Get result
	$field_value=array();
	// Number of results
	$j=0;
	while ($rs=$result->fetchRow(DB_FETCHMODE_ASSOC)) {
		// Initialize variable
		$field_value[$j]=array();
		
		// Loop on fields
		for ($i=0; $i<$l_field_name; $i++) {
			$field_value[$j][$i]=$rs[$field_name[$i]];
		}
		
		// Prepare to reloop
		$j++;
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to search one or many fields from a table in the database using variable statements
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table where the selection is to be made
* 			- $field_name: an array containing field names of the table to be selected
* 			- $where_field_name: an array containing field names of the table serving as reference
* 			- $where_field_comp: an array containing field comparative operators (=, LIKE%, %LIKE, %LIKE%)
* 			- $where_field_value: an array containing field values serving as reference
* 			- $where_logical: an array containing logical connectors between where conditions (AND, OR)
* Output:	- $field_value: an array containing the selected field values
* 			- $errors: an error message
******************************************************************************************************/
function db_search($table_name, $field_name, $where_field_name, $where_field_comp, $where_field_value, $where_logical, &$field_value, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_where_field_name=count($where_field_name);
	$l_where_field_comp=count($where_field_comp);
	$l_where_field_value=count($where_field_value);
	$l_where_logical=count($where_logical);
	if ($l_where_field_name!=$l_where_field_comp || $l_where_field_name!=$l_where_field_value || $l_where_field_name!=$l_where_logical+1 || $l_field_name==0) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Connect to database
	$conn=db_connect();

	// Prepare SQL query
	// Select fields
	$sql="SELECT ".$conn->escapeSimple($field_name[0]);
	// Other fields to select
	if ($l_field_name>=1) {
		// Loop on fields
		for ($i=1; $i<$l_field_name; $i++) {
			$sql.=", ".$conn->escapeSimple($field_name[$i]);
		}
	}
	// From table
	$sql.=" FROM ".$conn->escapeSimple($table_name);
	// Start where conditions
	if ($l_where_field_name!=0) {
		$sql.=" WHERE ".$conn->escapeSimple($where_field_name[0]);
		switch ($where_field_comp[0]) {
			case "=":
				// = '...'
				$sql.="= '".$conn->escapeSimple($where_field_value[0])."'";
				break;
			case "%LIKE":
				// LIKE '%...'
				$sql.=" LIKE '%".$conn->escapeSimple($where_field_value[0])."'";
				break;
			case "LIKE%":
				// LIKE '...%'
				$sql.=" LIKE '".$conn->escapeSimple($where_field_value[0])."%'";
				break;
			case "%LIKE%":
				// LIKE '%...%'
				$sql.=" LIKE '%".$conn->escapeSimple($where_field_value[0])."%'";
				break;
			default:
				$errors="Error in comparative operators given";
				return FALSE;
		}
	}
	// Other where conditions
	if ($l_where_field_name>=1) {
		// Loop on conditions
		for ($i=1; $i<$l_where_field_name; $i++) {
			switch ($where_logical[$i-1]) {
				case "AND":
					$sql.=" AND ";
					break;
				case "OR":
					$sql.=" OR ";
					break;
				default:
					$errors="Error in logical operators given";
					return FALSE;
			}
			$sql.=$conn->escapeSimple($where_field_name[$i]);
			switch ($where_field_comp[$i]) {
				case "=":
					// = '...'
					$sql.="= '".$conn->escapeSimple($where_field_value[$i])."'";
					break;
				case "%LIKE":
					// LIKE '%...'
					$sql.=" LIKE '%".$conn->escapeSimple($where_field_value[$i])."'";
					break;
				case "LIKE%":
					// LIKE '...%'
					$sql.=" LIKE '".$conn->escapeSimple($where_field_value[$i])."%'";
					break;
				case "%LIKE%":
					// LIKE '%...%'
					$sql.=" LIKE '%".$conn->escapeSimple($where_field_value[$i])."%'";
					break;
				default:
					$errors="Error in comparative operators given";
					return FALSE;
			}
		}
	}
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result=$conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Get result
	$field_value=array();
	// Number of results
	$j=0;
	while($rs = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
		// Initialize variable
		$field_value[$j]=array();
		
		// Loop on fields
		for ($i=0; $i<$l_field_name; $i++) {
			$field_value[$j][$i]=$rs[$field_name[$i]];
		}
		
		// Prepare to reloop
		$j++;
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to count the number of rows corresponding to a 'SELECT' instruction from a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table where the selection is to be made
* 			- $field_name: an array containing field names of the table serving as reference
* 			- $field_value: an array containing field values serving as reference
* Output:	- $num: the number of rows selected
* 			- $errors: an error message
******************************************************************************************************/
function db_count($table_name, $field_name, $field_value, &$num, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_field_value=count($field_value);
	if ($l_field_name!=$l_field_value) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Connect to database
	$conn=db_connect();

	// Prepare SQL query
	$sql="SELECT * FROM ".$conn->escapeSimple($table_name);
	// Start where conditions
	if ($l_field_name!=0) {
		$sql.=" WHERE ".$conn->escapeSimple($field_name[0])."='".$conn->escapeSimple($field_value[0])."'";
	}
	// Other where conditions
	if ($l_field_name>=1) {
		// Loop on conditions
		for ($i=1; $i<$l_field_name; $i++) {
			$sql.=" AND ".$conn->escapeSimple($field_name[$i])."='".$conn->escapeSimple($field_value[$i])."'";
		}
	}
	$sql.=" LIMIT 2";
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result=$conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Get number of results
	$num=$result->numRows();
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to delete a row of data from a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table from which the row of data will be deleted
* 			- $field_name: an array containing field names of the table for the 'where' conditions
* 			- $field_value: an array containing field values for the 'where' conditions
* 			- $logical: an array containing logical connectors between where conditions (AND, OR)
*			- $simul: a boolean to know whether data shall really be deleted
* Output:	- $errors: an error message
******************************************************************************************************/
function db_delete($table_name, $field_name, $field_value, $logical, $simul, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";

	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_field_value=count($field_value);
	$l_logical=count($logical);
	if ($l_field_name==0 || $l_field_name!=$l_field_value || $l_field_name!=$l_logical+1) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Connect to database
	$conn=db_connect();
	
	// Prepare SQL query
	// DELETE FROM table
	$sql="DELETE FROM ".$conn->escapeSimple($table_name);
	// First field
	$sql.=" WHERE ".$conn->escapeSimple($field_name[0])."='".$conn->escapeSimple($field_value[0])."'";
	// Other fields
	for ($i=1; $i<$l_field_name; $i++) {
		switch ($logical[$i-1]) {
			case "AND":
				$sql.=" AND ";
				break;
			case "OR":
				$sql.=" OR ";
				break;
			default:
				$errors="Error in logical operators given";
				return FALSE;
		}
		$sql.=$conn->escapeSimple($field_name[$i])."='".$conn->escapeSimple($field_value[$i])."'";
	}

	if ($simul) {
		// Disconnect
		$conn->disconnect();
		
		return TRUE;
	}
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result = $conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to delete a row of data from a table in the database
* Returns FALSE if an error occurred, TRUE otherwise
* Input:	- $table_name: the name of the table from which the row of data will be deleted
* 			- $field_name: an array containing field names of the table for the 'where' conditions
* 			- $field_value: an array containing field values for the 'where' conditions
*			- $simul: a boolean to know whether data shall really be deleted (TRUE considered as test)
* Output:	- $delete_id: the primary key (ID) of the deleted row
* 			- $errors: an error message
******************************************************************************************************/
function db_delete_id($table_name, $field_name, $field_value, $simul, &$delete_id, &$errors) {
	require_once("php/MYDB.php");
	
	// Initialize error message
	$errors="";
	
	// Check that table_name is not empty
	if ($table_name=="") {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Check length of tables given in parameters
	$l_field_name=count($field_name);
	$l_field_value=count($field_value);
	if ($l_field_name==0 || $l_field_name!=$l_field_value) {
		$errors="Error in the parameters given";
		return FALSE;
	}
	
	// Select ID that will be deleted
	$select_field_name=array();
	$select_field_value=array();
	$select_field_name[0]=$table_name."_id";
	if (!db_select($table_name, $select_field_name, $field_name, $field_value, $select_field_value, $select_error)) {
		$errors=$select_error." // db_delete_id() - db_select()";
		return FALSE;
	}
	$delete_id=$select_field_value[0][0];
	
	// Connect to database
	$conn=db_connect();
	
	// Prepare SQL query
	// DELETE FROM table
	$sql="DELETE FROM ".$conn->escapeSimple($table_name);
	// First field
	$sql.=" WHERE ".$conn->escapeSimple($field_name[0])." = '".$conn->escapeSimple($field_value[0])."'";
	// Other fields
	for ($i=1; $i<$l_field_name; $i++) {
		$sql.=" AND ".$conn->escapeSimple($field_name[$i])."='".$conn->escapeSimple($field_value[$i])."'";
	}
	
	if ($simul) {
		// Disconnect
		$conn->disconnect();
		
		return TRUE;
	}
	
	// Process SQL query
	$sql=mb_convert_encoding($sql,"ISO-8859-1","UTF-8");
	$result = $conn->query($sql);
	
	// If there was an error, stop and display message
	if(@DB::isError($result)){
		$errors=$result->getMessage()." | SQL = ".$sql;
		return FALSE;
	}
	
	// Disconnect
	$conn->disconnect();
	
	return TRUE;
}

/******************************************************************************************************
* Function to get the cc_id for a given cc_code
* Returns cc_id
* Input:	- $cc_code: the cc_code to look for
******************************************************************************************************/
function db_get_cc_id($cc_code) {
	
	// If code is empty
	if (empty($cc_code)) {
		return NULL;
	}
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT cc_id FROM cc WHERE cc_code='".mysql_real_escape_string($cc_code)."' OR cc_code2='".mysql_real_escape_string($cc_code)."'";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);
	return $row['cc_id'];
}

/******************************************************************************************************
* Function to get the vd_id for a given vd_code
* Returns vd_id
* Input:	- $vd_code: the vd_code to look for
******************************************************************************************************/
function db_get_vd_id($vd_code) {
	
	// If code is empty
	if (empty($vd_code)) {
		return NULL;
	}
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT vd_id FROM vd_inf WHERE vd_inf_cavw='".mysql_real_escape_string($vd_code)."'";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$row=mysql_fetch_array($result);
	return $row['vd_id'];
}

/******************************************************************************************************
* Function to get the eruption information for a given ed_code
* Returns ed_id
* Input:	- $ed_code: the ed_code to look for
******************************************************************************************************/
function db_get_eruption($ed_code, $owners) {
	
	// If code is empty
	if (empty($ed_code) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT ed_id, ed_stime, ed_stime_bc, ed_etime, ed_etime_bc, vd_id, cc_id, cc_id2, cc_id3 FROM ed WHERE ed_code='".mysql_real_escape_string($ed_code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=mysql_fetch_array($result);
	
	return $results;
}

/******************************************************************************************************
* Function to get the eruption information for a given ed_code
* Returns an array containing the field values for the last row found
* Input:	- $ed_phs_code: the ed_phs_code to look for
******************************************************************************************************/
function db_get_phase($ed_phs_code, $owners) {
	
	// If code is empty
	if (empty($ed_phs_code) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	// Create SQL query
	$sql="SELECT ed_phs_id, ed_id, cc_id, cc_id2, cc_id3 FROM ed_phs WHERE ed_phs_code='".mysql_real_escape_string($ed_phs_code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=mysql_fetch_array($result);
	
	return $results;
}

/******************************************************************************************************
* Function to get the eruption information for a given ed_code
* Returns an array containing the field values for the last row found
* Input:	- $target_code: the code to look for
******************************************************************************************************/
function db_get_data($key, $code, $owners) {
	
	// If code is empty
	if (empty($key) || empty($code) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	$table=mysql_real_escape_string($key);
	
	// Create SQL query
	$sql="SELECT ".$table."_id, cc_id, cc_id2, cc_id3 FROM ".$table." WHERE ".$table."_code='".mysql_real_escape_string($code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$results=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$result=mysql_fetch_array($results);
	
	return $result;
}

/******************************************************************************************************
* Function to get the eruption information for a given ed_code
* Returns an array containing the field values for the last row found
* Input:	- $target_code: the code to look for
******************************************************************************************************/
function db_get_ms($target_code, $target_key, $parent_key, $owners) {
	
	// If code is empty
	if (empty($target_code) || empty($target_key) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	$table=mysql_real_escape_string($target_key);
	
	// Create SQL query
	$sql="SELECT ".$table."_id, ";
	if (!empty($parent_key)) {
		$sql.=mysql_real_escape_string($parent_key)."_id, ";
	}
	$sql.=$table."_stime, ".$table."_etime, cc_id, cc_id2, cc_id3 FROM ".$table." WHERE ".$table."_code='".mysql_real_escape_string($target_code)."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=array();
	while ($row=mysql_fetch_array($result)) {
		array_push($results, $row);
	}
	
	return $results;
}

/******************************************************************************************************
* Function to get the eruption information for a given ed_code
* Returns an array containing the field values for the last row found
* Input:	- $target_code: the code to look for
******************************************************************************************************/
function db_get_cn($target_code, $target_key, $parent_key, $owners) {
	
	// If code is empty
	if (empty($target_code) || empty($target_key) || empty($owners)) {
		return NULL;
	}
	
	// Connect to DB
	require "php/include/db_connect.php";
	
	$type=NULL;
	switch ($target_key) {
		case "dn":
			$type="Deformation";
			break;
		case "gn":
			$type="Gas";
			break;
		case "hn":
			$type="Hydrologic";
			break;
		case "fn":
			$type="Fields";
			break;
		case "tn":
			$type="Thermal";
			break;
		case "mn":                   
			$type="Meteo";
			break;			
	}
	
	// Create SQL query
	$sql="SELECT cn_id, ";
	if (!empty($parent_key)) {
		$sql.=mysql_real_escape_string($parent_key)."_id, ";
	}
	$sql.="cn_stime, cn_etime, cc_id, cc_id2, cc_id3 FROM cn WHERE cn_code='".mysql_real_escape_string($target_code)."' AND cn_type='".$type."' AND (";
	
	// Loop on owners
	$first=TRUE;
	foreach ($owners as $owner) {
		if (!$first) {
			$sql.=" OR ";
		}
		$sql.="cc_id='".mysql_real_escape_string($owner['id'])."' OR cc_id2='".mysql_real_escape_string($owner['id'])."' OR cc_id3='".mysql_real_escape_string($owner['id'])."'";
		$first=FALSE;
	}
	
	// Finish SQL query
	$sql.=")";
	
	// Query DB
	$result=mysql_query($sql) or die(mysql_error());
	
	// Get result
	$results=array();
	while ($row=mysql_fetch_array($result)) {
		array_push($results, $row);
	}
	
	return $results;
}

?>