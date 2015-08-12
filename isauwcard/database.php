<?php
	$servername = "localhost";
	$db_name = "isauw_restaurant";
	$username = "isauw_main";
	$password = "isauw2014";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db_name);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	// echo "Connected successfully";
?>