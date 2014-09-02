<?php
class CsvImportertaupo
{
    private $fp;
    private $parse_header;
    private $header;
    private $delimiter;
    private $length;
//--------------------------------------------------------------------
    function __construct($file_name, $parse_header=false, $delimiter="\t", $length=8000){
        $this->fp = fopen($file_name, "r");
        $this->parse_header = $parse_header;
        $this->delimiter = $delimiter;
        $this->length = $length;
        $this->lines = $lines;
        if ($this->parse_header){
           $this->header = fgetcsv($this->fp, $this->length, $this->delimiter);
        }
    }
//--------------------------------------------------------------------
    function __destruct(){
        if ($this->fp){
            fclose($this->fp);
        }
    }
//--------------------------------------------------------------------
    function get($max_lines=0){    //if $max_lines is set to 0, then get all the data
        $data = array();
        if ($max_lines > 0)
            $line_count = 0;
        else
            $line_count = -1; // so loop limit is ignored
        while ($line_count < $max_lines && ($row = fgetcsv($this->fp, $this->length, $this->delimiter)) !== FALSE){
            if ($this->parse_header){
                foreach ($this->header as $i => $heading_i){
                    $row_new[$heading_i] = $row[$i];
                }
                $data[] = $row_new;
            }
            else{
//                $data[] = $row;// original file contains only this line, all modif removed
//===for taupo====modif for: adjusting output $data that matched well with the obs-field.
	$i++;
	$nr=$i-1;
	$num = count($row);
//...............................Fields of data
	if ($i == 1) {		// read the first row as "title"/ "header"
		$tablegrp = $row[0];
	}
	elseif ($i == 2) {	// read the second row as array of "field name"
  		$nfield = $num;
		$mark = 0;
		for ($n = 0; $n <= $nfield-1; ++$n){
        		$field[$n] = $row[$n];	// Field names, later become "$kee2"
                }
        } 	
	else {			// read third row and more as "value" of each field
		$nr1=$nr-2;
		for ($n = 0; $n <= $nfield-1; ++$n){
			if($field[$n]=='CUSP_ID'){$datacode=$row[$n];}
		}
		$kee1='NetworkEvent'.'  code="'.$datacode."\"";	// every row is labelled with "obs data code"
		for ($n = 0; $n <= $nfield-1; ++$n){
			$kee2=$field[$n];
			$data[$kee1][$kee2]=$row[$n];// Data array	        
			if($field[$n]=='CUSP_ID'){unset($data[$kee1][$kee2]);}
		}
	}
//=============end=of=modif
            }
            if ($max_lines > 0)
                $line_count++;
        }
        return $data;
    }
}
?>
