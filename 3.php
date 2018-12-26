<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 23.12.2018
 * Time: 16:50
 */
/**
 * Функция сложения двух чисел
 * @param $a - первое число
 * @param $b - второе число
 * @return mixed - сумма
 */
function add($a, $b)
{
    return $a + $b;
}

/**
 * Функция возвращает разность двух чисел
 * @param $a - первое число
 * @param $b - второе число
 * @return mixed - разность
 */
function reduce($a, $b)
{
    return $a - $b;
}

/**
 * Функция умножения двух чисел
 * @param $a - первое число
 * @param $b - второе число
 * @return float|int  - произведение
 */
function multiply($a, $b)
{
    return $a * $b;
}

/**
 * Функция деления двух чисел
 * @param $a - первое число
 * @param $b - второе число
 * @return float|int - частнок
 */
function divide($a, $b)
{
    return $a / $b;
}

echo add(6,4) . "<br>";
echo reduce(6,4) . "<br>";
echo multiply(6,4) . "<br>";
echo divide(6,4) . "<br>";

