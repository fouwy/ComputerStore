<?php
include '../database/insert_clientdb.php';
require_once("../database/init.php");

$name=$_POST["name"];
$phone=$_POST["phone"];
$address = $_POST["address"];
$tax_id = $_POST["tax_id"];
$username=$_POST["username"];
$password=$_POST["password"];

try {
	attachClientToPerson($name, $phone, $username, $password, $address, $tax_id);
	$_SESSION["msg"] = "Registration Succesfull";
	
} catch (PDOException $e) {
	$err_msg = $e->getMessage();

	if (strpos($err_msg, "UNIQUE")) {
		$_SESSION["msg"] = "Username already exists" . ($err_msg);
	} else {
		$_SESSION["msg"] = "Registration Failed" . ($err_msg);
	}
}
header('Location: client_register.php');
?>