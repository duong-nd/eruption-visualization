<?php
function print_ary($ary,$l){
	$space="___";
	$tag=array();
	$ik=0;
	$lold=0;
	foreach($ary as $k=>$v){
		$ik++;
		if($ik>1){
			if ($l==$lold)	echo ("<BR>\n");
		}
		for ($tb=1; $tb<=$l-1; $tb++) echo ($space."\t");
	    	echo ("[".$k."]");
		$tag[$l]=$k;
		if(is_array($v)){
			$l ++; 
			echo ("<BR>\n");
   		    	print_ary($v,$l);
			$l --;
			for ($tb=1; $tb<=$l-1; $tb++) echo ($space."\t");
		    	echo ("[/".$tag[$l]."]"."<BR>\n");
		        $lold=$l;
		}else{			
//		    echo ("<   ".$v."   >");
		    echo ($v);
   		    echo ("[/".$k."]"."<BR>\n");
		}
	}
}
?>

