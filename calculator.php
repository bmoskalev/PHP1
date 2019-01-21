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
<form action="#" method="post">
    <input type="text" name="number1" value="0">
    <input type="text" name="number2" value="0">
    <input type="submit" name="add" value="+">
    <input type="submit" name="reduce" value="-">
    <input type="submit" name="multiply" value="*">
    <input type="submit" name="divide" value="/">
    <?php
    /**
     * Created by PhpStorm.
     * User: Москалевы
     * Date: 21.01.2019
     * Time: 23:21
     */
    if (isset($_POST['reduce'])){
        $result=$_POST['number1']-$_POST['number2'];
    }
    if (isset($_POST['multiply'])){
        $result=$_POST['number1']*$_POST['number2'];
    }
    if (isset($_POST['add'])){
        $result=$_POST['number1']+$_POST['number2'];
    }
    if (isset($_POST['divide'])){
        $result=$_POST['number1']/$_POST['number2'];
    }
    ?>
    <div class="result">Результат: <?=$result;?></div>
</form>
</body>
</html>
