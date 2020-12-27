<?php
    session_start();
    $employees = $_SESSION["employees"];
    $msg = $_SESSION["msg"];
    unset($_SESSION["msg"]);
    
    include('templates/header.php');
    include('templates/employee_navbar.html');
?>
<div class="row">
<section class="column">
    <h2>Add Service </h2>
    <p><?php echo $msg;?></p>
    <form action="service/action_addService.php">
        <label for="adm_date">Admission date</label><br>
        <input type="date" name="adm_date">
        <br>
        <label for="finish_date">Finish date</label><br>
        <input type="date" name="finish_date">
        <br>
        <label for="deliv_date">Delivery date</label><br>
        <input type="date" name="deliv_date">
        <br>
        <label for="service_by">Employee tasked</label>
        <input type="number" name="service_by" placeholder="Insert Employee ID">
        <br>
        <label for="item">Computer ID</label>
        <input type="number" name="item">
</section>
<section class="column">
        <h3>Tests Done</h3>
        <label for="test[]">RAM Test (MemTest86)</label>
        <input type="checkbox" name="test[]" value="ram"><br>
        <label>Test duration:</label>
        <input type="time" name="time[]">
        <label>Test Price:</label>
        <input type="number" name="price[]">
        <br>
        <label for="test[]">CPU Test (Aida64)</label>
        <input type="checkbox" name="test[]" value="cpu"><br>
        <label>Test duration:</label>
        <input type="time" name="time[]">
        <label>Test Price:</label>
        <input type="number" name="price[]">
        <br>
        <label for="test[]">GPU Test (3DMark)</label>
        <input type="checkbox" name="test[]" value="gpu"><br>
        <label>Test duration:</label>
        <input type="time" name="time[]">
        <label>Test Price:</label>
        <input type="number" name="price[]">
</section>
</div>
<input class="addServButton" type="submit" value="Add">
</form>
<?php include('templates/footer.php') ?>