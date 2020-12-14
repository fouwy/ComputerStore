<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Page</title>
    <link rel="stylesheet" href="http://localhost:8080/ComputerStore/sibd/css/style.css">
</head>
<body>
    <header>
        <h1><a href='http://localhost:8080/ComputerStore/sibd/index.php'>Your Computer Repair Shop</a></h1>
        
        <?php if (!empty($_SESSION["name"])) { ?>
            <form id="logout" action="http://localhost:8080/ComputerStore/sibd/auth/action_logout.php"> 
                <label>Welcome <?php echo $_SESSION["name"]?></label>
                <input type="submit" value="Log Out">
            </form>
        <?php } ?>
    </header>

