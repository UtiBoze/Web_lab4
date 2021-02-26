<?php
session_start();
if(!empty($_SESSION["cookie"]))
{
	setcookie('login', $_SESSION["login"], time()+60*60*24*30); //логин
	setcookie('key', $_SESSION["cookie"], time()+60*60*24*30); //случайная строка
}
if (@$_SESSION["auth"] == false || empty($_SESSION["auth"]))
{
	if (!empty($_COOKIE['login']) and !empty($_COOKIE['key']))
	{
		$login = $_COOKIE['login'];
		$key = $_COOKIE['key']; //ключ из кук
		$query = 'SELECT*FROM users WHERE login="' . $login . '" AND cookie="' . $key . '"';
		$resultQuery=mysqli_query($link, $query);
		$result=mysqli_fetch_assoc($resultQuery);
		//Если база данных вернула не пустой ответ - пара логин-ключ к кукам подошла
		if (!empty($result))
		{
			$_SESSION['auth'] = true;
			$_SESSION['login'] = $result['login'];
		}
	}
}
?>