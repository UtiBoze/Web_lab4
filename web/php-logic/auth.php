<?php
require_once("../php-logic/db-connection.php");
session_start();
if (@$_SESSION["auth"] == true)
{
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/web/cook/');
}
$errors = array();
if (isset($_POST))
{
	$login = mysqli_real_escape_string($link, $_POST['login']);
	$pass = mysqli_real_escape_string($link, $_POST['pass']);
	if (trim($login) == '')
	{
		$errors[] = "Введите логин!";
	}
	if (trim($pass) == '')
	{
		$errors[] = "Введите пароль!";
	}
	$dbQuery = mysqli_query($link, "SELECT * FROM users WHERE login='" . $login . "'");
	$result = mysqli_fetch_assoc($dbQuery);
	if ($result["passowrd"] && password_verify($pass, $result["passowrd"]))
	{
		$_SESSION["auth"] = true;
		$_SESSION["login"] = $result["login"];
		if ($_POST["check"] == "on")
		{
			$key = substr(md5(uniqid(rand(), true)), 0, 9); //назовем ее $key
			echo $key;
			setcookie('login', $login, time() + 60 * 60 * 24 * 30); //логин
			setcookie('key', $key, time() + 60 * 60 * 24 * 30); //случайная строка
			$_COOKIE["key"] = $key;
			$query = 'UPDATE users SET cookie="' . $key . '" WHERE login="' . $login . '"';
			mysqli_query($link, $query);
			$_SESSION["cookie"] = $key;
		}
		header('Location: http://' . $_SERVER['SERVER_NAME'] . '/web/cook/');
	} else
	{
		$error = "Неверный логин или пароль!";
		header('Location: http://' . $_SERVER['SERVER_NAME'] . '/web/cook/auth-page.php?register_error=' . $error);
	}
}
?>