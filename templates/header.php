<?php
    session_start();
    $logo_link = 'http://localhost:8080/ComputerStore/sibd/index.php';
    if (!empty($_SESSION["emp_name"])) {
        $logo_link = 'http://localhost:8080/ComputerStore/sibd/employee/employee.php';
        $user = $_SESSION["emp_name"];
    } else if (!empty($_SESSION["cli_name"])) {
        $logo_link = 'http://localhost:8080/ComputerStore/sibd/client.php';
        $user = $_SESSION["cli_name"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Repair Shop</title>
    <link rel="stylesheet" href="http://localhost:8080/ComputerStore/sibd/css/style.css">
</head>
<body>
    <header>
        <h1><a href=<?php echo $logo_link; ?>>Your Computer Repair Shop</a></h1>
        <?php if (!empty($user)) { ?>
            <form id="logout" action="http://localhost:8080/ComputerStore/sibd/auth/action_logout.php"> 
                <label>Welcome <?php echo $user?></label>
                <input type="submit" value="Log Out">
            </form>
        <?php } ?>
    </header>

