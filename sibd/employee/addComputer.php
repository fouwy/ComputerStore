<?php
    session_start();
    include('../templates/checkEmployeeLogin.php');
    
    $msg = $_SESSION["msg"];
    unset($_SESSION["msg"]);

    include('../templates/header.php');
    include('../templates/employee_navbar.php');
?>

<div class="row">
<section class="column">
<h2>Add a Computer</h2>
<p> <?php echo $msg;?></p>
<form action="../service/action_addComputer.php">
    <label for="client_id">Client Name</label>
    <input type="text" name="client_id">
    <br>
    <p>Brand</p>
    <input type="radio" id="b1" name="brand" value="Asus">
    <label for="b1">Asus</label>

    <input type="radio" id="b2" name="brand" value="Dell">
    <label for="b1">Dell</label>

    <input type="radio" id="b3" name="brand" value="HP">
    <label for="b3">HP</label>

    <input type="radio" id="b4" name="brand" value="Lenovo">
    <label for="b4">Lenovo</label>

    <input type="radio" id="b5" name="brand" value="LG">
    <label for="b5">LG</label>

    <input type="radio" id="b6" name="brand" value="MSI">
    <label for="b6">MSI</label>
<br><br>
    <label for="model_name">Model</label>
    <input type="text" name="model_name">
    <label for="model_year">Model Year</label>
    <input type="number" name="model_year" min="2010" step="1" max="2050" value="2020">
    <input type="submit" value="Add computer">
</form>
</section>
<section class="column">
</section>
</div>
<?php include('../templates/footer.php') ?>