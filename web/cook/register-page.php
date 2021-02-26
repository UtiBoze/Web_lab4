<?php
require_once('../includes/header.php');
$errors = null;
if ($_GET)
	$errors = explode("!", strip_tags( $_GET["register_error"]));
?>
<h2 class="text-center pt-3 ">Регистрация</h2>
<div class="container pb-5">
	<div class="row">
		<div class="col-sm">
		</div>
		<div class="bg-light col-6 p-2">
			<form action="../php-logic/register.php" method="post">
				<div class="form-group">
					<label for="exampleInputEmail1">Логин</label>
					<input type="text" class="form-control" name="login"  placeholder="login">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Пароль</label>
					<input type="password" class="form-control" name="pass1" placeholder="password">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Повторите пароль</label>
					<input type="password" class="form-control" name="pass2" placeholder="password">
				</div>
				<button type="submit" class="btn btn-primary m-2">Авторизация</button>
			</form>
			<a href="auth-page.php"><span>Страница авторизации!</span></a>
		</div>
		<div class="col-sm">
		</div>
	</div>
</div>
<?php if ($errors): ?>
	<?php foreach ($errors as $er): ?>
        <p class="alert-info"><?= $er; ?></p>
	<?php endforeach;?>
<?php endif; ?>
<?php require_once('../includes/footer.php');
?>
