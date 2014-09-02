<?php
function obscsv_2xml($filename,$filetag,$cc_id){

ini_set("memory_limit","256M"); 		// used for a very huge data file; memory alloc
require("funcgen_printarray.php"); 		// function ==> "print_ary($array,n)"
require("funcgen_array2xml.php"); 		// func => "array_to_xml ($array,'header') generic
require("funcgen_CsvImportertag.php"); 		// class CsvImportertag
require("func_CsvImportertaupo.php"); 		// class CsvImportertaupo
require("func_remnullfield.php"); 		// func => "removenullfield" 
require("func_timeconvert_nz.php"); 		// func => "time_conv($array)" specific for taupo
include('func_xmlparse.php');

$TIME = date("Y-m-d H:i:s");
print_r ("Time : $TIME <BR>\n");
$filexml = './taupo_01out.xml';
//---------------------------need translation list observatory field - wovoml field
//$filetag ="./listobsfield2ml.xml";
$params=xml2ary_1(file_get_contents($filetag)); // from myscr.php
$obstag=$params;
//---------------------------read observatory file
//$filename='taupo_01_half.csv';
$impor = new CsvImportertaupo($filename,false,",");
while($data = $impor->get()){
	$ary=$data;
	}
$ary=removenullfield($ary,1); 	//remove unused field
$etime=time_conv($ary);		//combine time_code to Datatime

$i=0;
$oriset=0;
foreach($ary as $k =>$v){     // level=1
	$ndata ++;
	$i++;
	if(is_array($v)){
		foreach($v as $k1 =>$v1){	// level=2
		   if($oriset ==1){ // remove unused field; after time code conversion
			if($k1=="ORI_MONTH") unset($ary[$k][$k1]);
			if($k1=="ORI_DAY") unset($ary[$k][$k1]);
			if($k1=="ORI_HOUR") unset($ary[$k][$k1]);
			if($k1=="ORI_MINUTE") unset($ary[$k][$k1]);
			if($k1=="ORI_SECOND") unset($ary[$k][$k1]);
		   }
		   if($k1=="ORI_YEAR"){
			$ary[$k][$k1]=$etime[$i];
			$oriset=1;
		   }	
		}
	}
}
//------------------------------tag replacement of observatory tag with wovoml tag
foreach($obstag as $k1 => $v1){
   if(is_array($v1)){
      foreach($v1 as $k2 => $v2){
	foreach($ary as $q1 => $w1){
		if(is_array($w1)){
			foreach($w1 as $q2 => $w2){
				if($q2==$k2) {
				$new_ary[$q1][$v2]=$w2;}
			}
		}else {
			if($q1==$k2) {
				$new_ary[$v2]=$w1;}			
		}
	}
      }
   }else{
	foreach($ary as $q1 => $w1){
		if(is_array($w1)){
			foreach($w1 as $q2 => $w2){
				if($q2==$k1) {
				$new_ary[$q1][$v1]=$w2;}
			}
		}else {
			if($q1==$k1) {
				$new_ary[$v1]=$w1;}			
		}
	}
   }	
}
//-------------------------------- array pre-conditioning
unset($ary);
$ary["Data"]["Seismic"]=$new_ary;
unset($new_ary);
//print_ary ($ary,1);


$handle=fopen($filexml,"w");
//-------------------------
	$head='';
	$volcode='Taupo';
	$obscode='gns';
	$pubdate='2010-07-01 00:00:00';

      $head .= str_repeat("\t",1).'<LoadingInfo>'."\n";
      $head .= str_repeat("\t",2).'<!--General volcano code -->'."\n";
      $head .= str_repeat("\t",2).'<volcanoCode>'.$volcode.'</volcanoCode>'."\n";
      $head .= str_repeat("\t",2).'<!--General owner code -->'."\n";
      $head .= str_repeat("\t",2).'<ownerCode>'.$obscode.'</ownerCode>'."\n";
      $head .= str_repeat("\t",2).'<!--General publish date -->'."\n";
      $head .= str_repeat("\t",2).'<pubDate>'.$pubdate.'</pubDate>'."\n";
      $head .= str_repeat("\t",1).'</LoadingInfo>'."\n";

$xml=array_to_xml($ary,"wovoml version=\"1.0\" xmlns=\"http://www.wovodat.org\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.wovodat.org/WOVOdatV1.xsd\"",$head,1,0);

fwrite($handle,$xml);
fclose($handle);
//----------------------
//print_r ("<BR>\n<BR>\n");
//print_r ("<BR>\n");
//print_r ("$ndata data-set are executed.\n");
//print_r ("<BR>\n<BR>\n");
}
?>

