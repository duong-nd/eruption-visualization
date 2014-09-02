
function plotEruption(args) {
	var data = args.data;
	var ed_data = [];
	var ed_phs_data = [];
	var end_of_time = 0;


	function convertDate(d) {
		return (d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate());		
	}

	function initData() {

		for(var i in data) {
			var ed = data[i];
			console.log(ed.ed_stime);
			ed.ed_stime = parseInt(ed.ed_stime);
			ed.ed_etime = parseInt(ed.ed_etime);
			ed.ed_vei = parseInt(ed.ed_vei);

			if(ed.ed_etime == 0) {
				ed.ed_etime = new Date().getTime();
			}

			console.log(new Date(ed.ed_stime));
			eruptionSelect.append(new Option(convertDate(new Date(ed.ed_stime)), ed.ed_stime));


			var ed_stime = ed.ed_stime;
			var ed_etime = ed.ed_etime;
			var ed_vei = ed.ed_vei;
			ed_data.push([ed_stime, ed_vei, 0, ed_etime - ed_stime, ed]);

			end_of_time = Math.max(end_of_time, ed_etime);

			for(var j in ed.ed_phs) {
				var ed_phs = ed.ed_phs[j];
				ed_phs.ed_phs_stime = parseInt(ed_phs.ed_phs_stime);
				ed_phs.ed_phs_etime = parseInt(ed_phs.ed_phs_etime);
				ed_phs.ed_phs_vei = parseInt(ed_phs.ed_phs_vei);

				if(ed_phs.ed_phs_etime == 0) {
					ed_phs.ed_phs_etime = new Date().getTime();
				}

				var ed_phs_stime = ed_phs.ed_phs_stime;
				var ed_phs_etime = ed_phs.ed_phs_etime;
				var ed_phs_vei = ed_phs.ed_phs_vei;
				ed_phs_data.push([ed_phs_stime, ed_phs_vei, ed_phs_vei - 0.2, ed_phs_etime - ed_phs_stime, ed_phs]);
			}
		}
	}

	initData();
	var param_ed = {
		color: "Gray",
		label: "Eruption",
		data: ed_data,
		bars: {
			show: true,
			wovodat: true
		},
		dataType: "ed"
	};

	var param_ed_phs = {
		data: ed_phs_data,
		label: "Eruption phase",
		bars: {
			show:true,
			wovodat: true,
			lineWidth: 1,
			drawBottom: true
		},
		dataType: "ed_phs"
	};

	var option = {
		grid: {
			hoverable: true,
			
		},
		xaxis: {
			min: end_of_time - ONE_YEAR,
			max: end_of_time,
			autoscale: false,
			mode: "time",
			timeformat: "%Y-%m",
			tickSize: [1, "month"]
			
			//timeformat: "%Y-%m-%d %H:%M:%S"
		},
		yaxis: {
			min: 0,
			max: 6,
			tickSize: 1,
			panRange: false,
			zoomRange: false,
			tickFormatter: function(val, axis) { return val < axis.max ? val.toFixed(2) : "VEI";}

		},
		pan: {
			interactive: true
		},
		zoom: {
			interactive: true
		}
	};

	window.eruption_plot = $.plot($("#eruption_graph"), [param_ed, param_ed_phs], option);
    $("#eruption_graph").bind("plothover", function (event, pos, item) {
    	if (item) {
            $("#tooltip").remove();
            var content;
            switch (item.series.dataType) {
            	case "ed":
            		var ed = item.series.data[item.dataIndex][4];
            		content = "Eruption<br/>";
            		content += convertDate(new Date(ed.ed_stime));
            		content += " to ";
            		content += convertDate(new Date(ed.ed_etime));
            		content += "<br/>";
            		content += "VEI: " + ed.ed_vei;
            		break;
            	case "ed_phs":
            		var ed_phs = item.series.data[item.dataIndex][4];
            		content = ed_phs.ed_phs_type + "<br/>";
            		content += convertDate(new Date(ed_phs.ed_phs_stime));
            		content += " to ";
            		content += convertDate(new Date(ed_phs.ed_phs_etime));
            		content += "<br/>";
            		
            		if(ed_phs.ed_phs_vei)
            			content += "VEI: " + ed_phs.ed_phs_vei + "<br/>";
            	/*	if(ed_phs.ed_phs_dre_tot)
            			content += "DRE_TOT: " + ed_phs.ed_phs_dre_tot + "<br/>";
            		if(ed_phs.ed_phs_dre_lav)
            			content += "DRE_LAV: " + ed_phs.ed_phs_dre_lav + "<br/>";
            		if(ed_phs.ed_phs_dre_tep)
            			content += "DRE_TEP: " + ed_phs.ed_phs_dre_tep + "<br/>";
            		if(ed_phs.ed_phs_col)
            			content += "COL: " + ed_phs.ed_phs_col + "<br/>";*/
            		break;

            }

            showTooltip(pos.pageX, pos.pageY, content);
        } else {
            $("#tooltip").remove();
            previousItem = null;            
        }
    });

	Observer.notify("eruption-plot-done");

	//when user selects an eruption
/*	$("#eruptionselect").change(function() {
		if ($('#eruptionselect option:selected').text() === "...") {return 0;}
		stime = parseInt(eruptionSelect.val());

		console.log(plot);
		eruption_forecast_graph.getAxes().xxis.options.min = stime;
		eruption_forecast_graph.getAxes().xxis.options.max = stime + ONE_YEAR;
		eruption_forecast_graph.setupGrid();
		eruption_forecast_graph.draw();
	});	*/
}
