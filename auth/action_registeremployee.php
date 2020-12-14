<?php
include 'insert_employeedb.php';
require_once("../database/init.php");

$name=$_POST["name"];
$phone=$_POST["phone"];
$username=$_POST["username"];
$password=$_POST["password"];

try {
	attachEmployeeToPerson($name, $phone,$username,$password);
	$_SESSION["msg"] = "Registration Succesfull";
	
} catch (PDOException $e) {
	$err_msg = $e->getMessage();

	if (strpos($err_msg, "UNIQUE")) {
		$_SESSION["msg"] = "Username already exists" . ($err_msg);
	} else {
		$_SESSION["msg"] = "Registration Failed" . ($err_msg);
	}

}
header('Location: employee_register.php');
?>