<?php
function array_to_xml($array, $blockgroup="array",$header="", $level=1, $recur=0, $levnoattr=0) {
//	ver:May20,2010
// this function converts an array and create the eqivalent xml file
// $array -> the array to convert
// $blockgroup -> header, will appear in the second line of the xml file
// $header -> second header after $blockgroup
// $level -> if =1, create xml file with all opening header; if else !=1, create partial xml
// $recur -> if =0, create header in the parent level not in the recursive level
// $levnoattr -> =0, :normal, attribute included in the xml if reasonable
// 				=-1, all attribute removed in the xml
//					=1 or 2,3,4,..., only attribute at certain level is removed
// this function replaces the older funcgen_array2xml.php (w/no option for $levnoattr)v.19052010
 
	if ($level==1) {
		if($recur==0) {
			$xml = '';
			$xml .= '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n<$blockgroup>\n";
			$xml .= $header;}}
	foreach ($array as $key=>$value) {
     	if (is_array($value)) {
			if(($level==$levnoattr && $levnoattr>0) || $levnoattr==-1){ 
				$kcloss=explode(" ",trim($key));$kclosss=$kcloss[0];
				$xml .= str_repeat("\t",$level)."<$kclosss>\n";
			}else{
				$xml .= str_repeat("\t",$level)."<$key>\n";}
	  		$level +=1; $multi_tags = false;
         foreach($value as $key2=>$value2) {
           	if (is_array($value2)) {		// still an array => go deeper level
					$kclose=explode(" ",$key2);
					$kclos=$kclose[0];
//             	$xml .= str_repeat("\t",$level)."<$key2>\n";   //tab space 
             	$xml .= str_repeat("\t",$level)."<$kclos>\n";   //tab space 
	    			$newlev=$level+1;
	    			$newrecur=$recur=1;
               $xml .= array_to_xml($value2,"","",$newlev,$newrecur,$levnoattr);	//recursive function
               $xml .= str_repeat("\t",$level)."</$kclos>\n";
               $multi_tags = true;
				}else{								// no more array => write simple xml 
               if (htmlspecialchars($value2)!=$value2) {
                 	$xml .= str_repeat("\t",$level).
                  "<$key2>$value2"."</$key2>\n";
               }else{
						$kclo=explode(" ",$key2);$kclot=$kclo[0]; // remove atribute
                 	$xml .= str_repeat("\t",$level).
						"<$kclot>$value2"."</$kclot>\n";}
              	$multi_tags = true;
        		}
         }
         if (!$multi_tags and count($value)>0) {
           	$xml .= str_repeat("\t",$level)."<$key>\n";
				$newlev=$level+1;
				$newrecur=1;
        		$xml .= array_to_xml($value," "," ",$newlev,$newrecur,$levnoattr);
				$kclose1=explode(" ",$key);
				$kclos1=$kclose1[0];
        		$xml .= str_repeat("\t",$level)."</$kclos1>\n";}
    		$level -=1;
			$kclose2=explode(" ",$key);
			$kclos2=$kclose2[0];
         $xml .= str_repeat("\t",$level)."</$kclos2>\n";
		}else{
        	if (htmlspecialchars($value)!=$value) {
        		$xml .= str_repeat("\t",$level)."<$key>".
            "$value</$key>\n";
     		}else{
  				$xml .= str_repeat("\t",$level).
            "<$key>$value</$key>\n";}
		}
	}
	if ($level==1) {
		$simpletag=explode(" ",$blockgroup);
		$simpletg=$simpletag[0];
     	$xml .= "</$simpletg>\n";}
  	return $xml;
}
?>

