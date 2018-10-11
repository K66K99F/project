<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * 
 */
class MyFunctions extends Model{
   
    /**
     * myArray
     * @param array $array
     * @param string $key_name
     * @param string $value_name
     * @return array
     */
    function myArray($array, $key_name, $value_name){
        $temp_array = [];
        $kname = (string)$key_name;
        $vname = (string)$value_name;

        foreach($array as $key => $value){
            $temp_array += [$value[$kname] => $value[$vname]];
    //        print_r($key);echo"<br>";
    //        print_r($value['id'].' '.$value['city']);echo"<br><br>";
        }
        return $temp_array;
    }
    
}

