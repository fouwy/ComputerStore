<?php
    if (!isset($_SESSION["emp_name"])) {
            $_SESSION["message"] = "Please Login first";
            header('Location: ../auth/employee_login.php');
    }
?>