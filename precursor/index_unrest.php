<?php
// Start session
session_start();
// Regenerate session ID
session_regenerate_id(true);
$uname = "";

// If session was already started
if (isset($_SESSION['login'])) {
    // Get login ID and user name
    $uname = $_SESSION['login']['cr_uname'];
    $cp_access = $_SESSION['permissions']['access'];
    if ($cp_access == 0) {
        header('Location:/precursor/index_unrest_devel_v5.php');
        exit();
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>WOVOdat :: The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat), by IAVCEI</title>
        
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
        <meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
        <meta name="keywords" content="Volcano, Vulcano, Volcanoes">
        <link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
        <link href="/css/styles_beta.css" rel="stylesheet"> 
        <link href="/css/tooltip.css" rel="stylesheet">
        <link type="text/css" href="/js/jqueryui/css/custom-theme/jquery-ui-1.8.22.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="/js/jqueryui/js/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="/js/jqueryui/js/jquery-ui-1.8.21.custom.min.js"></script>
        <script type="text/javascript" src="/js/flot/jquery.flot.tuan.js"></script>
        <script type="text/javascript" src="/js/flot/jquery.flot.navigate.tuan.js"></script> 
        <script type="text/javascript" src="/js/flot/jquery.flot.selection.js"></script>
        <script type="text/javascript" src="/js/flot/jquery.flot.marks.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9kUvUtmawmFJ62hWVsigWFTh3CKUzzM&sensor=false"></script>
		
        <script type="text/javascript" src="/js/scripts.js" language="javascript"></script>
        <script type="text/javascript" src="/js/Tooltip_v3.js" language="javascript"></script>
        <script type="text/javascript" src="/js/GPSCharts_beta.js" language="JavaScript"></script>
        <script type="text/javascript" src="/js/wovodat.js" language="JavaScript"></script>

        <script type="text/javascript">
            var map;
            $(document).ready(function(){document.getElementById('vd_name').onchange();});
	

            function getCavwCode(s) {
                var pos=s.indexOf('_');
                return s.substr(pos+1);
            }

            function volcano_selected(){
                setupMap(0);
           }
	
            function show_info(res){$('#viewcontent2').html(res);}
        </script>
    </head>
    <body>
        <div id="wrapborder_x">
            <div id="wrap_x">
                <!-- Header -->
                <?php include 'php/include/header_beta.php'; ?>

                <!-- Right -->
                <div id="contentrview_x" style="background-color:#f3fffe;">
                    <div id="selectvolc">
                        <table>
							<tr>
                                <td><p>Select volcano:</p></td>
                                <td><span id="filLoading">Loading... <img src="../gif2/loadinfo.net.gif"/></span>
                                </td>
                            </tr>
						</table>
                        <select id="vd_name" onchange="volcano_selected()" style="width:100%">
                            <?php
                            $n_rand = rand(1, 1544);
                            $nr = 0;

                            include 'php/include/db_connect_view.php';
                            $result = mysql_query("select vd_id, vd_cavw, vd_name from vd order by vd_name");
		
                            while ($v_arr = mysql_fetch_array($result)) {
						
                                $nr++;
                                if ($nr == $n_rand) {
                                    echo "<option value=\"$v_arr[0]\" selected=\"selected\">" . $v_arr[2] . "_" . $v_arr[1] . "</option>";
                                } else {
                                    echo "<option value=\"$v_arr[0]\">" . $v_arr[2] . "_" . $v_arr[1] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
					
					
                    <div align="right">
                        <button id="go2gvp" style="font-size:9px;">Open GVP-Smithsonian</button>
                    </div><br>
                    <div align="left" id="StationType">
                    </div>
 
					<div>
						<div id="stationcheck">
                            <div id="staavailable"></div>
                        </div>


                        <div id="spatial" style="display:none;">
                            <div id="filterSS" title="Filter Maps">
                                <table width='100%'>
                                    <input type="hidden" id="filter" value="0" />
                                    <tr>
                                        <td>Events: </td>
                                        <td align=right>
                                            <select id="events">
                                                <option>100</option>
                                                <option>200</option>
                                                <option>300</option>
                                                <option>400</option>
                                                <option>500</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Start Date: </td>
                                        <td align=right><input type="textfield" id="ss_start" /></td>
                                    </tr>
                                    <tr>
                                        <td>End Date: </td>
                                        <td align=right><input type="textfield" id="ss_end" /></td>
                                    </tr>
                                    <tr>
                                        <td>Depth: </td>
                                        <td align=right><input id="dp_min" size='6'> to <input id="dp_max" size='6'></td>
                                    </tr>
                                    <tr>
                                        <td>Type: </td>
                                        <td align=right>
                                            <select id="eqtype">
                                                <option value="">All</option>
                                                <option value="R">Regional</option>
                                                <option value="Q">Quary Blast</option>
                                                <option value="V">Volcano Tectonic</option>
                                                <option value="H">Hybrid</option>
                                                <option value="LF">Low Frequency</option>
                                                <option value="VLP">Very Long Period</option>
                                                <option value="E">Explosion</option>
                                                <option value="T">Tremor</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table> 
								
                            </div>
				
							
                            <div align="center">
                                <button id="reloadBtn" style="font-size:9px;">Reload Map</button>
                                <button id="filterBtn" style="font-size:9px;">Filter</button>
                            </div>
                        </div>   
            
                    </div>
                </div>
				
                <!-- Left -->
                <div id="contentlview_x">
					<div style="position:relative; width:60%;" title="Notice" id="notice">
                       <p><b>For more details visualization, please <a href="/populate/index.php">log in </b></a>
					   </p>
                    </div>
                    <!-- Map -->
                    <div id="bigmap1" style="width:580px;height:280px;"></div>

                    <!-- Legend -->
                    <div id="map_legend" style="margin-top:2px;font-size:8px;">
                        <table>
                            <tr style="margin:0px; padding:0px;" >
                                <td>
                                    <p>
                                        <span style="font-size:10px;"><b>Legend:&nbsp&nbsp&nbsp</b></span>
                                    </p>
                                </td>
                                <td><p><img src="/img/pin_ds.png" style="width:16px;height:16px;"></img> Deformation sta.</p></td>
                                <td><p><img src="/img/pin_fs.png" style="width:16px;height:16px;"></img> Field sta.</p></td>
								<td><p><img src="/img/pin_gs.png" style="width:16px;height:16px;"></img> Gas sta.</p></td>
								 <td><p><img src="/img/pin_hs.png" style="width:16px;height:16px;"></img> Hydrologic sta.</p></td>
								<td><p><img src="/img/pin_ms.png" style="width:16px;height:16px;"></img> Meteo sta.</p></td> 
                                <td><p><img src="/img/pin_ss.png" style="width:16px;height:16px;"></img> Seismic sta.</p></td>
                                <td><p><img src="/img/pin_ts.png" style="width:16px;height:16px;"></img> Thermal sta.</p></td>
                                <td><p><img src="/img/pin_volcano_selected.png" style="width:16px;height:16px;"></img> Volcano</p></td>
								 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>  <!-- end wrap_x -->     
            <div style="height: 20px"></div>
            <div class="reservedSpace">
            </div>
        </div>   <!-- end of wrapborder_x -->
		
        <div class="wrapborder_x">
            <?php include 'php/include/footer_main_beta.php'; ?>
        </div>

    </body>
</html>