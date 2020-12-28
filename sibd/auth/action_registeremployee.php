<?php
include '../database/insert_employeedb.php';
require_once("../database/init.php");

$name=$_POST["name"];
$phone=$_POST["phone"];
$username=$_POST["username"];
$password=$_POST["password"];
$confirm = $_POST["confirm_pwd"];

if ($password != $confirm) {
	$_SESSION["msg"] = "Passwords must match";
	header('Location: employee_register.php');
	die();
}

try {
	attachEmployeeToPerson($name, $phone,$username,$password);
	$_SESSION["msg"] = "Registration Succesfull";
	
} catch (PDOException $e) {
	$err_msg = $e->getMessage();

	if (strpos($err_msg, "UNIQUE")) {
		$_SESSION["msg"] = "Username already exists";
	} else {
		$_SESSION["msg"] = "Registration Failed";
	}

}
header('Location: employee_register.php');
?>