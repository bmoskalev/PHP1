<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 23.12.2018
 * Time: 17:58
 */
function selectEnd($number, $words)
{
    if (floor($number / 10) % 10 === 1) {
        return $words[2];
    } else {
        switch ($number % 10) {
            case 1:
                return $words[0];
            case 2:
            case 3:
            case 4:
                return $words[1];
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
            case 0:
                return $words[2];
        }
    }

}

function currentTime()
{
    $hours = date("G");
    $minutes = date("i");
    return $hours . " " . selectEnd($hours, ["час", "часа", "часов"]) . " " . $minutes . " " . selectEnd($minutes, ["минута", "минуты", "минут"]);
}

echo currentTime();