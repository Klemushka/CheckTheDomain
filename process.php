<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$field1 = $_POST['field1'];
$field2 = $_POST['field2'];
$combination = array();
$requestDNSList = array();
$requestWhoIsList = array();
$requestGoDaddyList = array();
$hello = "Hi";


$field1_array = explode(" ", $field1);
$field2_array = explode(" ", $field2);

for ($i = 0; $i < count($field1_array); $i++){
    for ($j = 0; $j < count($field2_array); $j++){
        array_push($combination, "${field1_array[$i]}${field2_array[$j]}.com");
    }
}

$requestDNSList = requestDNS($combination);
$requestWhoIsList = requestWhoIs($combination);
$requestGoDaddyList = requestGoDaddy($combination);

require_once 'index.html';

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

// Method Request Whois
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

// Method Request goDaddy
function requestGoDaddy($combination)
{
    $requestGoDaddy = array();
    for ($i = 0; $i < count($combination); $i++) {
        $client = new Client(['base_uri' => 'https://api.ote-godaddy.com']);
        $response = $client->get("/v1/domains/available?domain=${combination[$i]}",
            [
                'headers' => [
                    'Authorization' => "sso-key 3mM44UYhwKCe9U_QQsRqkc39ePHorGbHYfv8c:QQsVgyXRfTAmvHcyPmjYU4",
                    'Accept' => 'application/json'
                ]
            ])->getBody();
        $json_data = json_decode($response);
        if ($json_data->available == "1") {
            array_push($requestGoDaddy, $combination[$i]);
        } else {}
    }
    return $requestGoDaddy;
}
?>