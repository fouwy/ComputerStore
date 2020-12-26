<?php
	require_once("database/init.php");
	
	$name = "{$_GET['client_name']}%";

	$stmt = $dbh->prepare('SELECT id, name, phone_number,address, tax_id FROM client JOIN person USING(id) WHERE name LIKE ?');
	$stmt->execute(array($name));
	$clients = $stmt->fetchAll();

	if (!empty($clients)) {
		$_SESSION["clients"] = $clients;
	} else {
		$_SESSION["msg_client"] = "No Client with that name";
	}

	header("Location: employee.php");
?>