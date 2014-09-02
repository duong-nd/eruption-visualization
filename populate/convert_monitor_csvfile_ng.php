<?php
session_start();  // Start session

if(!isset($_GET['tipedata'])){    
header('Location: '.$url_root.'home_populate.php');
exit();
}

?>
<html>

<style type="text/css">
label.error {font-size:12px; display:block; float: none; color: red;}
</style>

	<script src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery.validate.js"></script>
	<script language='javascript' type='text/javascript'>
	
	$(document).ready(function(){
		
		$("#form1").validate();
		
		$("#observ").change(function(){
		
			$('#vol2').val('');    
			var institute = $("select#observ").val();
			loadvolcano (institute);  // after get obs, then get values of vocalno & convert file 
			checkvolcano();
		});

		
		$("select#vol2").live('click', function() {		
			checkvolcano();
		}); 
		
		
		function checkvolcano(){   
			
			var volu = $("select#vol2").val();
			if(volu != ''){
				loadconvert();                
			}else{               
				$('select#conv').remove();
				$("#convertblock").html("<select name='conv' id='conv' style='width:180px;' class='required'> <option value=''>...</option></select>");  // Added class='required' AND changed from value='...' on 3-May-2012
			}
			resetall();
		}
		
		
		function loadvolcano(institute){
			
			$('#vol2').load('./convertie/selectVolOfInstitute2_ng.php',"kode=" + institute ,function(response, status, xhr) {
				if (status == "error") {
					var msg = "Sorry but there was an error: ";
					$("#vol2").html(msg + xhr.status + " " + xhr.statusText);
				}
			});
			return false;
		}

		function loadconvert( ) {
		
			$("#conv").html('<option selected="true" value="">...</option><option value="SeismicNetwork" name="Seismic">SeismicNetwork</option><option value="SeismicStation" name="Seismic">SeismicStation</option><option value="SeismicInstrument" name="Seismic">SeismicInstrument</option><option value="SeismicComponent" name="Seismic">SeismicComponent</option><option value="DeformationNetwork" name="Deformation">DeformationNetwork</option><option value="DeformationStation" name="Deformation">DeformationStation</option><option value="DeformationInstrument_General" name="Deformation">DeformationInstrument_General</option><option value="DeformationInstrument_Tilt/Strain" name="Deformation">DeformationInstrument_Tilt/Strain</option><option value="GasNetwork" name="Gas">GasNetwork</option><option value="GasStation" name="Gas">GasStation</option><option value="GasInstrument" name="Gas">GasInstrument</option><option value="HydrologicNetwork" name="Hydrologic">HydrologicNetwork</option><option value="HydrologicStation" name="Hydrologic">HydrologicStation</option><option value="HydrologicInstrument" name="Hydrologic">HydrologicInstrument</option><option value="ThermalNetwork" name="Thermal">ThermalNetwork</option><option value="ThermalStation" name="Thermal">ThermalStation</option><option value="ThermalInstrument" name="Thermal">ThermalInstrument</option><option value="FieldsNetwork" name="Fields">FieldsNetwork</option><option value="FieldsStation" name="Fields">FieldsStation</option><option value="FieldsInstrument" name="Fields">FieldsInstrument</option><option value="MeteoNetwork" name="Meteo">MeteorologicalNetwork</option><option value="MeteoStation" name="Meteo">MeteorologicalStation</option><option value="MeteoInstrument" name="Meteo">MeteorologicalInstrument</option><option value="Airplane" name="Airplane">Airplane</option><option value="Satellite" name="Satellite">Satellite</option>');
        
		}
		
		function resetall(){
			
			$('select#network').remove();
			$('select#station').remove(); 
			$('select#instrument').remove(); 
			
			$('#pnet').remove(); 
			$('#pstat').remove(); 
			$('#pinst').remove(); 
			$('h1').remove();
			
			$('#kmeter').val('40');
						
			$('#kilometer').css("display","none");
			$('#digen_div').css("display","none");
			$('#ditltstrain_div').css("display","none"); 
		
			$('#station_airborne').css("display","none");
			$('#sta_borne_select').val('');
			
			$('#airborne_type').css("display","none");
			$('#borne_type_select').val('');
			
			$('select#satellite').remove();
			$('select#airplane').remove();
			$('#id_air_sat_select').remove();
				
			/*from line 97-104 these scripts need coz of validation */
			
			$('#network,label[for="network"]').remove();    	//Remove validation error 
			$('#station,label[for="station"]').remove();  		//Remove validation error 
			$('#instrument,label[for="instrument"]').remove();   //Remove validation error
	
			$('.class,label[for="digen_select"]').css("display","none"); //display=none for validation error 
			$('.class,label[for="ditltstrain_select"]').css("display","none");//display=none for validation error 
			$('.class,label[for="borne_type_select"]').css("display","none"); //display=none for validation error
			$('.class,label[for="satellite"]').css("display","none");  //display=none for validation error
			$('.class,label[for="airplane"]').css("display","none"); //display=none for validation error
			
			/*TO line 97-104 these scripts need coz of validation */
			
			
			/*from line 110-112 these scripts need coz show disable submit button if no net/station/instrument */
			
			$('#fname').val('');                  // Clear value of file input
			$('#Submit').removeAttr("disabled");  //Remove disabled="disabled" from sumbit button 
			
		}
		
		$("select#conv").live('click', function() {	
		
			var stationvalue=$('#conv').attr('value');   //get File content to convert value 
			
			resetall();			
			
			if(stationvalue != ''){    
			
				var sg = document.form1.vol2.selectedIndex;   // get volcano index 
				var sgu = document.form1.vol2.options[sg].value;  //get volcano value
				
				var stationvalue=$('#conv').attr('value');   //get File content to convert value 	
				var stationdisplay=$("#conv option:selected").text();  //get station "display" value
			
				if(stationdisplay=="SeismicStation" || stationdisplay=="DeformationStation" || stationdisplay=="GasStation" || stationdisplay=="HydrologicStation" || stationdisplay=="ThermalStation" || stationdisplay=="FieldsStation" || stationdisplay=="MeteorologicalStation"){
					
					$('#networkform').load('./convertie/selectNetwork_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&stationvalue='+stationvalue,function(result){ 
						
						//show disabled submit button if there is no network/station/instrument
					
					  					
						var check = result.substring(11,25);  // To get "nonetworkerror/nostationerror/noinstrumenter"
						
						if(check == "nonetworkerror" || check == "nostationerror" || check == "noinstrumenter"){
														
							$('#fname').val('');
							$('#Submit').attr("disabled","disabled");
						}
					});	
	
				}
				else if(stationdisplay=="SeismicInstrument" || stationdisplay=="SeismicComponent" || stationdisplay=="DeformationInstrument_General" || stationdisplay=="DeformationInstrument_Tilt/Strain" || stationdisplay=="GasInstrument" || stationdisplay=="HydrologicInstrument" || stationdisplay=="ThermalInstrument" || stationdisplay=="FieldsInstrument" || stationdisplay=="MeteorologicalInstrument"){				
					
					$('#networkform').load('./convertie/selectInstrument_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&stationvalue='+stationvalue+'&networkdisplay=none&stationcheck=check1&instrucomponent=noinstru1&kilometer=nokilometer',function(result){ 
					
						//show disabled submit button if there is no network/station/instrument
						
						var check = result.substring(11,25);
						
						if(check == "nonetworkerror" || check == "nostationerror" || check == "noinstrumenter"){
													
							$('#fname').val('');
							$('#Submit').attr("disabled","disabled");
						}
					});	
				}               
			}else{	
				resetall();
			}
			

		}); 
		
		$("select#network").live('click', function() {
			
			$('#Submit').removeAttr("disabled");  //Remove disabled="disabled" from sumbit button 
			
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value
			
			if(stationdisplay=="SeismicInstrument" || stationdisplay=="SeismicComponent" || stationdisplay=="DeformationInstrument_General" || stationdisplay=="DeformationInstrument_Tilt/Strain" ||  stationdisplay=="HydrologicInstrument"  || stationdisplay=="FieldsInstrument" || stationdisplay=="MeteorologicalInstrument"){
				
				var networkdisplay=$('#network').attr('value');
				
				if(networkdisplay !=''){  
					loadstation();
				}
				else{
				
					$('select#station').remove(); 
					$('select#instrument').remove(); 
					$('#pstat').remove(); 
					$('#pinst').remove(); 
					$('h1').remove();
					
					$('#kmeter').val('40');
					$('#kilometer').css("display","none");
					$('#digen_div').css("display","none");
					$('#ditltstrain_div').css("display","none");
					
					$('#station,label[for="station"]').remove();
					$('#instrument,label[for="instrument"]').remove(); 

				}	
			}
			else if(stationdisplay=="GasInstrument" || stationdisplay=="ThermalInstrument"){

				$('#station_airborne').css('display','block');
				$('#sta_borne_select').attr('class','required');
				
			}	
		});


		$("select#sta_borne_select").live('click', function() {

			var $station_borne=$('select#sta_borne_select').val();
			
			if($station_borne == 'ground_based'){
			
				$('#airborne_type').css("display","none");
				
				$('select#satellite').remove();
				$('select#airplane').remove();
				$('#id_air_sat_select').remove();
				$('h1').remove();
				
				$('.class,label[for="borne_type_select"]').css("display","none");  
				$('.class,label[for="satellite"]').css("display","none");  
				$('.class,label[for="airplane"]').css("display","none"); 
				$('#Submit').removeAttr("disabled");  //Reset enable button
		
				loadstation();
			}
			else if($station_borne == 'cs'){
			
				$('#airborne_type').css("display","block"); 
				$('#borne_type_select').attr('class', 'required');  
				$('select#borne_type_select').val('');
				
				$('select#station').remove();
				$('#pstat').remove();
				$('#kmeter').val('40');
				$('#kilometer').css("display","none");
				$('h1').remove();
				
				$('.class,label[for="station"]').css("display","none");  
				$('#Submit').removeAttr("disabled");  //Reset enable button			
			
				loadairsatellite();
			
			}
			else{
			
				$('#sta_borne_select').val('');
			
				$('select#station').remove();
				$('#pstat').remove();
				$('#kmeter').val('40');
				$('#kilometer').css("display","none");
				$('h1').remove();
			
				$('#airborne_type').css("display","none");
				$('select#satellite').remove();
				$('select#airplane').remove();
				$('#id_air_sat_select').remove();
				
				
				$('.class,label[for="station"]').css("display","none");  
				$('.class,label[for="satellite"]').css("display","none");  
				$('.class,label[for="airplane"]').css("display","none"); 			
				
				$('#Submit').removeAttr("disabled");  //Reset enable button
			
			}
		
		});

		$("select#borne_type_select").live('click', function() {
				
				$('#Submit').removeAttr("disabled");
				$('h1').remove();
				
				loadairsatellite();
		});
		
		function loadairsatellite(){
			
			$('#Submit').removeAttr("disabled");
		
			var air_sate=$('#borne_type_select').attr('value');
			
			if(air_sate != ''){
				$('#sate_air_select').load('./convertie/selectStation_ng.php','airplane_sate='+air_sate,function(){ 
				
					var check= $("#sate_air_select h1").attr("class");	// To get nosatelliteerror 			
			
					if(check == "nosatelliteerror"){   
					
						$('#fname').val('');     
						$('#Submit').attr("disabled","disabled");
						
					}
				});	
			}	
		}
		
		function loadstation(){	//choose instrument case 
			
			$('#Submit').removeAttr("disabled");
			
			$('#kilometer').css("display","none");   
			
			var networkdisplay=$('#network').attr('value');

			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			
			var stationvalue=$('#conv').attr('value');   //get File content to convert value 	
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value
			
			
			$.get('./convertie/selectStation_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&stationvalue='+stationvalue+ '&networkdisplay='+networkdisplay,function(result){
					
					var check_sn_jj = result;
				
					
					if(check_sn_jj == 'true'){
						$('#stationform').load('./convertie/selectInstrument_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&stationvalue='+stationvalue+'&networkdisplay=' +networkdisplay+'&stationcheck=check2&instrucomponent=noinstru2&kilometer=nokilometer',function(result){ 
					
							//show disabled submit button if there is no network/station/instrument
							
							var check = result.substring(11,25);
							
							if(check == "nonetworkerror" || check == "nostationerror" || check == "noinstrumenter"){
																
								$('#fname').val('');
								$('#Submit').attr("disabled","disabled");
							}
						});	
					}
					else{
						$('#kilometer').css("display","block");
						showkilometer();
					}
			});
		}  
		
		$("select#kmeter").live('click', function() {
			showkilometer();
		});
		
		
		function showkilometer(){
		
			$('#Submit').removeAttr("disabled");  //Reset enable button
		
			$('#digen_div').css("display","none");
			$('#ditltstrain_div').css("display","none");
		
			var kilometervalue=$('#kmeter').attr('value');   //get kilo meter value
			
			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			
			var stationvalue=$('#conv').attr('value');   //get File content to convert value 	
			
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value
			var networkdisplay=$('#network').attr('value');
			
			$('#stationform').load('./convertie/selectInstrument_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&stationvalue='+stationvalue+'&networkdisplay=' +networkdisplay+			'&stationcheck=check2&instrucomponent=noinstru2&kilometer=' +kilometervalue,function(result){ 
					
				//show disabled submit button if there is no network/station/instrument
				
				var check = result.substring(11,25);
				
				if(check == "nonetworkerror" || check == "nostationerror" || check == "noinstrumenter"){
										
					$('#fname').val('');
					$('#Submit').attr("disabled","disabled");
				}
			});	
		}
			 
		$("select#station").live('click', function() {
			
			$('#Submit').removeAttr("disabled");  //Reset enable button
			
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value
			var stationcheck=$('#station').attr('value');
				
			if(stationcheck !=''){	
		
				if(stationdisplay=="SeismicComponent"){
					loadinstrument();
				}
				else if(stationdisplay=="DeformationInstrument_General" || stationdisplay=="DeformationInstrument_Tilt/Strain"){
					digen_tilstrain(stationdisplay);
				}	
			}
			else{
				
				$('select#instrument').remove();
				$('#pinst').remove(); 
				$('h1').remove();
				
				$('#digen_select').val(''); 
				$('#ditltstrain_select').val(''); 
			}
		
		
		}); 
		
		
		function digen_tilstrain(stationdisplay){ 
		
			$('#Submit').removeAttr("disabled"); //Reset enable button
			
		   	$('#digen_select').val(''); 
			$('#ditltstrain_select').val(''); 
			
			if(stationdisplay=="DeformationInstrument_General"){
			
				$('#digen_select').attr('class', 'required');  
			
				$('#digen_div').css("display","block");
			}
			else if(stationdisplay=="DeformationInstrument_Tilt/Strain"){
			
				$('#ditltstrain_select').attr('class', 'required'); 
				
				$('#ditltstrain_div').css("display","block");
			}	
		} 
	
		function loadinstrument(){
			
			$('#Submit').removeAttr("disabled");
			
			var networkdisplay=$('#network').attr('value');
			var station=$('#station').attr('value');
			var kilometervalue=$('#kmeter').attr('value');   //get kilo meter value
			
			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			
			var stationvalue=$('#conv').attr('value');   //get File content to convert value 	
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value

			$('#instruform').load('./convertie/selectInstrument_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&stationvalue='+stationvalue+'&networkdisplay=' +networkdisplay+'&stationcheck='+station+ '&instrucomponent=noinstru3&kilometer=' +kilometervalue,function(result){ 
				
				//show disabled submit button if there is no network/station/instrument	
										
				var check = result.substring(11,25);
				
				if(check == "nonetworkerror" || check == "nostationerror" || check == "noinstrumenter"){
										
					$('#fname').val('');
					$('#Submit').attr("disabled","disabled");
				}
			});	
		}

		// This part is not very necessary but double check to get more validation
	
		$('#form1').submit(function() {
			var check=$('h1').attr('class');
			
			if(check == "nonetworkerror" || check == "nonetworkerror2" || check == "nostationerror" || check == "noinstrumenterror"){
			
				$('#fname').val('');
				$('#Submit').attr("disabled","disabled");
				
			}
		});
	});
		
	</script>

<div style="padding:0px 0px 0px 5px;">


<?php
	$mndata=$_GET['tipedata'];
	if($mndata=="station"){
		echo "<h2>Conversion of Monitoring System</h2>";
		echo "<p></p><blockquote>Input: CSV file of network, station, or instrument information. The data must follow the WOVOdat1.1 standard format</blockquote>";
	}
?>


<form name="form1" id="form1" action="./convertie/commonconvertfile_ng.php" method="post" enctype="multipart/form-data">
		<div id="lfleft" style="width:5%;"></div>
		<div style="width:40%;  padding-left:90px;">
			<p1>Observatory (data owner): </p1><br>
			<div id='observo'>
				<select name='observ' id='observ' style="width:180px;" class="required">
					<option value="">...</option>  
<?php
						include 'php/include/db_connect_view.php';
						if ($_SESSION['permissions']['access']==0){
								$result = mysql_query("select cc_code, cc_country, cc_obs, cc_id from cc order by cc_country");
						}else{
							$result = mysql_query("select cc_code, cc_country, cc_obs, cc_id from cc where cc_id='$ccd' order by cc_country");
						} 
						while ($v_arr = mysql_fetch_array($result)) {
							if(!is_numeric($v_arr[0])){
								$titles=htmlentities($v_arr[2], ENT_COMPAT, "cp1252");
								if($v_arr[1]==""){
									if($v_arr[3]==$ccd){
										echo "<option value=\"$v_arr[0]\" title=\"$titles\" selected=\"selected\">".$v_arr[0]."</option>";
									}else{echo "<option value=\"$v_arr[0]\" title=\"$titles\">".$v_arr[0]."</option>";}
								}
								else{
									if($v_arr[3]==$ccd){echo "<option value=\"$v_arr[0]\" title=\"$titles\" selected=\"selected\">".$v_arr[1].",".$v_arr[0]."</option>";
									}else{echo "<option value=\"$v_arr[0]\" title=\"$titles\">".$v_arr[1].",".$v_arr[0]."</option>";}
								} 
							}
						} 
?>
				</select>
			</div>
		</div>
		
		<div style="width:10%;">&nbsp;</div>
			<div id="vola2" style="width:45%; padding-left:90px;">
			<p1>Volcano: </p1><br>
			<div id="volano2">
				<select name='vol2' id='vol2' style="width:180px;" class="required">
				<option value=''> ... </option>
				</select>
			</div>
		</div>
	
	

		<div style="width:10%;">&nbsp;</div>
		<div id="convertid" style="width:45%;padding-left:90px;">
			<p1>Type of Data to convert: </p1><br>
			<div id="convertblock">
				<select name='conv' id='conv' style="width:180px;" class="required">
				<option value=''>...</option>
				</select>
			</div>
		</div>


		<div style="width:10%;">&nbsp;</div>
		<div id="networkblock" style="width:45%;padding-left:90px;">
			<div id="networkform">
			</div>
		</div>
		

		<div id="station_airborne" style="display:none; padding-left:90px;">
			<br/><p1>Please choose Ground_Based Station (OR) Airborne:</p1>
			<select id='sta_borne_select' name='sta_borne_select' style='width:180px;'>
				<option value='' selected='true'>...</option>
				<option value='ground_based'>Ground_Based Station</option>
				<option value='cs'>Airborne</option> 
			</select>
		</div>		
		
		<div id="airborne_type" style="display:none; padding-left:90px;">
			<br/><p1>Please choose Airborne Type:</p1><br/>
			<select id='borne_type_select' name='borne_type_select' style='width:180px;'>
				<option value='' selected='true'>...</option>
				<option value='A'>Airplane</option>
				<option value='S'>Satellite</option>
			</select>
		</div>		
		
	
		<div id="sate_air" style="width:45%;padding-left:90px;">
			<div id="sate_air_select">
			</div>
		</div>	


		
		<div style="width:10%;">&nbsp;</div>
		<div id="kilometer" style="width:45%; padding-left:90px;display:none;">
			<p1>Choose Kilometer to see station: </p1><br>
			<div id="kmeter_id">
				<select name='kmeter' id='kmeter' style="width:180px;">
					<option value='40' selected='ture'>40</option>
					<option value='80'>80</option>
					<option value='100'>100</option>
					<option value='all'>See all stations</option>
				</select>
			</div>
		</div>
		
		
	
		<div id="stationblock" style="width:45%;padding-left:90px;">
			<div id="stationform">
			</div>
		</div>
		
		<div style="width:10%;">&nbsp;</div>
		<div id="digen_div" style="width:45%; padding-left:90px;display:none;">
			<p1>Please Choose Instrument types: </p1><br>
			<div id="digen_id">
				<select name='digen_select' id='digen_select' style="width:180px;">
					<option value='' selected='ture'>Choose Instrument type</option>
					<option value='Angle'>Angle</option>
					<option value='CGPS'>CGPS</option>
					<option value='EDM'>EDM</option>
					<option value='EDM_Reflector'>EDM Reflector</option>
					<option value='GPS'>GPS</option>
					<option value='Total_Station'>Total Station</option>
					<option value='OtherTypes'>Other instrument types</option>
				</select>
			</div>
		</div>
		
		<div id="ditltstrain_div" style="width:45%; padding-left:90px;display:none;">
			<p1>Please Choose Instrument types: </p1><br>
			<div id="ditltstrain_id">
				<select name='ditltstrain_select' id='ditltstrain_select' style="width:180px;">
					<option value='' selected='ture'>Choose Instrument type</option>
					<option value='Tilt'>Tilt</option>
					<option value='Strain'>Strain</option> 
				</select>
			</div>
		</div>	
		
		
		<div style="width:10%;">&nbsp;</div>
		<div id="instrublock" style="width:45%;padding-left:90px;">
			<div id="instruform">
			</div>
		</div>
		

		
	<div style="width:10%;">&nbsp;</div>
	<div id="formfname" style="float:left;">
		<div style="padding-left:20px;">
			Browse file to convert:<br>
			<input name="MAX_FILE_SIZE" type="hidden" value="2000000">
			<input name="fname" id="fname" type="file" size="45" maxlength="100" class="required">
			<br>
			<input type="submit" name="Submit" id="Submit" value="Select">
		</div>
	</div> 
	</form>  
</div>


</html>