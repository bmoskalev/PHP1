<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 21.01.2019
 * Time: 23:21
 */
$num1=$_POST['number1'];
$num2=$_POST['number2'];
$oper=$_POST['oper'];
switch ($oper) {
    case '+':
        $result = $num1 + $num2;
        break;
    case '-':
        $result = $num1 - $num2;
        break;
    case '*':
        $result = $num1 * $num2;
        break;
    case '/':
        if ($num2==0){
            echo "На ноль делить нельзя";
        } else{
            $result = $num1 + $num2;
        }
        break;
}
?>
<form action="#" method="post">
    <input type="text" name="number1" value="0">
    <input type="text" name="number2" value="0">
    <input type="submit" name="oper" value="+">
    <input type="submit" name="oper" value="-">
    <input type="submit" name="oper" value="*">
    <input type="submit" name="oper" value="/">
    <div class="result">Результат: <?= $result; ?></div>
</form>
</body>
</html>
