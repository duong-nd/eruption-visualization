<?php
function date2digit($date,$sep="/"){
	$d=explode($sep, $date);
	$dd = $d[0]; if(strlen($dd)==1) $dd="0".$dd;
	$mo = $d[1]; if(strlen($mo)==1) $mo="0".$mo;
	$yy = $d[2];
	if(strlen($yy)==2) {
		if($yy>30) {$yy="19".$yy;}
		else {$yy="20".$yy;}
	} 
	$date2=$dd."/".$mo."/".$yy;
	return $date2;
}

function date2digitymd($date,$sep="/"){
	$d=explode($sep, $date);
	$yy = $d[0];
	$mo = $d[1]; if(strlen($mo)==1) $mo="0".$mo;
	$dd = $d[2]; if(strlen($dd)==1) $dd="0".$dd;
	if(strlen($yy)==2) {
		if($yy>30) {$yy="19".$yy;}
		else {$yy="20".$yy;}
	} 
	$date2=$yy."/".$mo."/".$dd;
	return $date2;
}

function hmsmdy2unix($hh,$mm,$ss,$mo,$dd,$yyyy){
	if(strlen($dd)==1) $dd="0".$dd;
	if(strlen($mo)==1) $mo="0".$mo;
	$timestamp=mktime($hh,$mm,$ss,$mo,$dd,$yyyy);
	return $timestamp;
}

function datetimeToUnix($datetime){
	$date=substr($datetime,0,10);
	$time=substr($datetime,11,8);
	$d=explode("-",$date);
	$t=explode(":", $time);	
	$timestamp=mktime($t[0],$t[1],$t[2],$d[1],$d[0],$d[2]);
	return $timestamp;
}

function datetime2unix($date,$time,$sepd="/",$sept=":"){
	$d=explode($sepd,$date);
	$t=explode($sept, $time);	
	$timestamp=mktime($t[0],$t[1],$t[2],$d[1],$d[0],$d[2]);
	return $timestamp;
}

function unix2datetime($utime){
	$datetime=date('M-d-Y g:m:s',$utime);
	return $datetime;
}

function dmynosep2dateslash($date1){
	$d=substr($date1,0,2);
	$m=substr($date1,2,2);
	$y=substr($date1,4,4);
  $date2=$d."/".$m."/".$y;
	return $date2;
}

function ymdnosep2dateslash($date1){
	$d=substr($date1,6,2);
	$m=substr($date1,4,2);
	$y=substr($date1,0,4);
  $date2=$d."/".$m."/".$y;
	return $date2;
}

function mdynosep2dateslash($date1){
	$d=substr($date1,2,2);
	$m=substr($date1,0,2);
	$y=substr($date1,4,4);
  $date2=$d."/".$m."/".$y;
	return $date2;
}

function datesep2dateslash($date1,$sep="-"){
	$d=explode($sep,$date1);
	$date2=$d[0]."/".$d[1]."/".$d[2];
	return $date2;
}

function datesep2datesep($date1,$sep1="-",$sep2="/"){
	$d=explode($sep1,$date1);
	$date2=$d[0].$sep2.$d[1].$sep2.$d[2];
	return $date2;
}

function dmy2julian($date,$sep="/"){
	$d=explode($sep,$date);
	$jul=gregoriantojd($d[1],$d[0],$d[2]);
	return $jul;
}

function mdy2julian($date1,$sep="/"){
	$d=explode($sep,$date);
	$jul=gregoriantojd($d[0],$d[1],$d[2]);
	return $jul;
}

function ymd2julian($date1,$sep="/"){
	$d=explode($sep,$date);
	$jul=gregoriantojd($d[2],$d[1],$d[0]);
	return $jul;
}

function mdy2dmy($mmddyyyy,$sep="/"){
	$d=explode($sep,$mdy);
	$dmy=$d[1]."/".$d[0]."/".$d[2];
	return $dmy;
}

function dmy2ymd($dmy,$sep="/"){
	$d=explode($sep,$dmy);
	$ymd=$d[2].$sep.$d[1].$sep.$d[0];
	return $ymd;
}

function ymd2dmy($ymd,$sep="/"){
	$d=explode($sep,$ymd);
	$dmy=$d[2]."/".$d[1]."/".$d[0];
	return $ddmmyyyy;
}

?>
