<?php
namespace App;

class Generator
{
    public function generateDomain(string $str1, string $str2){
        if($str1 != "" or $str2!= ""){
            $combination = [];
            $str1_array = explode(" ", $str1);
            $str2_array = explode(" ", $str2);
            for ($i = 0; $i < count($str1_array); $i++){
                for ($j = 0; $j < count($str2_array); $j++){
                    array_push($combination, "${str1_array[$i]}${str2_array[$j]}.com");
                }
            }
            return $combination;
        } else {
            return false;
        }
    }
}