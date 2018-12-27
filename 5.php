<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 27.12.2018
 * Time: 8:50
 */
function replSpace($inStr){
    echo mb_strlen($inStr);
    for ($i = 0; $i < mb_strlen($inStr); $i++) {
        if ($inStr[$i]==' '){
            $inStr[$i]='_';
        }
    }
    return $inStr;
}
$a="Привет  страна наша Россия!";
echo replSpace($a);