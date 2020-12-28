<?php
    include '../database/insert_computer.php';
    require_once("../database/init.php");

    $client = $_GET["client_id"];
    $brand = $_GET["brand"];
    $model = $_GET["model_name"];
    $year = $_GET["model_year"];

    try {
        $computer_id = insertComputerInDB($client, $brand, $year, $model);
        $_SESSION["msg"] = "Computer Added!";
    } catch (PDOException $e) {
        $err_msg = $e->getMessage();
        $_SESSION["msg"] = $err_msg;
    }

    header('Location: ../addComputer.php');
?>




