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
	$pass1 = mysqli_real_escape_string($link, $_POST['pass1']);
	$pass2 = mysqli_real_escape_string($link, $_POST['pass2']);
	if (trim($login) == '')
	{
		$errors[] = "Введите логин!";
	}
	if (trim($pass1) == '')
	{
		$errors[] = "Введите пароль!";
	}
	if ($pass1 != $pass2)
	{
		$errors[] = "Повторный пароль введен не верно!";
	}
// Проверка на уникальность логина
	$dbQuery = mysqli_query($link, "SELECT login FROM users WHERE login='" . $login . "'");
	if (mysqli_num_rows($dbQuery) > 0)
	{
		$errors[] = "Пользователь с таким логином уже существует!";
	}
// если не пустой то действия
	if (empty($errors))
	{
		$pass1 = password_hash($pass1, PASSWORD_DEFAULT);
		mysqli_query($link, "INSERT INTO users ( login, passowrd) VALUES ( '" . $login . "', '" . $pass1 . "')");
		$_SESSION["auth"] = true;
		$_SESSION["login"] = $login;
		header('Location: http://' . $_SERVER['SERVER_NAME'] . '/web/cook/');
	} else
	{
		foreach ($errors as $er)
			$errorText .= $er;
		header('Location: http://' . $_SERVER['SERVER_NAME'] . '/web/cook/register-page.php?register_error=' . $errorText);
	}
}
?>