<?php
session_start();// Start session
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])) {  // can't proceed without log in
	header('Location: '.$url_root.'login_required.php');
}

if(!isset($filename)){
	header('Location: '.$url_root.'home_populate.php');
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
	<style type="text/css">
	label.error {font-size:12px; display:block; float: none; color: red;}
	</style>
	
	<script src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
	<script language='javascript' type='text/javascript'>
	
jQuery(document).ready(function () {
    jQuery("#uploadimage").validate({
        rules: {
            imagefile: {
                required: true              
            }
        },
        messages: {
            imagefile: {
                required: "This field is required."
                
            }
        }
    });

});

	</script> 
</head>

<body>
	<div id="wrapborder">
	<div id="wrap">

		<?php include 'php/include/header_beta.php'; ?>

		<div id="content">	
			<div id="contentl">
				<div>
					<h1>Converting Data ...</h1>
					<div id="contentlhead"></div>
					<div id="contentlform">
					<p class="home3">
		<?php 
			$time = date("Y-m-d H:i:s");
		
			echo "Time: $time<br/><br/>";
			
			if(isset($observ))
				echo "Observatory Name:  $observ <br/>";
				
			if(isset($vol))	
				echo "Volcano Name:  $vol <br/>";
				
			if(isset($conv))
				echo "File-type:$conv <br/>";
		
			if(isset($network))
				echo "Network Name: $network <br/>";
			
			if(isset($station))
				echo "Station Name: $station <br/>";
			
			if(isset($instrument))
				echo "Instrument Name:  $instrument <br/>";
			
			if(!isset($fileerrors)){
				if(isset($filename2)){
					$f_csvrows_withoutheader = $count;
					
					$s_csvrows_withoutheader = $count2;
					
					echo "<br/><b>First CSV File Info:</b>";
					echo "<br/>Input File Name:  $filename <br/>";
					echo "Uploaded Total CSV rows: $f_csvrows_withoutheader rows <br/>";
					echo "Input File Size:$filesize bytes<br/>";

					echo "<br/><b>Second CSV File Info:</b>";				
					echo "<br/>Input File Name:  $filename2 <br/>";
					echo "Uploaded Total CSV rows: $s_csvrows_withoutheader rows <br/>";
					echo "Input File Size:$filesize2 bytes<br/>";		
				}else{
					$csvrows_withoutheader=$count;
					echo "<br/>Input File Name:  $filename <br/>";
					echo "Uploaded Total CSV rows: $csvrows_withoutheader rows <br/>";
					echo "Input File Size:$filesize bytes<br/>";
				}
				
				if(isset($outputfilename))
					echo "<br/>Convert File Name:  $outputfilename <br/>";
			
			
				if(isset($filename2)){
					echo "<br/><b>Successfully converted from $filename file and $filename2 file to $outputfilename file...</b>";
				}else{
					echo "<br/><b>Successfully converted from $filename file to $outputfilename file...</b>";
				}
					
				echo"<br/><br/><b>If you would like to see the result of $outputfilename, please click here to download it:</b>";
			
				echo"<div style='padding-left:13px;'>";

				//To distinguish whether a,b,c come from showxmlresult_ng.php coz added additional folder for option 'c'
				
				if(isset($option) == 'a/b'){
			
					echo"<form name='done' action='downloadxmlfile_ng.php' method='post' enctype='multipart/form-data'>";
				
				}else{
					echo"<form name='done' action='../downloadxmlfile_ng.php' method='post' enctype='multipart/form-data'>";
				}
				
				echo"<input name='fname' type='hidden' value='$outfile' />";
				echo"<input type='submit' value='Download XML file' />";
				echo"</form>";
				echo"</div>";
				
				if(isset($imagelink)){  
					
					echo"<br/><h1>Upload Image file Path ...</h1>";
					echo"<div style='padding-left:13px;font-size:11px;'>";
					
					echo"If you would like to send a large image file, then please upload it to this provided link through FTP: &nbsp;";
					
					echo"<span style='color:#CC9999;font-weight:bold;font-size:12px;'>\"$imagelink\"</span><br/><br/>";
					
					echo"(OR)<br/><br/>"; 
					
					echo"Otherwise, you could use this to submit a small image file:<br/><br/>";
					
					//To distinguish whether a,b,c come from showxmlresult_ng.php coz added additional folder for option 'c'
					if(isset($option) == 'a/b'){
						echo"<form name='uploadimage' id='uploadimage' action='successuploadimage_ng.php' enctype='multipart/form-data' method='post'>";
					}
					else{
						echo"<form name='uploadimage' id='uploadimage' action='../successuploadimage_ng.php' enctype='multipart/form-data' method='post'>";
					}	
					
					echo"<input name='imagelink' type='hidden' value='$imagelink'>";
					echo"<input name='MAX_FILE_SIZE' type='hidden' value='2000000'>";
					echo"<input name='imagefile' id='imagefile' type='file' class=\"required\"><br/><br/>";
					echo"<input type='submit' name='Submit' id='Submit' value='Submit Small Size Image'>";
					echo"</form>";
					
					echo"</div>";
				}
					 
			}
			else{
				echo "<br/><b style='color:red;'>$fileerrors</b>";
			}	
		?>
				</p>
					</div>
					<div><p class="home2"></p></div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<div>
			<?php include 'php/include/footer_main_beta.php'; ?>
		</div>
		</div> <!--end of wrap-->
	</div> <!--end of wrapborder-->

</body>
</html>