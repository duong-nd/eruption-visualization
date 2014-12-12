<?php           
include 'php/include/db_connect.php';

//check whther vd_cavw,vd_inf_cavw are already in database for jquery validation
if(isset($_POST['vd_cavw']) || isset($_POST['vd_inf_cavw'])){
	if(isset($_POST['vd_cavw'])){
		$cavw = trim($_POST['vd_cavw']);
	}
	if(isset($_POST['vd_inf_cavw'])){
		$cavw = trim($_POST['vd_inf_cavw']);
	}

	$chkResult = getcavw($cavw);
	print ("$chkResult");
}

//check whther code are already in database for jquery validation
if(isset($_POST['cc_code']) || isset($_POST['cc_code2']) || isset($_POST['co_code']) || isset($_POST['ip_hyd_code']) || isset($_POST['ip_mag_code']) || isset($_POST['ip_pres_code']) || isset($_POST['ip_sat_code']) || isset($_POST['ip_tec_code'])){

	if(isset($_POST['cc_code'])){
		$code = trim($_POST['cc_code']);
	}else if(isset($_POST['cc_code2'])){
		$code = trim($_POST['cc_code2']);
	}else if(isset($_POST['co_code'])){
		$code = trim($_POST['co_code']);
	}else if(isset($_POST['ip_hyd_code'])){
		$code = trim($_POST['ip_hyd_code']);
	}else if(isset($_POST['ip_mag_code'])){
		$code = trim($_POST['ip_mag_code']);
	}else if(isset($_POST['ip_pres_code'])){
		$code = trim($_POST['ip_pres_code']);
	}else if(isset($_POST['ip_sat_code'])){
		$code = trim($_POST['ip_sat_code']);
	}else if(isset($_POST['ip_tec_code'])){
		$code = trim($_POST['ip_tec_code']);
	}
	
	$chkResult = getCode($code);
	print ("$chkResult");
}

//Get today date and time
function getTodayDate(){
	
	$todayDateTime=date('Y-m-d H:i:s');
	return $todayDateTime;
}

//Set default wovodat end time if the user leaves it blank.
function getEndTime($endTime){

	if($endTime == '' || $endTime == "YYYY-MM-DD HH:MM:SS" ){
		$endTime = "9999-12-31 23:59:59";   
	}

	return $endTime;
}


//Add 2 years to start date if the user leaves it blank.
function getPubDate($pubDate,$startTime){
	
	if($pubDate == '' || $pubDate == "YYYY-MM-DD HH:MM:SS" ){
	
		$datetime=strtotime($startTime);

		$max_pubdate=date('Y-m-d H:i:s', mktime(date('H',$datetime), date('i',$datetime), date('s',$datetime), date('m',$datetime), date('d',$datetime), date('Y',$datetime)+2));
	}
	
	return $max_pubdate;
}

//get volcano list
function getVolList(){
	global $link;

	$data=array();
		
	$sql="select vd_id,vd_name from vd order by vd_name ASC";

	$result = mysql_query($sql, $link);

	while ($row = mysql_fetch_array($result))
		$data[] = $row;
	
	return $data;
}

//get cc_id and cc_obs  
function getCcList(){
	global $link;

	$data=array();
		
	$sql="select cc_id, cc_code ,cc_obs from cc where cc_code NOT REGEXP '^-?[0-9]+$' order by cc_obs ASC "; 

	$result = mysql_query($sql, $link);

	while ($row = mysql_fetch_array($result))
		$data[] = $row;
	
	return $data;
}


//get cb list
function getCbList(){
	global $link;

	$data=array();
		
	$sql="select cb_id,cb_auth,cb_year,cb_title from cb where cb_auth is not null order by cb_auth ASC"; 

	$result = mysql_query($sql, $link);

	while ($row = mysql_fetch_array($result))
		$data[] = $row;
	
	return $data;
}

//check whether vd_inf_cavw is already in database for jquery validation
function getcavw($cavw){
	global $link;

	if(isset($_GET['tableName'])){
		$tableName= $_GET['tableName'];
		
//vd_inf data is part of volcano data. So vd_inf_cavw must exit in vd table first. So check vd_inf_cavw in vd table.
//That's why true/false condition is change in below.	

		if($tableName == 'vd_inf')    
			$tableName = "vd";

		$tableCavw= $tableName."_cavw";
		
		$sql = "select * from $tableName where $tableCavw='$cavw'";

		$result = mysql_query($sql, $link);
		$num_rows= mysql_num_rows($result);
										
		if($_GET['tableName'] == "vd_inf"){
			if ($num_rows == 1)     // if user is found                   
				$found = "true";
			else
				$found = "false";
		}else{
			if ($num_rows == 1)     // if user is found                   
				$found = "false";
			else
				$found = "true";		
		}
		
		return $found;
	}
}



//check whether code is already in database for jquery validation
function getCode($code){
	global $link;

	if(isset($_GET['tableName'])){
		$tableName= $_GET['tableName'];

		$fieldName= $_GET['fieldName'];

		$sql = "select * from $tableName where $fieldName='$code'";

		$result = mysql_query($sql, $link);
		$num_rows= mysql_num_rows($result);
										

		if ($num_rows == 1)     // if user is found                   
			$found = "false";
		else
			$found = "true";		
		
		
		return $found;
	}
}

//insert new row. use it for every table
function insertTable($table_name,$field_name,$field_value){

	global $link;
	
	$fieldNameSize = sizeof($field_name);
	$fieldValueSize = sizeof($field_value);
	
	if($table_name != '' && $fieldNameSize == $fieldValueSize){
	
		$sql = 'insert into '. $table_name .' (' . $field_name[0];

		for($i=1; $i < $fieldNameSize; $i++){	     //get field name
			$sql .= ','. $field_name[$i];
		}

		$sql .= ') values ("'. $field_value[0]. '"';
		
		
		for($i=1; $i < $fieldValueSize; $i++){     // get field value
			if($field_value[$i] != ''){
				$sql .= ',"'. $field_value[$i] .'"';
			}else{
				$sql .= ',"NULL"';
			}	
		}
		
		$sql .= ')';

		$result=mysql_query($sql,$link);
	}	

	return $result;
	mysql_close($link);	
}




?>