<?php
include "model/common_model_ng.php";


$obs=$_GET["kode"];
$vol=getvollist($obs);

	if($vol){
		echo"<option value=''> ... </option>";
		echo"<option value='No Specific Volcano'>No Specific Volcano</option>";		
		
		for($i=0;$i<sizeof($vol);$i++){
			echo "<option value=\"{$vol[$i][0]}\">{$vol[$i][0]}</option>";
		}
	}else{
		echo"<option value=''> ... </option>";
	}

?>

				
				
				