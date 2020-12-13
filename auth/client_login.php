<?php include('../templates/header.php') ?>
<div class="row">
<section class="column">
    <h2>Clientes | Login</h2>
    <form action="action_clientLogin.php" method="post">
        <label for="name">Username</label>
        <input type="text" placeholder="" name="name" required>
        <br>
        <label for="password">Password</label>
        <input type="password" placeholder="" name="password" required>
        <br>
        <input type="submit" value="Entrar">
        
    </form>
</section>
<section class="column">
    <a href="client_register.php" class="button">Novo Registo</a>
</section>
</div>
<?php include('../templates/footer.php') ?>