var ONE_YEAR = ((new Date("0002-01-01T00:00:00")).getTime() - (new Date("0001-01-01T00:00:00")).getTime());
var ds_plot = [];
ds_plot.push("#data_series_graph1");
ds_plot.push("#data_series_graph2");
ds_plot.push("#data_series_graph3");
ds_plot.push("#data_series_graph4");
var ds_plot_graph = [];
vd_cavw = [];
var ds_overview_plot;
function showTooltip(x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css( {
        position: 'absolute',
        display: 'none',
        top: y + 5,
        left: x + 20,
        border: '1px solid #fdd',
        padding: '2px',
        'background-color': '#fee',
        opacity: 0.8
    }).appendTo("body").fadeIn(200);
}

function convertDate(d) {
	var m = d.getMonth()+1;
	m = (m < 10)? '0' + m.toString() : m.toString();
	date = d.getDate();
	date = (date < 10)? '0' + date.toString() : date.toString();
	return (d.getFullYear() + '-' + m + '-' + date);
}

function getUrlParam(param) {
	var query_string = {};
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0; i<vars.length; i++) {
		var pair = vars[i].split("=");
		if (typeof query_string[pair[0]] === "undefined") {
			query_string[pair[0]] = pair[1];
		} else if (typeof query_string[pair[0]] === "string") {
			var arr = [ query_string[pair[0]], pair[1] ];
			query_string[pair[0]] = arr;
		} else {
			query_string[pair[0]].push(pair[1]);
		}
	} 
    return query_string[param];
}

var Observer = function() {
	var events = [];
	return {
		notify: function(event, args) {
			var i, j;
			for (i = 0; i < events.length; i += 1) {
				if (events[i].name === event) {
					for (j = 0; j < events[i].callbacks.length; j += 1) {
						events[i].callbacks[j](args);
					}
				}
			}
		},
		register: function(event, callback) {
			var i,
				found = false;
			for (i = 0; i < events.length; i += 1) {
				if (events[i].name === event) {
					events[i].callbacks.push(callback);
					found = true;
				}
			}
			if (found === false) {
				events.push({
					name: event,
					callbacks: [callback]
				});
			}
		}
	};
}();

$(document).ready(function () {
	
	// Load preset param
	(function() {
		var preset_vd_id = getUrlParam("vd_id"),
			preset_stime = getUrlParam("stime"),
			changed_time = false,
			changed_volcano = false,
			eruption_plot_done = false,
			eruption_forecast_plot_done = false,
			overview_plot_done = false,
			all_done_callback = function() {
				if (preset_vd_id && preset_stime && changed_time === false && eruption_plot_done && eruption_forecast_plot_done && overview_plot_done) {
					changed_time = true;
					$("#eruptionselect").val(preset_stime).change();
				}
			};
		Observer.register("get-volcano-list-done", function() {
			if (changed_volcano === false && preset_vd_id) {
				changed_volcano = true;
				$("#volcano").val(preset_vd_id).change();
			}
		});
		Observer.register("eruption-forecast-plot-done", function() {
			eruption_forecast_plot_done = true;
			all_done_callback();
		});
		Observer.register("eruption-plot-done", function() {
			eruption_plot_done = true;
			all_done_callback();
		});
		Observer.register("overview-plot-done", function() {
			overview_plot_done = true;
			all_done_callback();
		});
	}());

	DataPuller.getVolcanoList({handler: function(args) {
		var data = args.data;
		var volcanoSelect = $("#volcano");
		volcanoSelect.empty();
		volcanoSelect.append(new Option("...", ""));
		for (var i = 0; i < data.length; i++) {
			var option = new Option( data[i]['vd_name'], data[i]['vd_id']);
			//data[i]['vd_id'] + ". "+
			option.setAttribute("cavw", data[i]['vd_cavw']);			
			volcanoSelect.append(option);
		}
		Observer.notify("get-volcano-list-done");
	}});

	
	/*
	*	when user select a volcano
	*/
	$("#volcano").change(function() {
		eruptionSelect = $('#eruptionselect');
		eruptionSelect.empty();
		//eruptionSelect.append(new Option("...", null));
		$('#data_series_checkbox').empty();
	
		var volcano = $("#volcano").val();
		cavw = $("#volcano option:selected").attr("cavw");
		
		DataPuller.getEruptionList({vd_id: volcano, handler: plotEruption});
		DataPuller.getEruptionForecastList({vd_id: volcano, handler: plotEruptionForecast});
		DataPuller.getDataList({vd_id: volcano, vd_cavw: cavw, handler: plotOverview});
	});

	$("#eruptionselect").change(function() {
		if ($('#eruptionselect option:selected').text() === "...") {return 0;}

		stime = parseInt(eruptionSelect.val());
		ntime = {min: stime, max: stime + ONE_YEAR};

		$.extend(eruption_plot.getAxes().xaxis.options, ntime);
		eruption_plot.setupGrid();
		eruption_plot.draw();
		sync();
	});
	
	var sync = function () {
		stime = eruption_plot.getAxes().xaxis.options.min;
		etime = eruption_plot.getAxes().xaxis.options.max;
		ntime = {min: stime, max: etime};
		$.extend(eruption_forecast_plot.getAxes().xaxis.options, ntime);
		eruption_forecast_plot.setupGrid();
		eruption_forecast_plot.draw();
		if (ds_overview_plot) {
			$.extend(ds_overview_plot.getAxes().xaxis.options, ntime);
			ds_overview_plot.setupGrid();
			ds_overview_plot.draw();
			$.extend(ds_plot_graph[0].getAxes().xaxis.options, ntime);
			ds_plot_graph[0].setupGrid();
			ds_plot_graph[0].draw();
		}
	}
	
	$("#eruption_graph").bind("plotpan", sync);
	$("#eruption_graph").bind("plotzoom", sync);

	

});
