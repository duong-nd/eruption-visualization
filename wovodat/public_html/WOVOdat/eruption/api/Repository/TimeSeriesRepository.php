<?php
/**
 *	This class supports query the data series (deformation, gas, seismic..) for a volcano
 * 	
 */
class TimeSeriesRepository {
  
  /**
   *	Given a volcano Id, return all stations data belonged to it
   *	@param: 
   *		$vd_id
   *	@return"
   *		data list
   */
  public static function getTimeSeriesList($vd_id) {
  	global $db;
  	$query = "SELECT vd_cavw FROM vd WHERE vd_id = %d";
  	$db->query($query, $vd_id);
  	$vd_cavw = $db->getValue();
    $content = file_get_contents("http://localhost/php/switch.php?get=TimeSeriesForVolcano&cavw=" . $vd_cavw);

  	//$content = 'Seismic&Interval&StHelens1201-05-SeisSta&46.2&-122.18&nrec;Seismic&RSAM&YEL&46.20955&-122.18899;Deformation&ElectronicTilt&B201&46.3033&-122.2648&Tilt1µradians;Deformation&ElectronicTilt&B201&46.3033&-122.2648&Tilt2µradians;Deformation&ElectronicTilt&B201&46.3033&-122.2648&Temp&celsiusdegree;Deformation&Strain&B201&46.3033&-122.2648&comp1µstrain;Deformation&Strain&B201&46.3033&-122.2648&comp2µstrain;Deformation&Strain&B201&46.3033&-122.2648&comp3µstrain;Deformation&Strain&B201&46.3033&-122.2648&comp4µstrain;Deformation&ElectronicTilt&B202&46.2447&-122.1367&Tilt1µradians;Deformation&ElectronicTilt&B202&46.2447&-122.1367&Tilt2µradians;Deformation&ElectronicTilt&B202&46.2447&-122.1367&Temp&celsiusdegree;Deformation&Strain&B202&46.2447&-122.1367&comp1µstrain;Deformation&Strain&B202&46.2447&-122.1367&comp2µstrain;Deformation&Strain&B202&46.2447&-122.1367&comp3µstrain;Deformation&Strain&B202&46.2447&-122.1367&comp4µstrain;Deformation&ElectronicTilt&B203&46.169&-122.3337&Tilt1µradians;Deformation&ElectronicTilt&B203&46.169&-122.3337&Tilt2µradians;Deformation&ElectronicTilt&B203&46.169&-122.3337&Temp&celsiusdegree;Deformation&Strain&B203&46.169&-122.3337&comp1µstrain;Deformation&Strain&B203&46.169&-122.3337&comp2µstrain;Deformation&Strain&B203&46.169&-122.3337&comp3µstrain;Deformation&Strain&B203&46.169&-122.3337&comp4µstrain;Deformation&ElectronicTilt&B204&46.136&-122.169&Tilt1µradians;Deformation&ElectronicTilt&B204&46.136&-122.169&Tilt2µradians;Deformation&ElectronicTilt&B204&46.136&-122.169&Temp&celsiusdegree;Deformation&Strain&B204&46.136&-122.169&comp1µstrain;Deformation&Strain&B204&46.136&-122.169&comp2µstrain;Deformation&Strain&B204&46.136&-122.169&comp3µstrain;Deformation&Strain&B204&46.136&-122.169&comp4µstrain;Deformation&GPSVector&P420&46.5886&-122.8663&NS&mm;Deformation&GPSVector&P420&46.5886&-122.8663&EW&mm;Deformation&GPSVector&P420&46.5886&-122.8663&Z&mm;Deformation&GPSVector&P421&46.5319&-122.4292&NS&mm;Deformation&GPSVector&P421&46.5319&-122.4292&EW&mm;Deformation&GPSVector&P421&46.5319&-122.4292&Z&mm;Deformation&GPSVector&P432&46.6229&-121.6832&NS&mm;Deformation&GPSVector&P432&46.6229&-121.6832&EW&mm;Deformation&GPSVector&P432&46.6229&-121.6832&Z&mm;Deformation&GPSVector&P687&46.1096&-122.3546&NS&mm;Deformation&GPSVector&P687&46.1096&-122.3546&EW&mm;Deformation&GPSVector&P687&46.1096&-122.3546&Z&mm;Deformation&GPSVector&P688&46.0301&-122.1642&NS&mm;Deformation&GPSVector&P688&46.0301&-122.1642&EW&mm;Deformation&GPSVector&P688&46.0301&-122.1642&Z&mm;Deformation&GPSVector&P689&46.1893&-122.3572&NS&mm;Deformation&GPSVector&P689&46.1893&-122.3572&EW&mm;Deformation&GPSVector&P689&46.1893&-122.3572&Z&mm;Deformation&ElectronicTilt&P690&46.1801&-122.1898&Tilt1µradians;Deformation&ElectronicTilt&P690&46.1801&-122.1898&Tilt2µradians;Deformation&ElectronicTilt&P690&46.1801&-122.1898&Temp&celsiusdegree;Deformation&GPSVector&P690&46.1801&-122.1898&NS&mm;Deformation&GPSVector&P690&46.1801&-122.1898&EW&mm;Deformation&GPSVector&P690&46.1801&-122.1898&Z&mm;Deformation&ElectronicTilt&P691&46.2315&-122.2269&Tilt1µradians;Deformation&ElectronicTilt&P691&46.2315&-122.2269&Tilt2µradians;Deformation&ElectronicTilt&P691&46.2315&-122.2269&Temp&celsiusdegree;Deformation&GPSVector&P691&46.2315&-122.2269&NS&mm;Deformation&GPSVector&P691&46.2315&-122.2269&EW&mm;Deformation&GPSVector&P691&46.2315&-122.2269&Z&mm;Deformation&GPSVector&P692&46.2245&-122.1842&NS&mm;Deformation&GPSVector&P692&46.2245&-122.1842&EW&mm;Deformation&GPSVector&P692&46.2245&-122.1842&Z&mm;Deformation&ElectronicTilt&P693&46.2103&-122.2023&Tilt1µradians;Deformation&ElectronicTilt&P693&46.2103&-122.2023&Tilt2µradians;Deformation&ElectronicTilt&P693&46.2103&-122.2023&Temp&celsiusdegree;Deformation&GPSVector&P693&46.2103&-122.2023&NS&mm;Deformation&GPSVector&P693&46.2103&-122.2023&EW&mm;Deformation&GPSVector&P693&46.2103&-122.2023&Z&mm;Deformation&GPSVector&P694&46.2996&-122.1819&NS&mm;Deformation&GPSVector&P694&46.2996&-122.1819&EW&mm;Deformation&GPSVector&P694&46.2996&-122.1819&Z&mm;Deformation&GPSVector&P695&46.1969&-122.1516&NS&mm;Deformation&GPSVector&P695&46.1969&-122.1516&EW&mm;Deformation&GPSVector&P695&46.1969&-122.1516&Z&mm;Deformation&GPSVector&P696&46.199&-122.1642&NS&mm;Deformation&GPSVector&P696&46.199&-122.1642&EW&mm;Deformation&GPSVector&P696&46.199&-122.1642&Z&mm;Deformation&GPSVector&P697&46.1876&-122.1766&NS&mm;Deformation&GPSVector&P697&46.1876&-122.1766&EW&mm;Deformation&GPSVector&P697&46.1876&-122.1766&Z&mm;Deformation&ElectronicTilt&P698&46.1735&-122.1606&Tilt1µradians;Deformation&ElectronicTilt&P698&46.1735&-122.1606&Tilt2µradians;Deformation&ElectronicTilt&P698&46.1735&-122.1606&Temp&celsiusdegree;Deformation&GPSVector&P698&46.1735&-122.1606&NS&mm;Deformation&GPSVector&P698&46.1735&-122.1606&EW&mm;Deformation&GPSVector&P698&46.1735&-122.1606&Z&mm;Deformation&GPSVector&P699&46.1897&-122.2035&NS&mm;Deformation&GPSVector&P699&46.1897&-122.2035&EW&mm;Deformation&GPSVector&P699&46.1897&-122.2035&Z&mm;Deformation&GPSVector&P700&46.1781&-122.2173&NS&mm;Deformation&GPSVector&P700&46.1781&-122.2173&EW&mm;Deformation&GPSVector&P700&46.1781&-122.2173&Z&mm;Deformation&GPSVector&P701&46.1946&-122.1333&NS&mm;Deformation&GPSVector&P701&46.1946&-122.1333&EW&mm;Deformation&GPSVector&P701&46.1946&-122.1333&Z&mm;Deformation&GPSVector&P702&46.3009&-122.3452&NS&mm;Deformation&GPSVector&P702&46.3009&-122.3452&EW&mm;Deformation&GPSVector&P702&46.3009&-122.3452&Z&mm;Deformation&GPSVector&P703&46.1453&-122.1963&NS&mm;Deformation&GPSVector&P703&46.1453&-122.1963&EW&mm;Deformation&GPSVector&P703&46.1453&-122.1963&Z&mm;Deformation&GPSVector&P704&46.2447&-122.1367&NS&mm;Deformation&GPSVector&P704&46.2447&-122.1367&EW&mm;Deformation&GPSVector&P704&46.2447&-122.1367&Z&mm;Deformation&GPSVector&P705&46.173&-122.3106&NS&mm;Deformation&GPSVector&P705&46.173&-122.3106&EW&mm;Deformation&GPSVector&P705&46.173&-122.3106&Z&mm;Gas&Plume&StHelens_COSPEC_airplane___46.199719___-122.188789&46.199719&-122.188789&gd_plu_emit;';
  	$timeSeries = explode(';', $content);
  	$result = array();
  	
  	foreach ($timeSeries as $str) {
  		$temp = explode('&', $str);
  		if (count($temp) < 5)
  			continue;
  		$object['id'] = md5(json_encode($str));
  		$object['category'] = $temp[0];
  		$object['data_type'] = $temp[1];
  		$object['station_code'] = $temp[2];
  		$object['lat'] = $temp[3];
  		$object['lon'] = $temp[4];
  		$object['others'] = array_slice($temp, 5);
  		array_push($result, $object);
  	}
    
    return $result;
  }

  public static function getTimeSeriesData($category, $data_type, $station_code) {

  }
}