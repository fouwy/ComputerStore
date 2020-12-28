<?php
	require_once("database/init.php");
	
	$name = $_SESSION["cli_name"];
   
	$stmt = $dbh->prepare('SELECT service_item,finish_date,total,model.brand as brnd,model.model_year as year  FROM service
                            
                            JOIN computer ON computer.id=service_item
                            JOIN client ON client.id=computer.client_id
                            JOIN person ON person.id=client.id
                            JOIN model ON model.id=computer.model_id
                            WHERE person.name=?
                           ');

	$stmt->execute(array($name));
	$clients = $stmt->fetchAll();

	if (!empty($clients)) {
		$_SESSION["clients"] = $clients;
	} else {
        $_SESSION["msg_client"] = "No services ";
	}
?>