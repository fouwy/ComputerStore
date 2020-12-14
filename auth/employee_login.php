<?php include('../templates/header.php') ?>
<div class="row">
    <section class="column">
        <h2>Empregados | Login</h2>
        <form action="action_employeeLogin.php" method="post">
            <label for="name">Username</label>
            <input type="text" placeholder="" name="username" required>
            <br>
            <label for="password">Password</label>
            <input type="password" placeholder="" name="password" required>
            <br>
            <input type="submit" value="Entrar">
        </form>
    </section>
    <section class="column">
        <a href="employee_register.php" class="button">Novo Registo</a>
    </section>
</div>
<?php include('../templates/footer.php') ?>