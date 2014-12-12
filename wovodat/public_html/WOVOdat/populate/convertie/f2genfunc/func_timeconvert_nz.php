<?php
function time_conv($darray){
$i=0;
foreach($darray as $k1 => $v1){
	$i++;
	if(is_array($v1)){
		foreach($v1 as $k2 => $v2){
			if($k2=='ORI_YEAR') $yy=$v2;
			if($k2=='ORI_MONTH') $mm=$v2;
			if($k2=='ORI_DAY') $dd=$v2;
			if($k2=='ORI_HOUR') $hr=$v2;
			if($k2=='ORI_MINUTE') $mn=trim($v2);
			if($k2=='ORI_SECOND') $ss=trim($v2);
		}
	}
	if($mm<=9){$mm2="0".$mm;}else {$mm2=$mm;}
	if($dd<=9){$dd2="0".$dd;}else {$dd2=$dd;}
	if($hr<=9){$hr2="0".$hr;}else {$hr2=$hr;}
	if($mn<=9){
			$mn2="0".$mn;
			}else {
			$mn2=$mn;
			}
	if($ss<10){
			$ss2="0".$ss;
			}else {
			$ss2=$ss;
			}
	$etime[$i]=$yy."-".$mm2."-".$dd2." ".$hr2.":".$mn2.":".$ss2;
//	echo ('$etime'.$i."==>".$etime[$i]."<BR>\n");
}
return $etime;
}
?>
