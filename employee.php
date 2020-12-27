<?php
	session_start();
	$msg = $_SESSION["msg"];
	$msg_client = $_SESSION["msg_client"];
	$msg_services = $_SESSION["msg_services"];

	$employees = $_SESSION["employees"];
	$clients = $_SESSION["clients"];

	$services = $_SESSION["services"];
	$computers=$_SESSION["computers"];
	$msg_computers = $_SESSION["msg_computers"];
	//new one^^

	unset($_SESSION["msg"]);
	unset($_SESSION["msg_client"]);
	unset($_SESSION["msg_computers"]);
	
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
<h2>Search Computers by Name of client</h2>
	<form action="view_computersbyname.php">
		<input type="text" placeholder="Name" name="nameofclient">
		<input type="submit" value="Search">
	</form>
	<table>
		<tr>
			<th scope="col">ID on database</th>
			<th scope="col">Brand</th>
			<th scope="col">Model</th>
			<th scope="col">Model Year</th>
		
		</tr>
		<?php if (is_array($computers) || !empty($msg_computers)) { ?>
				<?php if(!empty($msg_computers)) { ?>
				<tr>
					<td colspan="5"><?php echo $msg_computers?></td>
				</tr>	
				<?php } 
				else {
					foreach($computers as $computer) { ?>
			<tr>
				<td><?php echo $computer["id"];?></td>
				<td><?php echo $computer["brand"]?></td>
				<td><?php echo $computer["model_name"]?></td>
				<td><?php echo $computer["model_year"]?>
			
			</tr>
		<?php 		}
				} 
			}
			?>
	</table>




</section>
</div>
<?php include('templates/footer.php') ?>