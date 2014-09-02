<?php

// Loop on elements - Search for children
$monitoringsystem_elements=$wovoml_element['value'];
foreach ($monitoringsystem_elements as $monitoringsystem_element) {
	
	// Airplane
	if ($monitoringsystem_element['tag']=="AIRPLANE") {
		include $include_root."ms_airplane.php";
		continue;
	}
	
	// Deformation network
	if ($monitoringsystem_element['tag']=="DEFORMATIONNETWORK") {
		include $include_root."ms_dnetwork.php";
		continue;
	}
	
	// Deformation station
	if ($monitoringsystem_element['tag']=="DEFORMATIONSTATION") {
		include $include_root."ms_dstation.php";
		continue;
	}
	
	// Deformation instrument
	if ($monitoringsystem_element['tag']=="DEFORMATIONINSTRUMENT") {
		include $include_root."ms_dinstrument.php";
		continue;
	}
	
	// Tilt/Strain instrument
	if ($monitoringsystem_element['tag']=="TILTSTRAININSTRUMENT") {
		include $include_root."ms_tsinstrument.php";
		continue;
	}
	
	// Gas network
	if ($monitoringsystem_element['tag']=="GASNETWORK") {
		include $include_root."ms_gnetwork.php";
		continue;
	}
	
	// Gas station
	if ($monitoringsystem_element['tag']=="GASSTATION") {
		include $include_root."ms_gstation.php";
		continue;
	}
	
	// Gas instrument
	if ($monitoringsystem_element['tag']=="GASINSTRUMENT") {
		include $include_root."ms_ginstrument.php";
		continue;
	}
	
	// Hydrologic network
	if ($monitoringsystem_element['tag']=="HYDROLOGICNETWORK") {
		include $include_root."ms_hnetwork.php";
		continue;
	}
	
	// Hydrologic station
	if ($monitoringsystem_element['tag']=="HYDROLOGICSTATION") {
		include $include_root."ms_hstation.php";
		continue;
	}
	
	// Hydrologic instrument
	if ($monitoringsystem_element['tag']=="HYDROLOGICINSTRUMENT") {
		include $include_root."ms_hinstrument.php";
		continue;
	}
	
	// Fields network
	if ($monitoringsystem_element['tag']=="FIELDSNETWORK") {
		include $include_root."ms_fnetwork.php";
		continue;
	}
	
	// Fields station
	if ($monitoringsystem_element['tag']=="FIELDSSTATION") {
		include $include_root."ms_fstation.php";
		continue;
	}
	
	// Fields instrument
	if ($monitoringsystem_element['tag']=="FIELDSINSTRUMENT") {
		include $include_root."ms_finstrument.php";
		continue;
	}
	
	// Thermal network
	if ($monitoringsystem_element['tag']=="THERMALNETWORK") {
		include $include_root."ms_tnetwork.php";
		continue;
	}
	
	// Thermal station
	if ($monitoringsystem_element['tag']=="THERMALSTATION") {
		include $include_root."ms_tstation.php";
		continue;
	}
	
	// Thermal instrument
	if ($monitoringsystem_element['tag']=="THERMALINSTRUMENT") {
		include $include_root."ms_tinstrument.php";
		continue;
	}
	
	// Seismic network
	if ($monitoringsystem_element['tag']=="SEISMICNETWORK") {
		include $include_root."ms_snetwork.php";
		continue;
	}
	
	// Seismic station
	if ($monitoringsystem_element['tag']=="SEISMICSTATION") {
		include $include_root."ms_sstation.php";
		continue;
	}
	
	// Seismic instrument
	if ($monitoringsystem_element['tag']=="SEISMICINSTRUMENT") {
		include $include_root."ms_sinstrument.php";
		continue;
	}
	
	// Seismic component
	if ($monitoringsystem_element['tag']=="SEISMICCOMPONENT") {
		include $include_root."ms_scomponent.php";
		continue;
	}
	
}
?>