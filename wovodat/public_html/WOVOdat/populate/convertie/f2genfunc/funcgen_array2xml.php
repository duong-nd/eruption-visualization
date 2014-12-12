<?php
function array_to_xml($array, $blockgroup="array",$header="", $level=1, $recur=0) {
  if ($level==1) {
		if($recur==0) {
			$xml = "";
			$xml .= '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n<$blockgroup>\n";
			$xml .= $header;}
	}
  foreach ($array as $key=>$value) {           //  $key = strtolower($key);
		if (is_array($value)) {
			$xml .= str_repeat("\t",$level)."<$key>\n";
			$level +=1;
			$multi_tags = false;
			foreach($value as $key2=>$value2) {
				if (is_array($value2)) {
					$xml .= str_repeat("\t",$level)."<$key2>\n";
					$newlev=$level+1;
					$newrecur=$recur=1;
					$xml .= array_to_xml($value2,"","",$newlev,$newrecur);	//recursive function
					$kclose=explode(" ",$key2);
					$kclos=$kclose[0];
					$xml .= str_repeat("\t",$level)."</$kclos>\n";
					$multi_tags = true;
				}else {
//				if (trim($value2)!='') {
					if (htmlspecialchars($value2)!=$value2) {
						$kclose=explode(" ",$key2);
						$kclos=$kclose[0];
						$xml .= str_repeat("\t",$level).
//					"<$key2><![CDATA[$value2]]>".
						"<$key2>$value2".
						"</$kclos>\n";
					}else {
						$kclose=explode(" ",$key2);
						$kclos=$kclose[0];
						$xml .= str_repeat("\t",$level).
						"<$key2>$value2</$kclos>\n";
					}
					$multi_tags = true;
				}
			}
			if (!$multi_tags and count($value)>0) {
				$xml .= str_repeat("\t",$level)."<$key>\n";
				$newlev=$level+1;
				$newrecur=1;
				$xml .= array_to_xml($value," "," ",$newlev,$newrecur);
				$kclose1=explode(" ",$key);
				$kclos1=$kclose1[0];
				$xml .= str_repeat("\t",$level)."</$kclos1>\n";
			}
			$level -=1;
			$kclose2=explode(" ",$key);
			$kclos2=$kclose2[0];
			$xml .= str_repeat("\t",$level)."</$kclos2>\n";
		}else {
//            if (trim($value)!='') {
			if (htmlspecialchars($value)!=$value) {
				$xml .= str_repeat("\t",$level)."<$key>".
//                            "<![CDATA[$value]]></$key>\n";
				"$value</$key>\n";
			}else {
				$kclose=explode(" ",$key);
				$kclos=$kclose[0];
				$xml .= str_repeat("\t",$level).
				"<$key>$value</$kclos>\n";
			}
		}
	}
	if ($level==1) {
		$simpletag=explode(" ",$blockgroup);
		$simpletg=$simpletag[0];
		$xml .= "</$simpletg>\n";
	}
	return $xml;
}
?>

