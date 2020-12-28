<?php
	session_start();
	if (!isset($_SESSION["cli_name"])) {
		$_SESSION["message"] = "Please Login first";
		header('Location: auth/client_login.php');
	}

	require_once("view_clientcomputers.php");
	require_once("view_clientservices.php");

	$msg = $_SESSION["msg"];
	$msg_client = $_SESSION["msg_client"];
	$clients_pc = $_SESSION["computer"];
	$clients = $_SESSION["clients"];

	unset($_SESSION["msg"]);
	unset($_SESSION["msg_client"]);

	include('templates/header.php');
?>

<section> 
	<h2>Client Homepage</h2>
	<h3>Your computers registered with us </h3>
	<table>
		<tr>
			<th scope="col">Computer ID</th><th scope="col">Brand Name</th>
		</tr>
		<?php if (is_array($clients_pc) || !empty($msg_client)) {
				if(!empty($msg_client)) { ?>
				<tr>
					<td colspan="4"><?php echo $msg_client?></td>
				</tr>	
				<?php } 
				else {
					foreach($clients_pc as $client) { ?>
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
	<table>
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
					foreach($clients as $client) { 
						if ($client["finish_date"] == "") {
							$client["finish_date"] = "Working on it";} ?>
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
<section></section>
<section></section>
<?php include('templates/footer.php') ?>