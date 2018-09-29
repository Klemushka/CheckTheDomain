<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$field1 = $_POST['field1'];
$field2 = $_POST['field2'];
$combination = array();

$field1_array = explode(" ", $field1);
$field2_array = explode(" ", $field2);

for ($i = 0; $i < count($field1_array); $i++){
    for ($j = 0; $j < count($field2_array); $j++){
        array_push($combination, "${field1_array[$i]}${field2_array[$j]}.com");
    }
}

// Method Request DNS
function requestDNS($combination){
    $requestDNSList = array();
    for ($i = 0; $i < count($combination); $i++){
        $result = dns_get_record($combination[$i]);
        if (empty($result)){
            array_push($requestDNSList, $combination[$i]);
        } else {}
    }
    return $requestDNSList;
}

function requestWhoIs($combination){
    $requestWhoIsList = array();
    for ($i = 0; $i < count($combination); $i++){
        $client = new Client(['base_uri' => "http://api.whois.vu/?q=${combination[$i]}"]);
        $response = json_decode($client->request('GET')->getBody());
        if ($response->available == "yes") {
            array_push($requestWhoIsList, $combination[$i]);
        } else {}
    }
    return $requestWhoIsList;
}

?>