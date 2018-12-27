<?php
/**
 * Created by PhpStorm.
 * User: Москалев
 * Date: 26.12.2018
 * Time: 23:09
 */
$i = 0;
do {
    echo "$i";
    if ($i % 2) {
        echo " - нечетное число";
    } else {
        if ($i == 0) {
            echo " - это ноль";
        } else {
            echo " - четное число";
        }
    }
    echo "<br>";
    $i++;
} while ($i < 11);
