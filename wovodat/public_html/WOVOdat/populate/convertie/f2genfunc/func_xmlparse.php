<?php
/*
	Working with XML. Usage: 
	$xml=xml2ary(file_get_contents('1.xml'));
	$link=&$xml['ddd']['_c'];
	$link['twomore']=$link['onemore'];
	// ins2ary(); // dot not insert a link, and arrays with links inside!
	echo ary2xml($xml);
    $xml_parser = xml_parser_create();
    xml_parser_set_option($xml_parser,XML_OPTION_SKIP_WHITE,1);
*/
//================================================
function xml2ary_1(&$string) {// from myscr
    $parser = xml_parser_create();
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
    xml_parse_into_struct($parser, $string, $vals, $index);
    xml_parser_free($parser);
    $mnary=array();
    $ary=&$mnary;
    $k1='xs:schema';
    $tag1=0;
    foreach ($vals as $r) {
        $t=$r['tag'];
	if($tag1==0) {
		$firsttag=$t;
		}
	$tag1=1;
        if (($r['type']=='open')||($r['type']=='complete')) {
            if (isset($ary[$t])) {
                if (isset($ary[$t][0])) {
			$ary[$t][]=array(); 
		   }
		   else {$ary[$t]=array($ary[$t], array());}
                $cv=&$ary[$t][count($ary[$t])-1];
            } 
	    else {$cv=&$ary[$t];}
            if (isset($r['attributes'])) {
		foreach ($r['attributes'] as $k=>$v) {
 		$cv[$k]=$v; // changed from $cv['_a'][$k]=$v;
		}
	    }
            if ($r['type']=='open') {// if open
              $cv=array();
              $cv['_p']=&$ary;
              $ary=&$cv;
	    }elseif ($r['type']=='complete') {// if complete
              if ($firsttag==$k1){// for xml schema xsd file
		$cv['_v']=(isset($r['value']) ? $r['value'] : '');
		}
		else{ // for xml data file
           	$cv=(isset($r['value']) ? $r['value'] : '');
		}
	    }
        } 
	elseif ($r['type']=='close'){
            $ary=&$ary['_p'];
        }
       }
   _del_p($mnary);
    return $mnary;
}
// _Internal: Remove recursion in result array
function _del_p(&$ary) {
    foreach ($ary as $k=>$v) {
       if ($k==='_p') unset($ary[$k]);
//       if ($k==='_v') unset($ary[$k]);
        elseif (is_array($ary[$k])) _del_p($ary[$k]);
    }
}

?>

