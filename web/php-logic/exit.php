<?php
session_start();
require_once("../php-logic/db-connection.php");
$query = 'UPDATE users SET cookie="" WHERE login="' . $_SESSION['login'] . '"';
mysqli_query($link, $query);
$_SESSION['auth'] = null;
$_SESSION['login'] = null;
$_SESSION['cookie'] = null;
setcookie('key', '', time()); //удаляем ключ
setcookie('login', '', time());
header('Location: http://' . $_SERVER['SERVER_NAME'] . '/web/cook/');
?>