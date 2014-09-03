function convert(str) {
	var data = [];
	var stns = str.split(";");
	for(var i in stns) {
		temp = stns[i].split("&");
		if (temp.length < 2) break;
		stn = {
			type: temp[0].toLowerCase(),
			table: temp[1],
			code: temp[2],
			lat: temp[3],
			lon: temp[4],
		} 
		if (temp[5]) stn.component = temp[5];
		data.push({
			station: stn
		});		
	}
	return data;
}

function plotOverview(args) {
	ds_data = [];
	var data_stn = convert(args.data);
	data_series = [];
	
	var max_data = -1000;
	var min_data = 1000;
	
	window.ds_selection_box = $("#data_series_checkbox");
	document.getElementById("data_series_checkbox").style.display = "block";
	document.getElementById("data_series_box").style.display = "block";

	$.each(data_stn, function(key, val) {
		str = val['station']['table'];
		if (val['station']['component']) str = str + '-' + val['station']['component'];
		$("#data_series_checkbox").append("<input type='checkbox' name='" + key +
			"' id='id" + key + "'></input>" +
			"<label for='id" + key + "'>"
			+ str + ' (' + val['station']['code'] + ")</label><br>	");			
	});

	ds_selection_box.find("input").click(plotAccordingToChoices);
	param_dso = [];

	
	var option_ds = {
		grid: {
			hoverable: true,
		},

		xaxis: {
			min: eruption_plot.getAxes().xaxis.options.min,
			max: eruption_plot.getAxes().xaxis.options.max,
			autoscale: true,
			mode: "time",
			timeformat: "%Y-%m",
			//tickSize: [1, "month"]
			//timeformat: "%Y-%m-%d %H:%M:%S"
		},
		yaxis: {
			//min: min_data,	max: max_data,
			autoscale: true,
	//		tickFormatter: function(val, axis) { return val < axis.max ? val.toFixed(2) : "VEI";}
		},

	};
	
	function prepareData() {
		var data_series = [];
		for(var i in ds_data) {
			var d = ds_data[i].data;
			data_series[i] = [];
			for(var j in d) {
				ds = d[j];
				//ds.component_data = parseInt(ds.component_data);
				data_series[i].push([ds[0], ds[1], 0, ds.etime - ds[0],ds,ds_data[i].sinfo]);
			}			
		}
		return data_series;
	}

	function redrawGraph() {
		var data = prepareData();
		var cnt = 0;
		param_dso = [];
		$("#data_series_overview").empty();
		for (i in ds_plot) {
			$(ds_plot[i]).empty();
		}
		
		for (i in data) {
			param_dso.push({
			data: data[i],
			lines: {
					show: true,
					wovodat: true
				},
				dataType: "dso",
			});
			cnt = cnt + 1;
		}
		var option = {
			grid: {
				hoverable: true,
			},
			xaxis: {
				min: eruption_plot.getAxes().xaxis.options.min,
				max: eruption_plot.getAxes().xaxis.options.max,
				autoscale: true,
				mode: "time",
				timeformat: "%Y-%m",
				tickSize: [1, "month"]
				
				//timeformat: "%Y-%m-%d %H:%M:%S"
			},
			yaxis: {
				//min: min_data,	max: max_data,
				autoscale: true,
				//tickFormatter: function(val, axis) { return val < axis.max ? val.toFixed(2) : "VEI";}
			},
		};
		if (param_dso.length > 0) 
			window.ds_overview_plot = $.plot($("#data_series_overview"), param_dso, option);
		
		
		var option_ds = {
			grid: {
				hoverable: true,
			},

			xaxis: {
				min: eruption_plot.getAxes().xaxis.options.min,
				max: eruption_plot.getAxes().xaxis.options.max,
				autoscale: true,
				mode: "time",
				timeformat: "%Y-%m",
				//tickSize: [1, "month"]
				//timeformat: "%Y-%m-%d %H:%M:%S"
			},
			yaxis: {
				//min: min_data,	max: max_data,
				autoscale: true,
		//		tickFormatter: function(val, axis) { return val < axis.max ? val.toFixed(2) : "VEI";}
			},
		};
		for (i in param_dso) {
			param = [];
			param.push({
				data : param_dso[i].data,
				bars : {show: true, wovodat:true},
				dataType: "ds",
			});
			console.log(param);
			ds_plot_graph[i] = $.plot($(ds_plot[i]), param,option_ds);
			$(ds_plot[i]).bind("plothover", function(event, pos, item) {
				if (item) {
					$("#tooltip").remove();
					var content;
					
					var ds_data = item.series.data[item.dataIndex][4];
					var sinfo = item.series.data[item.dataIndex][5].station;
					content = new Date(ds_data[0]).toLocaleDateString();
					content += " to ";
					content += new Date(ds_data.etime).toLocaleDateString();
					content += "<br/>";
					content += sinfo['table'];
					if (sinfo['component']) content += "-" + sinfo['component'];
					
					content += ": " + item.series.data[item.dataIndex][1];
					/*content = ds_data.ed_for_alevel + "<br/>";
					content += new Date(ds_data.ed_for_astime).toLocaleDateString();
					content += " to ";
					content += new Date(ds_data.ed_for_aetime).toLocaleDateString();
					*/
					showTooltip(pos.pageX, pos.pageY, content);
				} else {
					$("#tooltip").remove();
					previousItem = null;            
				}	
			});			
		}
	}
	
	function updateGraph(args) {
		ds_data.push({data: args.data[0], key : args.key, sinfo: args.sinfo });
		redrawGraph();
		
	}
	
	function plotAccordingToChoices() {
		var $this = $(this);
		if( $this.is(':checked') == true ) {
			DataPuller.getStationData({sinfo: data_stn[$this.attr("name")], key : $this.attr("name"), handler: updateGraph});
		} else {
			for (var i in ds_data) {
				if (ds_data[i].key == $this.attr("name")) {
					ds_data.splice(i,1);
					break;
				}
			}
			redrawGraph();
		}
	}

	WOVODAT.observer.notify("overview-plot-done");
}
