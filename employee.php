<?php
	session_start();
	$msg = $_SESSION["msg"];
	$msg_client = $_SESSION["msg_client"];
	$msg_services = $_SESSION["msg_services"];

	$employees = $_SESSION["employees"];
	$clients = $_SESSION["clients"];

	$services = $_SESSION["services"];
	//new one^^

	unset($_SESSION["msg"]);
	unset($_SESSION["msg_client"]);
	
	include('templates/header.php');
	include('templates/employee_navbar.html');
	unset($_SESSION["msg_services"]);
?>
<div class="row">
<section class="column">
<h2>Search parts used on a service by Service ID</h2>
<form action="view_servicesbyid.php">
	<input type="text" placeholder="Service ID" name="serv_id">
	<input type="submit" value="Search">
</form>
<table>
	<tr>
		<th scope="col">Name of Part</th>
		<th scope="col">Price</th>
		<th scope="col">Category</th>
	
	</tr>
	<?php if (is_array($services) || !empty($msg_services)) { ?>
			<?php if(!empty($msg_services)) { ?>
			<tr>
				<td colspan="5"><?php echo $msg_services?></td>
			</tr>	
			<?php } 
			else {
				foreach($services as $service) { ?>
		<tr>
			<td><?php echo $service["name"];?></td>
			<td><?php echo $service["price"]?></td>
			<td><?php echo $service["category"]?>
		
		</tr>
	<?php 		}
			} 
		}
		?>
</table>
</section>
<section class="column">
</section>
</div>
<?php include('templates/footer.php') ?>