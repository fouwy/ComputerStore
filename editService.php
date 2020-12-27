<?php
    session_start();
    include('templates/header.php');

?>

<div class="row">
<section class="column"> 
    <h2>Add Part to Service</h2>
    <form action="service/action_addPart.php">
        <label for="service_id">Service</label>
        <input type="number" name="service_id" placeholder="Insert Service ID">

        <label for="part_name">Part name</label>
        <input type="text" name="part_name" placeholder="Intel i5-10600k">

        <label for="part_price">Price</label>
        <input type="number" name="part_price">

        <label for="category">Category</label>
        <input type="text" name="category" placeholder="CPU">

        <label for="serial_num">Serial Number</label>
        <input type="text" name="serial_num" placeholder="1234">

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