<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 23.12.2018
 * Time: 17:48
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

function mathOperation($a, $b, $operation)
{
    switch ($operation) {
        case "+":
            return add($a, $b);
        case "-":
            return reduce($a, $b);
        case "*":
            return multiply($a, $b);
        case "/":
            return divide($a, $b);
    }
    return "Недопустимая операция";
}

$a = 6;
$b = 4;
echo mathOperation($a, $b, "+") . "<br>";
echo mathOperation($a, $b, "-") . "<br>";
echo mathOperation($a, $b, "*") . "<br>";
echo mathOperation($a, $b, "/") . "<br>";
