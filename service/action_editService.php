<?php
    include '../database/edit_service.php';
    require_once("../database/init.php");

    $service_id = $_GET["service_id"];
    $finish_date = $_GET["edit_finish"];
    $deliv_date = $_GET["edit_deliv"];
    $price = $_GET["edit_price"];

    

    if (empty($service_id)) {
        $_SESSION["msg_serv"] = "Enter a valid Service ID"; 
        header('Location: ../editService.php');
        die();
    }

    try {
        editService($service_id, $finish_date, $deliv_date, $price);
        $_SESSION["msg_serv"] = "Edited Service Successfully";
    } catch (PDOException $e) {
        $err_msg = $e->getMessage();
       // $_SESSION["msg_serv"] = "Failed to insert part";
       $_SESSION["msg_serv"] = $err_msg;
    }

    header('Location: ../editService.php');
?>