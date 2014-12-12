<?php
session_start();
include "commonmonitoring_ng.php";
include "model/common_model_ng.php";
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])){       // can't proceed without log in
	header('Location: '.$url_root.'login_required.php');
}

if(!isset($_FILES['fname'])) {  // can't proceed when html form can't post anything if exceed 2MB (OR) directly come 
	$fileerrors = "File submission fails. Please take note the maxmium file upload size is 2MB.<br/> Please try again!";		
 	include "showxmlresult_ng.php";
	exit();
}

if(isset($_POST['observ']))
	$observ=$_POST['observ'];

if(isset($_POST['vol2']))
	$vol=$_POST['vol2'];

if(isset($_POST['conv']))
	$conv=$_POST['conv'];

if(isset($_POST['network']))
	$network =$_POST['network'];

if(isset($_POST['station']))
	$station = $_POST['station'];


if(isset($_POST['instrument']))
	$instrument = $_POST['instrument'];
	
if(isset($_POST['airplane'])) 
	$airplane = $_POST['airplane'];

if(isset($_POST['satellite']))    
	$satellite = $_POST['satellite'];
	
	
$volcode=getvolcode($vol);        // Get cavw from DB 


if($conv == 'SeismicStation' || $conv == 'DeformationStation' || $conv == 'GasStation' ||   
$conv == 'HydrologicStation' ||$conv == 'ThermalStation' || $conv == 'FieldsStation' || $conv == 'MeteoStation'){
	
	$network=getnetworkcode($network,$conv);  // Get network code from cn / sn table
}

else if($conv == 'SeismicInstrument' || $conv == 'DeformationInstrument_General' || 
$conv == 'DeformationInstrument_Tilt/Strain' || $conv == 'HydrologicInstrument' || $conv == 'FieldsInstrument' || $conv == 'MeteoInstrument'){
	
	$station=getstationcode($station,$conv);  // Get station code from DB
}
else if( $conv == 'GasInstrument' || $conv == 'ThermalInstrument'){  

	if(isset($airplane)){
		$airplane = getcscode($airplane);        //Get airplane code from cs table
	}else if(isset($satellite)){
		$satellite = getcscode($satellite);      //Get satellite code from cs table
	}else{
		$station=getstationcode($station,$conv);  // Get station code from DB
	}
}
else if($conv == 'SeismicComponent'){
	$instru=getinstrcode($instrument,$conv);// Get instr code from si table bcoz only seismic component xml need
	$instrument=$instru['si_code'];
	$stime=$instru['si_stime'];
	$etime=$instru['si_etime'];
}

		
$filename=$_FILES['fname']['name'];
$filesize=$_FILES['fname']['size'];

$infile="../../../../incoming/to_be_translated/".$filename;       //prepare the name of inputfile

$outputfilepath="../../../../incoming/translated/";              //prepare the directory of output file

$outputfilename=substr($filename,0,-4).".xml"; 
$outfile=$outputfilepath.$outputfilename;

$fileextension=substr($filename,-3);
		
if($_FILES['fname']['type'] == "" && $filesize == "0") {  
	$fileerrors = " File submission fails. The Maxmium file upload size is 2MB.<br/>File size you tried to upload is too  big/empty. Please try again!";
	include "showxmlresult_ng.php";
	exit();
}else if($fileextension != 'csv'){  //Check csv file
	$fileerrors = "File submission fails.<br/> The extension of file you tried to upload is not csv format. Please try again!";
	include "showxmlresult_ng.php";
	exit();
  
}else if($filesize == 0){
	$fileerrors = "File submission fails. <br/> File you tried to upload is empty. Please try again!";
	include "showxmlresult_ng.php";
	exit();
}else if($filesize<= 2000000){    //Move "temp" to inputfile name	
	if (!move_uploaded_file($_FILES['fname']['tmp_name'],$infile)){
		$fileerrors = "File submission fails.  Please try again!";
		include "showxmlresult_ng.php";
		exit();
	}    		  
}


$findtable = array("SeismicNetwork" => "sn", "SeismicStation" => "ss", "SeismicInstrument" => "si", "SeismicComponent" => "si_cmp", "DeformationNetwork" => "cn", "GasNetwork" => "cn", "HydrologicNetwork" => "cn", "ThermalNetwork" => "cn", "FieldsNetwork" => "cn", "DeformationStation" => "ds", "DeformationInstrument_General" => "di_gen", "DeformationInstrument_Tilt/Strain" => "di_tlt", "HydrologicStation" => "hs", "HydrologicInstrument" => "hi", "GasStation" => "gs", "GasInstrument" => "gi", "ThermalStation" => "ts", "ThermalInstrument" => "ti", "FieldsStation" => "fs","FieldsInstrument" => "fi", "MeteoNetwork" => "cn", "MeteoStation" => "ms", "MeteoInstrument" => "mi", "Airplane" => "cs", "Satellite" => "cs");	

$datatype = $findtable[$conv];
$monitorcode=$datatype."_code";          // Prepare to get like cn_code
$monitorpubdate=$datatype."_pubdate";    // Prepare to get like cn_pubdate


$handle=fopen($infile,"r");            // Read CSV Header
$csvheader=fgetcsv($handle);

$newfileheader=getxmlheader($datatype);     //Read xml header
$xmlheader=array_keys($newfileheader);


$xmlheadersize=sizeof($xmlheader);
$csvheadersize=sizeof($csvheader);


if($csvheadersize < $xmlheadersize){    // Double check csv file again. 
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
$di_gen_index=array_search('di_gen_type',$xmlheader);
$di_tlt_index=array_search('di_tlt_type',$xmlheader);
		
$codeindex = array_search($monitorcode,$csvheader);		  
$pubindex = array_search($monitorpubdate,$csvheader);
$owner2index = array_search('cc_id2',$csvheader);
$owner3index = array_search('cc_id3',$csvheader);
$cscodeindex = array_search('cs_id',$csvheader);


$xmlbody = "";
$count=0;

$ordersize=sizeof($order);

while(!feof($handle)){
	$orgline=fgetcsv($handle);
	
	if($orgline == ""){     // Try to remove empty last row from csv file if file has empty row at EOF
		break;
	}	
	
	$count++;             // Get total csv rows without csv header and minus empty last row if it is.
	
	for($i=0;$i<$ordersize;$i++){      // Get same order as xml 
		$sortedline[$i] =  $orgline[$order[$i]];
	}
	
	
	if($conv == 'DeformationInstrument_General'){
		if($_POST['digen_select'] != "OtherTypes"){ // To put di_gen type from post value 
			$sortedline[$di_gen_index]=$_POST['digen_select'];
		}
	}  
	
	
	if($conv == 'DeformationInstrument_Tilt/Strain'){
		$sortedline[$di_tlt_index]=$_POST['ditltstrain_select'];
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
	

	getxml_head_foot($conv,$outputxmlhead,$outputxmlfooter);

	
	if($conv == 'SeismicNetwork' || $conv == 'DeformationNetwork' || $conv == 'GasNetwork' || $conv == 'HydrologicNetwork' || $conv == 'ThermalNetwork' || $conv == 'FieldsNetwork' || $conv == 'MeteoNetwork'){
	
		$r	= "\n\t<$conv code=\"$code\" owner1=\"$observ\"$owner2$owner3$pubdate>";
		$r .="\n\t\t<Volcanoes>";
		$r .="\n\t\t\t<volcanoCode>$volcode</volcanoCode>";
		$r .="\n\t\t</Volcanoes>\n";
	
		$r	= convert_xml($r,$newfileheader,$sortedline,$xmlheader);  // convert to xml
	
		$r .= "\t</$conv>";
	
	}
	else if($conv == 'SeismicStation' || $conv == 'DeformationStation' || $conv == 'GasStation' || $conv == 'HydrologicStation' || $conv == 'ThermalStation' || $conv == 'FieldsStation' || $conv == 'MeteoStation'){
	
		
		$r	= "\n\t<$conv code=\"$code\" network=\"$network\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
		
		$r	= convert_xml($r,$newfileheader,$sortedline,$xmlheader);  // convert to xml

		$r .= "\t</$conv>";
	}
	else if($conv == 'SeismicInstrument' || $conv == 'DeformationInstrument_General' || $conv == 'DeformationInstrument_Tilt/Strain' || $conv =='GasInstrument' || $conv == 'HydrologicInstrument' || $conv == 'ThermalInstrument' || $conv == 'FieldsInstrument' || $conv == 'MeteoInstrument' ){	
	
		
		if($conv =='GasInstrument' || $conv =='ThermalInstrument') {
			if(isset($satellite)){
				$r= "\n\t<$conv code=\"$code\" satellite=\"$satellite\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
			}else if(isset($airplane)){
				$r= "\n\t<$conv code=\"$code\" airplane=\"$airplane\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
			}else{
				$r= "\n\t<$conv code=\"$code\" station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
			}
		}else{
			if($conv == 'DeformationInstrument_General'){			
				$r= "\n\t<DeformationInstrument code=\"$code\" station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
			}else if($conv == 'DeformationInstrument_Tilt/Strain'){
				$r= "\n\t<TiltStrainInstrument code=\"$code\" station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
			}else{ 
				$r= "\n\t<$conv code=\"$code\" station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
			}
				
		}

			$r	=convert_xml($r,$newfileheader,$sortedline,$xmlheader);  // convert to xml
		
		if($conv == 'DeformationInstrument_General'){			
			$r .= "\t</DeformationInstrument>";
		}else if($conv == 'DeformationInstrument_Tilt/Strain'){
			$r .= "\t</TiltStrainInstrument>";
		}else{ 
			$r .= "\t</$conv>";
		}
		
	}	
	else if($conv == 'SeismicComponent'){
		
		$r	= "\n\t<SeismicComponent code=\"$code\" instrument=\"$instrument\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
		
		$r	=convert_xml($r,$newfileheader,$sortedline,$xmlheader);  // convert to xml

		$r  .="\t\t<startTime>$stime</startTime>";
		$r .="\n\t\t<endTime>$etime</endTime>";
		$r .= "\n\t</SeismicComponent>";
				
		
	}else if($conv == 'Airplane' || $conv == 'Satellite'){
	
		$r	= "\n\t<$conv code=\"$code\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";
	
		$r	= convert_xml($r,$newfileheader,$sortedline,$xmlheader);  // convert to xml
	
		$r .= "\t</$conv>";

	}
	
	$xmlbody .=$r;	
		
}	
	fclose($handle);
	
	$fullxml=$outputxmlhead.$xmlbody.$outputxmlfooter;
	
	// Write XML to file
	$outhandle = fopen($outfile, 'w');
	fwrite($outhandle, $fullxml);
	fclose($outhandle);
	
	//To distinguish whether a,b,c on line '143' & '168' in showxmlresult_ng.php  coz added additional folder for option 'c'
	$option="a/b";                        
	
	include "showxmlresult_ng.php";      //Show every results here...        

?>