<?php
	session_start();
	$msg = $_SESSION["msg"];
	$employees = $_SESSION["employees"];
	unset($_SESSION["msg"]);
	unset($_SESSION["employees"]);

	$dbh = new PDO('sqlite:ComputerStore.db');
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $dbh->prepare('SELECT name, address, tax_id FROM client JOIN person USING(id);');
	$stmt->execute();

	$clients = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employees Page</title>
</head>
<body>
	<header>
		<h1><a href="index.php">Very gud store</a></h1>
	</header>
	<section>
		<h2>Employees</h2>
		<form action="action_employee.php">
			<input type="text" placeholder="Employee Name" name="name">
			<input type="submit" value="Search">
		</form>
		<table border="1">
			<tr>
				<th scope="col">Name</th><th scope="col">Phone Number</th>
			</tr>

			<?php if (is_array($employees) || !empty($msg)) {
					if(!empty($msg)) { ?>
					<tr>
						<td colspan="2"><?php echo $msg?></td>
					</tr>	
					<?php } 
					else {
				  		foreach($employees as $employee) { ?>
				<tr>
					<td><?php echo $employee["name"]?></td><td><?php echo $employee["phone_number"]?></td>
				</tr>
			<?php 		}
					} 
				}
				?>
		</table>
		<h2>Client noobs</h2>
		<form action="action_client.php">
			<input type="text" placeholder="Client name" name="name">
			<input type="submit" value="Search">
		</form>
		<table border="1">
			<tr>
				<th scope="col">Name</th><th scope="col">Phone Number</th><th scope="col">Address</th>
			</tr>
			<?php if (is_array($employees) || !empty($msg)) {
					if(!empty($msg)) { ?>
					<tr>
						<td colspan="3"><?php echo $msg?></td>
					</tr>	
					<?php } 
					else {
				  		foreach($employees as $employee) { ?>
				<tr>
					<td><?php echo $employee["name"]?></td><td><?php echo $employee["phone_number"]?><td><?php echo $employee["address"]?></td>
				</tr>
			<?php 		}
					} 
				}
				?>

	</section>
</body>
</html>