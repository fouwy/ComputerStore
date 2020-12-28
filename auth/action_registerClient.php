<?php
include '../database/insert_clientdb.php';
require_once("../database/init.php");

$name=$_POST["name"];
$phone=$_POST["phone"];
$address = $_POST["address"];
$tax_id = $_POST["tax_id"];
$username=$_POST["username"];
$password=$_POST["password"];
$confirm = $_POST["confirm_pwd"];

if ($password != $confirm) {
	$_SESSION["msg"] = "Passwords must match";
	header('Location: client_register.php');
	die();
}


try {
	attachClientToPerson($name, $phone, $username, $password, $address, $tax_id);
	$_SESSION["msg"] = "Registration Succesfull";
	
} catch (PDOException $e) {
	$err_msg = $e->getMessage();

	if (strpos($err_msg, "UNIQUE")) {
		$_SESSION["msg"] = "Username already exists";
	} else {
		$_SESSION["msg"] = "Registration Failed";
	}
}
header('Location: client_register.php');
?>