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
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta name="description" content="The World Organization of Volcano Observatories (WOVO): Database of Volcanic Unrest (WOVOdat)">
        <meta name="keywords" content="Volcano, Vulcano, Volcanoes">
        <link href="/css/styles_beta.css" rel="stylesheet">
        <link href="/gif2/WOVOfavicon.ico" type="image/x-icon" rel="SHORTCUT ICON">
        <!--google map v3-->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <link type="text/css" href="/css/tooltip.css" rel="stylesheet" />
        <link type="text/css" href="/js/development-bundle/themes/redmond/jquery.ui.all.css" rel="stylesheet" />
        <link type="text/css" href="/js/development-bundle/themes/base/jquery.ui.base.css" rel="stylesheet"/>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" />

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.core.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.mouse.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.tabs.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.button.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.draggable.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.resizable.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.position.js"></script>
        <script type="text/javascript" src="/js/development-bundle/ui/jquery.ui.dialog.js"></script>
        <script type="text/javascript" src="/js/development-bundle/flot/excanvas.min.js" language="javascript"></script>
        <script type="text/javascript" src="/js/development-bundle/flot/jquery.flot.js" language="javascript"></script>
        <script type="text/javascript" src="/js/development-bundle/flot/jquery.flot.selection.js" language="javascript"></script>
        <script type="text/javascript" src="/js/development-bundle/flot/jquery.flot.navigate.js" language="javascript"></script>
        <script type="text/javascript" src="/js/flot/jquery.flot.symbol.js"></script>
        <script type="text/javascript" src="/js/scripts.js" language="javascript"></script>
        <script type="text/javascript" src="/js/Tooltip_v3.js" language="javascript"></script>
        <script type="text/javascript" src="/js/GPSCharts_beta.js" language="JavaScript"></script>

        <script type="text/javascript">
            $(document).ready(function(){document.getElementById('vd_name').onchange();});
	
            function volcano_selected(){
                setupMap(0);
            }
	
            function show_info(res){$('#viewcontent2').html(res);}
        </script>

    </head>
    <body>
        <div id="popupBox" title="Message from WOVOdat"></div>
        <div id="wrapborder_x">
            <div id="wrap_x">
                <!-- Header -->
                <?php include 'php/include/header_beta.php'; ?>

                <!-- Right -->
                <div id="contentrview_x">
                    <div id="selectvolc">
                        <table><tr>
                                <td><p>Select volcano:</p></td>
                                <td><span id="filLoading">Loading... <img src="../gif2/loadinfo.net.gif"/></span>
                                </td>
                            </tr></table>
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
                        </select><br>
                    </div>
                    <div align="right">
                        <button id="go2gvp" style="font-size:9px;">Open GVP-Smithsonian</button>
                    </div><br>
                    <div align="left">
                        <p>Monitoring Stations</p>
                        <button id="reloadSta" style="font-size:9px;">Display all Stations</button>
                    </div>
                    <div id="list_station" align="left"></div>
                    <div align="left">
                        <button id="removeSta" style="font-size:9px;">Hide Stations</button>
                    </div><br>

                    <div id="contentrviewcontrol">
                        <div id="stationcheck">
                            <div id="staavailable"></div>
                        </div>
                        <div id="spatial">
                            <div id="displayeq">
                                <span background="ff0000"><button id="reloadEqk" style="font-size:9px;">Display Equake</button></span>
                                <a href="#" onclick="return false;" id="plfil">use filters</a>
                                <a href="#" onclick="return false;" id="minfil">no filters</a>
                            </div>
                            <div id="filterSS" title="Filter Maps" >
                                <table width='100%' >
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

                        <div id="temporal">
                            <div id="selectData">
                            </div>

                            <div id="selectStationDiv">
                            </div>

                            <a href="#" onclick="return false;" id="plfilG">use filters</a>
                            <a href="#" onclick="return false;" id="minfilG">no filters</a>

                            <div id="filterSSG" title="Filter Graphs">
                                <table width='100%'>
                                    <input type="hidden" id="filterG" value="0" />
                                    <tr>
                                        <td>Start Date: </td>
                                        <td align=right><input type="textfield" id="startdate" /></td>
                                    </tr>
                                    <tr>
                                        <td>End Date: </td>
                                        <td align=right><input type="textfield" id="enddate" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Volcano Info -->
                        <div id="viewcontent2" style="width:90%+1px; height:90%+1px; align:center; padding:10px;">
                        </div>
                    </div>
                </div>
                <!-- Left -->
                <div id="contentlview_x">
                    <div style="position:relative; left:2%; width:60%;" title="Notice" id="notice">
                        <p class="home1"><b>WOVOdat VOLCANIC UNREST PAGE</b></p>
                        <p class="home2">Plotting unrest data not yet available. Database still in population-phase. Once the database has a critical mass, it will be open to all.</p>
                    </div>

                    <!-- Map -->
                    <div id="bigmap1" style="width:580px;height:280px;" title="Big Map"></div>

                    <!-- Legend -->
                    <div id="map_legend" style="margin-top:2px;font-size:8px;">
                        <table>
                            <tr style="margin:0px; padding:0px;" >
                                <td>
                                    <p>
                                        <span style="font-size:10px;"><b>Legend:&nbsp&nbsp&nbsp</b></span>
                                    </p>
                                </td>
                                <td><p><img src="/img/pin_volcano_selected.png" style="width:16px;height:16px;"></img> Volcano</p></td>
                                <td><p><img src="/img/pin_volcano.png" style="width:16px;height:16px;"></img> Other Volcano</p></td>
                                <td><p><img src="/img/pin_ds.png" style="width:16px;height:16px;"></img> Deformation sta.</p></td>
                                <td><p><img src="/img/pin_gs.png" style="width:16px;height:16px;"></img> Gas sta.</p></td>
                                <td><p><img src="/img/pin_hs.png" style="width:16px;height:16px;"></img> Hydrologic sta.</p></td>
                                <td><p><img src="/img/pin_ss.png" style="width:16px;height:16px;"></img> Seismic sta.</p></td>
                                <td><p><img src="/img/pin_ts.png" style="width:16px;height:16px;"></img> Thermal sta.</p></td>
                            </tr>
                        </table>
                    </div>
                    <!-- Flot -->
                    <div id="viewcontent" style="width:98%+1px; height:98%+1px; align:center; padding:10px;">
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