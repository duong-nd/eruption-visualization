<?php
$servpath=".";
require_once($servpath."/f2genfunc/func_xmlparse.php"); // class xml parser 
require_once($servpath."/f2genfunc/funcgen_printarray.php"); 

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


function getxml_head_foot($conv,&$header,&$footer){

if($conv == 'SeismicNetwork' || $conv == 'DeformationNetwork' || $conv == 'GasNetwork' || $conv == 'HydrologicNetwork' || $conv == 'ThermalNetwork' || $conv == 'FieldsNetwork' || $conv == 'MeteoNetwork' || $conv == 'Airplane' || $conv == 'Satellite'){

$header = <<<HTMLBLOCK
<?xml version="1.0" encoding="UTF-8" ?> 
<wovoml xmlns="http://www.wovodat.org" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
version="1.1.0" xsi:schemaLocation="http://www.wovodat.org/WOVOdatV1.xsd">
<MonitoringSystems>
HTMLBLOCK;

$footer ="\n</MonitoringSystems>";
$footer .="\n</wovoml>";
}
else if($conv == 'SeismicStation' || $conv == 'DeformationStation' || $conv == 'GasStation' || $conv == 'HydrologicStation' || $conv == 'ThermalStation' || $conv == 'FieldsStation' || $conv == 'MeteoStation' || $conv == 'SeismicInstrument' || $conv == 'DeformationInstrument_General' || $conv == 'DeformationInstrument_Tilt/Strain' || $conv =='GasInstrument' || $conv == 'HydrologicInstrument' || $conv == 'ThermalInstrument' || $conv == 'FieldsInstrument' || $conv == 'MeteoInstrument' || $conv == 'SeismicComponent'){

	if($conv == 'DeformationInstrument_General'){
		$parent= "DeformationInstruments";
		
	}else if($conv == 'DeformationInstrument_Tilt/Strain'){
		$parent= "DeformationInstruments";
		
	}else if($conv == 'SeismicComponent'){
		$parent="SeismicComponents";
	}else{
		$parent=$conv."s";
	}
	
	
$header = <<<HTMLBLOCK
<?xml version="1.0" encoding="UTF-8" ?>
<wovoml xmlns="http://www.wovodat.org" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
version="1.1.0" xsi:schemaLocation="http://www.wovodat.org/WOVOdatV1.xsd">
<MonitoringSystems>
<$parent>
HTMLBLOCK;


$footer  ="\n</$parent>";
$footer .="\n</MonitoringSystems>";
$footer .="\n</wovoml>";

}

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
?>