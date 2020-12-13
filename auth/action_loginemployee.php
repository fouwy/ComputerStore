<?php
	 require_once("../database/init.php");
	 require_once("../database/user.php");
	
	#access request params
	$username = $_POST["username"];
	$password = $_POST["password"];

	#verify username/password


	if (loginIsValid($username, $password)) {
		$_SESSION["username"] = $username;
	} else {
		$_SESSION["msg"] = "Login Failed";
	}
#ALSO NOT WORKING-<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



    //header("Location: list_categories.php");
    
	#if login success
	#   -create session attribute for user
	#else
	#   -set error message: "login failed"
	#either case, redirect to main page


?>