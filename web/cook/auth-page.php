<?php
require_once('../includes/header.php');
$errors = null;
if ($_GET)
	$errors = explode("!", strip_tags( $_GET["register_error"]));
?>
	<h2 class="text-center pt-3 ">Авторизация</h2>
	<div class="container pb-5">
		<div class="row">
			<div class="col-sm">
			</div>
			<div class="bg-light col-6 p-2">
				<form action="../php-logic/auth.php" method="post">
					<div class="form-group">
						<label for="exampleInputEmail1">Логин</label>
						<input type="text" class="form-control" name="login"  placeholder="login">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Пароль</label>
						<input type="password" class="form-control" name="pass" placeholder="password">
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" name="check">
						<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
					</div>
					<button type="submit" class="btn btn-primary m-2">Авторизация</button>
				</form>
				<a href="register-page.php"><span>Нет аккаунта? жми сюда!</span></a>
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