<?php include('../templates/header.php') ?>
<section id="login">
    <h2>Empregados | Login</h2>
    <form action="action_employeeLogin.php" method="post">
        <label for="name">Nome de Utilizador</label>
        <input type="text" placeholder="" name="name" required>
        <br>
        <label for="password">Password</label>
        <input type="password" placeholder="" name="password" required>
        <br>
        <input type="submit" value="Entrar">

        <a href="employee_register.php">Novo Registo</a>
    </form>
</section>
<?php include('../templates/footer.php') ?>