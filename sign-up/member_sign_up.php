<?php
	if($_POST['action'] == 'submit_member') {
		$servername = "localhost";
		$db_name = "isauw_member";
		$username = "isauw_main";
		$password = "isauw2014";

		// Create connection
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
			$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Connect to database
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

		// Get with post
		$name = $conn->quote($_POST['name']);
		$email = $conn->quote($_POST['email']);
		$major = $conn->quote($_POST['major']);
		$standing = $conn->quote($_POST['standing']);
		$dates = $conn->quote($_POST['dates']);
		$subscription = $conn->quote($_POST['subscription']);


		$sql = "INSERT INTO member 
			(name, email, major, standing, sign_up_date, subscription) 
			VALUES 
			(".$name.", ".$email.", ".$major.", ".$standing.", ".$dates.", ".$subscription.")";

		$stmt = $conn->prepare($sql);
		$stmt->execute();

		
		if(mysql_errno()){
			echo "Fail";
		} else {
			echo "Success";
		}
		
	}
?>