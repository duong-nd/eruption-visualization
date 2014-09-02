<?php
session_start();
include "commondata_ng.php";
include "model/common_model_data_ng.php";
include "f2genfunc/funcgen_datetime.php";
require_once "php/include/get_root.php";


if(!isset($_SESSION['login'])){       // can't proceed without log in
	header('Location: '.$url_root.'login_required.php');
}


/* can't proceed when html form can't post anything if exceed 2MB (OR) directly come 
When upload one file, form name is fname1. 
When upload two files at the same time, first form name is fname & the other is secondname.
*/
if((!isset($_FILES['fname1'])) ||  (!isset($_FILES['fname'])) || (!isset($_FILES['secondname']))) {  
	$fileerrors = " File submission fails. Please take note the maxmium file upload size is 2MB.<br/> Please try again!";	
 	include "showxmlresult_ng.php";
	exit();
}



$findtable = array("EventDataFromNetwork" => "sd_evn", "EventDataFromSingleStation" => "sd_evs", "SeismicTremor_Network" => "sd_trm",  "SeismicTremor_Station" => "sd_trm",  "SeismicIntervalSwarm_Network" => "sd_ivl",  "SeismicIntervalSwarm_Station" => "sd_ivl",	"RSAMData" => "sd_rsm",	"SSAMData" => "sd_ssm",	"RepresentativeWaveform" => "sd_wav",	"ElectronicTiltData" => "dd_tlt",	"TiltVectorData" => "dd_tlv",	"StrainMeterData" => "dd_str",	"EDMData" => "dd_edm",	"AngleData" => "dd_ang",	"GPSData" => "dd_gps",	"GPSVectors" => "dd_gpv",	"DirectlySampledGas" => "gd",	"SoilEffluxData" => "gd_sol",	"PlumeData" => "gd_plu","plume_satellite_type" => "gd_plu", "HydrologicData" => "hd",	"MagneticFieldsData" => "fd_mag",	"MagnetorVectorData" => "fd_mgv",	"ElectricFieldsData" => "fd_ele",	"GravityData" => "fd_gra",	"GroundBasedThermalData" => "td",	"ThermalImage and ThermalImageData" => "td_img","ThermalImage_satellite_type" => "td_img",	"Insar_satellite_type" => "dd_sar", "LevelingData" => "dd_lev", "IntensityData" => "sd_int", "MeteoData" => "med");


$xmldataheadersetarray = array("EventDataFromNetwork" => "Seismic", "EventDataFromSingleStation" => "Seismic", "SeismicTremor_Network" => "Seismic",  "SeismicTremor_Station" => "Seismic",  "SeismicIntervalSwarm_Network" => "Seismic",  "SeismicIntervalSwarm_Station" => "Seismic",	"RSAMData" => "Seismic",	"SSAMData" => "Seismic",	"RepresentativeWaveform" => "Seismic",	"ElectronicTiltData" => "Deformation",	"TiltVectorData" => "Deformation",	"StrainMeterData" => "Deformation",	"EDMData" => "Deformation",	"AngleData" => "Deformation",	"GPSData" => "Deformation",	"GPSVectors" => "Deformation",	"DirectlySampledGas" => "Gas",	"SoilEffluxData" => "Gas",	"PlumeData" => "Gas","plume_satellite_type" => "Gas","HydrologicData" => "Hydrologic",	"MagneticFieldsData" => "Fields","MagnetorVectorData" => "Fields",	"ElectricFieldsData" => "Fields",	"GravityData" => "Fields",	"GroundBasedThermalData" => "Thermal",	"ThermalImage and ThermalImageData" => "Thermal","ThermalImage_satellite_type" => "Thermal", "Insar_satellite_type" => "Deformation", "LevelingData" => "Deformation", "IntensityData" => "Seismic", "MeteoData" => "Meteo");


$xmldatasetarray = array("EventDataFromNetwork" => "NetworkEventDataset", "EventDataFromSingleStation" => "SingleStationEventDataset", "SeismicTremor_Network" => "TremorDataset",  "SeismicTremor_Station" => "TremorDataset",  "SeismicIntervalSwarm_Network" => "IntervalDataset",  "SeismicIntervalSwarm_Station" => "IntervalDataset",	"RSAMData" => "RSAM",	"SSAMData" => "SSAM", "RepresentativeWaveform" => "WaveformDataset",	"ElectronicTiltData" => "ElectronicTiltDataset","TiltVectorData" => "TiltVectorDataset",	"StrainMeterData" => "StrainDataset",	"EDMData" => "EDMDataset",	"AngleData" => "AngleDataset",	"GPSData" => "GPSDataset",	"GPSVectors" => "GPSVectorDataset",	"DirectlySampledGas" => "GasSampleDataset",	"SoilEffluxData" => "SoilEffluxDataset", "PlumeData" => "PlumeDataset", "plume_satellite_type" => "PlumeDataset","HydrologicData" => "HydrologicSampleDataset", "MagneticFieldsData" => "MagneticDataset",	"MagnetorVectorData" => "MagneticVectorDataset",	"ElectricFieldsData" => "ElectricDataset",	"GravityData" => "GravityDataset",	"GroundBasedThermalData" => "Ground-basedDataset", "ThermalImage and ThermalImageData" => "ThermalImageDataset","ThermalImage_satellite_type" => "ThermalImageDataset" ,"Insar_satellite_type" => "InSARImageDataset", "LevelingData" => "LevelingDataset","IntensityData" => "IntensityDataset" , "MeteoData" => "MeteoDataset");

$xmlinitagarray = array("EventDataFromNetwork" => "NetworkEvent", "EventDataFromSingleStation" => "SingleStationEvent", "SeismicTremor_Network" => "Tremor",  "SeismicTremor_Station" => "Tremor",  "SeismicIntervalSwarm_Network" => "Interval",  "SeismicIntervalSwarm_Station" => "Interval","RSAMData" => "RSAMData","SSAMData" => "SSAMData", "RepresentativeWaveform" => "Waveform",	"ElectronicTiltData" => "ElectronicTilt",	"TiltVectorData" => "TiltVector",	"StrainMeterData" => "Strain",	"EDMData" => "EDM",	"AngleData" => "Angle",	"GPSData" => "GPS",	"GPSVectors" => "GPSVector",	"DirectlySampledGas" => "GasSample",	"SoilEffluxData" => "SoilEfflux",	"PlumeData" => "Plume",	"plume_satellite_type" => "Plume","HydrologicData" => "HydrologicSample", "MagneticFieldsData" => "Magnetic",	"MagnetorVectorData" => "MagneticVector",	"ElectricFieldsData" => "Electric",	"GravityData" => "Gravity",	"GroundBasedThermalData" => "Ground-based", "ThermalImage and ThermalImageData" => "ThermalImage", "ThermalImage_satellite_type" => "ThermalImage" , "Insar_satellite_type" => "InSARImage", "LevelingData" => "Leveling","IntensityData" => "Intensity", "MeteoData" => "MeteoData");


if(isset($_POST['observ']))
	$observ=$_POST['observ'];

if(isset($_POST['vol2']))
	$vol=$_POST['vol2'];

if(isset($_POST['conv']))
	$conv=$_POST['conv'];
	
if(isset($_POST['network']))
	$network =$_POST['network'];

if(isset($_POST['stat']))
	$station = $_POST['stat'];

if(isset($_POST['stat2']) || isset($_POST['gpsStat2'])){
	if(isset($_POST['stat2']))
		$station2 = $_POST['stat2'];
	else if(isset($_POST['gpsStat2']))
		$station2 = $_POST['gpsStat2'];
	
	$station2=getstation2code($station2,$conv);
}

if(isset($_POST['stat3']) || isset($_POST['gpsStat3'])){
	if(isset($_POST['stat3']))
		$station3 = $_POST['stat3'];
	else if(isset($_POST['gpsStat3']))
		$station3 = $_POST['gpsStat3'];

	$station3=getstation2code($station3,$conv);
}

if(isset($_POST['instrument']))
	$instrument = $_POST['instrument'];

if(isset($_POST['rsam_ssamcode']))
	$rsam_ssamcode= $_POST['rsam_ssamcode'];

if(isset($_POST['eventtype_waveselect']))
	$wav_eventtype= $_POST['eventtype_waveselect'];

if(isset($_POST['eventcode']))
	$wav_eventcode= $_POST['eventcode'];

	
if(isset($_POST['trm_ivl_select'])){    
	if($_POST['trm_ivl_select'] == 'Network'){
		if($conv == "SeismicTremor")
			$conv = "SeismicTremor_Network";
		else if($conv == "IntervalSwarmData")
			$conv = "SeismicIntervalSwarm_Network";
	}else if($_POST['trm_ivl_select'] == 'Station'){	
		if($conv == "SeismicTremor")
			$conv = "SeismicTremor_Station";
		else if($conv == "IntervalSwarmData")
			$conv = "SeismicIntervalSwarm_Station";		
	}
}


if(isset($_POST['airplane'])){     // InsarImage doesn't need to think about 'airplane'
	$airplane=$_POST['airplane'];
	$conv_backup=$conv;           // to use in getinstrcode function

	if($conv == "PlumeData")
		$conv="plume_satellite_type";
	else if($conv == "ThermalImage and ThermalImageData")	
		$conv= "ThermalImage_satellite_type";
}
	
if(isset($_POST['satellite'])){
	$satellite=$_POST['satellite'];
	$conv_backup=$conv;           // to use in getinstrcode function
	
	if($conv == "PlumeData")
		$conv="plume_satellite_type";
	else if($conv == "ThermalImage and ThermalImageData")	
		$conv= "ThermalImage_satellite_type";
	else if($conv == "InSARImage and InSARData")	
		$conv="Insar_satellite_type";
}	
	
	
/*Start connenting to DB */
	
$volcode=getvolcode($vol);        // Get cavw from DB 

if($conv == 'EventDataFromNetwork' || $conv == 'SeismicTremor_Network' || $conv == 'SeismicIntervalSwarm_Network'){
	
	$network=getnetworkcode($network,$conv);  // Get network code from cn / sn table
}
else if($conv=="EventDataFromSingleStation" || $conv == 'SeismicTremor_Station' || $conv == 'SeismicIntervalSwarm_Station' || $conv=="RSAMData" || $conv=="SSAMData" || $conv == "RepresentativeWaveform" ){

	$station=getstationcode($station,$conv);  // Get station code from DB
}
else if($conv == 'ElectronicTiltData' || $conv == 'TiltVectorData' || $conv == 'StrainMeterData' || $conv == 'GPSVectors' || $conv == 'EDMData' || $conv == 'AngleData' || $conv == 'GPSData' || $conv == 'DirectlySampledGas' ||$conv == 'SoilEffluxData' || $conv == 'PlumeData' || $conv == "HydrologicData" || $conv == "MagneticFieldsData" || $conv == "MagnetorVectorData" || $conv == "ElectricFieldsData" || $conv == "GravityData" || $conv == "GroundBasedThermalData" || $conv == "ThermalImage and ThermalImageData" || $conv == "MeteoData"){

	$station=getstationcode($station,$conv);  // Get station code from DB
	$instrument=getinstrcode($instrument,$conv);   // Get instr code from DB 

}
else if($conv == "plume_satellite_type" || $conv == "ThermalImage_satellite_type" || $conv == "Insar_satellite_type"){
	if(isset($airplane)){
		$sat_type="A";
		$air_satellite=getsatellitecode($airplane,$sat_type); // Get Airline code from DB
		$instrument=getinstrcode($instrument,$conv_backup);   // Get instr code from DB 
	}else if(isset($satellite)){
		$sat_type="S";
		$air_satellite=getsatellitecode($satellite,$sat_type); // Get satellite code from DB
	}
	
}


// prepare to get first 2 digits of cavw & second 2 digits of cavw for waveform,insar,thermal imagelink.
$first2digitvol=substr($volcode,0,2);
$second2digitvol=substr($volcode,2,2);


//prepare the directory of output file
$infilepath="../../../../incoming/to_be_translated/";
$outputfilepath="../../../../incoming/translated/";     


if($_FILES['fname1']['name']!="" ){
	$fname1_info = checkfile('fname1',$infilepath);
	
	if($fname1_info['error'] != "noerror"){
		$fileerrors=$fname1_info['error'];
		include "showxmlresult_ng.php";
		exit();
	}

	$handle=fopen($fname1_info['infile'],"r");            // Read CSV Header
	$csvheader=fgetcsv($handle);
	
	$filesize=$fname1_info['filesize'];
	$filename=$fname1_info['filename'];
	
	$outputfilename=substr($fname1_info['filename'],0,-4).".xml"; 
	$outfile=$outputfilepath.$outputfilename;
}	
if($_FILES['fname']['name']!="" ){
	$fname_info = checkfile('fname',$infilepath);

	if($fname_info['error'] != "noerror"){
		$fileerrors=$fname_info['error'];
		include "showxmlresult_ng.php";
		exit();
	}
	$handle=fopen($fname_info['infile'],"r");            // Read CSV Header
	$csvheader=fgetcsv($handle);
	
	$filesize = $fname_info['filesize'];
	$filename =$fname_info['filename'];
		
	$outputfilename=substr($fname_info['filename'],0,-4).".xml"; 
	$outfile=$outputfilepath.$outputfilename;	
}	
if($_FILES['secondname']['name']!="" ){

	$secondname_info = checkfile('secondname',$infilepath);

	if($secondname_info['error'] != "noerror"){
		$fileerrors=$secondname_info['error'];
		include "showxmlresult_ng.php";
		exit();
	}
	
	$filename2=$secondname_info['filename'];
	
	$handle2 =fopen($secondname_info['infile'],"r");            // Read CSV Header
	$filesize2 = $secondname_info['filesize'];
}	



$datatype = $findtable[$conv];
$xmldataheaderset =$xmldataheadersetarray[$conv];
$xmldataset = $xmldatasetarray[$conv];
$xmlinitag = $xmlinitagarray[$conv];

$datacode=$datatype."_code";             // Prepare to get like sd_evn_code
$datapubdate=$datatype."_pubdate";      // Prepare to get like sd_evn_pubdate


$newfileheader=getxmlheader($datatype);     //Read xml header
$xmlheader=array_keys($newfileheader);


$xmlheadersize=sizeof($xmlheader);
$csvheadersize=sizeof($csvheader);


if($csvheadersize < $xmlheadersize){     // Double check csv file again. 
	$fileerrors = "CSV error. Please Check your CSV again!";
	include "showxmlresult_ng.php";
	exit();
}

for($i=0;$i<$xmlheadersize;$i++){         //Compare csv and xml Header
	$x=$xmlheader[$i];
	for($j=0;$j<$csvheadersize;$j++){
		if($x == $csvheader[$j]){
			break;
		}
	}
	$order[$i]=$j;
}

// Try to get index 

$codeindex = array_search($datacode,$csvheader);
$pubindex = array_search($datapubdate,$csvheader);
$owner2index = array_search('cc_id2',$csvheader);
$owner3index = array_search('cc_id3',$csvheader);

if($conv == "DirectlySampledGas"){
	$gdtypeindex = array_search('gd_species',$csvheader);
	$gdwaterflagindex = array_search('gd_waterfree_flag',$csvheader);
	$gdconcentindex = array_search('gd_concentration',$csvheader);
	$gdconcenterrindex = array_search('gd_concentration_err',$csvheader);
	$gdunitsindex = array_search('gd_units',$csvheader);
	$gdrecalcindex = array_search('gd_recalc',$csvheader);
}

if($conv == 'PlumeData' || $conv=="plume_satellite_type"){

	$gdplutypeindex = array_search('gd_plu_species',$csvheader);
	$gdpluemitindex = array_search('gd_plu_emit',$csvheader);
	$gdpluemiterrindex = array_search('gd_plu_emit_err',$csvheader);
	$gdpluunitindex = array_search('gd_plu_units',$csvheader);
	$gdplurecalcindex = array_search('gd_plu_recalc',$csvheader);		
}

if($conv == 'HydrologicData'){
	$hdtypeindex = array_search('hd_comp_species',$csvheader);
	$hdcontentindex = array_search('hd_comp_content',$csvheader);
	$hdcontenterrindex = array_search('hd_comp_content_err',$csvheader);
	$hdunitindex = array_search('hd_comp_units',$csvheader);		
}

if($conv == "RSAMData"){
	$rsam_ssam_stimeindex = array_search('sd_rsm_stime',$csvheader);		
}	

if($conv == "SSAMData"){	
	$rsam_ssam_stimeindex = array_search('sd_ssm_stime',$csvheader);
}	
if($conv == "LevelingData"){
	$instrumentindex = array_search('di_gen_id',$csvheader);
	$refStationindex = array_search('ds_id_ref',$csvheader);
	$firstBMStationindex = array_search('ds_id1',$csvheader);
	$secondBMStationindex = array_search('ds_id2',$csvheader);
}
if($conv == "IntensityData"){	
	$sd_int_timeindex = array_search('sd_int_time',$csvheader);
}
if($conv=="ThermalImage and ThermalImageData" || $conv == "ThermalImage_satellite_type"){ 
	$imagelink="../../../../region/".$first2digitvol."/".$second2digitvol."/thermal";
	$td_jpg_index = array_search('td_img_path',$xmlheader);   //take index from xml 
}
if($conv == "RepresentativeWaveform"){
	$imagelink="../../../../region/".$first2digitvol."/".$second2digitvol."/waveform";
	$sd_wav_arch_index = array_search('sd_wav_arch',$xmlheader);   //take index from xml 
}
if($conv == "Insar_satellite_type"){        // InSARImage and InSARData
	$imagelink="../../../../region/".$first2digitvol."/".$second2digitvol."/insar";
	$dd_sar_imgpath_index = array_search('dd_sar_img_path',$xmlheader);   //take index from xml 
}

$xmlbody = "";
$count=0;
$rsam_ssam_stime= array();
$sd_int_time=array();

$ordersize=sizeof($order);


while(!feof($handle)){

	$orgline=fgetcsv($handle);


	if($orgline == ""){     // Try to remove empty last row from csv file if file has empty row at EOF
		break;
	}	
	
	$count++;              // Get total csv rows without csv header and minus empty last row if it is.
	

	for($i=0;$i<$ordersize;$i++){
		$sortedline[$i] =  $orgline[$order[$i]];
	}
	
	if($conv == "ThermalImage and ThermalImageData" || $conv == "ThermalImage_satellite_type"){ 
		$sortedline[$td_jpg_index] = $imagelink;
	}	
	
	if($conv == "RepresentativeWaveform"){
		$sortedline[$sd_wav_arch_index] = $imagelink;
	}
	
	if($conv == "Insar_satellite_type"){  // InSARImage and InSARData
		$sortedline[$dd_sar_imgpath_index] = $imagelink;
	}
	
	
	// get a code
	$code = $orgline[$codeindex];
	
	//Get Pubdate  
	if($pubindex){
		$pubdate = $orgline[$pubindex];	
		
		if($pubdate != '' && $pubdate != 'NULL'){
			$pubdate =" pubDate=\"$pubdate\"";			
		}else{
			$pubdate ="";
		}
	}else{
		$pubdate ="";
	}
	
	
	//Get owner2
	if($owner2index){
		$owner2 = $orgline[$owner2index];	
		
		if($owner2 != '' && $owner2 != 'NULL'){
			$owner2=" owner2=\"$owner2\"";
		}else{
			$owner2="";
		}
	}else{
		$owner2="";
	}	
	
	//Get owner3
	if($owner3index){
		$owner3 = $orgline[$owner3index];	
		
		if($owner3 != '' && $owner3 != 'NULL'){
			$owner3=" owner3=\"$owner3\"";
		}else{
			$owner3="";
		}
	}else{
		$owner3="";
	}	
	
	getxml_head_foot($conv,$xmldataheaderset,$xmldataset,$xmlinitag,$outputxmlhead,$outputxmlfooter);	
	
	if($conv=="EventDataFromNetwork" || $conv=="SeismicTremor_Network" || $conv == 'SeismicIntervalSwarm_Network'){ 

		$r	= "\n\t<$xmlinitag code=\"$code\" network=\"$network\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
	
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;

	}
	else if($conv=="EventDataFromSingleStation" || $conv=="SeismicTremor_Station" || $conv == "SeismicIntervalSwarm_Station" ){ 

		$r	= "\n\t<$xmlinitag code=\"$code\" station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;

	}
	else if($conv=="ElectronicTiltData" || $conv == "TiltVectorData" || $conv == "StrainMeterData" || $conv == "GPSVectors" || $conv == "GroundBasedThermalData" || $conv == 'SoilEffluxData' || $conv == "MagnetorVectorData" || $conv == "MeteoData"){

		
		$r	= "\n\t<$xmlinitag code=\"$code\" station=\"$station\" instrument=\"$instrument\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;	

	} 
	else if($conv == 'EDMData'){
		$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" station=\"$station\" targetStation=\"$station2\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;		
	}
	else if($conv == 'AngleData'){
	
		$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" station=\"$station\" targetStation1=\"$station2\" targetStation2=\"$station3\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;		
	}
	else if($conv == 'GPSData'){
	
		if($station2 == ""){
			$refStation1 = "";
		}else{
		   $refStation1 = " refStation1='".$station2."'";
		}
		
		if($station3 == ""){
			$refStation2 = "";
		}else{
		   $refStation2 = " refStation2='".$station3."'";
		}
		
		
		$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" station=\"$station\"$refStation1$refStation2 owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;		
	} 
	else if($conv=="DirectlySampledGas"){
	
		$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
	
		
		$type = $orgline[$gdtypeindex];	
		$waterFree = $orgline[$gdwaterflagindex];	

		$r .= "\t\t<GasSpecies type=\"$type\" waterFree=\"$waterFree\">";
		
		if($gdconcentindex){
			$concentration = $orgline[$gdconcentindex];	
			if($concentration != '' && $concentration != 'NULL'){
				$r .="\n\t\t\t<concentration>".$concentration."</concentration>"; 
			}
		}

		if($gdconcenterrindex){
			$concentrationUnc = $orgline[$gdconcenterrindex];	
			if($concentrationUnc != '' && $concentrationUnc != 'NULL'){
				$r .="\n\t\t\t<concentrationUnc>".$concentrationUnc."</concentrationUnc>"; 
			}
		}
		if($gdunitsindex){
			$units = $orgline[$gdunitsindex];	
			if($units != '' && $units != 'NULL'){
				$r  .="\n\t\t\t<units>".$units."</units>"; 
			}
		}
		if($gdrecalcindex){
			$recalculated = $orgline[$gdrecalcindex];	
			if($recalculated != '' && $recalculated != 'NULL'){
				$r .="\n\t\t\t<recalculated>".$recalculated."</recalculated>"; 
			}
		}
		$r .="\n\t\t</GasSpecies>\n";
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;		
	}
	else if($conv == 'PlumeData' || $conv=="plume_satellite_type"){
	
		if($conv == 'PlumeData'){
			$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" station=\"$station\" volcano=\"$volcode\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";			
		}else{
			if(isset($airplane)){
				$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" airplane=\"$air_satellite\" volcano=\"$volcode\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";						
			}
			else if(isset($satellite)){
				$r	= "\n\t<$xmlinitag code=\"$code\" satellite=\"$air_satellite\" volcano=\"$volcode\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";						
			}				
		}
		
		$type = $orgline[$gdplutypeindex];		

		$r .= "\t\t<PlumeSpecies type=\"$type\">";
		
		if($gdpluemitindex){
			$emissionRate = $orgline[$gdpluemitindex];	
			if($emissionRate != '' && $emissionRate != 'NULL'){
				$r .="\n\t\t\t<emissionRate>".$emissionRate."</emissionRate>"; 
			}
		}
		if($gdpluemiterrindex){
			$emissionRateUnc = $orgline[$gdpluemiterrindex];	
			if($emissionRateUnc != '' && $emissionRateUnc != 'NULL'){
				$r .="\n\t\t\t<emissionRateUnc>".$emissionRateUnc."</emissionRateUnc>"; 
			}
		}
		if($gdpluunitindex){
			$units = $orgline[$gdpluunitindex];	
			if($units != '' && $units != 'NULL'){
				$r .="\n\t\t\t<units>".$units."</units>"; 
			}
		}
		if($gdplurecalcindex){
			$recalculated = $orgline[$gdplurecalcindex];	
			if($recalculated != '' && $recalculated != 'NULL'){
				$r .="\n\t\t\t<recalculated>".$recalculated."</recalculated>"; 
			}
		}
		$r .="\n\t\t</PlumeSpecies>\n";
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;	
	
	}
	else if($conv == 'HydrologicData'){
		
		$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	

		$type = $orgline[$hdtypeindex];		

		$r .= "\t\t<HydrologicSpecies type=\"$type\">";
		
		if($hdcontentindex){
			$content = $orgline[$hdcontentindex];	
			if($content != '' && $content != 'NULL'){
				$r .="\n\t\t\t<content>".$content."</content>"; 
			}
		}
		if($hdcontenterrindex){
			$contentUnc = $orgline[$hdcontenterrindex];	
			if($contentUnc != '' && $contentUnc != 'NULL'){
				$r .="\n\t\t\t<contentUnc>".$contentUnc."</contentUnc>"; 
			}
		}
		if($hdunitindex){
			$units = $orgline[$hdunitindex];	
			if($units != '' && $units != 'NULL'){
				$r .="\n\t\t\t<units>".$units."</units>"; 
			}
		}

		$r .="\n\t\t</HydrologicSpecies>\n";
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;		
		
	}
	else if($conv == "MagneticFieldsData"  || $conv == "ElectricFieldsData" || $conv == "GravityData"){

		if($conv == "MagneticFieldsData"){
			
			$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" station=\"$station\" refStation=\"$station2\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";					
		}
		else if($conv == "ElectricFieldsData" || $conv == "GravityData"){
			
			$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" refStation1=\"$station\" refStation2=\"$station2\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";				
		}	
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;		
	
	}
	else if($conv == "RSAMData" ||  $conv=="SSAMData"){

		$rsam_ssam_stime[] = $orgline[$rsam_ssam_stimeindex];
		
		$r	= "\n\t<$xmlinitag>\n";
		
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;			
	}
	else if($conv == "Insar_satellite_type"){

		$r	= "\n\t<$xmlinitag code=\"$code\" satellite=\"$satellite\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";
		
		
		$r = convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
		$r .= convert_insar_pixel($handle2,$count2);

		$r .= "\n\t</$xmlinitag>";
		$xmlbody .=$r;	
	
	}
	else if($conv=="ThermalImage and ThermalImageData" || $conv == "ThermalImage_satellite_type"){ 

		if(isset($airplane)){
			$r	= "\n\t<ThermalImage code=\"$code\" instrument=\"$instrument\" airplane=\"$air_satellite\" volcano=\"$volcode\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";
		}else if(isset($satellite)){
			$r	= "\n\t<ThermalImage code=\"$code\" satellite=\"$air_satellite\" volcano=\"$volcode\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";		
		}else{
			$r	= "\n\t<ThermalImage code=\"$code\" instrument=\"$instrument\" station=\"$station\" volcano=\"$volcode\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";		
		}	
		
		$r 	= convert_xml($r,$newfileheader,$sortedline,$xmlheader);  //convert to xml
		$r .= convert_td_pixel($handle2,$count2);
		
		$r .= "\n\t</ThermalImage>";
		$xmlbody .=$r;		
	
	}
	else if($conv=="LevelingData"){ 
	
		if($instrumentindex)
			$instrument = $orgline[$instrumentindex];	
		if($refStationindex)
			$refStation = $orgline[$refStationindex];			
		if($firstBMStationindex)
			$firstBMStation = $orgline[$firstBMStationindex];			
		if($secondBMStationindex)
			$secondBMStation = $orgline[$secondBMStationindex];			
		
		
		$r	= "\n\t<$xmlinitag code=\"$code\" instrument=\"$instrument\" refStation=\"$refStation\" firstBMStation=\"$firstBMStation\" secondBMStation=\"$secondBMStation\"owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
	
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;

	}
	else if($conv == "RepresentativeWaveform"){  //Waveform event code come from "FORM POST" value 

		$wav_eventtype= $_POST['eventtype_waveselect'];

		$wav_eventcode= trim($_POST['eventcode']);
			
		if($wav_eventtype == "EventDataFromNetwork"){
			$eventtype="networkEvent=\"$wav_eventcode\"";
		}
		else if($wav_eventtype == "EventDataFromSingleStation"){
			$eventtype="singleStationEvent=\"$wav_eventcode\""; 
		}
		else if($wav_eventtype == "SeismicTremor"){
			$eventtype="tremor=\"$wav_eventcode\"";
		}
		else{
			$eventtype="";
		}				

				
		$r	= "\n\t<$xmlinitag code=\"$code\" $eventtype station=\"$station\" owner1=\"$observ\"$owner2$owner3$pubdate>\n";	
	
		$r  =  convert_xml($r,$newfileheader,$sortedline,$xmlheader); //convert to xml
		
		$r .= "\t</$xmlinitag>";
		$xmlbody .=$r;		
		
	}
	if($conv == "IntensityData"){	
		$sd_int_time[] = $orgline[$sd_int_timeindex];
	}	
} 
	fclose($handle);


	if($conv == "RSAMData" ||  $conv=="SSAMData"){
	
		$firstdate=substr($rsam_ssam_stime[0],0,10);
		$firsttime=substr($rsam_ssam_stime[0],10);

		$seconddate=substr($rsam_ssam_stime[1],0,10);
		$secondtime=substr($rsam_ssam_stime[1],10);

		
		$cntInterval=datetime2unix($seconddate,$secondtime,$sepd="-")-datetime2unix($firstdate,$firsttime,$sepd="-");
		$startTime=$rsam_ssam_stime[0];
		
	
		$endTime=$rsam_ssam_stime[sizeof($rsam_ssam_stime)-1];		
		$dateinsec=strtotime($endTime);		
		$newdate=$dateinsec+$cntInterval;		
		$endTime=date('Y-m-d H:i:s',$newdate);		
		
		$outputxmlhead .= "\n<RSAM-SSAM code=\"$rsam_ssamcode\" station=\"$station\" owner1=\"$observ\">"; 
		$outputxmlhead .= "\n<cntInterval>$cntInterval</cntInterval>"; 
		$outputxmlhead .= "\n<startTime>$startTime</startTime>"; 	
		$outputxmlhead .= "\n<endTime>$endTime</endTime>"; 
		$outputxmlhead .= "\n<$xmldataset>"; 	
	}	
	
	if($conv == 'IntensityData'){    // IntensityData link to intensity_csvxml__view_ng.php and continue from that page

		$int_time = sizeof($sd_int_time);
		
		for($j=0;$j<$int_time;$j++){
			$intensity_time[$j]=geteventnet_eventstat_time($sd_int_time[$j]);
		}
		include "intensity_csvxml__view_ng.php";
		exit();

	}
	
	
	$fullxml=$outputxmlhead.$xmlbody.$outputxmlfooter;
	
	// Write XML to file
	$outhandle = fopen($outfile, 'w');
	fwrite($outhandle, $fullxml);
	fclose($outhandle);

	//To distinguish whether a,b,c on line '143' & '168' in showxmlresult_ng.php  coz added additional folder for option 'c'
	$option="a/b";

	include "showxmlresult_ng.php";      //Show every results here...        

?>


