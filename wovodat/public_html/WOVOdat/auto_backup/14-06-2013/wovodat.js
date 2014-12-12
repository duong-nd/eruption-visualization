/*
 * wovodat.js
 * wovodat javascript library
 * author: Van Duy Tuan
 * Created date: 11/6/2012
*/

/*
 * Wovodat javascript object
*/

function Wovodat(){
    
}

// time constants in milliseconds
Wovodat.THREE_HOURS = 10800000;
Wovodat.ONE_MONTH = 2592000000;
Wovodat.ONE_WEEK = 604800000;
Wovodat.ONE_DAY = 86400000;

/*
 * Create the trim function for the every string object.
 * trim all invisible character at the beginning as well as at the end of 
 * a string
 */
Wovodat.trim = function(text){
    text = text.replace(/[\x00-\x1F\x7F]/g,"");
    return text.replace(/^\s+|\s+$/g,"");
};

/*
 * Get the current domain name. Return format is: http://<domain name>
 * No directory name will be appended.
 * usually: http://wovodat.org
 */
Wovodat.getDomain = function (){
    var location = window.location.toString();
    var domain;
    var protocol = "http://";
    var i,j;
    location = Wovodat.trim(location);
    if(location.length <= protocol.length){
        throw "Invalid domain";
    }
    i = location.indexOf(protocol);
    if(i != 0)
        throw "This is not a Domain";
    i = i + protocol.length;
    j = location.indexOf("/",i);
    if(j == -1) {
        domain = location;
    }else{
        domain = location.substring(0,j);
    }
    return domain;
};

/*
 * This function is to make sure that wovodat javascript file is properly
 * included
 */
Wovodat.displayLibraryMessage = function (){
    return "The wovodat javascript library is properly included";
};
/*
 * Redirect to link location
 */
Wovodat.redirectPage = function(link){
    window.location = link;
};

Wovodat.getEquakeTypeList = function(handler) {
    $.ajax({
        method: "get",
        url: "/php/switch.php",
        data: "get=EquakeTypeList",
        dataType: "json",
        success: function(json) {
            handler(json);
        }
    });
}

/*
 * Get the list of all available volcanoes using ajax
 */
Wovodat.getVolcanoList = function(callBackFunction,selectId){
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=VolcanoList",
        dataType: "json",
        success: function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            callBackFunction(html,selectId);
        }
    });
};
/*
 * Get the eruption list of the current volcanos
 */
Wovodat.getEruptionList = function(args){
    var volcano = args.volcano;
    var handler = args.handler;
    var selectId = args.selectId;
    volcano = volcano.split("&");
    var cavw = volcano[1];
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=EruptionList&cavw="+cavw,
        success: function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            handler({
                list:html,
                volcano:volcano
            },selectId);
        }
    });
};

/*
 * Get available stations for a specific volcano
 * 
 */
Wovodat.getAvailableStations = function (args){
    var cavw = args.cavw;
    var handler = args.handler;
    var tableId = args.tableId;
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=AvailableStations&cavw="+cavw,
        success: function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            html = html.split(";");
            if(html[html.length - 1] == "")
                html.length--;
            handler({
                list:html,
                volcano:args.volcano
            });
        }
    });
};

/*
 * Get latitude and longitude of a volcano
 */
Wovodat.getLatLon = function(args, volcId, mapId, mapUsed){
    var cavw = args.cavw;
    var handler = args.handler;
    var mapUsed = args.mapUsed;
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=LatLon&cavw="+cavw,
        success: function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            html = html.split(";");
            handler({
                lat:html[0],
                lon:html[1],
                elev:html[2]
            },volcId, mapId,mapUsed);
        }
    });
};


/*
 *Get list of all available time series for one specific volcano
 *
 */
Wovodat.getListOfTimeSeriesForVolcano = function(args){
    var cavw = args.cavw;
    var handler = args.handler;
    var tableId = args.tableId;
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=TimeSeriesForVolcano&cavw="+cavw,
        success: function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            handler(html,tableId);
        }
    });
}
/*
 * Get available stations for a specific type of a specific volcano 
 */

Wovodat.getStations = function(args){
    var cavw = args.cavw;
    var handler = args.handler;
    var type=args.type;
    var stationsDatabaseUsed = args.stationsDatabaseUsed;
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=Stations&cavw="+cavw + "&type=" + type,
        success: function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            var args = {
                data: html,
                type: type,
                action: 'updateNewData'
            };
            handler(args, stationsDatabaseUsed,1);
        }
    });
};

/*
 * Get data for a specific station
 */

Wovodat.getStationData = function(args){
    var type=args.type;
    var table = args.table;
    var code = args.code;
    var component = args.component;
    var referenceData = 1480608000000;
    var handler = args.handler;
    var tableId = args.tableId;
    $.ajax({
        method:"get",
        url: "/php/switch.php",
        data: "get=StationData&type=" + type.toLowerCase() + "&table=" + table 
        +"&code="+code + "&component=" + component + "&ref=" + referenceData,
        dataType: "json",
        success: function(o){
            preprocessData(o);
            if(handler != undefined)
                handler({
                    data: o,
                    id: type + "&" + table + "&" + code + "&" + component,
                    tableId:tableId
                });
        }
    });
    function preprocessData(o){
        if(o == undefined) 
            return;
        if(o.length == 0)
            return;
        var data = o[0];
        if(data == undefined)
            return;
        var length = data.length;
        if(length == 0)
            return;
        var minObject = data[length -1];
        switch(type){
            case "GPS":
                // transfer the latitude and longitude into distance projected
                // in the x or y direction
                switch(component){
                    case "Lat":
                        break;
                    case "Long":
                        break;
                }
        }
        
    }
};


Wovodat.getCcUrl = function(panelUsed, cavw,handler){
    $.ajax({
        method:"get",
        url: "/php/switch.php",
        data:"get=getCcUrl&cavw=" + cavw,
        dataType: 'json',
        success:function(object){
            object.mapUsed = panelUsed;
            handler(object);
        /*
            var owner = $("#dataOwner"+panelUsed);
            var vstatus = $("#volcstatus"+panelUsed);
            var o = {};
            var status = object['status'];
            var ccUrl = object['owner1'];
            if (ccUrl!=""){
                owner.attr("href",ccUrl);
                owner.html(""+format(ccUrl)+"");
            }
            if (status!=""){
                vstatus.html(status);
            }
            */
        },
        error:function(html){
        }
    });
}
function format(text){
    var i = text.indexOf('www');
    var j = text.indexOf('/',i);
    if(j == -1) j = text.length;
    if(text[i+3] == '.')
        return text.substring(i+4,j);
    else return text.substring(i,j);
}

/*get list of neighbors of a volcano
*Author: Tran Thien Nam
*2012-07-26
*/
Wovodat.getNeighbors=function(cavw, panelUsed, handler){
    $.ajax({
        method:"get",
        url:"/php/switch.php",
        data:"get=getNeighbors&cavw="+cavw,
        success:function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            var list = html.split("&");
            handler(cavw,list,panelUsed);
        }
    });
}
/*
 * get the javascript date object when user pass in a string of type
 * YYYY-MM-DD HH:II:SS UTC
 */
Wovodat.toDate = function(date){
    // for example 2007-09-12 17:21:01 UTC
    var temp = date.split(" ");
    var year = temp[0].split("-");
    var hours = temp[1].split(":");
    var d = new Date();
    for(var i = 0 ; i < 3 ; i++){
        while(true){
            if(year[i][0] == '0' && year[i].length > 1)
                year[i] = year[i].substr(1);
            else 
                break;
        }
        while(true){
            if(hours[i][0] == '0' && hours[i].length > 1)
                hours[i] = hours[i].substr(1);
            else
                break;
        }
        year[i] = parseInt(year[i]);
        hours[i] = parseInt(hours[i]);
    }
    if(year[1] != 0)
        year[1] = year[1] - 1;
    if(year[2] == 0)
        year[2] = 1;
    d.setUTCFullYear(year[0], year[1], year[2]);
    d.setUTCHours(hours[0], hours[1], hours[2], 0);
    return d;
}

/*
 * Show the tooltip when the mouse is hovering over a point in the graph
 * 
 */

Wovodat.showTooltip = function (x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css( {
        position: 'absolute',
        display: 'none',
        top: y,
        left: x + 15,
        border: '1px solid #fdd',
        padding: '2px',
        'background-color': '#fee',
        opacity: 0.9
    }).appendTo("body").fadeIn(200);
}

/*
 * show processing bar when the script is making ajax call to server
 */
var busy_counter=0;

Wovodat.showProcessingIcon = function(icon){
    // show the loading icon when ajax is executing
    icon.ajaxSend(function(){
        busy_counter+=1;
        if (busy_counter>=1)
            $(this).show();
    });
    // hide the loading icon when ajax is completed
    icon.ajaxComplete(function(){
        if (busy_counter>0){
            busy_counter-=1;
            if (busy_counter==0)
                $(this).hide();
        }
    });
}

/* 
*load the earthquake and display it in the respective map
*author: Tran Thien Nam
* 2012-07-19
* - qty: limit number of earthquake events loaded
* - panelUsed: 1 (for the left panel) or 2(for the right panel)
* - volInfo: all Information of the volcano: cavw, lat, lon, elev
* 
* 2012-10-05
* Van Duy Tuan
* Change:
* - Change the input into an object which attributes are parameters. This
* will improve the reading ability of maintainers
* 
*/
Wovodat.loadEarthquakes = function(o){
    var numberOfEvents = o.numberOfEvents;
    var mapUsed = o.mapUsed;
    var volInfo = o.volInfo;
    var handlers = o.handlers;
    $.ajax({
        method: "get",
        url: "/php/switch.php",
        data: "get=Earthquakes&qty="+numberOfEvents
        +"&cavw="+volInfo.cavw+"&lat="+volInfo.lat
        +"&lon="+volInfo.lon+"&elev="+volInfo.elev,
        success:function(html){
            if(html.indexOf('Can\'t') >= 0) 
                return;
            if(handlers[0])
                handlers[0](html,volInfo.cavw,mapUsed);
            if(handlers[1])
                handlers[1](volInfo.cavw,"",mapUsed);
            $("#EquakePanel"+mapUsed).show();
        }
    });
};
/*
 * Return data may contain many range taht does not have the available data
 * The code needs to identify that region.
 * data is in the format: [[[x1,y1],[x2,y3],[x3,y3]]]
 */
Wovodat.highlightNoDataRange = function(data){
    var ONE_MONTH = 31 * 24 * 3600 * 1000; // (MILLISECONDS)
    var ONE_DAY = ONE_MONTH / 30; // (MILLISECONDS)
    if(data == null) return data;
    data = data[0];
    var length = data.length;
    var interval = ONE_DAY;
    var distance;
    var newData = [];
    var index;
    index = 0;
    newData.push(data[index++]);
    for(; index < length ; index++){
        distance = data[index-1][0] - data[index][0];
        // the difference between two data must be more than one day time and 
        // either 5 times larger than the previous difference or larger than one month
        if(distance > ONE_DAY && (distance > 5 * interval || distance > ONE_MONTH)){
            newData.push([data[index - 1][0] - distance / 2,null]);
        }else{
            interval = distance;
        }
        newData.push(data[index]);
    }
    return [newData];
};
/*
 * fix the issue of data that are significantly larger than their near by data
 */
Wovodat.fixBigData = function(data){
    if(data == null) 
        return data;
    var timeSeriesData = [];
    var l = data[0].length;
    if(l <= 4) 
        return data;
    // add the first value if it does not differ too much from the second value
    if(Math.abs(data[0][0][1] - data[0][1][1]) < 1000 * Math.abs(data[0][1][1] - data[0][2][1]))
        timeSeriesData.push(data[0][0]);
    var i = 0;
    var currentValue = data[0][2][1];
    var previousValue = data[0][1][1];
    var currentDif = Math.abs(currentValue - previousValue);
    previousValue = currentValue;
    var newDif = 0;
    timeSeriesData.push(data[0][1]);
    timeSeriesData.push(data[0][2]);
    for(i = 3 ; i < l ; i++){
        
        currentValue = data[0][i][1];
        newDif = Math.abs(currentValue - previousValue);
        // significantly different from the previous value
        if(newDif > 1000 * currentDif)
            continue;
        if(newDif != 0) currentDif = newDif;
        previousValue = currentValue;
        timeSeriesData.push(data[0][i]);
    }
    data[0] = timeSeriesData;
    return data;
}
/*
 * data is passed in the from: [[x1,y1],[x2,y2],[x3,y3],....,[xn,yn]]
 * x1 > x2 > x3 > ... > xn
 * from < to
 * this function will return the smallest i that xi <= from and 
 * largest j that xj >= to in the format {min:i,max:j}
 * if 
 */
Wovodat.getIndexRange = function(data,from,to){
    // using binary search to search for the position of 'from'
    var start, end, length, mid, temp, maxIndex, minIndex;
    length = data.length;
    start = length - 1;
    end = 0;
    mid = Math.floor((start + end) / 2);
    while(start > end + 1){
        temp = data[mid][0];
        if(from > temp){
            start = mid;
        }else if( from < temp){
            end = mid;
        }else{
            start = mid + 1;
            break;
        }
        mid = Math.floor((start + end) / 2);
    }
    minIndex = start;
    start = length - 1;
    end = 0;
    mid = Math.floor((start + end) / 2);
    while(start > end + 1){
        temp = data[mid][0];
        if(to > temp){
            start = mid;
        }else if( to < temp){
            end = mid;
        }else{
            end = mid - 1;
            break;
        }
        mid = Math.floor((start + end) / 2);
    }
    maxIndex = end;
    return {
        min:minIndex,
        max:maxIndex
    };
}
/*
 * This function returns the maximum and minimun value of the array of data 
 * in the range: [from,to]
 */
Wovodat.getLocalMaxMin = function(data,from,to){
    var o = Wovodat.getIndexRange(data,from,to);
    var i = o.min;
    
    var maxIndex = o.max;
    var min,max;
    while(data[i][1] == null && i >= maxIndex){
        i--;
    }
    if(i < maxIndex) return {
        max:null,
        min:null
    };
    min = data[i][1];
    max = min;
    for(;i>=maxIndex;i--){
        if(data[i][1] == null) continue;
        if(data[i][1] > max) max = data[i][1];
        if(data[i][1] < min) min = data[i][1];
    }
    return {
        max:max,
        min:min
    };
}

/*
 * This function will update the internal data of a graph, make more efficient
 * in displaying the graphs.
 */
Wovodat.redraw = function(plot,generalData,detailedData,graphs,rescale){
    if( detailedData == undefined) 
        detailedData = [generalData[0],generalData[0]];

    var o = Wovodat.getDrawRange(plot);
    var duration = o.max - o.min;
    var zoomLevel = -1;
    var plottingData;
    if(duration < Wovodat.ONE_WEEK){
        zoomLevel = 3;
        plottingData = detailedData[0];
    }else if(duration < Wovodat.ONE_MONTH){
        zoomLevel = 2;
        plottingData = detailedData[1];
    }else{
        zoomLevel = 1;
        plottingData = generalData[0];
    }
    if(plot.zoomLevel != undefined && plot.zoomLevel == zoomLevel){
        // all about the preparedMax, preparedMin
        if(plot.preparedMax - o.max < duration / 2 || o.min - plot.preparedMin < duration / 2){
            plot.preparedMax = o.max + duration;
            plot.preparedMin = o.min - duration;
            Wovodat.updateGraph(plot,graphs,plottingData);
        }else{
            if(rescale != null && rescale == true){
                Wovodat.updateGraph(plot,graphs,plottingData);
            }
        } 
    }else{
        // change the internal data of the graph according to the current zoom level
        // and change the preparedMax, preparedMin
        plot.zoomLevel = zoomLevel;
        plot.preparedMax = o.max + 4 * duration;
        plot.preparedMin = o.min - 4 * duration;
        Wovodat.updateGraph(plot,graphs,plottingData);
    }
}

Wovodat.updateGraph = function(plot,graphs,plotData){
    var placeholder = plot.getPlaceholder();
    var zoomLevel = plot.zoomLevel;
    var id = placeholder.attr('id');
    var i = id.indexOf('Graph');
    id = id.substring(0,i);
    var data = plot.getData();
    var drawRange = Wovodat.getDrawRange(plot);
    var maxMin = Wovodat.getLocalMaxMin(plotData,drawRange.min,drawRange.max);
    var options = plot.getOptions();
    var preparedMax = plot.preparedMax;
    var preparedMin = plot.preparedMin;
    var indexRange = Wovodat.getIndexRange(plotData,preparedMin,preparedMax);
    data[0].data = plotData.slice(indexRange.max,indexRange.min + 1);
    options.yaxes[0].max = maxMin.max;
    options.yaxes[0].min = maxMin.min;
    var j = placeholder.attr('id');
    if(j.length == i + 6) 
        id = id + j.substring(j.length-1,j.length);
    graphs[id] = $.plot(placeholder,data,options);
    graphs[id].preparedMax = preparedMax;
    graphs[id].preparedMin = preparedMin;
    graphs[id].zoomLevel = zoomLevel;
}
/*
 * 
 */
Wovodat.getDrawRange = function(plot){
    var axes = plot.getAxes();
    var xaxis = axes.xaxis;
    return {
        max:xaxis.max,
        min:xaxis.min
    };
}

/*
 * This function is for getting the detailed data
 */

Wovodat.getDetailedStationData = function(o){
    var id = o.id;
    id = id.split('&');
    var type = id[0];
    var table = id[1];
    var code = id[2];
    var component = id[3];
    var handler = o.handler;
    var referenceTime = o.referenceTime;
    $.ajax({
        method:"get",
        url: "/php/switch.php",
        data: "get=FullStationData&type=" + type.toLowerCase() + "&table=" + table 
        +"&code="+code + "&component=" + component + "&ref=" + referenceTime,
        dataType: "json",
        success: function(html){
            if(handler != undefined){
                Wovodat.processDetailedData({
                    data: html,
                    time: referenceTime,
                    handler: handler
                });
            }
        },
        error: function(html){
        }
    });
}

Wovodat.processDetailedData = function(o){
    if(o.data == null){
        return ;
    }
    o.data = Wovodat.fixBigData(Wovodat.highlightNoDataRange(o.data));
    
    var data = o.data;
    if(data == null || data == undefined || data.length == 0 || data[0].length == 0 || data[0][0].length == 0){
        return;
    }
    var ref = o.referenceTime;
    var temp;
    var THREE_HOURS = 3 * 60 * 60 * 1000 ;
    // jump to the starting point of the data set;
    if(ref == undefined) ref = data[0][0][0];
    else{
        if(ref < data[0][0][0]){
            temp = Math.floor((data[0][0][0] - ref) / THREE_HOURS) ;
            temp = temp + 1;
            ref = ref + temp * THREE_HOURS;
        }else if(ref > data[0][0][0]){
            temp = Math.floor((ref - data[0][0][0]) / THREE_HOURS);
            ref = ref - temp * THREE_HOURS;
        }
    }
    data[1] = [];
    var nextRef = ref - THREE_HOURS;
    var length = data[0].length;
    for(var i = 0 ; i < length ; i++){
        temp = data[0][i];
        if(temp[0] <= nextRef){
            ref = nextRef;
            nextRef = nextRef - THREE_HOURS;
        }
        if(temp[0] <= ref && temp[0] > nextRef){
            data[1].push(temp);
            ref = nextRef;
            nextRef = nextRef - THREE_HOURS;
        }
    }
    o.handler({
        data:data
    });
}
//get all stations for a specific volcano (compare view)
Wovodat.getAllStationsList = function (args){
    var cavw = args.cavw;
    var handler = args.handler;
    var tableId = args.tableId;
    var mapId = args.mapId;
    var mapUsed = args.mapUsed
    var stationsDatabaseUsed = args.stationsDatabaseUsed;
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=AllStationsList&cavw="+cavw,
        success: function(html){
            if(html.indexOf('Can\'t') >= 0) return;
            separate = html.split(";");
            if(html[html.length - 1] == "")
                html.length--;
            handler({
                list:html
            },tableId,mapId, stationsDatabaseUsed,mapUsed);
        }
    });
};

Wovodat.enableTooltip = function(o){
    var type = o.type;
    if (type == 'single'){
        var id = o.id;
        var xValueType = o.xValueType;
        var firstValueFront = o.firstValueFront || "";
        var firstValueBack = o.firstValueBack || "";
        var secondValueFront = o.secondValueFront || "";
        var secondValueBack = o.secondValueBack || "";
        var placeholder = document.getElementById(id);
        var previousPoint = null;
        $(placeholder).bind('plothover',function(event,pos,item){
            if(item){
                if(previousPoint != item.dataIndex){
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var x;
                    if(xValueType == 'time'){
                        x = new Date(item.datapoint[0]);
                        x = x.getUTCDate() + "/" + (x.getUTCMonth() + 1) + "/" + x.getUTCFullYear() + " " + x.getUTCHours() + ":" + x.getUTCMinutes() + ":" + x.getUTCSeconds();
                    }else{
                        x = item.datapoint[0].toFixed(2);
                    }
                    var content = firstValueFront + ": " + x + " " + firstValueBack;
                    content += "<br/>" + secondValueFront + ": " + item.datapoint[1].toFixed(2) + " " + secondValueBack;
                    Wovodat.showTooltip(item.pageX, item.pageY,content);
                }
            }else{
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    }else{
        
    }
        
}

Wovodat.toggleEarthquakePanel = function(o){
    var type = o.type;
    switch(type){
        case 'show':
            $(this).html('Hide Earthquake');
            var id = $(this).attr('id');
            var i = id.length;
            i = parseInt(id.substring(i - 1, i));
            break;
        case 'hide':
            $(this).html('Display Earthquake');
            id = $(this).attr('id');
            i = id.length;
            i = parseInt(id.substring(i - 1, i));
            break;
        case 'toggle':
            var text = $(this).html();
            if(text == 'Display Earthquake') text = 'Hide Earthquake';
            else text = 'Display Earthquake';
            $(this).html(text);
            id = $(this).attr('id');
            i = id.length;
            i = parseInt(id.substring(i - 1, i));
            if(text == 'Display Earthquake'){
                return 'hide';
            }else{
                return 'show';
            }
            break;
    }
    
}

Wovodat.get3DMap = function(o){
	
    var cavw = isEmpty(o.cavw);
	
    var init_azim = isEmpty(o.init_azim);
    if (!init_azim) init_azim = '10'; 
	
    var degree = isEmpty(o.degree);
    if (!degree) degree = 175; 
	
    var visual_type = '3D';
	
    var vname = isEmpty(o.vname);   //Nang added
    var vlat = isEmpty(o.vlat);	    //Nang added
    var vlon = isEmpty(o.vlon);		//Nang added
    var eqtype = isEmpty(o.eqtype); //Nang added
    var wkm = isEmpty(o.wkm);       //Nang added
	
    var qty = isEmpty(o.qty);
    if (!qty) qty = 500; 
    var date_start = isEmpty(o.date_start);
    if (!date_start) date_start = '1/1/1900';        
    var date_end = isEmpty(o.date_end);
    if (!date_end) date_end = '1/1/2012';           
    
    var dr_start = isEmpty(o.dr_start);
    if(!dr_start) dr_start = 0;
    var dr_end = isEmpty(o.dr_end);
    if(!dr_end) dr_end = 40;
    var eqtype = isEmpty(o.eqtype);
    var handler = o.handler;
    function isEmpty(e){
        if(e == undefined) return "";
        else return e;
    }
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=3D" 
        + "&cavw="+cavw 
        + "&init_azim=" + init_azim 
        + "&degree=" + degree 
        + "&vname=" + vname 
        + "&vlat=" + vlat 
        + "&vlon=" + vlon 			
        + "&qty=" + qty
        + "&date_start=" + date_start 
        + "&date_end=" + date_end 
        + "&dr_start=" + dr_start 
        + "&dr_end=" + dr_end 
        + "&visual_type=" + visual_type
        + "&eqtype=" + eqtype
        + "&wkm=" + wkm,			
        dataType:'json',
        success: function(html){
            handler(html);
        },
        error: function(html){
        }
    });
}

Wovodat.getOwnerList = function(ownerList,handler){
    $.ajax({
        method:"post",
        data:{
            'ownerList':ownerList,
            'get':'OwnerList'
        },
        url:"/php/switch.php",
        dataType:'json',
        success:function(obj){
            handler(obj);
        }
    });
};

Wovodat.get2DGMTMap = function(o){
    //   these two var don't need for 2D GMT
    //   var init_azim = isEmpty(o.init_azim);
    //   if (!init_azim) init_azim = '10'; 
    //   var degree = isEmpty(o.degree);
    //   if (!degree) degree = 30; 
    //    var map_width = isEmpty(o.map_width);

    var cavw = isEmpty(o.cavw);
    var visual_type = '2D';
    var vname = isEmpty(o.vname);
    var vlat = isEmpty(o.vlat);	
    var vlon = isEmpty(o.vlon);		
    var eqtype = isEmpty(o.eqtype);

    var wkm = isEmpty(o.wkm);
    var qty = isEmpty(o.qty);
    if (!qty) qty = 500; 

    var date_start = isEmpty(o.date_start);
    if (!date_start) date_start  = '1/1/1990'; 
    var date_end = isEmpty(o.date_end);
    if (!date_end) date_end = '1/1/2012'; 

    var dr_start = isEmpty(o.dr_start);
    if(!dr_start) dr_start = 0;
    var dr_end = isEmpty(o.dr_end);
    if(!dr_end) dr_end = 40;

    var handler = o.handler;
    function isEmpty(e){
        if(e == undefined) return "";
        else return e;
    }
    $.ajax({
        method: "get", 
        url: "/php/switch.php",
        data: "get=2D" 
        + "&cavw="+cavw 
        + "&vname=" + vname 
        + "&vlat=" + vlat 
        + "&vlon=" + vlon 
        + "&qty=" + qty
        + "&date_start=" + date_start 
        + "&date_end=" + date_end 
        + "&dr_start=" + dr_start 
        + "&dr_end=" + dr_end 
        + "&visual_type=" + visual_type
        + "&eqtype=" + eqtype
        + "&wkm=" + wkm,
        dataType:'json',		
        success: function(html){
            handler(html);
        },
        error: function(html){
        }
    });
}


/*
 * a printer class to have us print a specific html element
 */
Wovodat.Printer = {
    Printing:{
        Type: {
            DIV: 1,
            TWOD_EQUAKE: 2,
            TWOD_GMT_EQUAKE:3,
            THREED_GMT_EQUAKE:4,
            TIME_SERIES:5
        }
    },
    print: function(o){
        function printDiv(element){
            var w = window.open();
            w.document.write(element.innerHTML);
        }
        function print2DEquake(obj){
            function setStyleForGraphHolder(panel){
                panel.style.cssText = "width: 450px;height: 130px;font-size: 9px;margin-top: 15px;position: relative;";
            }
            var w = window.open();
            var element;
            var style = w.document.createElement('style');
            var css = ".equakeGraphPlaceholder{width: 450px;height: 130px;font-size: 9px;margin-top: 15px;position: relative;}";
            var head = w.document.getElementsByTagName('head')[0]
            
            style.type = 'text/css';
            if (style.styleSheet){
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(w.document.createTextNode(css));
            }

            head.appendChild(style);
            
            var t;
            t = window.document.createElement('div');
            t.style.margin = '0px 0px 0px 20px';
            t.innerHTML = '<b>www.wovodat.org</b>: Database of Volcanic Unrest<br/> Brought to you by the Earth Observatory of Singapore <br/><br/>';
            t.innerHTML += obj.info;
            w.document.body.appendChild(t);    
            
            var side = obj.mapUsed;
            element = obj.element;
            var latDiv1 = $('#FlotDisplayLat' + side,element);
            var lonDiv1 = $('#FlotDisplayLon' + side,element);
            var timeDiv1 = $('#FlotDisplayTime' + side,element);
            element = element.cloneNode(true);
            element.style.width = "506px";
            w.document.body.appendChild(element);
            
            var latDiv = w.document.getElementById('FlotDisplayLat' + side);
            latDiv.style.height =  latDiv1[0].style.height;
            latDiv.style.width =   latDiv1[0].style.width;
            
            
            var lonDiv = w.document.getElementById('FlotDisplayLon' + side);
            lonDiv.style.height =  lonDiv1[0].style.height;
            lonDiv.style.width =   lonDiv1[0].style.width;
            
            var timeDiv = w.document.getElementById('FlotDisplayTime' + side);
            timeDiv.style.height =  timeDiv1[0].style.height;
            timeDiv.style.width =   timeDiv1[0].style.width;
            setStyleForGraphHolder(latDiv);
            setStyleForGraphHolder(lonDiv);
            setStyleForGraphHolder(timeDiv);
            
            var equakeGraph = obj.equakeGraph;
            $.plot(latDiv,equakeGraph.latGraph.getData(),equakeGraph.latGraph.getOptions());
            $.plot(lonDiv,equakeGraph.lonGraph.getData(),equakeGraph.lonGraph.getOptions());
            $.plot(timeDiv,equakeGraph.timeGraph.getData(),equakeGraph.timeGraph.getOptions());
            
            // delete the print button in the print page
            var divs = w.document.getElementsByTagName('div');
            for(i in divs){
                if(divs[i].className == 'PrintButton'){
                    divs[i].innerHTML = '';
                }
            }
        }
        function printGMTEquake(obj){
            var link = obj.link;
            var w = window.open();
            var t;
            t = window.document.createElement('div');
            t.style.margin = '0px 0px 0px 20px';
            t.innerHTML = '<b>www.wovodat.org</b>: Database of Volcanic Unrest<br/> Brought to you by the Earth Observatory of Singapore <br/><br/>';
            t.innerHTML += obj.info;
            w.document.body.appendChild(t);    
            t = window.document.createElement('div');
            var img = window.document.createElement('img');
            if(obj.type == Wovodat.Printer.Printing.Type.TWOD_GMT_EQUAKE){
                img.height = 707;
                img.width = 500;
            }else if(obj.type == Wovodat.Printer.Printing.Type.THREED_GMT_EQUAKE){
                img.height = 500;
                img.width = 500;
            }
            img.src = link;
            t.appendChild(img);
            w.document.body.appendChild(t);
            
        }
        function printTimeSeries(obj){
            var w = window.open();
            var t,i,j;
            t = window.document.createElement('div');
            t.style.margin = '0px 0px 0px 20px';
            t.innerHTML = '<b>www.wovodat.org</b>: Database of Volcanic Unrest<br/> Brought to you by the Earth Observatory of Singapore <br/><br/>';
            t.innerHTML += obj.info;
            w.document.body.appendChild(t);    
            var table = obj.graphsTable;
            table = table.cloneNode(true);
            var id = table.id;
            var tr = table.getElementsByTagName('tr');
            w.document.body.appendChild(table);
            var graphsPlot = obj.graphsPlot;
            
            // get the map use in the table
            var mapUsed = table.id;
            mapUsed = mapUsed.substring(mapUsed.length-1,mapUsed.length);
            
            // redraw the graphs in the page for printing
            for(i in graphsPlot){
                if(i == undefined || i.length == 0) continue;
                i = i.substring(0,i.length - 1);
                for(j in tr){
                    id = tr[j].id;
                    if(id == undefined) continue;
                    if(id.indexOf(i) >= 0){
                        $.plot(w.document.getElementById(i + 'Graph' + mapUsed),graphsPlot[i + mapUsed].getData(),graphsPlot[i+mapUsed].getOptions());
                        break;
                    }
                }
            }
            
            // set the dropdown list to the selected value in the printed page
            var originalTable = obj.graphsTable;
            var trs = originalTable.getElementsByTagName('tr');
            var length = trs.length;
            i = 0;
            var td,select,value;
            for(i = 0;i < length; i++){
                tr = trs[i];
                td = tr.childNodes[0];
                select = td.childNodes[0];
                value = select.value;
                id = select.id;
                select = w.document.getElementById(id);
                select.value = value;
            }
        }
        type = o.type;
        var info = o.info;
        if(info != undefined && info.length > 0){
            info = info.split('&');
            o.volcano = info[0];
            o.cavw = info[1];
        }else{
            o.volcano = "";
            o.cavw = "";
        }
        o.info = "<br/>";
        o.info += "Volcano: " + o.volcano;
        o.info += "<br/>Cavw: " + o.cavw;
        o.info += "<br/>";
        if(type == this.Printing.Type.DIV){
            printDiv(o.element);
        }else if(type == this.Printing.Type.TWOD_EQUAKE){
            print2DEquake(o);
        }else if(type == this.Printing.Type.TWOD_GMT_EQUAKE){
            printGMTEquake(o);
        }else if(type == this.Printing.Type.THREED_GMT_EQUAKE){
            printGMTEquake(o);
        }else if(type == this.Printing.Type.TIME_SERIES){
            printTimeSeries(o);
        }
    }
};

/*
*   show notification for user 
*/
Wovodat.showNotification = function(obj){
    var width = document.body.offsetWidth / 2;
    var message = obj.message;
    var duration = obj.duration;
    if(duration == undefined){
        duration = 3;
    }
    var div = document.createElement('span');
    $(div).appendTo('body');
    div.innerHTML = message;
    width = width - $(div).width() / 2;
    var style = "position: fixed;" +
    "border: 1px solid #CECECE;" +
    "padding: 5px;" +
    "opacity: 0.9;" +
    "bottom: 10px;" +
    "background-color: #F3F3F3;"+
    "margin-left: " + width + "px;";
    div.setAttribute("style",style);
    window.setTimeout(function(){
        div.parentNode.removeChild(div);
    },duration * 1000);
};
/*
Wovodat.showTooltip = function (x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css( {
        position: 'absolute',
        display: 'none',
        top: y,
        left: x + 15,
        border: '1px solid #fdd',
        padding: '2px',
        'background-color': '#fee',
        opacity: 0.9
    }).appendTo("body").fadeIn(200);
}
*/

//exceptions = "!#$%&'()*+,./:;<=>?@[\]^`{|}~";
Wovodat.fixJSelector = function(str){
    var id = str.replace(/&/g,"\\&");
    id = id.replace(/=/g,"\\=");
    return id;
}

Wovodat.convertDate = function(time){
    function toInt(value){
        if(value[0] == '0'){
            value = value[1] + "";
        }
        value = parseInt(value);
        return value;
    }

    var time1 = time.split(" ");
    var date1 = time1[0];
    var hour1 = time1[1];
    var date2 = date1.split("-");
    var year = date2[0];
    var month = toInt(date2[1]);
    month = month - 1;
    var day = toInt(date2[2]);
    var hour2 = hour1.split(":");
    var hh = toInt(hour2[0]);
    var mm = toInt(hour2[1]);
    var ss = toInt([2]);
    var dd = new Date();
    dd.setUTCFullYear(year, month, day);
    dd.setUTCHours(hh, mm, ss, 0);
    return dd;
}
/*
     * Compute the distant of the two point on the earth surface based on their
     * latitude and longitude vales. 
     * lat,lon is the position of the first point
     * vlat,vlon is the postion of the second point
     * option: calculate the distance following the latitude and longitude side
     * 0: latitude
     * 1: longitude
     */
Wovodat.calculateD = function(lat,lon,vlat,vlon,option){
    var R = 6371; //earth radius in kilometer
    // 
    if (typeof lat=="undefined" || typeof lon=="undefined" || typeof vlat=="undefined" || typeof vlon=="undefined"){
        return 0;
    }
    var dLat, dLon, diff, tlat1, tlat2;
    switch (option){
        case 0:
            dLat = 0;
            dLon = toRad(lon-vlon);
            tlat1 = toRad(vlat);
            tlat2 = toRad(vlat);
            diff = lon - vlon;
            break;
        case 1:
            dLon = 0;
            dLat = toRad(lat-vlat);
            diff = lat - vlat;
            tlat1 = toRad(vlat);
            tlat2 = toRad(lat);
            break;
        case 2:
            var xDistance = Wovodat.calculateD(lat,lon,vlat,vlon,0);
            var yDistance = Wovodat.calculateD(lat,lon,vlat,vlon,1);
            return Math.sqrt(xDistance * xDistance + yDistance * yDistance);
    }
    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(tlat1) * Math.cos(tlat2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c;
    if ((diff<0&&diff>-180)||diff>90)
        d = -d;
    return d;
}