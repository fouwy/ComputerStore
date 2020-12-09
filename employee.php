<?php
	session_start();
	$msg = $_SESSION["msg"];
	$msg_client = $_SESSION["msg_client"];
	$employees = $_SESSION["employees"];
	$clients = $_SESSION["clients"];

	unset($_SESSION["msg"]);
	unset($_SESSION["msg_client"]);
	//unset($_SESSION["employees"]);
	//unset($_SESSION["clients"]);
	include('templates/header.php')
?>

	<section>
		<h2>Employees</h2>
		<form action="view_employee.php">
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
		<form action="view_client.php">
			<input type="text" placeholder="Client name" name="client_name">
			<input type="submit" value="Search">
		</form>
		<table border="1">
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Phone Number</th>
				<th scope="col">Address</th>
				<th scope="col">Tax ID</th>
			</tr>
			<?php if (is_array($clients) || !empty($msg_client)) { ?>
					<?php if(!empty($msg_client)) { ?>
					<tr>
						<td colspan="4"><?php echo $msg_client?></td>
					</tr>	
					<?php } 
					else {
				  		foreach($clients as $client) { ?>
				<tr>
					<td><?php echo $client["name"]?>
						</td><td><?php echo $client["phone_number"]?>
						<td><?php echo $client["address"]?></td>
						<td><?php echo $client["tax_id"]?></td>
				</tr>
			<?php 		}
					} 
				}
				?>

	</section>
	<?php include('templates/footer.php') ?>
</body>
</html>