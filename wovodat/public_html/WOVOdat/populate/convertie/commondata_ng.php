<?php
$servpath=".";
require_once($servpath."/f2genfunc/func_xmlparse.php"); // class xml parser 
require_once($servpath."/f2genfunc/funcgen_printarray.php"); 

function checkfile($filename,$infilepath){

	$fileinfo['filesize'] = $_FILES[$filename]['size'];
	$fileinfo['error'] = "noerror";

	$fileextension=substr($_FILES[$filename]['name'],-3);

	if($_FILES[$filename]['type'] == "" && $fileinfo['filesize'] == "0") {  
		$fileerrors = " File submission fails. PLease take note the maxmium file upload size is 2MB.<br/>File size you tried to upload is too big/empty. Please try again!";
		$fileinfo['error'] = $fileerrors;
		return $fileinfo;
		
	}else if($fileextension != 'csv'){   //Check csv file
		$fileerrors = "File submission fails.<br/> The extension of file you tried to upload is not csv format. Please try again!";
		$fileinfo['error'] = $fileerrors;
		return $fileinfo;
	  
	}else if($fileinfo['filesize'] == 0){
		$fileerrors = "File submission fails. <br/> File you tried to upload is empty. Please try again!";
		$fileinfo['error'] = $fileerrors;
		return $fileinfo;

	}else if($fileinfo['filesize'] <= 2000000){	
		if(!move_uploaded_file($_FILES[$filename]['tmp_name'],$infilepath.$_FILES[$filename]['name'])){  
			$fileerrors = "File submission fails.  Please try again!";
			$fileinfo['error'] = $fileerrors;
			return $fileinfo;
		}
	}	
	
	$fileinfo['infile'] = $infilepath . $_FILES[$filename]['name'];
	$fileinfo['filename'] = $_FILES[$filename]['name'];
	

	return $fileinfo;
}



function getxmlheader($datatype){

	$filetag="wovodat2wovoml11.xml";
	$datafile=file_get_contents($filetag);
	$params=xml2ary_1($datafile); 
	$tag=$params;

	$table_ini=$datatype; 

	$newfileheader=array();

	foreach($tag as $k => $v){
		if(is_array($v)){
			foreach($v as $k1 => $v1){
				if(is_array($v1)){
					if($k1==$table_ini){
						foreach($v1 as $k2 => $v2){
							$newfileheader[$k2]=$v2;
						}	
					}
				}	
			}	
		}	
	}

return $newfileheader;	
}	


function convert_xml($r,$newfileheader,$sortedline,$xmlheader){
	for ($i = 0; $i < sizeof($newfileheader); $i++){ 
		if($sortedline[$i] != '' && $sortedline[$i] != 'NULL'){
			$r .= "\t\t<{$newfileheader[$xmlheader[$i]]}>";
			$r .= $sortedline[$i];
			$r .= "</{$newfileheader[$xmlheader[$i]]}>\n";
		}
	}
	return $r;	
}


function getxml_head_foot($conv,$xmldataheaderset,$xmldataset,$xmlinitag,&$header,&$footer){	

if($conv=="EventDataFromNetwork" || $conv=="EventDataFromSingleStation" || $conv=="SeismicTremor_Network" || $conv=="SeismicTremor_Station" || $conv == 'SeismicIntervalSwarm_Network' || $conv == "SeismicIntervalSwarm_Station" || $conv == "RepresentativeWaveform" || $conv=="ElectronicTiltData" || $conv == "TiltVectorData" || $conv == "StrainMeterData" || $conv =="EDMData" ||  $conv == "AngleData" || $conv == "GPSData" || $conv == "GPSVectors" || $conv == "LevelingData" ||  $conv=="DirectlySampledGas" || $conv == "SoilEffluxData" || $conv == "PlumeData" || $conv == "HydrologicData" || $conv == "MagneticFieldsData" || $conv == "MagnetorVectorData" || $conv == "ElectricFieldsData" || $conv == "GravityData" || $conv == "GroundBasedThermalData" || $conv == "Insar_satellite_type" || $conv=="ThermalImage and ThermalImageData" || $conv == "ThermalImage_satellite_type" || $conv == "plume_satellite_type" || $conv == "MeteoData"){


$header = <<<HTMLBLOCK
<?xml version="1.0" encoding="UTF-8" ?> 
<wovoml xmlns="http://www.wovodat.org" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
version="1.1.0" xsi:schemaLocation="http://www.wovodat.org/WOVOdatV1.xsd">
<Data>
<$xmldataheaderset>
<$xmldataset>
HTMLBLOCK;

$footer  ="\n</$xmldataset>";
$footer .="\n</$xmldataheaderset>";
$footer .="\n</Data>";
$footer .="\n</wovoml>";

}
else if($conv == "RSAMData" || $conv == "SSAMData"){	

$header = <<<HTMLBLOCK
<?xml version="1.0" encoding="UTF-8" ?> 
<wovoml xmlns="http://www.wovodat.org" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
version="1.1.0" xsi:schemaLocation="http://www.wovodat.org/WOVOdatV1.xsd">
<Data>
<Seismic>
<RSAM-SSAMDataset>
HTMLBLOCK;

$footer  ="\n</$xmldataset>";
$footer .="\n</RSAM-SSAM>";
$footer .="\n</RSAM-SSAMDataset>";
$footer .="\n</Seismic>";
$footer .="\n</Data>";
$footer .="\n</wovoml>";

}

}

function convert_insar_pixel($handle2,&$count2){

	$csvheader2=fgetcsv($handle2);              //Read csv header

	$newfileheader=getxmlheader('dd_srd');     //Read xml header
	$xmlheader=array_keys($newfileheader);

	$xmlheadersize=sizeof($xmlheader);
	$csvheadersize=sizeof($csvheader2);

	if($csvheadersize < $xmlheadersize){        
		$fileerrors = "CSV error in InSAR image pixel. Please Check your CSV again!";
		include "showxmlresult_ng.php";
		exit();
	}
	
	for($i=0;$i<$xmlheadersize;$i++){         //Compare csv and xml Header
		$x=$xmlheader[$i];
		for($j=0;$j<$csvheadersize;$j++){
			if($x == $csvheader2[$j]){
				break;
			}
		}
		$order[$i]=$j;
	}

	$numberindex=array_search('dd_srd_numb',$csvheader2);

	$xmlbody = "";
	$count2=0;

	$r = "\t\t<InSARPixels>"; 

	while(!feof($handle2)){
		$orgline=fgetcsv($handle2);
		
		if($orgline == ""){     // Try to remove empty last row from csv file if file has empty row at EOF
			break;
		}	
		
		$count2++;              // Get total csv rows without csv header and minus empty last row if it is.
		
		for($i=0;$i<$xmlheadersize;$i++){
			$sortedline[$i] =  $orgline[$order[$i]];
		}
			
		$number = $orgline[$numberindex];   // get a insar number
		
		$r .="\n\t\t\t<InSARPixel number=\"$number\">"; 
		for ($i = 0; $i < sizeof($newfileheader); $i++){ 
			if($sortedline[$i] != '' && $sortedline[$i] != 'NULL'){
				$r .= "\n\t\t\t\t<{$newfileheader[$xmlheader[$i]]}>";
				$r .= $sortedline[$i];
				$r .= "</{$newfileheader[$xmlheader[$i]]}>\n";
			}
		}
		$r .="\t\t\t</InSARPixel>";
	}
		
	$r .= "\n\t\t</InSARPixels>"; 
	
	fclose($handle2);

	return $r;
}



function convert_td_pixel($handle2,&$count2){

	$csvheader2=fgetcsv($handle2);      		//Read csv header

	$newfileheader=getxmlheader('td_pix');     //Read xml header
	$xmlheader=array_keys($newfileheader);

	$xmlheadersize=sizeof($xmlheader);
	$csvheadersize=sizeof($csvheader2);

	if($csvheadersize < $xmlheadersize){   
		$fileerrors = "CSV error in your Thermal image pixel. Please Check your CSV again!";
		include "showxmlresult_ng.php";
		exit();
	}	
	
	for($i=0;$i<$xmlheadersize;$i++){         //Compare csv and xml Header
		$x=$xmlheader[$i];
		for($j=0;$j<$csvheadersize;$j++){
			if($x == $csvheader2[$j]){
				break;
			}
		}
		$order[$i]=$j;
	}


	$xmlbody = "";
	$count2=0;
	
	$r = "\t\t<ThermalPixels>"; 

	while(!feof($handle2)){
		$orgline=fgetcsv($handle2);
		
		if($orgline == ""){     // Try to remove empty last row from csv file if file has empty row at EOF
			break;
		}	
		
		$count2++;              // Get total csv rows without csv header and minus empty last row if it is.
		
		for($i=0;$i<$xmlheadersize;$i++){
			$sortedline[$i] =  $orgline[$order[$i]];
		}
			
		$r .="\n\t\t\t<ThermalPixel>\n"; 
		
		for ($i = 0; $i < sizeof($newfileheader); $i++){ 
			if($sortedline[$i] != '' && $sortedline[$i] != 'NULL'){
				$r .= "\t\t\t\t<{$newfileheader[$xmlheader[$i]]}>";
				$r .= $sortedline[$i];
				$r .= "</{$newfileheader[$xmlheader[$i]]}>\n";
			}
		}
		$r .="\t\t\t</ThermalPixel>";
	}

		
	$r .= "\n\t\t</ThermalPixels>"; 
	
	fclose($handle2);

	return $r;
}
?>