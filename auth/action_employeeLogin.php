<?php
    include '../database/insert_employeedb.php';
    require_once("../database/init.php");

    $username=$_POST["username"];
    $password=$_POST["password"];

    $name = isEmployeeLoginValid($username, $password);

    if (!empty($name)) {
        $_SESSION["name"] = $name;
        header('Location: ../employee.php');
    } else {
        $_SESSION["name"] = "Login Failed";
        header('Location: employee_login.php');
    }
?>