<?php 
	session_start();
	$msg = $_SESSION["msg"];
	include('../templates/header.php');
?>


?>

<!DOCTYPE html>
<html>
<div class="row">
	<section class="column">
		<h2>Empregados | Registo <?php echo $msg?></h2>
		<form action="action_registeremployee.php" method="post">
			<label for="name">Nome Completo</label>
			<input type="text" placeholder="" name="name" required>
			<br>
			<label for="phone">Número de Telemóvel</label>
			<input type="tel" name="phone" pattern="[0-9]{9}" required>
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
		<a href="employee_login.php" class="button">Login</a>
	</section>
</div>
</html>
<?php include('../templates/footer.php') ?>