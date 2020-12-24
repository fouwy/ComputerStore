<?php
    session_start();
    $employees = $_SESSION["employees"];
    include('templates/header.php');
?>

<section>
    <h2>Add Service </h2>
    <form action="">
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
        <input list="employees" name="service_by">
        <datalist id="employees">
            <?php foreach($employees as $employee) { 
            // $names = explode(" ", $employee["name"]);
            // $lastName = array_pop($names);?>
            <option value=<?php echo $employee["username"]; ?>></option>
            <?php } ?>
        </datalist>
        <br>
        <label for="item">Computer ID</label>
        <input type="number" name="item">
        <label>Tests Done</label>
        <input type="checkbox" name="test1">
        <label for="test1">RAM Test (MemTest86)</label>
        <input type="checkbox" name="test2">
        <label for="test2">CPU Test (Aida64)</label>
        <input type="checkbox" name="test3">
        <label for="test3">GPU Test (3DMark)</label>
    </form>
</section>

<?php include('templates/footer.php') ?>