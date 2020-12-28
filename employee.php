<?php
	session_start();

	include('templates/checkEmployeeLogin.php');

	$service_parts = $_SESSION["parts"];
	$service = $_SESSION["service"];
	$computers = $_SESSION["computers"];
	
	$msg_services = $_SESSION["msg_services"];
	$msg_computers = $_SESSION["msg_computers"];

	unset($_SESSION["msg_client"]);
	unset($_SESSION["msg_computers"]);
	unset($_SESSION["msg_services"]);
	
	include('templates/header.php');
	include('templates/employee_navbar.php');
?>

<div class="row">
<section class="column">
<h2>Search Service by Service ID</h2>
<form action="view_servicesbyid.php">
	<input type="text" placeholder="Service ID" name="serv_id">
	<input type="submit" value="Search">
</form>
<table>

<?php if (is_array($service_parts) || !empty($msg_services)) { ?>
			<?php if(!empty($msg_services)) { ?>
			<tr>
				<td colspan="2"><?php echo $msg_services?></td>
			</tr>	
			<?php } 
			else { ?>
				<tr>
					<th scope="col">Employee</th>
					<td><?php echo $service["name"];?></td>
				</tr>
				<tr>
					<th scope="col">Computer ID</th>
					<td><?php echo $service["service_item"];?></td>
				</tr>
				<tr>
					<th scope="col">Admission</th>
					<td><?php echo $service["adm_date"];?></td>
				</tr>
				<tr>
					<th scope="col">Finish</th>
					<td><?php echo $service["finish_date"];?></td>
				</tr>
				<tr>
					<th scope="col">Delivery</th>
					<td><?php echo $service["deliv_date"];?></td>
				</tr>
				<tr>
					<th scope="col">Total</th>
					<td><?php echo $service["total"];?></td>
				</tr>
			<?php foreach($service_parts as $part) { ?>
	<tr>
		<th scope="col">Name of Part</th>
		<td><?php echo $part["name"];?></td>
	</tr>
	<tr>
		<th scope="col">Price</th>
		<td><?php echo $part["price"]?></td>
	</tr>
	<tr>
		<th scope="col">Category</th>
		<td><?php echo $part["category"]?>
	</tr>
	<?php if(next($service_parts)) { ?>
				<tr><td class="divider" colspan="2">Next Part</td></tr>
		<?php } ?>
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
			<th scope="col">Service ID</th>
			<th scope="col">Computer ID</th>
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
				<td><?php echo $computer["service_id"];?></td>
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