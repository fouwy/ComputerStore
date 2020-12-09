<?php
	session_start();

	$dbh = new PDO('sqlite:ComputerStore.db');
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$name = "{$_GET['name']}%";

	$stmt = $dbh->prepare('SELECT name, phone_number FROM employee JOIN person USING(id) WHERE name LIKE ?');
	$stmt->execute(array($name));
	$employees = $stmt->fetchAll();

	if (!empty($employees)) {
		$_SESSION["employees"] = $employees;
	} else {
		$_SESSION["msg"] = "No employee with that name";
	}

	header("Location: employee.php");
?>