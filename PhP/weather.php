


<?php
ini_set('display errors', 'on');
//error_reporting(E_ALL);
error_reporting(E_ERROR | E_PARSE);



//$url="http://api.geonames.org/findNearByWeatherJSON?lat=51.5072&lng=0.1276&username=drawinghub6";
$url="http://api.geonames.org/findNearByWeatherJSON?lat=".$_REQUEST['latitude']."&lng=".$_REQUEST['longitude']."&username=drawinghub6";


$ch=curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);


$result=curl_exec($ch);
curl_close($ch);
$decode=json_decode($result, true);
$output["status"]["code"] = "200";
$output['status']['name']='ok';
$output['status']['description']='success';
$output['data']= $decode['weatherObservation'];

header('Content-Type: application/json; charset=UTF-8');

echo json_encode($output)

?>

