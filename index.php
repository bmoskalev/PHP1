<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'shop');
require_once('db.php');
require_once('authorize.php');
?>


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

<form method="post">
    <p><input type="text" name="login" /></p>
    <p><input type="password" name="password" /></p>
    <p><input type="checkbox" name="rememberme" /></p>
    <p><input type="submit" name="logBtn" value="Войти" /></p>
</form>

</body>
</html>
