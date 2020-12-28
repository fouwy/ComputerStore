<?php
    include '../database/insert_service.php';
    require_once("../database/init.php");

    $adm_date = $_GET["adm_date"];
    $finish_date = $_GET["finish_date"];
    $deliv_date = $_GET["deliv_date"];
    $service_by = $_GET["service_by"];
    $item = $_GET["item"];
    $tests = $_GET["test"];
    $times = $_GET["time"];
    $prices = $_GET["price"];

    
    try {
        $serv_id = addService( $adm_date, $finish_date, $deliv_date,
                    $service_by, $item, $tests, $times, $prices);

        $_SESSION["msg"] = "Service Added!";            
    } catch (PDOException $e) {
        $err_msg = $e->getMessage();
        $_SESSION["msg"] = $err_msg;
    }

   header('Location: ../addService.php');
?>