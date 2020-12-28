<?php
	require_once("database/init.php");
	
	$number =  $_GET["serv_id"];
   
    //var_dump($number);
    //die();

	$stmt = $dbh->prepare('SELECT name,price ,category  FROM part
                            WHERE part.service_id = ?
                           ');
	$stmt->execute(array($number));
	$parts = $stmt->fetchAll();

	$stmt = $dbh->prepare('SELECT adm_date, delivery_date, finish_date, person.name, service_item, total
						FROM service JOIN employee ON service.service_by= employee.id 
						JOIN person ON employee.id=person.id 
						WHERE service.id=?');
	$stmt->execute(array($number));
	$service = $stmt->fetchAll();

	if (!empty($service)) {
		// var_dump($service);
		// die();
		$_SESSION["parts"] = $parts;
		$_SESSION["service"] = $service[0];
	} else {
        $_SESSION["msg_services"] = "Could not find a service with this ID";
	}





	header("Location: employee.php");
?>