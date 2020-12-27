<?php
    session_start();
    include('templates/header.php');
    $msg = $_SESSION["msg"];
    unset($_SESSION["msg"]);
?>


<div class="row">
<section class="column"> 
    <h2>Add Part to Service</h2>
    <?php if(!empty($msg)) {
        echo "<p>" . $msg . "</p>";
    } ?>
    <form action="service/action_addPart.php">
        <label for="service_id">Service</label>
        <input type="number" name="service_id" placeholder="Insert Service ID">

        <label for="part_name">Part name</label>
        <input type="text" name="part_name" placeholder="Intel i5-10600k">

        <label for="part_price">Price (EUR)</label>
        <input type="number" name="part_price" placeholder="250">

        <label for="category">Category</label>
        <br>
        <input type="radio" id="c1" name="category" value="CPU">
        <label for="c1">CPU</label>
        <input type="radio" id="c2" name="category" value="GPU">
        <label for="c2">GPU</label>
        <input type="radio" id="c3" name="category" value="RAM">
        <label for="c3">RAM</label>
        <input type="radio" id="c4" name="category" value="PSU">
        <label for="c4">PSU</label>
        <br>
        <input type="radio" id="c5" name="category" value="Motherboard">
        <label for="c5">Motherboard</label>
        <input type="radio" id="c6" name="category" value="Cooler">
        <label for="c6">Cooler</label>
        <input type="radio" id="c7" name="category" value="Case">
        <label for="c7">Case</label>
        <input type="radio" id="c8" name="category" value="Fan">
        <label for="c8">Fan</label>
        <br><br>
        <label for="serial_num">Serial Number</label>
        <input type="text" name="serial_num" placeholder="1234">
        <label for="amount">Quantity</label>
        <input type="number" name="amount" value="1">
        <input type="submit" value="Add Part">
    </form>
</section>

<section class="column">
    <h2>Edit Service</h2>
    <form action="service/action_editService">
        <label for="edit_finish">Finish date</label>
        <input type="date" name="edit_finish">

        <label for="edit_deliv">Delivery date</label>
        <input type="date" name="edit_deliv">

        <label for="edit_price">Total Price</label>
        <input type="number" name="edit_price">

        <input type="submit" value="Edit Service">
    </form>
</section>

</div>
<?php
    include('templates/footer.php');
?>