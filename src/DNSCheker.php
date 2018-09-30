<?php
namespace App;


class DNSCheker implements CheckerInterface
{
    public function check(string $domain)
    {
        $result = dns_get_record($domain);
        if (empty($result)){
            return $domain;
        } else {}
    }

    public function checkArray(array $domains)
    {
        $requestDNSList = [];
        for ($i = 0; $i < count($domains); $i++){
            $result = dns_get_record($domains[$i]);
            if (empty($result)){
                array_push($requestDNSList, $domains[$i]);
            } else {}
        }
        return $requestDNSList;
    }
}