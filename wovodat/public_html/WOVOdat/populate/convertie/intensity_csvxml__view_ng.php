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

if(!isset($intensity_time)){
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
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
	<script language='javascript' type='text/javascript'>
	
		$(document).ready(function(){

			$("#intensityform").validate({
			
				errorPlacement: function(error, element) { 
					error.appendTo(element.parent().parent().prev().children());
				}				
						
			});	
	
		});

	</script>


<style type="text/css">
label.error {font-size:10px; display:block; color: red;}
</style>	
	
	
	
</head>
<body>
	<div id="wrapborder">
	<div id="wrap">

		<?php include 'php/include/header_beta.php'; ?>
			<div id="content">
			<div id="contentl">
				<div>
					
					<p style="font-size:12px;font-weight:bold;">
						Please Select Intensity Events by clicking one button for each csv line.
					</p>
				
					<div id="contentlhead"></div>
					<div id="contentlform"></div>
					<p class="home3"></p>
		<?php 
			
			echo '<form id="intensityform" name="intensityform" method="post" action="intensity_csvxml_ng.php" >';		

						
			echo '<table border="2" width="100%">';
	
			echo "<tr>";
			echo"<td colspan='4' align='center'>Possible Intensity Events</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo"<td align=\"center\"></td>";
			echo"<td align=\"center\">Magnitude</td>";
			echo"<td align=\"center\">DateTime</td>";
			echo"<td align=\"center\">Select Events</td>";	
			echo "</tr>";			
			
			$intenstiysize = sizeof($intensity_time);   // Total array rows 
			
			for($i=0;$i<$intenstiysize;$i++){
			
				$rows=sizeof($intensity_time[$i])+1;    // To use in rowspan 
						
				$csvline=$i+1;                         

			
				if(empty($intensity_time[$i])){
					$flag="true";
					echo"<tr><td rowspan=\"$rows\" align='center'>CSV Line $csvline</td>";
					echo "<td colspan=\"3\" align=\"center\">No Record for this interval time!</td></tr>";
				}else{
				 
					echo"<tr><td rowspan=\"$rows\" align='center'>CSV Line $csvline</td>";
					
				
					for($j=0;$j<sizeof($intensity_time[$i]);$j++){
					
						echo"<tr>";
						echo"<td align=\"center\">{$intensity_time[$i][$j]['mag']}</td>";
						echo"<td align=\"center\">{$intensity_time[$i][$j]['time']}</td>";
						echo"<td align=\"center\">";
						echo"<input type=\"radio\" id=\"evn_code\" name=\"evn_code$i\" value=\"{$intensity_time[$i][$j]['code']}_type{$intensity_time[$i][$j]['type']}\" class=\"required\"/>";
						echo"</td>";	
						echo "</tr>";
					}
					echo "</tr>";
				}
			}
			echo"<input type=\"hidden\" name=\"filename\" value=\"$filename\">";
			echo"<input type=\"hidden\" name=\"observ\" value=\"$observ\">";
			echo"<input type=\"hidden\" name=\"vol\" value=\"$vol\">";
			echo"<input type=\"hidden\" name=\"filesize\" value=\"$filesize\">";
			echo"<input type=\"hidden\" name=\"intenstiysize\" value=\"$intenstiysize\">";
					
		
			if(isset($flag)){  // if there is no record, then need to submit the CSV form again
			
				echo "<tr><td colspan='4' align='center'>
				There is no possible event for the interval Time.<br/>
				<input type='button' value='Please Check & Submit CSV Again' onClick=\"window.location.href='http://{$_SERVER['SERVER_NAME']}/populate/home_populate.php'\"></td></tr>";
			}
			else{
				echo "<tr><td  colspan='4' align='center'><input type=\"submit\" name=\"Submit\" value=\"Submit\"/></td></tr>";
			}  
			
			echo"</table>";
			echo "</form>";
			
		?>
			</div>	
				</div>		
					<div><p class="home2"></p></div>

			<div id="contentr">
				<div id="top" align="left">
					<!-- Aligned to the right: You are logged in as username (FName LName | Obs) | Logout -->
					<p align="right">Login as: <b><?php print $uname; ?></b>|<a href="/populate/logout.php">Logout</a></p>
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