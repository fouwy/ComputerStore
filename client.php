<?php
	session_start();
	$msg = $_SESSION["msg"];
	$msg_client = $_SESSION["msg_client"];
	//$employees = $_SESSION["employees"];
	$clients = $_SESSION["clients"];

	unset($_SESSION["msg"]);
	unset($_SESSION["msg_client"]);
	//unset($_SESSION["employees"]);
	//unset($_SESSION["clients"]);
	include('templates/header.php');
	
?>

<section>
	<h2>Client Homepage</h2>
	<h3>Your computers registered with us </h3>
	<form action="view_clientcomputers.php">
		
		<input type="submit" value="Search">
		
	</form>
	<table border="1">
		<tr>
			<th scope="col">Computer ID</th><th scope="col">Brand Name</th>
		</tr>
		<?php if (is_array($clients) || !empty($msg_client)) {
				if(!empty($msg_client)) { ?>
				<tr>
					<td colspan="4"><?php echo $msg_client?></td>
				</tr>	
				<?php } 
				else {
					foreach($clients as $client) { ?>
		<tr>
			<td><?php echo $client["id"]?>
			<td><?php echo $client["brand"]?></td>
			
		</tr>
		<?php 		}
				} 
			}
			?>
	</table>
	<h3>Your computers service history</h3>
	<form action="view_clientservices.php">
		
		<input type="submit" value="Search">
		
	</form>
	<table border="1">
		<tr>
			<th scope="col">Model Year</th>
			<th scope="col">Brand</th>
			<th scope="col">Bill(€)</th>
			<th scope="col">Finish Date</th>
			
			
		</tr>
		<?php if (is_array($clients) || !empty($msg_client)) {
				if(!empty($msg_client)) { ?>
				<tr>
					<td colspan="4"><?php echo $msg_client?></td>
				</tr>	
				<?php } 
				else {
					foreach($clients as $client) { ?>
		<tr>
			<td><?php echo $client["year"]?></td>
			<td><?php echo $client["brnd"]?></td>

			<td><?php echo $client["total"]?></td>

			
			<td><?php echo $client["finish_date"]?></td>
			
		</tr>
		<?php 		}
				} 
			}
			?>
	</table>


</section>
	<?php include('templates/footer.php') 
	
	?>

</body>


</html>