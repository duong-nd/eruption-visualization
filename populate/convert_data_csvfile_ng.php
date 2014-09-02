<?php
session_start();  			

if(!isset($_GET['tipedata'])){ 
header('Location: '.$url_root.'home_populate.php');
exit();
}

?>
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
		
		
		function checkvolcano(){    // if nothing select in volcano box, then don't load convert value..
			
			var volu = $("select#vol2").val();
					
			if(volu != ''){
				loadconvert();                
			}else{                
				$('select#conv').remove();
				$("#convertblock").html("<select name='conv' id='conv' style='width:180px;' class='required'> <option value=''>...</option></select>");
			}
			
			resetall();		 // Reset all like first time page starts loading
		}
		
		function resetall(){
			
			$('select#network').remove();
			$('select#stat').remove();
			$('#id_net_stat_text').remove();
			$('select#stat2').remove();
			$('#id_net_stat_text2').remove();
			$('select#stat3').remove();
			$('#id_net_stat_text3').remove();			
			$('select#gpsStat2').remove();             
			$('#id_net_stat_text4').remove();          
			$('select#gpsStat3').remove();           
			$('#id_net_stat_text5').remove();         
			$('h1').remove();
			
			$('#trm_ivl_select').val('Network');
			$('#eventtype_waveselect').val(''); 
			$('#eventcode').val('');			
					
			$('#kmeter').val('40');
			$('#kilometer').css("display","none");			
			$('#trm_ivl').css("display","none");
			$('.spaceid').remove();
			$('.spaceclass2').remove();
			$('.spaceclass3').remove();
			$('.spaceclass4').remove();
			$('.spaceclass5').remove();
			$('.spaceclass6').remove();              
			$('.spaceclass7').remove();              
			
			$('#rsam_ssam').css("display","none");
			$('#rsam_ssamcode').val('');
			
			$('#uploadfile').css("display","block");
			$('#uploadfile2').css("display","none");

			$('#wave_textfield').css("display","none");
			
			$('#gd_plume').css("display","none");
			$('#satellite_type').css("display","none");
			$('select#gd_plume_select').val('');
			$('select#sate_type_select').val('');  
			$('select#satellite').remove();
			$('select#airplane').remove();
			$('#id_air_sat_select').remove();
			
			$('select#instrument').remove();
			$('#id_inst_text').remove();
			
			/*from line 104-119 these scripts diable "validation error" */

			$('.class,label[for="network"]').css("display","none"); 
			$('.class,label[for="stat"]').css("display","none"); 
			$('.class,label[for="stat2"]').css("display","none"); 
			$('.class,label[for="stat3"]').css("display","none"); 
			$('.class,label[for="instrument"]').css("display","none");			
			$('.class,label[for="trm_ivl_select"]').css("display","none"); 
			$('.class,label[for="eventtype_waveselect"]').css("display","none"); 
			$('.class,label[for="eventcode"]').css("display","none"); 
			$('.class,label[for="rsam_ssamcode"]').css("display","none"); 
			
			$('#gd_plume_select').removeAttr('class');
			$('.class,label[for="sate_type_select"]').css("display","none"); 
			$('.class,label[for="airplane"]').css("display","none"); 
			$('.class,label[for="satellite"]').css("display","none"); 


			/*from line 110-112 these scripts need coz show disable submit button if no net/station/instrument/satllite */
			
			$('#fname1').val('');                    // Clear value of file input 
			$('#Submit1file').removeAttr("disabled"); //Remove disabled="disabled" from sumbit button		
			$('#fname1').attr('class','required');	 // Put it back class='required' for first form submit
			
			
			$('#fname').val('');                   		 // Clear value of file input
			$('#secondname').val('');                    // Clear value of file input
			$('#submit2files').removeAttr("disabled"); //Remove disabled="disabled" from sumbit button
			$('#fname').removeAttr('class');
			$('#secondname').removeAttr('class');
		}

		function resetfirstformsubmit(){

			// Disable action for first form submit
			$('#fname1').val(''); 
			$('#fname1').removeAttr("disabled");  //Reset enable button
		
			$('#fname1').removeAttr('class');
	
			// Active for second form submit
			$('#fname').attr('class', 'required');
			$('#secondname').attr('class', 'required');  

		}
		
		function loadvolcano(institute){
			
			$('#vol2').load('./convertie/selectVolOfInstitute2_ng.php',"kode=" + institute); 
			return false;
		}

		function loadconvert( ) {
		
			$('#conv').html('<option option="selected" value="">...</option><option value="EventDataFromNetwork">EventDataFromNetwork</option><option value="EventDataFromSingleStation">EventDataFromSingleStation</option><option value="IntensityData">IntensityData</option><option value="SeismicTremor">SeismicTremor</option><option value="IntervalSwarmData">IntervalSwarmData</option><option value="RSAMData">RSAMData</option><option value="SSAMData">SSAMData</option><option value="RepresentativeWaveform">RepresentativeWaveform</option><option value="ElectronicTiltData">ElectronicTiltData</option><option value="TiltVectorData">TiltVectorData</option><option value="StrainMeterData">StrainMeterData</option><option value="EDMData">EDMData</option><option value="AngleData">AngleData</option><option value="GPSData">GPSData</option><option value="GPSVectors">GPSVectors</option><option value="LevelingData">LevelingData</option><option value="InSARImage and InSARData">InSARImage and InSARData</option><option value="DirectlySampledGas">DirectlySampledGas</option><option value="SoilEffluxData">SoilEffluxData</option><option value="PlumeData">PlumeData</option><option value="HydrologicData">HydrologicData</option><option value="MagneticFieldsData">MagneticFieldsData</option><option value="MagnetorVectorData">MagnetorVectorData</option><option value="ElectricFieldsData">ElectricFieldsData</option><option value="GravityData">GravityData</option><option value="GroundBasedThermalData">GroundBasedThermalData</option><option value="ThermalImage and ThermalImageData">ThermalImage and ThermalImageData</option><option value="MeteoData">MeteorologicalData</option>');
		}
	
		
	
		$("select#conv").live('click', function() {	
		
			var stationvalue=$('#conv').attr('value');   //get File content to convert value 
	
			resetall();		 // Reset all like first time page starts loading		
		
			if(stationvalue != ''){
			
				var sg = document.form1.vol2.selectedIndex;   // get volcano index 
				var sgu = document.form1.vol2.options[sg].value;  //get volcano value
				
				var stationvalue=$('#conv').attr('value');   //get File content to convert value 	
				var stationdisplay=$("#conv option:selected").text();  //get station "display" value
			
				
				if(stationdisplay=="EventDataFromNetwork"){
	
					$('#networkform').load('./convertie/selectNetwork_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&stationvalue='+stationvalue,function(result){ 
					
						//show disabled submit button if there is no network
						
						var check = result.substring(11,25);
						
						if(check == "nonetworkerror"){
														
							$('#fname1').val('');
							$('#Submit1file').attr("disabled","disabled");
						}
					});	
					
				}	
				else if(stationdisplay=="EventDataFromSingleStation" || stationdisplay =="RSAMData" || stationdisplay =="SSAMData" || stationdisplay=="RepresentativeWaveform" || stationdisplay == "ElectronicTiltData" || stationdisplay == "TiltVectorData" || stationdisplay == "StrainMeterData" || stationdisplay=="EDMData" || stationdisplay =="AngleData" || stationdisplay =="GPSData" || stationdisplay == "GPSVectors" || stationdisplay == "DirectlySampledGas" || stationdisplay == "SoilEffluxData" || stationdisplay == "HydrologicData" || stationdisplay == "MagneticFieldsData" || stationdisplay == "MagnetorVectorData" || stationdisplay == "ElectricFieldsData" || stationdisplay == "GravityData" ||stationdisplay == "GroundBasedThermalData" || stationdisplay == "MeteorologicalData"){  
				
					
					$.get('./convertie/selectcheckstation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay,function(result){
					
						var check_sn_jj = result;
										
						if(check_sn_jj == "true"){
						
							if(stationdisplay =="EDMData" || stationdisplay == "MagneticFieldsData" || stationdisplay == "ElectricFieldsData" || stationdisplay == "GravityData"){
								
								$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer',function(){

									var currentId= $("#stationform h1").attr("id");
									
									if(currentId != "nostation" ){
								
										$('#stationform2').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer&station2=stat2');	
									}
									else{
									
										$('#fname1').val('');     
										$('#Submit1file').attr("disabled","disabled");
									
									}
								});			
							}else if(stationdisplay =="AngleData" || stationdisplay =="GPSData"){
								
								$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer',function(){

									var currentId= $("#stationform h1").attr("id");
									
									if(currentId != "nostation" ){
									
										if(stationdisplay =="AngleData"){
									
											$('#stationform2').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer&station2=stat2');
											
											$('#stationform3').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer&station3=stat3');
											
										}else if(stationdisplay =="GPSData"){
										
											$('#stationform2').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer&gpsStation2=stat2');
											
											$('#stationform3').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer&gpsStation3=stat3');
										}

									}
									else{
									
										$('#fname1').val('');     
										$('#Submit1file').attr("disabled","disabled");
									
									}
								});	
							
							}else {
															
								$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer',function(result){ 
					
									//show disabled submit button if there is no station 
									
									var check = result.substring(11,25);
									
									if(check == "nostationerror"){
																			
										$('#fname1').val('');
										$('#Submit1file').attr("disabled","disabled");
									}
								});
							}		
						}
						else{
							$('#kilometer').css("display","block");
							showkilometer();
						}
					});					
				}     
				else if(stationdisplay=="SeismicTremor" || stationdisplay=="IntervalSwarmData"){				
										
					$('#trm_ivl').css("display","block");
					load_trm_ivl();

				}  
				else if(stationdisplay=="PlumeData" || stationdisplay=="ThermalImage and ThermalImageData"){ 
				
					$('#gd_plume').css("display","block");
					$('#gd_plume_select').attr('class', 'required');
					
					if(stationdisplay=="ThermalImage and ThermalImageData"){
						$('#uploadfile').css('display','none');
						$('#uploadfile2').css('display','block');
						$('#text1').text("Browse Thermal Image file to convert:");
						$('#text2').text("Browse Thermal Pixels file to convert:"); 
						
						resetfirstformsubmit();	
					}
					
					load_gd_plume();
				}
				else if(stationdisplay=="InSARImage and InSARData" ){
					$('#uploadfile').css('display','none');
					$('#uploadfile2').css('display','block');
					
					$('#text1').text("Browse InSAR Image file to convert:");
					$('#text2').text("Browse InSAR Data file to convert:");				
					
					resetfirstformsubmit();
		
					
					$('#sate_air_select').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=none&satellitetype=S',function(){ 
						
						//show disabled submit button if there is no satellite
					
					  	var check= $("#sate_air_select h1").attr("class");	// To get "nosatelliteerror"			
				
						if(check == "nosatelliteerror"){   
						
							$('#fname').val('');
							$('#secondname').val('');
							$('#submit2files').attr("disabled","disabled");
							
						}
					});	
				}
			}else{	
				resetall();		 // Reset all like first time page starts loading
			}
		}); 

		$("select#kmeter").live('click', function() {
			showkilometer();
		});
		
		function showkilometer(){
		
			$('#Submit1file').removeAttr("disabled");  //Reset enable button
			$('#submit2files').removeAttr("disabled");  //Reset enable button
			
			var kilometervalue=$('#kmeter').attr('value');   //get kilo meter value
			
			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value
			
			if(stationdisplay =="EDMData" || stationdisplay == "MagneticFieldsData" || stationdisplay == "ElectricFieldsData" || stationdisplay == "GravityData"){			

				$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue,function(){

					var currentId= $("#stationform h1").attr("id");
				
					if(currentId != "nostation" ){	

						if(stationdisplay =="GPSData"){
					
							$('#stationform2').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue+ '&gpsStation2=stat2');				
						
							$('#stationform3').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue+ '&gpsStation3=stat3');
						}else{
							
							$('#stationform2').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue+ '&station2=stat2');				
						
							$('#stationform3').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue+ '&station3=stat3');						
						}
					}
					else{
						$('#fname1').val('');     
						$('#Submit1file').attr("disabled","disabled");
					}
				});	
			}
			else if(stationdisplay =="AngleData" || stationdisplay =="GPSData" || stationdisplay == "LevelingData"){			
				
				$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue,function(){

					var currentId= $("#stationform h1").attr("id");
					
					if(currentId != "nostation" ){
					
						$('#stationform2').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue+ '&station2=stat2');				
					
						$('#stationform3').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue+ '&station3=stat3');
					}
					else{
						$('#fname1').val('');     
						$('#Submit1file').attr("disabled","disabled");
					}					
				});	
			}
			else{
				
				$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+'&stationdisplay='+stationdisplay+ '&kilometer=' +kilometervalue,function(){ 
					
					//show disabled submit button if there is no network/station/instrument
				
					var check= $("#stationform h1").attr("class");	// To get nosatelliteerror/nostationerror 			
			
					if(check == "nosatelliteerror" || check == "nostationerror"){   
					
						$('#fname1').val('');     
						$('#Submit1file').attr("disabled","disabled");
						
						$('#fname').val('');
						$('#secondname').val('');
						$('#submit2files').attr("disabled","disabled");
						
					}
				});
			}
		}	

		
		$("select#trm_ivl_select").live('click', function() {
			load_trm_ivl(); 
		});
			

		function load_trm_ivl(){	   // Tremor / Interval case 
		
			$('.spaceid').remove();
			$('#Submit1file').removeAttr("disabled");  //Reset enable button
			$('#submit2files').removeAttr("disabled");  //Reset enable button
			
			var trm_ivl_value=$('#trm_ivl_select').attr('value');   

			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			var stationvalue=$('#conv').attr('value');   //get File content to convert value 	
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value

			if(trm_ivl_value == 'Network'){	
			
				$('select#stat').remove();
				$('#id_net_stat_text').remove();
				
				$('#kmeter').val('40');
				$('#kilometer').css("display","none");
				$('h1').remove();
				
				$('.class,label[for="stat"]').css("display","none");  
				
				$('#networkform').load('./convertie/selectNetwork_data_ng.php','volcan='+sgu+ '&stationdisplay='+	stationdisplay+ '&stationvalue='+stationvalue);
			}
			else if(trm_ivl_value == 'Station'){

				$('select#network').remove();
				$('#id_net_stat_text').remove();
				$('h1').remove();
				
				$('.class,label[for="network"]').css("display","none");  		 
				
				$.get('./convertie/selectcheckstation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay,function(result){
					
					var check_sn_jj = result;
				
					
					if(check_sn_jj == 'true'){
						$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer');
					}
					else{
						$('#kilometer').css("display","block");
						showkilometer();
					}
				});	
			}
			else{
				$('select#network').remove();
				$('select#stat').remove();
				$('#id_net_stat_text').remove();
				$('#kmeter').val('40');
				$('#kilometer').css("display","none");
				$('.spaceid').remove();
				$('h1').remove();
				
				$('.class,label[for="network"]').css("display","none");   
				$('.class,label[for="stat"]').css("display","none");      
			}
		
		}
		
		
		
		$("select#gd_plume_select").live('click', function() {
			load_gd_plume();
		});
			

		function load_gd_plume(){   
		
			var gd_plume_value=$('#gd_plume_select').attr('value');   

			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			var stationvalue=$('#conv').attr('value');   //get File content to convert value 	
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value		
		
			if(gd_plume_value == "cs"){
				
				$('#satellite_type').css("display","block"); 
				
				$('#sate_type_select').attr('class', 'required');  
				
				$('select#sate_type_select').val('');
				
				$('select#stat').remove();
				$('#id_net_stat_text').remove();
				$('#kmeter').val('40');
				$('#kilometer').css("display","none");
				$('h1').remove();
				
				$('.class,label[for="stat"]').css("display","none");  
				
				$('#Submit1file').removeAttr("disabled");  //Reset enable button
				$('#submit2files').removeAttr("disabled");  //Reset enable button
				
				load_satellite();
			}
			else if(gd_plume_value == 'ground_based'){
				
				$('#satellite_type').css("display","none");
				
				$('select#satellite').remove();
				$('select#airplane').remove();
				$('#id_air_sat_select').remove();
				$('h1').remove();
				$('select#instrument').remove();
				$('#id_inst_text').remove();
				
				$('.class,label[for="instrument"]').css("display","none");	
				$('#sate_type_select').removeAttr('class');
				$('.class,label[for="satellite"]').css("display","none");  
				$('.class,label[for="airplane"]').css("display","none"); 
				
				$('#Submit1file').removeAttr("disabled");  //Reset enable button
				$('#submit2files').removeAttr("disabled");  //Reset enable button
				
				$.get('./convertie/selectcheckstation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay,function(result){
					
					var check_plume_jj = result;
	
					if(check_plume_jj == 'true'){
					
						$('#stationform').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=nokilometer');
					}
					else{
						$('#kilometer').css("display","block");
						showkilometer();
					}
				});			
			}
			else{

				$('#satellite_type').css("display","none");
				$('select#sate_type_select').val('');

				$('select#stat').remove();
				$('#id_net_stat_text').remove();	
				$('#kmeter').val('40');
				$('#kilometer').css("display","none");
				
				$('select#satellite').remove();
				$('select#airplane').remove();
				$('#id_air_sat_select').remove();
				$('h1').remove();
				
				$('select#instrument').remove();
				$('#id_inst_text').remove();
				
				$('.class,label[for="instrument"]').css("display","none");		
				
				$('#sate_type_select').removeAttr('class');
				$('.class,label[for="stat"]').css("display","none");  
				$('.class,label[for="satellite"]').css("display","none");  
				$('.class,label[for="airplane"]').css("display","none"); 
			}
		}
	
		$("select#sate_type_select").live('click', function() {
			$('select#satellite').remove();
			$('select#airplane').remove();
			$('#id_air_sat_select').remove();
			$('h1').remove();
			
			$('select#instrument').remove();
			$('#id_inst_text').remove();
			
			$('.class,label[for="satellite"]').css("display","none");  
			$('.class,label[for="airplane"]').css("display","none"); 
			load_satellite();
		});		
		
		
		function load_satellite(){   
			
			$('#Submit1file').removeAttr("disabled");  //Reset enable button
			$('#submit2files').removeAttr("disabled");  //Reset enable button
			
			var sate_type_value=$('#sate_type_select').attr('value');   
			
			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value	
			
			if(sate_type_value != ''){
				$('#sate_air_select').load('./convertie/selectStation_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&kilometer=none&satellitetype=' +sate_type_value,function(){ 
						
					//show disabled submit button if there is no network/station/instrument
				
					var check= $("#sate_air_select h1").attr("class");	// To get nosatelliteerror/nostationerror 			
			
					if(check == "nosatelliteerror" || check == "nostationerror"){   
					
						$('#fname1').val('');     
						$('#Submit1file').attr("disabled","disabled");
						
						$('#fname').val('');
						$('#secondname').val('');
						$('#submit2files').attr("disabled","disabled");
						
					}
				});	
			}	
		}
	
		$("select#airplane").live('click', function() {
			
			var satellitename=$('#airplane').attr('value');
			 load_satellite_instrument(satellitename);
		});	
		
		function load_satellite_instrument(satellitename){
			
			$('#Submit1file').removeAttr("disabled");  //Reset enable button
			$('#submit2files').removeAttr("disabled");  //Reset enable button
			
			$('select#instrument').remove();
			$('#id_inst_text').remove();
			$('h1').remove();
	
			var sate_type_value=$('select#sate_type_select').attr('value'); 
			
			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value	
			
			if(satellitename != ''){
				$('#instrumentform').load('./convertie/selectInstrument_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&staname='+satellitename+'&satellitetype='+sate_type_value,function(){ 
						
					//show disabled submit button if there is no network/station/instrument
				
					var check= $("#sate_air_select h1").attr("class");	// To get noinstrumenterror		
			
					if(check == "noinstrumenterror"){   
					
						$('#fname1').val('');     
						$('#Submit1file').attr("disabled","disabled");
						
						$('#fname').val('');
						$('#secondname').val('');
						$('#submit2files').attr("disabled","disabled");
						
					}
				});	
			}		
		}
	
		$("select#stat").live('click',function() {   // click station dropdown
			
			$('select#instrument').remove();
			$('#id_inst_text').remove();
		
			$('#Submit1file').removeAttr("disabled");  //Reset enable button
			$('#submit2files').removeAttr("disabled");  //Reset enable button				
			
			var stationname=$("#stat option:selected").text();  //get station name		
			
			var sg = document.form1.vol2.selectedIndex;   // get volcano index 
			var sgu = document.form1.vol2.options[sg].value;  //get volcano value		
			var stationdisplay=$("#conv option:selected").text();  //get station "display" value

			
			if(stationdisplay== "RSAMData" || stationdisplay== "SSAMData"){
				$("#rsam_ssam").css("display","block");  
				$('#rsam_ssamcode').attr('class', 'required');  
				
			}else if(stationdisplay=="RepresentativeWaveform"){
				$('#wave_textfield').css("display","block");
				$('#eventtype_waveselect').val('');
				$('#eventcode').val(''); 
				$('#eventtype_waveselect').attr('class', 'required');  
				$('#eventcode').attr('class', 'required');  
			}
			else if(stationdisplay == "ElectronicTiltData" || stationdisplay == "TiltVectorData" || stationdisplay == "StrainMeterData" || stationdisplay =="EDMData" || stationdisplay == "AngleData" || stationdisplay == "GPSData" || stationdisplay == "GPSVectors" || stationdisplay == "DirectlySampledGas" || stationdisplay == "SoilEffluxData" || stationdisplay == "PlumeData" || stationdisplay == "HydrologicData" || stationdisplay == "MagneticFieldsData" || stationdisplay == "MagnetorVectorData" || stationdisplay == "ElectricFieldsData" || stationdisplay == 
			"GravityData" || stationdisplay == "GroundBasedThermalData" || stationdisplay== "ThermalImage and ThermalImageData" || stationdisplay == "MeteorologicalData"){   // Added stationdisplay=="PlumeData" on 9-May-2012
			
			
				var station_value=$('#stat').attr('value');    // Get station value 
				
				if(station_value != 'Choose Station'){
					$('#instrumentform').load('./convertie/selectInstrument_data_ng.php','volcan='+sgu+ '&stationdisplay='+stationdisplay+ '&staname='+stationname,function(){ 
						
						//show disabled submit button if there is no network/station/instrument
					
						var check= $("#instrumentform h1").attr("class");	// To get noinstrumenterror		
				
						if(check == "noinstrumenterror"){   
						
							$('#fname1').val('');     
							$('#Submit1file').attr("disabled","disabled");
							
							$('#fname').val('');
							$('#secondname').val('');
							$('#submit2files').attr("disabled","disabled");
							
						}
					});	
				}
			}
						
		});
		
	});
		
	</script>

<div style="padding:0px 0px 0px 5px;">


<?php
	$mndata=$_GET['tipedata'];
	if($mndata=="data"){
		echo "<h2>Conversion of Monitoring Data</h2>";
		echo "<p><blockquote>Input: CSV file of seismic, deformation, gas, hydrology, field, or thermal data. The data must follow WOVOdat1.1 standard format</blockquote></p>";
	}
?>	

	<form name="form1" id="form1" action="./convertie/commonconvertdata_ng.php" method="post" enctype="multipart/form-data">
		<div id="lfleft" style="width:5%;"></div>
		<div style="width:40%;  padding-left:90px;">
			<p1>Observatory (data owner): </p1><br>
			<div id='observo'>
				<select name='observ' id='observ' style="width:180px" class="required">
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
								}else{
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
				<option value=''>...</option>
				</select>
			</div>
		</div>
	
	

		<div style="width:10%;">&nbsp;</div>
		<div id="convertid" style="width:45%;padding-left:90px;">
			<p1>File content to convert: </p1><br>
			<div id="convertblock">
				<select name='conv' id='conv' style="width:180px;" class="required">
				<option value=''>...</option>
				</select>
			</div>
		</div>


		<div id="trm_ivl" style="display:none; padding-left:90px;">
			<div id="trm_ivl_form">
			<p> If an event is located by a network (or) by a single station, please select "Network" (or) "Station" respectively from a below drop down. </p>
			<select id='trm_ivl_select' name='trm_ivl_select' style='width:180px' class='required'>
				<option value=''>...</option>
				<option value='Network' selected='true'>Network</option>
				<option value='Station'>Station</option>
			</select>	
			</div>
		</div>

		<div id="gd_plume" style="display:none; padding-left:90px;">
			<br/><p1>Please choose Ground_Based Station (OR) Airborne:</p1>
			<select id='gd_plume_select' name='gd_plume_select' style='width:180px;'>
				<option value='' selected='true'>...</option>
				<option value='ground_based'>Ground_Based Station</option>
				<option value='cs'>Airborne</option> 
			</select>
		</div>		
		
		<div id="satellite_type" style="display:none; padding-left:90px;">
			<br/><p1>Please choose Airborne Type:</p1><br/>
			<select id='sate_type_select' name='sate_type_select' style='width:180px;'>
				<option value='' selected='true'>...</option>
				<option value='A'>Airplane</option>
				<option value='S'>Satellite</option>
			</select>
		</div>		
		
	
		<div id="sate_air" style="width:45%;padding-left:90px;">
			<div id="sate_air_select">
			</div>
		</div>		
		
		<div id="networkblock" style="width:45%;padding-left:90px;">
			<div id="networkform">
			</div>
		</div>

	
		<div id="kilometer" style="width:45%; padding-left:90px;display:none;">
			<br/><p1>Choose Kilometer to see station: </p1><br/>
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
		

		<div id="stationblock" style="width:45%;padding-left:90px;">
			<div id="stationform2">
			</div>
		</div>		

		<div id="stationblock" style="width:45%;padding-left:90px;">
			<div id="stationform3">
			</div>
		</div>
		
		<div id="instrblock" style="width:45%;padding-left:90px;">
			<div id="instrumentform">
			</div>
		</div>
		
		<div id="rsam_ssam" style="display:none; padding-left:90px;">
			<br/><p1>Please Enter RSAMSSAM Code here:</p1>
			<input type="text" name="rsam_ssamcode" id="rsam_ssamcode" maxlength="30" style='width:180px'/>
		</div>		

		
		<div id="wave_textfield" style="display:none; padding-left:90px;">
			<div>
				<br/>Please Select Event you want to upload waveform:<br/>
				<select id="eventtype_waveselect" style="width:180px;" name="eventtype_waveselect">
				<option selected="true" value="">...</option>
				<option value="EventDataFromNetwork">EventDataFromNetwork</option>
				<option value="EventDataFromSingleStation">EventDataFromSingleStation </option>
				<option value="SeismicTremor">SeismicTremor</option>
				</select>			
			</div>
			<br/>
			Please Enter Event Code here:<br/>
			<input type="text" name="eventcode" id="eventcode" maxlength="30" style='width:180px'/>
		</div>		
		
	
	<div style="width:10%;">&nbsp;</div><div style="width:10%;">&nbsp;</div>
	
	<div id='uploadfile' style="float:left;display:block;">
		<div id='submit_form' style="padding-left:20px;">
			Browse file to convert:<br>
			<input name="MAX_FILE_SIZE" type="hidden" value="2000000"/>
			<input id="fname1" name="fname1" type="file" size="45" maxlength="100"/>
			<br>  
			<input type="submit" name="Submit1file" id="Submit1file" value="Select"/>
		</div>
	</div>  

	<div id='uploadfile2' style="float:left;display:none;">
		<div id='submit_form' style="padding-left:20px;">
			<div id='text1'></div>
			<input name="MAX_FILE_SIZE" type="hidden" value="2000000"/>
			<input id="fname" name="fname" type="file" size="45" maxlength="100"/>
			<br>  
			<div id='text2'></div>
			<input id="secondname" name="secondname" type="file" size="45" maxlength="100"/>
			<br>  			
			<input type="submit" name="submit2files" id="submit2files" value="Select"/>
		</div>
	</div>  
	
	</form>  
</div>

<div id="extra">
</div>
</html>