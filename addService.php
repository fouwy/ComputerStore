<?php
    session_start();
    $employees = $_SESSION["employees"];
    $msg = $_SESSION["msg"];
    unset($_SESSION["msg"]);
    include('templates/header.php');
?>

<section>
    <h2>Add Service </h2>
    <p><?php echo $msg;?></p>
    <form action="service/action_addService.php">
        <label for="adm_date">Admission date</label>
        <input type="date" name="adm_date">
        <br>
        <label for="finish_date">Finish date</label>
        <input type="date" name="finish_date">
        <br>
        <label for="deliv_date">Delivery date</label>
        <input type="date" name="deliv_date">
        <br>
        <label for="service_by">Employee tasked</label>
        <input type="number" name="service_by" placeholder="Insert Employee ID">
        <br>
        <label for="item">Computer ID</label>
        <input type="number" name="item">
        <label>Tests Done</label>
        <input type="checkbox" name="test[]" value="ram">
        RAM Test (MemTest86) <br>
        <p>Test duration:</p>
        <input type="time" name="time[]">
        <p>Test Price:</p>
        <input type="number" name="price[]">
        <input type="checkbox" name="test[]" value="cpu">
        CPU Test (Aida64) <br>
        <p>Test duration:</p>
        <input type="time" name="time[]">
        <p>Test Price:</p>
        <input type="number" name="price[]">
        <input type="checkbox" name="test[]" value="gpu">
        GPU Test (3DMark) <br>
        <p>Test duration:</p>
        <input type="time" name="time[]">
        <p>Test Price:</p>
        <input type="number" name="price[]">
        <input type="submit" value="Add">
    </form>
</section>

<?php include('templates/footer.php') ?>