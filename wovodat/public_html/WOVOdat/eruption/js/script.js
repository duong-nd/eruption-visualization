var ONE_YEAR = ((new Date("0002-01-01T00:00:00")).getTime() - (new Date("0001-01-01T00:00:00")).getTime());
var THREE_HRS = ((new Date("0002-01-01T03:00:00")).getTime() - (new Date("0002-01-01T00:00:00")).getTime());
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

$(document).ready(function() {
	WOVODAT.startAllModules();
});