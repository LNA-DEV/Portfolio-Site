<?php

$url = "https://api.lna-dev.net/Analytics/Request";

$SubPage = $_SERVER['REQUEST_URI'];
$ClientIP = $_SERVER["REMOTE_ADDR"];

$City = "";
$Country = "";

if ($ClientIP != "127.0.0.1") {
    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ClientIP"));
    $country = $geo["geoplugin_countryName"];
    $city = $geo["geoplugin_city"];

    $City = $city;
    $Country = $country;


    $data =  array(
        'SubPage' => $SubPage,
        'ClientIp' => $ClientIP,
        'City' => $City,
        'Country' => $Country
    );

    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response =  $result;

    // echo $response;
}
