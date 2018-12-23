<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 23.12.2018
 * Time: 16:32
 */
$a = -5;
$b = 9;
if ($a > 0 && $b > 0) {
    echo "Разность $a и $b равна " . ($a - $b);
} elseif ($a < 0 && $b < 0) {
    echo "Произведение $a и $b равно " . ($a * $b);
} elseif ($a * $b <= 0) {
    echo "Сумма $a и $b равна " . ($a + $b);
} else {
    echo "Необрабатываемая комбинация чисел";
}
