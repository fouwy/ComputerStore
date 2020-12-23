<?php
    include '../database/insert_clientdb.php';
    require_once("../database/init.php");

    $username=$_POST["username"];
    $password=$_POST["password"];

    $name = isClientLoginValid($username, $password);

    if (!empty($name)) {
        $_SESSION["cli_name"] = $name["name"];
        header('Location: ../client.php');
    } else {
        $_SESSION["msg"] = "Login Failed";
        header('Location: client_login.php');
    }
?>