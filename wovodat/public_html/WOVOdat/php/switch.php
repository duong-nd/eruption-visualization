<?php
error_reporting(E_ALL);
//Caching
define("CACHE",false);
if(CACHE) {
    $fileName = md5($_SERVER[REQUEST_URI]);
    $fileDir = ("../cache/".$fileName);

    if(file_exists($fileDir)) {
        include($fileDir);
        exit;
    }

    ob_start();
}


if (isset($_GET['get']) || isset($_POST['get'])) {
    if(isset($_GET['get']) )
            $get = $_GET['get'];
    else $get = $_POST['get'];

    switch ($get) {
        case 'OwnerList':
            $ownerList = $_REQUEST['ownerList'];
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getOwnerList($ownerList);
            break;
        case 'Download':
            $key = $_GET['key'];
            if ($key == 'KJH234234jhj') {
                $file = realpath(dirname(__FILE__) . '/../..') . '/' . $_GET['file'];
                $content = file_get_contents($file);
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                echo $content;
            }
            break;
        case 'VolcanoList':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getVolcanoList();
            break;
        case 'EruptionList':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getEruptionList($_GET['cavw']);
            break;
        case 'LatLon':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getLatLon($_GET['cavw']);
            break;
        case "AllStationsList":
            include_once "Wovodat.php";
            $wovodat = new Wovodat();
            $wovodat->getAllStationsList($_GET['cavw']);
            break;
        case 'AvailableStations':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getAvailableStations($_GET['cavw']);
            break;
        case 'Stations':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getStations($_GET['cavw'], $_GET['type']);
            break;
        case 'StationData':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            echo json_encode($wovodat->getStationData($_GET['type'], $_GET['table'], $_GET['code'], $_GET['component'], $_GET['ref']));
            break;
        case 'Earthquakes':
            include_once "Wovodat.php";
            $wovodat = new Wovodat();
            $wovodat->getEarthquakes($_GET['qty'], $_GET['cavw'], $_GET['lat'], $_GET['lon'], $_GET['elev']);
            break;
        case 'getCcUrl':
            include_once "Wovodat.php";
            $wovodat = new Wovodat();
            $wovodat->getCCUrl($_GET['cavw']);
            break;
        case 'getNeighbors':
            include_once "Wovodat.php";
            $wovodat = new Wovodat();
            $wovodat->getNeighbors($_GET['cavw']);
            break;
        case 'FullStationData':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getFullStationData($_GET['type'], $_GET['table'], $_GET['code'], $_GET['component']);
            break;
        case 'TimeSeriesForVolcano':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $wovodat->getTimeSeriesForVolcano($_GET['cavw']);
            break;
        case '3D':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $o = $wovodat->get3D($_GET);
            echo json_encode($o);
            break;
        case '2D':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $o = $wovodat->get2DGMT($_GET);
            echo json_encode($o);
            break;
        case 'EquakeTypeList':
            include_once 'Wovodat.php';
            $wovodat = new Wovodat();
            $o = $wovodat->getEquakeTypeList();
            echo json_encode($o);
            break;
        default:
            break;
    }
}


if(CACHE) {
    $fileContent = ob_get_contents();
    ob_end_clean();


    file_put_contents($fileDir, $fileContent);

    echo $fileContent;
}
?> 
