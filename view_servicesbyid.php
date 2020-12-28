<?php
	require_once("database/init.php");
	
	$number =  "{$_GET['serv_id']}";
   
    //var_dump($number);
    //die();

	$stmt = $dbh->prepare('SELECT name,price ,category  FROM part
                            WHERE part.service_id = ?
                           ');





	$stmt->execute(array($number));
	$services = $stmt->fetchAll();

	if (!empty($services)) {
		$_SESSION["services"] = $services;
	} else {
        $_SESSION["msg_services"] = "No Parts used on this service";
	}





	header("Location: employee.php");
?>