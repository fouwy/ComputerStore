<?php
include('./templates/header.php');
require_once("./database/init.php");
require_once("insert_employeedb.php");

$name=$_POST["name"];
$phone=$_POST["phone"];
$username=$_POST["username"];
$password=$_POST["password"];

try {
	insertUser($name, $phone,$username,$password);
	$_SESSION["msg"] = "Registration Succesfull";
	header('Location: employee_register.php');
	} catch (PDOException $e) {
		$err_msg = $e->getMessage();

		if (strpos($err_msg, "UNIQUE")) {
			$_SESSION["msg"] = "Username already exists";
		} else {
			$_SESSION["msg"] = "Registration Failed";
		}

		//header('Location: registration.php');
	}
