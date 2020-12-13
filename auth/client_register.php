<?php include('../templates/header.php') ?>
<div class="row">
	<section class="column">
		<h2>Clientes | Registo</h2>
		<form action="action_register.php" method="post">
			<label for="name">Nome Completo</label>
			<input type="text" placeholder="" name="name" required>
			<br>
			<label for="username">Username</label>
			<input type="text" placeholder="Usado para iniciar sessão" name="username" required>
			<br>
			<label for="password">Password</label>
			<input type="password" placeholder="Pelo menos 8 caracteres" name="password" required>
			<br>
			<label for="confirm_pwd">Confirmar Password</label>
			<input type="password" placeholder="" name="confirm_pwd" required>
			<br>
			<input type="submit" value="Registar">
		</form>
	</section>
	<section class="column">
		<a href="client_login.php" class="button">Login</a>
	</section>
</div>
<?php include('../templates/footer.php') ?>