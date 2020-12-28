<?php 
	include('../templates/header.php');
	session_start();
	$msg = $_SESSION["msg"];
	unset($_SESSION["msg"]);
?>


<div class="row">
	<section class="column">
		<h2>Clients | Register</h2>
		<h3><?php echo $msg?></h3>
		<form action="action_registerClient.php" method="post">
			<label for="name">Full Name</label>
			<input type="text" placeholder="" name="name" required>
			<br>
			<label for="phone">Phone Number</label>
			<input type="tel" name="phone" pattern="[0-9]{9}" required>
			<br>
			<label for="address">Home Address</label>
			<input type="text" name="address">
			<br>
			<label for="tax_id">NIF</label>
			<input type="text" name="tax_id" pattern=".{9}" placeholder="Nine digits">
			<br>
			<label for="username">Username</label>
			<input type="text" placeholder="Usado para iniciar sessão" name="username" required>
			<br>
			<label for="password">Password</label>
			<input type="password" placeholder="Pelo menos 8 caracteres" name="password" pattern=".{8,}">
			<br>
			<label for="confirm_pwd">Confirm Password</label>
			<input type="password" placeholder="" name="confirm_pwd" pattern=".{8,}">
			<br>
			<input type="submit" value="Register">
		</form>
	</section>
	<section class="column">
		<a href="client_login.php" class="button">Login</a>
	</section>
</div>
<section></section>
<section></section>
<?php include('../templates/footer.php') ?>