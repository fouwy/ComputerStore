<?php
	require_once("../database/init.php");
	
	$name = "{$_GET['nameofclient']}";

	$stmt = $dbh->prepare('SELECT service.id as service_id, computer.id as id,model_id,model.brand as brand ,model_year,model_name FROM computer 
                            JOIN client ON client.id=computer.client_id
                            JOIN person ON person.id=client.id
                            JOIN model ON model.id=computer.model_id
							JOIN service ON service.service_item = computer.id
                            WHERE person.name = ?
                           ');

	$stmt->execute(array($name));
	$computers = $stmt->fetchAll();

	if (!empty($computers)) {
		$_SESSION["computers"] = $computers;
	} else {
        $_SESSION["msg_computers"] = "This client doesn't have a registered computer";
	}

	header("Location: employee.php");
?>