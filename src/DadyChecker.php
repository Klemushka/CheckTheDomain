<?php
namespace App;
use GuzzleHttp\Client;

class DadyChecker implements CheckerInterface
{
    public function check(string $domain)
    {
        $client = new Client(['base_uri' => 'https://api.ote-godaddy.com']);
        $response = $client->get("/v1/domains/available?domain=${domain}",
            [
                'headers' => [
                    'Authorization' => "sso-key 3mM44UYhwKCe9U_QQsRqkc39ePHorGbHYfv8c:QQsVgyXRfTAmvHcyPmjYU4",
                    'Accept' => 'application/json'
                ]
            ])->getBody();
        $json_data = json_decode($response);
        if ($json_data->available == "1") {
            return $domain;
        } else {}
    }

    public function checkArray(array $domains)
    {
        $requestGoDaddy = array();
        for ($i = 0; $i < count($domains); $i++) {
            $client = new Client(['base_uri' => 'https://api.ote-godaddy.com']);
            $response = $client->get("/v1/domains/available?domain=${domains[$i]}",
                [
                    'headers' => [
                        'Authorization' => "sso-key 3mM44UYhwKCe9U_QQsRqkc39ePHorGbHYfv8c:QQsVgyXRfTAmvHcyPmjYU4",
                        'Accept' => 'application/json'
                    ]
                ])->getBody();
            $json_data = json_decode($response);
            if ($json_data->available == "1") {
                array_push($requestGoDaddy, $domains[$i]);
            } else {}
        }
        return $requestGoDaddy;
    }
}