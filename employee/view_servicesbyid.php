<?php
	require_once("../database/init.php");
	
	$number =  $_GET["serv_id"];

	$stmt = $dbh->prepare('SELECT name, price, category, quantity, partid  FROM part
						JOIN QuantityNeededForService ON part.id=QuantityNeededForService.partid 
						WHERE part.service_id = ?');
	$stmt->execute(array($number));
	$parts = $stmt->fetchAll();

	$stmt = $dbh->prepare('SELECT adm_date, delivery_date, finish_date, person.name, service_item, total
						FROM service 
						JOIN employee ON service.service_by= employee.id 
						JOIN person ON employee.id=person.id 
						WHERE service.id=?');
	$stmt->execute(array($number));
	$service = $stmt->fetchAll();

	if (!empty($service)) {
		$_SESSION["parts"] = $parts;
		$_SESSION["service"] = $service[0];
	} else {
        $_SESSION["msg_services"] = "Could not find a service with this ID";
	}

	header("Location: employee.php");
?>