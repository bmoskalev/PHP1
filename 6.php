<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 23.12.2018
 * Time: 17:54
 */

function power($val, $pow)
{
    if ($pow == 1) {
        return $val;
    } else {
        return $val * power($val, $pow - 1);
    }
}

$a = 7;
$b = 4;
echo "Число $a в степени $b равно " . power($a, $b);