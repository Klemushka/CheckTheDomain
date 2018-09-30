<?php
namespace App;
use GuzzleHttp\Client;

class WhoisChecker implements CheckerInterface
{
    public function check(string $domain)
    {
        $client = new Client(['base_uri' => "http://api.whois.vu/?q=${domain}"]);
        $response = json_decode($client->request('GET')->getBody());
        if ($response->available == "yes") {
            return $domain;
        } else {
        }
    }

    public function checkArray(array $domains)
    {
        $requestWhoIsList = [];
        for ($i = 0; $i < count($domains); $i++) {
            $client = new Client(['base_uri' => "http://api.whois.vu/?q=${domains[$i]}"]);
            $response = json_decode($client->request('GET')->getBody());
            if ($response->available == "yes") {
                array_push($requestWhoIsList, $domains[$i]);
            } else {
            }
        }
        return $requestWhoIsList;
    }
}