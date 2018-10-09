<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 07.09.18
 * Time: 12:21
 */

/**
 * ПРИМЕР:
 */
$login = !empty($_GET['login']) ? $_GET['login'] : 'логин не передан!';
$password = !empty($_GET['password']) ? $_GET['password'] : 'пароль не передан!';
?>
<html>
<head>
    <title>Знакомство с GET-запросами</title>
</head>
<body>
<p>
    Переданный логин: <?= $login ?>
    <br>
    Переданный пароль: <?= $password ?>
</p>
</body>
</html>