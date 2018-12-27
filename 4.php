<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 26.12.2018
 * Time: 23:48
 */
$trans = ['а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'jo',
    'ж' => 'zh',
    'з' => 'z',
    'и' => 'i',
    'й' => 'y',
    'к' => 'k',
    'л' => 'l',
    'м' => 'm',
    'н' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ф' => 'f',
    'х' => 'h',
    'ц' => 'c',
    'ч' => 'ch',
    'ш' => 'sh',
    'щ' => 'shh',
    'ъ' => '\'\'',
    'ы' => 'y',
    'ь' => '\'',
    'э' => 'e',
    'ю' => 'yu',
    'я' => 'ya'];

function strTrans($inStr, $trans)
{
    $outStr = "";
    $inStr = mb_strtolower($inStr);
    for ($i = 0; $i < mb_strlen($inStr); $i++) {
        $key = mb_substr($inStr, $i, 1);
        if (array_key_exists($key, $trans)) {
            $outStr .= $trans[$key];
        } else {
            $outStr .= $key;
        }
    }
    return $outStr;
}

$a = "Привет страна!";
echo strTrans($a, $trans);