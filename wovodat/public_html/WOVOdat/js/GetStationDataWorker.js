onmessage = function(e){
    main(e);
}
function main(e){
    var id = e.data.id;
    id = id.split('&');
    var type = id[0];
    var table = id[1];
    var code = id[2];
    var component = id[3];
    var referenceTime = e.data.referenceTime;
    var xmlhttp;
    if (XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var text = xmlhttp.responseText;
            if(text == '') return;
            else{
                processData({
                  data:JSON.parse(xmlhttp.responseText),
                  time:e.data.referenceTime
                })
            }
        }
    };
    xmlhttp.open('GET','/php/switch.php?get=FullStationData&type=' + type.toLowerCase() + '&table=' + table +'&code='+code + '&component=' + component,true);
    xmlhttp.send();
}
function processData(o){
    var data = o.data;
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
    postMessage({data:data});
}
