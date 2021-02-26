<?php
require_once("../php-logic/db-connection.php");
require_once ("../php-logic/cookie.php");
if (@$_SESSION["auth"] == true)
{
	$userLink = 'user.php';
	$registerLink = '../php-logic/exit.php';
	$registerText = @$_SESSION['login'] . '(выйти)';
} else
{
	$registerLink = 'register-page.php';
	$registerText = 'регистрация';
	$userLink = "auth-page.php";
}
echo '<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Столовая</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Подключаем Bootstrap CSS -->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
	<style>
   body {
    background: #eef1f3; /* Фоновый цвет */
   }
  </style>
</head>
<body>
<!-- Heared area-->
<header class="navbar justify-content-between bg-info">
<a class="navbar-brand text-dark" href="../cook/">
    	<div class="d-inline-flex align-middle"><img src="../images/logo.png" width="60" height="60" class="d-inline-flex" alt=""></div>
    	<div class="d-inline-flex align-middle">Столовая №1</div>
 </a>
<form class="form-inline">
	<p class="d-inline-flex align-middle text-dark pr-4 mt-3">Звонить по номеру: +7-800-555-35-35</p>
    <input class="form-control mr-sm-2 bg-light" type="search" placeholder="Поиск" aria-label="Search">
    <button class="btn btn-link" type="submit"><img src="../images/search.svg"></button>
  </form>
</header>


<nav class="navbar navbar-expand-sm alert-info navbar-dark justify-content-between">
	<ul class="navbar-nav">
		<li class="nav-item active">
			<h5><a class="nav-link text-dark" href="' . $userLink . '">Пользователь</a></h5>
		</li>
		<li class="nav-item">
			<h5><a class="nav-link text-dark" href="company.php">О компании</a></h5>
		</li>
		<li class="nav-item">
			<h5><a class="nav-link text-dark" href="menu.php">Меню</a></h5>
		</li>
	</ul>
	<ul class="navbar-nav">
		<a class="nav-link" href="' . $registerLink . '">
	        <div class="d-inline-flex align-middle"><img src="../images/reg-img.png" width="17" height="20" class="d-inline-flex" alt=""></div>
	        <div class="d-inline-flex align-middle text-dark">' . $registerText . '</div>
		 </a>
	</ul>
</nav>
<div class="container main-content bg-white" style="height: auto; min-height: 90vh;">

'
?>