<?php
$host = 'localhost'; // адрес сервера
$database = 'web_bd'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$link = mysqli_connect($host, $user, $password)
or die("Ошибка " . mysqli_error($link));
if (!mysqli_select_db($link, $database))
{
	echo "fdfdf";
	mysqli_query($link, "CREATE DATABASE ".$database);
	mysqli_select_db($link, $database);
	mysqli_query($link, 'CREATE TABLE users ( id INT NOT NULL AUTO_INCREMENT ,  login VARCHAR(20) 
					NOT NULL ,  passowrd VARCHAR(80) NOT NULL ,  cookie VARCHAR(10) NULL ,    PRIMARY KEY  (id))');
}
?>