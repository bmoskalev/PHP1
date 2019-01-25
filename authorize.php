<?php
if( isset( $_POST['logBtn'] ) ) {
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $rememberme = $_POST['rememberme'];
    auth($login,$pass,$rememberme);
}

function auth($login = null, $pass = null, $rememberme = false)
{
    $isAuth = 0;

    if ($rememberme == "true")
    {
        $rememberme = true;
    }
    else
    {
        $rememberme = false;
    }

    if (!empty($login))
    {
        $isAuth = authWithCredential($login, $pass, $rememberme);
    }
    elseif ($_SESSION['IdUserSession'])
    {
        $isAuth = checkAuthWithSession($_SESSION['IdUserSession']);
    }
    else
    {
        $isAuth = checkAuthWithCookie();
    }

    if (isset($_POST['ExitLogin']))
    {
        $isAuth = UserExit();
    }

    if ($isAuth)
    {
        $link = getConnection();
        $id_user = $_SESSION['IdUserSession'];
        $sql = "select * from shop.user where id_user = (select id_user from shop.users_auth where hash_cookie = '$id_user')";
        $isAuth = getRowResult($sql, $link);
    }


    return $isAuth;

}



/*
Осуществляем удаление всех переменных, отвечающих за авторизацию пользователя.
*/
function UserExit()
{
    $IdUserSession = $_SESSION['IdUserSession'];


    unset($_SESSION['id_user']);
    unset($_SESSION['IdUserSession']);
    unset($_SESSION['login']);

    setcookie('idUserCookie', '', time() - 3600 * 24 * 7);
    return 0;
}
/*Авторизация пользователя
при использования технологии хэширования паролей
$username - имя пользователя
$password - введенный пользователем пароль
*/
function authWithCredential($username, $password, $rememberme = false)
{
    $isAuth = 0;

    $link = getConnection();
    $login = mysqli_real_escape_string($link, $username);
    $sql = "select id_user, user_login, user_password from shop.user where user_login = '$login'";
    $user_data = getRowResult($sql, $link);


    if ($user_data)
    {
        $passHash = $user_data['pass'];
        $id_user = $user_data['id_user'];
        $idUserCookie = microtime(true) . random_int(100, PHP_INT_MAX);
        $idUserCookieHash = hash("sha256", $idUserCookie);

        if (password_verify($password, $passHash))
        {
            $_SESSION['login'] = $username;
            $_SESSION['id_user'] = $id_user;
            $_SESSION['IdUserSession'] = $idUserCookieHash;

            $sql = "insert into shop.users_auth (id_user, hash_cookie, date, prim) values ('$id_user', '$idUserCookieHash', now(), $idUserCookie)";
            executeQuery($sql);

            if ($rememberme == true)
            {
                setcookie('idUserCookie', $idUserCookieHash, time() + 3600 * 24 * 7, '/');
            }

            $isAuth = 1;
        }
        else
        {
            UserExit();
        }
    }
    else
    {
        UserExit();
    }

    return $isAuth;
}

/* Авторизация при помощи сессий
При переходе между страницами происходит автоматическая авторизация
*/
function checkAuthWithSession($IdUserSession)
{
    $isAuth = 0;

    $link = getConnection();
    $hash_cookie = mysqli_real_escape_string($link,$IdUserSession);

    $sql = "select users.login, users_auth.* from shop.users_auth inner join shop.user on users_auth.id_user = user.id_user where users_auth.hash_cookie = '$hash_cookie'";
    $user_data = getRowResult($sql, $link);

    if ($user_data)
    {
        $_SESSION['login'] = $user_data['login'];
        $_SESSION['idUserSession'] = $IdUserSession;
        $isAuth = 1;
    }
    else
    {
        UserExit();
    }

    return $isAuth;
}



function checkAuthWithCookie()
{
    $isAuth = 0;

    if (isset($_COOKIE['idUserCookie']))
    {
        $link = getConnection();
        $idUserCookie = $_COOKIE['idUserCookie'];
        $hash_cookie = mysqli_real_escape_string($link, $idUserCookie);
        $sql = "select * from users_auth where hash_cookie = '$hash_cookie'";
        $user_data = getRowResult($sql, $link);

        if ($user_data)
        {
            $isAuth = 1;
            checkAuthWithSession($idUserCookie);
        }
        else
        {
            UserExit();
        }
    }

    return $isAuth;
}



?>