<?php
session_start();// Start session
require_once "php/include/get_root.php";

$uname="";
$ccd="";

if(isset($_SESSION['login'])) {
	$uname=$_SESSION['login']['cr_uname'];
	$ccd=$_SESSION['login']['cc_id'];
}
else{       // can't proceed without log in
	header('Location: '.$url_root.'login_required.php');
}


if(!isset($_POST['imagelink'])){
	header('Location:commonconvertdata_ng.php');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
	<meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
	<meta name="keywords" content="Volcano, Vulcano, Volcanoes, Vulcanoes, Volcan, Vulkan, eruption, forecasting, forecast, predict, prediction, hazard, desaster, disaster, desasters, disasters, database, data warehouse, format, formats, WOVO, WOVOdat, IAVCEI, sharing, streaming, earthquake, earthquakes, seismic, seismicity, seismology, deformation, INSar, GPS, uplift, caldera, stratovolcano, stratovulcano">
	<link href="/css/styles_beta.css" rel="stylesheet">
	<script src="/js/jquery-1.4.2.min.js"></script>
</head>
<body>
	<div id="wrapborder">
	<div id="wrap">

		<?php include 'php/include/header_beta.php'; ?>

		<div id="content">	
			<div id="contentl">
				<div>
		<?php 
					
			$filename=$_FILES['imagefile']['name'];
			$filesize=$_FILES['imagefile']['size'];

			$imagepath=$_POST['imagelink']."/".basename($_FILES['imagefile']['name']);   //prepare the image path
	
			$checkimage = getimagesize($_FILES['imagefile']['tmp_name']);  // Check image size
			

			if (($checkimage !== false) && ($filesize <= 2000000)){
		
				if (!move_uploaded_file($_FILES['imagefile']['tmp_name'],$imagepath)){
						
						echo"<h1>Upload is Unsuccessful ...</h1>";
						echo"<div id='contentlhead'></div>";
						echo"<div id='contentlform'>";
						echo"<p class='home3'>";
						echo "<b style='color:red;'>File submission fails.  Please go back to <a href='http://{$_SERVER['SERVER_NAME']}/populate/home_populate.php'>home page</a> and try again.</b>";
						
				}
				else{
					echo"<h1>Upload is Successful ...</h1>";
					echo"<div id='contentlhead'></div>";
					echo"<div id='contentlform'>";
					echo"<p class='home3'>";

					echo "<br/>File \"$filename\" upload was successful!<br/><br/>";
					echo "Thank you for your contribution to WOVOdat.<br/><br/>";
					echo "You may now go back to the <a href='http://{$_SERVER['SERVER_NAME']}/populate/home_populate.php'>home page </a>for any other operation.";
				}
			}else{
				echo"<h1>Upload is Unsuccessful ...</h1>";
				echo"<div id='contentlhead'></div>";
				echo"<div id='contentlform'>";
				echo"<p class='home3'>";

				echo"<b style='color:red;'>File size is too big.<br/> File submission fails. Please go back to <a href='http://{$_SERVER['SERVER_NAME']}/populate/home_populate.php'>home page</a> and try again.</b>";
			}	
			

		?>
				</p>
					</div>
					<div><p class="home2"></p></div>
				</div>
			</div>
			<div id="contentr">
				<div id="top" align="left">
					<!-- Aligned to the right: You are logged in as username (FName LName | Obs) | Logout -->
					<p align="right">Login as: <b><?php print $uname; ?></b>|<a href="/populate/logout.php">Logout</a></p>

			
				</div>
				<br><br>

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