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

    //TODO: need to check if box for time and price of a certain test is checked

    var_dump($adm_date, $finish_date, $deliv_date, $item, $tests, $prices, $times);
    die();

    // if(empty($tests)) {
    //     echo("no tests");
    // } else {
    //     for($i=0; $i<$n; $i++) {
    //         echo($tests[$i] . " ");
    //     }
    // }

    try {
        $serv_id = addService( $adm_date, $finish_date, $deliv_date,
                    $service_by, $item, $tests, $times, $prices);
    } catch (PDOException $e) {
        $err_msg = $e->getMessage();
        $_SESSION["msg"] = $err_msg;
    }

   header('Location: ../addService.php');
?>