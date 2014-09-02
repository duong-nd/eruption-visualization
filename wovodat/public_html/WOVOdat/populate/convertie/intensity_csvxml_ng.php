<?php
session_start();
include "commondata_ng.php";
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])){       // can't proceed without log in
	header('Location: '.$url_root.'login_required.php');
}

if((!isset($_POST['evn_code'])) && (!isset($_POST['filename'])) && (!isset($_POST['observ'])) && (!isset($_POST['vol'])) && (!isset($_POST['filesize'])) ){      
	header('Location:commonconvertdata_ng.php');
}

$conv= "IntensityData";

if(isset($_POST['filename']))
	$filename = $_POST['filename'];
	
if(isset($_POST['observ']))	
	$observ=$_POST['observ'];	

if(isset($_POST['vol']))
	$vol=$_POST['vol'];

if(isset($_POST['filesize']))	
	$filesize=$_POST['filesize'];

if(isset($_POST['intenstiysize'])){
	
	$intenstiysize=$_POST['intenstiysize'];
	
	for($i=0;$i<$intenstiysize;$i++){
	
		$evn_code=$_POST['evn_code'.$i]; // every row has different row names. eg: evn_code0,evn_code1,....
		
		$checking_code=substr($evn_code,-1);  //example of singleevent=12345_type1 & networkevent=1469131_typeHFVQ(LT)
		
		$event_code = strstr($evn_code, '_type', true);
		
		if(is_numeric($checking_code)){
			$eventtype[$i]="singleStationEvent=\"$event_code\"";  
		}else{
			$eventtype[$i]="networkEvent=\"$event_code\"";
		}
	}
}	
 
$infile="../../../../incoming/to_be_translated/".$filename;
$outputfilepath="../../../../incoming/translated/";     //prepare the directory of output file

$outputfilename=substr($filename,0,-4).".xml"; 
$outfile=$outputfilepath.$outputfilename;	

$handle=fopen($infile,"r");            // Read CSV Header
$csvheader=fgetcsv($handle);


$newfileheader=getxmlheader("sd_int");     //Read xml header
$xmlheader=array_keys($newfileheader);


$xmlheadersize=sizeof($xmlheader);
$csvheadersize=sizeof($csvheader);


if($csvheadersize < $xmlheadersize){     // Double check csv file again. 
	$fileerrors = "CSV error. Please Check your CSV again!";
	include "showxmlresult_ng.php";
	exit();
}

for($i=0;$i<$xmlheadersize;$i++){         //Compare csv and xml Header
	$x=$xmlheader[$i];
	for($j=0;$j<$csvheadersize;$j++){
		if($x == $csvheader[$j]){
			break;
		}
	}
	$order[$i]=$j;
}


// Try to get index
$codeindex = array_search("sd_int_code",$csvheader);
$pubindex = array_search("sd_int_pubdate",$csvheader);
$owner2index = array_search('cc_id2',$csvheader);
$owner3index = array_search('cc_id3',$csvheader);


$xmlbody = "";
$count=0;
$ordersize=sizeof($order);

while(!feof($handle)){
	$orgline=fgetcsv($handle);
	
	if($orgline == ""){     // Try to remove empty last row from csv file if file has empty row at EOF
		break;
	}	
	
	$count++;             // Get total csv rows without csv header and minus empty last row if it is.

	for($i=0;$i<$ordersize;$i++){
		$sortedline[$i] =  $orgline[$order[$i]];
	}
	
	// get a code
	$code = $orgline[$codeindex];
	
	//Get Pubdate  
	if($pubindex){
		$pubdate = $orgline[$pubindex];	
		
		if($pubdate != '' && $pubdate != 'NULL'){
			$pubdate =" pubDate=\"$pubdate\"";			
		}else{
			$pubdate ="";
		}
	}else{
		$pubdate ="";
	}
	
	
	//Get owner2
	if($owner2index){
		$owner2 = $orgline[$owner2index];	
		
		if($owner2 != '' && $owner2 != 'NULL'){
			$owner2=" owner2=\"$owner2\"";
		}else{
			$owner2="";
		}
	}else{
		$owner2="";
	}	
	
	//Get owner3
	if($owner3index){
		$owner3 = $orgline[$owner3index];	
		
		if($owner3 != '' && $owner3 != 'NULL'){
			$owner3=" owner3=\"$owner3\"";
		}else{
			$owner3="";
		}
	}else{
		$owner3="";
	}		
	
	
		
	$i=$count-1;
	
	$r	= "\n\t<Intensity code=\"$code\" $eventtype[$i] owner1=\"$observ\"$owner2$owner3$pubdate>\n";
	
	$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
	
	$r .= "\t</Intensity>";
	
	$xmlbody .=$r;	

		
}	
	fclose($handle);
	
$outputxmlhead = <<<HTMLBLOCK
<?xml version="1.0" encoding="UTF-8" ?> 
<wovoml xmlns="http://www.wovodat.org" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
version="1.1.0" xsi:schemaLocation="http://www.wovodat.org/WOVOdatV1.xsd">
<Data>
<Sesimic>
<IntensityDataset>
HTMLBLOCK;

$outputxmlfooter  ="\n</IntensityDataset>";
$outputxmlfooter .="\n</Sesimic>";
$outputxmlfooter .="\n</Data>";
$outputxmlfooter .="\n</wovoml>";


$fullxml=$outputxmlhead.$xmlbody.$outputxmlfooter;

// Write XML to file
$outhandle = fopen($outfile, 'w');
fwrite($outhandle, $fullxml);
fclose($outhandle);

//To distinguish whether a,b,c on line '143' & '168' in showxmlresult_ng.php  coz added additional folder for option 'c'
$option="a/b";

include "showxmlresult_ng.php";      //Show every results here...        

?>