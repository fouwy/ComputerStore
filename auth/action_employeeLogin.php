<?php
    include '../database/insert_employeedb.php';
    require_once("../database/init.php");

    $username=$_POST["username"];
    $password=$_POST["password"];

    $name = isEmployeeLoginValid($username, $password);

    if (!empty($name)) {
        $_SESSION["emp_name"] = $name["name"];
        header('Location: ../employee/employee.php');
    } else {
        $_SESSION["msg"] = "Login Failed";
        header('Location: employee_login.php');
    }
?>