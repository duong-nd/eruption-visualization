WOVODAT.registerModule("utility", [], function(sandbox) {
	return {
		init: function() {
		},
		getUrlParam: function(param) {
			var query_string = {};
			var query = window.location.search.substring(1);
			var vars = query.split("&");
			for (var i = 0; i < vars.length; i++) {
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
	}
});

WOVODAT.registerModule("content", ["utility"], function(sandbox) {
	var preset_vd_id = sandbox.modules["utility"].getUrlParam("vd_id"),
		preset_stime = sandbox.modules["utility"].getUrlParam("stime"),
		changed_time = false,
		changed_volcano = false,
		eruption_plot_done = false,
		eruption_forecast_plot_done = false,
		overview_plot_done = false,
		all_done_callback = function() {
			if (preset_vd_id && preset_stime && changed_time === false && eruption_plot_done && eruption_forecast_plot_done && overview_plot_done) {
				changed_time = true;			
				preset_stime = moment.utc(preset_stime,"YYYY-MM-DDTHH:mm:ss Z");
				console.log(preset_stime);
				console.log(preset_stime.unix());
				var eruptionSelect = document.getElementById("eruptionselect"); 
				for (var i = 0; i < eruptionSelect.length; i ++) {
					if (Math.abs(eruptionSelect[i].value - preset_stime) < THREE_HRS){
						$("#eruptionselect").val(eruptionSelect[i].value).change();
						break;
					}
				}
				//if ($('#eruptionselect option[value="' + preset_stime + '"]').length > 0) $("#eruptionselect").val(preset_stime).change();
			}
		};
	return {
		init: function() {
			sandbox.observer.register("get-volcano-list-done", function() {
				if (changed_volcano === false && preset_vd_id) {
					changed_volcano = true;
					$("#volcano").val(preset_vd_id).change();
				}
			});
			sandbox.observer.register("eruption-forecast-plot-done", function() {
				eruption_forecast_plot_done = true;
				all_done_callback();
			});
			sandbox.observer.register("eruption-plot-done", function() {
				eruption_plot_done = true;
				all_done_callback();
			});
			sandbox.observer.register("overview-plot-done", function() {
				overview_plot_done = true;
				all_done_callback();
			});

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
				sandbox.observer.notify("get-volcano-list-done");
			}});

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
		}
	};
});

WOVODAT.registerModule("volcano", [], function(sandbox) {
	return {
		init: function() {
			$("#volcano").change(function() {
				sandbox.observer.notify("volcano-change");

				eruptionSelect = $('#eruptionselect');
				eruptionSelect.empty();
				
				$('#data_series_checkbox').empty();
			
				var volcano = $("#volcano").val();
				cavw = $("#volcano option:selected").attr("cavw");
				
				DataPuller.getEruptionList({vd_id: volcano, handler: plotEruption});
				DataPuller.getEruptionForecastList({vd_id: volcano, handler: plotEruptionForecast});
				DataPuller.getDataList({vd_id: volcano, vd_cavw: cavw, handler: plotOverview});
			});
		}
	};	
});

WOVODAT.registerModule("data_series_overview", [], function(sandbox) {
	var clear = function() {
		$("#data_series_overview").html("");
	};
	return {
		init: function() {
			sandbox.observer.register("volcano-change", clear);
		}
	};
});

WOVODAT.registerModule("data_series_graphs", [], function(sandbox) {
	var clear = function() {
		$("#graph1_title").html("");
		$("#graph2_title").html("");
		$("#graph3_title").html("");
		$("#graph4_title").html("");
		$("#data_series_graph1").html("");
		$("#data_series_graph2").html("");
		$("#data_series_graph3").html("");
		$("#data_series_graph4").html("");
	};
	return {
		init: function() {
			sandbox.observer.register("volcano-change", clear);
		}
	};
});