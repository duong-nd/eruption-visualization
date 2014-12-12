<?php

//$file="php-logo-virus.jpg";
$file="index.php";
 $test=getimagesize($file);   
 
 if($file == 'false')
 var_dump($test);
 else
 echo "its false";
//include "php-logo-virus.jpg";
/*
$lower=strtolower ("INGV-Vesu");
echo $lower;




echo <<<HTML
 	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
	<script language='javascript' type='text/javascript'>
	
		$(document).ready(function(){

			$("#form1").validate();
		

			var institute = $("#observ option:selected").text();
			alert(institute);
		});

	</script>


<style type="text/css">
label.error {font-size:12px; display:block; float: none; color: red;}
</style>


<form id="form1">
<select name="observ" id="observ" class="required">
<option value="">Choose network</option>
<option value="a">a</option>
</select>
<input type="submit" name="submit">
</form> <br/><br/><br/><br/><br/>
HTML;

$datetime="2000-07-13 21:23:44"; 
 
$date1=substr($datetime,0,10); 
 $year=substr($datetime,0,4); 
 $month=substr($datetime,5,2); 
 $date=substr($datetime,8,2);
$nodash_date=$year.$month.$date; 
echo "This is date =>".$date1."<br/>"; 
echo "This is date =>".$year."<br/>"; 
echo "This is date =>".$month."<br/>"; 
echo "This is date =>".$date."<br/>"; 
echo "This is date =>".$nodash_date."<br/>";

$size=array();

$checking_code=substr("123456_type2",-1);

if(!array_filter($size)) {

 echo "OK";
}


var_dump($checking_code);


echo <<<HTMLBLOCK
<tr>
<th>Soluble gases:</th>

<td>							<input type="radio" name="abgas" value="Y">Yes</input>

<input type="radio" name="abgas" value="N">No</input></td>
</td>

<td><span style="font-size:10px"> Absorption of soluble gases </span></td>

</tr>					

<tr>
<th>Equilibrium species:</th>
<td>							<input type="radio" name="species" value="Y">Yes</input>&#09;<input type="radio" name="species" value="M">Maybe</input></td>
<td><span style="font-size:10px"> Change in the equilibrium species </span></td>

</tr>	
HTMLBLOCK;

var_dump($_POST);

echo <<<HTML

<form method="post" action="copy.php">

<input type="hidden" name="tsid[]" value="1" />
<input type="radio" name="personnel_0" value="111" />
<input type="radio" name="personnel_0" value="222" />

<input type="hidden" name="tsid[]" value="2" />
<input type="radio" name="personnel_1" value="333" />
<input type="radio" name="personnel_1" value="444" />
<input type="submit" />


</form>
HTML;
/*

<a href="installing/MVO.zip"> download </a>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
                    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
<style type="text/css">
* { font-family: Verdana; font-size: 96%; }
label { width: 10em; float: left; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
p { clear: both; }
.submit { margin-left: 12em; }

</style>
  <script>
  $(document).ready(function(){
    $("#commentForm").validate();
  });
  </script>
  
</head>
<body>
  

 <form class="cmxform" id="commentForm" method="get" action="">
  <table>
 <fieldset>
   <legend>A simple comment form with submit validation and default messages</legend>
		
		<select id='observ' name='observ' class="required">
							
								<option value="">Select institute</option>
								<option value="U.S. Geological Survey">U.S. Geological Survey</option>

							</select>
   
   <p>
     <label for="cname">Name</label>
     <em>*</em><input id="cname" name="name" size="25" class="required" minlength="2" />
   </p>
   <p>
     <label for="cemail">E-Mail</label>
     <em>*</em><input id="cemail" name="email" size="25"  class="required email" />
   </p>
   <p>
     <label for="curl">URL</label>
     <em>  </em><input id="curl" name="url" size="25"  class="url" value="" />
   </p>
   <p>
     <label for="ccomment">Your comment</label>
     <em>*</em><textarea id="ccomment" name="comment" cols="22"  class="required"></textarea>
   </p>
   <p>
     <input class="submit" type="submit" value="Submit"/>
   </p>
 </fieldset> </table>
 </form>
 

</body>
</html>







function test($fname,&$fsize){

$fsize = $fsize + 100;	

$message = "Hello ". $fname;

return $message;
}

$fsize = 100;
$outputmessage = test ("Nang",$fsize);

var_dump ($fsize);
var_dump ($outputmessage);


echo"<form name='uploadimage' action='copy.php' enctype='multipart/form-data' method='post'>";

echo"<input name='MAX_FILE_SIZE' type='hidden' value='2000000'>";
echo"<input name='imagefile' type='file'><br/><br/>";
echo"<input type='submit' value='Submit Small Size Image'>";
echo"</form>";


if (exif_imagetype('Winter.jpg') != IMAGETYPE_JPEG) {
    echo 'The picture is not a jpg';
}
else
	echo "The picture is a jpg";


echo"<form name='uploadimage' action='copy.php' enctype='multipart/form-data' method='post'>";

echo"<input name='MAX_FILE_SIZE' type='hidden' value='2000000'>";
echo"<input name='imagefile' type='file'><br/><br/>";
echo"<input type='submit' value='Submit Small Size Image'>";
echo"</form>";


$file=$_FILES['imagefile']['tmp_name'];


$handlers = array(
    'jpg'  => 'imagecreatefromjpeg',
    'jpeg' => 'imagecreatefromjpeg',
    'png'  => 'imagecreatefrompng',
    'gif'  => 'imagecreatefromgif'
);

$extension = strtolower(substr($file, strrpos($file, '.')+1));
if ($handler = $handlers[$extension]){
    $image = $handler($file);
    echo $image;
}else{
   echo "error";
}



$file = 'Sunset.jpg';
$newfile = 'Sunset.jpg.new';

if (!rename($file, $newfile)) {
    echo "failed to copy $file...\n";
}
*/
?>
 
