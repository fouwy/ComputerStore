<?php 
    include('../templates/header.php') ;
    $msg = $_SESSION["message"];
    unset($_SESSION["message"]);
?>
<div class="row">
    <section class="column">
        <h2>Employee | Login</h2>
        <p><?php echo $msg;?></p>
        <form action="action_employeeLogin.php" method="post">
            <label for="name">Username</label>
            <input type="text" placeholder="" name="username" required>
            <br>
            <label for="password">Password</label>
            <input type="password" placeholder="" name="password" required>
            <br>
            <input type="submit" value="Sign In">
        </form>
    </section>
    <section class="column">
        <a href="employee_register.php" class="button">Register</a>
    </section>
</div>
<section></section>
<section></section>
<?php include('../templates/footer.php') ?>