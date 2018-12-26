<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 26.12.2018
 * Time: 23:33
 */
$file = file_get_contents('russia.json');
$cityList = json_decode($file, TRUE);
$newCityList = [];
foreach ($cityList as $key => $value) {
    $newCityList[$value["region"]][]=$value["city"];
}
foreach ($newCityList as $key => $value){
    echo "$key:<br>";
    foreach ($value as $city){
        echo "$city, ";
    }
    echo "<br><br>";
}

