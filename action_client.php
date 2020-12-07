<?php
	session_start();

	$dbh = new PDO('sqlite:ComputerStore.db');
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$name = "{$_GET['client_name']}%";

	$stmt = $dbh->prepare('SELECT name, phone_number,address, tax_id FROM client JOIN person USING(id) WHERE name LIKE ?');
	$stmt->execute(array($name));
	$clients = $stmt->fetchAll();

	if (!empty($clients)) {
		$_SESSION["clients"] = $clients;
	} else {

		$_SESSION["msg_client"] = "No Client with that name";
	}

	header("Location: index.php");
?>