<?php
	require_once('../database.php');

	$name = $_POST['merch_name'];
	$price = $_POST['merch_price'];
	$small = $_POST['merch_small'];
	$medium = $_POST['merch_medium'];
	$large = $_POST['merch_large'];
	$x_large = $_POST['merch_xlarge'];
	$media = $_POST['profile'];

	//SQL to be performed AFTER new file has been created
	$sql = "INSERT INTO merchandise 
			(name, s, m, l, xl, image, price) 
			VALUES 
			(:name, :small, :medium, :large, :xlarge, :image, :price)";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':name', $name, PDO::PARAM_STR); 
	$stmt->bindParam(':small', $small, PDO::PARAM_INT);    
	$stmt->bindParam(':medium', $medium, PDO::PARAM_INT);       
	$stmt->bindParam(':large', $large, PDO::PARAM_INT);       
	$stmt->bindParam(':xlarge', $x_large, PDO::PARAM_INT);       
   
	$stmt->bindParam(':price', $price, PDO::PARAM_STR);
	$stmt->bindParam(':image', $media, PDO::PARAM_STR);

	$stmt->execute();

	header("Location: ../admin/merchandise.php");
?>