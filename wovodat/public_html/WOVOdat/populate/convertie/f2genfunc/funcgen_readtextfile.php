<?php

class readtextfile {
    private $fp;
    private $parse_header;
    private $header;
    private $delimiter;
    private $length;
//--------------------------------------------------------------------
    function __construct($file_name, $parse_header=false, $delimiter="\t", $length=8000) {
        $this->fp = fopen($file_name, "r");
        $this->parse_header = $parse_header;
        $this->delimiter = $delimiter;
        $this->length = $length;
        $this->lines = $lines;
        if ($this->parse_header) {
           $this->header = fgetcsv($this->fp, $this->length, $this->delimiter);
        }
    }
    //--------------------------------------------------------------------
    function __destruct() {
        if ($this->fp){
            fclose($this->fp);
        }
    }
    //--------------------------------------------------------------------
	function get($max_lines=0) {    //if $max_lines is set to 0, then get all the data
		$data = array();
		if ($max_lines > 0) $line_count = 0;
      else $line_count = -1; // so loop limit is ignored
		
//		while ($line_count < $max_lines && ($row = fgetcsv($this->fp, $this->length, $this->delimiter)) !== FALSE) {
		while ($line_count < $max_lines && ($row = fgets($this->fp, $this->length)) !== FALSE) {
			if($line_count==0){
				$tablehead=$row[0];
				$data[]=$row;    // to include first row as the first data ..ad oct 9;
			}else {
				if ($this->parse_header) {
      		foreach ($this->header as $i => $heading_i) {
       			$row_new[$heading_i] = $row[$i];
   				}
					$data[] = $row_new;
				}
				else {
//					$data[] = $row[0]; 	// used if only one single string in every row
				$data[] = $row; 		//every row considered as an array
				}
			}
			if ($max_lines > 0) $line_count++;
		}
		return $data;
	}
}
?>
