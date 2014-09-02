<?php
/*GOOGLE MAPS API Version 3
By WEIQIANJUN*/
include 'php/include/db_connect_view.php';/*connect to database*/
$vd_id = $_REQUEST['vd_id'];
$vd_name = $_REQUEST['vd_name'];
$staplot = $_REQUEST['staplot'];

$result = mysql_query("SELECT vd_inf_cavw, vd_inf_slat, vd_inf_slon, vd_inf_selev FROM vd_inf WHERE vd_id = '$vd_id'") or die(mysql_error());
$data = mysql_fetch_object($result);

	$vd_info_slat1= $data->vd_inf_slat;
	$vd_info_slon1=$data->vd_inf_slon;
	$vd_info_cavw1=$data->vd_inf_cavw;
	
	/*test begin and also this can be display the user's choose when the map can not be load*/
    echo "slat:".$vd_info_slat1;
    echo "<br/>";
    echo "slon:".$vd_info_slon1;
    echo"<br/>";
    echo"cavw:".$vd_info_cavw1;
    echo"<br/>";
    echo"name:".$vd_name;
	echo "<br/>";
	/*test end*/
?>

<script type="text/javascript">
if(document.getElementById)
{ 			
    $(document).ready(function() 
        {

			<?php echo "var slat=".$vd_info_slat1;?>;
			<?php echo "var slon=".$vd_info_slon1;?>;  

			var myLatlng = new google.maps.LatLng(slat,slon); 
            var myOptions = 
				{
                  zoom: 9,
                  center: myLatlng,
                  mapTypeId: google.maps.MapTypeId.SATELLITE,
				  scaleControl:true,
				  mapTypeControl:false,
				streetViewControl: false,
                };
                
            var map = new google.maps.Map(document.getElementById("bigmap1"), myOptions);
			
		
           function getCavwCode(s) {
                var pos=s.indexOf('_');
	            return s.substr(pos+1);
            }
			
           function getvolName(s) {
                var pos=s.indexOf('_');	         
			    return s.substr(0,pos);
            }
			
           	var cavwCode = getCavwCode($("#vd_name :selected").text());
           	var volName = getvolName($("#vd_name :selected").text());			

			
			$.ajax({
                type: "GET",
                url: "../php/switch.php?get=AllStationsList&cavw=" + cavwCode,

            }).done(function(data){
            	var arr = data.split(";");
                var stations = [];

                for(var i in arr) {
                    arr[i]=$.trim(arr[i]);
                    if(arr[i]=='') continue;
                    var att=arr[i].split("&");
                    var type=att[0];
                    var lat=att[3];
                    var lon=att[4];
                    var code=att[2];
                    if(lat==''||lon=='') continue;

                    if(!stations[type]) { 
                        stations[type]=[]; 
						
					}

                    stations[type].push({code:code, lat: lat, lon: lon});
                }

			
                $("#StationType").html("<b>Monitoring Stations:</b>");
                
				if(!code){ 
					$("#StationType").append("</br>No station is available<br/>");
                }else {
					$("#StationType").append("</br>");
                }
				
			
                var markers=[];
                var infoWindows=[];

                for(var type in stations) {
				            
					var checkBox = $('<input />', { type: 'checkbox', value: type }).appendTo(("#StationType"));
                    $("#StationType").append("  "+type+" ("+stations[type].length+") "+"<br/>");

                    checkBox.change(function(){
                        var type = $(this).val();

                        if(this.checked) {
                        	markers[type]=[];

                        	for(var i in stations[type]) {
                        		var code=stations[type][i].code;
                                var lat=stations[type][i].lat;
                                var lon=stations[type][i].lon;

                                var marker = new google.maps.Marker({
			                        position: new google.maps.LatLng(lat, lon), 
			                        map: map,
			                        animation: google.maps.Animation.DROP
			                    });


								value = "Station type: " + type + "<br/>Station code: " + code + "<br/>Latitude: " + parseFloat(lat).toFixed(4) + "<br/>Longitude: " + parseFloat(lon).toFixed(3);
			                    
			                    marker.index=i;
			                    infoWindows[i] = new google.maps.InfoWindow({ content:value });

			                    google.maps.event.addListener(marker, 'click', function() {
			                        for(var i in infoWindows){
			                            infoWindows[i].close();
			                            if(typeof infoWindow != 'undefined'){
			                                if(typeof infoWindow.close != 'undefined'){
			                                    infoWindow.close();
			                                }
			                            }
			                        }
			                            
			                        infoWindows[this.index].open(map,this);
			                    });

                                var iconLink=[];
                                iconLink["Deformation"]="../img/pin_ds_s.png";
                                iconLink["Gas"]="../img/pin_gs_s.png";
                                iconLink["Hydrologic"]="../img/pin_hs_s.png";
                                iconLink["Seismic"]="../img/pin_ss_s.png";
                                iconLink["Thermal"]="../img/pin_ts_s.png";
                                iconLink["Meteo"]="../img/pin_ms_s.png";
                                iconLink["Field"]="../img/pin_fs_s.png"

			                    marker.setIcon(iconLink[type]);

			                    markers[type].push(marker);
                            }
                        } else {
                        	for(var i in markers[type]) {
                        		markers[type][i].setMap(null);
                        	}

                        	for(var i in infoWindows) {
                        		infoWindows[i].close();
                        	}

                        	if(typeof infoWindow != 'undefined'){
	                            if(typeof infoWindow.close != 'undefined'){
	                                infoWindow.close();
	                            }
	                        }
                        }
                    });
                }

				$("#StationType").append("<br/>");
            });			
			
			
			var marker = new google.maps.Marker({
            position: myLatlng, 
            map:map,
            });
			
			var markerContent = "Current Volcano:" + volName + "<br/>CAVW:" + cavwCode + "<br/>Lat:" + slat + "</br>Lon:" + slon + "<br/>";
		 
            var infoWindow = new google.maps.InfoWindow({ 
				content: markerContent,
				});
			google.maps.event.addListener(marker,'click',function(){
				infoWindow.open(map,marker);
				});	
			
				
		<?php
			
			$statusHis='Historical'; 
			$statusHol='Holocene'; 
			$statusHol2='Holocene?'; 
			$statusUnc='Uncertain';
			$statusNot='Not a Volcano';
			$unn="Unnamed";
			$statusUr='Uranium-series'; 
			$statusAnt='Anthropology'; 
			$statusRad='Radiocarbon'; 
			$typeSubm='Submarine volcano';
			$count=0;
			$neighbors = mysql_query("select b.vd_cavw,a.vd_id, b.vd_name, a.vd_inf_slat, a.vd_inf_slon, (sqrt(pow(a.vd_inf_slat - $data->vd_inf_slat, 2) + pow(a.vd_inf_slon - $data->vd_inf_slon, 2))) as `distance` FROM vd_inf a, vd b WHERE a.vd_id != '$vd_id' AND a.vd_id = b.vd_id and SUBSTR(b.vd_name,1,7)!='$unn' and a.vd_inf_status!='$statusUnc' and a.vd_inf_status!='$statusNot' and a.vd_inf_status!='$statusUr' and a.vd_inf_type!='$typeSubm' ORDER BY `distance` ASC limit 55") or die(mysql_error());
			while($neighbor_obj=mysql_fetch_object($neighbors))
			{
				
					$slat1=number_format($neighbor_obj->vd_inf_slat,2,'.','');
					$slon1=number_format($neighbor_obj->vd_inf_slon,2,'.','');
					$vd_name1=$neighbor_obj->vd_name;
				    $vd_cavw1=$neighbor_obj->vd_cavw;
					$vd_id1=$neighbor_obj->vd_id;

					if($count<30)
				{
					echo "var newIcon= new google.maps.MarkerImage('../img/pin.png',new google.maps.Size(15,23),new google.maps.Point(0,0),new google.maps.Point(15,23));
					var point=new google.maps.LatLng($slat1,$slon1);
					var marker$count=new google.maps.Marker({
					position:point,
					map:map,
					icon:newIcon,
					});
					
					var texthtml=\"VolName:$vd_name1<br/>Cavw:$vd_cavw1<br/>Lat:$slat1<br/>Lon:$slon1\";
					var tooltipOptions={marker:marker$count,content:texthtml,cssClass:'tooltip_marker0',};
					var tooltip$count= new Tooltip(tooltipOptions);
					tooltip$count.setMap(map);
					
					
					google.maps.event.addListener(marker$count,'click',function(){ 
					
					   $('#vd_name').val($vd_id1);
						volcano_selected();
						
						});
					";
					
					$count++;
				}
			}
		?>					
				
		});  
}
else
{
       alert("sorry, your brownwer is not support the Google maps");
}
</script>

