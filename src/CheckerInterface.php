<?php
namespace App;
interface CheckerInterface{
    public function check(string $domain);
    public function checkArray(array $domains);
}