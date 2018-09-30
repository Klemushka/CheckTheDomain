<?php
namespace App;

class DomainChecker
{
    private $checkers = [];
    public function __construct()
    {
        $this->checkers[] = new DNSCheker;
        $this->checkers[] = new WhoisChecker;
        $this->checkers[] = new DadyChecker;
    }
    public function check(array $domains){
        for ($i = 0; $i < 3; $i++){
            $resp[$i] = $this->checkers[$i]->checkArray($domains);
        }
        if (!empty($resp)){
            return $resp;
        }
    }
}