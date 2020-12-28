<?php
	require_once("../database/init.php");
	
	$name = "{$_GET['name']}%";

	$stmt = $dbh->prepare('SELECT id, name, phone_number, username FROM employee JOIN person USING(id) WHERE name LIKE ?');
	$stmt->execute(array($name));
	$employees = $stmt->fetchAll();

	if (!empty($employees)) {
		$_SESSION["employees"] = $employees;
	} else {
		$_SESSION["msg"] = "No employee with that name";
	}

	header("Location: search_employee.php");
?>