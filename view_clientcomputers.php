<?php
	require_once("database/init.php");
	
	$name = $_SESSION["cli_name"];
   
	$stmt = $dbh->prepare('SELECT computer.id,model_id,model.brand as brand  FROM computer 
                            JOIN client ON client.id=computer.client_id
                            JOIN person ON person.id=client.id
                            JOIN model ON model.id=computer.model_id
                            WHERE person.name=?
                           ');

	$stmt->execute(array($name));
	$clients = $stmt->fetchAll();

	if (!empty($clients)) {
		$_SESSION["computer"] = $clients;
	} else {
        $_SESSION["msg_client"] = "No computer with that client";
	}
?>