// Change data type
function changedDataType() {
	$.ajax({
		method: "get", 
		url: "/php/get_stations.php", 
		data: 'dataType=' + $("#dataType :selected").val(),
		beforeSend: function(){$("#filLoading").show("fast");},
		complete: function(){$("#filLoading").hide("fast");},
		success: function(html){		
		$("#selectStationDiv").html(html);
		}
	});
}
  
function stationcheck() {
	$.ajax({
		method: "get", 
		url: "/php/check_stations_try.php",
		data: "vd_id=" + $("#vd_name").val() + '&vd_name=' + $("#vd_name :selected").text(),
		beforeSend: function(){$("#filLoading").show("fast");},
		complete: function(){$("#filLoading").hide("fast");},
		success: function(html){		
		$("#list_station").html(html);
		}
	});
}

function datatypecheck() {
	$.ajax({
		method: "get", url: "/php/check_data.php", 
		data: "vd_id=" + $("#vd_name").val(),
		beforeSend: function(){$("#filLoading").show("fast");},
		complete: function(){$("#filLoading").hide("fast");},
		success: function(html){		
		$("#selectData").html(html);
	}
	});
}

// Show spatial div
  function showSpatial()
  {
	window.maporgraph = 0; 
	$('#viewcontent').hide(); 
	$('#bigmap1').height('80%'); 
	$('#bigmap1').width('90%'); 
	$('#temporal').hide(); 
	$('#spatial').show();
	$('#bigmap1').show(); 

	return false;
  }
  
// Show temporal div
  function showTemporal()
  {
	window.maporgraph = 1; 
	$('#viewcontent').show(); 
	$('#temporal').show(); 
	$('#spatial').hide();
	$('#bigmap1').hide(); 
	return false;
  }

// Initialize map
function setupMap(sta){
	if ($("#vd_name").val() != "") {
		$('#viewcontent').hide(); 
		if ($("#filter").val() && $("#dp_max").val() >= $("#dp_min").val()) {
		// Center map on volcano + add stations + add seismic events
			$.ajax({
			  method: "get", url: "/php/getvd_info_pur0.php", 
			  data: "vd_id=" + $("#vd_name").val() + 
			  '&vd_name=' + $("#vd_name :selected").text() + 
				'&date_start=' + $("#ss_start").val() + 
				'&date_end=' + $("#ss_end").val() + 
				'&dr_start=' + $("#dp_min").val() + 
				'&dr_end=' + $("#dp_max").val() + 
				'&filter=' + $("#filter").val() + 
				'&qty=' + $("#events :selected").text() +
				'&eqtype=' + $("#eqtype :selected").val() +
				'&staplot='+sta,
				
			  beforeSend: function(){$("#filLoading").show("fast");},
			  complete: function(){$("#filLoading").hide("fast");},
			  success: function(html){		
			  $("#bigmap1").dialog("destroy");
			  $("#bigmap1").html(html);
			  $("#dataType").val(1);
			  $("#selectStationDiv").html('');
			  }
			});
// Prepare station available
			stationcheck(); 
// Prepare data types
			datatypecheck();
//Plot map			
			$('#bigmap1').show(); 
			$("#temporal").hide();
		}
	}
	else {
		$("#temporal").hide();
		$('#bigmap1').hide(); 
	}
}

	
// To be deleted?
function setupNeighborMap(vid, vname){
	if ($("#filter").val() && $("#dp_max").val() >= $("#dp_min").val()) {
		$.ajax({
		  method: "get", url: "getvd_info_pur0.php", 
		  data: "vd_id=" + vid + 
		  	'&vd_name=' + vname + 
		  	'&date_start=' + $("#ss_start").val() + 
			'&date_end=' + $("#ss_end").val() + 
			'&dr_start=' + $("#dp_min").val() + 
			'&dr_end=' + $("#dp_max").val() + 
			'&filter=' + $("#filter").val() + 
			'&qty=' + $("#events :selected").text() + 
			'&eqtype=' + $("#eqtype :selected").val(),
		  
		  beforeSend: function(){$("#filLoading").show("fast");},
		  complete: function(){$("#filLoading").hide("fast");},
		  success: function(html){		
		  $("#dialog").dialog("destroy");
		  $("#dialog").html(html);
		  $("#dataType").val(0);
		  $("#selectStationDiv").html('');
		  }
		});
	}
	else alert("Invalid Depth Range");
}
	

// Get deformation station - to be deleted?
function getDS() {
   var temp1 = $('#ds_id :selected').text();
   if (temp1 == "Select ds_id:") return;
    $("#ds_id_ref1").slideUp("slow");
	$("#gbutton").hide();
	var ds_id = $('#ds_id :selected').text();
    $.ajax({
      method: "get", url: "getDS.php", 
      data: "ds_id=" + ds_id,
      beforeSend: function(){$("#filLoading").show("fast");},
      complete: function(){$("#filLoading").hide("fast");},
      success: function(html){
      $("#ds_id_ref1").show("fast");
      $("#ds_id_ref1").html(html);
      }
    });
}
  
// When page is loaded
 $(document).ready(function(){
	// Hide elements on load
	$("#filLoading").hide();
	$("#filterSS").hide();
	$("#filterSSG").hide();
	$("#plfil").hide();
	$("#minfil").hide();
	$("#minfilG").hide();
	$("#filterBtn").hide();
	$("#reloadBtn").hide();
	$("#viewcontent").hide();
	$("#temporal").show();

	
	$("#startdate").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#enddate").datepicker({
		changeMonth: true,
		changeYear: true
	});
		$("#ss_start").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#ss_end").datepicker({
		changeMonth: true,
		changeYear: true
	});

	// render as buttons and tabs
	$("button", "#dateBtns").button();
	$("button", "#gbutton").button();
	$("#filterBtn").button();
	$("#reloadBtn").button();
	$("#reloadSta").button();
	$("#reloadEqk").button();
	$("#removeSta").button();
	$("#go2gvp").button();
	$("#viewcontrol").tabs();
	$("#viewcontent").tabs();

	// When remove Sta button is clicked
	$("#go2gvp").click(function() {
			var locat= $("#vd_name :selected").text();
			var locati=locat.split("_");
			open("http://www.volcano.si.edu/world/volcano.cfm?vnum="+locati[1]);
	});

	// When "no filter" is clicked (for temporal div)
	$("#minfilG").click(function() {
			$("#filterSSG").hide("fast");
			$(this).hide();
			$("#filterG").val("0");
			$("#plfilG").show();
	});
	
	// When filter button is clicked
	$("#filterBtn").click(function() {
		$("#plfil").hide();	
		$("#filterSS").hide();
		$(this).hide();
		setupMap(7);
	});
	
	// When reload map button is clicked
	$("#reloadBtn").click(function() {
		setupMap(7);
	});
	
	// When reloadEqk button is clicked
	$("#reloadEqk").click(function() {
		$("#plfil").show();
		setupMap(7);
	});
	
	// When "use filter" is clicked
	$("#plfil").click(function() {
			$("#filterSS").show("fast");
			$("#filterBtn").show();
			$("#reloadBtn").hide();
			$(this).hide();
			$("#filter").val("1");
			$("#minfil").show();
	});
	
	// When "no filter" is clicked
	$("#minfil").click(
		function() {
			$("#filterSS").hide("fast");
			$(this).hide();
			$("#filter").val("0");
			$("#plfil").show();
			$("#filterBtn").hide();
			$("#reloadBtn").hide();
		}
	);

	// When reload Sta button is clicked
	$("#reloadSta").click(function() {
			setupMap(9);
	});
	// When remove Sta button is clicked
	$("#removeSta").click(function() {
			setupMap(0);
	});
	
	// When "use filter" is clicked (for temporal div)
	$("#plfilG").click(function() {
			$("#filterSSG").show("fast");
			$(this).hide();
			$("#filterG").val("1");
			$("#minfilG").show();
	});
	
	window.mapcreated = false;
});