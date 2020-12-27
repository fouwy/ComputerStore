<?php
    include '../database/insert_part.php';
    require_once("../database/init.php");

    $service_id = $_GET["service_id"];
    $part = $_GET["part_name"];
    $price = $_GET["part_price"];
    $category = $_GET["category"];
    $serial_num = $_GET["serial_num"];
    $quantity = $_GET["amount"];

    try {
        addPart($service_id, $part, $price, $category, $serial_num, $quantity);
        $_SESSION["msg"] = "Added Part Successfully";
    } catch (PDOException $e) {
        $err_msg = $e->getMessage();
       // $_SESSION["msg"] = "Failed to insert part";
       $_SESSION["msg"] = $err_msg;
    }

    header('Location: ../editService.php');
?>