<?php
function removenullfield($ary,$zero){
foreach($ary as $k1 => $v1){
	if(is_array($v1)){
		foreach($v1 as $k2 => $v2) {
			if($zero==0){
				if($v2 == "" || $v2 == " " || $v2=="0" || is_null($v2)) {
				unset($ary[$k1][$k2]);}
			}
			else{
				if($v2 == "" || $v2 == " " ||  $v2 == "  " || is_null($v2)) {
				unset($ary[$k1][$k2]);}			
			}
		}
	}else{
		if($v1 == "" || $v1 == " " || $v2 == "  " || is_null($v1)) {
			unset($ary[$k1]);
		}
	}
}
return $ary;
}
?>
